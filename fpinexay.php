<?php
if (!isset($_SESSION)) {
	session_start();
}
?>
<?php
function bar2d($filen, $data3y, $data4y, $text_con) {
	require_once ('src/jpgraph.php');
	require_once ('src/jpgraph_bar.php');
	require_once ('src/jpgraph_line.php');
	//bar3

	// Create the graph. These two calls are always required
	$graph = new Graph(150,500);
	$graph->SetColor('#FFFFFF');//设置背景bar区域背景颜色
	$graph->SetScale("textlin");
	$graph->SetMarginColor('#FFFFFF'); //周边区域背景颜色

	$graph->SetFrame(true,'#FFFFFF',1); //设置图片的背景颜色
	$graph->SetMargin(35,50,20,5);
	$graph->SetBox(false);
	//$graph->SetShadow();

	$graph->ygrid->SetFill(false);
	$graph->xaxis->Hide(); // Hide xaxis 
	$graph->yaxis->Hide(); // Hide y-axis 
	$b3plot = new BarPlot($data3y);
	$b4plot = new BarPlot($data4y);

	// Create the grouped bar plot
	$gbbplot = new AccBarPlot(array($b3plot,$b4plot));
	$gbplot = new GroupBarPlot(array($gbbplot));

	// ...and add it to the graPH
	$graph->Add($gbplot);

	$b3plot->SetColor("#8B008B");
	$b3plot->SetFillColor("#8B008B");
	$b3plot->SetLegend(mb_convert_encoding($text_con[0], "html-entities", "utf-8"));

	$b4plot->SetColor("#DA70D6");
	$b4plot->SetFillColor("#DA70D6");
	$b4plot->SetLegend(mb_convert_encoding($text_con[1], "html-entities", "utf-8"));

	$graph->legend->SetFrameWeight(1);
	$graph->legend->SetColumns(6);
	$graph->legend->SetLayout(LEGEND_VERT);
	$graph->legend->SetColor('#4E4E4E','#00A78A');
	$graph->legend->SetFont(FF_SIMSUN, FS_BOLD); 
	$graph->legend->SetFrameWeight(0); //图例文字外框边框border设置为0
	$graph->legend->SetFillColor('#FFFFFF');  //设置legend背景颜色

	$band = new PlotBand(VERTICAL,BAND_RDIAG,11,"max",'khaki4');
	$band->ShowFrame(true);
	$band->SetOrder(DEPTH_BACK);
	$graph->Add($band);

	$graph->title->SetColor("#A01818"); //title的颜色
	$graph->title->Set(mb_convert_encoding($text_con[2], "html-entities", "utf-8"));
	$graph->title->SetFont(FF_SIMSUN, FS_BOLD, 12);

	// Display the graph
	$graph->Stroke($filen);
}
function pie3d($filen, $data, $month) {
	require_once ("src/jpgraph.php");
	require_once ("src/jpgraph_pie.php");
	require_once ("src/jpgraph_pie3d.php");
	$graph = new PieGraph(700, 300);
	$graph->SetShadow();
	$graph->SetColor('#FFFFFF'); //周边区域背景颜色
	$graph->title->Set(mb_convert_encoding("                    您的家庭月收支状况", "html-entities", "utf-8"));
	$graph->title->ParagraphAlign('center'); //title对其方式
	$graph->title->SetPos(0.9,0.9,'left','center'); //title的位置
	$graph->title->SetColor("#A01818"); //title的颜色
	$graph->title->SetFont(FF_SIMSUN, FS_BOLD, 12);
	$graph->legend->Pos(0.7,0.6,'center','bottom');//设置旁注位置
	$graph->legend->SetFrameWeight(0); //图例文字外框边框border设置为0
	$graph->legend->SetFillColor('#FFFFFF'); //图例文字框内的填充颜色
	$graph->legend->SetShadow('#C8C8C8', 0);
	//$graph->legend->Pos(0.5,0.0.5,'left','bottom');
	$graph->legend->SetLayout(LEGEND_VERT);
	$graph->legend->SetFont(FF_SIMSUN, FS_BOLD); 
	$graph->legend->SetFillColor('#FFFFFF');  //设置legend背景颜色
	//$theme_class= new VividTheme;
	//$graph->SetTheme($theme_class);
	$p1 = new PiePlot3D($data);
	$graph->Add($p1); //在SetSliceColors之前add这样可以设置slice颜色
	$p1->SetSize(0.5);
	$p1->ExplodeAll();
	$p1->SetCenter(0.28);
	$p1->value->SetColor("brown"); //设置百分比颜色
	$p1->SetSliceColors(array('red','orange','green','blue','yellow'));//设置每个饼的颜色
	//$p1->SetColor("red");
	$p1->SetLegends($month);
	//$p1->SetLegends($gDateLocale->GetShortMonth());
	$graph->Stroke($filen);
}
$MM_redirectLoginFailed="login.php";
if (isset($_SESSION['MM_Username'])) {
	$LoginUserID=$_SESSION['MM_UserID'];
	$is_failed=false;
	require_once "dbaccess.php";
	//读取收入现状的数据表
		$LoginRS_income=sprintf("SELECT * FROM user_income_t WHERE in_id='%s'",get_magic_quotes_gpc() ? $LoginUserID : addslashes($LoginUserID)); 
		$LoginRS_income_RS = mysql_query($LoginRS_income);
		if ($LoginRS_income_RS) {
			$LoginRS_income_row = mysql_fetch_row($LoginRS_income_RS);
			$Loginuser_sal = $LoginRS_income_row[1];
			$Loginuser_othsal = $LoginRS_income_row[2];
			$Loginuser_bonus = $LoginRS_income_row[3];
			$Loginuser_othbonus = $LoginRS_income_row[4];	
			$Loginuser_income_all = $Loginuser_sal + $Loginuser_othsal + $Loginuser_bonus + round( $Loginuser_othbonus / 12 );
			$Loginuser_income_yue = $Loginuser_sal + $Loginuser_othsal;
			$Loginuser_income_nian = ($Loginuser_sal + $Loginuser_othsal) * 12 + $Loginuser_bonus + $Loginuser_othbonus;
		} else {
			$is_failed=true;
		}
		
		$LoginRS_ex_mon=sprintf("SELECT * FROM user_expend_t WHERE ex_id='%s'",get_magic_quotes_gpc() ? $LoginUserID : addslashes($LoginUserID)); 
		$LoginRS_ex_RS = mysql_query($LoginRS_ex_mon);
		if ($LoginRS_ex_RS) {
			$LoginRS_ex_row = mysql_fetch_row($LoginRS_ex_RS);
			$Loginuser_ex_rep = $LoginRS_ex_row[1];
			$Loginuser_ex_tra = $LoginRS_ex_row[2];
			$Loginuser_ex_shp = $LoginRS_ex_row[3];
			$Loginuser_ex_ren = $LoginRS_ex_row[4];
			$Loginuser_ex_oth = $LoginRS_ex_row[5];
			$Loginuser_ex_ohy = $LoginRS_ex_row[6];
			$Loginuser_ex_all = $Loginuser_ex_rep + $Loginuser_ex_tra + $Loginuser_ex_shp + $Loginuser_ex_ren + $Loginuser_ex_oth + round( $Loginuser_ex_ohy / 12 );
			$Loginuser_ex_yue = $Loginuser_ex_rep + $Loginuser_ex_tra + $Loginuser_ex_shp + $Loginuser_ex_ren + $Loginuser_ex_oth;
			$Loginuser_ex_nian = ($Loginuser_ex_rep + $Loginuser_ex_tra + $Loginuser_ex_shp + $Loginuser_ex_ren + $Loginuser_ex_oth) * 12 + $Loginuser_ex_ohy;
		} else {
			$is_failed=true;
		}
		//生成收支分析柱状图
		if ($is_failed) {
			echo '<script type="text/javascript">window.alert("数据库读取失败!")</script>';
		} else {
			$barfilem="image/tmp/yueshouru".$LoginUserID.".png";
			$barfiley="image/tmp/nianshouru".$LoginUserID.".png";
			if(file_exists($barfilem)) {
				unlink($barfilem);
			}
			if(file_exists($barfiley)) {
				unlink($barfiley);
			}
			$bar2dimagexist = 0;
			if ($Loginuser_income_yue != 0 ||  $Loginuser_ex_yue !=0) {
				//月收支
				$fdarray1 = array($Loginuser_income_yue);
				$fdarray2 = array($Loginuser_ex_yue);
				$fdarray3 = array("月收入：\n$Loginuser_income_yue 元","月支出：\n$Loginuser_ex_yue 元", "您的月收支情况\n ");
				bar2d($barfilem, $fdarray1, $fdarray2, $fdarray3);
				//年收支
				$ydarray1 = array($Loginuser_income_nian);
				$ydarray2 = array($Loginuser_ex_nian);
				$ydarray3 = array("年收入：\n$Loginuser_income_nian 元","年支出：\n$Loginuser_ex_nian 元", "您的年收支情况\n ");
				bar2d($barfiley, $ydarray1, $ydarray2, $ydarray3);
				$bar2dimagexist = 1;
			}
		}
		//生成收支分析饼图
		if ($is_failed) {
			echo '<script type="text/javascript">window.alert("数据库读取失败!")</script>';
		} else {
			$piefilen="image/tmp/zichuqingkuang".$LoginUserID.".png";
			if(file_exists($piefilen)) {
				unlink($piefilen);
			}
			$pid3dimagexist = 0;
			if ( $Loginuser_ex_rep != 0 || $Loginuser_ex_tra != 0 || $Loginuser_ex_shp != 0 || $Loginuser_ex_ren != 0 || $Loginuser_ex_oth != 0) {
				$data = array($Loginuser_ex_rep, $Loginuser_ex_tra, $Loginuser_ex_shp, $Loginuser_ex_ren, $Loginuser_ex_oth);
				$month = array(mb_convert_encoding("餐饮娱乐： ".$Loginuser_ex_rep."", "html-entities", "utf-8"),
								mb_convert_encoding("交通通讯： ".$Loginuser_ex_tra."", "html-entities", "utf-8"),
								mb_convert_encoding("家居购物： ".$Loginuser_ex_shp."", "html-entities", "utf-8"),
								mb_convert_encoding("房租房贷： ".$Loginuser_ex_ren."", "html-entities", "utf-8"),
								mb_convert_encoding("其他支出： ".$Loginuser_ex_oth."", "html-entities", "utf-8"));
				pie3d($piefilen, $data,$month);
				$pid3dimagexist = 1;
			}
		}

		if ($is_failed) {
			echo '<script type="text/javascript">window.alert("数据库读取失败!")</script>';
		} else {
			$LoginRS_res_monney = $Loginuser_income_all - $Loginuser_ex_all;
			$LoginRS_res_rate = round(($LoginRS_res_monney / $Loginuser_income_all) * 100);
			if ( $LoginRS_res_rate >= 60) {
				$LoginRS_res_rate_ans = "您家庭的月结余率(".$LoginRS_res_rate."%)健康，建议维持在".$LoginRS_res_rate."%";
				$LoginRS_res_text = "将月结余率维持在".$LoginRS_res_rate."%（".$LoginRS_res_monney."元）。";
			} else if ( 60 > $LoginRS_res_rate and $LoginRS_res_rate >= 10) {
				$LoginRS_res_rate_ans = "您家庭的月结余率(".$LoginRS_res_rate."%)一般，建议提高结余率";
				$Loginuser_income_all_half = $Loginuser_income_all * 0.5;
				$LoginRS_res_text = "将月结余率提高到50%（".$Loginuser_income_all_half."元）。";
			} else {
				$LoginRS_res_rate_ans = "您家庭的月结余率(".$LoginRS_res_rate."%)糟糕，建议必须提高结余率，来抵抗风险";
				$LoginRS_res_text = "您的月结余率太低，请立即提高结余率，以增加财富积累。";
			}
		}
		
		$LoginRS_brate=sprintf("SELECT user_id FROM user_plan_result_t WHERE user_id='%s'",get_magic_quotes_gpc() ? $LoginUserID : addslashes($LoginUserID)); 
		$LoginRS_brate_RS = mysql_query($LoginRS_brate);
		$loginFoundUser_brate = mysql_num_rows($LoginRS_brate_RS);
		if ($loginFoundUser_brate) {
			$Login_Update_brate="update user_plan_result_t set user_balan_rate='".$LoginRS_res_rate."', user_balan_mon ='".$LoginRS_res_monney."' where user_id='".$LoginUserID."'";
			$LoginRS = mysql_query($Login_Update_brate);
			if(!$LoginRS) {
				echo '<script type="text/javascript">window.alert("数据库更新失败!")</script>';
			}
		} else {
			$Login_brate_fill="INSERT INTO user_plan_result_t (user_id, user_balan_rate, user_balan_mon) VALUES ";
			if (!get_magic_quotes_gpc())
			{
				addslashes($LoginUserID);
				addslashes($LoginRS_res_rate);
				addslashes($LoginRS_res_monney);
			}
			$Login_brate_fill = $Login_brate_fill."('".$LoginUserID."','".$LoginRS_res_rate."','".$LoginRS_res_monney."')";
			$LoginRS = mysql_query($Login_brate_fill);
			if(!$LoginRS) {
				echo '<script type="text/javascript">window.alert("数据库插入失败!")</script>';
			}
		}
		
		//question1
		if ($is_failed) {
			echo '<script type="text/javascript">window.alert("数据库读取失败!")</script>';
		} else {
			if ($LoginRS_res_rate >= 60) {
				$Loginuser_que_one = 1;
			} else if (60 > $LoginRS_res_rate and $LoginRS_res_rate >= 10){
				$Loginuser_que_one = 2;
			} else {
				$Loginuser_que_one = 2;
			}
		}

		$LoginRS_question_one=sprintf("SELECT * FROM user_plan_t WHERE page_id=2 and question_id=1 and index_id='%s'",get_magic_quotes_gpc() ? $Loginuser_que_one : addslashes($Loginuser_que_one)); 
		$LoginRS_qus_one_RS = mysql_query($LoginRS_question_one);
		if ($LoginRS_qus_one_RS) {
			$LoginRS_qus_one_row = mysql_fetch_row($LoginRS_qus_one_RS);
			$LoginRS_qus_one_ans_tmp = $LoginRS_qus_one_row[3];
			$LoginRS_qus_one_ans_tmp1 = str_replace("AAA", $LoginRS_res_rate, $LoginRS_qus_one_ans_tmp);
			$LoginRS_qus_one_ans_tmp2 = str_replace("BBB", "60", $LoginRS_qus_one_ans_tmp1);
			$LoginRS_qus_one_ans = str_replace("CCC", $Loginuser_income_all * 0.6, $LoginRS_qus_one_ans_tmp2);
		} else {
			echo '<script type="text/javascript">window.alert("数据库读取失败!")</script>';
		}

		//question2
		if ($is_failed) {
			echo '<script type="text/javascript">window.alert("数据库读取失败!")</script>';
		} else {
			if ($Loginuser_income_all >= 5000) {
				$Loginuser_que_two = 1;
			} else if (5000 > $Loginuser_income_all and $Loginuser_income_all >= 2000){
				$Loginuser_que_two = 2;
			} else {
				$Loginuser_que_two = 2;
			}
		}
		$LoginRS_question_two=sprintf("SELECT * FROM user_plan_t WHERE page_id=2 and question_id=2 and index_id='%s'",get_magic_quotes_gpc() ? $Loginuser_que_two : addslashes($Loginuser_que_two)); 
		$LoginRS_qus_two_RS = mysql_query($LoginRS_question_two);
		if ($LoginRS_qus_two_RS) {
			$LoginRS_qus_two_row = mysql_fetch_row($LoginRS_qus_two_RS);
			$LoginRS_qus_two_ans = $LoginRS_qus_two_row[3];
		} else {
			echo '<script type="text/javascript">window.alert("数据库读取失败!")</script>';
		}
		//question3
		if ($is_failed) {
			echo '<script type="text/javascript">window.alert("数据库读取失败!")</script>';
		} else {
				if ($Loginuser_ex_all >= 11996) {
				$Loginuser_ex_rate = 90;
				$Loginuser_ex_text = "较高，高于";
				$Loginuser_que_th = 2;
			} else if (11996 > $Loginuser_ex_all and $Loginuser_ex_all >= 1488) {
				$Loginuser_extmp_rate = log($Loginuser_ex_all)/log(1.18);
				$Loginuser_ex_rate = sprintf("%.2f", $Loginuser_extmp_rate);
				$Loginuser_ex_text = "偏高，高于";
				$Loginuser_que_th = 2;
			} else if (1020 < $Loginuser_ex_all and $Loginuser_ex_all < 1488) {
				$Loginuser_extmpp_rate = 70 - sqrt( ( 1488 - $Loginuser_ex_all ) / 0.303673 );
				$Loginuser_ex_rate = sprintf("%.2f", $Loginuser_extmpp_rate);
				$Loginuser_ex_text = "适中，高于";
				$Loginuser_que_th = 1;
			} else {
				$Loginuser_ex_rate = 10;
				$Loginuser_ex_text = "较低，高于";
				$Loginuser_que_th = 3;
			}
		}
		$LoginRS_question_th=sprintf("SELECT * FROM user_plan_t WHERE page_id=2 and question_id=3 and index_id='%s'",get_magic_quotes_gpc() ? $Loginuser_que_th : addslashes($Loginuser_que_th)); 
		$LoginRS_qus_th_RS = mysql_query($LoginRS_question_th);
		if ($LoginRS_qus_th_RS) {
			$LoginRS_qus_th_row = mysql_fetch_row($LoginRS_qus_th_RS);
			$LoginRS_qus_th_ans = $LoginRS_qus_th_row[3];
		} else {
			echo '<script type="text/javascript">window.alert("数据库读取失败!")</script>';
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
  <div class="zichanxianzhuang"><a href="#">2.收支分析</a> </div><!--资产现状-->
  <div class="rangjieyugengduo">让结余更多
 </div><!--让结余更多-->
  <div class="jiankangdeshouzhizhuangkuang">健康的收支状况是未来财富增长的基础。为了顺利达成您的理财目标，开源节流、提高结余是关键。但我们不主张以降低生活品质为代价提高结余，所以需要您更聪明地管理收支，取得<strong>“达成理财目标”</strong>与<strong>“保证生活品质”</strong>的平衡。</div>
  <div class="zhuxingtu">
  <p>&nbsp;</p>
  <?php
  if ($bar2dimagexist == 1) {
	echo '<p>
    <div align="center"><p><img src="'.$barfilem.'" width="120" height="380" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="'.$barfiley.'" width="120" height="380" /></p>
    <p>&nbsp;</p>
    <p>&nbsp;</p></div>
	</p>';
  }
  ?>
  <div class="nideyuejieyulv">一、<strong><?php echo $LoginRS_res_rate_ans?>。</strong></br>
  当前月结余率=（月收入<?php echo $Loginuser_income_all?>元-月支出<?php echo $Loginuser_ex_all?>元）/月收入<?php echo $Loginuser_income_all?>元=<?php echo $LoginRS_res_rate?>%</br>
  <?php echo $LoginRS_qus_one_ans?></br> 

  二、<strong>您家庭的税后月收入为<?php echo $Loginuser_income_all * 0.8 ?>元。</strong></br>
  <?php echo $LoginRS_qus_two_ans ?></br> 

  此外，收入的年增长率通常需保持在至少5%，10%以上比较理想。大多数人通过以下手段有效地实现了<strong>“开源”</strong>:</br>
  1.<strong>投资自己，获得加薪/晋升/跳槽；</strong></br>
  2.<strong>积极理财，增加投资收益；</strong></br>
  3.<strong>适当兼职，拓展收入来源。</strong></br>
<div class="huanxingtu">
  <?php
  if ($pid3dimagexist == 1) {
	echo '<p><div align="center"><img src="'.$piefilen.'" width="520" height="280" /></div></p>';
  }
  ?>
</div><!--柱形图-->
</div><!--环形图-->
<div class="nideyuezhichu">三、<strong>您家庭的月支出（<?php echo $Loginuser_ex_all ?>元）<?php echo $Loginuser_ex_text,$Loginuser_ex_rate ?>%的家庭。</strong></br>
<?php echo $LoginRS_qus_th_ans ?></br> 
我们建议您在支出习惯和理财方法上做出以下改变，从而让结余目标更容易实现。
</div><!--你的月支出-->
<div class="zhuxingtu2">
<img src="image/zhuxingtu2.jpg" />
</div><!--柱形图2-->
<div class="xingdongjihua">
行动计划
</div><!--行动计划--></div></br>
<div class="biaoge">
  <table width="604" align="center">
    <tr>
      <td width="129" height="28" align="center" bgcolor="#FF0000"><span>行动</span></td>
      <td width="463" align="center" bgcolor="#FF0000"><span>做法</span></td>
    </tr>
    <tr>
      <td height="23" align="center">1.记账</td>
      <td align="center">明确了解收支现状，分析并改进支出结构。</td>
    </tr>
    <tr>
      <td height="25" align="center">2.预算</td>
      <td align="center">在月初制订预算，在月末分析实际支出并对照改进。</td>
    </tr>
    <tr>
      <td height="27" align="center">3.保证结余</td>
      <td align="center"><?php echo $LoginRS_res_text ?></td>
    </tr>
  </table>
</div><!--行动计划下方的表格-->
<div class="fulu">
<img src="image/fulu.jpg" />
</div><!--附录-->
     </div><!--资产现状li-->
    <div class="xiayizhangzhichufenxi"><a href="fprsvefund.php">下一章：储备紧急备用金</a></div><!--下一章支出分析-->
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
