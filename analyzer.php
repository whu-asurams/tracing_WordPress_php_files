<?php

/*
  The code below will trace wordpress files that are used. It is a reverse engineering of the WordPress system.

  There are two classes:
    1. analyzer
    2. file_analyzer

  The analyzer class will log the next file in the loading sequence using 
     $this->traceFile         = new file_analyzer($this->logFilename);
  It will log the next file under current files.   
      
*/


class analyzer {

    /*
        Information to be logged:
            1. the number of files loading in the sequences, repetitions allowed
            2. the log will be stored inside a file, $logFilename
            3. the log start from a given file, $startFilename
            4. the tree structure of files loaded, $allFileSystem
    */
    public $fileCount=0;

    public $logFilename;   

    public $startFilename;
    public $encodedString; // = json_encode($wpConstants);

    private $allFileSystem = array();

    private $traceFile;


    /*
        constructor
          It will take two parameters: 
          1. the file to store the log ($logFilename) and
          2. the beginning file where trace starts
    */

    function __construct( $logFilename, $startFilename ){
        
        $this->logFilename        = $logFilename;
        $this->startFilename      = $startFilename;
        $this->traceFile         = new file_analyzer($this->logFilename);
        
    }

    /*
        The start of the trace.
    */
    function run(){
        
        $this->next_File($this->startFilename, "0");
        unset($this->traceFile);
        
        #$this->encodedString = json_encode($this->allFileSystem);
        #file_put_contents( $this->logFilename, $this->encodedString . PHP_EOL, FILE_APPEND  );
        
        #$this->encodedString = json_encode($wpConstants);
        #file_put_contents( $this->logFilename, $this->encodedString . PHP_EOL, FILE_APPEND  );
        
        #var_dump($this->allFileSystem);
        
        echo "Mission Completed";
    }

    /*
        add the information of next file into the the log file ($logFilename).
    */

    function next_File($currentFile, $currentPrefix){
        
        #if($this->fileCount > 100) {
        #    return;
        #}
        
        foreach ( $this->allFileSystem as $key => $value ) {
            
            #echo $value . " = " . $currentFile .  "<br>";
            if ( strpos ( $value,  trim($currentFile) ) !== false ) {
                
                echo $currentPrefix . " " . substr( $currentFile, 41 ) . " repeat " . $key . " " . substr ( $value, 41 ) . "<br>";
                file_put_contents( $this->logFilename,  $currentPrefix . " " . $currentFile . " repeat " . $key . " " . $value .  PHP_EOL, FILE_APPEND  );
                $this->allFileSystem [ "$currentPrefix" ]     =          $currentFile . " repeat " . $key . $value;
                
                return;
            } 
        }
        
        $this->allFileSystem [ "$currentPrefix" ]     =   $currentFile;
        $this->fileCount++;

        
        $this->traceFile->reset_File($currentFile, $currentPrefix);
        $allLinks    =   $this->traceFile->read_File();
    /*      
        if( strpos( $this->traceFile->filename, "wp-settings.php") !== false ) {
            echo "<br>"; 
            foreach ( $allLinks as $myPrefix =>$myFilename ){
                
                echo $myFilename . "<br>";
                
            }    
        }    
    */         
        foreach ( $allLinks as $myPrefix =>$myFilename ){
            
            $this->next_File($myFilename, $myPrefix);
            
        }  
    }
}

?>