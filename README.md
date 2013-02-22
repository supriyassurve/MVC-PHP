MVC-PHP-BASE is a framework and still under construction and not completed as per the MVC pattern.
The framework will be as per the rails framework for ruby.

Need to work on Bugs like :
  If try to call view without php extenstion it works fine, but with php extention it crashes.
  Missing the actual flow of MVC (model, views and controller).  

Folder structure for this application is as follows:
<pre>
  app    
    |- assets    
        |- fonts
        |- images
        |- javascripts
        |- stylesheets
    |- classes
    |- helpers
    |- views
        |- Module Name
  config
    |- config.php
    |- constants.php
    |- database.php
    |- path_includes.php
    |- routes.php
  docs
  includes
    |- classes
        |- application.class.php
    |- helpers
        |- common_helper.php
    |- php
        |- active_queries.php
        |- authentication.php
        |- base.php
        |- structure.php
        |- word_plurals.php
  lib
  index.php
  login.php
  logout.php
  navigation.php
  session_settings.php
  signin.php
  ReadMe.txt
  </pre>

  Docs : this will hold the api for the project.
  Lib : will hold the external libraries/ plugins.
  
