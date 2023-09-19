<!DOCTYPE html>
<html>
<head>
        
    <meta charset="utf-8">

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">    
    <style>
        body{
            background-color: powderblue;
        }
        header {
        	width: 100%;
        	padding-top: 2vw;
        	padding-bottom: 2vw;
        	text-align:center;
        	background-color: Indigo;
        	font-size: 4vw;
        	color: white;
        	font-weight: 800;
        }

        .topNav{
        	width:100%;
        	font-size: 1.5vw;
        	background-color: Indigo;
        	position:sticky;
        	top:0px;
        	z-index:5;
        }

        .topMenu{
        	display: inline-block;
        	padding-left: 1vw;
        	padding-right: 2vw;
        	padding-bottom: 1vw;
        	border: 2px solid green;
        }
        .wpFileStructureDL {
            display: none; 
            border: 1px dashed green; 
            margin-left: 1rem;
        }
        .wpFileStructureList{
            cursor: pointer;
            font-weight: bold;
        }
        .whu-nav-item{
            color: white;
        }
    </style>

</head>
<body>
<header>
    Whu-system <br>
     <span style="font-size: small;"> --  a restructure of WordPress file system. </span>
</header>

<nav class="topNav"> <!-- Begin <nav.TopNva> -->
    <ul class="nav nav-pills nav-tabs">
    <li class="nav-item">
      <a class="nav-link  whu-nav-item active" href="#wpfs" data-toggle="pill">WP File System</a>
    </li>
    <li class="nav-item">
      <a class="nav-link  whu-nav-item" href="#wpcs" data-toggle="pill">WP Calling Sequence</a>
    </li>
    <li class="nav-item">
      <a class="nav-link  whu-nav-item" href="#whufs" data-toggle="pill">WHU File System</a>
    </li>
    <li class="nav-item">
      <a class="nav-link  whu-nav-item" href="#whucs" data-toggle="pill">WHU Calling Sequence</a>
    </li>
    </ul>
</nav> <!-- End <nav.topNva>  -->

