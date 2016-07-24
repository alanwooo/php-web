<?php
if (!isset($_SESSION)) {
	session_start();
}
?>
<?php
$is_failed=false;
$Loginuser_shouyi_rate = "8.92";
$Loginuser_shouyi_10_rate = "12.03";
function pie3d($filen, $data, $month) {
	global $Loginuser_shouyi_rate;
	global $Loginuser_shouyi_10_rate;
	require_once ("src/jpgraph.php");
	require_once ("src/jpgraph_pie.php");
	require_once ("src/jpgraph_pie3d.php");
	$graph = new PieGraph(700, 300);
	$graph->SetShadow();
	$graph->SetColor('#FFFFFF');//设置背景颜色
	$graph->title->Set(mb_convert_encoding("          本组合预期年化收益率 ".$Loginuser_shouyi_rate."%\n          过去 10 年的实际年化收益率 ".$Loginuser_shouyi_10_rate."%", "html-entities", "utf-8"));
	$graph->title->ParagraphAlign('center'); //title对其方式
	$graph->title->SetPos(0.9,0.9,'left','center'); //title的位置
	$graph->title->SetColor("#A01818"); //title的颜色
	$graph->title->SetFont(FF_SIMSUN, FS_BOLD, 12);
	$graph->legend->Pos(0.7,0.6,'center','bottom');//设置旁注位置
	$graph->legend->SetFrameWeight(0); //图例文字外框边框border设置为0
	$graph->legend->SetFillColor('#FFFFFF'); //图例文字框内的填充颜色
	$graph->legend->SetShadow('#C8C8C8', 0);
	//$graph->legend->Pos(0.5,0.0.5,'left','bottom');
	$graph->legend->SetLayout(LEGEND_VERT);
	$graph->legend->SetFont(FF_SIMSUN, FS_BOLD); 
	$graph->legend->SetFillColor('#FFFFFF');  //设置legend背景颜色
	//$theme_class= new VividTheme;
	//$graph->SetTheme($theme_class);
	$p1 = new PiePlot3D($data);
	$graph->Add($p1); //在SetSliceColors之前add这样可以设置slice颜色
	$p1->SetSize(0.5);
	$p1->ExplodeAll();
	$p1->SetCenter(0.28);
	$p1->value->SetColor("brown"); //设置百分比颜色
	$p1->SetSliceColors(array('red','orange','green'));//设置每个饼的颜色
	//$p1->SetColor("red");
	$p1->SetLegends($month);
	//$p1->SetLegends($gDateLocale->GetShortMonth());
	$graph->Stroke($filen);
}
$MM_redirectLoginFailed="login.php";
if (isset($_SESSION['MM_Username'])) {
	$LoginUserID=$_SESSION['MM_UserID'];
	require_once "dbaccess.php";
	//读取收入现状的数据表
		$LoginRS_income=sprintf("SELECT * FROM user_income_t WHERE in_id='%s'",get_magic_quotes_gpc() ? $LoginUserID : addslashes($LoginUserID)); 
		$LoginRS_income_RS = mysql_query($LoginRS_income);
		if ($LoginRS_income_RS) {
			$LoginRS_income_row = mysql_fetch_row($LoginRS_income_RS);
			$Loginuser_sal = $LoginRS_income_row[1];
			$Loginuser_othsal = $LoginRS_income_row[2];
			$Loginuser_bonus = $LoginRS_income_row[3];
			$Loginuser_othbonus = $LoginRS_income_row[4];	
			$Loginuser_income_all = $Loginuser_sal + $Loginuser_othsal + $Loginuser_bonus + round( $Loginuser_othbonus / 12 );
		} else {
			$is_failed=true;
		}
	//读取资产现状的数据表
		$LoginRS_mon=sprintf("SELECT * FROM user_money_t WHERE user_id ='%s'",get_magic_quotes_gpc() ? $LoginUserID : addslashes($LoginUserID)); 
		$LoginRS_mon_RS = mysql_query($LoginRS_mon);
		if ($LoginRS_mon_RS) {
			$LoginRS_readmon_row = mysql_fetch_row($LoginRS_mon_RS);
			$Loginuser_currmoney = $LoginRS_readmon_row[1];
			$Loginuser_fiedmoney = $LoginRS_readmon_row[2];
			$Loginuser_monall = $Loginuser_currmoney + $Loginuser_fiedmoney;
		} else {
			$is_failed=true;
		}

		$LoginRS_final_mon=sprintf("SELECT * FROM user_financial_t WHERE user_id='%s'",get_magic_quotes_gpc() ? $LoginUserID : addslashes($LoginUserID)); 
		$LoginRS_final_RS = mysql_query($LoginRS_final_mon);
		if ($LoginRS_final_RS) {
			$LoginRS_final_row = mysql_fetch_row($LoginRS_final_RS);
			$Loginuser_final_all = $LoginRS_final_row[1] + $LoginRS_final_row[2] + $LoginRS_final_row[3] + $LoginRS_final_row[4] + $LoginRS_final_row[5] + $LoginRS_final_row[6] + $LoginRS_final_row[7];
			$Loginuser_monall = $Loginuser_final_all + $Loginuser_monall;
		} else {
			$is_failed=true;
		}
		
		$LoginRS_fou_mon=sprintf("SELECT * FROM user_foundation_t WHERE user_id='%s'",get_magic_quotes_gpc() ? $LoginUserID : addslashes($LoginUserID)); 
		$LoginRS_fou_RS = mysql_query($LoginRS_fou_mon);
		if ($LoginRS_fou_RS) {
			$LoginRS_fou_row = mysql_fetch_row($LoginRS_fou_RS);
			$Loginuser_fou_all = $LoginRS_fou_row[1] + $LoginRS_fou_row[2] + $LoginRS_fou_row[3] + $LoginRS_fou_row[4] + $LoginRS_fou_row[5] + $LoginRS_fou_row[6];
			$Loginuser_monall = $Loginuser_fou_all + $Loginuser_monall;
		} else {
			$is_failed=true;
		}
		//可承受风险
		$LoginRS_risk_ins=sprintf("SELECT * FROM user_licai_risk_t WHERE user_id='%s'",get_magic_quotes_gpc() ? $LoginUserID : addslashes($LoginUserID)); 
		$LoginRS_risk_RS = mysql_query($LoginRS_risk_ins);
		if ($LoginRS_risk_RS) {
			$LoginRS_risk_row = mysql_fetch_row($LoginRS_risk_RS);
			$LoginRS_risk_value = $LoginRS_risk_row[1] + $LoginRS_risk_row[2] + $LoginRS_risk_row[3] + $LoginRS_risk_row[4];	
		} else {
			$is_failed=true;
		}
		
		if ($LoginRS_risk_value >= 13) {
			$LoginRS_risk_rate = "-15%";
		} else if (13 > $LoginRS_risk_value and $LoginRS_risk_value >= 10) {
			$LoginRS_risk_rate = "-10%";
		} else if (10 > $LoginRS_risk_value and $LoginRS_risk_value >= 7) {
			$LoginRS_risk_rate = "-5%";
		} else {
			$LoginRS_risk_rate = "0%";
		}

	//生成饼图
		if ($is_failed) {
			echo '<script type="text/javascript">window.alert("数据库读取失败!")</script>';
		} else {
			$Loginuser_mon_used = $Loginuser_monall - $Loginuser_income_all;
			$Loginuser_mon_used_35 = sprintf("%d", $Loginuser_mon_used * 0.35);
			$Loginuser_mon_used_45 = sprintf("%d", $Loginuser_mon_used * 0.45);
			$Loginuser_mon_used_20 = sprintf("%d", $Loginuser_mon_used * 0.20);
			$piefilen="image/tmp/yuqisouyipid3d".$LoginUserID.".png";
			if(file_exists($piefilen)) {
				unlink($piefilen);
			}
			$data = array(35, 45, 20);
			$month = array(mb_convert_encoding("高风险投资".$Loginuser_mon_used_35."元:\n推荐品种：货币基金、银行理财\n产品、国债、部分互联网理财产品", "html-entities", "utf-8"),
								mb_convert_encoding("中风险投资".$Loginuser_mon_used_45."元:\n推荐品种：二级债券型基金、\n优选P2P网贷", "html-entities", "utf-8"),
						mb_convert_encoding("低风险投资".$Loginuser_mon_used_20."元:\n推荐品种：股票型基金、指数型\n基金、混合型基金", "html-entities", "utf-8"));
			pie3d($piefilen, $data,$month);
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
      echo "<li><a href=\"\">欢迎 $userid</a></li>";
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
<h2>我的理财规划书</h2>
<div class="news-list">
    <div class="zichanxianzhuang"><a href="#">6.投资规划</a> </div><!--保险规划-->
    <div class="rangjieyugengduo">好规划建议：您现有可投资资产<?php echo $Loginuser_mon_used ?>元，建议按照20%：45%：35%的比例，分别配置低风险、中等风险和高风险资产，实现约<?php echo $Loginuser_shouyi_rate?>%的预期年化收益率。
 </div><!--建议-->
<div class="duiyutouzi">对于投资，好规划的基本观点是：投资的本质是管理风险，而不是一味追求更高的收益率。唯有在收益和风险之间取得平衡，才是资产长期稳健增值之道。</br>

因此，我们以资产配置作为投资规划的核心思路。正如“不要将所有鸡蛋放在同一个篮子里”，过去数十年的理论和实践证明，资产配置方法通过分散投资，能够有效规避市场风险，创造长期稳健的投资回报。</br>

好规划将主流投资品种分为<strong>低风险、中等风险、高风险</strong>三类；首先是根据您可以承受的风险水平确定配置比例；再结合您的财务现状，对每个大类中具体投资品种的选择给出建议。</br>

<strong>您的可投资资产</strong></br>
您家庭的金融资产总额为<?php echo $Loginuser_monall?>元。在前面的规划中，我们建议您将其中<?php echo $Loginuser_income_all ?>元（活期存款和货币基金）作为紧急备用金来储备，作单独的规划安排。因此：</br>
您当前的可投资资产为 <?php echo $Loginuser_monall?>元-<?php echo $Loginuser_income_all ?>元=<?php echo $Loginuser_mon_used ?>元</br>
<strong>您的资产配置方案</strong></br>
在上一章&ldquo;风险承受能力和偏好&rdquo;中，我们一起得到结论：在投资过程中，您最多可以承受<?php echo $LoginRS_risk_rate?>的风险。在投资规划中，我们将严格控制您的投资风险在<?php echo $LoginRS_risk_rate?>以内，并且在此基础上，应用统计学原理和国际主流的马克维茨资产配置模型，基于过去十年的市场数据为您设计投资方案。</br>
我们按照20%：45%：35%的比例，为您分别配置低风险、中风险和高风险资产。按照过去10年各类资产的平均收益率计算，这一组合的预期年化收益率为<?php echo $Loginuser_shouyi_rate?>%。</br>
如果在10年前以该配置比例投资，实际市场运行（2004-2013）的结果是：获得年化<?php echo $Loginuser_shouyi_10_rate?>%的收益，累计总回报200.32%。这一组合表现出显著的收益率优势，远超绝大多数固定收益理财产品。
</div><!--对于投资-->
<div align="center">
<img src=<?php echo $piefilen?> width="520" height="280" />
</div><!--低风险表格-->
<div class="difengxianneirong">关于各投资品种，我们准备了更多介绍信息，请参见本节附录：《主流投资品种一览》。我们也特别筛选了适合您投资的具体产品，并将提供持续的咨询服务，请参见您在本站的行动计划。</br>
<strong>波动风险：</strong></br>
下图展示了2010年至2014年，好规划推荐方案与激进投资方案（全部配置股票型基金）之间的收益波动对比。不难看出，好规划推荐方案的波动范围明显更小、较好地规避了市场风险。同时，从近四年半的综合收益率来看，好规划推荐方案的表现（15.68%）也显著超过全部配置股票型基金（-5.02%）。</br>
简言之，资产配置令长期投资的收益相对可以预期，不至因为市场难以预料的波动而影响投资的安全性。在震荡的市场或者熊市中，资产配置将帮助你有效规避风险；而当市场转牛，资产配置又可以帮助你获得超额回报。</br>
</div><!--低风险内容--></br>
<div class="zhexiantu">
<img src="image/difengxianbiaoge2.jpg" />
</div><!--折线图-->
<div class="xingdongjihua">行动计划</div><!--行动计划 --> 
<div class="youhuapeizhi"><strong>优化现有资产配置</strong></br>

推荐方案的实现很难一蹴而就，其过程与您的资产现状，以及当下市场条件有关。您可以在未来一年中逐步调整和优化，以达到理想配置。根据上述低、中、高风险资产20%：45%：35%的理想配置，行动计划如下：
</div><!--优化配置-->
<div class="xingdongjiahuabiaoge">
  <table width="704" border="1" align="center">
    <tr>
      <td width="195" align="center" bgcolor="#FF0000"><span>现有资产</span></td>
      <td width="60" align="center" bgcolor="#FF0000"><span>评价</span></td>
      <td width="427" align="center" bgcolor="#FF0000"><span>行动</span></td>
    </tr>
      <tr>
        <td align="left">低风险：
	  <?php
		$Loginuser_low_risk_flag = false;
		$Loginuser_low_risk = 0;
		echo "<br>";
		if ($Loginuser_currmoney != "0") {
			$Loginuser_low_risk_flag = true;
			$Loginuser_low_risk += $Loginuser_currmoney;
			echo "活期存款$Loginuser_currmoney 元<br>";
		}
		if ($Loginuser_fiedmoney != "0") {
			$Loginuser_low_risk_flag = true;
			$Loginuser_low_risk += $Loginuser_fiedmoney;
			echo "定期存款$Loginuser_fiedmoney 元<br>";
		}
		if ($LoginRS_fou_row[1] != "0") {
			$Loginuser_low_risk_flag = true;
			$Loginuser_low_risk += $LoginRS_fou_row[1];
			echo "货币基金/余额宝$LoginRS_fou_row[1] 元<br>";
		}
		if ($LoginRS_final_row[1] != "0") {
			$Loginuser_low_risk_flag = true;
			$Loginuser_low_risk += $LoginRS_final_row[1];
			echo "银行理财产品$LoginRS_final_row[1] 元<br>";
		}
		if ($LoginRS_final_row[3] != "0") {
			$Loginuser_low_risk_flag = true;
			$Loginuser_low_risk += $LoginRS_final_row[3];
			echo "国债$LoginRS_final_row[3] 元<br>";
		}
		if ($LoginRS_final_row[6] != "0") {
			$Loginuser_low_risk_flag = true;
			$Loginuser_low_risk += $LoginRS_final_row[6];
			echo "储蓄型保险$LoginRS_final_row[6] 元<br>";
		}
		if ($Loginuser_low_risk_flag) {
			echo "暂无配置";
		}
	  ?>
	  </td>
        <td align="center" style="color:#F60">
		<?php
		if (($Loginuser_mon_used_20 + 3000)< $Loginuser_low_risk) {
			echo "不足<br>";
		} else if ($Loginuser_mon_used_20 > ($Loginuser_low_risk + 3000)) {
			echo "过高<br>";
		} else {
			echo "合适<br>";
		}
		?>
		</td>
        <td align="center">
		<?php
		if (($Loginuser_mon_used_20 + 3000)< $Loginuser_low_risk) {
			echo "增持：";
			echo $Loginuser_low_risk - $Loginuser_mon_used_20;
			$Loginuser_low_mon = $Loginuser_low_risk - $Loginuser_mon_used_20;
			echo " 元<br>";
		} else if ($Loginuser_mon_used_20 > ($Loginuser_low_risk + 3000)) {
			echo "减持：";
			echo $Loginuser_mon_used_20 - $Loginuser_low_risk;
			$Loginuser_low_mon = $Loginuser_low_risk - $Loginuser_mon_used_20;
			echo " 元<br>";
		} else {
			$Loginuser_low_mon = $Loginuser_low_risk;
			echo "保持：$Loginuser_low_risk 元";
		}
		echo "现金及活期存款$Loginuser_low_risk 元<br>";
		?>
		</td>
      </tr>
      <tr>
        <td align="left">中等风险：
		<?php
		$Loginuser_mid_risk_flag = false;
		$Loginuser_mid_risk = 0;
		echo "<br>";
		if ($LoginRS_fou_row[3] != "0") {
			$Loginuser_mid_risk_flag = true;
			$Loginuser_mid_risk += $LoginRS_fou_row[3];
			echo "债券型基金$LoginRS_fou_row[3] 元<br>";
		}
		if ($LoginRS_final_row[4] != "0") {
			$Loginuser_mid_risk_flag = true;
			$Loginuser_mid_risk += $LoginRS_final_row[4];
			echo "P2P网贷$LoginRS_final_row[4] 元<br>";
		}
		if ($Loginuser_mid_risk_flag) {
			echo "暂无配置";
		}
		?>
		</td>
        <td align="center" style="color:#F60">
		<?php
		if (($Loginuser_mon_used_45 + 3000)< $Loginuser_mid_risk) {
			echo "不足<br>";
		} else if ($Loginuser_mon_used_45 > ($Loginuser_mid_risk + 3000)) {
			echo "过高<br>";
		} else {
			echo "合适<br>";
		}
		?>
		</td>
        <td align="center">
		<?php
		if (($Loginuser_mon_used_45 + 3000)< $Loginuser_mid_risk) {
			echo "增持：";
			echo $Loginuser_mid_risk - $Loginuser_mon_used_45;
			$Loginuser_mid_mon = $Loginuser_mid_risk - $Loginuser_mon_used_45;
			echo " 元<br>";
		} else if ($Loginuser_mon_used_45 > ($Loginuser_mid_risk + 3000)) {
			echo "减持：";
			echo $Loginuser_mon_used_45 - $Loginuser_mid_risk;
			$Loginuser_mid_mon = $Loginuser_mid_risk - $Loginuser_mon_used_45;
			echo " 元<br>";
		} else {
			echo "保持：$Loginuser_mid_risk 元";
			$Loginuser_mid_mon = $Loginuser_mid_risk;
		}
		echo "推荐品种：二级债券型基金、P2P网贷";
		?></td>
      </tr>
      <tr>
        <td align="left">高风险：
		<?php
		$Loginuser_hig_risk_flag = false;
		$Loginuser_hig_risk = 0;
		echo "<br>";
		if ($LoginRS_fou_row[2] != "0") {
			$Loginuser_hig_risk_flag = true;
			$Loginuser_hig_risk += $LoginRS_fou_row[2];
			echo "混合型基金$LoginRS_fou_row[2] 元<br>";
		}
		if ($LoginRS_fou_row[5] != "0") {
			$Loginuser_hig_risk_flag = true;
			$Loginuser_hig_risk += $LoginRS_fou_row[5];
			echo "指数型基金$LoginRS_fou_row[5] 元<br>";
		}
		if ($LoginRS_fou_row[4] != "0") {
			$Loginuser_hig_risk_flag = true;
			$Loginuser_hig_risk += $LoginRS_fou_row[5];
			echo "股票型基金$LoginRS_fou_row[4] 元<br>";
		}
		if ($LoginRS_final_row[5] != "0") {
			$Loginuser_hig_risk_flag = true;
			$Loginuser_hig_risk += $LoginRS_final_row[5];
			echo "贵金属$LoginRS_final_row[5] 元<br>";
		}
		if ($LoginRS_final_row[2] != "0") {
			$Loginuser_hig_risk_flag = true;
			$Loginuser_hig_risk += $LoginRS_final_row[2];
			echo "股票$LoginRS_final_row[2] 元<br>";
		}
		if ($LoginRS_fou_row[6] != "0") {
			$Loginuser_hig_risk_flag = true;
			$Loginuser_hig_risk += $LoginRS_fou_row[6];
			echo "其他基金$LoginRS_fou_row[6] 元<br>";
		}
		if ($LoginRS_final_row[7] != "0") {
			$Loginuser_hig_risk_flag = true;
			$Loginuser_hig_risk += $LoginRS_final_row[7];
			echo "其他金融资产$LoginRS_final_row[7] 元<br>";
		}
		if ($Loginuser_hig_risk_flag) {
			echo "暂无配置";
		}
		?>
		</td>
        <td align="center" style="color:#F60">
		<?php
		if (($Loginuser_mon_used_35 + 3000)< $Loginuser_hig_risk) {
			echo "不足<br>";
		} else if ($Loginuser_mon_used_35 > ($Loginuser_hig_risk + 3000)) {
			echo "过高<br>";
		} else {
			echo "合适<br>";
		}
		?>
		</td>
        <td align="center">
		<?php
		if (($Loginuser_mon_used_35 + 3000) < $Loginuser_hig_risk) {
			echo "增持：";
			echo $Loginuser_hig_risk - $Loginuser_mon_used_35;
			$Loginuser_hig_mon = $Loginuser_hig_risk - $Loginuser_mon_used_35;
			echo" 元<br>";
		} else if ($Loginuser_mon_used_35 > ($Loginuser_hig_risk + 3000)) {
			echo "减持：";
			echo $Loginuser_mon_used_35 - $Loginuser_hig_risk;
			$Loginuser_hig_mon = $Loginuser_hig_risk - $Loginuser_mon_used_35;
			echo " 元<br>";
		} else {
			echo "保持：$Loginuser_hig_risk 元";
			$Loginuser_hig_mon = $Loginuser_hig_risk;
		}
		echo "推荐品种：股票型基金、指数型基金";
		?>
		</td>
      </tr>
  </table>
</div><!--优化配置表格-->
<div class="beizhu">注：低风险部分的“现有资产”中，已刨除用作紧急备用金的资金。</br>
      为执行、计算方便，上表中的金额均四舍五入至百位。</div><!--备注-->
<div class="fuluneirong">
附录：主流投资品种一览 ( 2014年12月7日更新 )</br> 
</div><!--附录内容表格-->
<div class="fulubiaoge">
<img src="image/fulu1.jpg" /></br>
<img src="image/fulu2.jpg" /></br>
<img src="image/fulu3.jpg" /></br>

</div>
    <p>&nbsp;</p>
    <div class="xiayizhangzhichufenxi"><a href="fptagt.php">下一章：实现理财目标</a></div><!--下一章支出分析-->
    <p>&nbsp;</p>
    <p>&nbsp;</p>
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
<?php
		$LoginRS_plan=sprintf("SELECT user_id FROM user_plan_result_t WHERE user_id='%s'",get_magic_quotes_gpc() ? $LoginUserID : addslashes($LoginUserID)); 
		$LoginRS_plan_RS = mysql_query($LoginRS_plan);
		$loginFoundUser_plan = mysql_num_rows($LoginRS_plan_RS);
		if ($loginFoundUser_plan) {
			$Login_Update_plan="update user_plan_result_t set user_use_mon='".$Loginuser_mon_used."', user_income_y='".$Loginuser_shouyi_rate."', user_low_risk='".$Loginuser_low_mon."', user_mid_risk='".$Loginuser_mid_mon."', user_hig_risk='".$Loginuser_hig_mon."' where user_id='".$LoginUserID."'";
			$LoginRS_plan_f = mysql_query($Login_Update_plan);
			if(!$LoginRS_plan_f) {
				echo '<script type="text/javascript">window.alert("数据库更新失败!")</script>';
			}
		} else {
			$Login_plan_fill="INSERT INTO user_plan_result_t (user_id, user_use_mon, user_income_y, user_low_risk, user_mid_risk, user_hig_risk) VALUES ";
			if (!get_magic_quotes_gpc())
			{
				addslashes($LoginUserID);
				addslashes($Loginuser_mon_used);
				addslashes($Loginuser_shouyi_rate);
				addslashes($Loginuser_low_mon);
				addslashes($Loginuser_mid_mon);
				addslashes($Loginuser_hig_mon);
			}
			$Login_plan_fill = $Login_plan_fill."('".$LoginUserID."','".$Loginuser_mon_used."','".$Loginuser_shouyi_rate."','".$Loginuser_low_mon."','".$Loginuser_mid_mon."','".$Loginuser_hig_mon."')";
			$LoginRS_plan_s = mysql_query($Login_plan_fill);
			if(!$LoginRS_plan_s) {
				echo '<script type="text/javascript">window.alert("数据库插入失败!")</script>';
			}
		}
	require_once "dbclose.php";
} else {
	echo '<script type="text/javascript">window.location.href="'.$MM_redirectLoginFailed.'"</script>';
}
?>