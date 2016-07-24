<?php
if (!isset($_SESSION)) {
	session_start();
}
?>
<?php
//$loginFormAction = $_SERVER['PHP_SELF'];
$MM_assetnextpage="userriskev.php";
$MM_redirectLoginFailed="login.php";
if (isset($_SESSION['MM_Username'])) {
	if(isset($_POST['huoqi'])) {
		$loginUserlctt = array();
		//添加的动态目标
		if ($_POST['select_content1'] == "1") {
			$loginUserlctt[0]=$_POST['huobijijinyuebao'] * 10000;
		} else {
			$loginUserlctt[0]="0";
		}
		if ($_POST['select_content2'] == "1") {
			$loginUserlctt[1]=$_POST['hunhejijin'] * 10000;
		} else {
			$loginUserlctt[1]="0";
		}
		if ($_POST['select_content3'] == "1") {
			$loginUserlctt[2]=$_POST['zaiquanjijin'] * 10000;
		} else {
			$loginUserlctt[2]="0";
		}
		if ($_POST['select_content4'] == "1") {
			$loginUserlctt[3]=$_POST['gupiaojijin'] * 10000;
		} else {
			$loginUserlctt[3]="0";
		}
		if ($_POST['select_content5'] == "1") {
			$loginUserlctt[4]=$_POST['zishujijin'] * 10000;
		} else {
			$loginUserlctt[4]="0";
		}
		if ($_POST['select_content6'] == "1") {
			$loginUserlctt[5]=$_POST['qitajijin'] * 10000;
		} else {
			$loginUserlctt[5]="0";
		}
		if ($_POST['select_content7'] == "1") {
			$loginUserlctt[6]=$_POST['yinhanglicaichanpin'] * 10000;
		} else {
			$loginUserlctt[6]="0";
		}
		if ($_POST['select_content8'] == "1") {
			$loginUserlctt[7]=$_POST['gupiao'] * 10000;
		} else {
			$loginUserlctt[7]="0";
		}
		if ($_POST['select_content9'] == "1") {
			$loginUserlctt[8]=$_POST['guozai'] * 10000;
		} else {
			$loginUserlctt[8]="0";
		}
		if ($_POST['select_content10'] == "1") {
			$loginUserlctt[9]=$_POST['ptwop'] * 10000;
		} else {
			$loginUserlctt[9]="0";
		}
		if ($_POST['select_content11'] == "1") {
			$loginUserlctt[10]=$_POST['guijinshu'] * 10000;
		} else {
			$loginUserlctt[10]="0";
		}
		if ($_POST['select_content12'] == "1") {
			$loginUserlctt[11]=$_POST['chuxulingbaoxian'] * 10000;
		} else {
			$loginUserlctt[11]="0";
		}
		if ($_POST['select_content13'] == "1") {
			$loginUserlctt[12]=$_POST['qitajinrong'] * 10000;
		} else {
			$loginUserlctt[12]="0";
		}

		//现金资产
		$loginUsermoney=$_POST['huoqi'] * 10000;
		$loginUserfxmoney=$_POST['dingqi']  * 10000;
		//实物资产
		$loginUsercar=$_POST['car']  * 10000;
		$loginUserhouse=$_POST['fangchan'] * 10000;
		$loginUsecollection=$_POST['shoucangpin'] * 10000;
		$loginUserotherat=$_POST['qita'] * 10000;
		//负债
		$loginUserrent=$_POST['weihuandaikuan'] * 10000;
		$loginUsercreditrent=$_POST['xinyongka'] * 10000;
		
		$LoginUserID=$_SESSION['MM_UserID'];
		require_once "dbaccess.php";
		//处理现金的数据表
		$LoginRS_money=sprintf("SELECT user_id FROM user_money_t WHERE user_id ='%s'",get_magic_quotes_gpc() ? $LoginUserID : addslashes($LoginUserID)); 
		$LoginRS_money_RS = mysql_query($LoginRS_money);
		$loginFoundmoney = mysql_num_rows($LoginRS_money_RS);
		if ($loginFoundmoney) {
			$Login_money_Update="update user_money_t set money_current='".$loginUsermoney."',money_fixed='".$loginUserfxmoney."' where user_id='".$LoginUserID."'";
			$LoginUpdatemon = mysql_query($Login_money_Update);
			if(!$LoginUpdatemon) {
				echo '<script type="text/javascript">window.alert("数据库更新失败!")</script>';
			}
		} else {
			$Login_mon_fill="INSERT INTO user_money_t (user_id, money_current, money_fixed) VALUES ";
			if (!get_magic_quotes_gpc())
			{
				addslashes($LoginUserID);
				addslashes($loginUsermoney);
				addslashes($loginUserfxmoney);
			}
			$Login_mon_fill = $Login_mon_fill."('".$LoginUserID."','".$loginUsermoney."','".$loginUserfxmoney."')";
			$Loginmonfill = mysql_query($Login_mon_fill);
			if(!$Loginmonfill) {
				echo '<script type="text/javascript">window.alert("数据库插入失败!")</script>';
			}
		}

		//处理实物资产的数据表
		$LoginRS_assent=sprintf("SELECT user_id FROM user_realasset_t WHERE user_id ='%s'",get_magic_quotes_gpc() ? $LoginUserID : addslashes($LoginUserID)); 
		$LoginRS_assent_RS = mysql_query($LoginRS_assent);
		$loginFoundassent = mysql_num_rows($LoginRS_assent_RS);
		if ($loginFoundassent) {
			$Login_assent_Update="update user_realasset_t set asset_car='".$loginUsercar."',asset_house='".$loginUserhouse."',asset_collection='".$loginUsecollection."',asset_other='".$loginUserotherat."' where user_id='".$LoginUserID."'";
			$LoginUpdateass = mysql_query($Login_assent_Update);
			if(!$LoginUpdateass) {
				echo '<script type="text/javascript">window.alert("数据库更新失败!")</script>';
			}
		} else {
			$Login_assent_fill="INSERT INTO user_realasset_t (user_id, asset_car, asset_house, asset_collection, asset_other) VALUES ";
			if (!get_magic_quotes_gpc())
			{
				addslashes($LoginUserID);
				addslashes($loginUsercar);
				addslashes($loginUserhouse);
				addslashes($loginUsecollection);
				addslashes($loginUserotherat);
			}
			$Login_assent_fill = $Login_assent_fill."('".$LoginUserID."','".$loginUsercar."','".$loginUserhouse."','".$loginUsecollection."','".$loginUserotherat."')";
			$Loginfillas = mysql_query($Login_assent_fill);
			if(!$Loginfillas) {
				echo '<script type="text/javascript">window.alert("数据库插入失败!")</script>';
			}
		}

		//处理负债资产的数据表
		$LoginRS_rent=sprintf("SELECT user_id FROM user_debt_t WHERE user_id ='%s'",get_magic_quotes_gpc() ? $LoginUserID : addslashes($LoginUserID)); 
		$LoginRS_rent_RS = mysql_query($LoginRS_rent);
		$loginFoundrent = mysql_num_rows($LoginRS_rent_RS);
		if ($loginFoundrent) {
			$Login_rent_Update="update user_debt_t set debt_money='".$loginUserrent."',debt_credit='".$loginUsercreditrent."' where user_id='".$LoginUserID."'";
			$LoginUpdaterent = mysql_query($Login_rent_Update);
			if(!$LoginUpdaterent) {
				echo '<script type="text/javascript">window.alert("数据库更新失败!")</script>';
			}
		} else {
			$Login_ren_fill="INSERT INTO user_debt_t (user_id, debt_money, debt_credit) VALUES ";
			if (!get_magic_quotes_gpc())
			{
				addslashes($LoginUserID);
				addslashes($loginUserrent);
				addslashes($loginUsercreditrent);
			}
			$Login_ren_fill = $Login_ren_fill."('".$LoginUserID."','".$loginUserrent."','".$loginUsercreditrent."')";
			$Loginrenfill = mysql_query($Login_ren_fill);
			if(!$Loginrenfill) {
				echo '<script type="text/javascript">window.alert("数据库插入失败!")</script>';
			}
		}
		
		//处理基金的数据表
		$LoginRS_found=sprintf("SELECT user_id FROM user_foundation_t WHERE user_id ='%s'",get_magic_quotes_gpc() ? $LoginUserID : addslashes($LoginUserID)); 
		$LoginRS_found_RS = mysql_query($LoginRS_found);
		$loginFoundfound = mysql_num_rows($LoginRS_found_RS);
		if ($loginFoundfound) {
			$Login_found_Update="update user_foundation_t set found_money='".$loginUserlctt[0]."',found_mix='".$loginUserlctt[1]."',found_bond='".$loginUserlctt[2]."',found_stock='".$loginUserlctt[3]."',found_index='".$loginUserlctt[4]."',found_other='".$loginUserlctt[5]."' where user_id='".$LoginUserID."'";
			$LoginUpdatefound = mysql_query($Login_found_Update);
			if(!$LoginUpdatefound) {
				echo '<script type="text/javascript">window.alert("数据库更新失败!")</script>';
			}
		} else {
			$Login_found_fill="INSERT INTO user_foundation_t (user_id, found_money, found_mix, found_bond, found_stock, found_index, found_other) VALUES ";
			if (!get_magic_quotes_gpc())
			{
				addslashes($LoginUserID);
				addslashes($loginUserlctt[0]);
				addslashes($loginUserlctt[1]);
				addslashes($loginUserlctt[2]);
				addslashes($loginUserlctt[3]);
				addslashes($loginUserlctt[4]);
				addslashes($loginUserlctt[5]);
			}
			$Login_found_fill = $Login_found_fill."('".$LoginUserID."','".$loginUserlctt[0]."','".$loginUserlctt[1]."','".$loginUserlctt[2]."','".$loginUserlctt[3]."','".$loginUserlctt[4]."','".$loginUserlctt[5]."')";
			$Loginfoundfill = mysql_query($Login_found_fill);
			if(!$Loginfoundfill) {
				echo '<script type="text/javascript">window.alert("数据库插入失败!")</script>';
			}
		}
		
		//处理基金的数据表
		$LoginRS_final=sprintf("SELECT user_id FROM user_financial_t WHERE user_id ='%s'",get_magic_quotes_gpc() ? $LoginUserID : addslashes($LoginUserID)); 
		$LoginRS_final_RS = mysql_query($LoginRS_final);
		$loginFoundfinal = mysql_num_rows($LoginRS_final_RS);
		if ($loginFoundfinal) {
			$Login_final_Update="update user_financial_t set financial_blank='".$loginUserlctt[6]."',financial_stock='".$loginUserlctt[7]."',financial_g_loan='".$loginUserlctt[8]."',financial_p2p='".$loginUserlctt[9]."',financial_metal='".$loginUserlctt[10]."',financial_insurance='".$loginUserlctt[11]."',financial_other='".$loginUserlctt[12]."' where user_id='".$LoginUserID."'";
			$LoginUpdatefinal = mysql_query($Login_final_Update);
			if(!$LoginUpdatefinal) {
				echo '<script type="text/javascript">window.alert("数据库更新失败!")</script>';
			}
		} else {
			$Login_final_fill="INSERT INTO user_financial_t (user_id, financial_blank, financial_stock, financial_g_loan, financial_p2p, financial_metal, financial_insurance, financial_other) VALUES ";
			if (!get_magic_quotes_gpc())
			{
				addslashes($LoginUserID);
				addslashes($loginUserlctt[6]);
				addslashes($loginUserlctt[7]);
				addslashes($loginUserlctt[8]);
				addslashes($loginUserlctt[9]);
				addslashes($loginUserlctt[10]);
				addslashes($loginUserlctt[11]);
				addslashes($loginUserlctt[12]);
			}
			$Login_final_fill = $Login_final_fill."('".$LoginUserID."','".$loginUserlctt[6]."','".$loginUserlctt[7]."','".$loginUserlctt[8]."','".$loginUserlctt[9]."','".$loginUserlctt[10]."','".$loginUserlctt[11]."','".$loginUserlctt[12]."')";
			$Loginfoundfinal = mysql_query($Login_final_fill);
			if(!$Loginfoundfinal) {
				echo '<script type="text/javascript">window.alert("数据库插入失败!")</script>';
			}
		}
		require_once "dbclose.php";
		//echo '<script type="text/javascript">window.alert("数据"'.$loginUsecareer.'"库插"'.$loginUserscinsurance.'"入失败!")</script>';
		//echo '<script type="text/javascript">window.alert("数据"'.$LoginUserID.'"库插入失败!")</script>';
		echo '<script type="text/javascript">window.location.href="'.$MM_assetnextpage.'"</script>';	
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
    <div class="zichanxianzhuang"><a href="#">3.资产详情</a> </div><!--保险规划-->
    <div class="rangjieyugengduo">请您认真填写资产详情，以便理财师为你制定更加合理的理财计划。  
       </div><!--您的现金类资产。
-->
<div class="gerenxinxi2">
<form id="form1" name="form1" method="post" action="">
<div class="nideshuihoushouru">
  <p>您的现金类资产:
    </div><!--您的基金类资产-->
  </p>
<div class="huoqicunkuanbiaodan">
        <p class="pstyle"><div class="foundlabel">活期存款:</div>
          <label for="huoqi"></label>
          <input type="text" name="huoqi" id="huoqi" value="0" style="color:#999999" onFocus="if (this.value==defaultValue){this.value ='';this.style.color='#000000'}" onBlur="if(!value){value=defaultValue;this.style.color='#999999'}"/>万元</p>
        <p>&nbsp;</p>
        <p class="pstyle"><div class="foundlabel">定期存款:</div>
          <label for="dingqi"></label>
          <input type="text" name="dingqi" id="dingqi" value="0" style="color:#999999" onFocus="if (this.value==defaultValue){this.value ='';this.style.color='#000000'}" onBlur="if(!value){value=defaultValue;this.style.color='#999999'}"/>万元</p>
</div><!--活期存款-->
<div class="nideshuihoushouru">
  <p>您的基金类资产:
    </div><!--您的基金类资产-->
  </p>
<div>
	  <!-- 自动添加选项 -->
	  <p class="licaijijin">
	  <a id='menuLink1' name='menuLink1' href="javascript:check_item1();"  onclick="chg(this);" value=0 >货币基金/余额宝</a>
	  <a id='menuLink2' name='menuLink2' href="javascript:check_item2();" onclick="chg(this);" value=0>混合型基金</a>
	  <a id='menuLink3' href="javascript:check_item3();" onclick="chg(this);" value=0>债券型基金</a>
	  <a id='menuLink4' href="javascript:check_item4();" onclick="chg(this);" value=0>股票型基金</a>
	  <a id='menuLink5' href="javascript:check_item5();" onclick="chg(this);" value=0>指数基金</a>
	  <a id='menuLink6' href="javascript:check_item6();" onclick="chg(this);" value=0>其他基金</a>
	  </p>
	  <!-- 第一项:menu1-->
	  <div id='menu1' style='display:none;'>
	      <p class="pstyle"><a id='menuLink1' class="addfound" >货币基金/余额宝:</a>
	      <label for="huobijijinyuebao"></label>
	      <input type="text" name="huobijijinyuebao" id="huobijijinyuebao" value="0" style="color:#999999" onFocus="if (this.value==defaultValue){this.value ='';this.style.color='#000000'}" onBlur="if(!value){value=defaultValue;this.style.color='#999999'}"/>万元
	      <input type="hidden" id="select_content1" name="select_content1" value="0"/></p>
      </div>
	  <!-- 第二项:menu2-->
	  <div id='menu2' style='display:none;'>
	      <p class="pstyle"><a id='menuLink2' class="addfound" >混合型基金:</a>
	      <label for="hunhejijin"></label>
	      <input type="text" name="hunhejijin" id="hunhejijin" value="0" style="color:#999999" onFocus="if (this.value==defaultValue){this.value ='';this.style.color='#000000'}" onBlur="if(!value){value=defaultValue;this.style.color='#999999'}"/>万元
	      <input type="hidden" id="select_content2" name="select_content2" value="0"/></p>
      </div>
	  <!-- 第三项:menu3-->
	  <div id='menu3' style='display:none;'>
	      <p class="pstyle"><a id='menuLink3' class="addfound" >债券型基金:</a>
	      <label for="zaiquanjijin"></label>
	      <input type="text" name="zaiquanjijin" id="zaiquanjijin" value="0" style="color:#999999" onFocus="if (this.value==defaultValue){this.value ='';this.style.color='#000000'}" onBlur="if(!value){value=defaultValue;this.style.color='#999999'}"/>万元
	      <input type="hidden" id="select_content3" name="select_content3" value="0"/></p>
      </div>
	  <!-- 第四项:menu4-->
	  <div id='menu4' style='display:none;'>
	      <p class="pstyle"><a id='menuLink4' class="addfound" >股票型基金:</a>
	      <label for="gupiaojijin"></label>
	      <input type="text" name="gupiaojijin" id="gupiaojijin" value="0" style="color:#999999" onFocus="if (this.value==defaultValue){this.value ='';this.style.color='#000000'}" onBlur="if(!value){value=defaultValue;this.style.color='#999999'}"/>万元
	      <input type="hidden" id="select_content4" name="select_content4" value="0"/></p>
      </div>
	  <!-- 第五项:menu5-->
	  <div id='menu5' style='display:none;'>
	      <p class="pstyle"><a id='menuLink5' class="addfound" >指数基金:</a>
	      <label for="zishujijin"></label>
	      <input type="text" name="zishujijin" id="zishujijin" value="0" style="color:#999999" onFocus="if (this.value==defaultValue){this.value ='';this.style.color='#000000'}" onBlur="if(!value){value=defaultValue;this.style.color='#999999'}"/>万元
	      <input type="hidden" id="select_content5" name="select_content5" value="0"/></p>
      </div>
	  <!-- 第六项:menu6-->
	  <div id='menu6' style='display:none;'>
	      <p class="pstyle"><a id='menuLink6' class="addfound" >其他基金:</a>
	      <label for="qitajijin"></label>
	      <input type="text" name="qitajijin" id="qitajijin" value="0" style="color:#999999" onFocus="if (this.value==defaultValue){this.value ='';this.style.color='#000000'}" onBlur="if(!value){value=defaultValue;this.style.color='#999999'}"/>万元
	      <input type="hidden" id="select_content6" name="select_content6" value="0"/></p>
      </div>
</div> <!--您的基金类资产表单 -->  
<div class="qitajinrongzichan">您的其他金融资产:</div><!--其他金融资产-->
<div>
	  <!-- 自动添加选项 -->
	  <p class="licaijijin">
	  <a id='menuLink7' href="javascript:check_item7();" onclick="chg(this);" value=0 >银行理财产品</a>
	  <a id='menuLink8' href="javascript:check_item8();" onclick="chg(this);" value=0>股票</a>
	  <a id='menuLink9' href="javascript:check_item9();" onclick="chg(this);" value=0>国债</a>
	  <a id='menuLink10' href="javascript:check_item10();" onclick="chg(this);" value=0>P2P网贷</a>
	  <a id='menuLink11' href="javascript:check_item11();" onclick="chg(this);" value=0>贵金属</a>
	  <a id='menuLink12' href="javascript:check_item12();" onclick="chg(this);" value=0>储蓄型保险</a>
	  <a id='menuLink13' href="javascript:check_item13();" onclick="chg(this);" value=0>其他</a>
	  </p>
	  <!-- 第7项:menu7-->
	  <div id='menu7' style='display:none;'>
	      <p class="pstyle"><a id='menuLink7' class="addfound" >银行理财产品:</a>
	      <label for="yinhanglicaichanpin"></label>
	      <input type="text" name="yinhanglicaichanpin" id="yinhanglicaichanpin"  value="0" style="color:#999999" onFocus="if (this.value==defaultValue){this.value ='';this.style.color='#000000'}" onBlur="if(!value){value=defaultValue;this.style.color='#999999'}"/>万元
	      <input type="hidden" id="select_content7" name="select_content7" value="0"/></p>
      </div>
	  <!-- 第8项:menu8-->
	  <div id='menu8' style='display:none;'>
	      <p class="pstyle"><a id='menuLink8' class="addfound" >股票:</a>
	      <label for="gupiao"></label>
	      <input type="text" name="gupiao" id="gupiao"  value="0" style="color:#999999" onFocus="if (this.value==defaultValue){this.value ='';this.style.color='#000000'}" onBlur="if(!value){value=defaultValue;this.style.color='#999999'}"/>万元
	      <input type="hidden" id="select_content8" name="select_content8" value="0"/></p>
      </div>
	  <!-- 第三项:menu9-->
	  <div id='menu9' style='display:none;'>
	      <p class="pstyle"><a id='menuLink9' class="addfound" >国债:</a>
	      <label for="guozai"></label>
	      <input type="text" name="guozai" id="guozai"  value="0" style="color:#999999" onFocus="if (this.value==defaultValue){this.value ='';this.style.color='#000000'}" onBlur="if(!value){value=defaultValue;this.style.color='#999999'}"/>万元
	      <input type="hidden" id="select_content9" name="select_content9" value="0"/></p>
      </div>
	  <!-- 第10项:menu10-->
	  <div id='menu10' style='display:none;'>
	      <p class="pstyle"><a id='menuLink10' class="addfound" >P2P网贷:</a>
	      <label for="ptwop"></label>
	      <input type="text" name="ptwop" id="ptwop"  value="0" style="color:#999999" onFocus="if (this.value==defaultValue){this.value ='';this.style.color='#000000'}" onBlur="if(!value){value=defaultValue;this.style.color='#999999'}"/>万元
	      <input type="hidden" id="select_content10" name="select_content10" value="0"/></p>
      </div>
	  <!-- 第11项:menu11-->
	  <div id='menu11' style='display:none;'>
	      <p class="pstyle"><a id='menuLink11' class="addfound" >贵金属:</a>
	      <label for="guijinshu"></label>
	      <input type="text" name="guijinshu" id="guijinshu"  value="0" style="color:#999999" onFocus="if (this.value==defaultValue){this.value ='';this.style.color='#000000'}" onBlur="if(!value){value=defaultValue;this.style.color='#999999'}"/>万元
	      <input type="hidden" id="select_content11" name="select_content11" value="0"/></p>
      </div>
	  <!-- 第12项:menu12-->
	  <div id='menu12' style='display:none;'>
	      <p class="pstyle"><a id='menuLink12' class="addfound" >储蓄型保险:</a>
	      <label for="chuxulingbaoxian"></label>
	      <input type="text" name="chuxulingbaoxian" id="chuxulingbaoxian"  value="0" style="color:#999999" onFocus="if (this.value==defaultValue){this.value ='';this.style.color='#000000'}" onBlur="if(!value){value=defaultValue;this.style.color='#999999'}"/>万元
	      <input type="hidden" id="select_content12" name="select_content12" value="0"/></p>
      </div>
	  <!-- 第13项:menu13-->
	  <div id='menu13' style='display:none;'>
	      <p class="pstyle"><a id='menuLink13' class="addfound" >其他金融资产:</a>
	      <label for="qitajinrong"></label>
	      <input type="text" name="qitajinrong" id="qitajinrong"  value="0" style="color:#999999" onFocus="if (this.value==defaultValue){this.value ='';this.style.color='#000000'}" onBlur="if(!value){value=defaultValue;this.style.color='#999999'}"/>万元
	      <input type="hidden" id="select_content13" name="select_content13" value="0"/></p>
      </div>
</div><!--银行理财  -->
<div class="shiwuzichan">实物资产:</div>
<!--实物资产-->
<div class="fangchan">
    <p><div class="foundlabel">房产:</div>
      <label for="fangchan"></label>
      <input type="text" name="fangchan" id="fangchan" value="0" style="color:#999999" onFocus="if (this.value==defaultValue){this.value ='';this.style.color='#000000'}" onBlur="if(!value){value=defaultValue;this.style.color='#999999'}"/>万元</p>
    <p><div class="foundlabel">汽车:</div>
      <label for="car"></label>
      <input type="text" name="car" id="car" value="0" style="color:#999999" onFocus="if (this.value==defaultValue){this.value ='';this.style.color='#000000'}" onBlur="if(!value){value=defaultValue;this.style.color='#999999'}"/>万元</p>
    <p><div class="foundlabel">收藏品:</div>
      <label for="shoucangpin"></label>
      <input type="text" name="shoucangpin" id="shoucangpin" value="0" style="color:#999999" onFocus="if (this.value==defaultValue){this.value ='';this.style.color='#000000'}" onBlur="if(!value){value=defaultValue;this.style.color='#999999'}"/>万元</p>
    <p><div class="foundlabel">其他资产:</div>
      <label for="qita"></label>
      <input type="text" name="qita2" id="qita" value="0" style="color:#999999" onFocus="if (this.value==defaultValue){this.value ='';this.style.color='#000000'}" onBlur="if(!value){value=defaultValue;this.style.color='#999999'}"/>万元</p>
</div>
<!--房产-->
<div class="nidefuzhai">您的负债:</div><!--您的负债-->
<div class="fuzhai">
    <p><div class="foundlabel">未还贷款:</div>
      <label for="weihuandaikuan"></label>
      <input type="text" name="weihuandaikuan" id="weihuandaikuan" value="0" style="color:#999999" onFocus="if (this.value==defaultValue){this.value ='';this.style.color='#000000'}" onBlur="if(!value){value=defaultValue;this.style.color='#999999'}"/>万元</p>
    <p><div class="foundlabel">消费贷款:</div>
      <label for="xinyongka"></label>
      <input type="text" name="xinyongka" id="xinyongka" value="0" style="color:#999999" onFocus="if (this.value==defaultValue){this.value ='';this.style.color='#000000'}" onBlur="if(!value){value=defaultValue;this.style.color='#999999'}"/>万元</p>
</div>
<!--负债表单-->
<div>
    <p class="inputstyle"><br />
      <input type="submit" name="button" id="button" value=" " onclick="return validateform(this.from)"/>
    </p>
    <p><br />
    </p>
</div>
  </form>
  </div><!--gerenxinxi2结束-->
	  <!--           
    <div class="xiayizhangzhichufenxi"><a href="zichanxiangqing.html" onclick="return validateform(this.from)">￥资产详情</a></div>--><!--资产详情-->
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
	if(document.form1.huoqi.value == "") {
		window.alert ("现金及活期存款不能为空,没有请填0!")
		return false;
	} else {
		 if(TestNum(document.form1.huoqi.value)) {
			window.alert ("现金及活期存款请输入正整数!")
			return false; 
		}
	}
	if(document.form1.dingqi.value == "") {
		window.alert ("定期存款不能为空,没有请填0!")
		return false;
	} else {
		 if(TestNum(document.form1.dingqi.value)) {
			window.alert ("定期存款请输入正整数!")
			return false; 
		}
	}
	if(document.form1.car.value == "") {
		window.alert ("汽车资产不能为空,没有请填0!")
		return false;
	} else {
		 if(TestNum(document.form1.car.value)) {
			window.alert ("汽车资产请输入正整数!")
			return false; 
		}
	}
	if(document.form1.fangchan.value == "") {
		window.alert ("房产资产不能为空,没有请填0!")
		return false;
	} else {
		 if(TestNum(document.form1.fangchan.value)) {
			window.alert ("房产资产请输入正整数!")
			return false; 
		}
	}
	if(document.form1.shoucangpin.value == "") {
		window.alert ("收藏品资产不能为空,没有请填0!")
		return false;
	} else {
		 if(TestNum(document.form1.shoucangpin.value)) {
			window.alert ("收藏品资产请输入正整数!")
			return false; 
		}
	}
	if(document.form1.qita.value == "") {
		window.alert ("其他资产不能为空,没有请填0!")
		return false;
	} else {
		 if(TestNum(document.form1.qita.value)) {
			window.alert ("其他资产请输入正整数!")
			return false; 
		}
	}
	if(document.form1.weihuandaikuan.value == "") {
		window.alert ("未还贷款不能为空,没有请填0!")
		return false;
	} else {
		 if(TestNum(document.form1.weihuandaikuan.value)) {
			window.alert ("未还贷款请输入正整数!")
			return false; 
		}
	}
	if(document.form1.xinyongka.value == "") {
		window.alert ("信用卡/消费贷款不能为空,没有请填0!")
		return false;
	} else {
		 if(TestNum(document.form1.xinyongka.value)) {
			window.alert ("信用卡/消费贷款请输入正整数!")
			return false; 
		}
	}
	if(document.form1.select_content1.value == "1") {
		if(document.form1.huobijijinyuebao.value == "") {
			window.alert ("货币基金/余额宝不能为空!")
			return false;
		} else {
			if(TestNum(document.form1.huobijijinyuebao.value)) {
				window.alert ("货币基金/余额宝请输入正整数!")
				return false; 
			}
		}
	}
	if(document.form1.select_content2.value == "1") {
		if(document.form1.hunhejijin.value == "") {
			window.alert ("混合型基金不能为空!")
			return false;
		} else {
			if(TestNum(document.form1.hunhejijin.value)) {
				window.alert ("混合型基金请输入正整数!")
				return false; 
			}
		}
	}
	if(document.form1.select_content3.value == "1") {
		if(document.form1.zaiquanjijin.value == "") {
			window.alert ("债券型基金不能为空!")
			return false;
		} else {
			if(TestNum(document.form1.zaiquanjijin.value)) {
				window.alert ("债券型基金请输入正整数!")
				return false; 
			}
		}
	}
	if(document.form1.select_content4.value == "1") {
		if(document.form1.gupiaojijin.value == "") {
			window.alert ("股票型基金不能为空!")
			return false;
		} else {
			if(TestNum(document.form1.gupiaojijin.value)) {
				window.alert ("股票型基金请输入正整数!")
				return false; 
			}
		}
	}
	if(document.form1.select_content5.value == "1") {
		if(document.form1.zishujijin.value == "") {
			window.alert ("指数基金不能为空!")
			return false;
		} else {
			if(TestNum(document.form1.zishujijin.value)) {
				window.alert ("指数基金请输入正整数!")
				return false; 
			}
		}
	}
	if(document.form1.select_content6.value == "1") {
		if(document.form1.qitajijin.value == "") {
			window.alert ("其他基金不能为空!")
			return false;
		} else {
			if(TestNum(document.form1.qitajijin.value)) {
				window.alert ("其他基金请输入正整数!")
				return false; 
			}
		}
	}
	if(document.form1.select_content7.value == "1") {
		if(document.form1.yinhanglicaichanpin.value == "") {
			window.alert ("银行理财产品不能为空!")
			return false;
		} else {
			if(TestNum(document.form1.yinhanglicaichanpin.value)) {
				window.alert ("银行理财产品请输入正整数!")
				return false; 
			}
		}
	}
	if(document.form1.select_content8.value == "1") {
		if(document.form1.gupiao.value == "") {
			window.alert ("股票不能为空!")
			return false;
		} else {
			if(TestNum(document.form1.gupiao.value)) {
				window.alert ("股票请输入正整数!")
				return false; 
			}
		}
	}
	if(document.form1.select_content9.value == "1") {
		if(document.form1.guozai.value == "") {
			window.alert ("国债不能为空!")
			return false;
		} else {
			if(TestNum(document.form1.guozai.value)) {
				window.alert ("国债请输入正整数!")
				return false; 
			}
		}
	}
	if(document.form1.select_content10.value == "1") {
		if(document.form1.ptwop.value == "") {
			window.alert ("P2P网贷不能为空!")
			return false;
		} else {
			if(TestNum(document.form1.ptwop.value)) {
				window.alert ("P2P网贷请输入正整数!")
				return false; 
			}
		}
	}
	if(document.form1.select_content11.value == "1") {
		if(document.form1.guijinshu.value == "") {
			window.alert ("贵金属不能为空!")
			return false;
		} else {
			if(TestNum(document.form1.guijinshu.value)) {
				window.alert ("贵金属请输入正整数!")
				return false; 
			}
		}
	}
	if(document.form1.select_content12.value == "1") {
		if(document.form1.chuxulingbaoxian.value == "") {
			window.alert ("储蓄型保险不能为空!")
			return false;
		} else {
			if(TestNum(document.form1.chuxulingbaoxian.value)) {
				window.alert ("储蓄型保险请输入正整数!")
				return false; 
			}
		}
	}
	if(document.form1.select_content13.value == "1") {
		if(document.form1.qitajinrong.value == "") {
			window.alert ("其他不能为空!")
			return false;
		} else {
			if(TestNum(document.form1.qitajinrong.value)) {
				window.alert ("其他请输入正整数!")
				return false; 
			}
		}
	}
	
	document.form1.submit()
	return true;
}
function chg(obj){
	if(obj.value){ 
		obj.style.color = '#A01818';
		obj.style.backgroundColor = "#FFF";
		obj.value = 0;
	} else { 
		obj.value = 1;
		obj.style.backgroundColor = "#A01818";
		obj.style.color = '#FFF';
	}
	return true;
}
mlink1 = 0;
mlink2 = 0;
mlink3 = 0;
mlink4 = 0;
mlink5 = 0;
mlink6 = 0;
mlink7 = 0;
mlink8 = 0;
mlink9 = 0;
mlink10 = 0;
mlink11 = 0;
mlink12 = 0;
mlink13 = 0;
function check_item1() {
	if (mlink1 == 0) {
		mlink1 = 1;
		document.getElementById('select_content1').value = "1";
		display('menu1')
	} else {
		mlink1 = 0;
		document.getElementById('select_content1').value = "0";
		display('menu1')
	}
}
function check_item2() {
	if (mlink2 == 0) {
		mlink2 = 1;
		document.getElementById('select_content2').value = "1";
		display('menu2')
	} else {
		mlink2 = 0;
		document.getElementById('select_content2').value = "0";
		display('menu2')
	}
}
function check_item3() {
	if (mlink3 == 0) {
		mlink3 = 1;
		document.getElementById('select_content3').value = "1";
		display('menu3')
	} else {
		mlink3 = 0;
		document.getElementById('select_content3').value = "0";
		display('menu3')
	}
}
function check_item4() {
	if (mlink4 == 0) {
		mlink4 = 1;
		document.getElementById('select_content4').value = "1";
		display('menu4')
	} else {
		mlink4 = 0;
		document.getElementById('select_content4').value = "0";
		display('menu4')
	}
}
function check_item5() {
	if (mlink5 == 0) {
		mlink5 = 1;
		document.getElementById('select_content5').value = "1";
		display('menu5')
	} else {
		mlink5 = 0;
		document.getElementById('select_content5').value = "0";
		display('menu5')
	}
}
function check_item6() {
	if (mlink6 == 0) {
		mlink6 = 1;
		document.getElementById('select_content6').value = "1";
		display('menu6')
	} else {
		mlink6 = 0;
		document.getElementById('select_content6').value = "0";
		display('menu6')
	}
}
function check_item7() {
	if (mlink7 == 0) {
		mlink7 = 1;
		document.getElementById('select_content7').value = "1";
		display('menu7')
	} else {
		mlink7 = 0;
		document.getElementById('select_content7').value = "0";
		display('menu7')
	}
}
function check_item8() {
	if (mlink8 == 0) {
		mlink8 = 1;
		document.getElementById('select_content8').value = "1";
		display('menu8')
	} else {
		mlink8 = 0;
		document.getElementById('select_content8').value = "0";
		display('menu8')
	}
}
function check_item9() {
	if (mlink9 == 0) {
		mlink9 = 1;
		document.getElementById('select_content9').value = "1";
		display('menu9')
	} else {
		mlink9 = 0;
		document.getElementById('select_content9').value = "0";
		display('menu9')
	}
}
function check_item10() {
	if (mlink10 == 0) {
		mlink10 = 1;
		document.getElementById('select_content10').value = "1";
		display('menu10')
	} else {
		mlink10 = 0;
		document.getElementById('select_content10').value = "0";
		display('menu10')
	}
}
function check_item11() {
	if (mlink11 == 0) {
		mlink11 = 1;
		document.getElementById('select_content11').value = "1";
		display('menu11')
	} else {
		mlink11 = 0;
		document.getElementById('select_content11').value = "0";
		display('menu11')
	}
}
function check_item12() {
	if (mlink12 == 0) {
		mlink12 = 1;
		document.getElementById('select_content12').value = "1";
		display('menu12')
	} else {
		mlink12 = 0;
		document.getElementById('select_content12').value = "0";
		display('menu12')
	}
}
function check_item13() {
	if (mlink13 == 0) {
		mlink13 = 1;
		document.getElementById('select_content13').value = "1";
		display('menu13')
	} else {
		mlink13 = 0;
		document.getElementById('select_content13').value = "0";
		display('menu13')
	}
} 
function display(id) {
	var e = document.getElementById(id);
	if (e.style.display == 'block') {
		e.style.display = 'none';
	} else {
		e.style.display = 'block';
	}
}
-->
</script>
