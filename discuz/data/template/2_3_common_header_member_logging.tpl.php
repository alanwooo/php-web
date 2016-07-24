<?php if(!defined('IN_DISCUZ')) exit('Access Denied'); 
0
|| checktplrefresh('./template/travel_linzi/common/header.htm', './template/travel_linzi/common/header_common.htm', 1417050506, '3', './data/template/2_3_common_header_member_logging.tpl.php', './template/travel_linzi', 'common/header_member_logging')
|| checktplrefresh('./template/travel_linzi/common/header.htm', './template/travel_linzi/common/pubsearchform.htm', 1417050506, '3', './data/template/2_3_common_header_member_logging.tpl.php', './template/travel_linzi', 'common/header_member_logging')
;?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=<?php echo CHARSET;?>" />
<?php if($_G['config']['output']['iecompatible']) { ?><meta http-equiv="X-UA-Compatible" content="IE=EmulateIE<?php echo $_G['config']['output']['iecompatible'];?>" /><?php } ?>
<title><?php if(!empty($navtitle)) { ?><?php echo $navtitle;?> - <?php } if(empty($nobbname)) { ?> <?php echo $_G['setting']['bbname'];?> - <?php } ?> www.ituiz.com</title>
<?php echo $_G['setting']['seohead'];?>

<meta name="keywords" content="<?php if(!empty($metakeywords)) { echo dhtmlspecialchars($metakeywords); } ?>" />
<meta name="description" content="<?php if(!empty($metadescription)) { echo dhtmlspecialchars($metadescription); ?> <?php } if(empty($nobbname)) { ?>,<?php echo $_G['setting']['bbname'];?><?php } ?>" />
<meta name="generator" content="Discuz! <?php echo $_G['setting']['version'];?>" />
<meta name="author" content="Discuz! Team and Comsenz UI Team" />
<meta name="copyright" content="2001-2013 Comsenz Inc." />
<meta name="MSSmartTagsPreventParsing" content="True" />
<meta http-equiv="MSThemeCompatible" content="Yes" />
<base href="<?php echo $_G['siteurl'];?>" /><link rel="stylesheet" type="text/css" href="data/cache/style_2_common.css?<?php echo VERHASH;?>" /><?php if($_G['uid'] && isset($_G['cookie']['extstyle']) && strpos($_G['cookie']['extstyle'], TPLDIR) !== false) { ?><link rel="stylesheet" id="css_extstyle" type="text/css" href="<?php echo $_G['cookie']['extstyle'];?>/style.css" /><?php } elseif($_G['style']['defaultextstyle']) { ?><link rel="stylesheet" id="css_extstyle" type="text/css" href="<?php echo $_G['style']['defaultextstyle'];?>/style.css" /><?php } ?>    <script src="<?php echo $_G['style']['styleimgdir'];?>/js/jquery.min.js" type="text/javascript"></script>
    <script src="<?php echo $_G['style']['styleimgdir'];?>/js/jquery.SuperSlide.js" type="text/javascript"></script>
    <script src="<?php echo $_G['style']['styleimgdir'];?>/js/wbox-min.js" type="text/javascript"></script>  
