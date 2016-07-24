<?php
if (!isset($_SESSION)) {
	session_start();
}
?>
<?php
$MM_redirectLoginFailed="login.php";
if (isset($_SESSION['MM_Username'])) {
	$LoginUserID=$_SESSION['MM_UserID'];
	require_once "dbaccess.php";
		$LoginRS_plan=sprintf("SELECT * FROM user_plan_result_t WHERE user_id='%s'",get_magic_quotes_gpc() ? $LoginUserID : addslashes($LoginUserID)); 
		$LoginRS_plan_RS = mysql_query($LoginRS_plan);
		if ($LoginRS_plan_RS) {
			$LoginRS_plan_row = mysql_fetch_row($LoginRS_plan_RS);
		} else {
			$is_failed=true;
		}
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
			$Loginuser_income_yue = $Loginuser_sal + $Loginuser_othsal;
			$Loginuser_income_nian = ($Loginuser_sal + $Loginuser_othsal) * 12 + $Loginuser_bonus + $Loginuser_othbonus;
		} else {
			$is_failed=true;
		}

		//读取资产现状的数据表
		$LoginRS_realass=sprintf("SELECT * FROM user_realasset_t WHERE user_id ='%s'",get_magic_quotes_gpc() ? $LoginUserID : addslashes($LoginUserID)); 
		$LoginRS_realass_RS = mysql_query($LoginRS_realass);
		if ($LoginRS_realass_RS) {
			$LoginRS_readass_row = mysql_fetch_row($LoginRS_realass_RS);
			$Loginuser_house = $LoginRS_readass_row[1];
			$Loginuser_car = $LoginRS_readass_row[2];
			$Loginuser_collection = $LoginRS_readass_row[3];
			$Loginuser_other = $LoginRS_readass_row[4];
			$Loginuser_all = $Loginuser_house + $Loginuser_car + $Loginuser_collection + $Loginuser_other;
		} else {
			$is_failed=true;
		}
		//读取存款现状的数据表
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
		
		//读取负债率的数据表
		$LoginRS_debt=sprintf("SELECT user_debt_rate,user_mon_rate_inpep FROM user_plan_result_t WHERE user_id ='%s'",get_magic_quotes_gpc() ? $LoginUserID : addslashes($LoginUserID)); 
		$LoginRS_debt_RS = mysql_query($LoginRS_debt);
		if ($LoginRS_debt_RS) {
			$LoginRS_readebt_row = mysql_fetch_row($LoginRS_debt_RS);
			$LoginRS_debt_rate = $LoginRS_readebt_row[0];
			$LoginRS_mom_rate_inpep = $LoginRS_readebt_row[1];
		} else {
			$is_failed=true;
		}

		if ( $LoginRS_plan_row[1] >= 60) {
			$LoginRS_res_rate_ans = "您家庭的月结余率健康，";
			$LoginRS_res_text = "将月结余率维持在".$LoginRS_plan_row[1]."%（".$LoginRS_plan_row[2]."元）。";
			$LoginRS_res_last_text = "以".$LoginRS_plan_row[1]."%的结余率";
		} else if ( 60 > $LoginRS_plan_row[1] and $LoginRS_plan_row[1] >= 10) {
			$LoginRS_res_rate_ans = "您家庭的月结余率一般，建议";
			$Loginuser_income_all_half = $Loginuser_income_all * 0.5;
			$LoginRS_res_text = "将月结余率提高到50%（".$Loginuser_income_all_half."元）。";
			$LoginRS_res_last_text = "以提高到".$LoginRS_plan_row[1]."%的结余率";
		} else {
			$LoginRS_res_rate_ans = "您家庭的月结余率(".$LoginRS_plan_row[1]."%)糟糕，建议必须提高结余率到50%，来抵抗风险";
			$LoginRS_res_text = "您的月结余率太低到50%，请立即提高结余率，以增加财富积累。";
			$LoginRS_res_last_text = "以提高到建议50%的结余率";
		}
	require_once "dbclose.php";
} else {
	echo '<script type="text/javascript">window.location.href="'.$MM_redirectLoginFailed.'"</script>';
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
        <li><a href="#">首页</a></li>
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
<h2>我的行动规划</h2>
<div class="news-list">
    <div class="zichanxianzhuang"><a href="fpasset.php">1.资产现状</a> </div><!--资产现状-->
    <div class="zichanxianzhuangfenxi">您的财富<?php
		  if ($LoginRS_mom_rate_inpep >= 60) {
			echo "高于大多数人,";
		  } else if ($LoginRS_mom_rate_inpep < 60 and $LoginRS_mom_rate_inpep >= 30) {
		  	echo "处于平均水平,";
		  } else {
			echo "低于大多数人,";
		  }
		  echo "结合资产负债率来看,";
		  if ($LoginRS_debt_rate >= 60) {
			echo "财务风险较高。";
		  } else if ($LoginRS_debt_rate < 60 and $LoginRS_debt_rate >= 30) {
		  	echo "财务风险良好。";
		  } else {
			echo "财务风险偏低。";
		  }
	?>
	</div>
    <div class="zichanxianzhuangfuhaoli">
    <ul>
    <li>&gt;&gt;<?php
		  if ($LoginRS_debt_rate >= 60) {
			echo "您的资产负债率是$LoginRS_debt_rate%,请将负债率降低至60%以下。";
		  } else if ($LoginRS_debt_rate < 60 and $LoginRS_debt_rate >= 30) {
		  	echo "您的资产负债率是$LoginRS_debt_rate%,负债率良好。";
		  } else {
			echo "您的资产负债率是$LoginRS_debt_rate%,负债率非常健康。";
		  }
		  ?></li>
    </ul>
    </div><!--资产现状li-->
    </div><!--news-list-->
<div class="shouzhifenxibox">
<div class="shouzhifenxi"><a href="fpinexay.php">2.收支分析</a></div><!--收支分析-->
<div class="yuejieyulv"><?php echo $LoginRS_res_rate_ans?><?php echo $LoginRS_res_text?></div>
<div class="yangchengjizhangxiguan">
<ul>
<li>&gt;&gt;养成记账习惯，明确了解收支状况，以便分析和改进。</li>
<li>&gt;&gt;在月初制定预算，在月末分析实际支出并对照改进</li>
<li>&gt;&gt;<?php echo $LoginRS_res_text?></li>
</ul>
</div><!--yangchengjizhangxiguan-->
</div><!--shouzhifenxibox-->
<div class="chubeibox">
<div class="chubeijinjibeiyongjin"><a href="fprsvefund.php">3.储备紧急备用金</a></div>
<div class="qingyihuoqicunkuan">请以活期存款和货币基金形式，储备<?php echo $LoginRS_plan_row[3]?>元紧急备用金，以防不时之需。</div><!--qingyihuoqicunkuan-->
<div class="chubeili">
<ul>
<li>&gt;&gt;<?php
		  if ($LoginRS_plan_row[4] > 0) {
			echo "增持现金及活期存款";
			echo $LoginRS_plan_row[4];
			echo "元";
		  } else if ($LoginRS_plan_row[4] == 0) {
		  	echo "保持现金及活期存款规模不变";
		  } else {
		  	echo "减持现金及活期存款";
			echo 0 - $LoginRS_plan_row[4];
			echo "元";
		  }
		  ?></li>
<li>&gt;&gt;<?php
		  if ($LoginRS_plan_row[5] > 0) {
			echo "增持货币基金";
			echo $LoginRS_plan_row[5];
			echo "元";
		  } else if ($LoginRS_plan_row[5] == 0) {
		  	echo "保持货币基金规模不变";
		  } else {
		  	echo "减货币基金";
			echo 0 - $LoginRS_plan_row[5];
			echo "元";
		  }
		  ?></li>
</ul>
</div><!--储备紧急备用金-->
</div><!--chubeili-->
<div class="baoxianguihuabox">
<div class="baoxianguihua"><a href="fpinsplan.php">4.保险规划</a></div>
<div class="jianlibiyaojijin">建立必要且基本的保障，补充综合意外险和重疾险</div><!--jianlibiyaojijin-->
<div class="baoxianguihuali">
<ul>
<li>&gt;&gt;为本人购买综合意外险，保额210万元，保费约为1,680元/年</li>
<li>&gt;&gt;为本人购买重疾险，保额13万元，保费约为1,030元/年 </li>
</ul>
</div><!--4.保险规划->-->
</div><!--baoxianguihuali-->
<div class="fengxianbox">
<div class="fengxianchengshounengli"><a href="fpriske.php">5.风险承受能力及偏好</a></div><!--fengxianchengshounengli-->
<div class="nidefengxianchengshounengli">您的风险承受能力<?php
	  if ($LoginRS_plan_row[6] <= -15) {
		echo "较强，风险偏好属进取型";
	  } else if ($LoginRS_plan_row[6] == -10) {
		echo "中等，风险偏好属平衡型";
	  } else if ($LoginRS_plan_row[6] == -5) {
		echo "适中，风险偏好属稳健型";
	  } else {
		echo "较低，风险偏好属保守型";
	  }
	?>，请将投资风险控制在<?php echo $LoginRS_plan_row[6]?>%以内。</div><!--你的风险承受能力-->
</div><!--风险BOX-->
<div class="touziguihuaBOX">
<div class="touziguihua"><a href="fpinvestplan.php">6.投资规划</a></div><!--投资规划-->
<div class="nixianyou">您现有可投资资产<?php echo $LoginRS_plan_row[7]?>元，建议按照20%：45%：35%的比例，分别配置低风险、中等风险和高风险资产，实现约<?php echo $LoginRS_plan_row[8]?>%的预期年化收益率。
<ul>
<li>&gt;&gt;<?php
		  if ($LoginRS_plan_row[9] > 0) {
			echo "低风险资产： 增持现金及活期存款";
			echo $LoginRS_plan_row[9];
			echo "元";
		  } else if ($LoginRS_plan_row[9] == 0) {
		  	echo "低风险资产：保持现金及活期存款规模不变（";
			echo $LoginRS_plan_row[9];
			echo "元）";
		  } else {
		  	echo "低风险资产：减持现金及活期存款";
			echo 0 - $LoginRS_plan_row[9];
			echo "元";
		  }
		  ?></li>
<li>&gt;&gt;<?php
		  if ($LoginRS_plan_row[10] > 0) {
			echo "中风险资产：增持二级债券型基金、P2P网贷等共";
			echo $LoginRS_plan_row[10];
			echo "元";
		  } else if ($LoginRS_plan_row[10] == 0) {
		  	echo "中风险资产：增持二级债券型基金、P2P网贷等规模不变（";
			echo $LoginRS_plan_row[10];
			echo "元）";
		  } else {
		  	echo "中风险资产：减持二级债券型基金、P2P网贷等共";
			echo 0 - $LoginRS_plan_row[10];
			echo "元";
		  }
		  ?></li>
<li>&gt;&gt;<?php
		  if ($LoginRS_plan_row[11] > 0) {
			echo "高风险资产：增持股票型基金、指数型基金等共";
			echo $LoginRS_plan_row[11];
			echo "元";
		  } else if ($LoginRS_plan_row[11] == 0) {
		  	echo "高风险资产：保持股票型基金、指数型基金等规模不变（";
			echo $LoginRS_plan_row[11];
			echo "元）";
		  } else {
		  	echo "高风险资产：减持股票型基金、指数型基金等共";
			echo 0 - $LoginRS_plan_row[11];
			echo "元";
		  }
		  ?></li>
</ul>
</div><!--你现有资产-->
</div><!--投资规划BOX-->
<div class="shixianlicaimubiaoBOX">
<div class="shixianlicaimubiao"><a href="fptagt.php">7.实现理财目标</a></div><!--实现理财目标-->
<div class="yi88%"><?php echo $LoginRS_res_last_text?>、<?php echo $LoginRS_plan_row[12]?>%的年收入增长率、<?php echo $LoginRS_plan_row[8]?>%的投资收益率，逐渐达成理财目标。</div>
</div><!--实现理财目标BOX-->

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
