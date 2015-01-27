<?php
include("include/medoo.php");
include("include/database.php");
include("include/lang.php");
$database = new medoo($database_setting);
$where = array();
$where['LIMIT'] = 10;
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
        <h1 class="cover-heading">Cover your page.</h1>
        <p class="lead">Cover is a one-page template for building simple and beautiful home pages. Download, edit the text, and add your own fullscreen background photo to make it your own.</p>
        <p class="lead"><a href="#" class="btn btn-lg btn-default">Learn more</a></p>
      </div>
      <!--foot-->
      <?php include("com/foot.php"); ?>
    </div>
  </div>
</div>
</body>
</html>