<!-- Tab panes -->
<div class="tab-content">                                   <!-- Begin <div.tab-content>  -->
  <div class="tab-pane container active" id="wpfs">         <!-- Begin <div#wpfs> -->
   <div class="container">                                  <!-- Begin <div.container> -1 -->
     <h3>WP File System</h3>
     <p>Wordpress is huge. There are four root folders: (1) cgi-bin; 
     (2) wp-amin; (3) wp-content; and (4) wp-include. Each folder is fairly complicated</p>
     
   </div>                                                   <!-- End   <div.container> -->

   <div class="container">                                  <!-- Begin <div.container>-2 -->
   <div class="row">                                        <!-- Begin <div.row> -->
    <div class="col-sm-6">                                  <!-- Begin <div.col-sm-6> -1 -->

     <dl> 
         <dt>wp-include</dt>
         <dd><span  id="plus_listOfFolders" class="wpFileStructureList">
                   + <u> Some Folders</u>
             </span><br>
             <dl id="listOfFolders" class="wpFileStructureDL">
             <dt>========</dt>
             <dd>assets</dd>
             <dd>block-patterns   </dd>
             <dd>block-supports   </dd>
             <dd>blocks   </dd>
             <dd>certificates   </dd>
             <dd>css   </dd>
             <dd>customize   </dd>
             <dd>fonts   </dd>
             <dd>ID3   </dd>
             <dd>images   </dd>
             <dd>IXR   </dd>
             <dd>js   </dd>
             <dd>PHPMailer   </dd>
             <dd>pomo   </dd>
             <dd>random_compat   </dd>
             <dd>Requests   </dd>
             <dd>rest_api   </dd>
             <dd>SimplePie   </dd>
             <dd>sitemaps   </dd>
             <dd>sodium_compat   </dd>
             <dd>Text   </dd>
             <dd>theme-compat   </dd>
             <dd>widgets   </dd>
             <dd>========</dd>
             </dl>
         </dd>
         <dd> <span  id="plus_listOfFiles" class="wpFileStructureList">
                 +   <u> Some Files</u>
              </span><br>
              
             <dl id="listOfFiles" class="wpFileStructureDL">
                 <dt>========</dt>
                 <dd>admin-bar.php   </dd>
                 <dd>atomlib.php   </dd>
                 <dd>author-template.php   </dd>
                 <dd>block-patterns.php   </dd>
                 <dd>blocks.php   </dd>
                 <dd>blookmark-template   </dd>
                 <dd>bookmark.php   </dd>
                 <dd>cache-compat.php   </dd>
                 <dd>cache.php   </dd>
                 <dd>canonical.php   </dd>
                 <dd>capabilities.php   </dd>
                 <dd>category.php   </dd>
                 <dd>========</dd>
            </dl>     
         </dd>
         
         <dd>
             <span id="plus_listOfClasses" class="wpFileStructureList"> 
             +  <u> A lot of classes</u>
             </span>
             <br>
              
             <dl id="listOfClasses" class="wpFileStructureDL">
                 <dt>========</dt>
                 <dd>class-feed.php   </dd>
                 <dd>class-ttp.php   </dd>
                 <dd>class-IXR.php   </dd>
                 <dd>class.json.php   </dd>
                 <dd>class-oembed.php   </dd>
                 <dd>class-phpass.php   </dd>
                 <dd>class-phpmailer.php   </dd>
                 <dd>class-pop3.php   </dd>
                 <dd>class-requests.php   </dd>
                 <dd>class-simplepie.php   </dd>
                 <dd>class-smtp.php   </dd>
                 <dd>class-snoopy.php   </dd>
                 <dd>class-walker-category-dropdown.php   </dd>
                 <dd>class-walker-category.php   </dd>
                 <dd>class-walker-comment.php   </dd>
                 <dd>class-walker-nav-menu.php   </dd>
                 <dd>class-walker-page-dropdown.php   </dd>
                 <dd>class-walker-page.php   </dd>
                 <dd>class-wp-admin-bar.php   </dd>
                 <dd>class-wp-ajax-response.php   </dd>
                 <dd>class-wp-application-passwords.php   </dd>
                 <dd>class-wp-block-list.php   </dd>
                 <dd>class-wp-block-parser.php   </dd>
                 <dd>class-wp-block-pattern-categories-registry.php   </dd>
                 <dd>class-wp-block-patterns-registry.php   </dd>
                 <dd>class-wp-block-styles-registry.php   </dd>
                 <dd>class-wp-block-supports.php   </dd>
                 <dd>class-wp-block-type-registry.php   </dd>
                 <dd>class-block-type.php   </dd>
                 <dd>class-wp-block.php   </dd>
                 <dd>class-wp-comment-query.php   </dd>
                 <dd>class-wp-comment.php   </dd>
                 <dd>class-wp-customize-control.php   </dd>
                 <dd>class-wp-customize-manager.php   </dd>
                 <dd>class-wp-customize-nav-menu.php   </dd>
                 <dd>class-wp-customize-panel.php   </dd>
                 <dd>class-wp-customize-section.php   </dd>
                 <dd>class-wp-customize-manager.php   </dd>
                 <dd>class-wp-customize-nav-menus.php   </dd>
                 <dd>class-wp-customize-panel.php   </dd>
                 <dd>class-wp-customize-section.php   </dd>
                 <dd>class-wp-customize-setting.php   </dd>
                 <dd>class-wp-customize-widgets.php   </dd>
                 <dd>class-wp-date-query.php   </dd>
                 <dd>class-wp-dependency.php   </dd>
                 <dd>class-wp-editor.php   </dd>
                 <dd>class-wp-embed.pgp   </dd>
                 <dd>class-wp-error.php   </dd>
                 <dd>class-wp-fatal-error-handler.php   </dd>
                 <dd>class-wp-feed-cache-transient.php  </dd>
                 <dd>class-wp-feed-cache.php   </dd>
                 <dd>class-wp-hook.php   </dd>
                 <dd>class-wp-http-cookie.php   </dd>
                 <dd>class-wp-http-curl.php   </dd>
                 <dd>class-wp-http-encoding.php   </dd>
                 <dd>class-wp-http-ixr-client.php  </dd>
                 <dd>class-wp-http-proxy.php   </dd>
                 <dd>class-wp-http-requests-hooks.php   </dd>
                 <dd>class-wp-http-requests-response.php   </dd>
                 <dd>class-wp-http-response.php   </dd>
                 <dd>class-wp-http-streams.php   </dd>
                 <dd>class-wp-image-editor-gd.php   </dd>
                 <dd>class-wp-image-editor-imagick.php   </dd>
                 <dd>class-wp-image-editor.php   </dd>
                 <dd>class-wp-list-util.php   </dd>
                 <dd>class-wp-locale-switcher.php   </dd>
                 <dd>class-wp-locale.php   </dd>
                 <dd>class-wp-matchesmapregex.php   </dd>
                 <dd>class-wp-meta-query.php   </dd>
                 <dd>class-wp-metadata-lazyloader.php   </dd>
                 <dd>class-wp-network-query.php   </dd>
                 <dd>class-wp-network.php   </dd>
                 <dd>class-wp-object-cache.php   </dd>
                 <dd>class-wp-oembed-controller.php   </dd>
                 <dd>class-wp-oembed.php   </dd>
                 <dd>class-wp-paused-extensions-storage.php   </dd>
                 <dd>class-wp-post-type.php   </dd>
                 <dd>class-wp-hosts.php   </dd>
                 <dd>class-wp-query.php   </dd>
                 <dd>class-wp-recovery-mode-cookie-service.php   </dd>
                 <dd>class-wp-recevery-mode-email-service.php   </dd>
                 <dd>class-wp-recovery-mode-key-service.php   </dd>
                 <dd>class-wp-recovery-mode-link-service.php   </dd>
                 <dd>class-wp-recovery-mode.php   </dd>
                 <dd>class-wp-rewrite.php   </dd>
                 <dd>class-wp-role.php   </dd>
                 <dd>class-wp-roles.php   </dd>
                 <dd>class-wp-session-tokens.php   </dd>
                 <dd>class-wp-simplepie.php   </dd>
                 <dd>class-wp-simplepie-sanitize-kses.php   </dd>
                 <dd>class-wp-site-query.php   </dd>
                 <dd>class-wp-site.php   </dd>
                 <dd>class-wp-tax-query.php   </dd>
                 <dd>class-wp-taxonomy.php   </dd>
                 <dd>class-wp-term-query.php   </dd>
                 <dd>class-wp-term.php   </dd>
                 <dd>class-wp-text-diff-renderer-inline.php   </dd>
                 <dd>class-wp-text-diff-renderer-table.php   </dd>
                 <dd>class-wp-theme.php   </dd>
                 <dd>class-wp-user-meta-session-tokens.php   </dd>
                 <dd>class-wp-user-query.php   </dd>
                 <dd>class-wp-user-request.php   </dd>
                 <dd>class-wp-user.php   </dd>
                 <dd>class-wp-walker.php   </dd>
                 <dd>class-wp-widget-factory.php   </dd>
                 <dd>class-wp-widget.php   </dd>
                 <dd>class-xp-xmlrpc-server.php   </dd>
                 <dd>class-wp.php   </dd>
                 <dd>class.wp-dependencies.php   </dd>
                 <dd>class.wp-scripts.php   </dd>
                 <dd>class.wp-styles.php   </dd>
                 <dd>========</dd>
             </dl> 
         </dd>
         <dd>
             <span id="plus_listOfMoreFiles" class="wpFileStructureList">
                  + <u> More Files</u>
             </span>  
             <br>
             <dl id="listOfMoreFiles"  class="wpFileStructureDL">
                 <dt>========</dt>
                 <dd>comment-template.php   </dd>
                 <dd>comment.php   </dd>
                 <dd>compat.php   </dd>
                 <dd>cron.php   </dd>
                 <dd>date.php   </dd>
                 <dd>default-constants.php   </dd>
                 <dd>default-filters.php   </dd>
                 <dd>default-widgets.php   </dd>
                 <dd>deprecated.php   </dd>
                 <dd>embed-template.php   </dd>
                 <dd>embed.php   </dd>
                 <dd>error-protection.php   </dd>
                 <dd>feed-atom-comments.php   </dd>
                 <dd>feed-atom.php   </dd>
                 <dd>feed-rdf.php   </dd>
                 <dd>feed-rss.php   </dd>
                 <dd>feed-rss2-comments.php   </dd>
                 <dd>feed-rss2.php   </dd>
                 <dd>feed.php   </dd>
                 <dd>formatting.php   </dd>
                 <dd>functions.php   </dd>
                 <dd>functions.wp-scripts.php   </dd>
                 <dd>functions.wp-styles.php   </dd>
                 <dd>general-template.php   </dd>
                 <dd>http.php   </dd>
                 <dd>https-detection.php   </dd>
                 <dd>https-migration.php   </dd>
                 <dd>kses.php   </dd>
                 <dd>I10n.php   </dd>
                 <dd>link-template.php   </dd>
                 <dd>load.php   </dd>
                 <dd>locale.php   </dd>
                 <dd>media-template.php   </dd>
                 <dd>media.php   </dd>
                 <dd>meta.php   </dd>
                 <dd>ms-blogs.php   </dd>
                 <dd>ms-default-constants.php   </dd>
                 <dd>ms-default-filters.php   </dd>
                 <dd>ms-deprecated.php   </dd>
                 <dd>ms-files.php   </dd>
                 <dd>ms-functions.php   </dd>
                 <dd>ms-load.php   </dd>
                 <dd>ms-network.php   </dd>
                 <dd>ms-settings.php   </dd>
                 <dd>ms-site.php   </dd>
                 <dd>nav-menu-template.php   </dd>
                 <dd>nav-menu.php   </dd>
                 <dd>option.php   </dd>
                 <dd>pluggable-depracted.php   </dd>
                 <dd>pluggable.php   </dd>
                 <dd>plugn.php   </dd>
                 <dd>post-fromats.php   </dd>
                 <dd>post-template.php   </dd>
                 <dd>post-thumbnail-template.php   </dd>
                 <dd>post.php   </dd>
                 <dd>query.php   </dd>
                 <dd>registration-functions.php   </dd>
                 <dd>registration.php   </dd>
                 <dd>rest-api.php   </dd>
                 <dd>revision.php   </dd>
                 <dd>rewrite.php   </dd>
                 <dd>robots-template.php   </dd>
                 <dd>rss-functions.php   </dd>
                 <dd>rss.php   </dd>
                 <dd>script-loader.php   </dd>
                 <dd>session.php   </dd>
                 <dd>shortcodes.php   </dd>
                 <dd>sitemaps.php   </dd>
                 <dd>sql-autoload-compat.php   </dd>
                 <dd>taxonomy.php   </dd>
                 <dd>template-loader.php   </dd>
                 <dd>template.php   </dd>
                 <dd>theme.php   </dd>
                 <dd>update.php   </dd>
                 <dd>user.php   </dd>
                 <dd>vars.php   </dd>
                 <dd>version.php   </dd>
                 <dd>widgets.php   </dd>
                 <dd>wlwmanifest.xml   </dd>
                 <dd>wp-db.php   </dd>
                 <dd>wp-diff.php   </dd>
                 <dd>========</dd>
                 <dd>   </dd>
                 <dd>   </dd>
                 <dd>   </dd>
            </dl>
         </dd>    
     </dl>

   </div>                                                   <!-- End   <div.col-sm-6> -1  -->
   <div class="col-sm-6">                                   <!-- Begin <div.col-sm-6> -2 -->
    <dl> 
      <dt>wp-content</dt>

        <dd><span  id="plus_listOfFoldersWpContent" class="wpFileStructureList">
                   + <u> Some Folders</u>
            </span><br>
            <dl id="listOfFoldersWpContent"  class="wpFileStructureDL">
             <dt>========</dt>
            </dl>
        </dd>
        <dd><span id="plus_listOfFilesWpContent" class="wpFileStructureList">
                   + <u> Some Files</u>
            </span><br>
            <dl id="listOfFilesWpContent"  class="wpFileStructureDL">
             <dt>========</dt>
            </dl>
        </dd>


      <dt>wp-admin</dt>
        <dd><span   id="plus_listOfFoldersWpAdmin" class="wpFileStructureList">
                   + <u> Some Folders</u>
            </span><br>
            <dl id="listOfFoldersWpAdmin"  class="wpFileStructureDL">
             <dt>========</dt>
            </dl>
        </dd>

        <dd><span  id="plus_listOfFilesWpAdmin" class="wpFileStructureList">
                   + <u> Some Files</u>
            </span><br>
            <dl id="listOfFilesWpAdmin"  class="wpFileStructureDL">
             <dt>=========</dt>
            </dl>
        </dd>

      <dd></dd>
    </dl>
   </div>                                                   <!-- End of <div.col-sm-6> - 2 -->
