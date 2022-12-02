<?php

  require 'config/config.php';
  require 'helpers/MembershipProvider.php';
  


  spl_autoload_register('myFunction');

  function myFunction($className){
      
      if(file_exists(__DIR__.'/libraries/'.$className.'.php'))
        require_once 'libraries/'.$className.'.php';
      
    }
    

   