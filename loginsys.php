<?
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

    $log = trim ( $_POST["log"] );
    $pwd = trim ( $_POST["pwd"] );
    $remember = empty($_POST["check-field"])?"":$_POST["check-field"];
    /*$lang = $_GET["language"];*/
    $sql = "select * from loginuser where loginpwd = '". md5($pwd) ."' and loginname = '".md5($log)."' ";
    $where = array(  );

    $where["and"] = array("loginname" => $log ,"loginpwd" => md5($pwd) );
    $result = $database -> select("loginuser","*",$where);
    //var_dump( $result );
    /*
     * 1.login name or password fail
     * 2.success login
     * 3.fail contact administrator
     * 4.
     *
     * */
    if($result){

      if($result[0]["loginname"]==$log){
        session_start();
        $_SESSION["LOGIN_NAME"] = $log;
        print 2;
        exit;
      }else{
        print 3;
        exit;
      }
    /*  $saveTime = 60 * 60 * 24 * 7 * 12 ;
      if($remember){
        setcookie( "remember" , $log , strtotime("+1 week") );
      }else{
        setcookie( "remember" , "" , -strtotime("-1 week")  );
        unset( $_COOKIE["remember"] );
      }
*/
    }else{
      print "1"; exit;
    }




  
	 
?>