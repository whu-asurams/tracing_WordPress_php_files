<?php

/*


*/


class file_analyzer{
    public $filename; 
    public $prefix;
    public $logFilename;
    
    private $comment = 0;

    private $cleanLine = "";
    private $lineCount = 0;
    private $linkCount = 0;
    private $incompleteInstruction = false;
    private $myFileHandler;
    private $aline;
    private $nextFile;
    private $dbug = false;
    private $t_dbug = false;
    private $log_dbug = true;
    
    private $allLinks  = array();
    
    function __construct($logFilename){
        
        $this->logFilename  = $logFilename;
#        $this->filename     = $filename;
#        $this->prefix       = $prefix;
        
    }
    function reset_File($filename, $prefix){
        
        $this->filename = $filename;
        $this->prefix   = $prefix;


        $this->cleanLine = "";
        $this->lineCount = 0;
        $this->linkCount = 0;
        
        $this->comment = 0;
        $this->incompleteInstruction = false;
        $singleQuotation = false;
        $doubleQuotation = false;
        
        $this->dbug = false;
        
        $this->allLinks = array();
        
    }
    function read_File( ){
        
        if($this->open_file_handler()){

            $this->fetch_lines();
            $this->close_file_handler();

        }

        return $this->allLinks;
    }

    function open_file_handler(){
        
        if( strpos( $this->filename , "/home3/backups6/public_html" )  !== false )
            echo  "<u>" . $this->prefix  ."</u>   ". substr( $this->filename, 41 ) ."<br>";    
        else
            echo  "<u>" . $this->prefix  ."</u>   ". $this->filename ."<br>";
            
        $this->myfileHandler = fopen( $this->filename, "r" );
        
        if ( !$this->myfileHandler ){
            
            if( $this->log_dbug )
                file_put_contents( $this->logFilename, $this->prefix . $this->filename . " cannot be opened." . PHP_EOL, FILE_APPEND | LOCK_EX);
            return false;
            
        } else {
            
            if( $this->log_dbug )
                $c=file_put_contents( $this->logFilename, $this->prefix . $this->filename . PHP_EOL, FILE_APPEND  );
            return true;

        }  
    }
    
    function close_file_handler(){
        
        fclose($this->myFileHandler);
        
    }
    
    
    function fetch_lines(){
        
        while(!feof($this->myfileHandler)){
            $this->lineCount ++;
            $this->aline = trim(fgets($this->myfileHandler));
            if($this->dbug){
                echo  $this->prefix  ."=>". $this->filename. ":". "line=" . $this->lineCount. ": " . $this->aline . "comment=". $this->comment. ", incom=". (int)$this->incompleteInstruction . "<br>";
                echo  "<br>";
            }
            if(!$this->incompleteInstruction)
                $this->cleanLine = "";

            $this->remove_comments();
            if($this->dbug){
               # echo ( $this->prefix  ."=>".$this->filename. ":". $this->lineCount . $this->cleanLine. "<br>");  
               # echo   $this->prefix  ."=>".$this->filename. ":". $this->lineCount . "len=". $len . ",cl-len=". strlen($this->cleanLine). "<br><br>";
            }            
            if( $this->comment !== 0 )
                continue;
       
            if( $this->is_define_constant() )
                continue;
              
            if( $this->is_global_variable() )    
                continue;
        
            if( !$this->is_require_statement() ) 
                continue;

            $this->get_full_name();

            $this->next_link ();
        }  
    }
    function remove_comments(){
        
        $len = strlen($this->aline);

        for($i=0; $i < $len; $i++){
            if( $i+1 < $len && $this->aline[ $i ] === '/'  && $this->aline[ $i+1 ] ==='*' ){
                
                $this->comment = 1;
                
            }else if( $i>0 && $this->aline[ $i-1 ] === '*' && $this->aline[ $i ] === '/' ){
                
                if( $this->comment === 1 ) 
                    $this->comment = 0;                
                    
            }else if ($i+1 < $len-1   &&   $this->aline[ $i ] === '/'   &&   $this->aline[ $i+1 ] === '/'){
                if( $this->comment === 0 )
                    $this->comment = 2;
                
            }else if( $this->aline[ $i ] ==='#' ){
                if( $this->comment === 0 )                
                    $this->comment = 3;
                
            }else if( $this->aline[ $i ]===';' ){
                
                if( $this->incompleteInstruction ) $this->incompleteInstruction = false;
                if( $this->comment === 0 ) $this->cleanLine .= (string)$this->aline[ $i ];
             #   $this->singleQuotation = false;
             #   $this->doubleQuotation = true;
                
            }else{
                
                if( $this->comment === 0 ){
                
                        if(  $this->aline[ $i ] ==='$'    )
                             $this->cleanLine .= "_";
                        else $this->cleanLine .= (string)$this->aline[ $i ];
    
                }    
                
                if( $this->aline[ $i ] === '\'' ) {
                    echo " single quotation ";
                    if( !$this->doubleQuotation ) {
                    
                         if( $this->singleQuotation )   $this->singleQuotation = false;
                        else                           $this->singleQuotation = true;
                    }     
            
                }else if( $this->aline[ $i ] === '"' ) {
                
                    if( !$this->singleQuotation ) {
                        
                        if( $this->doubleQuotation )    $this->doubleQuotation = false;
                        else                            $this->doubleQuotation = true;
                    }
                }    
                
            }
        }
        
        if ($len>0  
            && $this->aline[ $len-1 ] !== ';' 
            && $this->comment ===0 
            &&  $this->aline[ $len-1 ] !== '/' && $this->aline[ $len-2 ] !== '*' 
            && strpos( $this->aline, "<?php") ===false 
            && strpos( $this->aline, "?>")===false) 
        {
                
              $this->incompleteInstruction = true;
        }    
      
        if( $this->comment === 2 || $this->comment === 3 ){
            
            $this->comment = 0;
            
        }
    }
    
