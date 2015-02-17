<?php
include("include/medoo.php");
include("include/database.php");
include("include/lang.php");
$database = new medoo($database_setting);
?>
<html>
<head>
  <title><?php print $lang['website-title']; ?></title>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <?php include("include/script.inc"); ?>
  <link href="css/page.css" rel="stylesheet">
  <script type="text/javascript" src="js/loginsys.js" ></script>
</head>
<body>

<div class="site-wrapper">
  <div class="site-wrapper-inner">
    <div class="alert alert-info" id="alert-info" role="alert"></div>
<div class="loginhead"></div>

<div class="loginbody">

  <div class="inner-form" id="inner-form">

  <form name="member-form" id="login-form" role="form" class="form-horizontal"  onkeypress="if(event.keyCode==13||event.which==13){ submitcheck();return false;}" >
    <div class="form-group">
      <label for="exampleInputEmail1">Login name</label>
      <input type="email" class="form-control" id="username" name="log" placeholder="Login name" autocomplete="off" >
    </div>
    <div class="form-group">
      <label for="exampleInputPassword1">Password</label>
      <input type="password" class="form-control" id="password" name="pwd" placeholder="Password">
    </div>

    <div class="btn-div">
    <button type="button" id="submit-form" class="btn btn-primary">Login</button>
    <button type="button" id="cancel-form" class="btn btn-default">Cancel</button>
    </div>
    </form>
  </div>
  <div class="text_success"><img src="images/loader_green.gif" alt=""/><span>Loading...</span></div>
</div>

<div class="loginfoot">
  © 2015 Matakana Estate
</div>
  </div>
</div>
</body>
</html>