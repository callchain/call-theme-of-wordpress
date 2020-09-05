<meta name="viewport" content="width=device-width, initial-scale=1,minmum-scale=1,maxmum-scale=1,user-scalable=no">
<?php get_header(); ?><?php $lang = $_COOKIE['lang'];?> 

<!-- <div class="search-box">
	<div class="search-wrap">
	    <input type="text" placeholder="<?php echo LangArray($lang,'page4'); ?>">
	    <span></span>
	</div>
</div> -->
<style>
	h1{
		color:#1e1e1e;
	}
	.article_divBanner{
		width:100%;
	}
	.article_divBanner img{
		width:100%;
	}
	.swiper-container{
		border:1px solid #eee;
	}
	.left_list>ul>li:hover a{
		color:#c91c46;
	}
	@media screen and (min-width: 1200px){
		.bigBox{
			width:100%;
			height:740px;
		}
		.cutClass{
			width:80%;
			height:740px;
			margin:0 auto;
			padding-top:120px;
		}
		.titless{
			width:100%;
		}
		.titles>h1{
			font-size:54px;
			height:60px;
			line-height:60px;
		}
		.contentNews{
			margin-top:70px;
			display:flex;
		}
		.left_list{
			flex:1;
		}
		.left_list>ul>li{
			height:50px;
			line-height:50px;
			color:#cccccc;			
			overflow: hidden;
			text-overflow: ellipsis;
			display: -webkit-box;
			-webkit-line-clamp: 1;
			-webkit-box-orient: vertical;
			list-style-position:inside;
			
		}
		.left_list>ul>li>a{
			font-size:20px;
			color:#646464;
			text-decoration:none;
			
			
		}		
		.right_pic{
			flex:1;
			position:relative;
		}
		.swiper-container{
			width:440px;
			height:330px;
		}
		.swiper-container img{
			width:100%;
			height:100%;
		}
		.moreNotice{
			position: absolute;
			right: 52px;
			z-index: 99;
			top: -39px;
			font-size: 14px;
			color: #7e7e7e;
			text-decoration: none!important;
		}
		.moreNotice:hover{
			color:#c91c46;
			text-decoration:none!important;
		}
		.banners .item{
			width:100%;
			height:100%
		}
		.banners img{
			width:100%;
			height:100%;
		}
		.carousel-indicators li{
			width:24px;
			height:7px;
			border:none;
			background:#ccc;			
		}
		.carousel-indicators .active{
			width:24px;
			height:7px;
			border:none;
			background:#c91c46;
		}
		.carousel-indicators{
			bottom:-36px;
		}
		.news-line{
			margin-top:30px;
			box-sizing:border-box;
		}
	}
	@media screen and (min-width: 992px) and (max-width: 1200px) {
		.bigBox{
			width:100%;
			height:880px;
		}
		.cutClass{
			width:90%;
			height:880px;
			margin:0 auto;
			padding-top:120px;
		}
		.titless{
			width:100%;
		}
		.titles>h1{
			font-size:54px;
			height:60px;
			line-height:60px;
		}
		.contentNews{
			margin-top:70px;
			display:flex;
		}
		.left_list{
			flex:1;
		}
		.left_list>ul>li{
			height:50px;
			line-height:50px;
			color:#cccccc;
			overflow: hidden;
			text-overflow: ellipsis;
			display: -webkit-box;
			-webkit-line-clamp: 1;
			-webkit-box-orient: vertical;
			list-style-position:inside;
		}
		.left_list>ul>li>a{
			font-size:20px;
			color:#646464;
			text-decoration:none;
		}		
		.right_pic{
			flex:1;
			position:relative;
		}
		.swiper-container{
			width:440px;
			height:330px;
		}
		.swiper-container img{
			width:100%;
			height:100%;
		}
		.moreNotice{
			position: absolute;
			right: 0;
			z-index: 99;
			top: -91px;
			font-size: 14px;
			color: #646464;
		}
		.carousel-indicators li{
			width:24px;
			height:7px;
			border:none;
			background:#ccc;			
		}
		.carousel-indicators .active{
			width:24px;
			height:7px;
			border:none;
			background:#c91c46;
		}
		.carousel-indicators{
			bottom:-36px;
		}
		.news-line{
			margin-top:30px;
			box-sizing:border-box;
		}
	}
	@media screen and (min-width: 768px) and (max-width: 992px) {
		.bigBox{
			width:100%;
			height:880px;
		}
		.cutClass{
			width:95%;
			height:880px;
			margin:0 auto;
			padding-top:120px;
		}
		.titless{
			width:100%;
		}
		.titles>h1{
			font-size:50px;
			height:60px;
			line-height:60px;
		}
		.contentNews{
			margin-top:70px;
			display:flex;
		}
		.left_list{
			flex:1;
		}
		.left_list>ul>li{
			height:50px;
			line-height:50px;
			color:#cccccc;
			overflow: hidden;
			text-overflow: ellipsis;
			display: -webkit-box;
			-webkit-line-clamp: 1;
			-webkit-box-orient: vertical;
			list-style-position:inside;
		}
		.left_list>ul>li>a{
			font-size:16px;
			color:#646464;
			text-decoration:none;
		}		
		.right_pic{
			flex:1;
			position:relative;
		}
		.swiper-container{
			width:440px;
			height:330px;
		}
		.swiper-container img{
			width:100%;
			height:100%;
		}
		.moreNotice{
			position: absolute;
			right: 0;
			z-index: 99;
			top: -91px;
			font-size: 12px;
			color: #646464;
		}
		.carousel-indicators li{
			width:24px;
			height:7px;
			border:none;
			background:#ccc;			
		}
		.carousel-indicators .active{
			width:24px;
			height:7px;
			border:none;
			background:#c91c46;
		}
		.carousel-indicators{
			bottom:-36px;
		}
		.news-line{
			margin-top:30px;
			box-sizing:border-box;
		}
	}
	@media screen and (max-width: 768px){
		.article_divBanner{
			width:100%;
		}
		.article_divBanner img{
			width:100%;
		}
		.bigBox{
			width: 100%;
			padding: 3rem;
			padding-bottom: 10rem;
		}
		.cutClass{
			width:100%;
		}
		.titless{
			width:100%;
		}
		.titless h1{
			font-size:2.5rem;
		}
		.news-line{
			width: 2.5rem;
			height: 0.3rem;
			margin-top:0.7rem;
		}
		.news-line img{
			width:100%;
			height:100%;
		}
		.left_list{
			padding:0 1.3rem;
			padding-bottom:2rem;
		}
		.left_list li{
			height:3rem;
			line-height:3rem;
			color:#ccc;
			overflow: hidden;
			text-overflow: ellipsis;
			display: -webkit-box;
			-webkit-line-clamp: 1;
			-webkit-box-orient: vertical;
			list-style-position:inside;
		}
		.left_list li a{
			font-size:1.5rem;
			color:#646464;
			text-decoration:none;
		}
		.right_pic{
			width:100%;
			height:18rem;
			position:relative;
		}
		.moreNotice{
			position:absolute;
			right:1rem;
			top:-3rem;
			color:#646464;
			font-size:1.5rem;
			text-decoration:none;
		}
		.swiper-container{
			width:300px;
			height:225px;
		}
		.swiper-container img{
			width:100%;
			height:100%;
		}
		.item img{
			width:100%;
			height:100%;
		}
		.article_divBanner img{
			width:260%;
		}
	}
	.left_list ul{
		padding-right:3rem;
	}
	.left_list li span{
		display: inline-block;
		width: 6px;
		height: 6px;
		background: #ccc;
		border-radius: 50%;
		margin-right: 10px;
	}
	.swiper-slide{
		width:100%;
	}
	.swiper-slide img{
		width:100%;
	}
	.swiper-pagination span{
		background:none;
		border:1px solid #fff;
		opacity:1;
	}
	.swiper-pagination-bullet-active{
		background:#fff!important;
	}

	
