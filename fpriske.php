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
		$LoginRS_risk_ins=sprintf("SELECT * FROM user_licai_risk_t WHERE user_id='%s'",get_magic_quotes_gpc() ? $LoginUserID : addslashes($LoginUserID)); 
		$LoginRS_risk_RS = mysql_query($LoginRS_risk_ins);
		if ($LoginRS_risk_RS) {
			$LoginRS_risk_row = mysql_fetch_row($LoginRS_risk_RS);
			$LoginRS_risk_value = $LoginRS_risk_row[1] + $LoginRS_risk_row[2] + $LoginRS_risk_row[3] + $LoginRS_risk_row[4];	
		} else {
			$is_failed=true;
		}

		if ($is_failed) {
			echo '<script type="text/javascript">window.alert("数据库读取失败!")</script>';
		} else {

		}
		
		if ($LoginRS_risk_value >= 13) {
			$LoginRS_risk_ab_ready = -15;
		  } else if (13 > $LoginRS_risk_value and $LoginRS_risk_value >= 10) {
			$LoginRS_risk_ab_ready = -10;
		  } else if (10 > $LoginRS_risk_value and $LoginRS_risk_value >= 7) {
			$LoginRS_risk_ab_ready = -5;
		  } else {
			$LoginRS_risk_ab_ready = 0;
		  }
		
		$LoginRS_risk_lk=sprintf("SELECT user_id FROM user_plan_result_t WHERE user_id='%s'",get_magic_quotes_gpc() ? $LoginUserID : addslashes($LoginUserID)); 
		$LoginRS_risk_lk_RS = mysql_query($LoginRS_risk_lk);
		$loginFoundUser_risk_lk = mysql_num_rows($LoginRS_risk_lk_RS);
		if ($loginFoundUser_risk_lk) {
			$Login_Update_risk_lk="update user_plan_result_t set user_risk_ab='".$LoginRS_risk_ab_ready."' where user_id='".$LoginUserID."'";
			$LoginRS = mysql_query($Login_Update_risk_lk);
			if(!$LoginRS) {
				echo '<script type="text/javascript">window.alert("数据库更新失败!")</script>';
			}
		} else {
			$Login_risk_lk_fill="INSERT INTO user_plan_result_t (user_id, user_risk_ab) VALUES ";
			if (!get_magic_quotes_gpc())
			{
				addslashes($LoginUserID);
				addslashes($LoginRS_risk_ab_ready);
			}
			$Login_risk_lk_fill = $Login_risk_lk_fill."('".$LoginUserID."','".$LoginRS_risk_ab_ready."')";
			$LoginRS = mysql_query($Login_risk_lk_fill);
			if(!$LoginRS) {
				echo '<script type="text/javascript">window.alert("数据库插入失败!")</script>';
			}
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
    <div class="zichanxianzhuang"><a href="#">5.风险承受能力与偏好</a> </div><!--风险承受能力与偏好-->
    <div class="rangjieyugengduo">好规划建议：您的风险承受能力较强，风险偏好属于平衡型，请将投资风险控制在<?php
	  if ($LoginRS_risk_value >= 13) {
		echo "-20%";
	  } else if (13 > $LoginRS_risk_value and $LoginRS_risk_value >= 10) {
		echo "-15%";
	  } else if (10 > $LoginRS_risk_value and $LoginRS_risk_value >= 7) {
		echo "-10%";
	  } else {
		echo "-5%";
	  }
	?>以内。
 </div><!--了解适合自己的风险水平-->
  <div class="zaitouzizhong">在投资中，任何收益总是伴随相应的风险，收益越高风险越大。理财规划的一个重要目标就是把投资风险控制在合理水平——既处于风险承受能力范围之内，也符合您的风险偏好。</div><!--在投资中-->
  <div class="centerstyle">
    <p class="fenxianpianhao">您的风险承受能力</p>
  </div>
  <div class="fengxianshanxing1">
  <div>
    <p>&nbsp;</p>
  </div>
  <div align="center">
    <td height="100" ><table height="50" border="0" cellpadding="0" cellspacing="0" style="text-align:center">
      <?php
	  echo "<tr><td align=\"center\" class=\"chubeibeiyongzijin\">很弱</td>";
	  if ($LoginRS_risk_value >= 13) {
		echo "<td align=\"center\" class=\"chubeibeiyongzijin\">较弱</td>
			<td align=\"center\" class=\"chubeibeiyongzijin\">中等</td>
			<td align=\"center\" class=\"chubeibeiyongzijin\">较强</td>
			<td align=\"center\" class=\"chubeibeiyongzijin\" style=\"background:red\"><span>很强</span></td></tr>
			<tr>
			<td align=\"center\" class=\"chubeibeiyongzijin\">0%</td>
			<td align=\"center\" class=\"chubeibeiyongzijin\">-5%</td>
			<td align=\"center\" class=\"chubeibeiyongzijin\">-10%</td>
			<td align=\"center\" class=\"chubeibeiyongzijin\">-15%</td>
			<td align=\"center\" class=\"chubeibeiyongzijin\" style=\"background:red\"><span>-20%</span></td>
			</tr>";
	  } else if (13 > $LoginRS_risk_value and $LoginRS_risk_value >= 10) {
		echo "<td align=\"center\" class=\"chubeibeiyongzijin\">较弱</td>
			<td align=\"center\" class=\"chubeibeiyongzijin\">中等</td>
			<td align=\"center\" class=\"chubeibeiyongzijin\" style=\"background:red\"><span>较强</span></td>
			<td align=\"center\" class=\"chubeibeiyongzijin\">很强</td></tr>
			<tr>
			<td align=\"center\" class=\"chubeibeiyongzijin\">0%</td>
			<td align=\"center\" class=\"chubeibeiyongzijin\">-5%</td>
			<td align=\"center\" class=\"chubeibeiyongzijin\">-10%</td>
			<td align=\"center\" class=\"chubeibeiyongzijin\" style=\"background:red\"><span>-15%</span></td>
			<td align=\"center\" class=\"chubeibeiyongzijin\">-20%</td>
			</tr>";
	  } else if (10 > $LoginRS_risk_value and $LoginRS_risk_value >= 7) {
		echo "<td align=\"center\" class=\"chubeibeiyongzijin\">较弱</td>
			<td align=\"center\" class=\"chubeibeiyongzijin\" style=\"background:red\"><span>中等</span></td>
			<td align=\"center\" class=\"chubeibeiyongzijin\">较强</td>
			<td align=\"center\" class=\"chubeibeiyongzijin\">很强</td></tr>
			<tr>
			<td align=\"center\" class=\"chubeibeiyongzijin\">0%</td>
			<td align=\"center\" class=\"chubeibeiyongzijin\">-5%</td>
			<td align=\"center\" class=\"chubeibeiyongzijin\" style=\"background:red\"><span>-10%</span></td>
			<td align=\"center\" class=\"chubeibeiyongzijin\">-15%</td>
			<td align=\"center\" class=\"chubeibeiyongzijin\">-20%</td>
			</tr>";
	  } else {
		echo "<td align=\"center\" class=\"chubeibeiyongzijin\" style=\"background:red\"><span>较弱</span></td>
			<td align=\"center\" class=\"chubeibeiyongzijin\">中等</td>
			<td align=\"center\" class=\"chubeibeiyongzijin\">较强</td>
			<td align=\"center\" class=\"chubeibeiyongzijin\">很强</td></tr>
			<tr>
			<td align=\"center\" class=\"chubeibeiyongzijin\">0%</td>
			<td align=\"center\" class=\"chubeibeiyongzijin\" style=\"background:red\"><span>-5%</span></td>
			<td align=\"center\" class=\"chubeibeiyongzijin\">-10%</td>
			<td align=\"center\" class=\"chubeibeiyongzijin\">-15%</td>
			<td align=\"center\" class=\"chubeibeiyongzijin\">-20%</td>
			</tr>";
	  }
	?>
    </table></td>
  </div>
  </div><!--风险扇形图--></br></br>
  <div>
    <p class="centermidstyle">* 牡丹宝规划采用 12 项指标做风险承受能力评估：</p>
    <p class="centermidstyle">年龄、职业、家庭、收入、结余、保障、金融资产、固定资产、房产、负债、投资经验、投资期限。</p>
  </div>
  </br></br>
  <div class="centerstyle">
    <p class="fenxianpianhao">您的风险偏好</p>
  </div>
  <div class="fengxianshanxing2">
 <div>
    <p>&nbsp;</p>
  </div>
  <div align="center">
	<td height="100" align="center"><table height="50" border="0" cellpadding="0" cellspacing="0" style="text-align:center">
	<?php
	  if ($LoginRS_risk_value >= 13) {
		echo "<tr><td align=\"center\" class=\"chubeibeiyongzijin\">保守型</td>
			<td align=\"center\" class=\"chubeibeiyongzijin\">稳健型</td>
			<td align=\"center\" class=\"chubeibeiyongzijin\">平衡型</td>
			<td align=\"center\" class=\"chubeibeiyongzijin\" style=\"background:red\"><span>进取型</span></td>
			<td align=\"center\" class=\"chubeibeiyongzijin\">激进型</td></tr>
			<tr>
			<td align=\"center\" class=\"chubeibeiyongzijin\">0%</td>
			<td align=\"center\" class=\"chubeibeiyongzijin\">-5%</td>
			<td align=\"center\" class=\"chubeibeiyongzijin\">-10%</td>
			<td align=\"center\" class=\"chubeibeiyongzijin\" style=\"background:red\"><span>-15%</span></td>
			<td align=\"center\" class=\"chubeibeiyongzijin\">-20%</td>
			</tr>";
	  } else if (13 > $LoginRS_risk_value and $LoginRS_risk_value >= 10) {
		echo "<tr><td align=\"center\" class=\"chubeibeiyongzijin\">保守型</td>
			<td align=\"center\" class=\"chubeibeiyongzijin\">稳健型</td>
			<td align=\"center\" class=\"chubeibeiyongzijin\" style=\"background:red\"><span>平衡型</span></td>
			<td align=\"center\" class=\"chubeibeiyongzijin\">进取型</td>
			<td align=\"center\" class=\"chubeibeiyongzijin\">激进型</td></tr>
			<tr>
			<td align=\"center\" class=\"chubeibeiyongzijin\">0%</td>
			<td align=\"center\" class=\"chubeibeiyongzijin\">-5%</td>
			<td align=\"center\" class=\"chubeibeiyongzijin\" style=\"background:red\"><span>-10%</span></td>
			<td align=\"center\" class=\"chubeibeiyongzijin\">-15%</td>
			<td align=\"center\" class=\"chubeibeiyongzijin\">-20%</td>
			</tr>";
	  } else if (10 > $LoginRS_risk_value and $LoginRS_risk_value >= 7) {
		echo "<tr><td align=\"center\" class=\"chubeibeiyongzijin\">保守型</td>
			<td align=\"center\" class=\"chubeibeiyongzijin\" style=\"background:red\"><span>稳健型</span></td>
			<td align=\"center\" class=\"chubeibeiyongzijin\">平衡型</td>
			<td align=\"center\" class=\"chubeibeiyongzijin\">进取型</td>
			<td align=\"center\" class=\"chubeibeiyongzijin\">激进型</td></tr>
			<tr>
			<td align=\"center\" class=\"chubeibeiyongzijin\">0%</td>
			<td align=\"center\" class=\"chubeibeiyongzijin\" style=\"background:red\"><span>-5%</span></td>
			<td align=\"center\" class=\"chubeibeiyongzijin\">-10%</td>
			<td align=\"center\" class=\"chubeibeiyongzijin\">-15%</td>
			<td align=\"center\" class=\"chubeibeiyongzijin\">-20%</td>
			</tr>";
	  } else {
		echo "<tr>
		    <td align=\"center\" class=\"chubeibeiyongzijin\" style=\"background:red\"><span>保守型</span></td>
			<td align=\"center\" class=\"chubeibeiyongzijin\">稳健型</td>
			<td align=\"center\" class=\"chubeibeiyongzijin\">平衡型</td>
			<td align=\"center\" class=\"chubeibeiyongzijin\">进取型</td>
			<td align=\"center\" class=\"chubeibeiyongzijin\">激进型</td>
			</tr>
			<tr>
			<td align=\"center\" class=\"chubeibeiyongzijin\" style=\"background:red\"><span>0%</span></td>
			<td align=\"center\" class=\"chubeibeiyongzijin\">-5%</td>
			<td align=\"center\" class=\"chubeibeiyongzijin\">-10%</td>
			<td align=\"center\" class=\"chubeibeiyongzijin\">-15%</td>
			<td align=\"center\" class=\"chubeibeiyongzijin\">-20%</td>
			</tr>";
	  }
	?>
    </table></td>
  </div>
  <tr>
    <td>&nbsp;</td>
  </tr>
  </div><!--风险扇形图2-->
  <div class="zaitouziguochengzhong">
在投资过程中，您的家庭可以承受最多<?php
	  if ($LoginRS_risk_value >= 13) {
		echo "-15%";
	  } else if (13 > $LoginRS_risk_value and $LoginRS_risk_value >= 10) {
		echo "-10%";
	  } else if (10 > $LoginRS_risk_value and $LoginRS_risk_value >= 7) {
		echo "-5%";
	  } else {
		echo "0%";
	  }
	?>的投资风险（风险承受能力<?php
	  if ($LoginRS_risk_value >= 13) {
		echo "较强）。这与您主观上的风险偏好（进取型";
	  } else if (13 > $LoginRS_risk_value and $LoginRS_risk_value >= 10) {
		echo "中等）。这与您主观上的风险偏好（平衡型";
	  } else if (10 > $LoginRS_risk_value and $LoginRS_risk_value >= 7) {
		echo "适中）。这与您主观上的风险偏好（稳健型";
	  } else {
		echo "较低）。这与您主观上的风险偏好（保守型";
	  }
	?>）较为匹配，投资心态良好，请继续保持。</br>

接下来，在为您做投资规划时，我们将把<?php
	  if ($LoginRS_risk_value >= 13) {
		echo "-15%";
	  } else if (13 > $LoginRS_risk_value and $LoginRS_risk_value >= 10) {
		echo "-10%";
	  } else if (10 > $LoginRS_risk_value and $LoginRS_risk_value >= 7) {
		echo "-5%";
	  } else {
		echo "0%";
	  }
	?>作为风险控制目标，在此基础上争取最大收益。</br>
  </div><!--在投资过程中-->
    <p>&nbsp;</p>
    <div class="xiayizhangzhichufenxi"><a href="fpinvestplan.php">下一章：投资规划</a></div><!--下一章支出分析-->
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
