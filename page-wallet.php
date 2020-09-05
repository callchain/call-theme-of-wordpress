<meta name="viewport" content="width=device-width, initial-scale=1,minmum-scale=1,maxmum-scale=1,user-scalable=no">
<?php get_header(); ?>
<?php $lang = $_COOKIE['lang'];?>
<style>
    .phone{
        margin-left: 5rem;
    }
    .phone p{
        text-align:center;
    }
   .download{
        text-align: left;
        padding-top: 31px;
        margin-left: -10rem;
   }
   .download p:nth-child(1){
       margin:0;
       font-size:40px;
   }
   .download p:nth-child(2){
       margin:0;
       font-size:30px;
   }
   .download p:nth-child(3){
       margin:0;
       font-size:16px;
       margin-top:10px;
   }
   .download ul{
       margin-top: 30px;
   }
   .download li{
       font-size:16px;
       height:33px;
       line-height:33px;
       color:#cccccc;
       list-style-position: inside;
   }
   .download li span{
       color:#3c3c3c;
   }
   .clearfix{
       display:block;
       width:265px;
       height:55px;
       line-height:55px;
       border-radius:30px;
       text-decoration:none;
   }
   .iosDownload{
        background: #c91c46;
        position: relative;
        text-align: center;
        font-size: 16px;
        color: #fff;
        margin-top: 4rem;
        text-decoration: none;
   }
   .iosDownload:hover{
       color:#fff;
   }
   .iosDownload img:nth-child(1){
       position:absolute;
       left:0.5rem;
       top:0.5rem;
   }
   .iosDownload img:nth-child(3){       
        position: absolute;
        top: 18px;
        right: 23px;
   }
   .androidDownload{
        border: 1px solid #c91c46;
        position: relative;
        text-align: center;
        font-size: 16px;
        color: #c91c46;
        text-decoration: none;
        margin-top: 1.8rem;
   }
   .androidDownload:hover{
       color:#c91c46;
   }
   .androidDownload img:nth-child(1){
       position:absolute;
       left:0.5rem;
       top:0.4rem;
   }
   .androidDownload img:nth-child(3){       
        position: absolute;
        top: 7px;
        right: 15px;
   }
   .top_img{
       width:100%;
   }
   .top_img img{
       width:100%;
   }
   @media screen and (max-width: 768px){
        .top_img img{
            width:260%;
            margin-left:-18rem;
        }
        .phone img{
            width:50%;
        }
        .download p{
            text-align:center;
        }
        .download ul{
            padding-left:2rem;
            margin-top:80px;
        }
        .download ul li{
            list-style-position:outside;
            margin-top:3rem;
            font-size: 16px;
            height: 40px;
            line-height: 24px;
            color: #cccccc;
        }
        .download p:nth-child(1){
            font-size:3rem;
        }
        .download p:nth-child(2){
            font-size:2.3rem;
        }
        .download p:nth-child(3){
            margin: 0;
            font-size: 16px;
            margin-top: 8px;
        }
        .clearfix{
            margin:1rem auto;
        }
        .phone{
            padding:0;
            margin:0;
            margin-top:30px;
        }
        .download{
            padding:3rem;
            margin:0;
            padding-bottom:8rem;
        }
        .download p:nth-child(1){
            font-size:24px;
        }
        .download p:nth-child(2){
            font-size:20px;
        }
        .iosDownload{
            margin-top:6rem;
        }
        .androidDownload{
            margin-top:2rem;
        }
   }
   .wallet-close{
        position:fixed;
        width:100%;
        height:100%;
        background-color:rgba(0,0,0,0.8);
        text-align:center;
        left:0;
        top:0;
        padding-top:16%;
        z-index:999;
   }
   .wallet-close span{
       display:inline-block;
       width:20rem;
       height:20rem;
   }
   .wallet-close img{
        width:100%;
        height:100%;
   }
   .wallet-close a{
        font-size: 15px;
        border: 1px solid #ccc;
        border-radius: 50%;
        display: block;
        width: 2rem;
        height: 2rem;
        text-align: center;
        line-height: 2rem;
        margin: 0 auto;
        text-decoration: none;
        color:#fff;
   }
   
</style>
<div class="row">
    <div class="top_img">
        <img src="<?php bloginfo('template_directory'); ?>/images/app_bg.jpg" alt="">
    </div>
    <div class="wallet_box col-sm-12 col-xs-12">
        <div class="phone col-sm-6 col-xs-12">
            <p><img src="<?php bloginfo('template_directory'); ?>/images/3_wallet_05.png" alt=""></p>
        </div>
        <div class="download col-sm-6 col-xs-12">
            <p><?php echo LangArray($lang,'wallet1'); ?></p>
            <p><?php echo LangArray($lang,'wallet2'); ?></p>
            <p><?php echo LangArray($lang,'wallet3'); ?></p>
            <ul>
                <li><span><?php echo LangArray($lang,'wallet4'); ?></span></li>
                <li><span><?php echo LangArray($lang,'wallet5'); ?></span></li>
                <li><span><?php echo LangArray($lang,'wallet6'); ?></span></li>
                <li><span><?php echo LangArray($lang,'wallet7'); ?></span></li>
            </ul>
            <a href="javascript:;" class="iosDownload clearfix" style='text-decoration:none;'>
                <img src="<?php bloginfo('template_directory'); ?>/images/iOS.png" alt="">
                <span><?php echo LangArray($lang,'wallet8'); ?></span>
                <img src="<?php bloginfo('template_directory'); ?>/images/iOSdownload.png" alt="">
            </a>
            <a href="javascript:;" class="androidDownload clearfix" style='text-decoration:none;'>
                <img src="<?php bloginfo('template_directory'); ?>/images/android.png" alt="">
                <span><?php echo LangArray($lang,'wallet9'); ?></span>
                <img src="<?php bloginfo('template_directory'); ?>/images/androidDownload.png" alt="">
            </a>
            <div class="wallet-wrap">
                <div class="wallet-close" style='display:none;'>
                
                    <span><img src="<?php bloginfo('template_directory'); ?>/images/download-software11.png" alt=""></span>
                    <a href="javascript:;">×</a>
                </div>                
            </div>
        </div>
    </div>
</div>

</div>

<?php get_footer(); ?>
<script type='text/javascript' src='<?php bloginfo('template_directory'); ?>/jquery-2.1.1.min.js'></script>
<script>
    $(".iosDownload").click(function(){
        $(".wallet-wrap").css('display','block');
        $(".wallet-close").css('display','block');
    });

    $(".androidDownload").click(function(){
        $(".wallet-wrap").css('display','block');
        $(".wallet-close").css('display','block');
    });

    $(".wallet-close a").click(function(){
        $(".wallet-wrap").css('display','none');
        $(".wallet-close").css('display','none');
    });


</script>