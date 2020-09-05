<!DOCTYPE html>
<html lang="en">
<?php $lang = $_COOKIE['lang'];?>
<head>
    <meta charset="UTF-8">
    <title>CallChain | Call For Yourself</title>
    <meta name="keywords"  content="" />
    <meta name="description"  content=""/>
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=no">
	<meta name="viewport" content="width=device-width, initial-scale=1,minmum-scale=1,maxmum-scale=1,user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
    <link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_url'); ?>" />    
    <link rel="shortcut icon" href="<?php bloginfo('template_directory'); ?>/images/bitbug_favicon.ico" />
    <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/swiper.min.css" />
    <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/images/video-js.css" />
    <script type='text/javascript' src="'<?php bloginfo('template_directory'); ?>/images/videojs-ie8.min.js"></script>
    <script type='text/javascript' src="'<?php bloginfo('template_directory'); ?>/images/video.js"></script>
    <script type='text/javascript' src='<?php bloginfo('template_directory'); ?>/swiper.min.js'></script>
    <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/bootstrap/bootstrap-css/bootstrap.css" /> 
    <?php wp_enqueue_style($style1);?>
    <style>
        *{
            padding:0;
            margin:0;
            box-sizing:border-box;
            text-decoration: none;
        }
        html,body{
            font-size:62.5%;
            width:100%;
            overflow-x:hidden;
        }
        .contents{
            width:100%;
            position:relative;
        }
        .nav-pills a{
            color:#fff;
        }
        .navs{
            width:100%;
            /* background:#1e1e1e; */
            /* height:70px; */
            /* border-bottom:1px solid #282828; */
			z-index:999;
			
        }
        .header-logo{
            float:left;
            height:3rem;
            width:3rem;
        }
        .nav{
            float:left;
            height:70px;
            margin-top:-1.5rem;
        }
        .nav li{
            height:70px;
            width:150px;
            
        }
        .nav>li:hover{
            background:#1e1e1e;
            color:#1e1e1e;
        }
        .nav>li:hover a{
            color:#999;
        }
        .open a{
            color:#1e1e1e;
        }
        .nav a{
            font-size:20px;
            height:70px;
            line-height:70px;
            text-align:center;
            font-size:1.6rem;
        }
        
        .dropdown-menu>li>a{
            line-height:35px;            
            color:#fff;
        }
        .header-logo{
            position: absolute;
            width: 68px;
            height:33px;
            top: 17px;
            left: 3%;
        }
        .header-logo>a{
            width:100%;
            height:100%
        }
        .header-logo>a>img{
            width:100%;
            height:100%;
        }
        .dropdownLanguage{
            width: 130px;
            height: 36px;
            float: right;
            position: absolute;
            top: 16px;
            right: 30px;
            z-index: 99;
            font-size:14px;
        }
        .dropdownLanguage img{
            margin-right:10px;
            width:22% !important;
        }
        .dropdownLanguage>button{
            width:100%;
            height:100%;
        }
        .dropdown-menu>li:nth-child(1){
            border-bottom:1px solid #3c3c3c;
        }
        .dropdown-menu{
            min-width: 125px;
            text-align: center;
            height: 93px;
            padding: 0;
            margin: 0;
            background: #000;
            opacity: 0.8;
            padding-top:5px;
        }
        .dropdown-menu li{
            position:relative;
            height:3.5rem;
        }
        .dropdown-menu li a{
            text-align: left;
            padding-left: 50px;
        }        
        .dropdown-menu li img{
            position: absolute;
            left: 16px;
            top: 13px;
			width: 18%;
			height:36%;
        }

        .dropdown-menu li:hover a{
            background:#000!important;
            opacity:0.8;
        }

        .dropdown-menu li:hover span{
            color:#999;
        }
        .modal-backdrop{
            z-index:97;
        }
        .phoneMenus{
            width: 3rem;
            height: 3rem;
            text-align: center;
            padding: 0;
            line-height: 3rem;
            position: absolute;
            right: 1rem;
            bottom: 1.9rem;
            font-size:2.8rem;
            background:none;
            border:none;
        }
        .phoneMenus:focus{
            background:none;
            border:none;
            outline-style:none;
        }
        .phoneMenus:hover{
            background:none;
            border:none;
            outline-style:none;
        }
        .header-logophone{
            width: 70px;
            height: 5rem;
            float: left;
            padding-top:1.7rem;
            
        }
        .modal-dialog{
            width:100%;
            height:100%;
        }
        .documentsa{
            padding:5rem;
        }
        
        .dropdownLanguages{
            width: 8rem;
            height: 3rem;
            position: absolute;
            left: 50%;
            top: 2rem;
            margin-left: -4rem;
        }
        .dropdownmentLanguage{
            min-width:8rem;
        }
        .navPc{
            padding: 0;
            margin: 0;
            width: 100%;
            display: flex;
            position: absolute;
            height: 70px;
            line-height: 70px;
            width: 500px;
            left: 15%;
        }
        .navPc>li{
            flex:1;
            text-align:center;
            list-style:none;
        }
        .navPc>li a{
            color:#fff;
            font-size:14px;
            text-decoration: none;
        }
        .navPc>li:hover .changeRed{
            color:#999;
        }

        .btn-default{
            background:none;
            color:#fff;
            border-color:#1e1e1e;
        }
        .open>.dropdown-toggle.btn-default:focus, .open>.dropdown-toggle.btn-default:hover{
            color: #fff;
            background-color: #1e1e1e;
            border-color: #1e1e1e;
            outline-style:none;
        }
        .btn-default.focus, .btn-default:focus{
            color: #fff;
            background-color: #1e1e1e;
            border-color: #1e1e1e;
            outline-style:none;
        }
        .open>.dropdown-toggle.btn-default{
            color: #fff;
            background-color: #1e1e1e;
            border-color: #1e1e1e;
            outline-style:none;
        }
        .btn-default:hover{
            color: #fff;
            background-color: #1e1e1e;
            border-color: #1e1e1e;
            outline-style:none;
        }
        .dropdown-menus{
            height:163px;
            padding:0;
        }
        .dropdown-menus li{
            height:40px;
            line-height:40px;
        }
        .dropdown-menus li a{
            padding: 0;
            color: #fff;
            text-align: left;
            height: 40px;
            line-height: 40px;
            border-bottom: 1px solid #3c3c3c;
            padding-left:30px;
        }
        .dropdown-menus li:last-child a{
            border:none;
        }
        .dropdown-menus li a:hover{
            color:#999;
        }
        .menus_phones{
            padding-left:2rem;
            box-sizing:border-box;
            height:49rem;
        }
        .menus_phone{
            background:#1e1e1e;
            width:100%;
            height:100%;
            margin:0 auto;
            border-radius:0;
            z-index:999;
        }
        .nav>li>a:focus, .nav>li>a:hover{
            background:none;
        }
        .navphone{
            width:100%;
            margin-top:1rem;
            height:100%;
            margin-left:0.5rem;
        }
        .navphone>li>a{
            line-height:2.5rem!important;
        }
        .navphone li{
            color:#fff;
            padding:0;
            margin:0;
            width:100%;
            border-bottom:none!important;
            height:4rem;
        }
        .navphone li a{
            text-align:left;

            height:4rem;
            /* line-height:3.3rem; */
        }
        .phone_language{
            padding-left:1rem;
        }
        .navphone ul li{
        border-bottom:1px solid #282828!important;
        }
        .navphone ul li:hover{
            background:none!important;
        }
        .navphone ul li a:hover{
            background:none!important;
        }
        .navphone>li:hover .changeRed{
            color:#999;
        }
        .navphone>li:hover ul li a{
            color:#fff;
        }
        .navphone>li>ul>li:hover a{
            color:#999;
        }

        @media screen and (max-width: 768px){
            .dropdown-menu li img{
                width:8%;
            }
            a.changeRed>img{
                width:9%;
                margin-top:-0.2rem;
            }
        }
        .language>span:hover{
            color:#999;
        }
        


        
    </style>