    function is_define_constant(){
        
        global $wpConstants;
   
        if( strpos( $this->cleanLine, "define(") !== false || strpos( $this->cleanLine, "define (") !== false )
        {
            
            
            if( strpos( $this->cleanLine, "define()" ) !== false || strpos( $this->cleanLine, "define( )" ) !== false)
                return false;
                
            $positionOfDefine = strpos( $this->cleanLine, "define(" ) ;
            $defineLine       = substr( $this->cleanLine, $positionOfDefine );
            
          #  if( strpos( $this->filename, "wp-config" ) === false)
          #      echo  $prefix  ."=>". $this->filename. ",  line". $this->lineCount ." <br><i>Define Constant:</i> ". $this->defineLine . "<br>";

            $myArray   = preg_split( "/[\(\),]+/", $defineLine );
            $trimName  = rtrim( ltrim( trim( $myArray[1] ), "\'\"" ), "\'\"" );
            $trimValue = rtrim( ltrim( trim( $myArray[2]),  "\'\"" ), "\'\"" );
            
            if( strpos( $myArray[1], "ABSPATH" ) === false && strpos( $myArray[1], "WP_CONTENT_DIR" ) === false ) {
                $wpConstants[ $trimName ] = $trimValue;
            }else {
            }
            
           # if(strpos($this->filename, "wp-config" ) === false)
           #    echo "--" . $myArray[1] . "=" . $wpConstants[$trimName]."<br><br>";

            return true;
        } else {
            return false;
        }  
    }
    
    function is_global_variable (){
         
        if( strpos( $this->cleanLine, "global" ) !== false ){
        #    echo  $this->prefix ."=>". $this->filename. ",  line". $this->lineCount ." <br><i>Global Variable:</i> ". $this->cleanLine . "<br><br>";
            return true;
        }else {
            return false;
        }    
    }
    
   
    
    function is_require_statement(){
        
        $requirePosition = 0; 
        $posArray = array();
        
        if(         ( $requirePosition = strpos( $this->cleanLine, "require "))      !== false ) {
            
            $posArray["type"]     = "require";
            $posArray["location"] = $requirePosition;
            
        } else if ( ( $requirePosition = strpos( $this->cleanLine, "include ") )     !== false ) {
            
            $posArray["type"]     = "include";
            $posArray["location"] = $requirePosition;
            #echo "<br>  File". $this->filename . " include: " . $this->cleanLine . "<br>";
            
        } else if ( ( $requirePosition = strpos( $this->cleanLine, "require_once ") ) !== false ) {
            
            $posArray["type"]     = "require_once";
            $posArray["location"] = $requirePosition;
            
        } else if ( ( $requirePosition = strpos( $this->cleanLine, "include_once ") ) !== false ) {
            
            $posArray["type"]     = "include_once";
            $posArray["location"] = $requirePosition;
            #echo "<br>  File". $this->filename . " line: ". $this->lineCount . " include_once: " . $this->cleanLine . "<br>";
            
        }else {}
        
        return $posArray;
        
    }
    
