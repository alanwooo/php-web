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
<div class="quanbulicaixinxi">不知道为父母做什么，替他们理理财也是好的</div><!--辣妈辣爸必修课：如何给宝宝一份保障？>-->
<div class="mudanbaolicaishi">牡丹宝理财师&nbsp&nbsp发布时间&nbsp2014-12-7</div>
<div class="buzhidaoweifumu">
<p>随着80后们陆续成家立业，有条不紊的打理家中事物，90后们也正步入社会，学着管理自己的小金库。但你们之中有谁还肩负着帮父母理财的职责呢？自己在理财中尝到甜头，难道就不想用自己的经验帮父母也理理吗？“慈孝之心，人皆有之”，你们懂得。</br>
 
如果帮父母理财，需要提前考虑哪些问题？</br>
 
1.<strong>年龄和观念</strong></br>
 
父母的年龄基本上都在50岁以上，这就直接导致这类人群的风险承受能力低，主要以银行定存和国债为投资方式，可能会少量购买银行理财产品，但整体上都是保守的。因此在理财中，不建议选择风险较高的权益类产品。在完善保障方面，也不宜配置太多保险产品。</br>
 
2.<strong>目前家庭资产的配置情况</strong></br>
 
比如要考虑现有的投资、保险配置、目前的收入水平、退休后大致的收入水平等因素。</br>
 
3.<strong>父母对新兴事物的接受程度</strong></br>
 
长辈们对待投资的观念和年轻人也有很大的不同，这会直接局限投资方式和渠道，如果你的有些父母对余额宝这类新兴事物接受较快，买点货币基金也未尝不可。</br>
 
如果帮父母理财，什么该做，什么又是不该做的？</br>
 
（以下是建议主要针对父母年龄在50岁以上或面临退休、已退休的，如果你的父母40多岁，正处于收入快速增长期，不需参考以下比较保守的理财方法。） 该做什么？</br>
 
1.<strong>留足紧急备用金</strong></br>
 
随着年龄增长，父母会面临收入下降、看病医疗支出增加等因素，随时需要用钱的地方比较多，因此在帮助父母理财时，不要拿来钱就投资，首先做到的是多配置一些流动性较高、能保证资金安全的资产。</br>
 
具体配置品种有：活期、定期、货币基金</br>
 
其中，定期存款可以采取类似12存单的方法，把到期日错开，提高流动性。</br>
 
2.<strong>增加配置固定收益类资产</strong></br>
 
随着年龄的增长，我们承受风险的能力在降低，应该避免中高风险的资产，应增加配置可获得固定收益的资产。</br>
 
具体配置品种有：国债、银行理财产品</br>
 
国债和银行理财产品建议期限错开，比如国债选择5年期的，那么购买银行理财产品时，期限不宜过长。</br>
 
3.<strong>酌情增减可灵活配置的资产品种</strong></br>
 
如果不能完全替父母理财，那么类似债券基金、股票基金这类需要定期关注收益走势的产品操作起来就比较麻烦，如果父母此前就已持有，那么在其中优选1或2只持有即可；如果从未接触过，建议子女也不要再另行配置。</br>
 
如果选择持有，股票型基金这等高风险资产还是尽量避免接触，选择债券基金即可。</br>
 
不该做什么？</br>
 
1.<strong>放任自由，不管不问</strong></br>
 
由于年轻人工作繁忙，可能没有精力顾及父母投资理财，但我们也不能不管不问，否则即使有再好的投资规划也是白搭，而且到了父母这个年龄段是很容易上当受骗的。</br>
 
2.<strong>股票、民间借贷等高风险资产比重过大</strong></br>
 
由于股票、民间借贷等投资在日常生活中几乎无孔不入，很多父母都喜欢平时炒炒股或者是把钱放在楼下的私人借贷公司里。但是由于这两者风险极高，尤其是民间借贷。建议帮助父母理财时，尽量把这部分资产降到最低。</br>
 
3.<strong>忽视未来医疗支出的资金量</strong></br>
 
由于父母在未来随着年龄的增长，有可能后期的医疗支出也会逐渐增加，因此，我们在帮助父母理财时，需要考虑有无社保之类的保险。几乎所有的保险公司对60岁以上的人群不再承保重疾险之类的保险，因此对于年龄较轻、尤其还没有社保的父母可酌情增配重疾险或者医疗险，以减少未来的大额医疗支出。</br>
 
<strong>牡丹宝理财总结</strong></br>
 
替父母理财不是让我们把父母的钱完全接手后进行投资，而是替父母把关、制定合理的理财方案，以保障父母晚年生活越来越好。</p>
</div><!--不知道为父母做什么-->
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
