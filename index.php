<?php
if (!isset($_SESSION)) {
  session_start();
}
?>
<?php
require_once "dbaccess.php";
$MM_redirectLogin = "login.php";
if(isset($_SESSION['MM_UserID'])){
	$LoginUserID=$_SESSION['MM_UserID'];

	$LoginRS__query=sprintf("SELECT user_alias, user_id, user_if_finish FROM user_info WHERE user_id='%s'",
	get_magic_quotes_gpc() ? $LoginUserID : addslashes($LoginUserID));
	$LoginRS = mysql_query($LoginRS__query);
	$loginFoundUser = mysql_num_rows($LoginRS);
	if ($loginFoundUser == 1) {    	
		//登录成功后判断用户资料是填写完整
		$user_info_obj = mysql_fetch_row($LoginRS);
		if($user_info_obj[2] == 0) {
			$MM_redirectLogin = "userinfo.php";
			require_once "dbclose.php";  
		} else {
			$MM_redirectLogin = "fpasset.php";
			require_once "dbclose.php";
		}
	} else {
		$MM_redirectLogin = "login.php";
	}
}
require_once "dbclose.php";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>牡丹宝理财</title>
<link href="css/main.css" rel="stylesheet" type="text/css" />
<script src="JS/myfocus-2.0.1.min.js" type="text/javascript"></script>
<script src="JS/mf-pattern/mF_YSlider.js"type="text/javascript"></script>
<link href="JS/mf-pattern/mF_YSlider.css" rel="stylesheet" type="text/css" />
<script type="text/javascript">
myFocus.set({
	   id:'picBox'}
	   )
</script>
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
      echo "<li><a href=\"register.php\">注册账号</a></li>";
	  echo "<li><a href=\"fpviews.php\">理财师观点</a></li>";
    }
 ?>
 </ul>
</div><!--top-content结束-->
</div><!--top结束-->
<div class="warp">
<div class="logo">
  <div class="logo-left">
  <img border="0" src="image/mudanbaolicai.jpg" alt="牡丹宝理财" /></a>
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
        <li class="nav-mid-left"><a href="typicalcases.php">经典案例</a></li>
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
<div class="ad" id="picBox">
<div class="pic">
  <ul>
          <li> <a href="age25whitecollar.php"><img src="image/licai1.jpg" border="0" /></a></li>
          <li> <a href="login.php"><img src="image/licai.jpg" /></a></li>
     <li> <a href="consultfp.php"><img src="image/licai2.jpg" /></a></li>

  </ul>
  </div>
</div><!--ad结束-->
<div class="main">
   <div class="news">
     <div class="title">
        <h2 class="title-left">理财中心</h2><span class="title-right"><a href="consultfp.php">MORE&gt;&gt;</a></span>
     </div><!--title结束-->
     <div class="pic-news">
     <img src="image/licaizixun.jpg" /><h2><a href="#">牡丹宝理财</a></h2><p>了解财务现状是理财的起点:<br/>有多少投资、投到哪里？<br/><span><a href="fpviews.php">learn More>></a></span>
     </div><!--pic-news结束-->
     <div class="news-list">
     <ul>
     <li><a href="fpviews.php">专属理财规划——易懂、实用</a><span>2014.12.5</span></li>
     <li><a href="userfpaction.php">优质产品推荐——中立、严谨</a><span>2014.12.5</span></li>
     <li><a href="consultfp.php">想理财，但却无从下手？</a><span>2014.12.5</span></li>
     </ul>
   </div><!--news-list结束-->
   </div><!--news over-->
   <div class="course">
   <div class="title">
      <h2 class="title-left">经典案例分析</h2>
      <span class="title-right"><a href="typicalcases.php">MORE&gt;&gt;</a>
   </div><!--title结束-->
   <div class="course-pic">
   <img src="image/tupian.jpg" /><h2><a href="age25whitecollar.php">总有一款适合你</a></h2><span class="title-right"></span><p>牡丹宝理财，积累了金融业务丰富的一线实践经验，擅长基金分析于投资，善于为客户量身定制综合理财规划。坚信理财不是目地，而是手段，快逸人生才是我们追求的最高境界。</p>
   </div><!--course-pic结束-->
   <div class="course-type">
   <ul>
    <li><a href="age40richman.php"><span>王先生案例分析</a></span></li>
    <li><a href="age60hplife.php"><span>孙先生案例分析</a></span></li>
    <li><a href="age40raisefy.php"><span>李女士案例分析</a></span></li>
    <li><a href="typicalcases.php"><span>learn More>></a></span></li>
   </ul>
   </div><!--course-type结束-->
   </div><!--course over-->
   <div class="sidebar">
     <div class="video">
     <div class="title"><h2 class="title-left">理财视频</h2></div>
     <div class="video-content">
     <embed src="http://player.youku.com/player.php/sid/XMzQ5OTg3ODQ0/v.swf" allowFullScreen="true" quality="high" width="220" height="140" align="middle" allowScriptAccess="always" type="application/x-shockwave-flash"></embed></div>
     </div><!--video结束-->
     <div class="sidebar-ad"> <a href="consultfp.php"><img src="image/qingxiangxin.jpg" /></a>
     </div><!--sidebar-ad结束-->
   </div><!--sidebar结束-->
   </div><!--main结束-->
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
