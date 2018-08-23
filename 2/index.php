<?php

/**
 *  观察者模式
 */

require("NewsDetail.php");

// 根据get参数获取新闻id
$get_newsid = isset($_GET["news_id"])?intval($_GET["news_id"]):101;
// 初始化新闻
$newsDetail = new NewsDetail($get_newsid);

?>
<html>
<head>
    <title></title>
</head>
<body>
<div class="container" style="width: 70%;margin: 0 auto">
    <?php
        $newsDetail->display()
    ?>
</div>
</body>
</html>