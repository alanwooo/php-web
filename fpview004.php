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
<div class="quanbulicaixinxi">如何养胖小钱袋 低门槛理财产品盘点</div><!--辣妈辣爸必修课：如何给宝宝一份保障？>-->
<div class="mudanbaolicaishi">牡丹宝理财师&nbsp&nbsp发布时间&nbsp2014-12-7</div>
<div class="yangheyangpang">
 
1.<strong>银行储蓄</strong>
 
投资门槛：银行储蓄并不是没有门槛，而是按照存款的种类，起存金额有变化。活期1元，定期50元</br>
 
投资期限：从活期，到最长5年的定期</br>
 
流动性：极佳</br>
 
收益：低</br>
 
特点：无风险，绝对的安全性。</br>
 
2.<strong>国债</strong>
 
投资门槛：100元</br>
 
投资期限：3年期和5年期</br>
 
流动性：好，但是提前兑付会损失部分利息收益</br>
 
收益：偏低</br>
 
特点：无风险</br>
 
*3.<strong>基金 *</strong>
 
投资门槛：一次性申购1000元起，定投较低，通常100元起</br>
 
投资期限：不限，但建议长期持有</br>
 
流动性：好，可以随时赎回，但资金到账时间通常在T+2-T+7个工作日</br>
 
收益：不同类型，收益不同。偏股型基金理论收益最高，偏债型基金其次，货币基金最低</br>
 
风险：不同类型风险不同，货币基金风险最低，偏债型基金其次、偏股型基金最高</br>
 
特点：专业投资人管理，基金种类丰富、操作简单易行</br>
 
4.<strong>余额宝类</strong>
 
投资门槛：低，1元起</br>
 
流动性：极佳</br>
 
收益：本质上多为货币基金和理财型基金，整体收益不高</br>
 
投资期限：不限，但实际收益偏低，可作为现金管理的工具，不建议长期持有</br>
风险：低</br>
 
特点：收益具有连续性，是理财小白们投资基金的入门之选</br>
 
5.<strong>P2P网络贷款</strong>
 
投资门槛：适中，100元或1000元起</br>
 
流动性：一般</br>
 
收益：高，前十大P2P网贷平台的预期年化收益率在6.5%-18%</br>
 
投资期限：大多数产品期限在1年以内，部分产品在1-3年</br>
 
风险：整体风险中等</br>
 
特点：收益高并且稳定</br>
 
6.<strong>票据理财类</strong>
 
投资门槛：低，最低仅需1元，通常为100元起</br>
 
流动性：一般</br>
 
收益：高，目前收益在5.5%-7.5%</br>
 
投资期限：大多数产品期限在20天—180天不等</br>
 
风险：较低，但仍将面临虚假票据、延迟支付等风险</br>
 
特点：收益高，投资期限适中</br>
 
眼花缭乱的小额理财工具，该如何选择？</br>
 
职场新人和在校学生</br>
 
如果你刚刚踏入职场，或者还是在校学生，可能没有多余的钱来理财，并且对风险的承受力也较低，那么余额宝类产品和基金，尤其是基金定投，是比较不错的选择。</br>
 
收入稳定的理财新人</br>
 
如果你的工作和收入都稳定，也有一些资金基础，那么P2P网贷、基金和票据理财都可以尝试投资。</br>
 
相对保守的中老年人</br>
 
而像爸妈这种岁数的中老年人，由于风险承受能力下降，投资风格趋于保守，加之对新鲜的投资产品接受起来比较困难，如此以来，稳妥的银行储蓄和国债应该是首选。</br>
 
购买小额理财产品的注意事项</br>
 
1.<strong>投资门槛越低，实际的盈利能力也相对较差</strong></br>
 
小额理财产品，尤其是通过互联网渠道销售的，个个给出的收益都在6%、甚至7%以上，其实这些大都是年化收益率，最后真正拿到手的并不高。对这些风险低的小额理财产品来讲，最好不要抱过高的收益预期，既然风险低，也表明大部分的资产都会投向一些固定收益类的金融产品。</br>
 
2.<strong>赎回后的到账时间</strong>
 
投资理财产品，要注意赎回到账时间，因为每款产品的交易规则不同，有的是确认赎回后立即到账，有的则需2-7个工作日才能到账。到账的时间长，也会给投资者的收益打折扣。</br>
 
3.<strong>不要冲着风险低，就把大量甚至全部资金放在一个/类产品中</strong></br>
 
合理分散投资永远是正确的。将全部资金投入一个，或者一类产品中，并非明智之举。虽然小额理财产品的安全性较高，但实际收益偏低，我们应该根据资金量的不同，选择以上2-3类产品投入即可，余下的资金在控制风险的前提下，进行合理的配比，这样够使你的资产配置更加合理。
</div><!--如何养胖-->
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
