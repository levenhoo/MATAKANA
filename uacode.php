<?php
/**
 * Created by PhpStorm.
 * User: leven
 * Date: 2015/2/9
 * Time: 11:39
 */
?>

<html>
<head>
  <meta charset="UTF-8">
  <script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
    ga('create', 'UA-53424469-2', 'auto');
    ga('send', 'pageview');
  </script>
</head>
<body></body>


<h2>UA CODE</h2>

<button onclick="ga('click', 'morning');" >测试morning</button>
<hr/>
<button onclick="ga('click', 'afternoon');" >测试afternoon</button>
<hr/>
<button onclick="ga('click', 'night');" >测试night</button>
<hr/>
</html>