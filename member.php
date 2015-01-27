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
  <?php include("include/script.inc"); ?>
  <link href="css/page.css" rel="stylesheet">
</head>
<body>
<div class="site-wrapper">
  <div class="site-wrapper-inner">
    <div class="cover-container">
      <!--header-->
      <?php include("com/head.php"); ?>
      <!--main-->
      <div class="inner cover">
        <?php include("com/member.php"); ?>
      </div>
      <!--foot-->
      <?php include("com/foot.php"); ?>
    </div>
  </div>
</div>
</body>
</html>