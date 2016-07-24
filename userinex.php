<?php
if (!isset($_SESSION)) {
	session_start();
}
?>
<?php
//$loginFormAction = $_SERVER['PHP_SELF'];
$MM_fillnextpage="userasset.php";
$MM_redirectLoginFailed="login.php";
if (isset($_SESSION['MM_Username'])) {
	if(isset($_POST['yuegongzi'])) {
		//income
		$loginUserincome_m=$_POST['yuegongzi'];
		$loginUserotherin_m=$_POST['yueqitain'];
		$loginUserbonus=$_POST['nianzhongjiang'];
		$loginUserotherin_y=$_POST['nianqita'];
		//expend
		$loginUserepast_m=$_POST['canyinyule'];
		$loginUsertraffic_m=$_POST['jiaotongtongxun'];
		$loginUsershop_m=$_POST['jiajvgouwu'];
		$loginUserrent_m=$_POST['fangzufangdai'];
		$loginUserotherex_m=$_POST['yueqitaout'];
		$loginUserotherex_y=$_POST['nianduzhichu'];
		
		$LoginUserID=$_SESSION['MM_UserID'];
		require_once "dbaccess.php";
		//处理支出的数据表
		$LoginRS_expend=sprintf("SELECT ex_id FROM user_expend_t WHERE ex_id ='%s'",get_magic_quotes_gpc() ? $LoginUserID : addslashes($LoginUserID)); 
		$LoginRS_expend_RS = mysql_query($LoginRS_expend);
		$loginFoundexpend = mysql_num_rows($LoginRS_expend_RS);
		if ($loginFoundexpend) {
			$Login_expend_Update="update user_expend_t set ex_repast_m='".$loginUserepast_m."',ex_traffic_m='".$loginUsertraffic_m."',ex_shop_m='".$loginUsershop_m."',ex_rent_m='".$loginUserrent_m."',ex_other_m='".$loginUserotherex_m."',ex_other_y='".$loginUserotherex_y."' where ex_id='".$LoginUserID."'";
			$LoginUpdatex = mysql_query($Login_expend_Update);
			if(!$LoginUpdatex) {
				echo '<script type="text/javascript">window.alert("数据库更新失败!")</script>';
			}
		} else {
			$Login_ex_fill="INSERT INTO user_expend_t (ex_id, ex_repast_m, ex_traffic_m, ex_shop_m, ex_rent_m, ex_other_m, ex_other_y) VALUES ";
			if (!get_magic_quotes_gpc())
			{
				addslashes($LoginUserID);
				addslashes($loginUserepast_m);
				addslashes($loginUsertraffic_m);
				addslashes($loginUsershop_m);
				addslashes($loginUserrent_m);
				addslashes($loginUserotherex_m);
				addslashes($loginUserotherex_y);
			}
			$Login_ex_fill = $Login_ex_fill."('".$LoginUserID."','".$loginUserepast_m."','".$loginUsertraffic_m."','".$loginUsershop_m."','".$loginUserrent_m."','".$loginUserotherex_m."','".$loginUserotherex_y."')";
			$Loginexfill = mysql_query($Login_ex_fill);
			if(!$Loginexfill) {
				echo '<script type="text/javascript">window.alert("数据库插入失败!")</script>';
			}
		}
		
		//处理收入的数据表
		$LoginRS_income=sprintf("SELECT in_id FROM user_income_t WHERE in_id ='%s'",get_magic_quotes_gpc() ? $LoginUserID : addslashes($LoginUserID)); 
		$LoginRS_income_RS = mysql_query($LoginRS_income);
		$loginFoundincome = mysql_num_rows($LoginRS_income_RS);
		if ($loginFoundincome) {
			$Login_income_Update="update user_income_t set in_salary_m='".$loginUserincome_m."',in_other_salary_m='".$loginUserotherin_m."',in_bonus_y='".$loginUserbonus."',in_other_bonus_y='".$loginUserotherin_y."' where in_id='".$LoginUserID."'";
			$LoginUpdate = mysql_query($Login_income_Update);
			if(!$LoginUpdate) {
				echo '<script type="text/javascript">window.alert("数据库更新失败!")</script>';
			}
		} else {
			$Login_in_fill="INSERT INTO user_income_t (in_id, in_salary_m, in_other_salary_m, in_bonus_y, in_other_bonus_y) VALUES ";
			if (!get_magic_quotes_gpc())
			{
				addslashes($LoginUserID);
				addslashes($loginUserincome_m);
				addslashes($loginUserotherin_m);
				addslashes($loginUserbonus);
				addslashes($loginUserotherin_y);
			}
			$Login_in_fill = $Login_in_fill."('".$LoginUserID."','".$loginUserincome_m."','".$loginUserotherin_m."','".$loginUserbonus."','".$loginUserotherin_y."')";
			$Loginfill = mysql_query($Login_in_fill);
			if(!$Loginfill) {
				echo '<script type="text/javascript">window.alert("数据库插入失败!")</script>';
			}
		}
		require_once "dbclose.php";
		//echo '<script type="text/javascript">window.alert("数据"'.$loginUsecareer.'"库插"'.$loginUserscinsurance.'"入失败!")</script>';
		//echo '<script type="text/javascript">window.alert("数据"'.$LoginUserID.'"库插入失败!")</script>';
		echo '<script type="text/javascript">window.location.href="'.$MM_fillnextpage.'"</script>';	
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
  <img src="image/tel.jpg" alt="服务热线"/>24小时服务热线:<span class="tel">123-456-7890</span>
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
    <div class="zichanxianzhuang"><a href="#">2.收支情况</a> </div><!--保险规划-->
    <div class="rangjieyugengduo">理财师将帮助您分析、改进目前的收支情况，指导您获得更健康的收支结余。

 </div><!--理财师将帮助您分析、改进目前的收支情况，指导您获得更健康的收支结余。
-->
<div class="gerenxinxi2">
<div class="nideshuihoushouru">您的税后收入:</div><!--您的税后收入-->
  <form id="form1" name="form1" method="post" action="">
    <p><div class="foundlabel">月工资收入:</div>
      <label for="yuegongzi"></label>
      <input type="text" name="yuegongzi" id="yuegongzi" value="0" style="color:#999999" onFocus="if (this.value==defaultValue){this.value ='';this.style.color='#000000'}" onBlur="if(!value){value=defaultValue;this.style.color='#999999'}"/>
      元      </p>
    <p><div class="foundlabel">月其他收入:</div>
      <label for="yueqitain"></label>
      <input type="text" name="yueqitain" id="yueqitain" value="0" style="color:#999999" onFocus="if (this.value==defaultValue){this.value ='';this.style.color='#000000'}" onBlur="if(!value){value=defaultValue;this.style.color='#999999'}"/>
      元</p>
    <p><div class="foundlabel">年其他收入:</div>
      <label for="nianqita"></label>
      <input type="text" name="nianqita" id="nianqita" value="0" style="color:#999999" onFocus="if (this.value==defaultValue){this.value ='';this.style.color='#000000'}" onBlur="if(!value){value=defaultValue;this.style.color='#999999'}"/>
      元</p>
    <p><div class="foundlabel">年中奖收入:</div>
      <label for="nianzhongjiang"></label>
      <input type="text" name="nianzhongjiang" id="nianzhongjiang" value="0" style="color:#999999" onFocus="if (this.value==defaultValue){this.value ='';this.style.color='#000000'}" onBlur="if(!value){value=defaultValue;this.style.color='#999999'}"/>
      元</p>
    <p>&nbsp;</p>
    <p><div class="foundlabel">每月餐饮娱乐:</div>
      <label for="canyinyule"></label>
      <input type="text" name="canyinyule" id="canyinyule" value="0" style="color:#999999" onFocus="if (this.value==defaultValue){this.value ='';this.style.color='#000000'}" onBlur="if(!value){value=defaultValue;this.style.color='#999999'}"/>
      元</p>
    <p><div class="foundlabel">每月交通通讯:</div>
      <label for="jiaotongtongxun"></label>
      <input type="text" name="jiaotongtongxun" id="jiaotongtongxun" value="0" style="color:#999999" onFocus="if (this.value==defaultValue){this.value ='';this.style.color='#000000'}" onBlur="if(!value){value=defaultValue;this.style.color='#999999'}"/>
      元</p>
    <p><div class="foundlabel">每月家居购物:</div>
      <label for="jiajvgouwu"></label>
      <input type="text" name="jiajvgouwu" id="jiajvgouwu" value="0" style="color:#999999" onFocus="if (this.value==defaultValue){this.value ='';this.style.color='#000000'}" onBlur="if(!value){value=defaultValue;this.style.color='#999999'}"/>
      元</p>
    <p><div class="foundlabel">每月房租房贷:</div>
      <label for="fangzufangdai"></label>
      <input type="text" name="fangzufangdai" id="fangzufangdai" value="0" style="color:#999999" onFocus="if (this.value==defaultValue){this.value ='';this.style.color='#000000'}" onBlur="if(!value){value=defaultValue;this.style.color='#999999'}"/>
      元</p>
    <p><div class="foundlabel">每月其他支出:</div>
      <label for="yueqitaout"></label>
      <input type="text" name="yueqitaout" id="yueqitaout" value="0" style="color:#999999" onFocus="if (this.value==defaultValue){this.value ='';this.style.color='#000000'}" onBlur="if(!value){value=defaultValue;this.style.color='#999999'}"/>
      元</p>
    <p><div class="foundlabel">其他年度支出:</div>
      <label for="nianduzhichu"></label>
      <input type="text" name="nianduzhichu" id="nianduzhichu" value="0" style="color:#999999" onFocus="if (this.value==defaultValue){this.value ='';this.style.color='#000000'}" onBlur="if(!value){value=defaultValue;this.style.color='#999999'}"/>
      元</p>
    <p class="inputstyle"><br />
      <input type="submit" name="button" id="button" value=" " onclick="return validateform(this.from)"/>
    </p>
    <p><br />
    </p>
  </form>
</div>

<!--个人信息按钮-->
    <!--<div class="xiayizhangzhichufenxi"><a href="userasset.php">￥资产详情</a></div>--><!--资产详情-->

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
<script type="text/javascript">
<!--
function TestRgexp(re, s){ // 参数说明 re 为正则表达式 s 为要判断的字符 
	return re.test(s) 
} 

function TestNum(num) {
	//var re = /^[0-9]*[1-9][0-9]*$/; //正整数正则表达式
	var re = /^\d+$/　　//非负整数（正整数 + 0） 
	var result = TestRgexp(re , num); //测试 返回true或false 
	if (result) {
		return false;
	} else {
		return true;
	}
}
function validateform()
{
	//收入
	if(document.form1.yuegongzi.value == "") {
		window.alert ("月工资收入不能为空!")
		return false;
	} else {
		 if(TestNum(document.form1.yuegongzi.value)) {
			window.alert ("月工资收入请输入正整数!")
			return false; 
		}
	}
	if(document.form1.yueqitain.value == "") {
		window.alert ("月其他收入不能为空!")
		return false;
	} else {
		 if(TestNum(document.form1.yueqitain.value)) {
			window.alert ("月其他收入请输入正整数!")
			return false; 
		}
	}
	if(document.form1.nianzhongjiang.value == "") {
		window.alert ("年终奖不能为空!")
		return false;
	} else {
		 if(TestNum(document.form1.nianzhongjiang.value)) {
			window.alert ("年终奖请输入正整数!")
			return false; 
		}
	}
	if(document.form1.nianqita.value == "") {
		window.alert ("其他年收入不能为空!")
		return false;
	} else {
		 if(TestNum(document.form1.nianqita.value)) {
			window.alert ("其他年收入请输入正整数!")
			return false; 
		}
	}
	//消费
	if(document.form1.canyinyule.value == "") {
		window.alert ("每月餐饮娱乐不能为空!")
		return false;
	} else {
		 if(TestNum(document.form1.canyinyule.value)) {
			window.alert ("每月餐饮娱乐请输入正整数!")
			return false; 
		}
	}
	if(document.form1.jiaotongtongxun.value == "") {
		window.alert ("每月交通通讯不能为空!")
		return false;
	} else {
		 if(TestNum(document.form1.jiaotongtongxun.value)) {
			window.alert ("每月交通通讯请输入正整数!")
			return false; 
		}
	}
	if(document.form1.jiajvgouwu.value == "") {
		window.alert ("每月家居购物不能为空!")
		return false;
	} else {
		 if(TestNum(document.form1.jiajvgouwu.value)) {
			window.alert ("每月家居购物请输入正整数!")
			return false; 
		}
	}
	if(document.form1.fangzufangdai.value == "") {
		window.alert ("每月房租房贷不能为空!")
		return false;
	} else {
		 if(TestNum(document.form1.fangzufangdai.value)) {
			window.alert ("每月房租房贷请输入正整数!")
			return false; 
		}
	}
	if(document.form1.yueqitaout.value == "") {
		window.alert ("每月其他支出不能为空!")
		return false;
	} else {
		 if(TestNum(document.form1.yueqitaout.value)) {
			window.alert ("每月其他支出请输入正整数!")
			return false; 
		}
	}
	if(document.form1.nianduzhichu.value == "") {
		window.alert ("其他年度支出不能为空!")
		return false;
	} else {
		 if(TestNum(document.form1.nianduzhichu.value)) {
			window.alert ("其他年度支出请输入正整数!")
			return false; 
		}
	}
	document.form1.submit()
	return true;
}
-->
</script>
