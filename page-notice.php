<meta name="viewport" content="width=device-width, initial-scale=1,minmum-scale=1,maxmum-scale=1,user-scalable=no">
<?php get_header(); ?><?php $lang = $_COOKIE['lang'];?>
<style>
	.article_divBanner{
		width:100%;
	}
	.article_divBanner img{
		width:100%;
	}
	.right_content span:nth-child(3){
		font-size:16px;
		color:#3c3c3c;
	}
	h1{
		color:#1e1e1e;
	}
	@media screen and (min-width: 1200px){
		.big_box{
			width:100%;
			padding-top: 80px;
    		padding-bottom: 150px;
		}
		.title{
			width:80%;
			margin:0 auto;
		}
		.title h1{
			font-size:54px;
			color:#3c3c3c;
		}
		.notice-line{
			margin-top:30px;
		}
		.notive_box{
			width:80%;
			height:325px;
			margin:0 auto;
			display:flex;
			border-bottom:1px solid #eeeeee;
		}
		.left_pic{
			flex:3;
			padding-top:50px;
		}
		.left_pic p{
			width: 325px;
			height: 244px;
			border-radius: 5px;

		}
		.left_pic p img{
			width:100%;
			height:100%;
			border-radius:5px;
			
		}
		.right_content{
			flex:7;
			padding-top:45px;
			position:relative;
			padding-left:50px;
		}
		.right_content p:nth-child(1){
			font-size:28px;
			color:#1e1e1e;
			padding:0;
			margin:0;
			overflow: hidden;
			text-overflow: ellipsis;
			display: -webkit-box;
			-webkit-line-clamp: 1;
			-webkit-box-orient: vertical;
			margin-bottom:10px;
		}
		.right_content span:nth-child(2){
			font-size:18px;
			color:#999999;
		}
		.right_content p:nth-child(4){
			font-size:18px;
			color:#646464;
			margin-top:20px;
			line-height:30px;
			display: -webkit-box;
			text-overflow: ellipsis;
			overflow : hidden;
			text-overflow: ellipsis;
			display: -webkit-box;
			-webkit-line-clamp: 3;
			-webkit-box-orient: vertical;
		}
		.right_content p:nth-child(4)>a{
			color:#646464;
			font-size:18px;
			line-height:30px;
			text-decoration: none;
			text-overflow: ellipsis;
			overflow : hidden;
			text-overflow: ellipsis;
			display: -webkit-box;
			-webkit-line-clamp: 3;
			-webkit-box-orient: vertical;
		}
		.right_content p:nth-child(4)>a:hover{
			color:#c91c46;
		}
		.right_content a:nth-child(5){
			position: absolute;
			right: 15px;
			bottom: 50px;
			font-size: 14px;
			color: #646464;
			text-decoration: none;
		}
		.right_content a:hover{
			color:#c91c46;
		}
	}
	@media screen and (min-width: 992px) and (max-width: 1200px){
		.big_box{
			width:100%;
			padding-top: 80px;
    		padding-bottom: 150px;
		}
		.title{
			width:80%;
			margin:0 auto;
		}
		.title h1{
			font-size:54px;
			color:#3c3c3c;
		}
		.notice-line{
			margin-top:30px;
		}
		.notive_box{
			width:80%;
			height:295px;
			margin:0 auto;
			display:flex;
			border-bottom:1px solid #eeeeee;
		}
		.left_pic{
			flex:3;
			padding-top:50px;
		}
		.left_pic p{
			width: 260px;
			height: 180px;
			border-radius: 5px;
		}
		.left_pic p img{
			width:100%;
			height:100%;
			border-radius:5px;			
		}
		.right_content{
			flex: 7;
			padding-top: 45px;
			position: relative;
			padding-left: 30px;
		}
		.right_content p:nth-child(1){
			font-size:28px;
			color:#1e1e1e;
			padding:0;
			margin:0;
			overflow: hidden;
			text-overflow: ellipsis;
			display: -webkit-box;
			-webkit-line-clamp: 1;
			-webkit-box-orient: vertical;
		}
		.right_content span:nth-child(2){
			font-size:16px;
			color:#999999;
		}
		.right_content span:nth-child(3){
			font-size:16px;
			color:#3c3c3c;
		}
		.right_content p:nth-child(4){
			font-size:16px;
			color:#646464;
			margin-top:15px;
			line-height:28px;
			display: -webkit-box;
			text-overflow: ellipsis;
			overflow : hidden;
			text-overflow: ellipsis;
			display: -webkit-box;
			-webkit-line-clamp: 3;
			-webkit-box-orient: vertical;
		}
		.right_content p:nth-child(4)>a{
			font-size:16px;
			color:#646464;
			line-height:28px;
			text-decoration: none;
			text-overflow: ellipsis;
			overflow : hidden;
			text-overflow: ellipsis;
			display: -webkit-box;
			-webkit-line-clamp: 3;
			-webkit-box-orient: vertical;
		}
		.right_content p:nth-child(4)>a:hover{
			color:#c91c46;
		}
		.right_content a:nth-child(5){
			position:absolute;
			right:10px;
			bottom:50px;
			font-size:14px;
			color:#646464;
			text-decoration:none;
		}
		.right_content a:nth-child(5):hover{
			color:#c91c46;
		}
	}
	@media screen and (min-width: 768px) and (max-width: 992px) {
		.big_box{
			width:100%;
			padding:40px 0;
		}
		.title{
			width:80%;
			margin:0 auto;
		}
		.title h1{
			font-size:40px;
			color:#3c3c3c;
		}
		.notice-line{
			margin-top:20px;
		}
		.notive_box{
			width:80%;
			height:180px;
			margin:0 auto;
			display:flex;
			border-bottom:1px solid #eeeeee;
		}
		.left_pic{
			flex:3;
			padding-top:45px;
		}
		.left_pic p{
			width: 130px;
			height: 90px;
			border-radius: 5px;

		}
		.left_pic p img{
			width:100%;
			height:100%;
			border-radius:5px;
			
		}
		.right_content{
			flex: 7;
			padding-top: 34px;
			position: relative;
			margin-left: -20px;
		}
		.right_content p:nth-child(1){
			font-size:20px;
			color:#1e1e1e;
			padding:0;
			margin:0;
			overflow: hidden;
			text-overflow: ellipsis;
			display: -webkit-box;
			-webkit-line-clamp: 1;
			-webkit-box-orient: vertical;
		}
		.right_content span:nth-child(2){
			font-size:14px;
			color:#999999;
		}
		.right_content span:nth-child(3){
			font-size:14px;
			color:#3c3c3c;
		}
		.right_content p:nth-child(4){
			font-size:14px;
			color:#646464;
			margin-top:5px;
			line-height:25px;
			display: -webkit-box;
			text-overflow: ellipsis;
			overflow : hidden;
			text-overflow: ellipsis;
			display: -webkit-box;
			-webkit-line-clamp: 3;
			-webkit-box-orient: vertical;
		}
		.right_content p:nth-child(4)>a{
			font-size:14px;
			color:#646464;
			line-height:25px;
			text-decoration: none;
			text-overflow: ellipsis;
			overflow : hidden;
			text-overflow: ellipsis;
			display: -webkit-box;
			-webkit-line-clamp: 3;
			-webkit-box-orient: vertical;
		}
		.right_content p:nth-child(4)>a:hover{
			color:#c91c46;
		}
		.right_content a:nth-child(5){
			position: absolute;
			right: 2px;
			bottom: 3px;
			font-size: 14px;
			color: #646464;
			text-decoration:none;
		}
		.right_content a:nth-child(5):hover{
			color:#c91c46;
		}
	}
	@media screen and (max-width: 768px){
		.breadcrumb{
			display:none;
		}
		.article_divBanner img{
			width:260%;
		}
		.big_box{
			padding: 0 30px;
			padding-top: 3rem;
			padding-bottom: 5rem;
		}
		.title{
			width:100%;
			margin:0 auto;
		}
		.title h1{
			font-size: 2.5rem;
    		color: #3c3c3c;
		}
		.notice-line{
			width: 2.5rem;
			height: 0.3rem;
			margin-top: 0.7rem;
		}
		.notive_box{
			width: 100%;
			height: 13rem;
			margin: 0 auto;
			display: flex;
			border-bottom: 1px solid #eeeeee;
		}
		.left_pic{
			flex:3;
			padding-top:2rem;
		}
		.left_pic p{
			width: 130px;
			height: 98px;
			border-radius: 5px;

		}
		.left_pic p img{
			width:100%;
			height:100%;
			
		}
		.right_content{
			flex: 7;
			padding-top: 2rem;
			position: relative;
			padding-left: 1rem;
		}
		.right_content p:nth-child(1){
			font-size:18px;
			color:#1e1e1e;
			padding:0;
			margin:0;
			overflow: hidden;
			text-overflow: ellipsis;
			display: -webkit-box;
			-webkit-line-clamp: 1;
			-webkit-box-orient: vertical;
			margin-bottom:0.4rem;
		}
		.right_content span:nth-child(2){
			font-size:12px;
			color:#999999;
		}
		.right_content span:nth-child(3){
			font-size:12px;
			color:#3c3c3c;
		}
		.right_content p:nth-child(4){
			display:block;
			font-size: 12px;
			line-height:1.7rem;
			color: #646464;
			margin-top: 8px;
			display: -webkit-box;
			text-overflow: ellipsis;
			overflow: hidden;
			text-overflow: ellipsis;
			display: -webkit-box;
			-webkit-line-clamp: 2;
			-webkit-box-orient: vertical;
		}
		.right_content p:nth-child(4) a{
			color: #646464;
			font-size: 12px;
			line-height:1.7rem;
			display: -webkit-box;
			text-overflow: ellipsis;
			overflow: hidden;
			text-overflow: ellipsis;
			display: -webkit-box;
			-webkit-line-clamp: 2;
			-webkit-box-orient: vertical;
			text-decoration:none;
		}
		.right_content p:nth-child(4) a:hover{
			color:#c91c46;
		}
		.right_content a:nth-child(5){
			position: absolute;
			right: 2px;
			bottom: 10px;
			font-size: 12px;
			color: #646464;
			text-decoration:none;
			display:none;
		}
		
	}
	.breadcrumb{
		float:right;
		padding:0;
		margin:0;
		background:none;
		margin-top:-140px;
	}
	.breadcrumb a{
		color:#646464;
		font-size:12px;
	}
	.right_content p a{
		color:#1e1e1e;
		text-decoration:none;
	}
	
