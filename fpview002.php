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
<div class="quanbulicaixinxi">月入3000元的工薪小白，该如何攒钱？</div><!--全部理财信息-->
<div class="mudanbaolicaishi">牡丹宝理财师&nbsp&nbsp发布时间&nbsp2014-12-7</div>
<div class="yueru3000yuan-1">对于追求生活品质的现代都市人来讲，生活不仅仅是满足温饱需求，还要有逛商场、喝咖啡、去旅游....当然，她们不仅仅只顾想着享受，也会想到自己的家人，也会拿出一部分孝敬父母，还得供房租，交电费...如此算来，3000元真的太少了！更别说还是在一线城市，如果说让月入3000的工薪小白攒钱，如何才能做到呢？</br>​
 
​
 
1、<strong>记账</strong>：坚持记帐，争取把每一笔花费都记下，如果实在做不到，也不要放弃，哪怕三天记一次也可以。搞清楚你的钱每天、每周、每月都花在哪里，哪些钱属于可花可不花的，定期做总结，合理做预算。</br>​​
 
​
 
2、<strong>节俭</strong>：俗话讲，吃不穷花不穷，算计不到就受穷。少打一次车，少去外面吃顿饭、少买件衣服、即使特价，不需要的东西也不往家搬……久而久之，你会发现自己也可以省下一笔不少的开支，之后利用者省下来的钱，积攒起来去做投资，让钱生钱。不要觉得如此“会过日子”很跌份儿，节省钱、尊重钱是很多富人的习惯。</br>​​
 
​
 
给大家讲个案例：郭鹤年是杰出的企业家、马来西亚首富。他身兼“两王”，先是享有“亚洲糖王”的美誉，后来又有“酒店大王”之称。但他从不炫耀自己的财富，生活节俭简朴。这位被称为香格里拉之父的大老板，办公室被客人们戏称为鸽子窝，书桌与沙发仍是十几年前的款式，他说整洁即好；从不坐高级轿车，他说公司的宝马与林肯是为外宾及专家服务的；他从不穿名牌服装，不戴名牌手表，他说富豪李嘉诚手腕上也只是戴着一只普通的电子表。郭鹤年在给基金会的信中写道：我经常说，人生在世，有两件事要做的：首先要刻苦工作，努力奋斗，安排家庭的生活；同时，也要帮助一些在教育上有需要的人们。这样社会才会和谐、稳定和进步。</br>​​
 
​
 
3、<strong>冷静消费</strong>。买东西前想想"花这钱值不值得"，“是不是自己必需的“。有时候便宜不见得划算，贵也不一定能保证质量。</br>​​
 
​
 
4、<strong>发工资后的第一件事</strong>，强制储蓄。每月固定的事情是：从薪水中拿出部分钱存起来，5%、10%、20%都可以，无论是放在活期存款账户中，还是购买货币基金，反正一定要存。</br>​​
 
​
 
这里有个我们不长听说的理财法则——“九一”法则。当你收入十块钱的时候，你最多只能花掉九块钱，让那一块钱“永远”留在钱包里。无论何时何地，发生何种情况，一贯如此。哪怕你只收入1块钱，也要把10%存起来。​</br>​
 
​
 
千万别小看这一法则，它可以使你的荷包像还没吹起的气球，慢慢的膨胀。“九一法则”可以使你养成储蓄的习惯，在看到储蓄金额逐渐增加时，进一步刺激获取财富的欲望。</br>​​
 
​
 
5、<strong>银行卡不必多</strong>。尤其是信用卡，如果管不住自己的消费欲望，宁愿借钱也要买，那规划君劝你把信用卡戒了吧，如果你可以管住自己，最多保留两张足矣。</br>​​
 
​
 
6、<strong>养成检查、核对各种小票、收据的习惯，看看你买的东西是否按照价签上的价格销售，免得花冤枉钱。​</strong></br>​
 
​
 
7、<strong>除非明码标价，否则能砍价的商品，一定要砍。比如去电器城买家电，千万不要以为价签上标的价格就是最低价，你若不提降价，店家绝不会主动降价卖给你。</strong></br>​​
 
​
 
“活得风光但痛苦，是一种活法，活得平凡却轻松，是一种活法，智者可以活得风光但不轻松，愚者可以活得轻松但不风光。”规划君想知道，如果是你，你会选择哪种活法？理财从攒钱开始，而攒钱要从节俭开始。​
 
</div><!--yueru3000yuan-1-->
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
