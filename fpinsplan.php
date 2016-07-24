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
		$LoginRS_sc_ins=sprintf("SELECT user_age,user_sc_insurance FROM user_info WHERE user_id='%s'",get_magic_quotes_gpc() ? $LoginUserID : addslashes($LoginUserID)); 
		$LoginRS_sc_RS = mysql_query($LoginRS_sc_ins);
		if ($LoginRS_sc_RS) {
			$LoginRS_sc_row = mysql_fetch_row($LoginRS_sc_RS);
			$Loginuser_user_age = $LoginRS_sc_row[0];	
			$Loginuser_sc_id = $LoginRS_sc_row[1];	
		} else {
			$is_failed=true;
		}

		if ($is_failed) {
			echo '<script type="text/javascript">window.alert("数据库读取失败!")</script>';
		} else {
			if ($Loginuser_sc_id == 1) {
				$Loginuser_sc_text = "无社保";
			} else if ($Loginuser_sc_id == 1) {
				$Loginuser_sc_text = "四险（少生育险）";
			} else if ($Loginuser_sc_id == 2) {
				$Loginuser_sc_text = "三险（少生育险，工伤险）";
			} else if ($Loginuser_sc_id == 3) {
				$Loginuser_sc_text = "六险（多大额补充医保）";
			} else if ($Loginuser_sc_id == 4) {
				$Loginuser_sc_text = "个人缴纳社保";
			} else if ($Loginuser_sc_id == 5) {
				$Loginuser_sc_text = "新农合，农村养老险";
			} else if ($Loginuser_sc_id == 6) {
				$Loginuser_sc_text = "少儿医保，学生医保";
			} else if ($Loginuser_sc_id == 7) {
			} else {
				$Loginuser_sc_text = "无";
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
    <div class="zichanxianzhuang"><a href="#">4.保险规划</a> </div><!--保险规划-->
    <div class="rangjieyugengduo">保护好您和家人
 </div><!--保护好您和家人-->
  <div class="beizujinjibeiyongjin">
  备足紧急备用金后，我们还需要充分的保障，来帮助个人和家庭抵御一些重大风险，如重大疾病、意外伤害或身故等。当万一遭遇这些突发状况时，保险可以提供有力的现金支援，避免我们和家人陷入财务危机。</br>

一、<strong>购买保险的四大原则</strong></br>
1.<strong>先保障，后投资</strong>：应严格区分保险和投资，避免在基本保障尚未完善前，就错误购买不必要的理财型险种。</br>
2.<strong>先社保，后商业保险</strong>：社保由企业或政府分担缴费，是性价比最高的保险，应优先参保。</br>
3.<strong>先保障生存，后保障生活</strong>：先通过意外险、重疾险和寿险建立基本的生存保障，再购买医疗险、教育保险、商业养老保险等保障生活质量的险种。</br>
4.<strong>先保障大人，后保障小孩</strong>：父母才是孩子最大的保障，应在大人的保障完善后，再考虑小孩。
  </div><!--备足紧急备用金-->
<div class="baoxianjinzita">
<img src="image/baoxianjinzita.jpg" /><!--保险金字塔图片-->
</div><!--保险金字塔-->
<div class="nidebaoxianguihuahejianyi">二、您的保险现状和建议
</div><!--你的保险规划和建议-->
<div class="xingdongjiahuabiaoge">
  <table width="705" border="1" align="center">
    <tr>
      <td width="116" height="30" align="center" bgcolor="#FF0000"><span>被保险人</span></td>
      <td width="100" align="center" bgcolor="#FF0000"><span>优先级</span></td>
      <td width="100" align="center" bgcolor="#FF0000"><span>险种</span></td>
      <td width="199" align="center" bgcolor="#FF0000"><span>保障什么</span></td>
      <td width="190" align="center" bgcolor="#FF0000"><span>现状</span></td>
    </tr>
    <tr>
      <td rowspan="5" align="center">本人<?php echo $Loginuser_user_age ?>岁</td>
      <td height="32" align="center" style="color:#F60">必备</td>
      <td align="center">社保</td>
      <td align="center">基本养老和医疗等</td>
      <td align="center"><?php echo $Loginuser_sc_text ?></td>
    </tr>
    <tr>
      <td height="34" align="center" style="color:#F60">必备</td>
      <td align="center">意外险</td>
      <td align="center">意外伤害给付</td>
      <td align="center">无</td>
    </tr>
    <tr>
      <td height="34" align="center" style="color:#F60">必备</td>
      <td align="center">重疾险</td>
      <td align="center">重大疾病给付</td>
      <td align="center">无</td>
    </tr>
    <tr>
      <td height="34" align="center">可选</td>
      <td align="center">寿险</td>
      <td align="center">主要为身故给付</td>
      <td align="center">无</td>
    </tr>
    <tr>
      <td height="32" align="center">可选</td>
      <td align="center">医疗险</td>
      <td align="center">医疗费用给付</td>
      <td align="center">无</td>
    </tr>
  </table>
</div><!--保险现状表格-->
<div class="xingdongjihua">行动计划</div><!--行动计划-->
<div class="genjvnidecaiwu">根据您的财务和保险现状，我们为您制订行动计划如下：</div><!--根据你的财务-->
<div class="xingdongjiahuabiaoge">
  <table width="660" height="100" border="1" align="center">
    <tr>
      <td width="158" height="28" align="center" bgcolor="#FF0000"><span>被投保人</span></td>
      <td width="181" align="center" bgcolor="#FF0000"><span>险种</span></td>
      <td width="135" align="center" bgcolor="#FF0000"><span>保额</span></td>
      <td width="158" align="center" bgcolor="#FF0000"><span>保费预估</span></td>
    </tr>
    <tr>
      <td align="center">本人</td>
      <td align="center">购买综合意外险</td>
      <td align="center">26万元</td>
      <td align="center">210元/年</td>
    </tr>
    <tr>
      <td align="center">本人</td>
      <td align="center">购买重疾险</td>
      <td align="center">25万元</td>
      <td align="center">2,020元/年</td>
    </tr>
    <tr>
      <td align="center">本人</td>
      <td align="center">购买定期寿险</td>
      <td align="center">17万元</td>
      <td align="center">170元/年</td>
    </tr>
  </table>
</div><!--财务的表格-->
<div class="shuoming"><strong>说明：</strong></br>
<strong>1. 意外险</strong>——推荐购买性价比较高的消费型险种：综合意外险，以较低的保费实现意外致伤、致残、致死的保障，每次购买一年的保障。关于保额，我们按照生命价值法为您准确测算。</br> 
<strong>2. 重疾险</strong>——推荐购买消费型险种：定期重疾险，以较低的保费提供对常规重大疾病的充足保障，但保障年限有限，需日后补充终身重疾险。关于保额，我们按照家庭负担法与生命价值法为您准确测算。</br> 
<strong>3.以上商业保险保费均基于保额、对照各大保险公司当前市价得出；</strong>社保保费基于现行政策得出，各省市可能稍有区别。</br>
<strong>4.对于具体保险产品，牡丹宝理财已为您作出优选，请参见您的行动计划。</strong></div><!--说明-->
    <p>&nbsp;</p>
    <div class="xiayizhangzhichufenxi"><a href="fpriske.php">下一章：风险承受能力及偏好</a></div><!--下一章支出分析-->
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