<script src="<?php echo $_G['style']['styleimgdir'];?>/js/msclass.js" type="text/javascript"></script>
      
    
<script type="text/javascript">var STYLEID = '<?php echo STYLEID;?>', STATICURL = '<?php echo STATICURL;?>', IMGDIR = '<?php echo IMGDIR;?>', VERHASH = '<?php echo VERHASH;?>', charset = '<?php echo CHARSET;?>', discuz_uid = '<?php echo $_G['uid'];?>', cookiepre = '<?php echo $_G['config']['cookie']['cookiepre'];?>', cookiedomain = '<?php echo $_G['config']['cookie']['cookiedomain'];?>', cookiepath = '<?php echo $_G['config']['cookie']['cookiepath'];?>', showusercard = '<?php echo $_G['setting']['showusercard'];?>', attackevasive = '<?php echo $_G['config']['security']['attackevasive'];?>', disallowfloat = '<?php echo $_G['setting']['disallowfloat'];?>', creditnotice = '<?php if($_G['setting']['creditnotice']) { ?><?php echo $_G['setting']['creditnames'];?><?php } ?>', defaultstyle = '<?php echo $_G['style']['defaultextstyle'];?>', REPORTURL = '<?php echo $_G['currenturl_encode'];?>', SITEURL = '<?php echo $_G['siteurl'];?>', JSPATH = '<?php echo $_G['setting']['jspath'];?>', DYNAMICURL = '<?php echo $_G['dynamicurl'];?>';</script>
<script src="<?php echo $_G['setting']['jspath'];?>common.js?<?php echo VERHASH;?>" type="text/javascript"></script>
<?php if(empty($_GET['diy'])) { $_GET['diy'] = '';?><?php } if(!isset($topic)) { $topic = array();?><?php } ?>
    <!--[if IE 6]>
    <script src="<?php echo $_G['style']['styleimgdir'];?>/js/png.js" type="text/javascript" ></script>
     <script type="text/javascript">
     DD_belatedPNG.fix('#top_nav, .search_form, .header h2 img, .c1,.jv_nav li a:hover, .nv .jv_nav li, .nv .jv_nav li.on a, h2 img, .part1 span, .part2 span, .part3 span, .part4 span, .contents, .btmbg, #top_nav h1 a, #con .bottomcover, .i_qq, .i_wb, .wBox_overlayBG, .jv_c5 em, .f_hd, .f_hd, .f_hd_s, .show_next, .show_prev, .food_bt_con a.view, .travel_hd li, .travel_hd li.on, .travel_ico, .home_ico, .bulletin, .stat, .recommend, .r_con_btn, .yd, .pub_tits dt, .slideBox .bd em, .FriendLink, .lside_prev,.lside_next, .yd, .r_con_btn a, .more');
    </script>
    <![endif]-->

<meta name="application-name" content="<?php echo $_G['setting']['bbname'];?>" />
<meta name="msapplication-tooltip" content="<?php echo $_G['setting']['bbname'];?>" />
<?php if($_G['setting']['portalstatus']) { ?><meta name="msapplication-task" content="name=<?php echo $_G['setting']['navs']['1']['navname'];?>;action-uri=<?php echo !empty($_G['setting']['domain']['app']['portal']) ? 'http://'.$_G['setting']['domain']['app']['portal'] : $_G['siteurl'].'portal.php'; ?>;icon-uri=<?php echo $_G['siteurl'];?><?php echo IMGDIR;?>/portal.ico" /><?php } ?>
<meta name="msapplication-task" content="name=<?php echo $_G['setting']['navs']['2']['navname'];?>;action-uri=<?php echo !empty($_G['setting']['domain']['app']['forum']) ? 'http://'.$_G['setting']['domain']['app']['forum'] : $_G['siteurl'].'forum.php'; ?>;icon-uri=<?php echo $_G['siteurl'];?><?php echo IMGDIR;?>/bbs.ico" />
<?php if($_G['setting']['groupstatus']) { ?><meta name="msapplication-task" content="name=<?php echo $_G['setting']['navs']['3']['navname'];?>;action-uri=<?php echo !empty($_G['setting']['domain']['app']['group']) ? 'http://'.$_G['setting']['domain']['app']['group'] : $_G['siteurl'].'group.php'; ?>;icon-uri=<?php echo $_G['siteurl'];?><?php echo IMGDIR;?>/group.ico" /><?php } if(helper_access::check_module('feed')) { ?><meta name="msapplication-task" content="name=<?php echo $_G['setting']['navs']['4']['navname'];?>;action-uri=<?php echo !empty($_G['setting']['domain']['app']['home']) ? 'http://'.$_G['setting']['domain']['app']['home'] : $_G['siteurl'].'home.php'; ?>;icon-uri=<?php echo $_G['siteurl'];?><?php echo IMGDIR;?>/home.ico" /><?php } if($_G['basescript'] == 'forum' && $_G['setting']['archiver']) { ?>
<link rel="archives" title="<?php echo $_G['setting']['bbname'];?>" href="<?php echo $_G['siteurl'];?>archiver/" />
<?php } if(!empty($rsshead)) { ?><?php echo $rsshead;?><?php } if(widthauto()) { ?>
<link rel="stylesheet" id="css_widthauto" type="text/css" href="data/cache/style_<?php echo STYLEID;?>_widthauto.css?<?php echo VERHASH;?>" />
<script type="text/javascript">HTMLNODE.className += ' widthauto'</script>
<?php } if($_G['basescript'] == 'forum' || $_G['basescript'] == 'group') { ?>
<script src="<?php echo $_G['setting']['jspath'];?>forum.js?<?php echo VERHASH;?>" type="text/javascript"></script>
<?php } elseif($_G['basescript'] == 'home' || $_G['basescript'] == 'userapp') { ?>
<script src="<?php echo $_G['setting']['jspath'];?>home.js?<?php echo VERHASH;?>" type="text/javascript"></script>
<?php } elseif($_G['basescript'] == 'portal') { ?>
<script src="<?php echo $_G['setting']['jspath'];?>portal.js?<?php echo VERHASH;?>" type="text/javascript"></script>
<?php } if($_G['basescript'] != 'portal' && $_GET['diy'] == 'yes' && check_diy_perm($topic)) { ?>
<script src="<?php echo $_G['setting']['jspath'];?>portal.js?<?php echo VERHASH;?>" type="text/javascript"></script>
<?php } if($_GET['diy'] == 'yes' && check_diy_perm($topic)) { ?>
<link rel="stylesheet" type="text/css" id="diy_common" href="data/cache/style_<?php echo STYLEID;?>_css_diy.css?<?php echo VERHASH;?>" />
<?php } ?>
</head>

