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
<div class="quanbulicaixinxi">美满人生的3个秘密：4张存折，3份工资，1份保障</div><!--辣妈辣爸必修课：如何给宝宝一份保障？>-->
<div class="mudanbaolicaishi">牡丹宝理财师&nbsp&nbsp发布时间&nbsp2014-12-7</div>
<div class="meimanrensheng">

​ 美满人生需要4张存折
 
有人说人美满的一生需要4张存折。具体是哪四张呢？且听规划君娓娓道来。</br>
 
<strong>第一张是活期存折</strong>。</br>收益微乎其微，但胜在流动性好，能满足你平时花费的需要；</br>
 
<strong>第二张是定期存折</strong>。</br>在拥有一定收益的同时，又能保证每年重大支出的需要；</br>
 
<strong>第三张是强制储蓄存折</strong>。</br>这笔钱是帮你实现财富增值的，所以你只能存不能取，直到很多年后你需要它的那天（比如退休那天）；</br>
 
 
<strong>第四张是风险转移存折</strong>。</br>人的一生中有这样那样的风险，不可预知但一旦发生会带来巨大的经济损失与人身伤害。所以我们需要一张存折，能够将风险转移，即使出事了，我们也有足够的赔款来应对。</br>
 
 
工资分三份，消费支出最靠后</br>
 
 
有一类人，他们总说省不下钱，对他们来说活期存折是最早光荣就义的（花光了），定期存折一年到期就被火速取光用光；而强制储蓄存折，因为总是先消费后储蓄，所以存折永远不会长大。第4张存折对于他们来说更是从来没有存在过。</br>
 
 
但我们要知道日常的花费是有着很大的弹性。如果你把工资分成3份，每次先满足固定支出，再满足理财支出，最后满足消费支出，你的荷包就会越来越多，生活也会越来越美。
 
最美当属你的第四张存折</br>
 
 
前3张存折无非是赚钱与花钱的命题，而第4张存折，却是一个爱与科学的命题。为什么这么说呢？且听规划君娓娓道来。</br>
 
 
人生自古谁无死，谁来为你抗风雨</br>
 
 
天有不测风云，人有旦夕祸福，纵然海誓山盟，情深意切，但命运的玩笑也许会让这一生一世的誓言化为泡影。如果你先走一步，那如何能让她这一辈子幸福美满？人生自古谁无死，力所能及地给自己的牵挂留下一点庇佑，是人之常情，也是科学的理财规划。</br>
 
 
可怜天下父母心，谁来陪伴你一生</br>
 
 
可怜天下父母心，我们都希望给孩子一份最全面的保障。让孩子幸福安心地成长，也是我们做父母的责任。另外，孩子的学费是刚性支出，且没有任何时间弹性。所以，如何给孩子进行合理规划，让孩子健康成长就显得尤为重要。</br>
 
 
做支柱不做负担，越早准备越轻松</br>
 
 
年轻时候那你为孩子安排好一切，可是老了你愿意成为负担么？现在的小孩不容易，今后2个孩子面对的是4位甚至8位老人，别忘了除了老的，还有小的。或者孩子不靠谱，那我们怎么办？
 
新时代的父母，当然要把自己先照顾地妥妥的，才能防止人到中老年的凄凉。而养老金什么的，即使是同一笔钱，你准备得越早就越轻松。</br>
 
 
倒什么也不倒保险公司</br>
 
 
我们相信银行，愿意从银行买理财产品，是因为我们觉得银行安全，银行永远不会倒闭。但是随着利率市场化的放开，银行业的竞争愈加激烈，未来银行倒闭也不是不可能的事情了。</br>
 
 
但是保险公司是不会倒闭的，即使某家保险公司难以为继，国家也会制定其他保险公司继续承担责任，决不让保户利益受损。好规划建议广大投资客根据自身财务情况合理拨配一部分资金（不超过收入的10%-15%）给保险，为良好的生活品质多增加一份保障。
</div><!--美满人生-->
 
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
