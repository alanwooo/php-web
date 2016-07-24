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
<h2>牡丹宝经典案例</h2>
<div class="news-list">
    <div class="zichanxianzhuang"><a href="#">40岁中层案例</a> </div><!--保险规划-->
    <div class="anlititle"><strong>让结余更多</strong></div><!--收支结余-->
    <div class="tiaoxingtu"><img src="image/40zhongceng.jpg" /></div>
    <div class="anlititle-list">牡丹宝建议：您家庭的月结余率健康，请将月结余率维持在60%（12000元）。</br>
健康的收支状况是未来财富增长的基础。为了顺利达成您的理财目标，开源节流、提高结余是关键。但我们不主张以降低生活品质为代价提高结余，所以需要您更聪明地管理收支，取得“达成理财目标”与“保证生活品质”的平衡。</div><!--牡丹宝建议-->
    <div class="nijiating-list"><strong>一、您的月结余率较健康，建议维持在60%（12000元）。</strong></br>
<div class="jiakang">您当前的月结余状况较健康，请保持。挖掘开源节流的潜力，会帮助您更快进行财富积累。</div>
<strong>二、您的税后月收入为20000元，显著高于当地平均收入 ( 3,332元 )。</strong></br> 
在这种情况下，您的理财重点是：保障收入来源稳定持续（通过保险计划），维持健康的结余状况，并积极投资增加被动收入。</br>
此外，收入的年增长率通常需保持在至少5%，10%以上比较理想。大多数人通过以下手段有效地实现了“开源”：</br></div><!--你家庭的月...-->
    <div class="nijiating-ul">
    <ol>
    <li>1.投资自己，获得加薪/晋升/跳槽；</li>
    <li>2.积极理财，增加投资收益；</li>
    <li>3.适当兼职，拓展收入来源。</li>
    </ol>
    </div><!--你家庭的月...ul li-->
    <div class="nidejiatingyuezhichuqingkuang"><strong>您的家庭月支出现状</strong></div><!--你的家庭月支出情况-->
    <div class="canyin-li">
    <ul>
    <li>餐饮娱乐8000 元</li>
    <li>交通通讯 500 元</li>
    <li>家居购物 6000元</li>
    <li>房租房贷 0元</li>
    <li>其他支出5500 元</li>
    </ul>
    </div><!--餐饮娱乐-->
    <div class="nidejiating-list"><strong>三、您的月支出（8000元）较高，高于65%的个人。</strong></div><!--你的家庭高于-->
    <div class="nidejiating-list2">您的家庭月支出偏高：您家庭的月支出高于平均水平，建议您继续挖掘节流空间。我们在本章的附录中为您准备了《非必要支出自检表》，您可以结合自己的消费习惯对照阅读。</div>
    <div class="lingwai">另外，您的房租房贷支出为0元，占月收入比例为0%，处于合理范围，请继续保持。我们建议您在支出习惯和理财方法上做出以下改变，从而让结余目标更容易实现。</div>
    <div class="nidejiating-img"><img src="image/shouruzhuxingtu.jpg"  /></div><!--你的家庭图片-->
<div class="tiaoxingtu2"><img src="image/40zhongcengxingdongjihua.jpg" /></div>
    <div class="fulu-list"><img src="image/biaoge1.jpg" /></div>
    <div class="touziguihua-list"><strong>投资规划</strong></div>
    <div class="fuerdaitouziguihua"><img src="image/40zhongcengtouziguihua.jpg"</div><!--投资规划-->
    <div class="duiyutouzi-list">对于投资，牡丹宝理财的基本观点是：投资的本质是管理风险，而不是一味追求更高的收益率。唯有在收益和风险之间取得平衡，才是资产长期稳健增值之道。</br>
