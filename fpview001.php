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
<div class="quanbulicaixinxi">晚什么不能晚“教育规划”</div><!--全部理财信息-->
<div class="mudanbaolicaishi">牡丹宝理财师&nbsp&nbsp发布时间&nbsp2014-12-7</div>
<div class="zaiwoguo">在我国，大多数家庭都是独生子女，眼瞅着80后们陆续当上了的“孩儿他妈”“孩儿他爸”，家里就这一个孩子，让他接受优质的高等教育，是家长们共同的心愿。
 
然而，不断攀升的教育开支也给不少家庭带来了压力。根据目前的学费水平进行估算，一个孩子从出生到大学毕业，其中所牵涉到的费用少则几十万元，多则上百万元。如果孩子选择在海外接受大学教育，或者在大学毕业后出国继续深造，教育的费用则更为昂贵。</br>
 
<strong>子女教育要规划，而且要提早规划</strong></br>
 
从四个方面可以解析这一观点：
 
1、子女教育金没有时间弹性
 
比如子女到了6岁就要上小学，18或19岁就要念大学。它与其他的消费如购车、买房不同，不可能因为资金不足而推迟。
 
2、子女教育金没有费用弹性
 
高等教育的学费相对固定，大学费用支出一年在1.5万以上。
 
3、国家没有教育储蓄账户，需要自己准备
 
这和退休规划有个人养老金账户，购房规划有住房公积金账户有很大不同。
 
4、子女高等教育金支付期与退休金准备期高度重叠
 
如果不提早规划子女教育，可能你就要因为供子女上大学而牺牲退休生活质量。</br>
<strong>子女教育到底要花多少钱？</strong></br>
 
先给大家一个各求学阶段的子女教育金需求表：</br>
<img src="image/zinvjiaoyujin.jpg" alt="子女教育金需求表" /></br>
<strong>除了学费，我们还要考虑其他费用</strong></br>
学费只是教育金的一部分，除此之外的其他费用我们也不能忽视。比如择校费支出、才艺班支出、辅导班、补习或家教支出、宿舍费与回家交通费、制服费，书本费、出国留学相关费用等等。这些费用的总额有时甚至会比学费还高。


 
</div><!--在我国内容-->
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
