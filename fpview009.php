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
<div class="quanbulicaixinxi">有没有一种产品，一举两得股债双收 </div><!--有没有一种产品，一举两得股债双收 >-->
<div class="mudanbaolicaishi">牡丹宝理财师&nbsp&nbsp发布时间&nbsp2014-12-7</div>
<div class="youmeiyouyizhongchanpin"><strong>可转债的获利方式有哪些？</strong></br>
 
<p><strong>前文中其实已经提到了，这里我们再复习一下：</strong></br>
 
（1）如果股市向好，在进入转股期后，可将可转债转换成股票，享受股票上涨的红利；</br>
 
（2）大盘走势很好，可转债对应的正股价格上涨势头也很强劲，可以直接卖出所持可转债，通过价差获利。</br>
 
（3）如果股市走弱，可一直持有可转债券，获得债券每年的固定利息收益；</br>
 
<strong>可转债的转股价值如何判定？</strong></br>
 
由于可转债和正股价格都存在波动，要确定是否值得将可转债转股，就必须通过计算。一般而言，可转债的转股价值=正股价格/转股价格。</br>
 
<strong>举个例子：华电转债的转股价为3.14元，其正股华电能源收盘价为3.69元，其转股价值即为3.69/3.14＝117.52元，略高于华电转债的收盘价117.12元</strong></br>
 
<strong>牡丹宝理财提示</strong>：转股价值高于转债价格，就意味着转债出现了折价。如果可转债的折价较大，便会出现套利空间——投资者可以低价买入可转债，并在转股后卖出。但值得注意的是此时会面临正股股价日后可能下跌的风险。因此只有当可转债的正股股价高于转股价且持续上涨时，投资者才可能因此获利。</strong></br>
 
<strong>可转债的债券价值又该如何理解？</strong></br>
 
当可转债的正股价格低于转股价格的时，这时可转债投资者转股就无利可图，理性的投资者将会继续持有可转债，到期时要求公司还本付息，此时债券价值凸显。</br>
 
<strong>可转债有哪些？</strong></br>
 
目前沪深两市共有30支可转债，关注可转债的投资者通过股票软件便能查到相关信息。截止2014年10月8日，市价最高的是泰尔转债（128001），收盘价为146.210元，最低的为双良转债（127002），收盘价为93.82元。</br>
 
<strong>怎样看可转债的转股价格？</strong></br>
 
转股价格我们是无法从交易软件中看到的，需要我们审阅募集说明书。另外，可转债对应的正股的市价同样可以在交易软件中查询。</br>
 
<strong>“赎回条款”PK“回售条款”</strong></br>
 
（1）赎回条款 赎回条款是指发行公司有权在预定的期限内按事先约定的条件，买回尚未转股的可转换债券。设置赎回条款是为了促使债券持有人转换股份。该条款有利于转债发行公司，不利于投资者。</br>
 
（2）回售条款 回售条款规定，发行公司的股票价格在一定时期内连续低于转换价格达到一定幅度时，债券持有者可根据规定将债券出售给发行公司。设置回售条款，是为了保护债券投资人的利益，能使他们避免遭受过大的投资损失，从而降低其投资风险。</br>
 
好规划提示投资者：二者的区别在于判断谁有主动权。赎回条款的主动权在公司，当转债对公司不利时，公司可以赎回。回售条款的主动权在转债持有者身上，当债券对持有人不利时，持有人可以强行将债券回售给公司。</br>
 
<strong>面对提前赎回机制，我们应如何应对？</strong></br>
 
当正股收盘价连续多个交易日高于当期转股价格的某个百分比时，便触发提前赎回条款，一旦公司发出赎回公告，转债的持有者必须在转股或登记赎回两者之中作出选择，由于此时的转股价值会明显高于赎回价格，理性的投资者都会选择转股，所以该赎回条款限定了转债投资的最高收益。因此对于可转债持有人来讲，应及时转股或者卖出，否则将面临较大损失。</p>
</div><!--有没有一种产品-->
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
