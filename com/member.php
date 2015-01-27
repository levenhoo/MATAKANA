<form name="member-form" role="form" class="form-horizontal">
  <input type="hidden" name="dataid" value="<?=$dataid?>" />


  <div class="form-group">
    <label class="col-sm-1 control-label" for="exampleInputEmail1"><?php print $lang['form-field-member-form-name']?></label>
    <div  class="col-sm-4">
      <input type="text" class="form-control" id="member_name" name="member_name" placeholder="<?php print $lang['form-field-member-form-name-placeholder']?>">
    </div>
  </div>

  <div class="form-group">
    <label class="col-sm-1 control-label" for="exampleInputEmail1"><?php print $lang['form-field-member-form-phone']?></label>
    <div  class="col-sm-4"><input type="text" class="form-control" id="member_ename" name="member_ename" placeholder="<?php print $lang['form-field-member-form-phone-placeholder']?>"></div>
  </div>

  <div class="form-group">
    <label class="col-sm-1 control-label" for="exampleInputEmail1"><?php print $lang['form-field-member-form-dayofbirth']?></label>
    <div  class="col-sm-4"><input type="date" class="form-control" id="member_birth" name="member_birth" placeholder="<?php print $lang['form-field-member-form-dayofbirth-placeholder']?>"></div>
  </div>

  <div class="form-group">
    <label class="col-sm-1 control-label" for="exampleInputEmail1"><?php print $lang['form-field-member-form-phone']?></label>
    <div  class="col-sm-4"><input type="text" class="form-control" id="member_phone" name="member_phone" placeholder="<?php print $lang['form-field-member-form-phone-placeholder']?>"></div>
  </div>


  <div class="form-group">
    <label class="col-sm-1 control-label" for="exampleInputEmail1"><?php print $lang['form-field-member-form-memberclass']?></label>
    <div  class="col-sm-4"><input type="text" class="form-control" id="member_class" name="member_class" placeholder="<?php print $lang['form-field-member-form-memberclass-placeholder']?>"></div>
  </div>

  <div class="form-group">
    <label class="col-sm-1 control-label" for="exampleInputEmail1"><?php print $lang['form-field-member-form-memberlike']?></label>
    <div  class="col-sm-4"> <input type="text" class="form-control" id="member_class" name="member_class" placeholder="<?php print $lang['form-field-member-form-memberlike-placeholder']?>"></div>
  </div>

  <div class="form-group">
    <label class="col-sm-1 control-label" for="exampleInputEmail1"><?php print $lang['form-field-member-form-company']?></label>
    <div  class="col-sm-4"> <input type="text" class="form-control" id="member_class" name="member_class" placeholder="<?php print $lang['form-field-member-form-company-placeholder']?>"></div>
  </div>

  <div class="form-group">
    <label class="col-sm-1 control-label" for="exampleInputEmail1"><?php print $lang['form-field-member-form-memo']?></label>
    <div  class="col-sm-4">  <textarea type="text" class="form-control" row="6" id="memo"  name="memo" placeholder="<?php print $lang['form-field-member-form-memo-placeholder']?>" ><?=$memo?></textarea></div>
  </div>

  <div class="form-group">
    <label class="col-sm-1 control-label" for="exampleInputEmail1"><?php print $lang['form-field-member-form-sequence']?></label>
    <div  class="col-sm-4">  <input type="text" class="form-control" id="member_sequence" name="member_sequence" placeholder="<?php print $lang['form-field-member-form-sequence-placeholder']?>"></div>
  </div>

  <div class="form-group">

    <div  class="col-sm-4">     <button type="button" class="btn btn-primary">Primary</button></div>
  </div>



</form>