</style>
<div class="article_divBanner">
	<img class="article-banenr" src="<?php bloginfo('template_directory'); ?>/images/article-banner.jpg" alt="">
</div>
<div class="bigBox">
	<div class='cutClass'>
		<div class='titless'>
			<h1><?php echo LangArray($lang,'page3'); ?><div class="news-line"><img src="<?php bloginfo('template_directory'); ?>/images/faq-line.png" alt=""></div></h1>			
		</div>
			<?php 
				$cate_id = get_cat_ID('公告');
				$count =  get_category($cate_id)->count; 
				if($count <= 6):  
				else:
			?>
				<span><a href="<?php  bloginfo('siteurl'); ?>?page_id=<?php $id =  hui_get_page_ID('公告'); echo $id;?>"></span>
			<?php endif;?>
		<div class="contentNews">
			<div class="left_list">
				<ul>
					<?php
						$posts = get_posts( "category=$cate_id&numberposts=6" );
						if( $posts ) : foreach( $posts as $key=>$post ) : setup_postdata( $post );
					?>
					<li><span></span> <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
					<?php endforeach;endif;?>
				</ul>
			</div>
			<div class="right_pic">
				<a class='moreNotice' href="<?php  bloginfo('siteurl'); ?>?page_id=<?php $id =  hui_get_page_ID('公告'); echo $id;?>"><?php echo LangArray($lang,'front_page12'); ?> >></a>
				<div class="swiper-container anotice">				
					<div class="swiper-wrapper">
						<?php
								$posts = get_posts( "category=$cate_id&numberposts=6" );
								if( $posts ) : foreach( $posts as $key=>$post ) : setup_postdata( $post );
							?>						
							<div class="swiper-slide">
								<a href="<?php the_permalink(); ?>">
									<?php
										$id = get_the_ID();
										$timthumb_src = wp_get_attachment_image_src( get_post_thumbnail_id($id),'full' );
										echo '<img border="0" alt="" src="' . $timthumb_src[0] . '" width="360px" height="240px"  />';
									?>
								</a>
							</div>
						<?php endforeach;endif;?>
					</div>
					<div class="swiper-pagination"></div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="bigBox" style='background:#fafafc;border-top:1px solid #f0f0f2;border-bottom:1px solid #f0f0f2;'>
	<div class='cutClass'>
		<div class='titless'>
			<h1><?php echo LangArray($lang,'page2'); ?><div class="news-line"><img src="<?php bloginfo('template_directory'); ?>/images/faq-line.png" alt=""></div></h1>			
			
		</div>
			<?php 
				$cate_id = get_cat_ID('媒体新闻');
				$count =  get_category($cate_id)->count; 
				if($count <= 6):  
				else:
			?>
				<span><a href="<?php  bloginfo('siteurl'); ?>?page_id=<?php $id =  hui_get_page_ID('媒体新闻'); echo $id;?>"></span>
			<?php endif;?>
		<div class="contentNews">
			<div class="left_list">
				<ul>
					<?php
						$posts = get_posts( "category=$cate_id&numberposts=6" );
						if( $posts ) : foreach( $posts as $key=>$post ) : setup_postdata( $post );
					?>
					<li><span></span> <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
					<?php endforeach;endif;?>
				</ul>
			</div>
			<div class="right_pic">
				<a class='moreNotice' href="<?php  bloginfo('siteurl'); ?>?page_id=<?php $id =  hui_get_page_ID('媒体新闻'); echo $id;?>"><?php echo LangArray($lang,'front_page12'); ?> >></a>
				<div class="swiper-container news">				
					<div class="swiper-wrapper">
						<?php
								$posts = get_posts( "category=$cate_id&numberposts=6" );
								if( $posts ) : foreach( $posts as $key=>$post ) : setup_postdata( $post );
							?>
							<div class="swiper-slide">
								<a href="<?php the_permalink(); ?>">
									<?php
										$id = get_the_ID();
										$timthumb_src = wp_get_attachment_image_src( get_post_thumbnail_id($id),'full');
										echo '<img border="0" alt="" src="' . $timthumb_src[0] . '" width="360px" height="240px"  />';
									?>
								</a>
								
							</div>
						<?php endforeach;endif;?>
					</div>
					<div class="swiper-pagination"></div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="bigBox">
	<div class='cutClass'>
		<div class='titless'>
			<h1><?php echo LangArray($lang,'front_page10'); ?><div class="news-line"><img src="<?php bloginfo('template_directory'); ?>/images/faq-line.png" alt=""></div></h1>			
			
		</div>
			<?php 
				$cate_id = get_cat_ID('活动事件');
				$count =  get_category($cate_id)->count; 
				if($count <= 6):  
				else:
			?>
				<span><a href="<?php  bloginfo('siteurl'); ?>?page_id=<?php $id =  hui_get_page_ID('活动事件'); echo $id;?>"></span>
			<?php endif;?>
		<div class="contentNews">
			<div class="left_list">
				<ul>
					<?php
						$posts = get_posts( "category=$cate_id&numberposts=6" );
						if( $posts ) : foreach( $posts as $key=>$post ) : setup_postdata( $post );
					?>
					<li><span></span> <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
					<?php endforeach;endif;?>
				</ul>
			</div>
			<div class="right_pic">
				<a class='moreNotice' href="<?php  bloginfo('siteurl'); ?>?page_id=<?php $id =  hui_get_page_ID('活动事件'); echo $id;?>"><?php echo LangArray($lang,'front_page12'); ?> >></a>
				<div class="swiper-container aevent">				
					<div class="swiper-wrapper">
						<?php
								$posts = get_posts( "category=$cate_id&numberposts=6" );
								if( $posts ) : foreach( $posts as $key=>$post ) : setup_postdata( $post );
							?>
							<div class="swiper-slide">
								<a href="<?php the_permalink(); ?>">
									<?php
										$id = get_the_ID();
										$timthumb_src = wp_get_attachment_image_src( get_post_thumbnail_id($id),'full' );
										echo '<img border="0" alt="" src="' . $timthumb_src[0] . '" width="360px" height="240px"  />';
									?>
								</a>
								
							</div>
						<?php endforeach;endif;?>
					</div>
					<div class="swiper-pagination"></div>
				</div>
				
			</div>
		</div>
	</div>
