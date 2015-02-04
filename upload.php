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
  <? include 'js/PHPExcel/Classes/PHPExcel/IOFactory.php';


  function uploadExcel($filename="",$database){
    $inputFileName = 'js/acount.xlsx';
    $inputFileName =  $filename ;
    echo 'Loading file ',pathinfo($inputFileName,PATHINFO_BASENAME),' using IOFactory to identify the format<br />';
    $objPHPExcel = PHPExcel_IOFactory::load($inputFileName);
      $sheetData = $objPHPExcel->getActiveSheet()->toArray(null,true,true,true);
      unset($sheetData[1]);
      unset($sheetData[2]);
      $member_list = array();
    $uploaod_time =  date("Y-m-d H:i:s");
     for( $i=3 ; $i <= count($sheetData) ; $i++){
       $item = array();
       $item["member_sequence"] = $sheetData[$i]["A"];
       $item["member_name"] = $sheetData[$i]["B"];
       $item["member_ename"] = $sheetData[$i]["C"];
       $item["member_phone"] = $sheetData[$i]["E"];
       $item["member_company"] = $sheetData[$i]["F"];
       $item["member_class"] = $sheetData[$i]["H"];
       $item["member_like"] = $sheetData[$i]["I"];
       $item["memo"] = $sheetData[$i]["J"];
       $item["createtime"] =  $uploaod_time ;
       $member_list[] = $item;
    }
    print "数据量：".count($member_list); print "<br>";
    $result = $database->insert("member",$member_list);
    print "加入". count($result)."条数据！";print "<br>";

  }

  $upload_dir =  $_SERVER['DOCUMENT_ROOT']."/upload/";
  if (!is_dir($upload_dir)) {
     if(mkdir($upload_dir,0777,true)){
       print "创建目录成功！";print "<br>";
     }else{
       print "创建目录失败！";print "<br>";
     }
  }

  if( isset($_FILES["file"]["tmp_name"])) {
    $file_name = $_FILES["file"]["name"];
    $exten = "";
    $allow_file = array("xls","xlsx");
    if($dot = strpos($file_name, "."))
    {
      $exten = substr($file_name, $dot+1);
    }
    if( !empty($exten) && in_array($exten , $allow_file)){
      print "上传文件检测通过！";print "<br>";
       $save = $_SERVER['DOCUMENT_ROOT']."/upload/".date("YmdHis").".".$exten;
       move_uploaded_file($_FILES["file"]["tmp_name"], $save);
       print "上传成功！";print "<br>";
       uploadExcel($save,$database);


    }else{
       print "上传文件不符合规则！";print "<br>";
    }
  }

  ?>
  <form enctype="multipart/form-data" class="form-horizontal" method="post" id="upload" name="upload">
    <div class="form-group">
      <label class="col-sm-2 control-label" for="exampleInputEmail1">文件</label>
        <input type="file" class="" id="file" name="file" value="" >
      <button type="submit"  id="submit" class="btn btn-primary">提交</button>
    </div>
  </form>
</div>
<!--foot-->
<?php include("com/foot.php"); ?>
</body>
</html>