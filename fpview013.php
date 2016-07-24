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
<div class="quanbulicaixinxi">怎样从理财小白到合格基金投资者——3招教你看季报</div><!--怎样从理财小白到合格基金投资者——3招教你看季报 >-->
<div class="mudanbaolicaishi">牡丹宝理财师&nbsp&nbsp发布时间&nbsp2014-12-7</div>
<div class="zenyangcong-1"><p>你是不是一个合格的基金投资者？你不清楚？没关系，我们换个问题——你多久才会关心一下自己投资的产品？每天？每周？还是从不？</br>
 
如果你是甩手党，那么只能说，你永远成不了合格的基金投资者。投资不关注，思想怎么能进步？</br>
 
近期，各家基金公司陆续披露了2014年的三季度基金报告，如果你决定开始尝试基金投资或正持有基金，那就跟着好规划一起关注一下基金季度报告吧。</br>
 
但是冗长的报告，普通投资者很难也无需面面俱到，如何抓住重点呢？别担心，好规划教你几招。</br>
 
1.<strong>投资组合是灵魂</strong></br>
 
投资组合是基金的灵魂，此话一点儿都不为过。对于基民来讲，这是考察基金投资风格的重要依据。除了纯债基金、一级债基和货币基金外，基金的季报都会披露占净值前10名的重仓股和按行业分类的股票投资组合，我们可以从重仓股的行业上，大致判断基金经理的投资偏好。例如，如果每季度的前10大重仓股都出现很多新面孔，则表明该基金调仓较为频繁，基金经理比较偏好短线操作。</br>
 
2.<strong>基金业绩是门面</strong></br>
 
如果说投资组合是灵魂，那么业绩就是门面。拥有一张漂亮的脸蛋儿，搁谁看了心里都舒坦。在季报中，我们可以重点关注基金净值增长指标，包括净值增长率和累计净值增长率。如果要了解基金实际运作与业绩基准的差异程度，还可以同业绩比较基准进行比较，从而大致判断基金的运作绩效。</br>
 
3.<strong>关注份额变化</strong></br>
 
有了灵魂，也有了门面，接下来就需要有忠实的粉丝了。关注基金份额的变化，可以让我们了解基金是否受到投资者的青睐，如果份额变化较前几期报告更加剧烈，意味着出现了较大规模的申购或赎回。</br>
 
另外，基金规模的过大或过小，对基金的流动性、投资风格等方面也会产生不利影响——规模太大的基金，比如景顺长城内需增长贰号，三季度规模高达79.05亿元，但近1年的业绩一直不佳，虽然不能单纯的归咎于规模大，但是“船大掉头难”还是有道理的。另外，规模太小的迷你型基金也要谨慎投资，尤其是资产净值在1亿元以下的基金，往往不受个人和机构投资者的青睐，业绩也比较差。</br>
 
<strong>牡丹宝理财总结</strong></br>
 
我们想提醒各位的是，基金季报作为展示过去一个季度基金业绩的“成绩单”，只能反映过去的业绩，并不能代表其未来的业绩情况。所以查阅季度报，更多的是让我们对自己所持有的基金有一个比较清楚全面的认识，不能单凭一个季度的业绩论成败！</p>
</div><!--怎样从-1-->
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
