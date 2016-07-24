<?php
if (!isset($_SESSION)) {
	session_start();
}
?>
<?php
$loginFormAction = $_SERVER['PHP_SELF'];
$LoginUserAlias=$_SESSION['MM_Username'];
$MM_fillnextpage="userinex.php";
$MM_redirectLoginFailed="login.php";
if (isset($_SESSION['MM_Username'])) {
	if(isset($_POST['radio'])) {
		$loginUsersex=$_POST['radio'];
		/*
		if($loginUsersex == 'man') {
		} elseif($loginUsersex == 'women') {
		}
		*/
		$loginUserage=$_POST['age'];
		//echo '<script type="text/javascript">"'$CareerValue'"=document.getElementById("occupation").selectedIndex.value</script>';
		/*
		$CareerValue=$_POST['occupation'];
		if($CareerValue == '公务员') {
			$loginUsecareer = 1;
		} elseif($CareerValue == '国企事业单位员工') {
			$loginUsecareer = 2;
		} elseif($CareerValue == '私企外企单位员工') {
			$loginUsecareer = 3;
		} elseif($CareerValue == '私营业主自由职业者') {
			$loginUsecareer = 4;
		} elseif($CareerValue == '待业') {
			$loginUsecareer = 5;
		} elseif($CareerValue == '学生') {
			$loginUsecareer = 6;
		} elseif($CareerValue == '其他') {
			$loginUsecareer = 7;
		} else {
		}
		$Scinsurance=$_POST['shehuibaoxian'];
		if($Scinsurance == '无社保') {
			$loginUserscinsurance = 1;
		} elseif($Scinsurance == '四险（少生育险）') {
			$loginUserscinsurance = 2;
		} elseif($Scinsurance == '三险（少生育险，工伤险）') {
			$loginUserscinsurance = 3;
		} elseif($Scinsurance == '六险（多大额补充医保）') {
			$loginUserscinsurance = 4;
		} elseif($Scinsurance == '个人缴纳社保') {
			$loginUserscinsurance = 5;
		} elseif($Scinsurance == '新农合，农村养老险') {
			$loginUserscinsurance = 6;
		} elseif($Scinsurance == '少儿医保，学生医保') {
			$loginUserscinsurance = 7;
		} else {
		}
		*/
		$loginUsecareer=$_POST['occupation'];
		$loginUserscinsurance=$_POST['shehuibaoxian'];
		require_once "dbaccess.php";
		$LoginRS_already=sprintf("SELECT user_alias FROM user_info WHERE user_alias='%s'",get_magic_quotes_gpc() ? $LoginUserAlias : addslashes($LoginUserAlias)); 
		$LoginRS_already_RS = mysql_query($LoginRS_already);
		$loginFoundUser = mysql_num_rows($LoginRS_already_RS);
		if ($loginFoundUser) {
			$Login_Update="update user_info set user_sex='".$loginUsersex."',user_age='".$loginUserage."',user_career='".$loginUsecareer."',user_sc_insurance='".$loginUserscinsurance."' where user_alias='".$LoginUserAlias."'";
			$LoginRS = mysql_query($Login_Update);
			if(!$LoginRS) {
				echo '<script type="text/javascript">window.alert("数据库更新失败!")</script>';
			}
		} else {
			$Login_user_fill="INSERT INTO user_info (user_alias, user_sex, user_age, user_career, user_sc_insurance) VALUES ";
			if (!get_magic_quotes_gpc())
			{
				addslashes($LoginUserAlias);
				addslashes($loginUsersex);
				addslashes($loginUserage);
				addslashes($loginUsecareer);
				addslashes($loginUserscinsurance);
			}
			$Login_user_fill = $Login_user_fill."('".$LoginUserAlias."','".$loginUsersex."','".$loginUserage."','".$loginUsecareer."','".$loginUserscinsurance."')";
			$LoginRS = mysql_query($Login_user_fill);
			if(!$LoginRS) {
				echo '<script type="text/javascript">window.alert("数据库插入失败!")</script>';
			}
		}
		require_once "dbclose.php";
		//echo '<script type="text/javascript">window.alert("数据"'.$loginUsecareer.'"库插"'.$loginUserscinsurance.'"入失败!")</script>';
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
    <div class="zichanxianzhuang"><a href="#">1.个人信息</a> </div><!--保险规划-->
    <div class="rangjieyugengduo">请花上几分钟填写如下问卷，这将指导理财师更好地为您服务。匿名制保护隐私，您的信息被严格保密。

 </div><!--请花上几分钟填写如下问卷，这将指导理财师更好地为您服务。

匿名制保护隐私，您的信息被严格保密。
-->
<div class="gerenxinxi1">
  <form id="form1" name="form1" method="post" action="">
    <p>性别:男
      <input type="radio" name="radio" id="man" value="man" />
      <label for="man"></label>
      女
      <input type="radio" name="radio" id="women" value="women" />
      <label for="women"></label>
    </p>
    <p>年龄:
      <label for="age"></label>
      <input name="age" type="text" id="age" maxlength="2" pattern="[0-9]*" title="年龄必须大于18岁小于100岁"/>
    </p>
    <p>&nbsp;</p>
    <p>职业:
      <label for="occupation"></label>
      <select name="occupation" id="occupation" onChange="setDemoTextVal(this.selectedIndex].text)">
        <option value="1">公务员</option>
        <option value="2">外企</option>
        <option value="3">国企/事业单位</option>
        <option value="4">待业</option>
        <option value="5">学生</option>
        <option value="6">私营业主</option>
        <option value="7">其他</option>
      </select>
      <br />
      </p>
    <p>&nbsp;</p>
    <p>现居地:
      <label for="address"></label>
      <label for="address"></label>
      <select name="address" id="address">
        <option value="北京市">北京市</option>
        <option value="山东省">山东省</option>
        <option value="湖北省">湖北省</option>
        <option value="湖南省">湖南省</option>
        <option value="河北省">河北省</option>
        <option value="河南省">河南省</option>
      </select>
      <label for="address1"></label>
      <select name="address1" id="address1">
        <option value="海淀区">海淀区</option>
        <option value="朝阳区">朝阳区</option>
      </select>
     
      </p>

       </hr>
       <p>&nbsp;</p>
       <p>你的保险情况:</p>
    <p>&nbsp;</p>
    <p>社会保险
      <label for="shehuibaoxian"></label>
      <select name="shehuibaoxian" id="shehuibaoxian" onChange="setDemoTextVal(this.selectedIndex].text)">
        <option value="1" selected="selected">无社保</option>
        <option value="2">五险（标准）</option>
        <option value="3">四险(少生育险）</option>
        <option value="4">三险（少生育/工伤险）</option>
        <option value="5">六险（多大额补充医保）</option>
        <option value="6">个人缴纳社保</option>
        <option value="7">新农村/农合养老险</option>
        <option value="8">公务员社保（免缴）</option>
        <option value="9">少儿医保/学生医保</option>
      </select>
    </p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p class="inputstyle"> <br />
      <input type="submit" name="button" id="button" value=" " onclick="return validateform(this.from)"/>
    </p>
    <p><br />
    </p>
</div>
<!--个人信息按钮-->
    <!--<div class="xiayizhangzhichufenxi"><a href="userinex.php" onclick="return validateform(this.from)">￥收支情况</a></div>--><!--收支情况-->
    </form>
    </div><!--news-list-->
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
function checkage()
{
	//收入
	if(document.form1.shuihoushouru.value == "") {
		window.alert ("月工资收入不能为空!")
		return false;
	}
}
 
function validateform()
{
	var sex_obj = document.getElementsByName('radio'); 
	var temp_sex = false; 
	for(var i = 0; i < sex_obj.length; i ++){ 
		if(sex_obj[i].checked){ 
			var sex = sex_obj[i].value; 
			temp_sex = true; 
			break; 
		} 
	} 
	if(temp_sex == false){ 
		window.alert('请选择性别'); 
		return false; 
	}
	/*
	if(document.form1.radio.value == "")
	{
		window.alert ("请选择性别!")
		return false;
	}
	*/
	var input_age = document.form1.age.value;
	if(input_age == "")
	{
		window.alert ("年龄不能为空!")
		return false;
	} else {
		if(TestNum(input_age)) {
			window.alert ("年龄请输入正整数!")
			return false; 
		}
		if (input_age < 18 || input_age > 100) {
			window.alert ("年龄必须大于等于18岁小于100岁!")
			return false; 
		}
	}
	if(document.form1.occupation.value == "")
	{
		window.alert ("请选择职业!")
		return false;
	}
	if(document.form1.jvzhudi.value == "" || document.form1.jvzhu2.value == "")
	{
		window.alert ("请选择居住地!")
		return false;
	}
	/*
	if(document.form1.shoujihaoma.value == "")
	{
		window.alert ("手机号码不能为空!")
		return false;
	}
	*/
	if(document.form1.shehuibaoxian.value == "")
	{
		window.alert ("请选择社保类型!")
		return false;
	}

	document.form1.submit()
	return true;
}
-->
</script>
