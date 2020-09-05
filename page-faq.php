<meta name="viewport" content="width=device-width, initial-scale=1,minmum-scale=1,maxmum-scale=1,user-scalable=no">
<?php get_header(); ?>
<?php $lang = $_COOKIE['lang'];?>
<style>
	*{
		font-size:1.5rem;
	}
	.faq-banner{
		padding:0;
	}
	@media screen and (max-width: 768px){
		.faq-time{
			margin-top:3rem!important;
		}
		.faq-line{
			margin-top:10px!important;
			margin-bottom:50px!important;
		}
		.faq-banner img{
			width:260%;
		}
		.faq-middle{
			padding:0.5rem 3rem;			
		}
		.faq-time h1{
			font-size:3rem!important;
		}
		.faq-time span{
			color: #999!important;
			height: 40px!important;
			line-height: 0!important;
			margin-right: 1rem!important;
			display: inline-block!important;
			float:none!important;
			margin-top:4rem;
		}
		.faq-answer{
			text-align:justify;
		}
		.faq-answer span{
			font-size:14px;
			line-height:24px;
		}
	}
	@media screen and (min-width: 768px){
		.faq-middle{
			padding:0.5rem 20%;
		}
	}

	.faq-time{
		margin-top: 90px;
		width: 100%;
		height: 40px;
		line-height:40px;
	}
	.faq-time  h1{
		margin:0;
		padding:0;
		font-size: 40px;
		font-weight: normal;
		color:#3c3c3c;
		float: left;
	}
	.faq-time  span{
		color:#999;
		float: right;
		height:40px;
		line-height:40px;
		margin-right:1rem;
	}
	.faq-line{
		margin-top:35px;
		width:120px;
		margin-bottom:60px;
		height:3px;
	}

	.faq-quest{
		margin-bottom:10px;
	}
	.faq-answer{
		line-height:30px;
		margin:10px 0;
		overflow: hidden;
	}
	.question-one{
		padding:0;
	}
	.question-one span{
		color:#323232;
	}

	.faq-answer img{
		float:left; 
		width: 25px;
		margin-top: 5px;
		margin-right: 5px;

	}

	.faq-answer span{
		float:left;
		width:100%;
		text-align: justify;
	}
	.last-question-one{
		margin-bottom:100px;
	}
	.faq-answer span b{
		display:inline-block;
		width:2rem;
		height:2rem;
		border:1px solid #323232;
		border-radius:50%;
		text-align:center;
		line-height:1.8rem;
		color:#323232;
	}


	.faq-quest span{
		width:100%;
		text-align: justify;
	}
	.faq-quest span b{
		display:inline-block;
		width:2rem;
		height:2rem;
		border:1px solid #323232;
		background:#323232;
		border-radius:50%;
		text-align:center;
		line-height:1.8rem;
		color:#fff;
		font-weight:normal;
	}
	
</style> 
<div class="faq-banner col-sm-12 col-xs-12">
	<img  src="<?php bloginfo('template_directory'); ?>/images/faq-banner.jpg" alt="">
</div>
<div class="faq-middle col-sm-12 col-xs-12">
	<div class="faq-time"><h1>CallChain  FAQ</h1><span><?php echo LangArray($lang,'faq1'); ?></span></div>
	<div class="faq-line"><img src="<?php bloginfo('template_directory'); ?>/images/faq-line.png" alt=""></div>


	<section class="question-one col-sm-12 col-xs-12">
		<div class="faq-quest">
			<span><b>Q</b> <?php echo LangArray($lang,'faq2'); ?></span>
		</div>
		<div class="faq-answer">
			
			<span><b>A</b> <?php echo LangArray($lang,'faq3'); ?></span>
		</div>
	</section>

	<section class="question-one col-sm-12 col-xs-12">
		<div class="faq-quest">
			
			<span><b>Q</b> <?php echo LangArray($lang,'faq4'); ?></span>
		</div>
		<div class="faq-answer">
			
			<span><b>A</b> <?php echo LangArray($lang,'faq5'); ?> </span>
		</div>
	</section>

	<section class="question-one col-sm-12 col-xs-12">
		<div class="faq-quest">
			
			<span><b>Q</b> <?php echo LangArray($lang,'faq8'); ?></span>
		</div>
		<div class="faq-answer">
			
			<span><b>A</b> <?php echo LangArray($lang,'faq9'); ?></span>
		</div>
	</section>

	<section class="question-one col-sm-12 col-xs-12">
		<div class="faq-quest">
			
			<span><b>Q</b> <?php echo LangArray($lang,'faq10'); ?></span>
		</div>
		<div class="faq-answer">
			
			<span><b>A</b> <?php echo LangArray($lang,'faq11'); ?></span>
		</div>
	</section>

	<section class="question-one col-sm-12 col-xs-12">
		<div class="faq-quest">
			
			<span><b>Q</b> <?php echo LangArray($lang,'faq12'); ?></span>
		</div>
		<div class="faq-answer">
			
			<span><b>A</b> <?php echo LangArray($lang,'faq13'); ?></span>
		</div>
	</section>


	<section class="question-one col-sm-12 col-xs-12">
		<div class="faq-quest">
			
			<span><b>Q</b> <?php echo LangArray($lang,'faq14'); ?></span>
		</div>
		<div class="faq-answer">
			
			<span><b>A</b> <?php echo LangArray($lang,'faq15'); ?></span>
		</div>
	</section>

	<section class="question-one col-sm-12 col-xs-12">
		<div class="faq-quest">
			
			<span><b>Q</b> <?php echo LangArray($lang,'faq16'); ?></span>
		</div>
		<div class="faq-answer">
			
			<span><b>A</b> <?php echo LangArray($lang,'faq17'); ?></span>
		</div>
	</section>

	<section class="question-one col-sm-12 col-xs-12">
		<div class="faq-quest">
			
			<span><b>Q</b> <?php echo LangArray($lang,'faq18'); ?></span>
		</div>
		<div class="faq-answer">
			
			<span><b>A</b> <?php echo LangArray($lang,'faq19'); ?></span>
		</div>
	</section>


	<section class="question-one col-sm-12 col-xs-12">
		<div class="faq-quest">
			
			<span><b>Q</b> <?php echo LangArray($lang,'faq20'); ?></span>
		</div>
		<div class="faq-answer">
			
			<span><b>A</b> <?php echo LangArray($lang,'faq21'); ?> </span>
		</div>
	</section>

	<section class="question-one col-sm-12 col-xs-12">
		<div class="faq-quest">
			
			<span><b>Q</b> <?php echo LangArray($lang,'faq22'); ?></span>
		</div>
		<div class="faq-answer">
			
			<span><b>A</b> <?php echo LangArray($lang,'faq23'); ?></span>
		</div>
	</section>

	<section class="question-one col-sm-12 col-xs-12 last-question-one">
		<div class="faq-quest">
			
			<span><b>Q</b> <?php echo LangArray($lang,'faq24'); ?></span>
		</div>
		<div class="faq-answer">
			
			<span><b>A</b> <?php echo LangArray($lang,'faq25'); ?></span>
		</div>
	</section>


</div>



<?php get_footer(); ?>
