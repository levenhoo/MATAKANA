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
        $loginname = '';
        $realname = '';
        $role = '';
        $status = '';
        $memo = '';
        $member_like = '';
        $member_company = '';
        $member_sequence = '';
        $where = array(   );
        $where['id'] = $dataid ;
        if($dataid)
          $data = $database->select('remind','*' , $where);
        //var_dump($data);
        if( isset($data) && $data ) {
          $loginname = $data[0]['title'];
          $realname = $data[0]['finishdate'];
          $role = $data[0]['createdate'];
          $status = $data[0]['status'];
          $memo = $data[0]['memo'];

        }
        ?>

        <script>
          $.validator.setDefaults({
            submitHandler: function() {
              $("#submitdata").load("../handler/user.php",$("#form").serializeArray());
            }
          });
          $().ready(function() {
            // validate signup form on keyup and submit
            $("#form").validate({
              rules: {
                loginname: {
                  required :true,
                  rangelength : [5, 30]
                },
                realname: "required"
              }
            });
          });

        </script>


        <form name="member-form" id="form" role="form" class="form-horizontal" >
          <div class="table-v">

         
                <input type="hidden" name="dataid" value="<?php print $dataid?>" />
                <div class="form-group">
                  <label class="col-sm-2 control-label" for="exampleInputEmail1"><?php print $lang['form-field-user-login-name']?></label>
                  <div  class="col-sm-4">
                    <input type="text" class="form-control" id="loginname" name="loginname" value="<?php print $loginname ?>">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label" for="exampleInputEmail1"><?php print $lang['form-field-user-password']?></label>
                  <div  class="col-sm-4">
                    <input type="text" class="<?php if( !isset($data) || !$data ) print 'required';?> form-control" id="loginpwd" name="loginpwd" value="">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label" for="exampleInputEmail1"><?php print $lang['form-field-user-realname']?></label>
                  <div  class="col-sm-4"><input type="text" class="form-control" id=realname" name="realname" value="<?php print $realname ?>"></div>
                </div>
                <div class="form-group">

                  <label class="col-sm-2 control-label" for="exampleInputEmail1"><?php print $lang['form-field-user-role']?></label>
                  <div  class="col-sm-4">
                    <select class="form-control" name="role" >
                      <option <?php if($status=="1") print 'selected' ?> value="1">管理员</option>
                      <option <?php if($status=="2") print 'selected' ?> value="2">使用者</option>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label" for="exampleInputEmail1"><?php print $lang['form-field-user-status']?></label>
                  <div  class="col-sm-4">
                    <select class="form-control" name="status" >
                      <option <?php if($status=="1") print 'selected' ?> value="1">启用</option>
                      <option <?php if($status=="2") print 'selected' ?> value="2">停用</option>
                    </select>

                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label" for="exampleInputEmail1"><?php print $lang['form-field-user-memo']?></label>
                  <div  class="col-sm-4">  <textarea type="text" class="form-control" row="6" id="memo"  name="memo" value="<?php print $memo ?>"><?php print $memo?></textarea></div>
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