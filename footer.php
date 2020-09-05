<div class="share col-sm-12 col-xs-12">
	<?php $lang = $_COOKIE['lang'];?> 
	<h1 class='col-sm-12 col-xs-12'><?php echo LangArray($lang,'footer'); ?></h1>
	<ul>
		<li><a href="https://www.facebook.com/cnzzhx/" target="_blank"><img src="<?php bloginfo('template_directory'); ?>/images/facebook.png" alt=""></a></li>
		<li><a href="https://twitter.com/callchain2" target="_blank"><img src="<?php bloginfo('template_directory'); ?>/images/twitter.png" alt=""></a></li>
		<li><a href="https://github.com/callchain" target="_blank"><img src="<?php bloginfo('template_directory'); ?>/images/github.png" alt=""></a></li>
		<li><a href="javascript:;"><img class="wechat" src="<?php bloginfo('template_directory'); ?>/images/wechat.png" alt=""><img class="weixin shows" src="<?php bloginfo('template_directory'); ?>/images/weixin.jpg" alt=""></a></li>
		<li><a href="javascript:;"><img class="qq" src="<?php bloginfo('template_directory'); ?>/images/qq.png" alt=""><img  class="qqqun shows" src="<?php bloginfo('template_directory'); ?>/images/qqqun.png" alt=""></a></li>
		<li><a href="https://weibo.com/u/6523578854" target="_blank"><img src="<?php bloginfo('template_directory'); ?>/images/weibo.png" alt=""></a></li>
		<li><a href="javascript:;"><img  class="biyong" src="<?php bloginfo('template_directory'); ?>/images/biyong.png" alt=""><img class="biyongerweima shows" src="<?php bloginfo('template_directory'); ?>/images/biyongerweima.png" alt=""></a></li>
	</ul>
</div>
<div class="footer col-sm-12 col-xs-12">
	COPYRIGHT© 2018 CALLCHAIN FOUNDATION
</div>
<style>
	.share ul li a{
		position:relative;
	}
	.share ul li:hover .shows{
		display: block;
		width: 9rem;
		z-index: 99;
		position: absolute;
		top: 53px;
		left: -17px;
	}
	@media screen and (min-width: 1200px){
		.share{
			width: 100%;
			height: 440px;
			padding-top: 80px;
			background: #1e1e1e;
		}
		.share h1{
			color:#fefefe;
			font-size:40px;
			text-align:center;
			font-weight:500;
		}
		.share ul{
			width: 100%;
			display: flex;
			padding: 0 15rem;
			margin-top: 180px;
		}
		.share ul li{
			list-style:none;
			flex:1;
			text-align:center;
			width:6rem;
			height:6rem;
		}
		.share ul li a{
			display:inline-block;
		}
		.shows{
			display:none;
		}
		.footer{
			width:100%;
			height:100px;
			text-align:center;
			line-height:100px;
			color:#969696;
			background:#141414;
			font-size: 10px!important;
		}
		.share ul li a img{
			width:80%;
		}
		
	}
	@media screen and (min-width: 992px) and (max-width: 1200px){
		.share{
			width: 100%;
			height: 452px;
			padding-top: 100px;
			background: #1e1e1e;
		}
		.share h1{
			color:#fefefe;
			font-size:40px;
			text-align:center;
		}
		.share ul{
			width:100%;
			display:flex;
			padding:0 8rem;
			margin-top:140px;
		}
		.share ul li{
			list-style:none;
			flex:1;
			text-align:center;
		}
		.shows{
			display:none;
		}
		.footer{
			width:100%;
			height:160px;
			text-align:center;
			line-height:160px;
			color:#7e7e7e;
			background:#141414;
			font-size: 10px!important;
		}
	}
	@media screen and (min-width: 768px) and (max-width: 992px){
		.share{
			width: 100%;
			height: 452px;
			padding-top: 100px;
			background: #1e1e1e;
		}
		.share h1{
			color:#fefefe;
			font-size:40px;
			text-align:center;
		}
		.share ul{
			width:100%;
			display:flex;
			padding:0 8rem;
			margin-top:140px;
		}
		.share ul li{
			list-style:none;
			flex:1;
			text-align:center;
		}
		.shows{
			display:none;
		}
		.footer{
			width:100%;
			height:160px;
			text-align:center;
			line-height:160px;
			color:#7e7e7e;
			background:#141414;
			font-size: 10px!important;
		}
	}
	@media screen and (max-width: 768px){
		.share{
			width: 100%;
			height: 315px;
			padding-top: 45px;
			background: #1e1e1e;
			
		}
		.share h1{
			color: #fefefe;
			font-size: 24px;
			text-align: center;
			font-weight: 500;
		}
		.share ul{
			width: 100%;
			display: flex;
			flex-wrap: wrap;
			margin-top: 73px;
		}
		.share ul li{
			list-style: none;
			width: 24%;
			text-align: center;
			height: 6rem;
			line-height: 6rem;
		}
		.share ul li a{
			display:inline-block;
		}
		.share ul li a img{
			width:50%;
		}
		.shows{
			display:none;
		}
		.footer{
			width:100%;
			height:90px;
			text-align:center;
			line-height:90px;
			color:#7e7e7e;
			background:#141414;
			font-size: 10px!important;
		}
	}
</style>

