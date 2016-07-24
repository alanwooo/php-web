<?php
if (!isset($_SESSION)) {
  session_start();
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>牡丹宝理财</title>
<link href="css/main.css" rel="stylesheet" type="text/css" />
</head>

<body>
<div class="top">
<div class="top-content">
 <ul>
 <?php
    if(isset($_SESSION['MM_Username']))
    {
      $userid=$_SESSION['MM_Username'];
      echo "<li><a href=\"logout.php\">退出</a></li>";
      echo "<li><a href=\"\">欢迎 $userid                   </a></li>";
	  echo "<li><a href=\"fpviews.php\">理财师观点</a></li>";
    }
    else
    {
      echo "<li><a href=\"login.php\">登录</a></li>";
      echo "<li><a href=\"register.php\">注册账号</a></li>";
	  echo "<li><a href=\"fpviews.php\">理财师观点</a></li>";
    }
 ?>
 </ul>
</div><!--top-content结束-->
</div><!--top结束-->
<div class="warp">
<div class="logo">
  <div class="logo-left">
  <img src="image/mudanbaolicai.jpg" alt="牡丹宝理财" />
  </div>
  <div class="logo-right">
  <img src="image/tel.jpg" alt="服务热线"/>24小时服务热线：<span class="tel">123-456-7890</span>
  </div>
</div><!--logo结束-->
<div class="nav">
<div class="nav-left"></div>
<div class="nav-mid">
  <div class="nav-mid-left"><ul>
        <li><a href="index.php">首页</a></li>
        <li><a href="fpviews.php">理财师观点</a></li>
        <li><a href="consultfp.php">咨询理财师</a></li>
        <li><a href="fpertop.php">理财师排行榜</a></li>
        <li><a href="typicalcases.php">经典案例</a></li>
     </ul>
 </div>
  <div class="nav-mid-right">
 <form action="" method="post">
   <input type="text" class="search-text" />
</form>    
</div>
</div><!--nav-mid结束-->
<div class="nav-right">
</div>
</div><!--NAV结束-->
<div class="ad" id="picBox" style="height:243px">
<img src="image/neiye.jpg" />
</div><!--ad结束-->
<div class="list-main">
<div class="news-type"><h2>理财新闻中心</h2>
<div class="news-type-content">
<ul>
   <li><a href="fpertop.php">理财师排行榜</a></li>
   <li><a href="userfpaction.php">我的行动规划</a></li>
   <li><a href="fpasset.php">我的理财规划书</a></li>
   <li><a href="userinfo.php">更新规划书数据</a></li>
   <li><a href="fpviews.php">理财师观点</a></li>
   <li><a href="consultfp.php">咨询理财师</a></li>
   <li><a href="#">设置</a></li>
</ul>

</div>
</div><!--news-type结束-->
<div class="list-box">
<h2>牡丹宝经典案例</h2>
<div class="news-list">
    <div class="zichanxianzhuang"><a href="#">牡丹宝案例列表，点击查看你感兴趣的案例分析。</a> </div><!--保险规划-->
    <div class="suoyouanliliebiao">
    <div class="25lanling"><a href="age25bluecollar.php">25岁蓝领，月收入3000元左右的请点我！</a></div>
    <div class="anli1"><a href="age25whitecollar.php">25岁公司白领，月收入8000元左右的点我！</a></div>
    <div class="anli2"><a href="age25richman.php">25岁富二代，月收入20000元左右的请点我！</a></div>
    <div class="40yangjia"><a href="age40raisefy.php">40岁养家，月收入10000元左右的请点我！</a></div>
    <div class="40zhongceng"><a href="age40midclass.php">40岁中层阶级，月收入20000元左右的请点我！</a></div>
    <div class="40fuqiang"><a href="age40richman.php">40岁富强，月收入80000元左右的请点我！</a></div>
    <div class="60zaofushehui"><a href="age60hplife.php">60岁知足常乐，月收入5000元左右的请点我！</a></div>
    <div class="60tixiezisun"><a href="age60midclass.php">60岁提携子孙，月收入8000元左右的请点我！</a></div>
    <div class="60zhizuchangle"><a href="age60richman.php">60岁造福社会，月收入20000元左右的请点我！</a></div>
    
    </div><!--所有案例列表-->
   
</div><!--news-list-->
</div><!--list-box结束-->
</div><!--list-main结束-->

</div><!--warp结束-->
<div class="footer">
<div class="footer-1">
<ul>
  <li><a href="index.php">关于我们</a></li>
  <li><a href="#">联系我们</a></li>
  <li><a href="#">加入我们</a></li>
  <li><a href="#">意见反馈</a></li>
</ul>
</div><!--footer-1结束-->
</div><!--footer结束-->
</body>
</html>
