<!--<script> alert( 'hello world');</script>-->
<?php

include("../include/medoo.php");
include("../include/database.php");

if( isset($_POST["ids"]) && !empty($_POST["ids"])) $ids = explode(',',$_POST["ids"]);
if( isset($ids) ){
  $hh = new hello($database_setting);
  $hh->d($ids);
  exit;
}
print_r( $_POST);
if( isset($_POST["dataid"]) ){
  $hh = new hello($database_setting);
  $hh->iu($_POST);
  exit;
}


class hello {
  private $database_setting = array();

  function __construct($database_setting){
    $this->database_setting = $database_setting;
  }
  public function d($arr){
    $database = new medoo($this->database_setting);
    $where = array();
    $where["member_id"] = $arr;
    $result = $database->delete('member',$where);
    if($result){
      print "result ". $result;
      print "<script>location.href=\"/member-list.php\"</script>";
    }
  }
  public function iu($arr){
     $database = new medoo($this->database_setting);
     $where = array();
    if(isset($arr["dataid"])&&$arr["dataid"]!=0){
      $where["member_id"] = $arr["dataid"];
      unset($arr["dataid"]);
      $result = $database->update('member',$arr,$where);
      if($result){
        print "result ". $result;
        //setTimeout("alert('对不起, 要你久候')",5000);
        print "<script>location.href=\"/member-list.php\"</script>";
      }
    }else{
      unset($arr["dataid"]);
      $result = $database->insert('member',$arr);
      if($result){
        print "<script>location.href=\"/member-list.php\"</script>";
      }
    }

  }
}