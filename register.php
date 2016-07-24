<?php
if (!isset($_SESSION)) {
	session_start();
}
?>
<?php
$loginFormAction = $_SERVER['PHP_SELF'];
if (isset($_POST['ID'])) {
	$LoginUserAlias=$_POST['ID'];
	$loginUserName=$_POST['name'];
	$password=$_POST['password'];
	$email=$_POST['mail'];
	$telephone=$_POST['number'];

	$MM_RegistFail="register.php";
	//注册完成跳转到填资料页面
	$MM_RegistSuccess="userinfo.php";

	require_once "dbaccess.php";
	$LoginRS_querya=sprintf("SELECT user_alias FROM user_info WHERE user_alias='%s'",get_magic_quotes_gpc() ? $LoginUserAlias : addslashes($LoginUserAlias)); 
	$LoginRS = mysql_query($LoginRS_querya);
	$loginFoundUser = mysql_num_rows($LoginRS);
	if ($loginFoundUser) {
		require_once "dbclose.php";  
		echo '<script type="text/javascript">window.alert("帐号已被注册，请更换帐号重新注册!")</script>';
		echo '<script type="text/javascript">window.location.href="'.$MM_RegistFail.'"</script>';
	} else {
		$LoginRS_queryb="INSERT INTO user_info (user_name, user_passwd, user_phone, user_email, user_alias) VALUES ";
		if (!get_magic_quotes_gpc()) {
			addslashes($LoginUserAlias);
			addslashes($loginUserName);
			addslashes($password);
			addslashes($email);
			addslashes($telephone);
		}
		$LoginRS_queryb = $LoginRS_queryb."('".$loginUserName."','".$password."','".$telephone."','".$email."','".$LoginUserAlias."')";
		$LoginRSb = mysql_query($LoginRS_queryb);
		$LoginRS_queryc=sprintf("SELECT user_alias,user_id FROM user_info WHERE user_alias='%s'",get_magic_quotes_gpc() ? $LoginUserAlias : addslashes($LoginUserAlias)); 
		$LoginRSc = mysql_query($LoginRS_queryc);
		$loginFoundUserc = mysql_fetch_row($LoginRSc);
		if ($loginFoundUserc[0]) {
			$_SESSION['MM_Username'] = $LoginUserAlias;
			$_SESSION['MM_UserID'] = $loginFoundUserc[1];
		}
		require_once "dbclose.php";
		echo '<script type="text/javascript">window.alert("恭喜您，注册成功!")</script>';
		echo '<script type="text/javascript">window.location.href="'.$MM_RegistSuccess.'"</script>';
	}
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
  <li><a href="login.php">登录</a></li>
  <li><a href="register.php">注册账号</a></li>
  <li><a href="fpviews.php">理财师观点</a></li>
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
<h2>注册账号</h2>
<div class="zhanghao">
<div class="zhanghao-1">
  <form id="form1" name="form1" method="post" action="">
    <p>
      <label for="ID"><span>*账号</span></label>
      <input name="ID" type="text" id="ID" size="25" maxlength="20" />
   </p>
    <p>
    <label for="password"><span>*密码</span></label>
    <input name="password" type="password" id="password" size="25" maxlength="20" title="请输入密码"/></p>
    <p>
	<p>
    <label for="password1"><span>*确认密码</span></label>
    <input name="password1" type="password" id="password1" size="25" maxlength="20" title="请确认密码"/></p>
    <p>
    <label for="number"><span>*手机</span></label>
    <input name="number" type="text" id="number" size="25" maxlength="11" />
    </p>
    <p>
    <label for="mail"><span>*邮箱</span></label>
    <input name="mail" type="text" id="mail" size="25" maxlength="20" />
    </p>
    <p>
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" name="zhuceanniu" id="zhuceanniu" value= " " onclick="return validateform(this.from)"/>
      &nbsp;&nbsp;&nbsp;&nbsp;</p>
  </form>
</div><!--zhanghao-1-->

</div><!--账号结束-->
</div><!--list-main结束-->
</div>
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
function validateform() 
{
	if(document.form1.ID.value == "")
	{
		window.alert ("请输入你的登录名!")
		document.form1.ID.focus(); 
	return false;
	}
	if(document.form1.password.value == "")
	{
		window.alert ("密码不能为空!")
		document.form1.password.focus(); 
		return false;
	}
	if(document.form1.password.value != document.form1.password1.value)
	{
		window.alert ("两次填写的密码不一致!")
		document.form1.password.focus(); 
		return false;
	}
	if(document.form1.number.value == "") {
		window.alert ("手机号码不能为空!");
		return false;
	} else {
		if(!(/^1[3|4|5|8][0-9]\d{4,8}$/.test(document.form1.number.value))){ 
			window.alert("不是完整的11位手机号或者正确的手机号前七位"); 
			document.form1.number.focus(); 
			return false; 
		}
	}
	if(document.form1.mail.value == "") {
		window.alert ("Email地址不能为空!");
		return false;
	} else {
		var sReg = /[_a-zA-Z\d\-\.]+@[_a-zA-Z\d\-]+(\.[_a-zA-Z\d\-]+)+$/;
		if (!sReg.test(document.form1.mail.value)) {
			window.alert("Email地址错误！请重新输入。");
			document.form1.mail.focus();
			return false;
		}
	}
	if(document.form1.name.value == "")
	{
		window.alert ("姓名不能为空!")
		document.form1.name.focus(); 
		return false;
	}
	document.form1.submit()
	return true;
}
</script>