</div>                                                      <!-- End of <div.row> -->
</div>                                                      <!-- End of <div.container>-2 --> 

      
  </div>                                                    <!-- End   <div#wpfs> -->


  <div class="tab-pane container fade" id="wpcs">           <!-- Begin  <div#wpcs> -->
 
   <div class="container">                                  <!-- Begin <div.container> -->
   <div class="row">                                        <!-- Begin <div.row> -->
    <div class="col-sm-6">                                  <!-- Begin <div.col-sm-6> -1 -->
       <h3>WP Calling Sequence</h3>
   
      <p> When a user requests a webpage, WordPress will follow the following order of process  </p>
      <ol><li>index.php                                     <!-- Begin <ol><li>index.php   -->
          <ol>                                              <!-- Begin <ol>call sequence inside index.php -->
            <li>     define WP_USE_THEMES; and<br></li>
            <li>    require __DIR__ . '/wp-blog-header.php';
                <ol>
                 <li>define ABSPATH</li>
                 <li>error_reporting</li>
                </ol>
            </li>
          </ol>                                             <!-- End <ol>call sequence inside index.php -->
      </ol>                                                 <!-- End <ol><li>index.php -->    
      <br><br><br><br><br>
    </div>                                                   <!-- End   <div.col-sm-6> -1  -->
    <div class="col-sm-6">                                   <!-- Begin <div.col-sm-6> -2 -->
       <h3>TBA</h3>
    </div>                                                   <!-- End of <div.col-sm-6> - 2 -->
    </div>                                                      <!-- End of <div.row> -->
    </div>                                                      <!-- End of <div.container>--> 

      
  </div>                                                    <!-- End    <div#wpcs> -->
  <div class="tab-pane container fade" id="whufs">          <!-- Begin  <div#whufs> -->
      TBA
  </div>                                                    <!-- End    <div#whufs> -->
  <div class="tab-pane container fade" id="whucs">          <!-- Begin  <div#whucs> -->
      TBA
      
  </div>                                                    <!-- End    <div#whucs -->
