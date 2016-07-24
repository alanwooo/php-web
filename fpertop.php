<?php
if (!isset($_SESSION)) {
	session_start();
}
?>
<?php
$MM_redirectLoginFailed="login.php";
if (isset($_SESSION['MM_Username'])) {
	$select_value = -1;
	if(isset($_POST['paihang0'])) { $select_value = $_POST['paihang0']; }
	if(isset($_POST['paihang1'])) { $select_value = $_POST['paihang1']; }
	if(isset($_POST['paihang2'])) { $select_value = $_POST['paihang2']; }
	if(isset($_POST['paihang3'])) { $select_value = $_POST['paihang3']; }
	if(isset($_POST['paihang4'])) { $select_value = $_POST['paihang4']; }
	if(isset($_POST['paihang5'])) { $select_value = $_POST['paihang5']; }
	if(isset($_POST['paihang6'])) { $select_value = $_POST['paihang6']; }
	if(isset($_POST['paihang7'])) { $select_value = $_POST['paihang7']; }
	if(isset($_POST['paihang8'])) { $select_value = $_POST['paihang8']; }
	if(isset($_POST['paihang9'])) { $select_value = $_POST['paihang9']; }
	//echo '<script type="text/javascript">window.alert("'.$select_value.'")</script>';
	$LoginUserID=$_SESSION['MM_UserID'];
	require_once "dbaccess.php";
	$LoginRS_user_query=sprintf("SELECT user_fans FROM user_info WHERE user_id='%s'", get_magic_quotes_gpc() ? $LoginUserID : addslashes($LoginUserID));
	$LoginRS_user = mysql_query($LoginRS_user_query);
	if ($LoginRS_user) {
		$user_fans_id = mysql_fetch_row($LoginRS_user);
		if ($select_value != -1) {
			if ($user_fans_id[0] == 0) {
				$LoginRS_user_fans_ud=sprintf("update user_financial_planner_t set fpner_fans=fpner_fans+1 where fpner_id='%s'",
				get_magic_quotes_gpc() ? $select_value : addslashes($select_value));
				$LoginRS_user_fans_ud_ret = mysql_query($LoginRS_user_fans_ud);
				if(! $LoginRS_user_fans_ud_ret) {
					echo '<script type="text/javascript">window.alert("关注失败!")</script>';
				}
				
				$LoginRS_user_info_ud=sprintf("update user_info set user_fans='%s' WHERE user_id='%s'", 
				get_magic_quotes_gpc() ? $select_value : addslashes($select_value),
				get_magic_quotes_gpc() ? $LoginUserID : addslashes($LoginUserID));
				$LoginRS_user_info_ud_ret = mysql_query($LoginRS_user_info_ud);
				if(! $LoginRS_user_info_ud_ret) {
					echo '<script type="text/javascript">window.alert("关注失败!")</script>';
				}
				echo "<script language=\"javascript\">location.href='fpertop.php';</script>";  
			} else if ($user_fans_id[0] == $select_value) {
				$LoginRS_user_fans_ud_can=sprintf("update user_financial_planner_t set fpner_fans=fpner_fans-1 where fpner_id='%s'",
				get_magic_quotes_gpc() ? $select_value : addslashes($select_value));
				$LoginRS_user_fans_ud_ret_can = mysql_query($LoginRS_user_fans_ud_can);
				if(! $LoginRS_user_fans_ud_ret_can) {
					echo '<script type="text/javascript">window.alert("取消关注失败!")</script>';
				}
				
				$LoginRS_user_info_ud_can=sprintf("update user_info set user_fans=0 WHERE user_id='%s'", 
				get_magic_quotes_gpc() ? $LoginUserID : addslashes($LoginUserID));
				$LoginRS_user_info_ud_ret_can = mysql_query($LoginRS_user_info_ud_can);
				if(! $LoginRS_user_info_ud_ret_can) {
					echo '<script type="text/javascript">window.alert("取消关注失败!")</script>';
				}
				echo "<script language=\"javascript\">location.href='fpertop.php';</script>";
			}else {
				echo '<script type="text/javascript">window.alert("每位用户只能关注一位理财师!")</script>';
				echo "<script language=\"javascript\">location.href='fpertop.php';</script>";
			}
		}

		$fpner_arry = array();
		$LoginRS_fpner_query=sprintf("SELECT * FROM  user_financial_planner_t ORDER BY fpner_fans DESC");
		$LoginRS_fpner = mysql_query($LoginRS_fpner_query);
		if ($LoginRS_fpner) {
			for($i=0;$i<10;$i++) {
				$row=mysql_fetch_row($LoginRS_fpner);
				$j=0;
				foreach($row as $value) {
					$fpner_arry[$i][$j] = $value;
					$j++;
				}
				if($user_fans_id[0] == $fpner_arry[$i][0]) {
					$fpner_arry[$i][$j] = "取消关注";
				} else {
					$fpner_arry[$i][$j] = "关注";
				}
			}
		} else {
			echo '<script type="text/javascript">window.alert("数据库读取失败!")</script>';
		}
	} else {
		echo '<script type="text/javascript">window.alert("数据库读取失败!")</script>';
	}
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
      echo "<li><a href=\"\">欢迎 $userid                   </a></li>";
	  echo "<li><a href=\"fpviews.php\">理财师观点</a></li>";
    }
    else
    {
      echo "<li><a href=\"login.php\">登录</a></li>";
      echo "<li><a href=\"zhucezhanghao.html\">注册账号</a></li>";
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
<h2>牡丹宝理财排行榜</h2>
<div class="news-list">
<p>&nbsp;</p>
<div style="text-align:center;" class="licaipaihangbang">
<table style="margin:auto;" width="95%" height="369" border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td width="5%" align="center" bgcolor="#FF0000"><span>排名</span></td>
        <td width="10%" align="center" bgcolor="#FF0000"><span>姓名</span></td>
        <td width="30%" align="center" bgcolor="#FF0000"><span>单位</span></td>
        <td width="7%" align="center" bgcolor="#FF0000"><span>性别</span></td>
        <td width="7%" align="center" bgcolor="#FF0000"><span>年龄</span></td>
        <td width="10%" align="center" bgcolor="#FF0000"><span>粉丝数量</span></td>
        <td width="12%" align="center" bgcolor="#FF0000"><span>加入粉丝</span></td>
      </tr>
      <tr>
        <td align="center">1</td>
		<?php
		echo '<td align="center">'.$fpner_arry[0][1].'</td>
        <td align="center">'.$fpner_arry[0][2].'</td>
        <td align="center">'.$fpner_arry[0][4].'</td>
        <td align="center">'.$fpner_arry[0][5].'</td>
        <td align="center">'.$fpner_arry[0][6].'</td>
		<td align="center" >
		<form id="form0" name="form0" method="post" action="">
		<input type="hidden" id="paihang0" name="paihang0" value='.$fpner_arry[0][0].' />
		<input type="submit" class="guanzhulicaishi" value='.$fpner_arry[0][7].' />
		</form>
		</td>';
		?>
      </tr>
      <tr>
        <td align="center">2</td>
		<?php
		echo '<td align="center">'.$fpner_arry[1][1].'</td>
        <td align="center">'.$fpner_arry[1][2].'</td>
        <td align="center">'.$fpner_arry[1][4].'</td>
        <td align="center">'.$fpner_arry[1][5].'</td>
        <td align="center">'.$fpner_arry[1][6].'</td>
		<td align="center">
		<form id="form1" name="form1" method="post" action="">
		<input type="hidden" id="paihang1" name="paihang1" value='.$fpner_arry[1][0].' />
		<input type="submit" class="guanzhulicaishi" value='.$fpner_arry[1][7].' />
		</form>
		</td>';
		?>
      </tr>
      <tr>
        <td align="center">3</td>
		<?php
		echo '<td align="center">'.$fpner_arry[2][1].'</td>
        <td align="center">'.$fpner_arry[2][2].'</td>
        <td align="center">'.$fpner_arry[2][4].'</td>
        <td align="center">'.$fpner_arry[2][5].'</td>
        <td align="center">'.$fpner_arry[2][6].'</td>
		<td align="center">
		<form id="form2" name="form2" method="post" action="">
		<input type="hidden" id="paihang2" name="paihang2" value='.$fpner_arry[2][0].' />
		<input type="submit" class="guanzhulicaishi" value='.$fpner_arry[2][7].' />
		</form>
		</td>';
		?>
      </tr>
      <tr>
        <td align="center">4</td>
		<?php
		echo '<td align="center">'.$fpner_arry[3][1].'</td>
        <td align="center">'.$fpner_arry[3][2].'</td>
        <td align="center">'.$fpner_arry[3][4].'</td>
        <td align="center">'.$fpner_arry[3][5].'</td>
        <td align="center">'.$fpner_arry[3][6].'</td>
		<td align="center">
		<form id="form3" name="form3" method="post" action="">
		<input type="hidden" id="paihang3" name="paihang3" value='.$fpner_arry[3][0].' />
		<input type="submit" class="guanzhulicaishi" value='.$fpner_arry[3][7].' />
		</form>
		</td>';
		?>
      </tr>
      <tr>
        <td align="center">5</td>
		<?php
		echo '<td align="center">'.$fpner_arry[4][1].'</td>
        <td align="center">'.$fpner_arry[4][2].'</td>
        <td align="center">'.$fpner_arry[4][4].'</td>
        <td align="center">'.$fpner_arry[4][5].'</td>
        <td align="center">'.$fpner_arry[4][6].'</td>
		<td align="center">
		<form id="form4" name="form4" method="post" action="">
		<input type="hidden" id="paihang4" name="paihang4" value='.$fpner_arry[4][0].' />
		<input type="submit" class="guanzhulicaishi" value='.$fpner_arry[4][7].' />
		</form>
		</td>';
		?>
      </tr>
      <tr>
        <td align="center">6</td>
		<?php
		echo '<td align="center">'.$fpner_arry[5][1].'</td>
        <td align="center">'.$fpner_arry[5][2].'</td>
        <td align="center">'.$fpner_arry[5][4].'</td>
        <td align="center">'.$fpner_arry[5][5].'</td>
        <td align="center">'.$fpner_arry[5][6].'</td>
		<td align="center">
		<form id="form5" name="form5" method="post" action="">
		<input type="hidden" id="paihang5" name="paihang5" value='.$fpner_arry[5][0].' />
		<input type="submit" class="guanzhulicaishi" value='.$fpner_arry[5][7].' />
		</form>
		</td>';
		?>
      </tr>
      <tr>
        <td align="center">7</td>
		<?php
		echo '<td align="center">'.$fpner_arry[6][1].'</td>
        <td align="center">'.$fpner_arry[6][2].'</td>
        <td align="center">'.$fpner_arry[6][4].'</td>
        <td align="center">'.$fpner_arry[6][5].'</td>
        <td align="center">'.$fpner_arry[6][6].'</td>
		<td align="center">
		<form id="form6" name="form6" method="post" action="">
		<input type="hidden" id="paihang6" name="paihang6" value='.$fpner_arry[6][0].' />
		<input type="submit" class="guanzhulicaishi" value='.$fpner_arry[6][7].' />
		</form>
		</td>';
		?>
      </tr>
      <tr>
        <td align="center">8</td>
		<?php
		echo '<td align="center">'.$fpner_arry[7][1].'</td>
        <td align="center">'.$fpner_arry[7][2].'</td>
        <td align="center">'.$fpner_arry[7][4].'</td>
        <td align="center">'.$fpner_arry[7][5].'</td>
        <td align="center">'.$fpner_arry[7][6].'</td>
		<td align="center">
		<form id="form7" name="form7" method="post" action="">
		<input type="hidden" id="paihang7" name="paihang7" value='.$fpner_arry[7][0].' />
		<input type="submit" class="guanzhulicaishi" value='.$fpner_arry[7][7].' />
		</form>
		</td>';
		?>
      </tr>
      <tr>
        <td align="center">9</td>
		<?php
		echo '<td align="center">'.$fpner_arry[8][1].'</td>
        <td align="center">'.$fpner_arry[8][2].'</td>
        <td align="center">'.$fpner_arry[8][4].'</td>
        <td align="center">'.$fpner_arry[8][5].'</td>
        <td align="center">'.$fpner_arry[8][6].'</td>
		<td align="center">
		<form id="form8" name="form8" method="post" action="">
		<input type="hidden" id="paihang8" name="paihang8" value='.$fpner_arry[8][0].' />
		<input type="submit" class="guanzhulicaishi" value='.$fpner_arry[8][7].' />
		</form>
		</td>';
		?>
      </tr>
	  <tr>
        <td align="center">10</td>
		<?php
		echo '<td align="center">'.$fpner_arry[9][1].'</td>
        <td align="center">'.$fpner_arry[9][2].'</td>
        <td align="center">'.$fpner_arry[9][4].'</td>
        <td align="center">'.$fpner_arry[9][5].'</td>
        <td align="center">'.$fpner_arry[9][6].'</td>
		<td align="center">
		<form id="form9" name="form9" method="post" action="">
		<input type="hidden" id="paihang9" name="paihang9" value='.$fpner_arry[9][0].' />
		<input type="submit" class="guanzhulicaishi" value='.$fpner_arry[9][7].' />
		</form>
		</td>';
		?>
      </tr>
    </table>
  </form>
</div>
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
