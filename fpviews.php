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
      echo "<li><a href=\"zhucezhanghao.html\">注册账号</a></li>";
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
  <img src="image/tel.jpg" alt="服务热线"/>24小时服务热线:<span class="tel">123-456-7890</span>
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
<div class="quanbulicaixinxi">全部理财资讯</div><!--全部理财信息-->
<div class="wanshenmebunengwan"><span><a href="fpview001.php">1.晚什么不能晚“教育规划”</a></span>
<div class="date">2014-12-7</div><!--date结束-->
</div><!--wanshenmebunengwan-->
<div class="yueru3000yuan"><span><a href="fpview002.php">2.月入3000元的工薪小白，该如何攒钱？</a></span>
<div class="date2">2014-12-7</div>
</div><!--月入3000元-->
<div class="lamabixiuke"><span><a href="fpview003.php">3.辣妈辣爸必修课:如何给宝宝一份保障</a></span> 
<div class="date3">2014-12-7</div>
</div><!--辣妈辣爸必修课:如何给宝宝一份保障-->
<div class="ruheyangpang"><span><a href="fpview004.php">4.如何养胖小钱袋 低门槛理财产品盘点</a></span> 
<div class="date4">2014-12-7</div>
</div><!--如何养胖小钱袋 低门槛理财产品盘点-->
<div class="meimanrensheng"><span><a href="fpview005.php">5.美满人生的3个秘密:4张存折，3份工资，1份保障</a></span> 
<div class="date5">2014-12-7</div>
</div><!--美满人生的3个秘密:4张存折，3份工资，1份保障-->
<div class="heigejijin"><span><a href="fpview006.php">6.合格基金投资者必备技能</a></span> 
<div class="date6">2014-12-7</div>
</div><!--合格基金投资者必备技能-->
<div class="buzhidao"><span><a href="fpview007.php">7.不知道为父母做什么，替他们理理财也是好的</a></span> 
<div class="date7">2014-12-7</div>
</div><!--不知道为父母做什么，替他们理理财也是好的-->
<div class="shoubashou"><span><a href="fpview008.php">8.手把手教你如何买基金！</a></span> 
<div class="date8">2014-12-7</div>
</div><!--手把手教你如何买基金！-->
<div class="youmeiyou"><span><a href="fpview009.php">9.有没有一种产品，一举两得股债双收</a></span> 
<div class="date9">2014-12-7</div>
</div><!--有没有一种产品，一举两得股债双收-->
<div class="zhongyujueding"><span><a href="fpview010.php">10.终于决定买基金了！是定投好还是一次性购买好？</a></span> 
<div class="date10">2014-12-7</div>
</div><!--终于决定买基金了！是定投好还是一次性购买好？-->
<div class="womenjiaodeyanglaojin"><span><a href="fpview011.php">11.我们交的养老金都去哪了？</a></span>  
<div class="date11">2014-12-7</div>
</div><!--我们交的养老金去哪了-->
<div class="tuixiule"><span><a href="fpview012.php">12.退休了，我们到底能领到多少养老金？</a></span> 
<div class="date11">2014-12-7</div>
</div><!--退休了，我们到底能领到多少养老金？-->
<div class="zenyangcong"><span><a href="fpview013.php">13.怎样从理财小白到合格基金投资者——3招教你看季报</a></span> 
<div class="date12">2014-12-7</div>
</div><!--怎样从理财小白到合格基金投资者——3招教你看季报-->
</div><!--那些卖的热火朝天的万能险可能真的不-->
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
