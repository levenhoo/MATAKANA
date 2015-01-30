<?php
$page = isset( $_REQUEST['page'] ) ? $_REQUEST['page'] : 1 ;
$maxpage = isset( $_REQUEST['maxpage'] ) ? $_REQUEST['maxpage'] : 10 ;
$where = array();
$count = $database->count('member');
$where["LIMIT"] = array( ($page - 1) * $maxpage ,$maxpage);
$result_data = $database->select("member","*",$where);
?>


<div class="table-top clear">
  <div class="button-group">

    <div class="dropdown pull-right">
      <button class="btn btn-default dropdown-toggle " type="button" id="dropdownMenu1" data-toggle="dropdown" aria-expanded="true">
        Action
        <span class="caret"></span>
      </button>
      <ul class="dropdown-menu  dropdown-menu-left" role="menu" aria-labelledby="dropdownMenu1">
        <li role="presentation"><a role="menuitem" tabindex="-1" href="member.php">Join Mamber</a></li>
        <li role="presentation"><a role="menuitem" tabindex="-1" title="delete" href="#">Delete</a></li>


      </ul>
    </div>

  </div>
</div>
<table class="table table-bordered">
  <thead>
  <tr>
    <th style="width:25px" class="center"><input name="ckall" type="checkbox" /></th>
    <th><?php print $lang['table-field-member-table-ename']; ?></th>
    <th><?php print $lang['table-field-member-table-name']; ?></th>
    <th><?php print $lang['table-field-member-table-dayofbirth']; ?></th>
    <th><?php print $lang['table-field-member-table-phone']; ?></th>
    <th><?php print $lang['table-field-member-table-contact']; ?></th>
  </tr>
  </thead>
  <tbody>

  <?php if($result_data) foreach($result_data as $table_row): ?>
    <tr>
      <td class='center'><label><input name="ck" alt="<?php echo $table_row["member_id"] ?>" type='checkbox' /><span class="lbl"></span></label></td>
      <td><a href="member.php?dataid=<?php echo $table_row["member_id"] ?>"><?php echo $table_row["member_ename"] ?></a></td>
      <td><?php echo $table_row["member_name"] ?></td>
      <td><?php echo $table_row["member_company"] ?></td>
      <td><?php echo $table_row["member_phone"] ?></td>
      <td><?php echo $table_row["member_contact"] ?></td>
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
    $("#submitdata").load("../com/member.php" );
  });


  $("[title=delete]").click( function() {
    var ids = "";
    $("[name=ck]").each(function(i){
       if( this.checked == true ){
         console.info(i);
         if(i!=0)
         ids += ",";
         ids += $(this).attr("alt") ;
       }
    });
    if(ids!="" && confirm("are you sure datele date")){
      $("#submitdata").load("../handler/hello.php", {"ids":ids }   );
    }
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