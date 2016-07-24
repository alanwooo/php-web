<?php
if (!isset($_SESSION)) {
	session_start();
}
?>
<?php
$MM_redirectLoginFailed="login.php";
if (isset($_SESSION['MM_Username'])) {
	$LoginUserID=$_SESSION['MM_UserID'];
	$is_failed=false;
	require_once "dbaccess.php";
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
		
		$LoginRS_debt=sprintf("SELECT * FROM user_debt_t WHERE user_id ='%s'",get_magic_quotes_gpc() ? $LoginUserID : addslashes($LoginUserID)); 
		$LoginRS_debt_RS = mysql_query($LoginRS_debt);
		if ($LoginRS_debt_RS) {
			$LoginRS_readebt_row = mysql_fetch_row($LoginRS_debt_RS);
			$Loginuser_money = $LoginRS_readebt_row[1];
			$Loginuser_credit = $LoginRS_readebt_row[2];
			$Loginuser_debtall = $Loginuser_money + $Loginuser_credit;
		} else {
			$is_failed=true;
		}
		
		if ($is_failed) {
			echo '<script type="text/javascript">window.alert("数据库读取失败!")</script>';
		} else {
			$Loginuser_all_the_mon = $Loginuser_all + $Loginuser_monall;
			$Loginuser_rese_the_mon = $Loginuser_all_the_mon - $Loginuser_debtall;
			if ($Loginuser_all_the_mon == 0) {
				$Loginuser_debt_rate = 0;
			} else {
				$Loginuser_debt_rate = sprintf("%.2f", $Loginuser_debtall/$Loginuser_all_the_mon);
			}
			$Loginuser_mon_rese = 100046301 - $Loginuser_rese_the_mon;
			//计算财富高于多少家庭
			if ($Loginuser_rese_the_mon >= 100046300) {
				$Loginuser_log_rate = 99;
			} else if (100046301 > $Loginuser_rese_the_mon and $Loginuser_rese_the_mon >= 2514400) {
				$Loginuser_tmp_rate = log($Loginuser_rese_the_mon)/log(1.20228);
				$Loginuser_log_rate = sprintf("%.2f", $Loginuser_tmp_rate);
			} else if (10000 < $Loginuser_rese_the_mon and $Loginuser_rese_the_mon < 2514400) {
				$Loginuser_tmpp_rate = 80 - sqrt( ( 2514400 - $Loginuser_rese_the_mon ) / 392.8 );
				$Loginuser_log_rate = sprintf("%.2f", $Loginuser_tmpp_rate);
			} else {
				$Loginuser_log_rate = floor(0.0015 * $Loginuser_rese_the_mon);
			}
		}
		
		//更新负债率和财富在人群中百分比的数据表
				//读取问题答案
		if ($is_failed) {
			echo '<script type="text/javascript">window.alert("数据库读取失败!")</script>';
		} else {
			$LoginRS_debtrate=sprintf("SELECT user_id FROM user_plan_result_t WHERE user_id='%s'",get_magic_quotes_gpc() ? $LoginUserID : addslashes($LoginUserID)); 
			$LoginRS_debtrate_RS = mysql_query($LoginRS_debtrate);
			$loginFoundUser_debtrate = mysql_num_rows($LoginRS_debtrate_RS);
			if ($loginFoundUser_debtrate) {
				$Login_Update_debtrate="update user_plan_result_t set user_debt_rate='".$Loginuser_debt_rate."', user_mon_rate_inpep='".$Loginuser_log_rate."' where user_id='".$LoginUserID."'";
				$LoginRS = mysql_query($Login_Update_debtrate);
				if(!$LoginRS) {
					echo '<script type="text/javascript">window.alert("数据库更新失败!")</script>';
				}
			} else {
				$Login_debtrate_fill="INSERT INTO user_plan_result_t (user_id, user_debt_rate, user_mon_rate_inpep) VALUES ";
				if (!get_magic_quotes_gpc())
				{
					addslashes($LoginUserID);
					addslashes($Loginuser_debt_rate);
					addslashes($Loginuser_log_rate);
				}
				$Login_debtrate_fill = $Login_debtrate_fill."('".$LoginUserID."','".$Loginuser_debt_rate."','".$Loginuser_log_rate."')";
				$LoginRS = mysql_query($Login_debtrate_fill);
				if(!$LoginRS) {
					echo '<script type="text/javascript">window.alert("数据库插入失败!")</script>';
				}
			}
		}
		
		//读取问题答案
		if ($is_failed) {
			echo '<script type="text/javascript">window.alert("数据库读取失败!")</script>';
		} else {
			if ($Loginuser_log_rate == 0) {
				$Loginuser_que_one = 1;
			} else if (80 > $Loginuser_log_rate and $Loginuser_log_rate >= 40){
				$Loginuser_que_one = 2;
			} else {
				$Loginuser_que_one = 3;
			}
			if ($Loginuser_all_the_mon == 0) {
				$Loginuser_debt_hou_rate = 0;
			} else {
				$Loginuser_debt_hou_rate = sprintf("%.2f", $Loginuser_money/$Loginuser_all_the_mon);
			}
			if ($Loginuser_debt_rate == 0) {
				$Loginuser_que_two = 1;
			} else if ( $Loginuser_debt_hou_rate >= 0.6){
				$Loginuser_que_two = 2;
			} else {
				$Loginuser_que_two = 3;
			}
		}
		$LoginRS_question_one=sprintf("SELECT * FROM user_plan_t WHERE page_id=1 and question_id=1 and index_id='%s'",get_magic_quotes_gpc() ? $Loginuser_que_one : addslashes($Loginuser_que_one)); 
		$LoginRS_qus_one_RS = mysql_query($LoginRS_question_one);
		if ($LoginRS_qus_one_RS) {
			$LoginRS_qus_one_row = mysql_fetch_row($LoginRS_qus_one_RS);
			$LoginRS_qus_one_ans = $LoginRS_qus_one_row[3];
		} else {
			echo '<script type="text/javascript">window.alert("数据库更新失败!")</script>';
		}

		$LoginRS_question_two=sprintf("SELECT * FROM user_plan_t WHERE page_id=1 and question_id=2 and index_id='%s'",get_magic_quotes_gpc() ? $Loginuser_que_one : addslashes($Loginuser_que_one)); 
		$LoginRS_qus_two_RS = mysql_query($LoginRS_question_two);
		if ($LoginRS_qus_two_RS) {
			$LoginRS_qus_two_row = mysql_fetch_row($LoginRS_qus_two_RS);
			$LoginRS_qus_two_ans = $LoginRS_qus_two_row[3];
		} else {
			echo '<script type="text/javascript">window.alert("数据库更新失败!")</script>';
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
    <div class="zichanxianzhuang"><a href="#">1.资产现状</a> </div><!--资产现状-->
    <div class="pandiannidejiating">盘点您家庭现有的资产和负债，是进行理财规划的第一步</div><!--盘点你的家庭-->
    <div class="zichanzongjibiao">
      <table width="623" border="0" align="center">
        <tr>
          <td colspan="4" align="center" valign="middle" bgcolor="#FF0000" class="zichanxianzhuang"><span>资产现状:</span></td>
          </tr>
        <tr>
          <td width="142" rowspan="4" align="center">实物资产</td>
          <td width="142" align="center">房产</td>
          <td width="142"><?php echo $Loginuser_house?>&nbsp;元</td>
          <td width="177" rowspan="4"><?php echo $Loginuser_all?>&nbsp;元</td>
      </tr>
      <tr>
        <td align="center">汽车</td>
        <td><?php echo $Loginuser_car?>&nbsp;元</td>
      </tr>
      <tr>
        <td align="center">收藏品</td>
        <td><?php echo $Loginuser_collection?>&nbsp;元</td>
      </tr>
      <tr>
        <td align="center">其他</td>
        <td><?php echo $Loginuser_other?>&nbsp;元</td>
      </tr>
      <tr>
        <td rowspan="15" align="center">金融资产</td>
        <td align="center">现金及活期存款</td>
        <td><?php echo $Loginuser_currmoney?>&nbsp;元</td>
        <td rowspan="15"><?php echo $Loginuser_monall?>&nbsp;元</td>
      </tr>
      <tr>
        <td align="center">定期存款</td>
        <td><?php echo $Loginuser_fiedmoney?>&nbsp;元</td>
      </tr> 
	  <?php
		//基金资产
		if ($LoginRS_fou_row[1] != "0") {
			echo "<tr><td align=\"center\">货币基金/余额宝</td><td>$LoginRS_fou_row[1]&nbsp;元</td></tr>";
		}
		if ($LoginRS_fou_row[2] != "0") {
			echo "<tr><td align=\"center\">混合型基金</td><td>$LoginRS_fou_row[2]&nbsp;元</td></tr>";
		}
		if ($LoginRS_fou_row[3] != "0") {
			echo "<tr><td align=\"center\">债券型基金</td><td>$LoginRS_fou_row[3]&nbsp;元</td></tr>";
		}
		if ($LoginRS_fou_row[4] != "0") {
			echo "<tr><td align=\"center\">股票型基金</td><td>$LoginRS_fou_row[4]&nbsp;元</td></tr>";
		}
		if ($LoginRS_fou_row[5] != "0") {
			echo "<tr><td align=\"center\">指数型基金</td><td>$LoginRS_fou_row[5]&nbsp;元</td></tr>";
		}
		if ($LoginRS_fou_row[6] != "0") {
			echo "<tr><td align=\"center\">其他基金</td><td>$LoginRS_fou_row[6]&nbsp;元</td></tr>";
		}
		//金融资产
		if ($LoginRS_final_row[1] != "0") {
			echo "<tr><td align=\"center\">银行理财产品</td><td>$LoginRS_final_row[1]&nbsp;元</td></tr>";
		}
		if ($LoginRS_final_row[2] != "0") {
			echo "<tr><td align=\"center\">股票</td><td>$LoginRS_final_row[2]&nbsp;元</td></tr>";
		}
		if ($LoginRS_final_row[3] != "0") {
			echo "<tr><td align=\"center\">国债</td><td>$LoginRS_final_row[3]&nbsp;元</td></tr>";
		}
		if ($LoginRS_final_row[4] != "0") {
			echo "<tr><td align=\"center\">P2P网贷</td><td>$LoginRS_final_row[4]&nbsp;元</td></tr>";
		}
		if ($LoginRS_final_row[5] != "0") {
			echo "<tr><td align=\"center\">贵金属</td><td>$LoginRS_final_row[5]&nbsp;元</td></tr>";
		}
		if ($LoginRS_final_row[6] != "0") {
			echo "<tr><td align=\"center\">储蓄型保险</td><td>$LoginRS_final_row[6]&nbsp;元</td></tr>";
		}		
		if ($LoginRS_final_row[7] != "0") {
			echo "<tr><td align=\"center\">其他</td><td>$LoginRS_final_row[7]&nbsp;元</td></tr>";
		}
	  ?>

      </table>
    </div><!--资产总计表格-->
    <div class="fuzhaizongjibiao">&nbsp;&nbsp;
      <table width="621" border="1" align="center">
        <tr>
          <td height="37" colspan="4" align="center" bgcolor="#A01818"><span>负债总计:</span></td>
          </tr>
      <tr>
        <td width="142" rowspan="2" align="center">负债</td>
        <td width="142" align="center">未还房贷</td>
        <td width="142"><?php echo $Loginuser_money ?>&nbsp;元</td>
        <td width="142" rowspan="2"><?php echo $Loginuser_debtall ?>&nbsp;元</td>
      </tr>
      <tr>
        <td align="center">信用卡债/消费贷款</td>
        <td><?php echo $Loginuser_credit ?>&nbsp;元</td>
      </tr>
      </table>
    </div><!--负债总计表-->
    <div class="nidegerencaifuneirong">
    一、<strong>您的家庭财富（净资产）= <?php echo $Loginuser_rese_the_mon?>元，高于<?php echo $Loginuser_log_rate?>%的家庭。</strong></br>
净资产 = 资产总计<?php echo $Loginuser_all_the_mon?>元 - 负债总计<?php echo $Loginuser_debtall ?>元 = <?php echo $Loginuser_rese_the_mon?>元</br>
<?php echo $LoginRS_qus_one_ans ?></br> 

二、<strong>您家庭的资产负债率 = <?php echo $Loginuser_debt_rate ?>%，财务风险较低。</strong></br>
资产负债率 = 负债总计<?php echo $Loginuser_debtall ?>元 / 资产总计<?php echo $Loginuser_all_the_mon?>元 = <?php echo $Loginuser_debt_rate ?>%</br>
<?php echo $LoginRS_qus_two_ans ?></br> 
    </div><!--你的个人财富-->
     </div><!--资产现状li-->
    <div class="xiayizhangzhichufenxi"><a href="fpinexay.php">下一章：支出分析</a></div><!--下一章支出分析-->
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    </div><!--news-list-->
</div><!--list-box结束-->
</div><!--list-main结束-->

</div><!--warp结束-->
<div class="footer">
<div class="footer-1">
<ul>
  <li><a href="#">关于我们</a></li>
  <li><a href="#">联系我们</a></li>
  <li><a href="#">加入我们</a></li>
  <li><a href="#">意见反馈</a></li>
</ul>
</div><!--footer-1结束-->
</div><!--footer结束-->
</body>
</html>
