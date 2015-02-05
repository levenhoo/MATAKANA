<?
 /*
  * 1.success login
  * 2.name or password fail
  * 3.status 2
  * 4.fail contact administrator
  * 5 block user
  * 6.block ip
  * 7.robot
  * */

    header( 'Content-type: text/html; charset=utf-8' );	
	  header( 'Expires: Mon, 26 Jul 1997 05:00:00 GMT' );
    header( 'Last-Modified: ' . gmdate( 'D, d M Y H:i:s' ) . ' GMT' );
    header( 'Cache-Control: no-store, no-cache, must-revalidate' );
    header( 'Cache-Control: post-check=0, pre-check=0', false );
    header( 'Pragma: no-cache' );  
    /*include*/
    include("include/medoo.php");
    include("include/database.php");
    include("include/lang.php");
    $database = new medoo($database_setting);

    //ip check log history
    if( logincount($database, $_SERVER["REMOTE_ADDR"]) > 10 ){
      print 6;
      exit;
    }
    //
    if(  !isset( $_POST["log"] ) || !isset( $_POST["pwd"] )  ){
      //robot
      loginlog($database, $_SERVER["REMOTE_ADDR"] ,"robot" , 0 );
      print 7;
      exit;
    }
    $log = trim($_POST["log"]);
    $pwd = trim($_POST["pwd"]);

    //=====================================

    $where = array(  );
    $where["and"] = array("loginname" => $log ,"loginpwd" => md5($pwd) );
    $result = $database -> select("loginuser","*",$where);
    //var_dump( $result );

    if($result){

      if($result[0]["loginerror"]>10){
        print 5;
        exit;
      }
      if($result[0]["loginname"]==$log && $result[0]["status"] == 1){
        session_start();
        $_SESSION["LOGIN_NAME"] = $log;
        $_SESSION["LOGIN_ROLE"] =  $result[0]["role"];
        $_SESSION["LOGIN_STATUS"] = $result[0]["status"];
        $_SESSION["LOGIN_EMAIL"] = $result[0]["email"];
        $_SESSION["LOGIN_EMAILPWD"] = $result[0]["emailpwd"];
        loginlog($database, $_SERVER["REMOTE_ADDR"],$log,1 );
        print 1;
        exit;
      }else if($result[0]["status"] == 2){
        loginlog($database, $_SERVER["REMOTE_ADDR"],$log,0 );
        print 3;
        exit;
      }else{
        loginlog($database, $_SERVER["REMOTE_ADDR"],$log,0 );
        print 4;
        exit;
      }
    }else{
      loginlog($database, $_SERVER["REMOTE_ADDR"],$log,0 );
      print 2; exit;
    }


//---------------------------------------
//function
//---------------------------------------

 /*
  * login count
  */
function logincount($database,$ip){
  $where = array();
  $where["and"] = array("loginip"=>$ip ,"loginresult" => 0 , "logintime[>]" => date("Y-m-d H:i:s" ,strtotime("-30 minute") ) );
  $result = $database->count("loginlog",$where);
  return $result;
}

function loginlog($database,$ip,$name,$log_result){
  $data = array();
  $data["loginname"] = $name;
  $data["logintime"] = date("Y-m-d H:i:s");
  $data["loginip"] = $ip;
  $data["loginresult"] = $log_result;
  $database->insert("loginlog",$data);
  if($log_result){
    $database->update("loginuser",array("loginerror"=> 0 ),array("loginname"=> $name ));
  }else{
    $database->update("loginuser",array("loginerror[+]"=> 1 ),array("loginname"=> $name ));
  }
}
?>