<!DOCTYPE html>
<html lang="en">
<?php $lang = $_COOKIE['lang'];?>
<head>
    <meta charset="UTF-8">
    <title>CallChain | Call For Yourself</title>
    <meta name="keywords"  content="" />
    <meta name="description"  content=""/>
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=no">
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
            background:#1e1e1e;
            height:70px;
            border-bottom:1px solid #282828;
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
            width:22%;
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
    <?php wp_head(); ?>
</head>
<body>
<div class="contents">
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
            <img class='languageImg' src="<?php bloginfo('template_directory'); ?>/images/china.png" alt="">
            <span>简体中文
                <span class="caret"></span>
            </button>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenu1" id='hideArea'>                
                <li><a href="javascript:;"><img src="<?php bloginfo('template_directory'); ?>/images/china.png" alt=""><span>简体中文</span></a></li>
                <li><a href="javascript:;"><img src="<?php bloginfo('template_directory'); ?>/images/america.png" alt=""><span>English</span></a></li>
            </ul>
        </div>
    </div>
</div>
<script>

</script>

<script type='text/javascript' src='<?php bloginfo('template_directory'); ?>/jquery-1.11.1.min.js'></script>
<script type='text/javascript' src='<?php bloginfo('template_directory'); ?>/bootstrap/bootstrap-js/bootstrap.min.js'></script>
<script>
    
    $(".lang-h1").click(function(){
        
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

    $(".lang-div ul li").click(function(){
        $(".lang-h1").html($(this).html());
        $(".lang-div ul").css("display","none");
       
    });

    $("#hideArea li").click(function(){
        var lang = $(this).find("span").html();
        if(lang == "简体中文")
        {
            var lang = "zh_CN";
        }
        document.cookie = "lang="+ lang;
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
    var langs = strCookie.split(" ")[0].split('=')[1];
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
