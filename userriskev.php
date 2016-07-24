<?php
if (!isset($_SESSION)) {
	session_start();
}
?>
<?php
$MM_fillnextpage="jump.php";
if(isset($_POST['duoshaoyuan'])) {
	$loginUserlct = array();
	$loginUserlctm = array();
	$loginUserlcty = array();
	//理财目标
	$loginUserlct[0]=$_POST['lixiangmubiao'];
	$loginUserlctm[0]=$_POST['duoshaoyuan'];
	$loginUserlcty[0]=$_POST['jihua'];
	//添加的第一个理财目标
	$loginUserlctse=$_POST['select_content'];
	if ($loginUserlctse == "1") {
		$loginUserlct[1]=$_POST['lixiangmubiao1'];
		$loginUserlctm[1]=$_POST['duoshaoyuan1'];
		$loginUserlcty[1]=$_POST['jihua1'];
	} else {
		$loginUserlct[1]="0";
		$loginUserlctm[1]="0";
		$loginUserlcty[1]="0";
	}
	//添加的第二个理财目标
	$loginUserlctse1=$_POST['select_content1'];
	if ($loginUserlctse1 == "1") {
		$loginUserlct[2]=$_POST['lixiangmubiao2'];
		$loginUserlctm[2]=$_POST['duoshaoyuan2'];
		$loginUserlcty[2]=$_POST['jihua2'];
	} else {
		$loginUserlct[2]="0";
		$loginUserlctm[2]="0";
		$loginUserlcty[2]="0";
	}

	$LoginUserID=$_SESSION['MM_UserID'];
	require_once "dbaccess.php";
	//理财目标数据表
	//删除多余记录
	$LoginRSlctitem=sprintf("SELECT licai_target_id FROM user_licai_target_t WHERE user_id='%s'",get_magic_quotes_gpc() ? $LoginUserID : addslashes($LoginUserID)); 
	$LoginRS_lctitem_RS = mysql_query($LoginRSlctitem);
	while(NULL != ($loginFoundlctitem = mysql_fetch_row($LoginRS_lctitem_RS))) {
		$itemflag=0;
		foreach($loginUserlct as $selectitem) {
			if ($selectitem == $loginFoundlctitem[0]) {
				$itemflag=$selectitem;
				break;
			}
		}
		if($itemflag == 0) {
			$LoginRSdlct=sprintf("DELETE FROM user_licai_target_t WHERE user_id='%s' and licai_target_id='%s'",get_magic_quotes_gpc() ? $LoginUserID : addslashes($LoginUserID), get_magic_quotes_gpc() ? $loginFoundlctitem[0] : addslashes($loginFoundlctitem[0])); 
			$LoginRS_dlct_RS = mysql_query($LoginRSdlct);
			if (!$LoginRS_dlct_RS) {
				echo '<script type="text/javascript">window.alert("数据库更新失败!")</script>';
			}
		}
	}
	//更新或插入现新记录
	for ($i=0;$i<count($loginUserlct);$i++){
		if ($loginUserlct[$i] != "0") {
			$LoginRSlct=sprintf("SELECT user_id FROM user_licai_target_t WHERE user_id='%s' and licai_target_id='%s'",get_magic_quotes_gpc() ? $LoginUserID : addslashes($LoginUserID), get_magic_quotes_gpc() ? $loginUserlct[$i] : addslashes($loginUserlct[$i])); 
			$LoginRS_lct_RS = mysql_query($LoginRSlct);
			$loginFoundlct = mysql_num_rows($LoginRS_lct_RS);
			if ($loginFoundlct) {
				$Login_lct_Update="update user_licai_target_t set licai_target_id='".$loginUserlct[$i]."',licai_money='".$loginUserlctm[$i]."',licai_plan='".$loginUserlcty[$i]."' where user_id='".$LoginUserID."' and licai_target_id='".$loginUserlct[$i]."'";
				$LoginUpdatelct = mysql_query($Login_lct_Update);
				if(!$LoginUpdatelct) {
					echo '<script type="text/javascript">window.alert("数据库更新失败!")</script>';
				}
			} else {
				$Login_lct_fill="INSERT INTO user_licai_target_t (user_id, licai_target_id, licai_money, licai_plan) VALUES ";
				if (!get_magic_quotes_gpc())
				{
					addslashes($LoginUserID);
					addslashes($loginUserlct[$i]);
					addslashes($loginUserlctm[$i]);
					addslashes($loginUserlcty[$i]);
				}
				$Login_lct_fill = $Login_lct_fill."('".$LoginUserID."','".$loginUserlct[$i]."','".$loginUserlctm[$i]."','".$loginUserlcty[$i]."')";
				$Loginexfilllct = mysql_query($Login_lct_fill);
				if(!$Loginexfilllct) {
					echo '<script type="text/javascript">window.alert("数据库插入失败!")</script>';
				}
			}
		}
	}
	$loginUserisk_ex=$_POST['zichanjingyan'];
	$loginUserisk_con=$_POST['jinxingyibitouzi'];
	$loginUserisk_up=$_POST['zichanzuhe'];
	$loginUserisk_down=$_POST['howtodo'];
	//处理风险承受能力的数据表
	$LoginRS_risk=sprintf("SELECT user_id FROM user_licai_risk_t WHERE user_id ='%s'",get_magic_quotes_gpc() ? $LoginUserID : addslashes($LoginUserID)); 
	$LoginRS_risk_RS = mysql_query($LoginRS_risk);
	$loginFoundrisk = mysql_num_rows($LoginRS_risk_RS);
	if ($loginFoundrisk) {
		$Login_risk_Update="update user_licai_risk_t set risk_ex='".$loginUserisk_ex."',risk_con='".$loginUserisk_con."',risk_up='".$loginUserisk_up."',risk_down='".$loginUserisk_down."' where user_id='".$LoginUserID."'";
		$LoginUpdater = mysql_query($Login_risk_Update);
		if(!$LoginUpdater) {
			echo '<script type="text/javascript">window.alert("数据库更新失败!")</script>';
		}
	} else {
		$Login_risk_fill="INSERT INTO user_licai_risk_t (user_id, risk_ex, risk_con, risk_up, risk_down) VALUES ";
		if (!get_magic_quotes_gpc())
		{
			addslashes($LoginUserID);
			addslashes($loginUserisk_ex);
			addslashes($loginUserisk_con);
			addslashes($loginUserisk_up);
			addslashes($loginUserisk_down);
		}
		$Login_risk_fill = $Login_risk_fill."('".$LoginUserID."','".$loginUserisk_ex."','".$loginUserisk_con."','".$loginUserisk_up."','".$loginUserisk_down."')";
		$Loginfillr = mysql_query($Login_risk_fill);
		if(!$Loginfillr) {
			echo '<script type="text/javascript">window.alert("数据库插入失败!")</script>';
		}
	}
	
	//用户填写完成，设置user_info的finish字段
	$Login_ufinish_Update="update user_info set user_if_finish=1 where user_id='".$LoginUserID."'";
	$LoginUpdateufinish = mysql_query($Login_ufinish_Update);
	if(!$LoginUpdateufinish) {
		echo '<script type="text/javascript">window.alert("数据库更新失败!")</script>';
	}

	require_once "dbclose.php";
	//echo '<script type="text/javascript">window.alert("数据"'.$loginUsecareer.'"库插"'.$loginUserscinsurance.'"入失败!")</script>';
	//echo '<script type="text/javascript">window.alert("数据"'.$LoginUserID.'"库插入失败!")</script>';
	echo '<script type="text/javascript">window.location.href="'.$MM_fillnextpage.'"</script>';	
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
    <div class="zichanxianzhuang"><a href="#">4.风险评估</a> </div><!--保险规划-->
    <div class="rangjieyugengduo">理清自己的理财目标，知道自己想要什么，它们是怎样的优先级。理财师会根据它们帮你制定规划。请好好想下，认真合理地设定。  
       </div><!--你的现金类资产。
-->
<div class="gerenxinxi4">
<form id="form1" name="form1" method="post" action="">
<div class="nideshuihoushouru">
  <p>您的理财目标:
    </div><!--您的基金类资产-->
</p>
   <p><a class="addlabel"></a>理财目标
      <label for="lixiangmubiao"></label>
        <select name="lixiangmubiao" id="lixiangmubiao" onChange="setDemoTextVal(this.selectedIndex].text)">
          <option value="1">旅游</option>
          <option value="2">购物</option>
          <option value="3">继续教育</option>
          <option value="4">结婚</option>
          <option value="5">育儿</option>
          <option value="6">子女教育</option>
          <option value="7">买车</option>
          <option value="8">买房首付</option>
          <option value="9">提前还贷</option>
          <option value="10">养老金储备</option>
		  <option value="11">其他</option>
        </select>需
        <label for="duoshaoyuan"></label>
        <input type="text" name="duoshaoyuan" id="duoshaoyuan" />元，计划
      <label for="jihua"></label>
      <input type="text" name="jihua" id="jihua" maxlength="2" pattern="[0-9]*" />年完成</p>
	  <!-- 自动添加选项 -->
	  <!-- 第一项:menuLinksAdmin-->
	  <div id='menuLinksAdmin' style='display:none;'>
	      <p><a id='menuLinks' href="javascript:remove_item('menuLinksAdmin');" class="addlabel" >&times;</a>理想目标
	        <label for="lixiangmubiao1"></label>
	        <select name="lixiangmubiao1" id="lixiangmubiao1" onChange="setDemoTextVal(this.selectedIndex].text)">
	          <option value="1">旅游</option>
	          <option value="2">购物</option>
              <option value="3">继续教育</option>
              <option value="4">结婚</option>
              <option value="5">育儿</option>
              <option value="6">子女教育</option>
              <option value="7">买车</option>
              <option value="8">买房首付</option>
              <option value="9">提前还贷</option>
              <option value="10">养老金储备</option>
		      <option value="11">其他</option>
	          </select>需
	          <label for="duoshaoyuan1"></label>
	          <input type="text" name="duoshaoyuan1" id="duoshaoyuan1" />元，计划
	          <label for="jihua1"></label>
	        <input type="text" name="jihua1" id="jihua1" maxlength="2" pattern="[0-9]*" />年完成
	        <input type="hidden" id="select_content" name="select_content" value="0"/></p>
      </div>
	  	  <!-- 第二 项:menuLinksAdmin1-->
	  <div id='menuLinksAdmin1' style='display:none;'>
	      <p><a id='menuLinks' href="javascript:remove_item('menuLinksAdmin1');" class="addlabel" >&times;</a>理想目标 
	        <label for="lixiangmubiao2"></label>
	        <select name="lixiangmubiao2" id="lixiangmubiao2" onChange="setDemoTextVal(this.selectedIndex].text)">
	          <option value="1">旅游</option>
	          <option value="2">购物</option>
              <option value="3">继续教育</option>
              <option value="4">结婚</option>
              <option value="5">育儿</option>
              <option value="6">子女教育</option>
              <option value="7">买车</option>
              <option value="8">买房首付</option>
              <option value="9">提前还贷</option>
              <option value="10">养老金储备</option>
		      <option value="11">其他</option>
	          </select>需
	          <label for="duoshaoyuan2"></label>
	          <input type="text" name="duoshaoyuan2" id="duoshaoyuan2" />元，计划
	          <label for="jihua2"></label>
	        <input type="text" name="jihua2" id="jihua2" maxlength="2" pattern="[0-9]*" />年完成
	        <input type="hidden" id="select_content1" name="select_content1" value="0"/></p>
      </div>
      <div class="tianjia"><p><a id='menuLinks' href="javascript:check_items();">+添加更多目标</a></p></div>
	  <script type="text/javascript">
      /*
	  //加法函数
	  function accAdd(arg1,arg2){
	      var t1 = 0, t2 = 0, m;
	      try {
	          t1 = arg1.toString().split(".")[1].length;
	      } catch(e) {t1 = 0;}
	      try {
	          t2 = arg2.toString().split(".")[1].length;
	      } catch(e) {t2 = 0;}
	      with(Math) {
	          m=Math.pow(10,Math.max(t1,t2));
	          return (arg1  * m + arg2 * m) / m;
	      }
	  }

	  //减法函数
	  function accSubtr(arg1,arg2){
	      var t1 = 0, t2 = 0, m, n;
	      try {
	          t1 = arg1.toString().split(".")[1].length;
	      } catch(e) {t1 = 0;}
	      try {
	          t2 = arg2.toString().split(".")[1].length;
	      } catch(e) {t2 = 0;}
	      with(Math) {
	          //动态控制精度长度
 	         n = Math.max(t1,t2);
	          m = Math.pow(10, n);
	          return ((arg1  * m - arg2 * m) / m).toFixed(n);
	      }
	  }
      */
	  mlink = 0;
	  mlink1 = 0;
	  function check_items() {
	      if (mlink == 0) {
			  mlink = 1;
			  document.getElementById('select_content').value = "1";
			  display('menuLinksAdmin')
		  } else if (mlink1 == 0) {
			  mlink1 = 1;
			  document.getElementById('select_content1').value = "1";
			  //window.alert(document.getElementById('select_content1').value);
			  display('menuLinksAdmin1')
		  } else {
		      window.alert('只能加两项！');
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

	  function remove_item(id) {
	      if (id == 'menuLinksAdmin') {
			  document.getElementById('select_content').value = "0";
		      mlink = 0;
	      } else if (id == 'menuLinksAdmin1') {
			  document.getElementById('select_content1').value = "0";
			  //window.alert(document.getElementById('select_content1').value);
		      mlink1 = 0;
		  }
	      var e = document.getElementById(id);
	      e.style.display = 'none';
	  }
	  </script>
	  <!--           -->
      <p>&nbsp;</p>
<div class="anything">
<div class="nideshuihoushouru">您的风险承受能力:</div><!--风险承受能力结束-->
<h3 class="rangjieyugengduo" style="font-weight:normal">1、到目前为止，您有多少年投资于风险类资产的经验？( 如基金、股票、贵金属、外汇等 )</h3>
<p>
  <input type="radio" name="zichanjingyan" id="wunian" value="5" />
  <label for="wunian"></label>5年以上
  <input type="radio" name="zichanjingyan" id="3or5" value="4" />
  <label for="3or5"></label>3-5年
  <input type="radio" name="zichanjingyan" id="1or3" value="3" />
  <label for="1or3"></label>1-3年
  <input type="radio" name="zichanjingyan" id="one" value="2" />
  <label for="one"></label>1年
  <input type="radio" name="zichanjingyan" id="inexperience" value="1" />
  <label for="inexperience"></label>无经验</p>
<p><h3 class="rangjieyugengduo" style="font-weight:normal">2、进行一笔投资时，您更关心的是？</h3></p>
<p>
  <input type="radio" name="jinxingyibitouzi" value="3" id="jinxingyibitouzi_0" />
  <label for="jinxingyibitouzi_0"></label>收益最大化</label>
  <input type="radio" name="jinxingyibitouzi" value="2" id="jinxingyibitouzi_1" />
  <label for="jinxingyibitouzi_1"></label>本金安全性
  <input type="radio" name="jinxingyibitouzi" value="1" id="jinxingyibitouzi_2" />
  <label for="jinxingyibitouzi_2"></label>二者权衡</p>
<p><h3 class="rangjieyugengduo" style="font-weight:normal">3、如果由于市场火爆，您的投资组合突然大涨10%，您会如何应对？</h3></p>
<p>
  <input type="radio" name="zichanzuhe" id="zhuijiatouzi" value="4" />
  <label for="zhuijiatouzi"></label>马上追加投资
  <input type="radio" name="zichanzuhe" id="jixvchiyou" value="3" />
  <label for="jixvchiyou"></label>继续持有
  <input type="radio" name="zichanzuhe" id="bufenmaichu" value="2" />
  <label for="bufenmaichu"></label>部分卖出
  <input type="radio" name="zichanzuhe" id="ganjintuoshou" value="1" />
  <label for="ganjintuoshou"></label>赶紧止盈脱手</p>
<p><h3 class="rangjieyugengduo" style="font-weight:normal">4、如果由于市场低迷，您的投资组合在一个月内亏损了10%，您会如何应对？</h3>
<p>
  <input type="radio" name="howtodo" id="quanbumaichu" value="4" />
  <label for="quanbumaichu"></label>全部卖出
  <input type="radio" name="howtodo" id="bufenmaichu2" value="3" />
  <label for="bufenmaichu2"></label>部分卖出
  <input type="radio" name="howtodo" id="guanwangdengdai" value="2" />
  <label for="guanwangdengdai"></label>观望等待
  <input type="radio" name="howtodo" id="yuedieyuemai" value="1" />
  <label for="yuedieyuemai"></label>越跌越买</p>
<br />
</p>
</div><!--anything-->
<div>
    <p class="inputstyle"><br />
      <input type="submit" name="button" id="button" value=" " onclick="return validateform(this.from)"/>
    </p>
</div>
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

function check_redio(rd) {
	var sex_obj = document.getElementsByName(rd); 
	var temp_sex = false; 
	for(var i = 0; i < sex_obj.length; i ++){ 
		if(sex_obj[i].checked){ 
			var sex = sex_obj[i].value; 
			temp_sex = true; 
			break; 
		} 
	} 
	if(temp_sex == false){ 
		//window.alert('请选择性别'); 
		return true; 
	}
}

function validateform()
{
	if(document.form1.duoshaoyuan.value == "") {
		window.alert ("理财目标所需资金不能为空!")
		return false;
	} else {
		 if(TestNum(document.form1.duoshaoyuan.value)) {
			window.alert ("理财目标所需资金请输入正整数!")
			return false; 
		}
	}
	if(document.form1.jihua.value == "") {
		window.alert ("理财目标计划年限不能为空!")
		return false;
	} else {
		 if(TestNum(document.form1.jihua.value)) {
			window.alert ("理财目标计划年限输入正整数!")
			return false; 
		}
	}

	if(document.form1.select_content.value == "1") {
		if(document.form1.duoshaoyuan1.value == "") {
			window.alert ("理财目标所需资金不能为空!")
			return false;
		} else {
			if(TestNum(document.form1.duoshaoyuan1.value)) {
				window.alert ("理财目标所需资金请输入正整数!")
				return false; 
			}
		}
		if(document.form1.jihua1.value == "") {
			window.alert ("理财目标计划年限不能为空!")
			return false;
		} else {
			if(TestNum(document.form1.jihua1.value)) {
				window.alert ("理财目标计划年限输入正整数!")
				return false; 
			}
		}
	}

	if(document.form1.select_content1.value == "1") {
		if(document.form1.duoshaoyuan2.value == "") {
			window.alert ("理财目标所需资金不能为空!")
			return false;
		} else {
			if(TestNum(document.form1.duoshaoyuan2.value)) {
				window.alert ("理财目标所需资金请输入正整数!")
				return false; 
			}
		}
		if(document.form1.jihua2.value == "") {
			window.alert ("理财目标计划年限不能为空!")
			return false;
		} else {
			if(TestNum(document.form1.jihua2.value)) {
				window.alert ("理财目标计划年限输入正整数!")
				return false; 
			}
		}
	}
	
	if (check_redio('zichanjingyan')) {
		window.alert('请选择风险类资产的经验！'); 
		return false;
	}

	if (check_redio('jinxingyibitouzi')) {
		window.alert('请选择您更关心的投资类型！'); 
		return false;
	}
	
	if (check_redio('zichanzuhe')) {
		window.alert('请选择您会如何应对投资组合突然大涨10%！'); 
		return false;
	}
	
	if (check_redio('howtodo')) {
		window.alert('请选择您会如何应对投资组合在一个月内亏损了10%！'); 
		return false;
	}
	document.form1.submit()
	return true;
}
</script>