</style>
<div class="article_divBanner">
	<img class="article-banenr" src="<?php bloginfo('template_directory'); ?>/images/article-banner.jpg" alt="">
</div>

<div class="big_box">
	<div class="title">
		<h1><?php echo LangArray($lang,'page3'); ?></h1>
		<div class="notice-line"><img src="<?php bloginfo('template_directory'); ?>/images/faq-line.png" alt=""></div>
		<ol class="breadcrumb">
			<li><a href="<?php  bloginfo('siteurl'); ?>">CallChain</a></li>
			<li><a href="<?php  bloginfo('siteurl'); ?>?page_id=<?php $id =  hui_get_page_ID('新闻'); echo $id;?>">新闻</a></li>
			<li><a href="#">公告</a></li>
		</ol>
	</div>


	<?php
		$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
		$cate_id = get_cat_ID('公告');
		$arr = query_posts("cat=".$cate_id."&posts_per_page=8&paged=".$paged);
		if ($arr):
        foreach( $arr as $post ) : setup_postdata( $post )
	?>

	<div class="notive_box">	
		<div class="left_pic">
			<p>
				<a href="<?php the_permalink(); ?>">
					<?php
						$id = get_the_ID();
						$timthumb_src = wp_get_attachment_image_src( get_post_thumbnail_id($id) ,'full');
						echo '<img border="0" alt="" src="' . $timthumb_src[0] . '" width="360px" height="240px"  />';
					?>
				</a>				
			</p>
		</div>
		<div class="right_content">
			<p><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></p>
			<span><?php the_time('Y-m-d H:i:s'); ?></span>&nbsp;&nbsp;<span><?php the_author()?>  </span>
			<p><a href="<?php the_permalink(); ?>"><?php $id = get_the_ID(); echo $res = get_post_meta($id, '摘要', true); ?></a></p>
			<a href="<?php the_permalink(); ?>"><?php echo LangArray($lang,'page1'); ?> >></a>
		</div>
	</div>
	<?php endforeach;endif;?>

</div>


<?php get_footer(); ?>