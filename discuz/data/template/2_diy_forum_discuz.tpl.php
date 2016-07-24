<?php if(!defined('IN_DISCUZ')) exit('Access Denied'); 
0
|| checktplrefresh('./template/travel_linzi/forum/discuz.htm', './template/travel_linzi/common/pubsearchform2.htm', 1416439723, 'diy', './data/template/2_diy_forum_discuz.tpl.php', './template/travel_linzi', 'forum/discuz')
;?><?php include template('common/header_bbs'); ?><style id="diy_style" type="text/css"></style>
<style type="text/css">
    .recommend{ width:350px; height:280px;background-position: 5px -565px; float:left; overflow:hidden}
    .recommend h2{ height:28px; line-height:36px; font-size:16px; color:#000; padding-left:55px;}
    .r_con{ width:360px; height:280px; padding:0px; overflow:hidden; position:relative}
    .r_con_btn{ width:120px; height:31px;background-position: -372px 0; margin:16px auto; clear:both}
    .r_con_btn a{ text-indent:-999em; display:block; width:120px; height:31px; }
    .r_con_pic{ width:330px; height:220px; float:right;border: 1px solid #D0D0D0;box-shadow: 0 0 4px rgba(0, 0, 0, 0.15); padding: 4px;}
    .r_con_pic .share-cont{ height:23px; line-height:23px;}
    .list_con{ width:340px; height: 350px; overflow:hidden;}
    .yd {background-position: -500px 3px;padding: 0px 0px 0px 18px;text-indent: 0em;}
    #page_con{ height: 250px; width: 330px; display:block; padding: 0px 5px 0 0}
    .page{ width:100px; height:21px; position:absolute; top:240px; right:110px;}
    .page ul li{ width:14px; height:14px; margin:4px 5px 0 0; float:left; background:url("template/travel_linzi/style/pagination.png") no-repeat -25px 0; text-indent:-9999px; cursor:pointer}
    .page ul li.on{background:url("template/travel_linzi/style/pagination.png") no-repeat 0 0;}
</style>
<div class="bbs_top">
    <div class="wp">
        <div id="pt" class="bm cl">
            <?php if(empty($gid) && $announcements) { ?>
            <div class="y">
                <div id="an">
                    <dl class="cl">
                        <dt class="z xw1">公告:&nbsp;</dt>
                        <dd>
                            <div id="anc"><ul id="ancl"><?php echo $announcements;?></ul></div>
                        </dd>
                    </dl>
                </div>
                <script type="text/javascript">announcement();</script>
            </div>
            <?php } ?>
            <div class="z">
                <a href="./" class="nvhm" title="首页"><?php echo $_G['setting']['bbname'];?></a><em>&raquo;</em><a href="forum.php"><?php echo $_G['setting']['navs']['2']['navname'];?></a><?php echo $navigation;?>
            </div>
            <div class="z"><?php if(!empty($_G['setting']['pluginhooks']['index_status_extra'])) echo $_G['setting']['pluginhooks']['index_status_extra'];?></div>
        </div> 
        <div class="bbs_indtop fontYaHei">
            <p class="title">旅游论坛</p>
            <p class="slogen">大家帮助大家,分享精彩游记</p>
            <div class="slogen2">
                <em><?php echo $posts;?></em> 
                篇分享等你探索
            </div>
        </div>
    </div>
</div>
<div class="bbs_sldline2"></div>


<div  id="wp" class="wp">
    <div class="jv_bbs">



        <?php if(empty($gid)) { ?>
        <?php echo adshow("text/wp a_t");?>        <?php } ?>



        <?php if(empty($gid)) { ?>
        <div class="wp">
            <!--[diy=diy1]--><div id="diy1" class="area"></div><!--[/diy]-->
        </div>
        <?php } ?>

        <div id="ct" class="wp cl<?php if($_G['setting']['forumallowside']) { ?> ct2<?php } ?>">
            <?php if(empty($gid)) { ?>
            <?php } ?>
            <!--[diy=diy_chart]--><div id="diy_chart" class="area"></div><!--[/diy]-->
            <div class="lay_main">

                <!--首页四格开始-->
                <div class="bbs_indone clearfix">
                    <p class="titles fontYaHei">热门话题</p>
                    <div class="recommend">
                        <div class="r_con" id="r_con"> 
                            <!--[diy=page_con]-->
                            <div id="page_con" class="area"></div>
                            <!--[/diy]--> 

                        </div>
                        <script type="text/javascript">jQuery("#r_con").slide({ titCell:".page ul",mainCell:"#page_con .list_con",effect:"leftLoop",vis:1,scroll:1,autoPlay:true,autoPage:true});</script> 
                    </div>
                    <div class="bbs_topstory">
                        <!--[diy=bbs_topstory]-->
                        <div id="bbs_topstory" class="area"></div>
                        <!--[/diy]--> 
                    </div>
                </div>

                <!--首页四格结束-->
                <div class="bbs_sldline2"></div>

                <div class="bbs_maintit">
                    <h2 class="title fontYaHei">论坛版块</h2>
                    <p class="info"><?php echo $_G['cache']['userstats']['totalmembers'];?> 个会员 &nbsp;&nbsp;今日更新 <?php echo $todayposts;?> 篇贴子</p>
                    <div class="bbs_tabsearch">
                        <?php if(!empty($_G['setting']['pluginhooks']['global_nav_extra'])) echo $_G['setting']['pluginhooks']['global_nav_extra'];?> 
                        	
                        <style  type="text/css">
#scbar { overflow: visible; position: relative; background:none!important; border-bottom: none }
#sg{ background: #FFF; width:456px; border: 1px solid #B2C7DA; }
.scbar_narrow #sg { width: 316px; }
#sg li { padding:0 8px; line-height:30px; font-size:14px; }
#sg li span { color:#999; }
.sml { background:#FFF; cursor:default; }
                      </style>
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
    <form id="scbar_form" class="search_form" style="width: 137px; float: right; none repeat scroll 0 0 #FFFFFF;line-height: 12px; height: 14px; border: 1px solid #ccc; padding: 5px 35px 5px 10px;" method="<?php if($_G['fid'] && !empty($searchparams['url'])) { ?>get<?php } else { ?>post<?php } ?>" autocomplete="off" onSubmit="searchFocus($('scbar_txt'))" action="<?php if($_G['fid'] && !empty($searchparams['url'])) { ?><?php echo $searchparams['url'];?><?php } else { ?>search.php?searchsubmit=yes<?php } ?>" target="_blank">
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

            <div style="display: none; position: absolute; top:37px; left:44px;" id="sg">
                <div id="st_box" cellpadding="2" cellspacing="0"></div>
            </div>
<?php } ?>
<table cellspacing="0" cellpadding="0">
<tr>
                            <td class="scbar_txt_td" valign="top"><input type="text" name="srchtxt" id="scbar_txt" style=" height: 14px; line-height: 12px" placeholder="搜索帖子" autocomplete="off" x-webkit-speech speech /></td>
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
                    </div>
                </div>
                <div class="bbs_topnav_box">
                    <!--[diy=bbs_topnav]-->
                    <div id="bbs_topnav" class="area"></div>
                    <!--[/diy]--> 
                </div>


                <?php if(!empty($_G['setting']['pluginhooks']['index_top'])) echo $_G['setting']['pluginhooks']['index_top'];?>
                <?php if(!empty($_G['cache']['heats']['message'])) { ?>
                <div class="bm">
                    <div class="bm_h cl">
                        <h2><?php echo $_G['setting']['navs']['2']['navname'];?>热点</h2>
                    </div>
                    <div class="bm_c cl">
                        <div class="heat z">
                            <?php if(is_array($_G['cache']['heats']['message'])) foreach($_G['cache']['heats']['message'] as $data) { ?>                            <dl class="xld">
                                <dt><?php if($_G['adminid'] == 1) { ?><a class="d" href="forum.php?mod=misc&amp;action=removeindexheats&amp;tid=<?php echo $data['tid'];?>" onclick="return removeindexheats()">delete</a><?php } ?>
                                <a href="forum.php?mod=viewthread&amp;tid=<?php echo $data['tid'];?>" target="_blank" class="xi2"><?php echo $data['subject'];?></a></dt>
                                <dd><?php echo $data['message'];?></dd>
                            </dl>
                            <?php } ?>
                        </div>
                        <ul class="xl xl1 heatl">
                            <?php if(is_array($_G['cache']['heats']['subject'])) foreach($_G['cache']['heats']['subject'] as $data) { ?>                            <li><?php if($_G['adminid'] == 1) { ?><a class="d" href="forum.php?mod=misc&amp;action=removeindexheats&amp;tid=<?php echo $data['tid'];?>" onclick="return removeindexheats()">delete</a><?php } ?>&middot; <a href="forum.php?mod=viewthread&amp;tid=<?php echo $data['tid'];?>" target="_blank" class="xi2"><?php echo $data['subject'];?></a></li>
                            <?php } ?>
                        </ul>
                    </div>
                </div>
                <?php } ?>

                <?php if(!empty($_G['setting']['pluginhooks']['index_catlist_top'])) echo $_G['setting']['pluginhooks']['index_catlist_top'];?>
                <div class="fl bm">
                    <?php if(!empty($collectiondata['follows'])) { ?>

                    <?php $forumscount = count($collectiondata['follows']);?>                    <?php $forumcolumns = 4;?>                    <?php $forumcolwidth = (floor(100 / $forumcolumns) - 0.1).'%';?>                    <div class="bm bmw <?php if($forumcolumns) { ?> flg<?php } ?> cl">
                        <div class="bm_h cl">
                            <span class="o">
                                <img id="category_-1_img" src="<?php echo IMGDIR;?>/<?php echo $collapse['collapseimg_-1'];?>" title="收起/展开" alt="收起/展开" onclick="toggle_collapse('category_-1');" />
                            </span>
                            <h2><a href="forum.php?mod=collection&amp;op=my">我订阅的专辑</a></h2>
                        </div>
                        <div id="category_-1" class="bm_c" style="<?php echo $collapse['category_-1']; ?>">
                            <table cellspacing="0" cellpadding="0" class="fl_tb">
                                <tr>
                                    <?php $ctorderid = 0;?>                                    <?php if(is_array($collectiondata['follows'])) foreach($collectiondata['follows'] as $key => $colletion) { ?>                                    <?php if($ctorderid && ($ctorderid % $forumcolumns == 0)) { ?>
                                </tr>
                                <?php if($ctorderid < $forumscount) { ?>
                                <tr class="fl_row">
                                    <?php } ?>
                                    <?php } ?>
                                    <td class="fl_g"<?php if($forumcolwidth) { ?> width="<?php echo $forumcolwidth;?>"<?php } ?>>
                                        <div class="fl_icn_g">
                                            <a href="forum.php?mod=collection&amp;action=view&amp;ctid=<?php echo $colletion['ctid'];?>" target="_blank"><img src="<?php echo $_G['style']['styleimgdir'];?>/forum<?php if($followcollections[$key]['lastvisit'] < $colletion['lastupdate']) { ?>_new<?php } ?>.gif" alt="<?php echo $colletion['name'];?>" /></a>
                                        </div>
                                        <dl>
                                            <dt><a href="forum.php?mod=collection&amp;action=view&amp;ctid=<?php echo $colletion['ctid'];?>"><?php echo $colletion['name'];?></a></dt>
                                            <dd><em>主题: <?php echo dnumber($colletion['threadnum']); ?></em>, <em>评论: <?php echo dnumber($colletion['commentnum']); ?></em></dd>
                                            <dd>
                                                <?php if($colletion['lastpost']) { ?>
                                                <?php if($forumcolumns < 3) { ?>
                                                <a href="forum.php?mod=redirect&amp;tid=<?php echo $colletion['lastpost'];?>&amp;goto=lastpost#lastpost" class="xi2"><?php echo cutstr($colletion['lastsubject'], 30); ?></a> <cite><?php echo dgmdate($colletion[lastposttime]);?> <?php if($colletion['lastposter']) { ?><?php echo $colletion['lastposter'];?><?php } else { ?><?php echo $_G['setting']['anonymoustext'];?><?php } ?></cite>
                                                <?php } else { ?>
                                                <a href="forum.php?mod=redirect&amp;tid=<?php echo $colletion['lastpost'];?>&amp;goto=lastpost#lastpost">最后发表: <?php echo dgmdate($colletion[lastposttime]);?></a>
                                                <?php } ?>
                                                <?php } else { ?>
                                                从未
                                                <?php } ?>
                                            </dd>
                                            <?php if(!empty($_G['setting']['pluginhooks']['index_followcollection_extra'][$colletion[ctid]])) echo $_G['setting']['pluginhooks']['index_followcollection_extra'][$colletion[ctid]];?>
                                        </dl>
                                    </td>
                                    <?php $ctorderid++;?>                                    <?php } ?>
                                    <?php if(($columnspad = $ctorderid % $forumcolumns) > 0) { echo str_repeat('<td class="fl_g"'.($forumcolwidth ? " width=\"$forumcolwidth\"" : '').'></td>', $forumcolumns - $columnspad);; } ?>
                                </tr>
                            </table>

                        </div>
                    </div>

                    <?php } ?>
                    <?php if(empty($gid) && !empty($forum_favlist)) { ?>
                    <?php $forumscount = count($forum_favlist);?>                    <?php $forumcolumns = $forumscount > 3 ? ($forumscount == 4 ? 4 : 5) : 1;?>                    <?php $forumcolwidth = (floor(100 / $forumcolumns) - 0.1).'%';?>                    <div class="bm bmw <?php if($forumcolumns) { ?> flg<?php } ?> cl">
                        <div class="bm_h cl">
                            <span class="o">
                                <img id="category_0_img" src="<?php echo IMGDIR;?>/<?php echo $collapse['collapseimg_0'];?>" title="收起/展开" alt="收起/展开" onclick="toggle_collapse('category_0');" />
                            </span>
                            <h2><a href="home.php?mod=space&amp;do=favorite&amp;type=forum">我收藏的版块</a></h2>
                        </div>
                        <div id="category_0" style="<?php echo $collapse['category_0']; ?>">
                            <table cellspacing="0" cellpadding="0" class="fl_tb">
                                <tr>
                                    <?php $favorderid = 0;?>                                    <?php if(is_array($forum_favlist)) foreach($forum_favlist as $key => $favorite) { ?>                                    <?php if($favforumlist[$favorite['id']]) { ?>
                                    <?php $forum=$favforumlist[$favorite[id]];?>                                    <?php $forumurl = !empty($forum['domain']) && !empty($_G['setting']['domain']['root']['forum']) ? 'http://'.$forum['domain'].'.'.$_G['setting']['domain']['root']['forum'] : 'forum.php?mod=forumdisplay&fid='.$forum['fid'];?>                                    <?php if($forumcolumns>1) { ?>
                                    <?php if($favorderid && ($favorderid % $forumcolumns == 0)) { ?>
                                </tr>
                                <?php if($favorderid < $forumscount) { ?>
                                <tr class="fl_row">
                                    <?php } ?>
                                    <?php } ?>
                                    <td class="fl_g"<?php if($forumcolwidth) { ?> width="<?php echo $forumcolwidth;?>"<?php } ?>>
                                        <div class="fl_icn_g"<?php if(!empty($forum['extra']['iconwidth']) && !empty($forum['icon'])) { ?> style="width: <?php echo $forum['extra']['iconwidth'];?>px;"<?php } ?>>
                                         <?php if($forum['icon']) { ?>
                                         <?php echo $forum['icon'];?>
                                         <?php } else { ?>
                                         <a href="<?php echo $forumurl;?>"<?php if($forum['redirect']) { ?> target="_blank"<?php } ?>><img src="<?php echo $_G['style']['styleimgdir'];?>/forum<?php if($forum['folder']) { ?>_new<?php } ?>.gif" alt="<?php echo $forum['name'];?>" /></a>
                                            <?php } ?>
                                        </div>
                                        <dl<?php if(!empty($forum['extra']['iconwidth']) && !empty($forum['icon'])) { ?> style="margin-left: <?php echo $forum['extra']['iconwidth'];?>px;"<?php } ?>>
                                            <dt><a href="<?php echo $forumurl;?>"<?php if($forum['redirect']) { ?> target="_blank"<?php } if($forum['extra']['namecolor']) { ?> style="color: <?php echo $forum['extra']['namecolor'];?>;"<?php } ?>><?php echo $forum['name'];?></a><?php if($forum['todayposts'] && !$forum['redirect']) { ?><em class="xw0 xi1" title="今日"> (<?php echo $forum['todayposts'];?>)</em><?php } ?></dt>
                                            <?php if(empty($forum['redirect'])) { ?><dd><em>主题: <?php echo dnumber($forum['threads']); ?></em>, <em>帖数: <?php echo dnumber($forum['posts']); ?></em></dd><?php } ?>
                                            <dd>
                                                <?php if($forum['permission'] == 1) { ?>
                                                私密版块
                                                <?php } else { ?>
                                                <?php if($forum['redirect']) { ?>
                                                <a href="<?php echo $forumurl;?>" class="xi2">链接到外部地址</a>
                                                <?php } elseif(is_array($forum['lastpost'])) { ?>
                                                <?php if($forumcolumns < 3) { ?>
                                                <a href="forum.php?mod=redirect&amp;tid=<?php echo $forum['lastpost']['tid'];?>&amp;goto=lastpost#lastpost" class="xi2"><?php echo cutstr($forum['lastpost']['subject'], 30); ?></a> <cite><?php echo $forum['lastpost']['dateline'];?> <?php if($forum['lastpost']['author']) { ?><?php echo $forum['lastpost']['author'];?><?php } else { ?><?php echo $_G['setting']['anonymoustext'];?><?php } ?></cite>
                                                <?php } else { ?>
                                                <a href="forum.php?mod=redirect&amp;tid=<?php echo $forum['lastpost']['tid'];?>&amp;goto=lastpost#lastpost">最后发表: <?php echo $forum['lastpost']['dateline'];?></a>
                                                <?php } ?>
                                                <?php } else { ?>
                                                从未
                                                <?php } ?>
                                                <?php } ?>
                                            </dd>
                                            <?php if(!empty($_G['setting']['pluginhooks']['index_favforum_extra'][$forum[fid]])) echo $_G['setting']['pluginhooks']['index_favforum_extra'][$forum[fid]];?>
                                        </dl>
                                    </td>
                                    <?php $favorderid++;?>                                    <?php } else { ?>
                                    <td class="fl_icn" <?php if(!empty($forum['extra']['iconwidth']) && !empty($forum['icon'])) { ?> style="width: <?php echo $forum['extra']['iconwidth'];?>px;"<?php } ?>>
                                        <?php if($forum['icon']) { ?>
                                        <?php echo $forum['icon'];?>
                                        <?php } else { ?>
                                        <a href="<?php echo $forumurl;?>"<?php if($forum['redirect']) { ?> target="_blank"<?php } ?>><img src="<?php echo $_G['style']['styleimgdir'];?>/forum<?php if($forum['folder']) { ?>_new<?php } ?>.gif" alt="<?php echo $forum['name'];?>" /></a>
                                        <?php } ?>
                                    </td>
                                    <td>
                                        <h2><a href="<?php echo $forumurl;?>"<?php if($forum['redirect']) { ?> target="_blank"<?php } if($forum['extra']['namecolor']) { ?> style="color: <?php echo $forum['extra']['namecolor'];?>;"<?php } ?>><?php echo $forum['name'];?></a><?php if($forum['todayposts'] && !$forum['redirect']) { ?><em class="xw0 xi1" title="今日"> (<?php echo $forum['todayposts'];?>)</em><?php } ?></h2>
                                        <?php if($forum['description']) { ?><p class="xg2"><?php echo $forum['description'];?></p><?php } ?>
                                        <?php if($forum['subforums']) { ?><p>子版块: <?php echo $forum['subforums'];?></p><?php } ?>
                                        <?php if($forum['moderators']) { ?><p>版主: <span class="xi2"><?php echo $forum['moderators'];?></span></p><?php } ?>
                                        <?php if(!empty($_G['setting']['pluginhooks']['index_favforum_extra'][$forum[fid]])) echo $_G['setting']['pluginhooks']['index_favforum_extra'][$forum[fid]];?>
                                    </td>
                                    <td class="fl_i">
                                        <?php if(empty($forum['redirect'])) { ?><span class="xi2"><?php echo dnumber($forum['threads']); ?></span><span class="xg1"> / <?php echo dnumber($forum['posts']); ?></span><?php } ?>
                                    </td>
                                    <td class="fl_by">
                                        <div>
                                            <?php if($forum['permission'] == 1) { ?>
                                            私密版块
                                            <?php } else { ?>
                                            <?php if($forum['redirect']) { ?>
                                            <a href="<?php echo $forumurl;?>" class="xi2">链接到外部地址</a>
                                            <?php } elseif(is_array($forum['lastpost'])) { ?>
                                            <a href="forum.php?mod=redirect&amp;tid=<?php echo $forum['lastpost']['tid'];?>&amp;goto=lastpost#lastpost" class="xi2"><?php echo cutstr($forum['lastpost']['subject'], 30); ?></a> <cite><?php echo $forum['lastpost']['dateline'];?> <?php if($forum['lastpost']['author']) { ?><?php echo $forum['lastpost']['author'];?><?php } else { ?><?php echo $_G['setting']['anonymoustext'];?><?php } ?></cite>
                                            <?php } else { ?>
                                            从未
                                            <?php } ?>
                                            <?php } ?>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="fl_row">

                                    <?php } ?>
                                    <?php } ?>
                                    <?php } ?>
                                    <?php if(($columnspad = $favorderid % $forumcolumns) > 0) { echo str_repeat('<td class="fl_g"'.($forumcolwidth ? " width=\"$forumcolwidth\"" : '').'></td>', $forumcolumns - $columnspad);; } ?>
                                </tr>
                            </table>

                        </div>
                    </div>
                    <?php echo adshow("intercat/bm a_c/-1");?>                    <?php } ?>
                    <?php if(is_array($catlist)) foreach($catlist as $key => $cat) { ?>                    <?php if(!empty($_G['setting']['pluginhooks']['index_catlist'][$cat[fid]])) echo $_G['setting']['pluginhooks']['index_catlist'][$cat[fid]];?>
                    <div class="bm bmw <?php if($cat['forumcolumns']) { ?> flg<?php } ?> cl">
                        <div class="bm_h cl">
                            <span class="o">
                                <img id="category_<?php echo $cat['fid'];?>_img" src="<?php echo IMGDIR;?>/<?php echo $cat['collapseimg'];?>" title="收起/展开" alt="收起/展开" onclick="toggle_collapse('category_<?php echo $cat['fid'];?>');" />
                            </span>
                            <?php if($cat['moderators']) { ?><span class="y">分区版主: <?php echo $cat['moderators'];?></span><?php } ?>
                            <?php $caturl = !empty($cat['domain']) && !empty($_G['setting']['domain']['root']['forum']) ? 'http://'.$cat['domain'].'.'.$_G['setting']['domain']['root']['forum'] : '';?>                            <h2><a href="<?php if(!empty($caturl)) { ?><?php echo $caturl;?><?php } else { ?>forum.php?gid=<?php echo $cat['fid'];?><?php } ?>" style="<?php if($cat['extra']['namecolor']) { ?>color: <?php echo $cat['extra']['namecolor'];?>;<?php } ?>"><?php echo $cat['name'];?></a></h2>
                        </div>
                        <div id="category_<?php echo $cat['fid'];?>" style="<?php echo $collapse['category_'.$cat['fid']]; ?>">
                            <table cellspacing="0" cellpadding="0" class="fl_tb">
                                <tr>
                                    <?php if(is_array($cat['forums'])) foreach($cat['forums'] as $forumid) { ?>                                    <?php $forum=$forumlist[$forumid];?>                                    <?php $forumurl = !empty($forum['domain']) && !empty($_G['setting']['domain']['root']['forum']) ? 'http://'.$forum['domain'].'.'.$_G['setting']['domain']['root']['forum'] : 'forum.php?mod=forumdisplay&fid='.$forum['fid'];?>                                    <?php if($cat['forumcolumns']) { ?>
                                    <?php if($forum['orderid'] && ($forum['orderid'] % $cat['forumcolumns'] == 0)) { ?>
                                </tr>
                                <?php if($forum['orderid'] < $cat['forumscount']) { ?>
                                <tr class="fl_row">
                                    <?php } ?>
                                    <?php } ?>
                                    <!--三栏开始-->
                                    <td class="fl_g" width="<?php echo $cat['forumcolwidth'];?>">
                                        <div class="fl_icn_g"<?php if(!empty($forum['extra']['iconwidth']) && !empty($forum['icon'])) { ?> style="width: <?php echo $forum['extra']['iconwidth'];?>px;"<?php } ?>>
                                             <?php if($forum['icon']) { ?>
                                             <?php echo $forum['icon'];?>
                                             <?php } else { ?>
                                             <a href="<?php echo $forumurl;?>"<?php if($forum['redirect']) { ?> target="_blank"<?php } ?>><img src="<?php echo $_G['style']['styleimgdir'];?>/forum<?php if($forum['folder']) { ?>_new<?php } ?>.gif" alt="<?php echo $forum['name'];?>" /></a>
                                            <?php } ?>
                                        </div>
                                        <dl<?php if(!empty($forum['extra']['iconwidth']) && !empty($forum['icon'])) { ?> style="margin-left: <?php echo $forum['extra']['iconwidth'];?>px;"<?php } ?>>
                                            <dt><a href="<?php echo $forumurl;?>"<?php if($forum['redirect']) { ?> target="_blank"<?php } if($forum['extra']['namecolor']) { ?> style="color: <?php echo $forum['extra']['namecolor'];?>;"<?php } ?>><?php echo $forum['name'];?></a><?php if($forum['todayposts'] && !$forum['redirect']) { ?><em class="xw0 xi1" title="今日"> (<?php echo $forum['todayposts'];?>)</em><?php } ?></dt>
                                            <?php if($forum['description']) { ?><p class="xg2 bbs_info"><?php echo $forum['description'];?></p><?php } ?>
                                            <?php if(empty($forum['redirect'])) { ?><dd><em>主题: <?php echo dnumber($forum['threads']); ?></em>, <em>帖数: <?php echo dnumber($forum['posts']); ?></em></dd><?php } ?>
                                            <?php if(!empty($_G['setting']['pluginhooks']['index_forum_extra'][$forum[fid]])) echo $_G['setting']['pluginhooks']['index_forum_extra'][$forum[fid]];?>
                                        </dl>
                                    </td>
                                    <?php } else { ?>
                                    <td class="fl_icn" <?php if(!empty($forum['extra']['iconwidth']) && !empty($forum['icon'])) { ?> style="width: <?php echo $forum['extra']['iconwidth'];?>px;"<?php } ?>>
                                        <?php if($forum['icon']) { ?>
                                        <?php echo $forum['icon'];?>
                                        <?php } else { ?>
                                        <a href="<?php echo $forumurl;?>"<?php if($forum['redirect']) { ?> target="_blank"<?php } ?>><img src="<?php echo $_G['style']['styleimgdir'];?>/forum<?php if($forum['folder']) { ?>_new<?php } ?>.gif" alt="<?php echo $forum['name'];?>" /></a>
                                        <?php } ?>
                                    </td>
                                    <td>
                                        <h2><a href="<?php echo $forumurl;?>"<?php if($forum['redirect']) { ?> target="_blank"<?php } if($forum['extra']['namecolor']) { ?> style="color: <?php echo $forum['extra']['namecolor'];?>;"<?php } ?>><?php echo $forum['name'];?></a><?php if($forum['todayposts'] && !$forum['redirect']) { ?><em class="xw0 xi1" title="今日"> (<?php echo $forum['todayposts'];?>)</em><?php } ?></h2>
                                        <?php if($forum['description']) { ?><p class="xg2"><?php echo $forum['description'];?></p><?php } ?>
                                        <?php if($forum['subforums']) { ?><p>子版块: <?php echo $forum['subforums'];?></p><?php } ?>
                                        <?php if($forum['moderators']) { ?><p>版主: <span class="xi2"><?php echo $forum['moderators'];?></span></p><?php } ?>
                                        <?php if(!empty($_G['setting']['pluginhooks']['index_forum_extra'][$forum[fid]])) echo $_G['setting']['pluginhooks']['index_forum_extra'][$forum[fid]];?>
                                    </td>
                                    <td class="fl_i">
                                        <?php if(empty($forum['redirect'])) { ?><span class="xi2"><?php echo dnumber($forum['threads']); ?></span><span class="xg1"> / <?php echo dnumber($forum['posts']); ?></span><?php } ?>
                                    </td>
                                    <td class="fl_by">
                                        <div>
                                            <?php if($forum['permission'] == 1) { ?>
                                            私密版块
                                            <?php } else { ?>
                                            <?php if($forum['redirect']) { ?>
                                            <a href="<?php echo $forumurl;?>" class="xi2">链接到外部地址</a>
                                            <?php } elseif(is_array($forum['lastpost'])) { ?>
                                            <a href="forum.php?mod=redirect&amp;tid=<?php echo $forum['lastpost']['tid'];?>&amp;goto=lastpost#lastpost" class="xi2"><?php echo cutstr($forum['lastpost']['subject'], 30); ?></a> <cite><?php echo $forum['lastpost']['dateline'];?> <?php if($forum['lastpost']['author']) { ?><?php echo $forum['lastpost']['author'];?><?php } else { ?><?php echo $_G['setting']['anonymoustext'];?><?php } ?></cite>
                                            <?php } else { ?>
                                            从未
                                            <?php } ?>
                                            <?php } ?>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="fl_row">
                                    <?php } ?>
                                    <?php } ?>
                                    <?php echo $cat['endrows'];?>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <?php echo adshow("intercat/bm a_c/$cat[fid]");?>                    <?php } ?>
                    <?php if(!empty($collectiondata['data'])) { ?>

                    <?php $forumscount = count($collectiondata['data']);?>                    <?php $forumcolumns = 4;?>                    <?php $forumcolwidth = (floor(100 / $forumcolumns) - 0.1).'%';?>                    <div class="bm bmw <?php if($forumcolumns) { ?> flg<?php } ?> cl">
                        <div class="bm_h cl">
                            <span class="o">
                                <img id="category_-2_img" src="<?php echo IMGDIR;?>/<?php echo $collapse['collapseimg_-2'];?>" title="收起/展开" alt="收起/展开" onclick="toggle_collapse('category_-2');" />
                            </span>
                            <h2><a href="forum.php?mod=collection">淘专辑推荐</a></h2>
                        </div>
                        <div id="category_-2" class="bm_c" style="<?php echo $collapse['category_-2']; ?>">
                            <table cellspacing="0" cellpadding="0" class="fl_tb">
                                <tr>
                                    <?php $ctorderid = 0;?>                                    <?php if(is_array($collectiondata['data'])) foreach($collectiondata['data'] as $key => $colletion) { ?>                                    <?php if($ctorderid && ($ctorderid % $forumcolumns == 0)) { ?>
                                </tr>
                                <?php if($ctorderid < $forumscount) { ?>
                                <tr class="fl_row">
                                    <?php } ?>
                                    <?php } ?>
                                    <td class="fl_g"<?php if($forumcolwidth) { ?> width="<?php echo $forumcolwidth;?>"<?php } ?>>
                                        <div class="fl_icn_g">
                                            <a href="forum.php?mod=collection&amp;action=view&amp;ctid=<?php echo $colletion['ctid'];?>" target="_blank"><img src="<?php echo $_G['style']['styleimgdir'];?>/forum.gif" alt="<?php echo $colletion['name'];?>" /></a>
                                        </div>
                                        <dl>
                                            <dt><a href="forum.php?mod=collection&amp;action=view&amp;ctid=<?php echo $colletion['ctid'];?>"><?php echo $colletion['name'];?></a></dt>
                                            <dd><em>主题: <?php echo dnumber($colletion['threadnum']); ?></em>, <em>评论: <?php echo dnumber($colletion['commentnum']); ?></em></dd>
                                            <dd>
                                                <?php if($colletion['lastpost']) { ?>
                                                <?php if($forumcolumns < 3) { ?>
                                                <a href="forum.php?mod=redirect&amp;tid=<?php echo $colletion['lastpost'];?>&amp;goto=lastpost#lastpost" class="xi2"><?php echo cutstr($colletion['lastsubject'], 30); ?></a> <cite><?php echo dgmdate($colletion[lastposttime]);?> <?php if($colletion['lastposter']) { ?><?php echo $colletion['lastposter'];?><?php } else { ?><?php echo $_G['setting']['anonymoustext'];?><?php } ?></cite>
                                                <?php } else { ?>
                                                <a href="forum.php?mod=redirect&amp;tid=<?php echo $colletion['lastpost'];?>&amp;goto=lastpost#lastpost">最后发表: <?php echo dgmdate($colletion[lastposttime]);?></a>
                                                <?php } ?>
                                                <?php } else { ?>
                                                从未
                                                <?php } ?>
                                            </dd>
                                            <?php if(!empty($_G['setting']['pluginhooks']['index_datacollection_extra'][$colletion[ctid]])) echo $_G['setting']['pluginhooks']['index_datacollection_extra'][$colletion[ctid]];?>
                                        </dl>
                                    </td>
                                    <?php $ctorderid++;?>                                    <?php } ?>
                                    <?php if(($columnspad = $ctorderid % $forumcolumns) > 0) { echo str_repeat('<td class="fl_g"'.($forumcolwidth ? " width=\"$forumcolwidth\"" : '').'></td>', $forumcolumns - $columnspad);; } ?>
                                </tr>
                            </table>

                        </div>
                    </div>

                    <?php } ?>

                </div>

                <?php if(!empty($_G['setting']['pluginhooks']['index_middle'])) echo $_G['setting']['pluginhooks']['index_middle'];?>
                <div class="wp mtn">
                    <!--[diy=diy3]--><div id="diy3" class="area"></div><!--[/diy]-->
                </div>

                <?php if(empty($gid) && $_G['setting']['whosonlinestatus']) { ?>
                <div id="online" class="bm oll">
                    <div class="bm_h">
                        <?php if($detailstatus) { ?>
                        <span class="o"><a href="forum.php?showoldetails=no#online" title="收起/展开"><img src="<?php echo IMGDIR;?>/collapsed_no.gif" alt="收起/展开" /></a></span>
                        <h3>
                            <strong><a href="home.php?mod=space&amp;do=friend&amp;view=online&amp;type=member">在线会员</a></strong>
                            <span class="xs1">- <strong><?php echo $onlinenum;?></strong> 人在线
                                - <strong><?php echo $membercount;?></strong> 会员(<strong><?php echo $invisiblecount;?></strong> 隐身),
                                <strong><?php echo $guestcount;?></strong> 位游客
                                - 最高记录是 <strong><?php echo $onlineinfo['0'];?></strong> 于 <strong><?php echo $onlineinfo['1'];?></strong>.</span>
                        </h3>
                        <?php } else { ?>
                        <?php if(empty($_G['setting']['sessionclose'])) { ?>
                        <span class="o"><a href="forum.php?showoldetails=yes#online" title="收起/展开"><img src="<?php echo IMGDIR;?>/collapsed_yes.gif" alt="收起/展开" /></a></span>
                        <?php } ?>
                        <h3>
                            <strong>
                                <?php if(!empty($_G['setting']['whosonlinestatus'])) { ?>
                                在线会员
                                <?php } else { ?>
                                <a href="home.php?mod=space&amp;do=friend&amp;view=online&amp;type=member">在线会员</a>
                                <?php } ?>
                            </strong>
                            <span class="xs1">- 总计 <strong><?php echo $onlinenum;?></strong> 人在线
                                <?php if($membercount) { ?>- <strong><?php echo $membercount;?></strong> 会员,<strong><?php echo $guestcount;?></strong> 位游客<?php } ?>
                                - 最高记录是 <strong><?php echo $onlineinfo['0'];?></strong> 于 <strong><?php echo $onlineinfo['1'];?></strong>.</span>
                        </h3>
                        <?php } ?>
                    </div>
                    <?php if($_G['setting']['whosonlinestatus'] && $detailstatus) { ?>
                    <dl id="onlinelist" class="bm_c">
                        <dt class="ptm pbm bbda"><?php echo $_G['cache']['onlinelist']['legend'];?></dt>
                        <?php if($detailstatus) { ?>
                        <dd class="ptm pbm">
                            <ul class="cl">
                                <?php if($whosonline) { ?>
                                <?php if(is_array($whosonline)) foreach($whosonline as $key => $online) { ?>                                <li title="时间: <?php echo $online['lastactivity'];?>">
                                    <img src="<?php echo STATICURL;?>image/common/<?php echo $online['icon'];?>" alt="icon" />
                                    <?php if($online['uid']) { ?>
                                    <a href="home.php?mod=space&amp;uid=<?php echo $online['uid'];?>"><?php echo $online['username'];?></a>
                                    <?php } else { ?>
                                    <?php echo $online['username'];?>
                                    <?php } ?>
                                </li>
                                <?php } ?>
                                <?php } else { ?>
                                <li style="width: auto">当前只有游客或隐身会员在线</li>
                                <?php } ?>
                            </ul>
                        </dd>
                        <?php } ?>
                    </dl>
                    <?php } ?>
                </div>
                <?php } ?>

                <?php if(empty($gid) && ($_G['cache']['forumlinks']['0'] || $_G['cache']['forumlinks']['1'] || $_G['cache']['forumlinks']['2'])) { ?>
                <div class="bm lk">
                    <div id="category_lk" class="bm_c ptm">
                        <?php if($_G['cache']['forumlinks']['0']) { ?>
                        <ul class="m mbn cl"><?php echo $_G['cache']['forumlinks']['0'];?></ul>
                        <?php } ?>
                        <?php if($_G['cache']['forumlinks']['1']) { ?>
                        <div class="mbn cl">
                            <?php echo $_G['cache']['forumlinks']['1'];?>
                        </div>
                        <?php } ?>
                        <?php if($_G['cache']['forumlinks']['2']) { ?>
                        <ul class="x mbm cl">
                            <?php echo $_G['cache']['forumlinks']['2'];?>
                        </ul>
                        <?php } ?>
                    </div>
                </div>
                <?php } ?>

                <?php if(!empty($_G['setting']['pluginhooks']['index_bottom'])) echo $_G['setting']['pluginhooks']['index_bottom'];?>
            </div>

            <?php if($_G['setting']['forumallowside']) { ?>
            <div id="sd" class="lay_side">
                <?php if(!empty($_G['setting']['pluginhooks']['index_side_top'])) echo $_G['setting']['pluginhooks']['index_side_top'];?>
                <div class="bbs_sidetool2">
                    <p><a data-bn-ipg="bbs-writepost" class="btn_newbbs2" href="forum.php?mod=misc&amp;action=nav">写新帖</a></p>
                </div>
                <div class="bbs_lastread" id="bbs_lastread">
                    <p class="bbs_lastread_tit"><span><a href="forum.php?mod=guide&amp;view=my"> 我的帖子</a></span></p>
                </div>
                <div class="drag">
                    <!--[diy=diy2]--><div id="diy2" class="area"></div><!--[/diy]-->
                </div>
                <?php if(!empty($_G['setting']['pluginhooks']['index_side_bottom'])) echo $_G['setting']['pluginhooks']['index_side_bottom'];?>
            </div>
            <?php } ?>
        </div>
        <?php if($_G['group']['radminid'] == 1) { ?>
        <?php helper_manyou::checkupdate();?>        <?php } ?>
        <?php if(empty($_G['setting']['disfixednv_forumindex']) ) { ?><script>fixed_top_nv();</script><?php } ?>
        <?php include template('common/footer'); ?>