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
<div class="quanbulicaixinxi">终于决定买基金了！是定投好还是一次性购买好？</div><!--有没有一种产品，一举两得股债双收 >-->
<div class="mudanbaolicaishi">牡丹宝理财师&nbsp&nbsp发布时间&nbsp2014-12-7</div>
<div class="zhongyujueding"><p>很多投资者在投资基金前，都会有这样的疑问：是一次性的单笔投资好，还是定投好呢？其实，定投与单笔投资并没有绝对的优劣之分。定投可以算是储蓄兼投资的方式，而一次性的单笔投资则更像是较为积极的投资策略。</br>
 
<strong>定投，最大程度的分散风险</strong></br>
 
1.<strong>最大程度的分散风险</strong></br>
 
定投，全称定期定额投资，即在固定的时间以固定的金额投资指定的基金。因为是分批买入，从而克服了只选择一个时点买入的缺陷。相对于一次性投入，定投的优势在于，一方面降低了风险，另一方面也省事儿，设定好时间和金额，就不用操心何时买入的问题了。</br>
 
2.<strong>门槛低，可获得复利效应</strong></br>
 
与一次性投入最低1000元相比，定投不需要投入过多的资金，每月最少只需要100元，即便是市场出现波动，也不会影响到投资人的正常生活。通过不断的累计，以及收益复利效应的作用，最终会积累出一笔可观的收益。</br>
 
3.<strong>熊市和震荡市场的最佳选择</strong></br>
 
当市场处于熊市时，由于基金净值下降，固定的投资金额可以买到更多的份额，待未来净值上涨时，可以获利更多。因此在市场出现振荡行情，或是连续下跌时，定投的投资效果要好于单笔投资。</br>
 
4. <strong>适合追求稳健收益的投资者</strong></br>
 
如果投资者对于风险的承受能力较弱，对于掌握市场的高低点也没有什么经验，那么建议您选择定期定额投资。</br>
 
单笔投资，认清市场再选择</br>
 
1.<strong>投资的目的明确</strong></br>
 
相对于定期定额投资，单笔投入则是投资者不定期不定额的将闲置资金投入基金中的投资行为。单笔投资往往目的性很明确，就是为了获利，更明确些，是短期获利。在此过程中，甚至会产生投机心理，长此以往，基金的风险也会随之被进一步放大。</br>
 
2.<strong>需要认清市场，把握入场机会</strong></br>
 
由于只有“1次机会”，因此在投入时点的选择上，有更高的要求。一旦踏错时点，在一个较高的净值下一次性投入一笔资金，不仅获得的份额少，而且还将面临未来市场波动引起的净值下跌。</br>
 
3.<strong>市场连续上涨时，单笔投资效果最佳</strong></br>
 
当市场出现持续的上涨时，单笔投资的盈利能力会更加凸显，不过也有个前提，那就是资金入场时的基金净值相对处于低点。</br>
 
4.<strong>适合经验丰富的投资者</strong></br>
 
单笔投资是较为积极的投资方式，如果你的风险承受能力比较强，并且投资经验丰富、可以有效的掌握市场行情，做到“低买高卖”，那么单笔投入更符合你的胃口。对于单笔投入来说，在相对低点进入，就已经成功了一半。</br>
 
<strong>例子告诉我们，定投通常是更好的选择</strong></br>
 
定投扣款日为每月12日，固定投入900元，连续投资6个月。基金净值分别是1.164元、1.156元、1.059元、1.087元、1.06元、1.215元，买到的基金份额分别为764.02份、769.31份、839.78份、818.15份、804.09份和731.95份，一共是4717.30份，按期末净值1.215元计算，总价值是4717.30×1.215=5731.52元，与总投入相比，共盈利331.52元。</br>
 
如果初期按照1.164元的净值，单笔一次性买入5400元，可以获得4584.16份，6个月后，当净值涨到1.215时，总价值是4584.16×1.215=5569.75元，与总投入相比，盈利169.75元，但这比定投少了161.77元的收益。</br>
 
其实在投资方式的选择上，无所谓谁一定好，谁一定不好，选择适合自己的才是最佳投资方式。不管最终的选择是什么，“坚持”同样重要。</p>
</div><!--终于决定-->
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