</div>                                                      <!-- End   <div.tab-content> -->         
    <script>
        document.getElementById("plus_listOfFolders").addEventListener(
            "click",
            function(){
                toggleWpInclude("listOfFolders");
            }    
       );      
       document.getElementById("listOfFolders").addEventListener(
            "click",
            function(){
                toggleWpInclude("listOfFolders");
            }    
       );
       document.getElementById("plus_listOfFiles").addEventListener(
            "click",
            function(){
                toggleWpInclude("listOfFiles");
            }    
       );      
       document.getElementById("listOfFiles").addEventListener(
            "click",
            function(){
                toggleWpInclude("listOfFiles");
            }    
       );
       document.getElementById("plus_listOfClasses").addEventListener(
            "click",
            function(){
                toggleWpInclude("listOfClasses");
            }    
       );      
       document.getElementById("listOfClasses").addEventListener(
            "click",
            function(){
                toggleWpInclude("listOfClasses");
            }    
       );
       document.getElementById("plus_listOfMoreFiles").addEventListener(
            "click",
            function(){
                toggleWpInclude("listOfMoreFiles");
            }    
       );      
       document.getElementById("listOfMoreFiles").addEventListener(
            "click",
            function(){
                toggleWpInclude("listOfMoreFiles");
            }    
       );
       
       
       document.getElementById("plus_listOfFoldersWpContent").addEventListener(
            "click",
            function(){
                toggleWpInclude("listOfFoldersWpContent");
            }    
       );      
       document.getElementById("listOfFoldersWpContent").addEventListener(
            "click",
            function(){
                toggleWpInclude("listOfFoldersWpContent");
            }    
       );
       document.getElementById("plus_listOfFilesWpContent").addEventListener(
            "click",
            function(){
                toggleWpInclude("listOfFilesWpContent");
            }    
       );      
       document.getElementById("listOfFilesWpContent").addEventListener(
            "click",
            function(){
                toggleWpInclude("listOfFilesWpContent");
            }    
       );
       
       

       document.getElementById("plus_listOfFoldersWpAdmin").addEventListener(
            "click",
            function(){
                toggleWpInclude("listOfFoldersWpAdmin");
            }    
       );      
       document.getElementById("listOfFoldersWpAdmin").addEventListener(
            "click",
            function(){
                toggleWpInclude("listOfFoldersWpAdmin");
            }    
       );
       document.getElementById("plus_listOfFilesWpAdmin").addEventListener(
            "click",
            function(){
                toggleWpInclude("listOfFilesWpAdmin");
            }    
       );      
       document.getElementById("listOfFilesWpAdmin").addEventListener(
            "click",
            function(){
                toggleWpInclude("listOfFilesWpAdmin");
            }    
       );
       

       function toggleWpInclude(theClicked){
            var currentElement = document.getElementById(theClicked);
            if (currentElement.style.display === 'none')
                currentElement.style.display = 'block'; 
            else
                currentElement.style.display = 'none';
       }    
       
       
    </script>
    <script>
         var folders_wp_content =  ["mu-plugins", "plugins", "themes", "upgrae", "uploads"];
         var files_wp_content   =  ["index.php"];
         
         var folders_wp_admin   =  ["css","images","includes", "js", "maint",
                                    "network", "user"];
         var files_wp_admin     =  ["about.php", "admin-ajax.php", "admin-footer.php",
                                    "admin-functions.php", "admin-header.php", "admin-post.php",
                                    "admin.php", "async-upload.php", "authorize-application.php",
                                    "comment.php", "credits.php", "custom-background.php",
                                    "custom-header.php", "customize.php", "edit-comments.php",
                                    "edit-form-advanced.php", "edit-form-blocks.php", "edit-form-comment.php",
                                    "edit-link-form.php","edit-tag-form.php", "edit-tags.php", "edit.php",
                                    "erase-personal-data.php","error_log", "export_personal-data.php",
                                    "export.php", "freedoms.php", "import.php", "index.php",
                                    "install-helper.php", "install.php", "link-add.php", "link-manager.php",
                                    "link-parse-opml.php", "link.php", "load-scripts.php", "load-styles.php",
                                    "media-new.php","media-upload.php", "media.php", "menu-header.php",
                                    "menu.php", "moderation.php", "ms-admin.php", "ms-delete-site.php",
                                    "ms-edit.php", "ms-options.php", "ms-sites.php", "ms-themes.php",
                                    "ms-upgrade-network.php", "ms-users.php", "ms-sites.php", "nav-menus.php",
                                    "network.php", "options-discussion.php", "options-general.php",
                                    "options-head.php", "options-media.php", "options-permalink.php",
                                    "options-privacy.php", "options-reading.php", "options-writing.php",
                                    "options.php", "pluginn-editor.php","plugin-install.php", "plugins.php",
                                    "post-new.php","post.php", "press-this.php", "privacy-policy-guide.php",
                                    "privacy.php", "profile.php", "revision.php", "setup-config.php",
                                    "site-health.info.php","site-health.php","term.php","theme-editor.php",
                                    "theme-install.php","themes.php","tools.php","update-core.php",
                                    "update.php","update-functions.php", "upgrade.php",
                                    "upload.php","user-edit.php","user-new.php", "users.php", "widgets.php"];
                                    
                                    
         $(document).ready(function(){ 
            folders_wp_content.forEach(function (value, index, array){
                $("#listOfFoldersWpContent").append("<dd>"+value+"</dd>");
            });
            $("#listOfFoldersWpContent").append("<dd>=======</dd>");
            files_wp_content.forEach(function (value, index, array){
                $("#listOfFilesWpContent").append("<dd>"+value+"</dd>");
            });
            $("#listOfFilesWpContent").append("<dd>======</dd>");
            
            folders_wp_admin.forEach(function (value, index, array){
                $("#listOfFoldersWpAdmin").append("<dd>"+value+"</dd>");
            });
            $("#listOfFoldersWpAdmin").append("<dd>======</dd>");


            files_wp_admin.forEach(function (value, index, array){
                $("#listOfFilesWpAdmin").append("<dd>"+value+"</dd>");
            });
            $("#listOfFilesWpAdmin").append("<dd>======</dd>");
         });
         
         
      </script>
</body>
</html>