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
<div class="quanbulicaixinxi">合格基金投资者必备技能</div><!--辣妈辣爸必修课：如何给宝宝一份保障？>-->
<div class="mudanbaolicaishi">牡丹宝理财师&nbsp&nbsp发布时间&nbsp2014-12-7</div>
<div class="hegejijin"><p><strong>这个费，那个费什么的好复杂，但是你不用管</strong></br>
 
基金投资过程中会有很多费用，但是很多费用是在基金净值中就扣除了的。换句话说，这部分费用与投资者无直接关系。因为你拿到的收益就是已经扣除了这部分的费用了。因此，投资者对于这部分只需了解，不需要自己计算。</br>
 
<strong>“申购费”“赎回费”计算如何简单搞定？</strong></br>
 
我们要了解自己基金投资过程中的费用，其实只要了解申购费（认购费）和赎回费就可以啦。这两个的计算也不是很难，且听规划君慢慢讲解。</br>
 
<strong>重要知识点</strong></br>
 
基金认购（申购）费用的计算公式： 净申购金额＝申购金额/ (1＋申购费率)； 申购费用＝申购金额－净申购金额</br>
 
基金认购（申购）可获份额的计算公式：申购份额＝净申购金额/申购当日基金份额净值</br>
 
基金赎回费用计算公式：赎回费用＝（赎回份额×净值）×赎回费率</br>
 
基金赎回后可得到的金额计算公式：赎回金额=（赎回份额×净值）-赎回费用</br>
 
<strong>举个例子就更明白了</strong></br>
 
例1：某只股票型基金10月22日的净值为1.5620元，如果当天15点之前用10000元申购该基金，那么需要支付多少申购费，能获得多少份额呢？已知，该基金的申购费率是1.5%。</br>
 
净申购金额＝10000 ÷ (1＋1.5%)=9852.22</br>
 
需要支付的申购费＝10000－9852.22=147.78</br>
 
可以获得的份额=9852.22÷1.5620=6307.44</br>
 
例2：如果已持有10000份该股票型基金，想在10月22日全部赎回，如果在当天15点前确认赎回，当天的净值是1.620元，那么需要支付多少赎回费？能赎回多少钱？已知，赎回费率为1.0%。</br>
 
需要支付的赎回费＝（10000×1.620）×1.0%=162（元）</br>
 
可以赎回的金额=（10000×1.620）-162=16038（元）</br>
 
<strong>前端收费和后端收费，到底选择哪个？</strong></br>
 
在实际的运作当中，基金申购费的收取有两种方式：一种称为前端收费，另一种称为后端收费。前端收费就是当你在申购时就支付申购费，而后端收费则是你在赎回基金时才支付的。</br>
 
但千万不要将后端收费和赎回费混淆，如果你购买的是后端收费的基金，那么在你卖出基金的时候，除了必须支付赎回费以外，还必须支付申购费。不过后端收费的费率会随着你持有基金时间的增长而递减，比如有些支持后端收费的基金会规定，如果你持有基金超过1年后再赎回，后端收费可以完全免除。</br>
 
所以，如果打算长期持有基金的话，当然后端收费更加合适，一来减少费用的支出，二来还可以在申购时比前端收费获得更多的份额。不过遗憾的是，目前很多基金只能默认前端收费。</br>
 
<strong>牡丹宝理财温馨提示</strong></br>
 
细心的朋友可能已经发现了，虽然都是费用，不过一个在你买的时候收，一个在你卖的时候收，但是计算的公式和过程是不一样的。如果你记不住两者的区别，建议收藏本文，以备不时之需。</p>
</div><!--合格基金-->
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
