<?php

 if( isset($_GET['lang'] ) )
{
  switch ($_GET['lang']) {
    case 'cn':
      $_SESSION["LANG"] = strtolower ( $_GET['lang'] );
       include("lang/cn.php");
      break;
    case 'en':
      $_SESSION["LANG"] = strtolower ( $_GET['lang'] );
       include("lang/en.php");
      break;
    default:
      $_SESSION["LANG"] = "en";
       include("lang/en.php");
      break;
  }
}
else {


   if(isset($_SESSION["LANG"])){
     include("lang/".$_SESSION["LANG"].".php");
   }
   else
    include("lang/en.php");
}