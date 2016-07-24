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
<h2>咨询理财师</h2>
<div class="zixunlicaishi-1">
<p>问：<strong>请问短期融资券个人可以买吗？</strong></br>

答：
 短期融资券是由企业发行的无担保短期本票，期限不超过1年，但是它只在银行间债券市场机构投资者之间流通，不向社会公众发行的，所以个人投资者无法购买。</br> 


问：<strong>月光族也要做规划吗？</strong></br> 

答：
 理财规划是针对个人或家庭发展的不同时期，依据收入、支出、资产负债状况制定的全方面的人生财务规划。针对年轻的月光族，理财规划更侧重于收入分析、消费支出分析、预算分析、以及记账管理。 通过规划，我们可以逐步养成良好的记账预算习惯，控制支出、增加结余；学习12存单（60存单）、基金定投等投资方式，实现强制储蓄；尝试货币基金等现金类工具，为流动资金提高收益，从而在根本上告别“月光”。 </br>


问：<strong>什么是理财规划？</strong></br> 

答：
 理财规划是理财规划师通过与用户的沟通，在充分了解用户财产状况和需求的基础上，帮助用户分析收支状况、健全财务保障、优化资产配置的过程。我们提供的不仅仅是一份规划书，她还承载着持续的跟进服务。 </br>


问：<strong>理财规划实用吗？ </strong></br>

答：
 我们的理财规划是根据每个人的实际收支和资产情况量身定做的，具有独特性和原创性，尤其是在实际执行过程中充分考虑每个人的现金流状况，以达到真实、实用、推进资产稳健增值的目的。</br> 


问：<strong>基金定投，扣款日期设置成20或25号，没有本质区别吧？不会每个月20号都是高点吧。</strong></br> 

答：
 一般扣款日期设定为发工资后的3个工作日内比较合适，有利于强制储蓄。至于每个月几号是高点或者低点，这一点无法通过数据给出判断，定投的目的在于摊薄成本聚沙成塔，积累更多份额。所以扣款时间的选择并不重要。</br> 


问：<strong>市场有没有医保外的那部分费用能报销的保险？</strong> </br>
答：
 有的。一般商业医疗保险的投保人会区分有无社保。对于没有社保的人可能报销比例65%。对于有社保的，就是针对社保报销剩余部分报销90%。当然具体比例需要看具体产品。</br> 


问：<strong>基金定投和普通方式买入基金，有什么区别？定投就一定能赚钱吗？定投手续费用是不是低一些？普通方式买入基金是不是没有分红？</strong></br> 

答：
 基金定投是在确定时间通过银行自动扣款来完成每次的购买基金；普通买入基金是，等我想买的时候一次性购买X元的基金。定投赚不赚钱是由购买的基金的业绩决定的，基金是不保本不保收益的，所以定投不一定赚钱。从长期来看，定投的成本相对普通购买基金要少，因为定投可以避免我们在市场最高点一次性买入太多基金。基金分红和基金购买方式（定投或普通方式）是无关的，它与购买的哪只基金本身有关。</br>问：<strong>基金的收费方式是什么意思？</strong></br>  

答：
 基金的收费方式有两种，前端收费和后端收费。前端收费就是投资者在认购或申购基金时，支付有关认购或申购费用；后端收费是在我们认购或申购基金时，不用支付相关费用，而赎回时，才支付认购或申购费用。 </br> 


问：<strong>公积金贷款与商业贷款相比有什么优势？</strong></br>  

答：
 首先公积金贷款可享受利率优惠，前段时间五年以上商贷利率为6.55%，公积金贷款利率为4.5%。贷款30年80万为例，商贷每月还款5083元，公积金每月还款4053元。 其次公积金贷款相对商业贷款还款方式灵活，公积金贷款除了可以选择商贷中的等额本金和等额本息外，还可以选择自由还款：只要不低于每月最低还款额，可自由选择每月还款金额。</br> 


问：<strong>理财规划该如何使用？</strong></br>  

答：
 （1）理财规划提供的是相对确定的理财思路，以及可变的行动方案。在财务状况发生细微变化时，请参照理财思路调整行动方案； （2）在财务或者生活状况发生重大改变时，如工作变动、结婚生子，以及重大理财目标的调整，请及时与理财规划师沟通，调整规划； （3）每一份理财规划都是理财师根据用户的特点定制，只有用户持续的实践，并根据实践状况做出调整，才能真正成为自己的规划，实现规划的意义。</br>  

问：<strong>国债跟货币基金哪个更好？</strong></br>  

答：
 两者在流动性上有很大的不同，货币基金更灵活，方便随时取用。收益上来讲，国债的收益还是高于货币基金的。 </br> 

问：<strong>货币基金收益率低下来后，应该买什么呢？</strong></br>  

答：
 首先，货币基金的收益有多高？ 每年年底、季末包括货币基金、银行理财在内，都会迎来一段时间的高收益。但是动辄6、7甚至上10的收益并非常态，也不是货基的正常水平。过去三年货基的平均收益分别为：2013年3.92%、2012年3.95%、2011年3.55%. 大家都已经做过规划了，货币基金需要配置在哪里？ 1、紧急备用金：以备不时之需。 2、短期目标：短期内需要用的钱。 这两者都需要在保持流动性的前提下提高收益，所以才配置了货币基金。而对于长期目标和其他资金，我们应该对应的配置到股票、股基、债基、国债、贵金属等产品上。 结论就是即使现在货基的收益降了，它仍然是紧急备用金和短期目标的首选。而它始终不是长期投资的选择。</div><!--咨询理财师--></p>
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
