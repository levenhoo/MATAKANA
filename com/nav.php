  <ul class="nav navbar-nav">
    <li class="active"><a href="/index.php"><?php print $lang['menu-nav-home']; ?></a></li>
    <li><a href="member-list.php"><?php print $lang['menu-nav-member-list']; ?></a></li>
    <?php if($_SESSION["LOGIN_ROLE"]==1): ?>
    <li><a href="user-list.php"><?php print $lang['menu-nav-user-list']; ?></a></li>
    <?php endif; ?>
    <li role="presentation" class="dropdown">
      <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-expanded="false">
        <?php print $lang['account']; ?> <span class="caret"></span>
      </a>
      <ul class="dropdown-menu" role="menu">
        <li><a href="#" onclick="javascript:qqform.submit();" <?php print $lang['account-field-mail']; ?></a></li>
        <li role="presentation" class="divider"></li>
        <li><a href="password.php"><?php print $lang['account-field-mail-setting']; ?></a></li>
        <li><a href="mail.php"><?php print $lang['account-field-password']; ?></a></li>
        <li role="presentation" class="divider"></li>
        <?php
          $phpurl = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'] ;
          $phpurl .= empty($_SERVER["QUERY_STRING"])?'?lang=':'?lang=';
        ?>
        <li><a href="<?php print $phpurl.'cn';?>">中文</a></li>
        <li><a href="<?php print $phpurl.'en';?>">English</a></li>
        <li role="presentation" class="divider"></li>
        <li><a href="logout.php"><?php print $lang['menu-nav-logout']; ?></a></li>
      </ul>
    </li>
  </ul>
