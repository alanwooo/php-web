<?php
if (!isset($_SESSION)) {
	session_start();
}
?>
<?php
$MM_redirectLoginFailed="login.php";
if (isset($_SESSION['MM_Username'])) {
	$LoginUserID=$_SESSION['MM_UserID'];

	$barfilem="image/tmp/yueshouru".$LoginUserID.".png";
	$barfiley="image/tmp/nianshouru".$LoginUserID.".png";
	if(file_exists($barfilem)) {
		unlink($barfilem);
	}
	if(file_exists($barfiley)) {
		unlink($barfiley);
	}
	$piefilen="image/tmp/zichuqingkuang".$LoginUserID.".png";
	if(file_exists($piefilen)) {
		unlink($piefilen);
	}

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

		$LoginRS_money=sprintf("SELECT * FROM user_money_t WHERE user_id='%s'",get_magic_quotes_gpc() ? $LoginUserID : addslashes($LoginUserID)); 
		$LoginRS_money_RS = mysql_query($LoginRS_money);
		if ($LoginRS_money_RS) {
			$LoginRS_money_row = mysql_fetch_row($LoginRS_money_RS);
			$Loginuser_curr = $LoginRS_money_row[1];
			$Loginuser_fiexd = $LoginRS_money_row[2];
		} else {
			$is_failed=true;
		}

		$LoginRS_ex_mon=sprintf("SELECT * FROM user_expend_t WHERE ex_id='%s'",get_magic_quotes_gpc() ? $LoginUserID : addslashes($LoginUserID)); 
		$LoginRS_ex_RS = mysql_query($LoginRS_ex_mon);
		if ($LoginRS_ex_RS) {
			$LoginRS_ex_row = mysql_fetch_row($LoginRS_ex_RS);
			$Loginuser_ex_rep = $LoginRS_ex_row[1];
			$Loginuser_ex_tra = $LoginRS_ex_row[2];
			$Loginuser_ex_shp = $LoginRS_ex_row[3];
			$Loginuser_ex_ren = $LoginRS_ex_row[4];
			$Loginuser_ex_oth = $LoginRS_ex_row[5];
			$Loginuser_ex_ohy = $LoginRS_ex_row[6];
			$Loginuser_ex_all = $Loginuser_ex_rep + $Loginuser_ex_tra + $Loginuser_ex_shp + $Loginuser_ex_ren + $Loginuser_ex_oth + round( $Loginuser_ex_ohy / 12 );
			$Loginuser_ex_all_2 = $Loginuser_ex_all * 2;
			$Loginuser_ex_all_4 = $Loginuser_ex_all * 4;
			$Loginuser_ex_all_rese = $Loginuser_ex_all_4;
		} else {
			$is_failed=true;
		}

		$LoginRS_fou_mon=sprintf("SELECT * FROM user_foundation_t WHERE user_id='%s'",get_magic_quotes_gpc() ? $LoginUserID : addslashes($LoginUserID)); 
		$LoginRS_fou_RS = mysql_query($LoginRS_fou_mon);
		if ($LoginRS_fou_RS) {
			$LoginRS_fou_row = mysql_fetch_row($LoginRS_fou_RS);
			$Loginuser_fou_all = $LoginRS_fou_row[1] + $LoginRS_fou_row[2] + $LoginRS_fou_row[3] + $LoginRS_fou_row[4] + $LoginRS_fou_row[5] + $LoginRS_fou_row[6];
		} else {
			$is_failed=true;
		}
		
		if ($is_failed) {
			echo '<script type="text/javascript">window.alert("数据库读取失败!")</script>';
		} else {
			if ($Loginuser_ex_all_4 < $Loginuser_curr) {	
				$Loginuser_ex_all_rese = $Loginuser_ex_all_4;
				$Loginuser_mon_text = "过高";
				$Loginuser_tmp = $Loginuser_curr - $Loginuser_ex_all_4 ;
				$Loginuser_mon_todo = 0 - $Loginuser_tmp;
				$Loginuser_rese_text = "将活期存款中".$Loginuser_tmp."元转作其他安排";	
			} else {
				$Loginuser_ex_all_rese = $Loginuser_ex_all * 3;
				$Loginuser_mon_text = "不足";
				$Loginuser_add_mon = sprintf("%d", $Loginuser_income_all / 5);
				$Loginuser_mon_todo = $Loginuser_add_mon;
				$Loginuser_rese_text = "使用未来月结余，补充活期存款".$Loginuser_add_mon."元";
			}
		}

		if ($is_failed) {
			echo '<script type="text/javascript">window.alert("数据库读取失败!")</script>';
		} else {
			if ($Loginuser_fou_all >= $Loginuser_ex_all_rese * 4) {	
				$Loginuser_fon_text = "过高";
				$Loginuser_fou_tmp = $Loginuser_fou_all - $Loginuser_ex_all_rese * 4;
				$Loginuser_fon_todo = 0 - $Loginuser_fou_tmp;
				$Loginuser_fon_rese_text = "超额".$Loginuser_fou_tmp."元，处理建议将在后续的投资规划中给出";	
			} else {
				$Loginuser_fon_text = "不足";
				$Loginuser_fouad_tmp = $Loginuser_ex_all_rese * 4 - $Loginuser_fou_all + 1000;
				$Loginuser_fonadd_mon = sprintf("%d", $Loginuser_fouad_tmp);
				$Loginuser_fon_todo = $Loginuser_fonadd_mon;
				$Loginuser_fon_rese_text = "使用现有活期存款，增持货币基金".$Loginuser_fonadd_mon."元";
			}
		}

		$LoginRS_rese_mon=sprintf("SELECT user_id FROM user_plan_result_t WHERE user_id='%s'",get_magic_quotes_gpc() ? $LoginUserID : addslashes($LoginUserID)); 
		$LoginRS_rese_RS = mysql_query($LoginRS_rese_mon);
		$loginFoundUser_brate = mysql_num_rows($LoginRS_rese_RS);
		if ($loginFoundUser_brate) {
			$Login_Update_brate="update user_plan_result_t set user_rese_mon='".$Loginuser_ex_all_rese."', user_mon_todo='".$Loginuser_mon_todo."', user_fod_todo='".$Loginuser_fon_todo."' where user_id='".$LoginUserID."'";
			$LoginRS = mysql_query($Login_Update_brate);
			if(!$LoginRS) {
				echo '<script type="text/javascript">window.alert("数据库更新失败!")</script>';
			}
		} else {
			$Login_rese_mon_fill="INSERT INTO user_plan_result_t (user_id, user_rese_mon, user_mon_todo, user_fod_todo) VALUES ";
			if (!get_magic_quotes_gpc())
			{
				addslashes($LoginUserID);
				addslashes($Loginuser_ex_all_rese);
				addslashes($Loginuser_mon_todo);
				addslashes($Loginuser_fon_todo);
			}
			$Login_rese_mon_fill = $Login_rese_mon_fill."('".$LoginUserID."','".$Loginuser_ex_all_rese."','".$Loginuser_mon_todo."','".$Loginuser_fon_todo."')";
			$LoginRS = mysql_query($Login_rese_mon_fill);
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
    <div class="zichanxianzhuang"><a href="#">3.储备紧急备用金</a> </div><!--储备紧急备用金-->
    <div class="rangjieyugengduo">应对不时之需
 </div><!--应对不时之需-->
    <div class="meigejingjiduli">
    每个经济独立的个人或家庭，都应该储备一定额度的可以随时取用的紧急备用金，用来应对以下情况：暂时失业中断收入，紧急医疗或意外，灾害导致的超支费用，应付短期周转等。实际上，进行专业理财规划前，很多人已经自觉不自觉地留出一笔活期存款以备不时之需。那么怎么做可以更科学合理呢？</br>
<strong>原则1：在金额上，通常以月平均支出的3-6倍为宜。</strong></br>
<strong>原则2：在储备方式上，适宜投向风险极低且流动性好（可随时取用）的投资品种，如活期存款和货币基金。</strong></br>
您家庭目前月均支出约<?php echo $Loginuser_ex_all ?>元。对您来说，紧急备用金较为理想的储备方案是：现金和活期存款<?php echo $Loginuser_ex_all,"~",$Loginuser_ex_all_2 ?>元 + 货币基金<?php echo $Loginuser_ex_all_2,"~",$Loginuser_ex_all_4 ?>元。这样安排的好处是，既能够保证应急需要，也可以通过投资获得适当收益。
<div class="xingdongjihua">我的行动计划</div><!--我的行动计划-->
对照您的现有储备,我们为您制订如下行动计划，达成储备紧急备用金 <?php echo $Loginuser_ex_all_rese ?> 元的目标。
<div class="xingdongjiahuabiaoge">
  <table width="661" align="center">
    <tr>
      <td width="166" align="center" bgcolor="#FF0000"><span>现有储备</span></td>
      <td width="100" align="center" bgcolor="#FF0000"><span>评价</span></td>
      <td width="436" align="center" bgcolor="#FF0000"><span>行动</span></td>
    </tr>
    <tr>
      <td>现金及活期存款 <?php echo $Loginuser_curr ?> 元</td>
      <td align="center" style="color:#F60" ><?php echo $Loginuser_mon_text ?></td>
      <td><?php echo $Loginuser_rese_text ?></td>
    </tr>
    <tr>
      <td>货币基金 <?php echo $Loginuser_fou_all ?> 元</td>
      <td align="center" style="color:#F60" ><?php echo $Loginuser_fon_text ?></td>
      <td><?php echo $Loginuser_fon_rese_text ?></td>
    </tr>
  </table>
</div><!--我的行动计划表格-->
<div class="beizhu">注：为执行、计算方便，上表中的金额均四舍五入至百位。</div><!--备注-->
<div class="mudanbaotixing"><strong>牡丹宝理财的更多提醒:</strong></br>
1.余额宝、活期通等互联网理财产品,本质上就是货币基金。</br>
2.信用卡也可以在需要时起到补充紧急备用金的作用。</br>
3.紧急备用金也可用于平时的现金周转。但一经动用,须以较高优先级尽快补齐。</br>
4.若您的收支情况发生变化,应及时调整紧急备用金额度。

</div><!--牡丹宝理财提醒-->
    </div><!--每个经济独立的个人-->
    <div class="xiayizhangzhichufenxi"><a href="fpinsplan.php">下一章：保险规划</a></div><!--下一章支出分析-->
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
