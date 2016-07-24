<?php echo '异样设计（Eyoung）';exit;?>
<!--{if CURMODULE != 'logging'}-->
	<script type="text/javascript" src="{$_G[setting][jspath]}logging.js?{VERHASH}"></script>
	<form method="post" autocomplete="off" id="lsform" action="member.php?mod=logging&action=login&loginsubmit=yes&infloat=yes&lssubmit=yes" onsubmit="{if $_G['setting']['pwdsafety']}pwmd5('ls_password');{/if}return lsSubmit();">
	<div class="fastlg cl">
		<span id="return_ls" style="display:none"></span>
		<ul class="eyoung_login">
         <a onclick="showWindow('login', this.href);return false;" href="member.php?mod=logging&amp;action=login" rel="nofollow"><span>登录</span></a>
         <span class="pipe">|</span><a href="member.php?mod=register" rel="nofollow"><span>注册</span></a>
    	 <a href="connect.php?mod=login&op=init&referer=index.php&statfrom=login_simple" class="login-qq" rel="nofollow"><span>QQ登录</span></a>
		 <a href="plugin.php?id=wechat:login" class="login-weixin" rel="nofollow"><span>微信登陆</span></a>
	 <a href="plugin.php?id=eyoung_weibo:index&operation=init" class="login-weibo" rel="nofollow"><span>微博登录</span></a>
    </ul>
	</div>
	</form>

	<!--{if $_G['setting']['pwdsafety']}-->
		<script type="text/javascript" src="{$_G['setting']['jspath']}md5.js?{VERHASH}" reload="1"></script>
	<!--{/if}-->

<!--{/if}-->      