<body id="nv_<?php echo $_G['basescript'];?>" class="pg_<?php echo CURMODULE;?><?php if($_G['basescript'] === 'portal' && CURMODULE === 'list' && !empty($cat)) { ?> <?php echo $cat['bodycss'];?><?php } ?>" onkeydown="if(event.keyCode==27) return false;">
    <div id="append_parent"></div><div id="ajaxwaitid"></div>
    <?php if($_GET['diy'] == 'yes' && check_diy_perm($topic)) { ?>
    <?php include template('common/header_diy'); ?>    <?php } ?>
    <?php if(check_diy_perm($topic)) { ?>
    <?php include template('common/header_diynav'); ?>    <?php } ?>
    <?php if(CURMODULE == 'topic' && $topic && empty($topic['useheader']) && check_diy_perm($topic)) { ?>
    <?php echo $diynav;?>
    <?php } ?>
    <?php if(empty($topic) || $topic['useheader']) { ?>
    <?php if($_G['setting']['mobile']['allowmobile'] && (!$_G['setting']['cacheindexlife'] && !$_G['setting']['cachethreadon'] || $_G['uid']) && ($_GET['diy'] != 'yes' || !$_GET['inajax']) && ($_G['mobile'] != '' && $_G['cookie']['mobile'] == '' && $_GET['mobile'] != 'no')) { ?>
    <div class="xi1 bm bm_c">
        请选择 <a href="<?php echo $_G['siteurl'];?>forum.php?mobile=yes">进入手机版</a> <span class="xg1">|</span> <a href="<?php echo $_G['setting']['mobile']['nomobileurl'];?>">继续访问电脑版</a>
    </div>
    <?php } ?>
    <?php if($_G['setting']['shortcut'] && $_G['member']['credits'] >= $_G['setting']['shortcut']) { ?>
    <div id="shortcut">
        <span><a href="javascript:;" id="shortcutcloseid" title="关闭">关闭</a></span>
        您经常访问 <?php echo $_G['setting']['bbname'];?>，试试添加到桌面，访问更方便！
        <a href="javascript:;" id="shortcuttip">添加 <?php echo $_G['setting']['bbname'];?> 到桌面</a>

    </div>
    <script type="text/javascript">setTimeout(setShortcut, 2000);</script>
    <?php } ?>



    <!-- 顶部导航 开始 -->
    <div id="top_nav">
    <div class="wp">
        <?php if(!empty($_G['setting']['pluginhooks']['global_cpnav_top'])) echo $_G['setting']['pluginhooks']['global_cpnav_top'];?>
            <h1><a href="./" title="<?php echo $_G['setting']['bbname'];?>" class="fixpng" hidefocus="true"><?php echo $_G['setting']['bbname'];?></a></h1>
            <div id="top_mainnav"> 
                <!-- menu begin -->
                <div class="nav_box">
                    <ul>
                        <?php if(is_array($_G['setting']['navs'])) foreach($_G['setting']['navs'] as $nav) { ?> 
                        <?php if($nav['available'] && (!$nav['level'] || ($nav['level'] == 1 && $_G['uid']) || ($nav['level'] == 2 && $_G['adminid'] > 0) || ($nav['level'] == 3 && $_G['adminid'] == 1))) { ?>
                        <li <?php if($mnid == $nav['navid']) { ?>class="on" <?php } ?><?php echo $nav['nav'];?>></li>
                        <?php } ?> 
                        <?php } ?> 
                        <?php if(!empty($_G['setting']['pluginhooks']['global_nav_extra'])) echo $_G['setting']['pluginhooks']['global_nav_extra'];?>
                    </ul>
                </div>
                <!-- menu end --> 


                <?php if(!empty($_G['setting']['pluginhooks']['global_cpnav_extra1'])) echo $_G['setting']['pluginhooks']['global_cpnav_extra1'];?> 
            </div>
            <?php if(!empty($_G['setting']['pluginhooks']['global_nav_extra'])) echo $_G['setting']['pluginhooks']['global_nav_extra'];?> 
            <?php if($_G['setting']['search']) { $slist = array();?><?php if($_G['fid'] && $_G['forum']['status'] != 3 && $mod != 'group') { ?><?php
$slist[forumfid] = <<<EOF
<li><a href="javascript:;" rel="curforum" fid="{$_G['fid']}" >本版</a></li>
EOF;
?><?php } if($_G['setting']['portalstatus'] && $_G['setting']['search']['portal']['status'] && ($_G['group']['allowsearch'] & 1 || $_G['adminid'] == 1)) { ?><?php
$slist[portal] = <<<EOF
<li><a href="javascript:;" rel="article">文章</a></li>
EOF;
?><?php } if($_G['setting']['search']['forum']['status'] && ($_G['group']['allowsearch'] & 2 || $_G['adminid'] == 1)) { ?><?php
$slist[forum] = <<<EOF
<li><a href="javascript:;" rel="forum" class="curtype">帖子</a></li>
EOF;
?><?php } if(helper_access::check_module('blog') && $_G['setting']['search']['blog']['status'] && ($_G['group']['allowsearch'] & 4 || $_G['adminid'] == 1)) { ?><?php
$slist[blog] = <<<EOF
<li><a href="javascript:;" rel="blog">日志</a></li>
EOF;
?><?php } if(helper_access::check_module('album') && $_G['setting']['search']['album']['status'] && ($_G['group']['allowsearch'] & 8 || $_G['adminid'] == 1)) { ?><?php
$slist[album] = <<<EOF
<li><a href="javascript:;" rel="album">相册</a></li>
EOF;
?><?php } if($_G['setting']['groupstatus'] && $_G['setting']['search']['group']['status'] && ($_G['group']['allowsearch'] & 16 || $_G['adminid'] == 1)) { ?><?php
$slist[group] = <<<EOF
<li><a href="javascript:;" rel="group">{$_G['setting']['navs']['3']['navname']}</a></li>
EOF;
?><?php } ?><?php
$slist[user] = <<<EOF
<li><a href="javascript:;" rel="user">用户</a></li>
EOF;
?>
<?php } if($_G['setting']['search'] && $slist) { ?>
<div id="scbar" class="cl">
<form id="scbar_form" class="search_form" method="<?php if($_G['fid'] && !empty($searchparams['url'])) { ?>get<?php } else { ?>post<?php } ?>" autocomplete="off" onSubmit="searchFocus($('scbar_txt'))" action="<?php if($_G['fid'] && !empty($searchparams['url'])) { ?><?php echo $searchparams['url'];?><?php } else { ?>search.php?searchsubmit=yes<?php } ?>" target="_blank">
<input type="hidden" name="mod" id="scbar_mod" value="forum" />
<input type="hidden" name="formhash" value="<?php echo FORMHASH;?>" />
<input type="hidden" name="srchtype" value="title" />
<input type="hidden" name="srhfid" value="<?php echo $_G['fid'];?>" />
<input type="hidden" name="srhlocality" value="<?php echo $_G['basescript'];?>::<?php echo CURMODULE;?>" />
<?php if(!empty($searchparams['params'])) { if(is_array($searchparams['params'])) foreach($searchparams['params'] as $key => $value) { $srchotquery .= '&' . $key . '=' . rawurlencode($value);?><input type="hidden" name="<?php echo $key;?>" value="<?php echo $value;?>" />
<?php } ?>
<input type="hidden" name="source" value="discuz" />
<input type="hidden" name="fId" id="srchFId" value="<?php echo $_G['fid'];?>" />
<input type="hidden" name="q" id="cloudsearchquery" value="" />

<style>
#scbar { overflow: visible; position: relative; }
#sg{ background: #FFF; width:456px; border: 1px solid #B2C7DA; }
.scbar_narrow #sg { width: 316px; }
#sg li { padding:0 8px; line-height:30px; font-size:14px; }
#sg li span { color:#999; }
.sml { background:#FFF; cursor:default; }
.smo { background:#E5EDF2; cursor:default; }
            </style>
            <div style="display: none; position: absolute; top:37px; left:44px;" id="sg">
                <div id="st_box" cellpadding="2" cellspacing="0"></div>
            </div>
<?php } ?>
<table cellspacing="0" cellpadding="0">
<tr>
<td class="scbar_txt_td" valign="top"><input type="text" name="srchtxt" id="scbar_txt" placeholder="请输入搜索内容" autocomplete="off" x-webkit-speech speech /></td>
<td class="scbar_btn_td" valign="top"><button type="submit" name="searchsubmit" id="scbar_btn" class="pnc" value="true"><strong class="xi2 xs2">搜索</strong></button></td>
</tr>
</table>
</form>
</div>
<ul id="scbar_type_menu" class="p_pop" style="display: none;"><?php echo implode('', $slist);; ?></ul>
<script type="text/javascript">
//initSearchmenu('scbar', '<?php echo $searchparams['url'];?>');
</script>
<?php } ?>
            <div id="top_usermenu"> 
                <?php $mnid = getcurrentnav();?> 
                <?php if($_G['uid']) { ?> 
                <!-- 登录状态 -->
                <div class="status_loginned"> 
                    <?php if(!empty($_G['setting']['pluginhooks']['global_usernav_extra1'])) echo $_G['setting']['pluginhooks']['global_usernav_extra1'];?> 
                    <?php $upgradecredit = $_G['uid'] && $_G['group']['grouptype'] == 'member' && $_G['group']['groupcreditslower'] != 999999999 ? $_G['group']['groupcreditslower'] - $_G['member']['credits'] : false;?>                    <a id="mn_mymsg" onMouseOver="showMenu({ctrlid:this.id, pos:'34'});"><span class="showmenu">消息<?php if($_G['member']['newpm']) { ?>(<?php echo $_G['member']['newpm'];?>)<?php } ?></span></a> <a id="mn_myaccount" onMouseOver="showMenu({ctrlid:this.id, pos:'34'});"><span class="showmenu">帐号</span></a> </div>
                <?php } elseif(!empty($_G['cookie']['loginuser'])) { ?>
                <div class="status_notlogin"> <a id="loginuser" class="noborder"><?php echo htmlspecialchars($_G['cookie']['loginuser']); ?></a> <a href="member.php?mod=logging&amp;action=login" onClick="showWindow('login', this.href)">激活</a>
                    </li>
                    <a href="member.php?mod=logging&amp;action=logout&amp;formhash=<?php echo FORMHASH;?>">退出</a> </div>
                <?php } elseif(!$_G['connectguest']) { ?>
                <div class="status_notlogin"> 
                    <a href="connect.php?mod=login&amp;op=init&amp;referer=forum.php&amp;statfrom=login"><i class="i_qq"></i></a> <a href="plugin.php?id=sina_login:index&amp;operation=init"><i class="i_wb"></i></a><a href="member.php?mod=logging&amp;action=login" onClick="showWindow('login', this.href)">登录</a> <span class="sp">|</span> <a href="member.php?mod=<?php echo $_G['setting']['regname'];?>">注册</a></div>
                <?php } else { ?>
                <div class="status_loginned"> 
                    <?php if(!empty($_G['style']['extstyle'])) { ?><span id="sslct" href="javascript:;" title="切换风格" onMouseOver="delayShow(this, function() {showMenu({'ctrlid':'sslct','pos':'34!'})});"></span> <?php } ?> 
                    <a href="home.php?mod=follow&amp;uid=<?php echo $_G['uid'];?>&amp;do=view&amp;from=space"><?php echo $_G['member']['username'];?></a> <a id="mn_mymsg" onMouseOver="showMenu({ctrlid:this.id, pos:'34'});"><span class="showmenu">消息<?php if($_G['member']['newpm']) { ?>(<?php echo $_G['member']['newpm'];?>)<?php } ?></span></a> <a id="mn_myaccount" onMouseOver="showMenu({ctrlid:this.id, pos:'34'});"><span class="showmenu">帐号</span></a> 
                </div>
                <?php } ?> 
            </div>
            </div>
    </div>
    <!-- 社区 -->
    <div id="mn_forum_menu" class="top_popmenu" style="display:none;">
        <div class="top_poptitle"><a class="showmenu" href="forum.php" style="font-size:14px;">热版</a></div>
        <div class="divider"></div>
    </div>
    <?php if($_G['uid'] || $_G['connectguest']) { ?> 
    <?php if($_G['member']['newpm']) { ?> 
    <!-- 我的消息 -->
    <div id="mn_mymsg_prompt" class="top_popmenu" style="display:none;"> <a class="close" onClick="hideMenu('mn_mymsg_prompt', 'prompt')">关闭</a>
        <ul>
            <li><?php echo $_G['member']['newpm'];?>条新消息，<a class="light" href="home.php?mod=space&amp;do=pm&amp;filter=newpm">查看消息</a></li>
        </ul>
    </div>
    <script type="text/ecmascript">
        showMenu({ctrlid:'mn_mymsg', menuid:'mn_mymsg_prompt', pos:'34', mtype:'prompt', duration:3});
    </script> 
    <?php } elseif($_G['member']['newprompt']) { ?> 
    <!-- 弹出提示 -->
    <div id="mn_mymsg_prompt" class="top_popmenu" style="display:none;"> <a class="close" onClick="hideMenu('mn_mymsg_prompt', 'prompt')">关闭</a>
        <ul>
            <li><?php echo $_G['member']['newprompt'];?>条新通知，<a class="light" href="home.php?mod=space&amp;do=notice">查看通知</a></li>
        </ul>
    </div>
    <script type="text/ecmascript">
        showMenu({ctrlid:'mn_mymsg', menuid:'mn_mymsg_prompt', pos:'34', mtype:'prompt', duration:3});
    </script> 
    <?php } ?> 
    <!-- 弹出菜单 -->
    <div id="mn_mymsg_menu" class="top_popmenu" style="display:none;">
        <div class="top_poptitle"><span class="showmenu">消息<?php if($_G['member']['newpm']) { ?>(<?php echo $_G['member']['newpm'];?>)<?php } elseif($_G['member']['newprompt']) { ?>(<?php echo $_G['member']['newprompt'];?>)<?php } ?></span></span></div>
        <?php if($_G['member']['newpm']) { ?>
        <ul>
            <li><?php echo $_G['member']['newpm'];?>条新消息，<a class="light" href="home.php?mod=space&amp;do=pm&amp;filter=newpm">查看消息</a></li>
        </ul>
        <div class="divider"></div>
        <?php } elseif($_G['member']['newprompt']) { ?>
        <ul>
            <li><?php echo $_G['member']['newprompt'];?>条新通知，<a class="light" href="home.php?mod=space&amp;do=notice">查看通知</a></li>
        </ul>
        <div class="divider"></div>
        <?php } ?>
        <ul class="listmenu">
            <li><a href="home.php?mod=space&amp;do=notice&amp;type=post&amp;isread=1"><i class="ic16"></i>查看所有回复</a></li>
            <li><a href="home.php?mod=space&amp;do=notice&amp;type=at&amp;isread=1"><i class="ic17"></i>查看@我</a></li>
            <li><a href="home.php?mod=space&amp;do=pm&amp;isread=1"><i class="ic18"></i>查看短消息</a></li>
            <li><a href="home.php?mod=space&amp;do=notice&amp;isread=1"><i class="ic20"></i>查看通知</a></li>
        </ul>
    </div>
    <!-- 我的帐号 -->
    <div id="mn_myaccount_menu" class="top_popmenu" style="display:none;">
        <div class="top_poptitle"><a href="home.php?mod=space&amp;uid=<?php echo $_G['uid'];?>&amp;do=profile&amp;from=space" class="showmenu">帐号</a></div>
        <div class="my_avatar"> <a class="avatar" href="home.php?mod=spacecp&amp;ac=avatar"><img src="uc_server/avatar.php?uid=<?php echo $_G['uid'];?>&amp;size=small" /></a>
            <p class="avatar_info"> <a href="home.php?mod=space&amp;uid=<?php echo $_G['uid'];?>&amp;do=profile&amp;from=space"><?php echo $_G['member']['username'];?></a><br>
                <a href="home.php?mod=spacecp&amp;ac=avatar" class="light">修改头像</a> </p>
        </div>


        <div class="divider"></div>
        <ul class="listmenu">
            <li><a href="home.php?mod=spacecp"><i class="ic21"></i>个人资料</a></li>
            <li><a href="home.php?mod=spacecp&amp;ac=plugin&amp;id=qqconnect:spacecp"><i class="ic22"></i>帐号绑定</a></li>
            <li><a href="home.php?mod=spacecp&amp;ac=profile&amp;op=password"><i class="ic23"></i>修改密码</a></li>
        </ul>
        <div class="divider"></div>
        <ul class="listmenu">
            <li><a href="home.php?mod=space&amp;uid=<?php echo $_G['uid'];?>&amp;do=thread&amp;view=me&amp;from=space"><i class="ic24"></i>我的帖子</a></li>
            <li><a href="home.php?mod=space&amp;do=favorite&amp;view=me"><i class="ic25"></i>我的收藏</a></li>
            <li><a href="home.php?mod=medal"><i class="ic26"></i>荣誉勋章</a></li>
        </ul>
        <div class="divider"></div>
        <ul class="listmenu">
            <?php if(check_diy_perm($topic)) { ?>
            <li><a href="javascript:openDiy();" title="打开 DIY 面板"><i class="ic21"></i>打开DIY</a></li>
            <?php } ?>
            <?php if(($_G['group']['allowmanagearticle'] || $_G['group']['allowpostarticle'] || $_G['group']['allowdiy'] || getstatus($_G['member']['allowadmincp'], 4) || getstatus($_G['member']['allowadmincp'], 6) || getstatus($_G['member']['allowadmincp'], 2) || getstatus($_G['member']['allowadmincp'], 3))) { ?>
            <li><a href="portal.php?mod=portalcp"><i class="ic24"></i><?php if($_G['setting']['portalstatus'] ) { ?>门户管理<?php } else { ?>模块管理<?php } ?></a></li>
            <?php } ?> 
            <?php if($_G['uid'] && $_G['group']['radminid'] > 1) { ?>
            <li><a href="forum.php?mod=modcp&amp;fid=<?php echo $_G['fid'];?>" target="_blank"><i class="ic24"></i><?php echo $_G['setting']['navs']['2']['navname'];?>管理</a></li>
            <?php } ?> 
            <?php if($_G['uid'] && $_G['adminid'] == 1 && $_G['setting']['cloud_status']) { ?>
            <li><a href="admin.php?frames=yes&amp;action=cloud&amp;operation=applist" target="_blank"><i class="ic22"></i>云平台</a></li>
            <?php } ?> 
            <?php if($_G['uid'] && getstatus($_G['member']['allowadmincp'], 1)) { ?>
            <li><a href="admin.php" target="_blank"><i class="ic20"></i>管理中心</a></li>
            <?php } ?>
            <li><a href="member.php?mod=logging&amp;action=logout&amp;formhash=<?php echo FORMHASH;?>"><i class="ic27"></i>退出</a></li>
        </ul>
    </div>
    <?php } ?> 
    <!-- 顶部导航 结束 -->
    <div style=" height:50px;"></div>
    <?php if(!IS_ROBOT) { ?> 

    <?php if(!empty($_G['style']['extstyle'])) { ?>
    <!-- 配色选择 -->
    <div id="styleBox" style="display:none">
        <?php if(!$_G['style']['defaultextstyle']) { ?><span class="sslct_btn" onClick="extstyle('')" title="默认"><i><em>默认</em></i></span><?php } ?>
        <?php if(is_array($_G['style']['extstyle'])) foreach($_G['style']['extstyle'] as $extstyle) { ?>        <span class="sslct_btn" onClick="extstyle('<?php echo $extstyle['0'];?>')" title="<?php echo $extstyle['1'];?>"><i style='background:url(<?php echo $extstyle['0'];?>/jeavi_style.jpg) no-repeat 0px 0px'>
                <em style="background:<?php echo $extstyle['2'];?>"><?php echo $extstyle['1'];?></em>
            </i></span>
        <?php } ?>
        <!-- 配色选择 -->
    </div>
    <?php } ?>



    <div id="qmenu_menu" class="p_pop <?php if(!$_G['uid']) { ?>blk<?php } ?>" style="display: none;"> 
        <?php if($_G['uid']) { ?>
        <ul>
            <?php if(is_array($_G['setting']['mynavs'])) foreach($_G['setting']['mynavs'] as $nav) { ?> 
            <?php if($nav['available'] && (!$nav['level'] || ($nav['level'] == 1 && $_G['uid']) || ($nav['level'] == 2 && $_G['adminid'] > 0) || ($nav['level'] == 3 && $_G['adminid'] == 1))) { ?>
            <li><?php echo $nav['code'];?></li>
            <?php } ?> 
            <?php } ?>
        </ul>
        <?php } elseif($_G['connectguest']) { ?>
        <div class="ptm pbw hm"> 请先<br /><a class="xi2" href="member.php?mod=connect"><strong>完善帐号信息</strong></a> 或 <a href="member.php?mod=connect&amp;ac=bind" class="xi2 xw1"><strong>绑定已有帐号</strong></a><br />后使用快捷导航 </div>
        <?php } else { ?>
        <div class="ptm pbw hm"> 请 <a href="javascript:;" class="xi2" onclick="lsSubmit()"><strong>登录</strong></a> 后使用快捷导航<br />没有帐号？<a href="member.php?mod=<?php echo $_G['setting']['regname'];?>" class="xi2 xw1"><?php echo $_G['setting']['reglinkname'];?></a> </div>
        <?php } ?> 
    </div>
    <?php } ?> 

    <?php echo adshow("headerbanner/wp a_h");?>    <?php if($_G['basescript'] != 'member' && $_G['basescript'] != 'connect') { ?>

    <!-- logo end -->
    <div class="nav_contents">
        <div class="c1">
            <?php echo adshow("subnavbanner/a_mu");?>            <?php if(!empty($_G['setting']['pluginhooks']['global_header'])) echo $_G['setting']['pluginhooks']['global_header'];?>
            <?php } ?>

        </div>
    </div>
    <?php } ?> 
    <div  id="wp" class="wp">
        <div class="jv_bbs">

