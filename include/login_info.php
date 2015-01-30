<?php
/**
 * Created by PhpStorm.
 * User: leven
 * Date: 2015/1/29
 * Time: 17:53
 */

session_start();
if ( isset($_SESSION["LOGIN_NAME"]) && !empty($_SESSION["LOGIN_NAME"])  ){

}else{
  print "<script>window.location=\"/login.php\"</script>";
  exit;
}