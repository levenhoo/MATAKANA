<?php
include("include/login_info.php");
include("include/medoo.php");
include("include/database.php");
include("include/lang.php");
$database = new medoo($database_setting);
if(isset($_POST['curpwd']) && isset($_POST['newpwd']) && isset($_SESSION["LOGIN_NAME"]) ){
  $where = array();
  $where['and'] = array( 'loginname'=> $_SESSION["LOGIN_NAME"] , 'loginpwd'=> md5($_POST['curpwd'])  );
  $result = $database->update("loginuser" ,array('loginpwd'=> md5($_POST["newpwd"])) , $where );
}
?>
<html>
<head>
  <title><?php print $lang['website-title']; ?></title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <?php include("include/script.inc"); ?>
  <link href="css/page.css" rel="stylesheet">

</head>
<body>
<!--header-->
<?php include("com/head.php"); ?>
<!--main-->
<div class="main-body">
<script>

  $.validator.setDefaults({
    submitHandler: function() {
      signupForm.submit();
    }
  });

  $().ready(function() {
    // validate signup form on keyup and submit
    $("#signupForm").validate({
      rules: {
        curpwd: "required",
        newpwd: {
          required: true,
          minlength: 5
        },
        repwd: {
          required: true,
          minlength: 5,
          equalTo: "#newpwd"
        }
      },
      messages: {
        curpwd: "Please enter your password"
      }
    });
  });

</script>
  <form class="form-horizontal" method="post" id="signupForm" name="signupForm">
    <div class="form-group">
      <label class="col-sm-2 control-label" for="exampleInputEmail1">原始密码</label>
      <div  class="col-sm-4">
        <input type="password" class="form-control" id="curpwd" name="curpwd" value="" >
      </div>
    </div>

    <div class="form-group">
      <label class="col-sm-2 control-label" for="exampleInputEmail1">新密码</label>
      <div  class="col-sm-4">
        <input type="password" class="form-control" id="newpwd" name="newpwd" value="" >
      </div>
    </div>

    <div class="form-group">
      <label class="col-sm-2 control-label" for="exampleInputEmail1">再输入一次</label>
      <div  class="col-sm-4">
        <input type="password" class="form-control" id="repwd" name="repwd" value="" >
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