因此，我们以资产配置作为投资规划的核心思路。正如“不要将所有鸡蛋放在同一个篮子里”，过去数十年的理论和实践证明，资产配置方法通过分散投资，能够有效规避市场风险，创造长期稳健的投资回报。</br>
牡丹宝理财将主流投资品种分为低风险、中等风险、高风险三类；首先是根据您可以承受的风险水平确定配置比例；再结合您的财务现状，对每个大类中具体投资品种的选择给出建议。</br>
<strong>您的可投资资产</strong></br>
您的金融资产总额为950000元 （为计算方便，四舍五入至百位）。在前面的规划中，我们建议您将其中 50000元（活期存款和货币基金）作为紧急备用金来储备，作单独的规划安排。因此：
您当前的可投资资产为550,000元-50000元=500000元</br>
<strong>您的资产配置方案</strong></br>
在上一章“风险承受能力和偏好”中，我们一起得到结论：在投资过程中，您最多可以承受-10%的风险。在投资规划中，我们将严格控制您的投资风险在-10%以内，并且在此基础上，应用统计学原理和国际主流的马克维茨资产配置模型，基于过去十年的市场数据为您设计投资方案。</br>
我们按照20%：45%：35%的比例，为您分别配置低风险、中风险和高风险资产。按照过去10年各类资产的平均收益率计算，这一组合的预期年化收益率为9.40%。</br>
如果在10年前以该配置比例投资，实际市场运行（2004-2013）的结果是：获得年化11.62%的收益，累计总回报200.32%。这一组合表现出显著的收益率优势，远超绝大多数固定收益理财产品。</br>
低风险投资180000元</br>
<strong>推荐品种：货币基金、银行理财产品、国债、部分互联网理财产品</strong></br>
中风险投资 405000 元</br>
<strong>推荐品种：二级债券型基金、优选P2P网贷</strong></br>
高风险投资 315000 元</br>
<strong>推荐品种：股票型基金、指数型基金、混合型基金</strong></br>
注：为执行、计算方便，上图中的金额均四舍五入至百位。</br>
关于各投资品种，我们准备了更多介绍信息，请参见本节附录：《主流投资品种一览》。我们也特别筛选了适合您投资的具体产品，并将提供持续的咨询服务，请参见您在本站的行动计划。</br>
<strong>波动风险：</strong></div><!--对于投资结束-->
<div class="youhuaxianyou-list"><strong>1.优化现有资产配置</br></strong>
推荐方案的实现很难一蹴而就，其过程与您的资产现状，以及当下市场条件有关。您可以在未来一年中逐步调整和优化，以达到理想配置。根据上述低、中、高风险资产20%：45%：35%的理想配置，行动计划如下：</br></div>
<div class="xianyouzichan"><img src="image/40zhongcengxianyouzichan.jpg" /></div>
<div class="youyu-list">由于投资期限和收益现状等原因，直接对现有资产进行优化可能存在较大难度，那么可将重点放在未来收支结余的投资分配上。</br></div>
<div class="yongweilai-list"><strong>2.用未来收支结余优化资产配置</strong></br></div>
    <div class="liangzhongfangfa-list">我们可以有<strong>两种</strong>方法来处理未来收支结余的投资去向。</br>
一是<strong>“平推法”</strong>。每月的结余资金按照既定比例（20%：45%：35%），分别投入各个风险等级的投资品种中。其中效率最高的方式是基金定投。</br>
二是<strong>“渐进法”</strong>。未来的结余集中进行单笔投资，分别投向不通风险级别的品种。这种方法因其灵活，更有利于把握随时出现的投资机会。</br>
对于这两种方法，我们都优选了一些具体的投资产品或组合供您选择，请参见您在本站的行动计划。</br></div>
<div class="fulu-list"><strong>附录：主流投资品种一览</strong> ( 2014年10月8日更新 )</div>
<div class="fulu1"><img src="image/fulu1.jpg" /></div>
<div class="fulu1"><img src="image/fulu2.jpg" /></div>
<div class="fulu1"><img src="image/fulu3.jpg" /></div>
<div class="zichanxianzhuang-list"><strong>资产现状</strong></div>
<div class="licaideqidian">理财的起点</br>
盘点您家庭现有的资产和负债，是进行理财规划的第一步。</br></div>
<div class="zichanxianzhuang-1"><img src="image/40zhongcengzichanxianzhuang.jpg" /></div>
<div class="nidejiatingcaifu"><strong>一、您的家庭财富（净资产）= 1800000元</strong></br>
净资产 = 资产总计1800000元 - 负债总计0元 = 1800000元</br>
您已经有了十分可观的财富积累。但这只是一个起点，如果善加投资，财富成长速度会越来越快。</br>
<strong>二、您家庭的资产负债率 = 0%，财务风险较低。</br></strong>
资产负债率 = 负债总计0元 / 资产总计1800000元 = 0%</br>
您的资产负债率为0%，没有债务负担。请您继续保持健康的收支状况、稳健投资，不断提升抵御财务风险的能力。</br></div>
<div class="xiayigeanli"><a href="age60midclass.php">查看下一个案例</a></div>
</div><!--news-list-->
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
