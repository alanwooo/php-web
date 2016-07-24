<?php echo '异样设计（Eyoung）';exit;?>
<!--{if $_G['uid']}-->
<ul id="um">
		<strong class="vwmy{if $_G['setting']['connect']['allow'] && $_G[member][conisbind]} qq{/if}"><a href="home.php?mod=space&uid=$_G[uid]" target="_blank" title="{lang visit_my_space}" id="qmenu" onmouseover="delayShow(this, function () {showMenu({'ctrlid':'qmenu','pos':'34!','ctrlclass':'a','duration':2});showForummenu($_G[fid]);})">{$_G[member][username]}</a></strong>
		<!--{if $_G['group']['allowinvisible']}-->
		<span id="loginstatus">
			<a id="loginstatusid" href="member.php?mod=switchstatus" title="{lang login_switch_invisible_mode}" onclick="ajaxget(this.href, 'loginstatus');return false;" class="xi2"></a>
		</span>
		<!--{/if}-->
		<!--{hook/global_usernav_extra1}-->
		<span class="pipe">|</span><!--{hook/global_usernav_extra4}--><a href="javascript:;" id="myitem" onmouseover="showMenu({'ctrlid':'myitem'});">我的</a>
		<span class="pipe">|</span><a href="home.php?mod=space&do=pm" id="pm_ntc"{if $_G[member][newpm]} class="new"{/if}>{lang pm_center}</a>
		<span class="pipe">|</span><a href="home.php?mod=space&do=notice" id="myprompt"{if $_G[member][newprompt]} class="new"{/if} onmouseover="showMenu({'ctrlid':'myprompt'});">{lang remind}<!--{if $_G[member][newprompt]}-->($_G[member][newprompt])<!--{/if}--></a><span id="myprompt_check"></span>
        <!--{if empty($_G['cookie']['ignore_notice']) && ($_G[member][newpm] || $_G[member][newprompt_num][follower] || $_G[member][newprompt_num][follow] || $_G[member][newprompt])}--><script language="javascript">delayShow($('myprompt'), function() {showMenu({'ctrlid':'myprompt','duration':3})});</script><!--{/if}-->
		<!--{if $_G['setting']['taskon'] && !empty($_G['cookie']['taskdoing_'.$_G['uid']])}--><span class="pipe">|</span><a href="home.php?mod=task&item=doing" id="task_ntc" class="new">{lang task_doing}</a><!--{/if}-->
		<!--{if ($_G['group']['allowmanagearticle'] || $_G['group']['allowpostarticle'] || $_G['group']['allowdiy'] || getstatus($_G['member']['allowadmincp'], 4) || getstatus($_G['member']['allowadmincp'], 6) || getstatus($_G['member']['allowadmincp'], 2) || getstatus($_G['member']['allowadmincp'], 3))}-->
			<span class="pipe">|</span><a href="portal.php?mod=portalcp"><!--{if $_G['setting']['portalstatus'] }-->{lang portal_manage}<!--{else}-->{lang portal_block_manage}<!--{/if}--></a>
		<!--{/if}-->
		<!--{if $_G['uid'] && $_G['group']['radminid'] > 1}-->
			<span class="pipe">|</span><a href="forum.php?mod=modcp&fid=$_G[fid]" target="_blank">{lang forum_manager}</a>
		<!--{/if}-->
		<!--{if $_G['uid'] && getstatus($_G['member']['allowadmincp'], 1)}-->
			<span class="pipe">|</span><a href="admin.php" target="_blank">{lang admincp}</a>
		<!--{/if}-->
		<!--{hook/global_usernav_extra2}-->
		<span class="pipe">|</span><a href="member.php?mod=logging&action=logout&formhash={FORMHASH}">{lang logout}</a>
	</p>
	<p>
		<!--{hook/global_usernav_extra3}-->
	</p>
</div>
<!--{elseif !empty($_G['cookie']['loginuser'])}-->
<p>
	<strong><a id="loginuser" class="noborder"><!--{echo dhtmlspecialchars($_G['cookie']['loginuser'])}--></a></strong>
	<span class="pipe">|</span><a href="member.php?mod=logging&action=login" onclick="showWindow('login', this.href)">{lang activation}</a>
	<span class="pipe">|</span><a href="member.php?mod=logging&action=logout&formhash={FORMHASH}">{lang logout}</a>
</p>
<!--{elseif !$_G[connectguest]}-->
	<!--{template member/login_simple}-->
<!--{else}-->
<div id="um">
	<p>
		<strong class="vwmy qq"><a href="home.php?mod=space&uid=$_G[uid]" target="_blank" title="{lang visit_my_space}" id="qmenu" onmouseover="delayShow(this, function () {showMenu({'ctrlid':'qmenu','pos':'34!','ctrlclass':'a','duration':2});showForummenu($_G[fid]);})">{$_G[member][username]}</strong>
		<!--{hook/global_usernav_extra1}-->
		<span class="pipe">|</span>{lang usergroup}: $_G[group][grouptitle]
		<span class="pipe">|</span><a href="member.php?mod=logging&action=logout&formhash={FORMHASH}">{lang logout}</a>
	</p>
</div>
<!--{/if}-->
