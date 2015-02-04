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
<script>
  $.validator.setDefaults({
    submitHandler: function() {
      mailform.submit();
    }
  });
  $().ready(function() {
    // validate signup form on keyup and submit
    $("#mailform").validate({
      rules: {
        mail: "required",
        pwd: "required"
      }
    });
  });
</script>
  <form class="form-horizontal" method="post" id="mailform" name="mailform">
    <div class="form-group">
      <label class="col-sm-2 control-label" for="exampleInputEmail1">邮箱帐号</label>
      <div  class="col-sm-4">
        <input type="password" class="form-control" id="mail" name="mail" value="" >
      </div>
    </div>

    <div class="form-group">
      <label class="col-sm-2 control-label" for="exampleInputEmail1">密码</label>
      <div  class="col-sm-4">
        <input type="password" class="form-control" id="pwd" name="pwd" value="" >
      </div>
    </div>

    <div class="button-bar">
      <button type="submit"  id="submit" class="btn btn-primary">提交</button>
      <button type="reset"  id="return" class="btn ">重填</button>
    </div>
  </form>

  <style>
    .error{ color: #8f0907; }
  </style>

</div>
<!--foot-->
<?php include("com/foot.php"); ?>
</body>
</html>