<?php
include("include/login_info.php");
include("include/medoo.php");
include("include/database.php");
include("include/lang.php");
$database = new medoo($database_setting);
if(isset($_POST['mail']) && isset($_POST['pwd']) && isset($_SESSION["LOGIN_NAME"]) ){
  $where = array();
  $where['loginname'] = $_SESSION["LOGIN_NAME"];
  $result = $database->update( "loginuser"  ,array( 'email'=> $_POST["mail"] , 'emailpwd' => $_POST["pwd"] ) , $where );
}
?>
<html>
<head>
  <title><?php print $lang['website-title']; ?></title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <?php include("include/script.inc"); ?>
  <link href="css/page.css" rel="stylesheet">
  <script type="text/javascript" src="js/jquery.validate.min.js"></script>
</head>
<body>
<!--header-->
<?php include("com/head.php"); ?>
<!--main-->
<div class="main-body">
</div>
<!--foot-->
<?php include("com/foot.php"); ?>
</body>
</html>