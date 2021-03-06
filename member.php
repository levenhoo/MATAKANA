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
        $dataid = empty($_GET["dataid"])?0:$_GET["dataid"];
        $memo = '';
        $member_name = '';
        $member_ename = '';
        $member_birth = '';
        $member_phone = '';
        $member_class = '';
        $member_like = '';
        $member_company = '';
        $member_sequence = '';
        $where = array(   );
        $where['member_id'] = $dataid ;
        if($dataid)
          $data = $database->select('member','*' , $where);
        //var_dump($data);
        if( isset($data) && $data ) {
          $member_name = $data[0]['member_name'];
          $member_ename = $data[0]['member_ename'];
          $member_birth = $data[0]['member_birth'];
          $member_phone = $data[0]['member_phone'];
          $member_class = $data[0]['member_class'];
          $member_like = $data[0]['member_like'];
          $member_company = $data[0]['member_company'];
          $memo = $data[0]['memo'];
          $member_sequence = $data[0]['member_sequence'];
        }
        ?>

        <script>
          $.validator.setDefaults({
            submitHandler: function() {
              $("#submitdata").load("../handler/hello.php",$("#form").serializeArray());
            }
          });
          $().ready(function() {
            // validate signup form on keyup and submit
            $("#form").validate({
              rules: {
                member_name: "required"
              }
            });
          });

        </script>


        <form name="member-form" id="form" role="form" class="form-horizontal" >
          <div class="table-v">
            <ul class="nav nav-tabs" role="tablist" id="myTab">
              <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab"><?php print $lang['table-field-member-table-memberinfo']; ?>*</a></li>
              <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab"><?php print $lang['table-field-member-table-memberother']; ?></a></li>
            </ul>
            <div class="tab-content">
              <div role="tabpanel" class="tab-pane active" id="home">
                <input type="hidden" name="dataid" value="<?php print $dataid?>" />
                <div class="form-group">
                  <label class="col-sm-2 control-label" for="exampleInputEmail1"><?php print $lang['form-field-member-form-name']?></label>
                  <div  class="col-sm-4">
                    <input type="text" class="form-control" id="member_name" name="member_name" value="<?php print $member_name ?>" placeholder="<?php print $lang['form-field-member-form-name-placeholder']?>">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label" for="exampleInputEmail1"><?php print $lang['form-field-member-form-ename']?></label>
                  <div  class="col-sm-4"><input type="text" class="form-control" id="member_ename" name="member_ename" value="<?php print $member_ename ?>" placeholder="<?php print $lang['form-field-member-form-phone-placeholder']?>"></div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label" for="exampleInputEmail1"><?php print $lang['form-field-member-form-phone']?></label>
                  <div  class="col-sm-4"><input type="text" class="form-control" id="member_phone" name="member_phone" value="<?php print $member_phone ?>" placeholder="<?php print $lang['form-field-member-form-phone-placeholder']?>"></div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label" for="exampleInputEmail1"><?php print $lang['form-field-member-form-company']?></label>
                  <div  class="col-sm-4"> <input type="text" class="form-control" id="member_company" name="member_company" value="<?php print $member_company ?>" placeholder="<?php print $lang['form-field-member-form-company-placeholder']?>"></div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label" for="exampleInputEmail1"><?php print $lang['form-field-member-form-sequence']?></label>
                  <div  class="col-sm-4">  <input type="text" class="form-control" id="member_sequence" name="member_sequence" value="<?php print $member_sequence ?>" placeholder="<?php print $lang['form-field-member-form-sequence-placeholder']?>"></div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label" for="exampleInputEmail1"><?php print $lang['form-field-member-form-memo']?></label>
                  <div  class="col-sm-4">  <textarea type="text" class="form-control" row="6" id="memo"  name="memo" value="<?php print $memo ?>" placeholder="<?php print $lang['form-field-member-form-memo-placeholder']?>" ><?php print $memo?></textarea></div>
                </div>
              </div>

              <div role="tabpanel" class="tab-pane" id="profile">
                <div class="form-group">
                  <label class="col-sm-2 control-label" for="exampleInputEmail1"><?php print $lang['form-field-member-form-dayofbirth']?></label>
                  <div  class="col-sm-4"><input type="text" class="form-control" id="member_birth" name="member_birth" value="<?php print $member_birth ?>" placeholder="<?php print $lang['form-field-member-form-dayofbirth-placeholder']?>"></div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label" for="exampleInputEmail1"><?php print $lang['form-field-member-form-memberclass']?></label>
                  <div  class="col-sm-4"><input type="text" class="form-control" id="member_class" name="member_class" value="<?php print $member_class ?>" placeholder="<?php print $lang['form-field-member-form-memberclass-placeholder']?>"></div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label" for="exampleInputEmail1"><?php print $lang['form-field-member-form-memberlike']?></label>
                  <div  class="col-sm-4"> <input type="text" class="form-control" id="member_like" name="member_like" value="<?php print $member_like ?>" placeholder="<?php print $lang['form-field-member-form-memberlike-placeholder']?>"></div>
                </div>

              </div>
            </div>
            <div class="button-bar">
              <button type="submit"  id="submit" class="btn btn-primary">提交</button>
              <button onclick="javascript:history.go(-1)" type="button"  id="return" class="btn btn-default">返回</button>
            </div>
        </form>

      </div>
      <!--foot-->
      <?php include("com/foot.php"); ?>
</body>
</html>