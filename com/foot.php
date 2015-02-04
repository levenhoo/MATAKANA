<?php
/**
 * Created by PhpStorm.
 * User: leven
 * Date: 2015/1/27
 * Time: 16:55
 */
?>
<div class="clear"></div>
<div class="foot">
  <div class="inner">
    <p>© 2015 Matakana Estate</p>
  </div>
</div>
<div id="submitdata"></div>
<div class="qqmail" style="display: none;">
  <form  method="post" target="_blank" action="https://exmail.qq.com/cgi-bin/login" name="qqform">
    <input type="hidden" value="false" name="firstlogin">
    <input type="hidden" value="dm_loginpage" name="errtemplate">
    <input type="hidden" value="other" name="aliastype">
    <input type="hidden" value="bizmail" name="dmtype">
    <input type="hidden" value="" name="p">
    <input type="hidden" value="<? print $_SESSION["LOGIN_EMAIL"] ?>" class="text" name="uin">
    <input type="hidden" value="matakana.cn" name="domain">
    <input type="hidden" value="<? print $_SESSION["LOGIN_EMAILPWD"] ?>" class="text" name="pwd">
    <input type="submit" value="登录" name="" class="">&nbsp;
    <a target="_blank" href="https://exmail.qq.com/cgi-bin/readtemplate?check=false&amp;t=bizmail_orz">忘记密码？</a></form>
</div>
