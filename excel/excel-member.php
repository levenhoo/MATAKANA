<?php
include("../include/login_info.php");
include("../include/medoo.php");
include("../include/database.php");

$database = new medoo($database_setting);

$html = array();

$where = array();
$count = $database->count('member');
$where["ORDER"] = "member_sequence ASC";

$result_data = $database->select("member","*",$where);


$html[] = "<html><head><meta charset=\"utf-8\"></head>";
$html[] = "<body>";
$html[] = "<table>";
$html[] = "<thead><tr>";
$html[] = "<th>姓名</th>";
$html[] = "<th>电话</th>";
$html[] = "</tr></thead>";

foreach($result_data as $row){
  $html[] = "<tr>";
  $html[] = "<td>".$row["member_name"]."</td>";
  $html[] = "<td>".$row["member_phone"]."</td>";
  $html[] = "</tr>";
}

$html[] = "</table>";



$html[] = "</body></html>";
header('Content-Type:charset=UTF-8');
header("Content-type:application/vnd.ms-excel");
header("Content-Disposition:filename=MEMBER-LIST.xls");
echo implode(" ",$html);
exit;

?>