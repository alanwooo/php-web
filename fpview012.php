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
<div class="quanbulicaixinxi">退休了，我们到底能领到多少养老金？</div><!--退休了，我们到底能领到多少养老金？ >-->
<div class="mudanbaolicaishi">牡丹宝理财师&nbsp&nbsp发布时间&nbsp2014-12-7</div>
<div class="tuixiule-1"><p>说到养老保险这个话题，你有没有想过一个问题——“我们到底能领到多少养老金？”今天的课堂我们就来解决一下这个问题。</br>
 
注意：在这里我们主要算的是2006年之后参加工作的（称为新人）。之前参加工作的会按照工龄给予释放补偿。详询你们的HR哦。</br>
 
1.<strong>清楚基本养老金的基本构成</strong></br>
 
基本养老金=基础养老金+个人账户养老金</br>
 
注意：要区分“基本养老金”和“基础养老金”，从公式可以看出基础养老金是基本养老金的一部分，是缴纳养老保险中进入公户的资金。</br>
 
A．<strong>基础养老金</strong></br>
 
退休时的基础养老金每月领取标准以：当地上年度在岗职工月平均工资和本人指数化月平均缴费工资的平均值为基数，并将缴费年限当成领取比例。体现在公式中是：
 
基础养老金=(全省/市上年度在岗职工月平均工资+本人指数化月平均缴费工资)/2缴费年限1%</br>
 
B．<strong>个人账户养老金</strong></br>
 
个人指数化月平均工资：每年个人缴费基数与社平工资比例的平均数*退休前一年的社平工资。</br>
 
个人账户养老金=职工退休时个人账户储存额/计发月数</br>
 
计发月数：见下表，这个是国家是、根据退休年龄和社会平均年龄算出的，也就是估算了一下你能平均领取多少个月的养老金，以便把个人账户的钱平均分配到每个月发给你。</br>
<img src="image/tuixiule.jpg" /></br>
<strong>影响领取养老金多少的因素有哪些？</strong></br>
 
从上面养老金计算我公式们可以看出，影响养老金的因素有：社平工资、缴费年限、个人指数化月平均工资（即缴费基数）。</br>
 
<strong>社平工资越高，领取的金额越高；</strong></br>
 
<strong>缴费年限越长，领取的金额越高；</strong></br>
 
<strong>个人缴费基数越高，领取的金额越高；</strong></br>
 
你每月缴纳的社保越多，个人账户累计的金额也就越多，所以退休金就越高。</p>
 </div><!--tuixiule-1-->
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
