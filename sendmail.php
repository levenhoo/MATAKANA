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
  <?php
  require 'include/phpmailer/PHPMailerAutoload.php';
  //Create a new PHPMailer instance
  $mail = new PHPMailer;
  //Tell PHPMailer to use SMTP
  $mail->isSMTP();
  $mail->CharSet = "UTF-8";
  //Enable SMTP debugging
  // 0 = off (for production use)
  // 1 = client messages
  // 2 = client and server messages
  $mail->SMTPDebug = 2;
  //Ask for HTML-friendly debug output
  $mail->Debugoutput = 'html';
  //Set the hostname of the mail server
  $mail->Host = "smtp.exmail.qq.com";
  //Set the SMTP port number - likely to be 25, 465 or 587
  $mail->Port = 465;

  $mail->SMTPSecure = "ssl";
  //Whether to use SMTP authentication
  $mail->SMTPAuth = true;
  //Username to use for SMTP authentication
  $mail->Username = "webmaster@matakana.cn";
  //Password to use for SMTP authentication
  $mail->Password = "imleven88..";
  //Set who the message is to be sent from
  $mail->setFrom('webmaster@matakana.cn', 'Matakana Webmaster');
  //Set an alternative reply-to address
  $mail->addReplyTo('webmaster@matakana.cn', 'Matakana Webmaster');
  //Set who the message is to be sent to
  $mail->addAddress('levenhoo@hotmail.com', 'leven hoo');
  //Set the subject line
  $mail->Subject = 'PHPMailer SMTP test';
  //Read an HTML message body from an external file, convert referenced images to embedded,
  //convert HTML into a basic plain-text alternative body
  $mail->msgHTML( "我开始测试了<hr>");
  //Replace the plain text body with one created manually
  $mail->AltBody = 'This is a plain-text message body';
  //Attach an image file
  //$mail->addAttachment('images/phpmailer_mini.png');
  //send the message, check for errors
  if (!$mail->send()) {
    echo "Mailer Error: " . $mail->ErrorInfo;
  } else {
    echo "Message sent!";
  }

  ?>
</div>
<!--foot-->
<?php include("com/foot.php"); ?>
</body>
</html>