
  <ul class="nav navbar-nav">
    <li class="active"><a href="/index.php"><?php print $lang['menu-nav-home']; ?></a></li>

    <li><a href="member-list.php"><?php print $lang['menu-nav-member-list']; ?></a></li>

    <li role="presentation" class="dropdown">
      <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-expanded="false">
        Acount <span class="caret"></span>
      </a>
      <ul class="dropdown-menu" role="menu">
        <li><a href="logout.php"><?php print $lang['menu-nav-logout']; ?></a></li>
        <li role="presentation" class="divider"></li>
        <?php
          $phpurl = $_SERVER["REQUEST_SCHEME"].'://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'] ;
          $phpurl .= empty($_SERVER["QUERY_STRING"])?'?lang=':'?'.$_SERVER["QUERY_STRING"].'&lang=';
        ?>
        <li><a href="<?php print $phpurl.'cn';?>">Chinese</a></li>
        <li><a href="<?php print $phpurl.'en';?>">English</a></li>
      </ul>
    </li>

  </ul>