</div>


<?php get_footer(); ?>

<script type='text/javascript' src='<?php bloginfo('template_directory'); ?>/jquery-1.11.1.min.js'></script>
<script type='text/javascript' src='<?php bloginfo('template_directory'); ?>/unslider.min.js'></script>
<script>
    	var mySwiper = new Swiper('.anotice', {
			autoplay:{
				delay: 2500,
				disableOnInteraction: false,
			},
			loop: 'true',
			pagination: {
				el: '.swiper-pagination',
				clickable :true
			},
		});
		var mySwiper2 = new Swiper('.news', {
			autoplay:{
				delay: 2500,
				disableOnInteraction: false,
			},
			loop: 'true',
			pagination: {
				el: '.swiper-pagination',
				clickable :true
			},
		});
		var mySwiper3 = new Swiper('.aevent', {
			autoplay:{
				delay: 2500,
				disableOnInteraction: false,
			},
			loop: 'true',
			pagination: {
				el: '.swiper-pagination',
				clickable :true
			},
		});
		
	$(document).ready(function(e) {
	    var unslider04 = $('#b03').unslider({
	        dots: true
	    }),
	    data04 = unslider04.data('unslider');
	    $('.unslider-arrow04').click(function() {
	        var fn = this.className.split(' ')[1];
	        data04[fn]();
	    });
	});

	$(document).ready(function(e) {
	    var unslider04 = $('#b04').unslider({
	        dots: true
	    }),
	    data04 = unslider04.data('unslider');
	    $('.unslider-arrow04').click(function() {
	        var fn = this.className.split(' ')[1];
	        data04[fn]();
	    });
	});

	$(document).ready(function(e) {
	    var unslider04 = $('#b05').unslider({
	        dots: true
	    }),
	    data04 = unslider04.data('unslider');
	    $('.unslider-arrow04').click(function() {
	        var fn = this.className.split(' ')[1];
	        data04[fn]();
	    });
	});


	
</script>