    function get_full_name(){
        
        global $wpConstants;
        
        $posArray = $this->is_require_statement();
  
        if( count ( $posArray  ) > 0 ) {
            $requireLine = substr( $this->cleanLine, $posArray["location"] );
 
            if(       $posArray["type"] === "require_once" ) {
            
                $this->nextFile  = trim ( substr ( $requireLine, 12), "\0\t\n\x0B\\r ;!" );
                
            }else if ( $posArray["type"] === "require" ) {
            
                $this->nextFile  = trim ( substr ( $requireLine, 7), "\0\t\n\x0B\\r ;!d" );
                
            }else  if (  $posArray["type"] === "include_once" ) {   
            
                $this->nextFile  = trim ( substr ( $requireLine, 12), "\0\t\n\x0B\\r ;!d" );
                
            }else if ( $posArray["type"] === "include" ) {
                
                $this->nextFile  = trim ( substr ( $requireLine, 7), "\0\t\n\x0B\\r ;!d" );
                
            }else {
                $this->nextFile = $requireLine; 
            }
            
            #if($this->dbug)       
            #   echo $this->prefix  ."=>". $this->filename . "-line=". $this->lineCount. ":". $this->cleanLine . ", requireline=" . $requireLine .  ", nextFile=". $this->nextFile . "<br>"; 
            #   echo "-line=". $this->lineCount. ":" . ", requireline=" . $requireLine .  ", nextFile=". $this->nextFile . "<br>"; 

            $myArray = preg_split( "/[\.\(\)\;\']+/", $this->nextFile );
            $sizeOfSplitArray = count( $myArray );
            
            
            
            if( $sizeOfSplitArray >= 3 ){
                $this->nextFile = "";
                
                $dirname_count = 0;
                $dirnameChain = "";
                $dirnameStatus = false;
                
                $constant_or_special_variable = 0;
                
                for( $i=0; $i < $sizeOfSplitArray - 3;  $i++ ) {
                    
                    $trimName  =rtrim( ltrim( trim( $myArray[$i] ), "\'\"" ), "\'\"" );
                    if($this->dbug) echo "trimname = " . $trimName;
                    
                    
                    if( strpos( "$trimName", "dirname" ) !== false ) {

                        if(!$dirnameStatus) $dirnameStatus = true;
                        $dirname_count++;
                        continue;

                    }else {

                        $dirnameStatus = false;
                        if(  strpos( "$trimName",  "WP_CONTENT_DIR" ) !== false ) {
                            
                            $dirnameChain = $wpConstants['WP_CONTENT_DIR'] ;  //$wpConstants [ 'currentDir' ];
                            $constant_or_special_variable = 1;
                            #echo "<br>chain=" . $dirnameChain . "<br>";
                            
                        }else if(  strpos( "$trimName",  "__DIR__" ) !== false ) {
                            
                            $dirnameChain = dirname( $this->filename );  //$wpConstants [ 'currentDir' ];
                            $constant_or_special_variable = 2;
                            
                        } else if (  strpos( "$trimName",  "ABSPATH" ) !== false ) {
                        
                            $dirnameChain = $wpConstants [ 'ABSPATH' ];
                            $constant_or_special_variable = 3;
                            
                        } else if (  strpos( "$trimName",  "_theme" ) !== false ) {
                        
                            $dirnameChain = $wpConstants [ 'theme' ];
                            $constant_or_special_variable = 4;
                            #echo "theme:" . $dirnameChain . "<br>";
                            
                        }    
                        
                        
                        if ( $constant_or_special_variable > 0 ) {

                            for( $dirCt = 0; $dirCt < $dirname_count;  $dirCt++ ) {
                                $dirnameChain = dirname ( $dirnameChain );
                            }    
                            $this->nextFile .= $dirnameChain; 
                            $constant_or_special_variable = 0;

                        } else { 
                    
                            if( count( $trimName) !== 0 ){
                                                
                                $this->nextFile .=  $wpConstants [ "$trimName" ];
                        
                                if($this->t_dbug)
                                    echo "Begin(t_dbug): *". $trimName. "=" . $wpConstants["$trimName"] . "*---End(t_dbug)<br>";

                            }
                        }    
                    }            
                }    
                $this->nextFile .= $myArray[ count( $myArray ) - 3 ]. "." . $myArray[ count( $myArray ) - 2 ];
                
                if($this->t_dbug) {
                    
                    echo "Begin(t_dbug): *". $this->nextFile . "*---End(t_dbug)<br><br>";
                    $this->t_dbug = false;
                }    
                
            }  else if( $sizeOfSplitArray === 2  ) { 
                
                $this->nextFile = $myArray[ 0 ];
              #  if($this->dbug)
               #    echo " Special require in " . $this->filename . ", line: " . $this->lineCount . ", link = " . $requireLine. ", file=" .  $this->nextFile . "<br>";
                
            } 
        }
    }
    
    function next_link(){
        
       # echo $this->prefix . "-" . $this->linkCount . " nextFile=" . $this->nextFile . "<br>";
        $this->allLinks[ $this->prefix . "-" . $this->linkCount ] = $this->nextFile;
        $this->linkCount ++; 
        
    } 
}

?>