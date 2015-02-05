<?php
include("include/login_info.php");
include("include/medoo.php");
include("include/database.php");
include("include/lang.php");
$database = new medoo($database_setting);
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

        <?php
        $page = isset( $_REQUEST['page'] ) ? $_REQUEST['page'] : 1 ;
        $maxpage = isset( $_REQUEST['maxpage'] ) ? $_REQUEST['maxpage'] : 10 ;
        $where = array();



        $count = $database->count('loginlog');
        $where["LIMIT"] = array( ($page - 1) * $maxpage ,$maxpage);
        $where["ORDER"] = "id DESC";
        $result_data = $database->select("loginlog","*",$where);
        ?>


        <div class="table-top clear">

        </div>
        <table class="table table-bordered">
          <thead>
          <tr>
            <th style="width:25px" class="center"><input name="ckall" type="checkbox" /></th>
            <th><?php print $lang['table-field-loginlog-table-loginname']; ?></th>
            <th><?php print $lang['table-field-loginlog-table-loginip']; ?></th>
            <th><?php print $lang['table-field-loginlog-table-loginresult']; ?></th>
            <th><?php print  $lang['table-field-loginlog-table-logintime']; ?></th>
          </tr>
          </thead>
          <tbody>

          <?php if($result_data) foreach($result_data as $table_row): ?>
            <tr>
              <td class='center'><label><input name="ck" alt="<?php echo $table_row["id"] ?>" type='checkbox' /><span class="lbl"></span></label></td>
              <td><a href="user.php?dataid=<?php echo $table_row["id"] ?>"><?php echo $table_row["loginname"] ?></a></td>
              <td><?php echo $table_row["loginip"] ?></td>
              <td><?php echo $table_row["loginresult"]==1?"成功":"失败"; ?></td>
              <td><?php echo $table_row["logintime"] ?></td>
            </tr>
          <?php endforeach; ?>
          </tbody>
        </table>
        <form name="ActionForm" id="ActionForm" method="post" action="<?php print 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'];  ?>">
          <div id="pagination"><?php  include_once 'include/page.php'; ?></div>
        </form>

        <div id="submitdata" ></div>

        <script>

          $("[name=ckall]").click(function(){
            var all = this.checked ;
            $("[name=ck]").each(function(i){
              this.checked = all;
            });
          });
          $("#pagination").find('a').bind('click', function() {
            var a = $(this).attr("alt");
            if(a=="") return false;
            $("#ActionForm #page").val(a);
            ActionForm.submit();
          });
          $("#pagination #maxpage").change(function() {
            ActionForm.submit();
          });


          $("[title=load]").click( function() {
            $("#submitdata").load("../com/user.php" );
          });



          $("#search").click( function() {
            ActionForm.submit();
          });
          $("#excel").click( function() {
            $('#ActionForm').attr('action','../handler/excelStaff.php');
            ActionForm.submit();
            $('#ActionForm').attr('action','');
          });
        </script>

      </div>
      <!--foot-->
      <?php include("com/foot.php"); ?>
</body>
</html>