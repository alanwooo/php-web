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
<div class="quanbulicaixinxi">辣妈辣爸必修课：如何给宝宝一份保障？</div><!--辣妈辣爸必修课：如何给宝宝一份保障？>-->
<div class="mudanbaolicaishi">牡丹宝理财师&nbsp&nbsp发布时间&nbsp2014-12-7</div>
<div class="lamalaba"><strong>给孩子配置保险，迫在眉睫​</strong>
 
调查数据显示，我国每年有20%～40%的儿童因意外伤害身故、残疾或需要进行医学治疗。而一些疾病也有年轻化、低龄化的趋势，再加上小孩子天性活泼好动，自我保护意识比较差，在社会中处于弱势群体，因此给孩子购买提供人身保障的保险很有必要。​</br>
 
不仅是人身安全的保障，孩子未来的教育也是笔大花销。据统计，普通家庭养育一个孩子，从出生到大学毕业，预计要花费50-130万元，如果送孩子出国留学，那至少要需要200多万元。这对于普通家庭而言，压力着实不小。因此提早给孩子准备教育金，在很大程度上可以减轻父母们的压力。如果你无法保证投资的绝对安全，那子女教育金保险也是个不错的选择。​</br>​
 
好规划观点：小孩子属于特殊群体，在选购保险上不同于成年人，需要考虑的因素很多，需要注意什么，家长应该在购买前做足功课，以免买了不合适的产品花了冤枉钱。​​</br>
 
1.<strong>先社会保险后商业保险。</strong>​
 
作为居民的基本保障，社会保险必不可少。我们以北京地区为例，少儿社会医疗保险——即“一老一小”中的“一小”，承担了基本的门诊医疗及住院医疗，并按一定比例报销，保费也很便宜，自2010年起，每年保费100元。目前新生儿社会保险仅限于拥有城镇户口的孩子，采取自愿投保原则。​ ​​
 
但社保的特点是“低水平、广覆盖”，尤其是医疗保险面临不少的限制。因此还需要商业保险作为补充。</br>​
 
2.<strong>先保障大人，后保障孩子​</strong>
 
可能很多父母在了解孩子配置保险的必要性后，花大量资金给孩子购买保险，其实这是不正确的。父母是家庭的经济支柱，也是孩子最好的“保障”，如果只给孩子买保险，大人自己却不买，那么一旦家里主要的经济来源出了问题，这个家庭很可能会因此陷入困境，为孩子买再多的保险也无事于补。​</br>
 
​ 3.<strong>优先购买保障型保险，后考虑教育型保险​</strong>
 
许多父母认为子女教育最重要，便花大量资金为孩子购买教育金保险，却不购买对于孩子人身来讲更为必要的意外险、医疗险或重疾险，这样一来就得不到保险的保障功能。因此父母们应最先考虑孩子的健康和成长问题，即首先考虑保障型保险，然后才是储蓄类或理财类保险。​​</br>
 
​ 4.<strong>缴费期应该灵活，不宜过长​</strong>
 
在选择缴费期限时，建议集中在孩子未成年之前，待他/她长大成人之后，可为自己选择适合的险种进行投保。孩子在成长的不同阶段会也会表现出不同的需求，需要与之相适应的保险，因此不建议父母购买保险时选择趸交保费的形式，缴费期限还是越灵活越好，比如年缴保费。​</br>​
 
5.<strong>要购买豁免附加险​</strong>
 
少儿保险中的豁免条款规定，如果投保人发生意外或者因故丧失交费能力，可以豁免未交的保费，保险合同依然有效。这样一来，万一父母因某些原因无法继续缴纳保费时，对孩子的保障继续有效。这实际上也给父母间接的提供了一份“保障”。​​</br>
 
豁免的保障利益就是免缴保费，因此消费型的意外险、医疗险没有这种功能。所以豁免要附加在长期缴费的保险才有效。​​</br>
 
​ 6.<strong>要量力而行​
 
无论为谁购买保险，都要做到量力而行</strong>。购买保险属于经济行为，投保人必须支付保费，才能获得相应的保障。因此为宝宝购买保险前，应充分考虑家庭的经济承受能力。通常来讲，家庭所有成员的年交保费不应超过家庭总收入的15%，以10%左右为宜。
</div><!--辣妈辣爸-->
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
