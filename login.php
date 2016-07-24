<?php
if (!isset($_SESSION)) {
	session_start();
}
$loginFormAction = $_SERVER['PHP_SELF'];
if (isset($_GET['accesscheck'])) {
	$_SESSION['PrevUrl'] = $_GET['accesscheck'];
}
$Login_user_flag = 0;
if(isset($_SESSION['MM_Username'])) {
	$Login_user_flag = 1;
}
if (isset($_POST['ID'])) {
	$loginUsername=$_POST['ID'];
	$password=$_POST['password'];

	$MM_redirectLoginSuccess = "userfpaction.php";
	$MM_redirectLoginFailed = $_SERVER['PHP_SELF'];
	$MM_redirecttoReferrer = false;

	require_once "dbaccess.php";
	$LoginRS__query=sprintf("SELECT user_alias, user_id, user_if_finish FROM user_info WHERE user_alias='%s' AND user_passwd='%s'",
	get_magic_quotes_gpc() ? $loginUsername : addslashes($loginUsername), get_magic_quotes_gpc() ? $password : addslashes($password));

	$LoginRS = mysql_query($LoginRS__query);
	$loginFoundUser = mysql_num_rows($LoginRS);
	if ($loginFoundUser == 1) {    
		//declare two session variables and assign them
		$_SESSION['MM_Username'] = $loginUsername;
	
		//登录成功后判断用户资料是填写完整
		$user_info_obj = mysql_fetch_row($LoginRS);
		$_SESSION['MM_UserID'] = $user_info_obj[1];
		/*
		echo "==========================a=";
		echo $_SESSION['MM_UserID'];
		var_dump($user_info_obj);
		echo "=d==========================";
		*/
		/*
		if (isset($user_info_obj)) {
			echo "hahaha====";
			var_dump($user_info_obj);
		} else {
			echo "hehe====";
		}
		*/
		if($user_info_obj[2] == 0) {
			$MM_redirectLoginSuccess = "userinfo.php";
			require_once "dbclose.php";  
		} else {
			require_once "dbclose.php";
			if (isset($_SESSION['PrevUrl']) && false) {
				$MM_redirectLoginSuccess = $_SESSION['PrevUrl'];	
			}
		}
		header("Location: " . $MM_redirectLoginSuccess );
	} else {
		//header("Location: ". $MM_redirectLoginFailed );
		echo '<script type="text/javascript">window.alert("用户名或密码错误，请重新登录!")</script>';
		echo '<script type="text/javascript">window.location.href="'.$MM_redirectLoginFailed.'"</script>';
	}
	require_once "dbclose.php";
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
  <img src="image/tel.jpg" alt="服务热线"/>24小时服务热线:<span class="tel">123-456-7890</span>
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
<h2>登录牡丹宝理财</h2>
<div class="zhanghao">
<div class="zhanghao-1">
  <form id="form1" name="form1" method="post" action="<?php echo $loginFormAction; ?>">
    <p>
      <label for="id"><span>账号</span></label>
      <input name="ID" type="text" id="ID" size="25" maxlength="20" />
   </p>
    <p>
    <label for="password"><span>密码</span></label>
    <input name="password" type="password" id="password" size="25" maxlength="20" /></p>
    
    <p>
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" name="dengluanniu" id="dengluanniu" value= " " onClick="return validateform(this.from)"/>&nbsp;&nbsp;&nbsp;&nbsp;
      
    </p>
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
		return false;
	}
	if(document.form1.password.value == "")
	{
		window.alert ("密码不能为空!")
		return false;
	}
	/*
	if(<?php echo $Login_user_flag ?> != 1) {
		window.alert ("请先登录!");
		return false;
	}
	*/
	document.form1.submit()
	return true;
}
</script>