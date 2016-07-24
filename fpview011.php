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
<h2>理财师观点</h2>
<div class="quanbulicaixinxi">我们交的养老金都去哪了？</div><!--我们交的养老金都去哪了？ >-->
<div class="mudanbaolicaishi">牡丹宝理财师&nbsp&nbsp发布时间&nbsp2014-12-7</div>
<div class="womenjiaode"><p>今天我们说说养老保险中最重要的一项内容——养老金。这个养老金，我们有时候也称为退休金、退休费，都是一个东东。其主要用于保障我们退休后的基本生活需要，可以说是我们晚年幸福生活的基石，所以非常重要。</br>
 
<strong>养老金去哪里了？</strong></br>
<img src="image/yanglaojinqunale.jpg" /></br>
社保缴存单位/个人比例表（北京）</br>
 
在上堂课中，我们知道了医疗保险缴上去的钱中，个人缴费的全部和单位缴费的一小部分进了个人账户（私户）；单位缴费剩下的全部进了统筹账户（公户）。</br>
 
而养老保险同样有统筹和个人两个账户。与医疗保险的不同在于，个人缴费的全部8%进入个人账户（私户），公司缴费的20%全部进入了统筹账户（公户）！</br>
 
统筹账户中，除了全国人民缴纳的钱，还包含了财政补贴和投资收益。而个人账户实行完全积累制，这钱是完全属于你的。</br>
 
<strong>养老金领取的条件是什么？</strong></br>
 
参加养老保险的职工要领取养老金，必须同时符合两个条件才能每月领取：</br>
 
（1）达到法定退休年龄；</br>
 
（2）累积缴纳养老保险费满15年。注意两者不是或者的关系。另外，如果你累计缴费不满15年，那么在退休时可一次性领取个人账户中的累计部分的资金。</br>
 
牡丹宝理财温馨提示：按照相关规定，我国法定的企业职工退休年龄是：男年满60周岁，女工人年满50周岁，女干部年满55周岁。从事井下、高空、高温、特别繁重体力劳动或其他有害身体健康工作(以下称特殊工种)的，退休年龄为男年满55周岁、女年满45周岁;因病或非因工致残，由医院证明并经劳动鉴定委员会确认完全丧失劳动能力的，退休年龄为男年满55周岁、女年满45周岁</br>
 
<strong>养老保险金可以提前取出来吗？</strong></br>
 
前面讲过了，我们所缴的社保进入了两个账户中（统筹帐户和个人帐户），如果在办理退休前去世了，继承人是可以继承个人账户中的钱；如果是移民等特殊情况，你只可以把养老保险的个人帐户里的钱取出来，一旦取出来了，这份养老保险也就终止了，无法恢复。</p>
 </div><!--我们交的-->
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
