<?php

 if( isset($_GET['lang'] ) )
    {   
      switch ($_GET['lang']) {
        case 'cn':
           include("lang/cn.php");
          break;
        case 'en':
           include("lang/en.php");
          break;
        default:
           include("lang/en.php");
          break;
      } 
    }
else 
   include("lang/en.php");