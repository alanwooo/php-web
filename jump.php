<?php
if (!isset($_SESSION)) {
  session_start();
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
<script type="text/javascript">
var ontime=0;
function validateform()
{
	document.form1.submit()
	return true;
}
function delayURL(url) { 
	var delay=document.getElementById("time").innerHTML; 
	//最后的innerHTML不能丢，否则delay为一个对象 
	if(delay>0){ 
		delay--; 
		document.getElementById("time").innerHTML=delay; 
	}else{
		ontime=1;
		document.getElementById("create_plan").innerHTML="您的专属理财规划书生成完成!";
		window.top.location.href=url; 
	} 
	setTimeout("delayURL('" + url + "')", 1000);  
}
function jumpurl() {
	if (ontime) {
		window.location.href="fpasset.php"
	}
}
</script>
<div class="list-box">
<h2>我的理财规划书</h2>
  <p>
    <div class="niddzhuanshulicai">&nbsp;</div>
  </p>
  <p>
    <div height="50">&nbsp;</div>
  </p>
  <p>
    <div id="create_plan" height="50" align="center" valign="middle" class="zhengzaishengcheng">正在生成您的专属理财规划书&nbsp;
	<span id="time" class="zhengzaishengcheng">3</span>&nbsp;...</div>
  </p>
  <p>
    <div>&nbsp;</div>
  </p>
  <p>
    <div>&nbsp;</div>
  </p>
  <p>
    <div align="center">
	<p>
	<div height="50" align="center" valign="middle"  class="tiaozhuan">生成完成后自动跳转，如果不跳转，请点击<a href="javascript:jumpurl()" class="tiaozhuan">[这里]</a></div>
	<script type="text/javascript"> 
		delayURL("fpasset.php"); 
	</script> 
	</p>
	</div>

  </p>
  <p>
    <div height="100">&nbsp;</div>
  </p>
  <p>
    <div>&nbsp;</div>
  </p>
  <p>
    <div>&nbsp;</div>
  </p>
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
