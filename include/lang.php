<?php

 if( isset($_GET['lang'] ) )
    {   
      switch ($_GET['lang']) {
        case 'cn':
           include("include/cn.php");
          break;
        case 'en':
           include("include/en.php");
          break;
        default:
           include("include/cn.php");
          break;
      } 
    }
else 
   include("include/cn.php");