<style>
*{
	text-decoration:none!important;
}
.longnews h1:hover{
	color:#c91c46;
}
	.middle{
		width:100%;
	}
	.own{
		padding:0 1rem;
		padding-top:5%;
	}
	a.left{
		border:none!important;
	}
	.middle_wrap{
		position:relative;
	}
	@media screen and (min-width: 1900px){
		.zanzhu{
			height:600px;
		}
	}
	@media screen and (min-width: 1200px){
		.imglongnews>.left{
			border-top:1px solid #e6e6e6;
			border-bottom:1px solid #e6e6e6;
			padding-top:35px;
		}
		.videos{
			padding:0;
			position:relative;
		}
		.videos img{
			width:100%;
			height:80%;
		}
		.picContent{
			position: absolute;
			width:100%;
			height:50%;
			left:0;
			top:10%;
			padding:0;
			text-align:center;
		}
		.picContent>p{
			position:absolute;
			left:50%;
			margin-left:-7%;
			bottom:34%;
		}
		.picContent>span{
			position:absolute;
			display:block;
			font-size:1.8rem;
			margin:0;
			padding:0;
			color:#fff;
		}
		.picContent .span1{
			left: 50%;
			bottom:28%;
			margin-left: -12%;
			font-size:2.4rem;
		}
		.picContent .span2{
			left: 50%;
			bottom: 23%;
			margin-left: -12.5%;
			font-size: 2.4rem;
		}
		.picContent>.a_wrap{
			position: absolute;
			left: 50%;
			bottom: 19%;
			margin-left: -128px;
		}
		.picContent>.a_wrap a{
			font-size: 2.1rem;
			border: 1px solid #fff;
			padding: 0.5rem 1rem;
			border-radius: 0.5rem;
			color:#fff;
			text-decoration: none;
		}
		.picContent>.a_wrap a:nth-child(2){
			margin-left:2rem;
		}
		.picContent>b{
			position: absolute;
			bottom:0px;
			left:50%;
			margin-left:-0.7%;
		}
		.picContent>b>a{
			font-size:6rem;
			color:#fff;
			text-decoration: #fff;
		}
		.whatcall{
			width: 100%;
			text-align: center;
			padding-bottom: 2%;
			border-bottom: 1px solid #e6e6e6;
			padding-top: 80px;
			padding-bottom: 60px;
		}
		.whatcall h1{
			font-size:4rem;
			font-weight:500;
			color:#1e1e1e;
		}
		.whatcall p{
			font-size:15px;
			padding:1.5rem 27rem;
			line-height:2.2rem;
			text-align:center;
			font-weight:300;
		}
		.ownCall{
			width: 55%;
			display: flex;
			margin: 0 auto;
			padding: 87px 0 100px 0;
			
		}
		.ownCall p{
			font-size:15px;
			color:#3c3c3c;
			margin-top:25px;
			width:440px;
			text-align: justify;
			line-height:2.2rem;
			font-weight:300;
		}
		.ownCall span{
			font-size:24px;
			color:#3c3c3c;
			font-weight:500;
		}
		.callappication{
			margin-left:115px;
		}
		.ownCall div{
			position:relative;
		}
		.ownCall div>img{
			position:absolute;
			left:-70px;
			top:-8px;
			width:47px;
		}
		.phpneFont{
			position: absolute;
			right: 280px;
			font-size: 24px;
			color: #fff;
			top: -40px;
		}
		.middle_wrap .ios{
			right:400px;
		}
		.iosPic{
			display:none;
		}
		.androidPic{
			display:none;
		}
		.middle_wrap a{
			width: 100px;
			height: 36px;
			text-align: center;
			line-height: 36px;
			color: #337ab7;
			text-decoration: none;
			font-size: 1.3rem;
			color: #fff;
			position: absolute;
			right: 280px;
			bottom: -50px;
			border-radius: 0.5rem;
			background:#be384a;
			font-weight:300;
		}
		.news{
			text-align: center;
    		padding-top: 80px;
		}
		.news>h1{
			font-size:40px;
			color:#3c3c3c;
			font-weight:500;
		}
		.imglongnews{
			width: 68%;
			margin: 0 auto;
			height: 340px;
			display: flex;
			margin-top: 50px;
		}
		a.left{
			width:360px;
			height:300px;
			border-top:1px solid #e6e6e6;
			border-bottom:1px solid #e6e6e6;
			padding:30px 0;
		}
		.right_pic{
			width:360px;
		}
		.right_pic a.left{
			width: 3rem;
			height: 5rem;
			position: absolute;
			top: 50%;
			margin-top: -2.5rem;
			background: #000;
		}
		a.left .glyphicon{
			top:-11px;
		}
		a.right .glyphicon{
			top:19px!important;
		}
		
		/* .right_pic>img{
			width:360px;
		} */
		
		.right_pic a.right{
			width: 3rem;
			height: 5rem;
			position: absolute;
			top: 50%;
			margin-top: -2.5rem;
			background: #000;
		}
		.longnews{
			width:420px;
			height:340px;
			border-top:1px solid #e6e6e6;
			border-bottom:1px solid #e6e6e6;
			padding:30px 0;
			padding-left:27px;
			position:relative;
		}
		.longnews h1{
			margin:0;
			padding:0;
			text-align:left;
			font-size:24px;
			color:#3c3c3c;
			font-weight:600;
			overflow: hidden;
			white-space: nowrap;
			text-overflow: ellipsis;
		}
		.longnews ul{
			margin-top:15px;
		}
		.longnews ul li{
			text-align: left;
			line-height: 28px;
			list-style-position: inside;
			color:#ccc;
			overflow:hidden;
			text-overflow:ellipsis;
			white-space:nowrap;
			
		}
		.longnews ul li a{
			font-size:15px;
			color:#3c3c3c;
			text-decoration:none;
			font-weight:300;
		}
		.longnews ul li:hover a{
			color:#c91c46;
		}
		.longnews>a{
			text-decoration:none;
			color:#7e7e7e;
			position:absolute;
			right:20px;
			bottom:23px;
		
		}
		.shortnews{
			width:420px;
			height:340px;
			border-top:1px solid #e6e6e6;
			border-bottom:1px solid #e6e6e6;
			margin-left:50px;
			padding:30px;
			padding-top:42px;
		}
		.shortnews>h1{
			margin:0;
			padding:0;
			text-align:left;
			font-size:24px;
			color:#3c3c3c;
			font-weight:500;

		}
		.shortnews>ul{
			margin-top:15px;
		}
		.shortnews ul li{
			text-align: left;
			line-height: 28px;
			list-style-position: inside;
			color:#ccc;
			overflow:hidden;
			text-overflow:ellipsis;
			white-space:nowrap;			
		}
		.shortnews ul li a{
			font-size:15px;
			color:#3c3c3c;
			text-decoration:none;
			font-weight:300;
		}
		.shortnews ul li:hover a{
			color:#c91c46;
		}
		.shortnews>a{
			text-decoration:none;
			color:#7e7e7e;
			position:absolute;
			right:270px;
			bottom:23px;
		}
		.right_pic{
			height:270px;
		}
		.item{
			height:270px;
		}
		.right_pic img{
			width:100%;
			height:100%;
		}
		.zanzhu{
			background: #f5f5fa;
			padding: 0;
			margin: 0;
			padding-top: 80px;
			box-sizing: border-box;
			margin-top: 130px;
			padding-bottom: 130px;
		}
		.zanzhu h1{
			text-align:center;
			font-size:40px;
			color:#3c3c3c;
			font-weight:500;
		}
		.zanzhu ul{
			background: #f5f5fa;
			padding: 0;
			margin: 0;
			padding-top: 30px;
			box-sizing: border-box;
			margin: 0 auto;
			padding: 0 360px;
		}
		.zanzhu li{
			list-style:none;
			width:25%;
			padding:0;
			padding:0 9px;
			margin-top:30px;
		}
		.zanzhu img{
			width:100%;
		}
	}
	@media screen and (min-width: 992px) and (max-width: 1200px){
		.imglongnews>.left{
			border-top:1px solid #e6e6e6;
			border-bottom:1px solid #e6e6e6;
			padding-top:15px;
		}
		.videos{
			padding:0;
			position:relative;
		}
		.videos img{
			width:100%;
			height:80%;
		}
		.picContent{
			position: absolute;
			width:100%;
			height:50%;
			left:0;
			top:10%;
			padding:0;
			text-align:center;
		}		
		.picContent>p{
			position:absolute;
			left:50%;
			margin-left:-8%;
			bottom:34%;
		}
		.callchains{
			width:90%!important;
		}
		.picContent>span{
			position:absolute;
			display:block;
			font-size:1.8rem;
			margin:0;
			padding:0;
			color:#fff;
			font-weight:500;
		}
		.picContent .span1{
			left: 50%;
			bottom: 28%;
			margin-left: -14%;
			font-size: 2.2rem;
		}
		.picContent .span2{
			left: 50%;
			bottom: 23%;
			margin-left: -14.5%;
			font-size: 2.2rem;
		}
		.picContent>.a_wrap{
			position: absolute;
			left: 50%;
			bottom: 19%;
			margin-left: -100px;
		}
		.picContent>.a_wrap a{
			font-size: 1.5rem;
			border: 1px solid #fff;
			padding: 0.5rem 1rem;
			border-radius: 0.5rem;
			color:#fff;
			text-decoration: none;
			overflow:hidden;
			text-overflow:ellipsis;
			white-space:nowrap
		}
		.picContent>.a_wrap a:nth-child(2){
			margin-left:1rem;
		}
		.picContent>b{
			position: absolute;
			bottom: 0px;
			left: 50%;
			margin-left: -16px;
		}
		.picContent>b>a{
			font-size:6rem;
			color:#fff;
			text-decoration: #fff;
		}
		.whatcall{
			width:100%;
			text-align:center;
			padding-top:60px;
			padding-bottom:40px;
			border-bottom:1px solid #ccc;
		}
		.whatcall h1{
			font-size:3.6rem;
			color:#1e1e1e;
		}
		.whatcall p{
			font-size:1.5rem;
			padding:1.5rem 20rem;
		}
		.ownCall{
			width:70%;
			display:flex;
			margin:0 auto;
			padding:78px 0;
			
		}
		.ownCall p{
			font-size:14px;
			color:#3c3c3c;
			margin-top:24px;
			width:356px;
		}
		.ownCall span{
			font-size:22px;
			color:#3c3c3c;
		}
		.callappication{
			margin-left:115px;
		}
		.ownCall div{
			position:relative;
		}
		.ownCall div>img{
			position:absolute;
			width:40px;
			left:-55px;
			top:-8px;
		}
		.phpneFont{
			position: absolute;
			right: 173px;
			font-size: 24px;
			color: #fff;
			top: -52px;
			text-align:right;
		}
		.middle_wrap .ios{
			right:294px;
		}
		.iosPic{
			display:none;
		}
		.androidPic{
			display:none;
		}
		.middle_wrap a{
			width: 100px;
			height: 36px;
			text-align: center;
			line-height: 36px;
			color: #337ab7;
			text-decoration: none;
			font-size: 1.3rem;
			color: #fff;
			position: absolute;
			right: 173px;
			bottom: -3rem;
			border-radius: 0.5rem;
			background:#be384a;
		}
		.news{
			text-align:center;
			padding-top:85px;
		}
		.news>h1{
			font-size:40px;
			color:#3c3c3c;
		}

		.imglongnews{
			width:96%;
			margin:0 auto;
			height:300px;
			display:flex;
			margin-top:50px;
		}
		a.left{
			width:360px;
			height:300px;
			border-top:1px solid #e6e6e6;
			border-bottom:1px solid #e6e6e6;
			padding:30px 0;
		}
		.right_pic{
			width:360px;
		}
		.right_pic a.left{
			width: 2rem;
			height: auto;
			height: 5rem;
			position: absolute;
			top: 50%;
			margin-top: -2.5rem;
			background: #000;
		}
		a.left .glyphicon{
			top:-11px;
		}
		a.right .glyphicon{
			top:19px!important;
		}
		.right_pic>img{
			width:360px;
		}
		.right_pic a.right{
			width: 2rem;
			height: auto;
			height: 5rem;
			position: absolute;
			top: 50%;
			margin-top: -2.5rem;
			background: #000;
		}
		.longnews{
			width:420px;
			height:300px;
			border-top:1px solid #e6e6e6;
			border-bottom:1px solid #e6e6e6;
			padding:30px 0;
			padding-left:27px;
			position:relative;
		}
		.longnews h1{
			margin:0;
			padding:0;
			text-align:left;
			font-size:24px;
			color:#3c3c3c;
			overflow: hidden;
			white-space: nowrap;
			text-overflow: ellipsis;
			width:300px;
		}
		.longnews ul{
			margin-top:15px;
		}
		.longnews ul li{
			text-align: left;
			line-height: 28px;
			list-style-position: inside;
			color:#ccc;
			overflow:hidden;
			text-overflow:ellipsis;
			white-space:nowrap;
			text-decoration:none;
			
		}
		.longnews ul li:hover a{
			color:#c91c46;
		}
		.longnews ul li a{
			font-size:16px;
			color:#7e7e7e;
			text-decoration:none;
		}
		.longnews>a{
			text-decoration:none;
			color:#7e7e7e;
			position:absolute;
			right:20px;
			bottom:23px;
		}
		.shortnews{
			width:420px;
			height:300px;
			border-top:1px solid #e6e6e6;
			border-bottom:1px solid #e6e6e6;
			margin-left:50px;
			padding:30px;
		}
		.shortnews>h1{
			margin:0;
			padding:0;
			text-align:left;
			font-size:24px;
			color:#3c3c3c;
		}
		.shortnews>ul{
			margin-top:15px;
		}
		.shortnews ul li{
			text-align: left;
			line-height: 28px;
			list-style-position: inside;
			color:#ccc;
			overflow:hidden;
			text-overflow:ellipsis;
			white-space:nowrap;			
		}
		.shortnews ul li a{
			font-size:16px;
			color:#7e7e7e;
			text-decoration:none;
		}
		.shortnews ul li:hover a{
			color:#c91c46;
		}
		.shortnews>a{
			text-decoration:none;
			color:#7e7e7e;
			position:absolute;
			right:160px;
			bottom:23px;
		}
		.right_pic{
			height:270px;
		}
		.item{
			height:270px;
		}
		.right_pic img{
			width:100%;
			height:100%;
		}
		.zanzhu{
			background: #f5f5fa;
			height: 600px;
			padding: 0;
			margin: 0;
			padding-top: 120px;
			margin-top:160px;
			box-sizing: border-box;		
		}
		.zanzhu h1{
			text-align:center;
			font-size:40px;
			color:#3c3c3c;
		}
		.zanzhu ul{
			background: #f5f5fa;
			height: 620px;
			padding: 0;
			margin: 0;
			padding: 0 95px;
			padding-top: 43px;
			box-sizing: border-box;
		}
		.zanzhu li{
			list-style: none;
			width: 25%;
			padding: 0;
			/* margin-left: 8px; */
			margin: 0 auto;
			margin-top: 30px;
			padding:0 9px;
		}
		.zanzhu img{
			width:100%;
		}
	}
	
	@media screen and (min-width: 768px) and (max-width: 992px){
		.imglongnews>.left{
			border-top:1px solid #e6e6e6;
			border-bottom:1px solid #e6e6e6;
			padding-top:45px;
		}
		.videos{
			padding:0;
			position:relative;
		}
		.videos img{
			width:100%;
			height:80%;
		}
		.picContent{
			position: absolute;
			width:100%;
			height:50%;
			left:0;
			top:10%;
			padding:0;
			text-align:center;
		}
		.callchains{
			width:80%!important;
		}
		.picContent>p{
			position:absolute;
			left:50%;
			margin-left:-9%;
			bottom:34%;
		}
		.picContent>span{
			position:absolute;
			display:block;
			font-size:2rem;
			margin:0;
			padding:0;
			color:#fff;
		}
		.picContent .span1{
			left: 50%;
			bottom:28%;
			margin-left: -17%;
			font-size:2rem;
		}
		.picContent .span2{
			left: 50%;
			bottom: 22%;
			margin-left: -17.5%;
			font-size: 2rem;
		}
		.picContent>.a_wrap{
			position: absolute;
			left: 50%;
			bottom: 19%;
			margin-left: -10%;
		}
		.picContent>.a_wrap a{
			font-size: 1.4rem;
			border: 1px solid #fff;
			padding: 0.5rem 1rem;
			border-radius: 0.5rem;
			color:#fff;
			text-decoration: none;
		}
		.picContent>.a_wrap a:nth-child(2){
			margin-left:1rem;
		}
		.picContent>b{
			position: absolute;
			bottom: 0px;
			left: 50%;
			margin-left: -18px;
		}
		.whatcall{
			width:100%;
			text-align:center;
			padding-top:50px;
			padding-bottom:30px;
			border-bottom:1px solid #ccc;
		}
		.whatcall h1{
			font-size:3rem;
			color:#1e1e1e;
		}
		.whatcall p{
			font-size:1.5rem;
			padding:1.5rem 15rem;
		}
		.ownCall{
			width:85%;
			display:flex;
			margin:0 auto;
			padding:66px 0;
			
		}
		.ownCall p{
			font-size:14px;
			color:#3c3c3c;
			margin-top:20px;
			width:272px;
		}
		.ownCall span{
			font-size:20px;
			color:#3c3c3c;
		}
		.callappication{
			margin-left:115px;
		}
		.ownCall div{
			position:relative;
		}
		.ownCall div>img{
			position:absolute;
			width:35px;
			left:-50px;
			top:-6px;
		}
		.phpneFont{
			position: absolute;
			right: 154px;
			font-size: 22px;
			color: #fff;
			top: -52px;
			text-align:right;
		}
		.middle_wrap .ios{
			right:271px;
		}
		.iosPic{
			display:none;
		}
		.androidPic{
			display:none;
		}
		.middle_wrap a{
			width: 100px;
			height: 36px;
			text-align: center;
			line-height: 36px;
			color: #337ab7;
			text-decoration: none;
			font-size: 1.3rem;
			color: #fff;
			position: absolute;
			right: 154px;
			bottom: -3rem;
			border-radius: 0.5rem;
			background:#be384a;
		}
		.news{
			text-align:center;
			padding-top:60px;
		}
		.news>h1{
			font-size:36px;
			color:#3c3c3c;
		}

		.imglongnews{
			width: 100%;
			margin: 0 auto;
			height: 286px;
			display: flex;
			margin-top: 36px;
		}
		a.left{
			width: 360px;
			height: 286px;
			border-top: 1px solid #e6e6e6;
			border-bottom: 1px solid #e6e6e6;
			padding: 21px 0;
		}
		.right_pic{
			width:240px;
		}
		.right_pic a.left{
			width: 2rem;
			height: auto;
			height: 3rem;
			position: absolute;
			top: 50%;
			margin-top: -1.5rem;
			background: #000;
		}
		.right_pic a.right{
			width: 2rem;
			height: auto;
			height: 3rem;
			position: absolute;
			top: 50%;
			margin-top: -1.5rem;
			background: #000;
		}
		a.left .glyphicon{
			top:-11px;
		}
		a.right .glyphicon{
			top:8px!important;
		}
		.right_pic>img{
			width:100%;
		}
		.longnews{
			width:420px;
			height:286px;
			border-top:1px solid #e6e6e6;
			border-bottom:1px solid #e6e6e6;
			padding:21px 0;
			padding-left:27px;
			position:relative;
		}
		.longnews h1{
			margin:0;
			padding:0;
			text-align:left;
			font-size:22px;
			color:#3c3c3c;
			overflow: hidden;
			white-space: nowrap;
			text-overflow: ellipsis;
			width:300px;
		}
		.longnews ul{
			margin-top:15px;
		}
		.longnews ul li{
			text-align: left;
			line-height: 28px;
			list-style-position: inside;
			color:#ccc;
			overflow:hidden;
			text-overflow:ellipsis;
			white-space:nowrap;
			text-decoration:none;
		}
		.longnews ul li:hover a{
			color:#c91c46;
		}
		.longnews ul li a{
			text-decoration:none;
			font-size:14px;
			color:#7e7e7e;
		}
		.longnews>a{
			text-decoration:none;
			color:#7e7e7e;
			position:absolute;
			right:20px;
			bottom:23px;
		}
		.shortnews{
			width: 420px;
			height: 286px;
			border-top: 1px solid #e6e6e6;
			border-bottom: 1px solid #e6e6e6;
			padding: 21px 0;
			padding-left: 27px;
			position: relative;
			margin-left:2rem;
		}
		.shortnews>h1{
			margin:0;
			padding:0;
			text-align:left;
			font-size:24px;
			color:#3c3c3c;
		}
		.shortnews>ul{
			margin-top:15px;
		}
		.shortnews ul li{
			text-align: left;
			line-height: 28px;
			list-style-position: inside;
			color:#ccc;
			overflow:hidden;
			text-overflow:ellipsis;
			white-space:nowrap;			
		}
		.shortnews ul li a{
			font-size:16px;
			color:#7e7e7e;
			text-decoration:none;
		}
		.shortnews ul li:hover a{
			color:#c91c46;
		}
		.shortnews>a{
			text-decoration:none;
			color:#7e7e7e;
			position:absolute;
			right:10px;
			bottom:23px;
		}
		.right_pic{
			height:180px;
		}
		.item{
			height:180px;
		}
		.right_pic img{
			width:100%;
			height:100%;
		}
		.zanzhu{
			background: #f5f5fa;
			height: 547px;
			padding: 0;
			margin: 0;
			padding-top: 80px;
			margin-top: 130px;
			box-sizing: border-box;
		}
		.zanzhu h1{
			text-align:center;
			font-size:40px;
			color:#3c3c3c;
		}
		.zanzhu ul{
			background: #f5f5fa;
			height: 620px;
			padding: 0;
			margin: 0;
			padding: 0 95px;
			padding-top: 43px;
			box-sizing: border-box;
		}
		.zanzhu li{
			list-style: none;
			width: 25%;
			padding: 0;
			/* margin-left: 8px; */
			margin: 0 auto;
			margin-top: 30px;
			padding:0 9px;
			
		}
		.zanzhu img{
			width:100%;
		}
	}
	@media screen and (max-width: 768px){
		.middleimg_div{
			padding: 0;
			margin: 0;
			background-size: 330%;
			background-position: -460px;
		}
		.middle_wrap {
			height:22rem;
		}
		.middle{
			padding:0 3rem;
		}
		.videos{
			padding:0;
			position:relative;
		}
		.videos img{
			width:100%;
			height:80%;
		}
		.picContent{
			position: absolute;
			width:100%;
			height:50%;
			left:0;
			top:10%;
			padding:0;
			text-align:center;
		}
		.callchains{
			width:50%!important;
		}
		.picContent>p{
			position:absolute;
			left:50%; ddadas
			margin-left:-14%;
			bottom:-25%;
			font-size:2rem !important;
		}
		.picContent p i{
			font-size:2rem !important;
		}
		.picContent>span{
			position:absolute;
			display:block;
			font-size:1.8rem;
			margin:0;
			padding:0;
			color:#fff;
		}
		.picContent .span1{
			left: 10px;
			bottom: 20%;
			font-size: 0.8rem;
			display:none;
		}
		.picContent .span2{
			left: 10px;
			bottom: 10%;
			font-size: 0.8rem;
			display:none;
		}
		.picContent>.a_wrap{
			position: absolute;
			bottom: 10%;
			right: 50%;
			margin-right: -5.6rem;
		}
		.picContent>.a_wrap a{
			display: inline-block;
			font-size: 1rem;
			border: 1px solid #fff;
			border-radius: 0.3rem;
			color: #fff;
			text-decoration: none;
			padding: 0.3rem 0.5rem;
		}
		.picContent>.a_wrap a:nth-child(1){
			margin-right:0.3rem;
		}
		.picContent>b{
			position: absolute;		
			bottom:-0.5rem;
			left:50%;
			margin-left:-5%;
		}
		.picContent>b>a{
			font-size:2rem;
			color:#fff;
			text-decoration: #fff;
		}
		.picContent>b>a>img{
			width:70%;
		}
		.drop_down{
			display:none;
		}
		.whatcall{
			width:100%;
			text-align:center;
			padding:0;
			padding-bottom:2%;
			border-bottom:1px solid #ccc;
			padding-top:2rem;
			padding-bottom:2rem;
		}
		.whatcall h1{
			font-size:24px;
			color:#1e1e1e;
			font-weight:500;
		}
		.whatcall p{
			font-size:15px;
			padding:1.5rem 0;
			text-align:justify;
			color:#3c3c3c;
			line-height:2.5rem;
		}
		.ownCall{
			width:100%;
			margin:0 auto;
			padding:65px 0;
			padding-top:60rem;
			
		}
		.ownCall p{
			font-size:15px;
			color:#3c3c3c;
			margin-top:10px;
			text-align: justify;
			line-height:2.5rem;
		}
		.ownCall span{
			font-size:24px;
			font-weight:500;
			color:#3c3c3c;
			line-height:2.6rem;
		}
		.ownCall div{
			position:relative;
		}
		.ownCall div>img{
			display: block;
			margin:2rem auto;
			width:75px;
		}
		.ownip{
			text-align:center;
		}
		.applicationh3{
			text-align:center;
		}
		.ownip img{
			top:92%;
		}
		.callappication{
			margin-top:6rem;
		}
		.phpneFont{
			position: absolute;
			font-size: 30px;
			color: #fff;
			text-align: right;
			width: 15.5rem;
			line-height: 40px;
			left: 13rem;
			top: 2rem;
		}
		.middle_wrap>p{
			position:absolute;
			width:15rem;
			height:2rem;
			left:13rem;
			bottom:.5rem;

		}
		.middle_wrap .ios{
			bottom:4rem;
			z-index: 999;
		}
		.iosPic{
			display:none;
		}
		.androidPic{
			display:none;
		}
		.middle_wrap a{
			width: 90px;
			height: 32px;
			text-align: center;
			line-height: 32px;
			color: #337ab7;
			text-decoration: none;
			font-size: 1.5rem;
			color: #fff;
			position: absolute;
			border-radius: 0.5rem;
			background: #be384a;
			right:0;
			bottom:0.5rem;
		}
		.news{
			padding:3rem;
		}
		.news h1{
			font-size:24px;
			color:#3c3c3c;
			text-align:center;
			margin-bottom:3rem;
		}
		.right_pic a.left{
			width: 3rem;
			height: auto;
			height: 3rem;
			position: absolute;
			top: 50%;
			margin-top: -1.5rem;
			background: #000;
		}
		.right_pic a.right{
			width: 3rem;
			height: auto;
			height: 3rem;
			position: absolute;
			top: 50%;
			margin-top: -1.5rem;
			background: #000;
		}
		.glyphicon{
			top:5px;
		}
		a.left{
			height:13rem;
		}
		.right_pic{
			width:100%;
			height:225px;
		}
		.right_pic .item{
			width:100%;
			height:100%;
		}
		.right_pic img{
			width:100%;
			height:100%;
		}
		.longnews{
			width:100%;
			margin-top:3rem;
			position:relative;
		}
		.longnews h1{
			font-size:24px;
			text-align:left;
			color:#3c3c3c;
			margin:0;
			padding:0;
			overflow: hidden;
			white-space: nowrap;
			text-overflow: ellipsis;
			font-weight:600;
		}
		.longnews ul{
			width: 100%;
			margin-top: 1rem;
			line-height: 24px;
		}
		.longnews ul li{
			text-align: left;
			list-style-position: inside;
			color: #ccc;
			overflow: hidden;
			text-overflow: ellipsis;
			white-space: nowrap;
		}
		.longnews ul li:hover a{
			color:#c91c46;
		}
		.longnews ul li a{
			color:#3c3c3c;
			text-decoration:none;
			font-size:15px;
			
		}
		.longnews>a{
			color:#c3c3c3;
			position:absolute;
			right:0;
			font-size:1.3rem;
		}


		/*  */
		.shortnews{
			width:100%;
			height:5rem;
			margin-top:3.5rem;
			position:relative;
			padding-bottom:7rem;
		}
		.shortnews h1{
			font-size:24px;
			text-align:left;
			margin:0;
			padding:0;
		}
		.shortnews ul{
			width: 100%;
			margin-top: 1rem;
			line-height: 24px;
		}
		.shortnews ul li{
			text-align: left;
			list-style-position: inside;
			color: #ccc;
			overflow: hidden;
			text-overflow: ellipsis;
			white-space: nowrap;
		}
		.shortnews ul li a{
			font-size:15px;
			color:#3c3c3c;
			text-decoration:none;
		}
		.shortnews ul li:hover a{
			color:#c91c46;
		}
		.shortnews>a{
			color: #c3c3c3;
			position: absolute;
			bottom: -10rem;
			right: 0rem;
			font-size:1.3rem;
		}
		.zanzhu{
			background: #f5f5fa;
			height: 385px;
			padding: 0 3rem;
			margin: 0;
			padding-top: 45px;
			box-sizing: border-box;
			margin-top: 100px;
		}
		.zanzhu h1{
			font-size: 24px;
			text-align: center;
			font-weight: 500;
		}
		.zanzhu ul{
			display: flex;
			flex-wrap: wrap;
			padding: 0;
			margin: 0;
			margin-top: 20px;
		}
		.zanzhu ul li{
			list-style:none;
			width:50%;
			padding:0.5rem;
			margin:0;
		}
		.zanzhu ul li img{
			width:100%;
		}
		.picContent>.a_wrap a{
			border: 1px solid #fff;
			/* padding: 0.5rem 1rem; */
			border-radius: 0.5rem;
			color: #fff;
			text-decoration: none;
			overflow: hidden;
			text-overflow: ellipsis;
			white-space: nowrap;
			display: inline-block;
			height: 2rem;
			line-height: 2rem;
			padding: 0 0.5rem;
		}
	}
	.ios:hover .iosPic{
		display:block;
		width:90%;
	}
	.android:hover .androidPic{
		display:block;
		width:90%;
	}
	.carousel-inner img{
		width:100%;
		height:100%;
	}
	.item{
		width:100%;
		height:100%;
	}
	.item img{
		width:100%;
		height:100%;
		padding:0;
		margin:0;
	}
	.active img{
		width:100%;
		height:100%;
		padding:0;
		margin:0;
	}
	.carousel-indicators{
		bottom:0;
	}
	.swiper-container{
		width:100%;
		height:100%;
	}
	.swiper-wrapper{
		width:100%;
		height:100%;
	}
	.swiper-slide{
		width:100%;
		height:100%;
	}
	.swiper-slide img{
		width:100%;
		height:100%;
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

</head>
<div class="content">

	<div class="videos col-xs-12 col-sm-12 col-md-12 col-lg-12">
	<div class="videosbg">
	<div class="navs col-md-12 col-lg-12">
        <div class="header-logo visible-md visible-lg">
            <a href="<?php  bloginfo('siteurl'); ?>" id="logoImg">
                <img src="<?php bloginfo('template_directory'); ?>/images/logo.png" style='width:100%' alt="">
            </a>
        </div>
        <div class="header-logophone visible-xs visible-sm">
            <a href="<?php  bloginfo('siteurl'); ?>" id="logoImg">
                <img src="<?php bloginfo('template_directory'); ?>/images/logo.png" style='width:100%' alt="">
            </a>
        </div>
        <div class="phoneMenu visible-xs visible-sm">
            <button type="button" class="btn btn-primary btn-lg phoneMenus" data-toggle="modal" data-target="#myModal">☰</button>
            <div class="modal fade documentsa" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog  menus_phones" role="document">
                    <div class="modal-content photo_menus menus_phone">
                        <ul class="nav nav-pills col-md-10 col-lg-10 navphone">
                            <li><a class='changeRed' href="<?php  bloginfo('siteurl'); ?>"><?php echo LangArray($lang,'header1'); ?></a></li>
                            <li>
                                <a class='changeRed' style='background:#232323' href="<?php  bloginfo('siteurl'); ?>?page_id=<?php $id =  hui_get_page_ID('新闻'); echo $id;?>"><?php echo LangArray($lang,'header2'); ?></a>
                                <ul class="dropdown-menu" style="display:block;border: none;background: none;box-shadow: none;width:100%;">                                
                                    <li><a href="<?php  bloginfo('siteurl'); ?>?page_id=<?php $id =  hui_get_page_ID('公告'); echo $id;?>"><?php echo LangArray($lang,'header3'); ?></a></li>
                                    <li><a href="<?php  bloginfo('siteurl'); ?>?page_id=<?php $id =  hui_get_page_ID('媒体新闻'); echo $id;?>"><?php echo LangArray($lang,'header4'); ?></a></li>
                                    <li><a href="<?php  bloginfo('siteurl'); ?>?page_id=<?php $id =  hui_get_page_ID('活动事件'); echo $id;?>"><?php echo LangArray($lang,'header5'); ?></a></li>
                                </ul>
                            </li>
                            <li style="margin-top:12.5rem;box-sizing:border-box;"><a class='changeRed' target="_blank" href="http://block.callchain.live"><?php echo LangArray($lang,'header6'); ?></a></li>
                            <li style="margin-top:12.5rem;box-sizing:border-box;"><a class='changeRed' target="_blank" href="https://wallet.callchain.live"><?php echo LangArray($lang,'header6_1'); ?></a></li>
                            <li><a class='changeRed' href="<?php  bloginfo('siteurl'); ?>?page_id=<?php $id =  hui_get_page_ID('钱包App'); echo $id;?>"><?php echo LangArray($lang,'header7'); ?></a></li>
                            <li><a class='changeRed' href="<?php  bloginfo('siteurl'); ?>?page_id=<?php $id =  hui_get_page_ID('FAQ'); echo $id;?>">FAQ</a></li>
                            <li class='phone_language lang-div'>
                                <a href="#" class='changeRed changelanguage' style='background:#232323'><img src="<?php bloginfo('template_directory'); ?>/images/china.png" alt=""><span style='display:inline-block;margin-left:1rem;'>简体中文</span></a>
                                <ul class="dropdown-menu" style="display:block;border: none;background: none;box-shadow: none;width:100%;" id='hideArea'>                                
                                    <li style='padding-left:3rem'><a href="#"><img style='left:52px;top:14px' src="<?php bloginfo('template_directory'); ?>/images/china.png" alt=""><span>简体中文</span></a></li>
                                    <li style='padding-left:3rem;'><a href="#"><img style='left:52px;top:14px' src="<?php bloginfo('template_directory'); ?>/images/america.png" alt=""><span>English</span></a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>            
            </div>
                 
        </div>
        <div class='visible-md visible-lg'>
            <ul class="navPc col-md-10 col-lg-10">
                <li><a class='changeRed' href="<?php  bloginfo('siteurl'); ?>"><?php echo LangArray($lang,'header1'); ?></a></li>
                <li role="presentation" class="dropdown col-md-2 col-lg-2" style='padding: 0;'>
                    <a class="dropdown-toggle changeRed" data-toggle="dropdown" href="" role="button" aria-haspopup="true" aria-expanded="false">
                    <?php echo LangArray($lang,'header2'); ?> <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu dropdown-menus">
                        <li><a href="<?php  bloginfo('siteurl'); ?>?page_id=<?php $id =  hui_get_page_ID('新闻'); echo $id;?>"><?php echo LangArray($lang,'header2'); ?></a></li>
                        <li><a href="<?php  bloginfo('siteurl'); ?>?page_id=<?php $id =  hui_get_page_ID('公告'); echo $id;?>"><?php echo LangArray($lang,'header3'); ?></a></li>
                        <li><a href="<?php  bloginfo('siteurl'); ?>?page_id=<?php $id =  hui_get_page_ID('媒体新闻'); echo $id;?>"><?php echo LangArray($lang,'header4'); ?></a></li>
                        <li><a href="<?php  bloginfo('siteurl'); ?>?page_id=<?php $id =  hui_get_page_ID('活动事件'); echo $id;?>"><?php echo LangArray($lang,'header5'); ?></a></li>
                    </ul>
                </li>
                <li><a class='changeRed' target="_blank" href="http://block.callchain.live"><?php echo LangArray($lang,'header6'); ?></a></li>
                <li><a class='changeRed' target="_blank" href="https://wallet.callchain.live"><?php echo LangArray($lang,'header6_1'); ?></a></li>
                <li><a class='changeRed' href="<?php  bloginfo('siteurl'); ?>?page_id=<?php $id =  hui_get_page_ID('钱包App'); echo $id;?>"><?php echo LangArray($lang,'header7'); ?></a></li>
                <li><a class='changeRed' href="<?php  bloginfo('siteurl'); ?>?page_id=<?php $id =  hui_get_page_ID('FAQ'); echo $id;?>">FAQ</a></li>
            </ul>
        </div>
        
        
        <div class="dropdown dropdownLanguage lang-div visible-md visible-lg">
            <button class="btn btn-default dropdown-toggle lang-h1 language" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
            <img class='languageImg' src="<?php bloginfo('template_directory'); ?>/images/america.png" alt="">
            <span>English
                <span class="caret"></span>
            </button>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenu1" id='hideArea'>                
                <li><a href="javascript:;"><img src="<?php bloginfo('template_directory'); ?>/images/china.png" alt=""><span>简体中文</span></a></li>
                <li><a href="javascript:;"><img src="<?php bloginfo('template_directory'); ?>/images/america.png" alt=""><span>English</span></a></li>
            </ul>
        </div>
    </div>
	    <video id="Html5Video" class="video-js" preload loop autoplay muted width="100%"
    	poster="<?php bloginfo('template_directory'); ?>/images/videobg.jpg"> 
		    <source id="src1"  type="video/mp4" src="<?php bloginfo('template_directory'); ?>/images/video.mp4" />
            <source id="src2"  type="video/Ogg" src="<?php bloginfo('template_directory'); ?>/images/video.Ogg" />
            <source id="src3"  type="video/webm" src="<?php bloginfo('template_directory'); ?>/images/video.webm" />
   	 您的浏览器不支持 video 标签。
		</video>
	</div>
			
		<div class="picContent col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<!-- <div class="a_wrap">
				<a href="https://github.com/callchain" target="_blank">GitHub</a>
				<a href="<?php bloginfo('template_directory'); ?>/images/CallChain18.5.11.pdf" target="_blank"><?php echo LangArray($lang,'front_page3'); ?></a>
			</div> -->
			<p style="color:#fff; font-size:6rem;left:0;margin-left:0;width:100%;text-algin:center;">
				<?php echo LangArray($lang,'front_page13'); ?> <br>
				<i style="font-style:normal;font-size:5rem;"> 
				<?php echo LangArray($lang,'front_page14'); ?>
				</i>
			</p>
		</div>
	</div>
</div>

<div id="callchain" class="middle col-xs-12 col-sm-12 col-md-12 col-lg-12">
	<section class="whatcall col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<h1 class='col-xs-12 col-sm-12 col-md-12 col-lg-12'><?php echo LangArray($lang,'front_page4'); ?></h1>
		<p class='col-xs-12 col-sm-12 col-md-12 col-lg-12'><?php echo LangArray($lang,'front_page5'); ?></p>
	</section>
	<div class="own">
		<div class="ownCall">
			<section class="ownip">
				<div class="imgh3"><img src="<?php bloginfo('template_directory'); ?>/images/1.png" alt=""><span><?php echo LangArray($lang,'front_page2'); ?></span></div>
				<p><?php echo LangArray($lang,'front_page6'); ?></p>
			</section>
			<section class="callappication">
				<div class="applicationh3"><img src="<?php bloginfo('template_directory'); ?>/images/2.png" alt=""><span>HaloTV</span></div>
				<p><?php echo LangArray($lang,'front_page7'); ?></p>
			</section>
		</div>		
	</div>
</div>


<div class="middleimg_div col-md-12 col-sm-12 col-xs-12">
	<div class="middle_wrap  col-md-12 col-sm-12 col-xs-12">
		<span class='phpneFont'><?php echo LangArray($lang,'front_page8'); ?></span>
		<p>
			<a href="https://www.pgyer.com/callchain" class="ios">IOS</a>
			<a href="https://www.pgyer.com/callchain" class="android">Android</a>
		</p>
	</div>
</div>



<div class="news col-md-12 col-sm-12 col-xs-12">
	<h1><?php echo LangArray($lang,'front_page9'); ?></h1>
	<section class="imglongnews">
		<div class="left">			
			<div class="right_pic">
				<div class="swiper-container">
					<div class="swiper-wrapper">
						<?php 
								$cate_id = get_cat_ID('媒体新闻');
								$posts = get_posts( "category=$cate_id&numberposts=6" ); ?>
								<?php if( $posts ) : ?><?php foreach( $posts as $key=>$post ) : setup_postdata( $post ); ?>
								
									<div class="swiper-slide">
									<a href="<?php the_permalink() ?>">
										<?php
											$id = $post->post_ID;
											$timthumb_src = wp_get_attachment_image_src( get_post_thumbnail_id($id),'full');
											echo '<img border="0" alt="" src="' . $timthumb_src[0] . '" width="360px" height="240px"  />';
										?>
										</a>
									</div>
															
								<?php endforeach; ?>
						<?php endif;?>
					</div>
					<div class="swiper-pagination"></div>
				</div>
			</div>
		</div>
		

		<div class="longnews">
			<?php $cate_id = get_cat_ID('媒体新闻');$posts = get_posts( "category=$cate_id&numberposts=1&orderby=post_views_count" ); ?>
			<?php if( $posts ) : ?><ul><?php foreach( $posts as $post ) : setup_postdata( $post ); 
			$except_id = get_the_ID();
			?>
				<a href="<?php the_permalink() ?>"><h1><?php $str = $post->post_title;echo $str; ?></h1></a>
			<?php endforeach; ?></ul><?php endif; ?>
			



			<?php 
				$cate_id = get_cat_ID('媒体新闻');
				$args = array(
                    //需要提取的文章数
                    'numberposts'   => 8,
                    
                    //以第几篇文章为起始位置
                    'offset'     => 0,
                    
                    //分类的ID，多个用逗号将分类编号隔开，或传递编号数组，可指定多个分类编号。
                    //大部分 CMS 使用该函数的重点。
                    'category'    => $cate_id,
                    
                    //排序规则（注1）
                    'orderby'     => 'post_date',
                    
                    //升序、降序 'ASC' —— 升序 （低到高） 'DESC' —— 降序 （高到底）
                    'order'      => 'DESC',
                    
                    // //要显示文章的ID
                    // 'include'     => ,
                    
                    // //要排除文章的ID
                    'exclude'     => $except_id,
                    
                    //自定义字段名称
                    // 'meta_key'    => ,
                    //自定义字段的值，配合上一个参数，来选择显示符合自定义字段数值的文章。
                    // 'meta_value'   => ,
                    
                    //post（日志）——默认，page（页面），
                    //attachment（附件），any —— （所有）
                    // 'post_type'    => 'post',
                    
                    //文章的 mime 类型
                    // 'post_mime_type' => ,
                    
                    //要显示文章的父级 ID
                    // 'post_parent'   => ,
                    
                    //文章状态
                    'post_status'   => 'publish' );   
                  $posts  = get_posts( $args ); 

				// $posts = get_posts( "category=$cate_id&numberposts=6" ); 
			?>
			<?php if( $posts ) : ?><ul><?php foreach( $posts as $post ) : setup_postdata( $post ); ?>
				<li><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_permalink() ?>">
			<?php 

				$str = $post->post_title;
				
				echo $str;  
			?></a></li>
			<?php endforeach; ?></ul><?php endif; ?>
			<?php $count =  get_category($cate_id)->count; if($count <= 8):  ?>
			<?php else: ?>
				<a href="<?php  bloginfo('siteurl'); ?>?page_id=<?php $id =  hui_get_page_ID('媒体新闻'); echo $id;?>"><?php echo LangArray($lang,'front_page12'); ?> >></a>
			<?php endif;?>
		</div>

		<div class="shortnews">
			<h1><?php echo LangArray($lang,'front_page10'); ?></h1>
			<?php $cate_id = get_cat_ID('活动事件');$posts = get_posts( "category=$cate_id&numberposts=7" ); ?>
			<?php if( $posts ) : ?><ul><?php foreach( $posts as $post ) : setup_postdata( $post ); ?>
				<li><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>">
			<?php 

				$str = $post->post_title;
				
				echo $str;  
			?></a></li>
			<?php endforeach; ?></ul><?php endif; ?>
			<?php $count =  get_category($cate_id)->count; if($count <= 7):  ?>
			<?php else: ?>
				<a href="<?php  bloginfo('siteurl'); ?>?page_id=<?php $id =  hui_get_page_ID('活动事件'); echo $id;?>"><?php echo LangArray($lang,'front_page12'); ?> >></a>
			<?php endif;?>
		</div>
	</section>
	
</div>

<div class="zanzhu col-sm-12 col-xs-12">
		<h1 class='col-sm-12 col-xs-12'><?php echo LangArray($lang,'front_page11'); ?></h1>
		<ul class='col-sm-12 col-xs-12'>
			<li class='col-xs-6'><img src="<?php bloginfo('template_directory'); ?>/images/jinsecaijing.png" alt=""></li>
			<li class='col-xs-6'><img src="<?php bloginfo('template_directory'); ?>/images/borros.png" alt=""></li>
			<li class='col-xs-6'><img src="<?php bloginfo('template_directory'); ?>/images/dcoin.png" alt=""></li>
			<li class='col-xs-6'><img src="<?php bloginfo('template_directory'); ?>/images/lianshijie.png" alt=""></li>
			<li class='col-xs-6'><img src="<?php bloginfo('template_directory'); ?>/images/ymk.png" alt=""></li>
			<li class='col-xs-6'><img src="<?php bloginfo('template_directory'); ?>/images/miracle.png" alt=""></li>

		</ul>
</div>




<?php get_footer(); ?>
<script type='text/javascript' src='<?php bloginfo('template_directory'); ?>/unslider.min.js'></script>

<script>
	var mySwiper = new Swiper('.swiper-container', {
		autoplay:{
			delay: 2500,
			disableOnInteraction: false,
		},
		loop: 'true',
		pagination: {
			el: '.swiper-pagination',
			clickable :true
		},
	})



    
	$(document).ready(function(e) {
	    var unslider04 = $('#b02').unslider({
	        dots: true
	    }),
	    data04 = unslider04.data('unslider');
	     
	    $('.unslider-arrow04').click(function() {
	        var fn = this.className.split(' ')[1];
	        data04[fn]();
	    });
});


// var langs = strCookie.split(" ")[0].split('=')[1];


// if(langs == 'zh_CN' || langs == 'zh_CN;'){
// 	if(screen.width < 768){
// 		$('.ownCall').css('padding-top', '48rem');
// 		$('.picContent').find('.a_wrap').css('margin-right', '-4.5rem');
// 	}else{
// 	}
// }




</script>

<script type='text/javascript' src='<?php bloginfo('template_directory'); ?>/jquery-1.11.1.min.js'></script>
<script type='text/javascript' src='<?php bloginfo('template_directory'); ?>/bootstrap/bootstrap-js/bootstrap.min.js'></script>
<script>
    
    $(".lang-h1").on('click',function(){
        
        var myArea = document.getElementById("hideArea");
        if(myArea.style.display == "none")
        {
            $(".lang-div ul").css("display","block");
        }
        else
        {
            $(".lang-div ul").css("display","none");
        }

    });

    $(".lang-div ul li").on('click',function(){
        $(".lang-h1").html($(this).html());
        $(".lang-div ul").css("display","none");
       
    });

    $("#hideArea li").on('click',function(){
        var lang = $(this).find("span").html();
        if(lang == "简体中文")
        {
            var lang1 = "zh_CN";
        }
        document.cookie = "lang="+ lang1;
        window.location.reload();
        // var storage=window.sessionStorage;
        // storage.setItem("lang",lang);
    });
    
    // 中文页面



    if (screen.width < 480){
        $('.header-nav>ul').css('display', 'none');
        

    }

    $('.mobile_menu').on('touchend', function(){
        // $("div").animate({left:'250px'});
        if($('.header-nav>ul').css('display') == 'block'){
            $('.header-nav>ul').css('display', 'none');
        }else{
            $('.header-nav>ul').css('display', 'block');
            $('.sub-menu').parent('li').css('height', '9rem')
        }
        
        
    })

    $('.phone_language .dropdown-menu').on('click', 'li', function(){
        $('.dropdown-menu').css('display', 'block');
    })


    var strCookie = document.cookie;
    // var langs = strCookie.split(" ")[0].split('=')[1];
    // var langs = strCookie.indexOf('lang=') 70+5;
    var langs = strCookie.substr(strCookie.indexOf('lang=')+5,5);
    if(langs == 'zh_CN' || langs == 'zh_CN;'){
        $('.lang-h1').find('span').text('简体中文');
    }else{
        // $('.lang-h1').find('img').src('http://localhost/wordpress/wp-content/themes/call/images/america.png');
        $('.languageImg').attr('src', '<?php bloginfo('template_directory'); ?>/images/america.png');
        $('.lang-h1').find('span').text('English');
        $('.changelanguage').find('span').text("English");
        $('.changelanguage').find('img').attr('src', '<?php bloginfo('template_directory'); ?>/images/america.png');
        
    }


    
    
</script>
