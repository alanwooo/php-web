<?php
if (!isset($_SESSION)) {
	session_start();
}
?>
<?php
$MM_redirectLoginFailed="login.php";
if (isset($_SESSION['MM_Username'])) {
	$LoginUserID=$_SESSION['MM_UserID'];

	$piefilen="images/tmp/yuqisouyipid3d".$LoginUserID.".png";
	if(file_exists($piefilen)) {
		unlink($piefilen);
	}

	$is_failed=false;
	$Loginuser_shouyi_rate = "8.92";
	$Loginuser_shouyi_10_rate = "12.03";
	$Loginuser_incres_y = "10";
	require_once "dbaccess.php";

		$LoginRS_incres=sprintf("SELECT user_id FROM user_plan_result_t WHERE user_id='%s'",get_magic_quotes_gpc() ? $LoginUserID : addslashes($LoginUserID)); 
		$LoginRS_incres_RS = mysql_query($LoginRS_incres);
		$loginFoundUser_incres = mysql_num_rows($LoginRS_incres_RS);
		if ($loginFoundUser_incres) {
			$Login_Update_incres="update user_plan_result_t set user_inres_y='".$Loginuser_incres_y."' where user_id='".$LoginUserID."'";
			$LoginRS_r = mysql_query($Login_Update_incres);
			if(!$LoginRS_r) {
				echo '<script type="text/javascript">window.alert("数据库更新失败!")</script>';
			}
		} else {
			$Login_incres_fill="INSERT INTO user_plan_result_t (user_id, user_inres_y) VALUES ";
			if (!get_magic_quotes_gpc())
			{
				addslashes($LoginUserID);
				addslashes($Loginuser_incres_y);
			}
			$Login_incres_fill = $Login_incres_fill."('".$LoginUserID."','".$Loginuser_incres_y."')";
			$LoginRS_e = mysql_query($Login_incres_fill);
			if(!$LoginRS_e) {
				echo '<script type="text/javascript">window.alert("数据库插入失败!")</script>';
			}
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
		} else {
			$is_failed=true;
		}
		
		//读取负债现状的数据表
		$LoginRS_deb=sprintf("SELECT * FROM user_debt_t WHERE user_id ='%s'",get_magic_quotes_gpc() ? $LoginUserID : addslashes($LoginUserID)); 
		$LoginRS_deb_RS = mysql_query($LoginRS_deb);
		if ($LoginRS_deb_RS) {
			$LoginRS_readdeb_row = mysql_fetch_row($LoginRS_deb_RS);
			$Loginuser_currdeb = $LoginRS_readdeb_row[1];
			$Loginuser_fieddeb = $LoginRS_readdeb_row[2];
			$Loginuser_deball = $Loginuser_currdeb + $Loginuser_fieddeb;
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
		
		$LoginRS_balrate=sprintf("SELECT * FROM user_plan_result_t WHERE user_id='%s'",get_magic_quotes_gpc() ? $LoginUserID : addslashes($LoginUserID)); 
		$LoginRS_balrate_RS = mysql_query($LoginRS_balrate);
		if ($LoginRS_balrate_RS) {
			$LoginRS_balrate_row = mysql_fetch_row($LoginRS_balrate_RS);
			$Loginuser_balrate_rate = $LoginRS_balrate_row[1];
			$Loginuser_balrate_mon = $LoginRS_balrate_row[2];
		} else {
			$is_failed=true;
		}

		//读取理财目标的数据表
		$LoginRS_licaitar=sprintf("SELECT  licai_target_id,licai_money,licai_plan FROM user_licai_target_t WHERE user_id ='%s'",get_magic_quotes_gpc() ? $LoginUserID : addslashes($LoginUserID)); 
		$LoginRS_licaitar_RS = mysql_query($LoginRS_licaitar);
		if ($LoginRS_balrate_RS) {
			$login_licaitar_RS = mysql_num_rows($LoginRS_licaitar_RS);
		} else {
			$is_failed=true;
		}

		//可用资产
		if ($is_failed) {
			echo '<script type="text/javascript">window.alert("数据库读取失败!")</script>';
		} else {
			$Loginuser_mon_used = $Loginuser_monall - $Loginuser_income_all;
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
    <div class="zichanxianzhuang"><a href="#">7.实现理财目标</a> </div><!--保险规划-->
    <div class="rangjieyugengduo">开始行动吧
 </div><!--开始行动吧-->
<div class="jingguoqianmian">
经过前面一系列的调整，您的财务状况将进入一个更为健康可持续的发展状态。这是您更快达成理财目标的基础。</br>

理财目标能否按时、全面地实现，主要取决于三个方面：</br>
<strong>起点：</strong></br>
现有可投资资产——前文计算结果为<?php echo $Loginuser_mon_used ?></br> 
<strong>收支：</strong></br>
当前年收入——<?php echo $Loginuser_income_all ?>元；</br>
年收入增长率——按社会平均水平<?php echo $Loginuser_incres_y ?>%计；</br> 
结余率——前文推荐结余率<?php echo $Loginuser_balrate_rate ?>%。</br> 
投资收益：</br>
根据&ldquo;投资规划&rdquo;中的推荐方案，未来投资的整体收益率为<?php echo $Loginuser_shouyi_rate ?>%。</br> 
</div><!--经过前面-->
<?php
if ($login_licaitar_RS) {
echo "据此，我们将为您预估每个目标到期时的达成比例，如下:
<div class=\"noboldtable\">
  <table width=\"660\" height=\"30\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" align=\"center\">
    <tr>
      <td width=\"80\" height=\"28\" align=\"center\"><span>理财目标</span></td>
      <td width=\"90\" align=\"center\"><span>需要资金数目</span></td>
      <td width=\"70\" align=\"center\"><span>计划年限</span></td>
	  <td width=\"90\" align=\"center\"><span>预期达成比例</span></td>
      <td width=\"330\" align=\"center\"><span></span></td>
    </tr>";
	$user_licaitar = array();
	$i=0;
	while(NULL != ($LoginRS_licaitar_row = mysql_fetch_row($LoginRS_licaitar_RS))) {
		if ($LoginRS_licaitar_row[0] == "1") {
			$user_licaitar[0] = "旅游";
		} else if ($LoginRS_licaitar_row[0] == "2") {
			$user_licaitar[0] = "购物";
		} else if ($LoginRS_licaitar_row[0] == "3") {
			$user_licaitar[0] = "继续教育";
		} else if ($LoginRS_licaitar_row[0] == "4") {
			$user_licaitar[0] = "结婚";
		} else if ($LoginRS_licaitar_row[0] == "5") {
			$user_licaitar[0] = "育儿";
		} else if ($LoginRS_licaitar_row[0] == "6") {
			$user_licaitar[0] = "子女教育";
		} else if ($LoginRS_licaitar_row[0] == "7") {
			$user_licaitar[0] = "买车";
		} else if ($LoginRS_licaitar_row[0] == "8") {
			$user_licaitar[0] = "买房首付";
		} else if ($LoginRS_licaitar_row[0] == "9") {
			$user_licaitar[0] = "提前还贷";
		} else if ($LoginRS_licaitar_row[0] == "10") {
			$user_licaitar[0] = "养老金储备";
		} else if ($LoginRS_licaitar_row[0] == "11") {
			$user_licaitar[0] = "其他";
		} else {
			$user_licaitar[0] = "NULL";
		}
		$user_licaitar[1] = $LoginRS_licaitar_row[1];
		$user_licaitar[2] = $LoginRS_licaitar_row[2];
		$tar_persent=round((($Loginuser_balrate_mon * 12 + $Loginuser_currmoney + $Loginuser_fiedmoney - $Loginuser_deball) * 1.1 /($user_licaitar[1]/$user_licaitar[2])) * 100);
		if ($tar_persent <= 10) {
			$tar_persent=10;
		} else if ($tar_persent >= 100) {
			$tar_persent=100;
		}
		if ($Loginuser_balrate_rate <= 0) {
			$tar_text="很遗憾,您月结余率为负数，只有实现了月结余才能更好的实现理财目标。";
		} else {
            if ($tar_persent <= 10 and $Loginuser_balrate_rate <= 10) {
				$tar_text="很遗憾,您月结余率太低，只有提高月结余才能实现理财目标。";
			} else if ($tar_persent >= 10 and $tar_persent <= 80 and $Loginuser_balrate_rate >= 10) {
				$tar_text="提高月结余，并通过兼职等提高收入可以更好的实现理财目标。";
			} else {
				$tar_text="恭喜您，跟据我们给您提供的方案，你可以按时实现理财目标。";
			}
		}
		$tar_persent_res=100 - $tar_persent;
		$tar_persent_wid=round(330 * $tar_persent / 100);
		$tar_persent_res_wid= 330 - $tar_persent_wid;
		echo "<tr><td align=\"center\">$user_licaitar[0]</td>
			<td align=\"center\">$user_licaitar[1]元</td>
			<td align=\"center\">$user_licaitar[2]年</td>
			<td width=\"90\" align=\"center\" style=\"background:red;color:#FFF;\">$tar_persent%</td>
			<td>
			<table width=\"330\" height=\"30\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" align=\"center\">
			<tr>
			<td width=\"$tar_persent_wid\" style=\"background:red;\">&nbsp;</td>
			<td width=\"$tar_persent_res_wid\"></td>
			</tr>
			</table>
			</td></tr><tr height=\"5\"><p></p></tr>";
	}
}
echo "	</tr>
    </table>
  </div>";
echo $tar_text;
?>
<p>&nbsp;</p>
<div class="mubiaoxiafangneirong">
综上，在好规划的建议和您的努力下，您设定的理财目标预计可以顺利达成。</br>
合理规划和有纪律地执行，是理财取得进展的前提。在此基础上，如果实际收支状况有所改变，或者投资市场有重大变化，有必要对理财规划进行调整。此外，在理财过程中试着多记录、思考和总结，一定会更有收获。</br>
</br>
 </br>

以上是“牡丹宝”为您量身定制的理财规划书。</br>

在达成理财目标、创造美好生活的道路上，我们与您一同努力！

</div>
    <p>&nbsp;</p>
    <div class="xiayizhangzhichufenxi"><a href="userfpaction.php">查看理财行动计划</a></div><!--下一章支出分析-->
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
