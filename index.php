<meta name="viewport" content="width=device-width, initial-scale=1,minmum-scale=1,maxmum-scale=1,user-scalable=no">
<?php get_header(); ?>
<?php  $id = $_GET['p']; ?>
<?php setPostViews($id); ?>
<link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_url'); ?>" media="screen" />
<style>
    .listsa{
        word-wrap: break-word;
    }
    .carousel-indicators{
        bottom:0;
    }
    .carousel-indicators li{
        width:8px;
        height:8px;
        border:1px solid #ccc;

    }
    .carousel-indicators .active{
        background:#ccc;
        border:1px solid #ccc;
        width:8px;
        height:8px;
    }
    .hot_list
    >a{
        text-decoration: none;
        display:block;
        width:100%;
        color:#3c3c3c;
    }
    .right_hot span:nth-child(1):hover{
        color:#c91c46;
    }
    @media screen and (min-width: 1200px){
        .detailsPage{
            margin-top:30px;
        }
        .banners_div{
            width:80%;
            margin:0 auto;
            display:flex;
        }
        .banner_left{
            flex:7;
            padding-right:40px;
        }
        .banner_right{
            flex:3;
            margin-top:5rem;
        }
        .top_pic{
            width:810px;
            height:110px;
        }
        .titles{
            height:150px;
            width:100%;
            border-bottom:1px solid #ccc;
            position:relative;
            padding-top:5px;
        }
        .titles h2{
            line-height:38px;
            font-size:30px;
            color:#3c3c3c;
        }
        .titles p{
            position: absolute;
            left: 0;
            bottom: 0;
            font-size: 16px;
            color: #646464;
            line-height: 24px;
        }
        .listsa{
            padding-top: 3rem;
            /* padding: 0 2rem; */
            padding-bottom: 150px;
        }
        .date span{
            color:#3c3c3c;
        }
        .hot_list{
            margin-top:30px;
        }
        .notice-line{
            margin-top:10px;
        }
        #wrap-img{
            margin-top:10px;
        }
        #qrcode{
            width:3rem;
        }
    }
    @media screen and (min-width: 992px) and (max-width: 1200px) {
        .detailsPage{
            margin-top:30px;
        }
        .banners_div{
            width:80%;
            margin:0 auto;
            display:flex;
        }
        .banner_left{
            flex:7;
            padding-right:40px;
        }
        .banner_right{
            flex:3;
            margin-top:5rem;
        }
        .top_pic{
            width:100%;
            height:100px;
        }
        .titles{
            height:144px;
            width:100%;
            border-bottom:1px solid #ccc;
            position:relative;
            padding-top:6px;
        }
        .titles h2{
            line-height:30px;
            font-size:30px;
            color:#3c3c3c;
        }
        .titles p{
            position: absolute;
            left: 0;
            bottom: 0;
            font-size: 16px;
            line-height: 24px;
            color: #646464;
        }
        .listsa{
            padding-top: 3rem;
            /* padding: 0 2rem; */
            padding-bottom: 150px;
        }
        .date span{
            color:#3c3c3c;
        }
        .hot_list{
            margin-top:30px;
        }
        .notice-line{
            margin-top:10px;
        }
        #wrap-img{
            margin-top:10px;
        }
        #qrcode{
            width:3rem;
        }
    }
    @media screen and (min-width: 768px) and (max-width: 992px) {
        .detailsPage{
            margin-top:30px;
        }
        .banners_div{
            width:80%;
            margin:0 auto;
            display:flex;
        }
        .banner_left{
            flex:7;
            padding-right:40px;
        }
        .banner_right{
            flex:3;
            margin-top:5rem;
        }
        .top_pic{
            width:100%;
            height:100px;
        }
        .titles{
            height:144px;
            width:100%;
            border-bottom:1px solid #ccc;
            position:relative;
        }
        .titles h2{
            line-height:30px;
            font-size:30px;
            color:#3c3c3c;
        }
        .titles p{
            position: absolute;
            left: 0;
            bottom: 0;
            font-size: 16px;
            color: #646464;
            line-height: 24px;
        }
        .listsa{
            padding-top: 3rem;
            /* padding: 0 2rem; */
            padding-bottom: 150px;
        }
        .date span{
            color:#3c3c3c;
        }
        .hot_list{
            margin-top:30px;
        }
        .notice-line{
            margin-top:10px;
        }
        #wrap-img{
            margin-top:10px;
        }
        #qrcode{
            width:3rem;
        }
        
    }
    @media screen and (max-width: 768px){
        .detailsPage{
            padding:0 3rem;
        }
        .top_pic{
            height: 10rem;
            margin: 2rem 0;
            margin-bottom: 3rem;
        }
        .title{
            font-size:24px;
            line-height:3rem;
        }
        #wrap-img{
            width: 130px;
            margin: 0 auto;
        }
        #wrap-img img{
            margin:0 0.5rem;
        }
        .date{
            margin: 0 0 10px;
            line-height: 24px;
            font-size: 14px;
            color: #646464;
        }
        .date span{
            color:#3c3c3c;
        }
        .listsa p{
            font-size:14px;
            line-height:24px;
        }
        .banner_right{
            margin-top: 4rem;
            border-top: 1px solid #eee;
            padding-top: 1rem;
            padding-bottom:70px;
        }
        .notice-line{
            margin-top: 1rem;
            padding: 0;
        }
        .hot_list{
            margin-top:20px;
        }
        .breadcrumb{
            display:none;
        }
        .listsa img{
            width:100%;
            height:auto;
        }
    }
    .breadcrumb{
        background:none;
        padding:0;
    }
    .breadcrumb li a{
        color:#646464;
        font-size:12px;
    }
    .breadcrumb > .active{
        color:#646464;
        font-size:12px!important;
    }
    .hot_list{
        margin-bottom:50px;
    }
</style>
<div class="detailsPage col-sm-12 col-xs-12">
    <div class="banners_div">
        <div class="banner_left">
        <ol class="breadcrumb">
            <li><a href="<?php  bloginfo('siteurl'); ?>">CallChain</a></li>
            <li><a href="<?php  bloginfo('siteurl'); ?>?page_id=<?php $id =  hui_get_page_ID('新闻'); echo $id;?>">新闻</a></li>
            
            <li><a href="<?php 
                            $id = $_GET['p']; 
                            $cats= get_the_category($id); 
                            $page_id = hui_get_page_ID($cats[0]->name);
                            $url = bloginfo('siteurl');
                            echo $url.'?page_id='.$page_id;
                        ?>">
                        <?php 
                            $id = $_GET['p']; 
                            $cats= get_the_category($id); 
                            echo $cats[0]->name;
                        ?>
                </a>
            </li>
            <li class="active">正文</li>
        </ol>
            <div class="titles">
                <h2 class="title"><?php $id = $_GET['p']; echo get_post($id)->post_title;?></h2>
                <p class="date"><?php the_time('Y-m-d H:i:s'); ?> <span><?php $user_id = get_post($id)->post_author; echo the_author_meta( 'display_name', $user_id );?></span></p>
            </div>
            <div class="listsa">
                <p><?php $id = $_GET['p']; echo get_post($id)->post_content;?></p>
            </div>
        </div>

        <div class="banner_right">
            <h3><?php echo LangArray($lang,'page5'); ?><div class="notice-line"><img src="<?php bloginfo('template_directory'); ?>/images/faq-line.png" alt=""></div></h3>
            <ul class="hot_list">
             <?php 
                  $cate_id = get_cat_ID('热门新闻'); 
                  $args = array(
                    //需要提取的文章数
                    'numberposts'   => 5,
                    
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
                    // 'exclude'     => ,
                    
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
                  $posts_array  = get_posts( $args ); 
                  // print_R($posts_array);die;
                  if(count($posts_array) < 5)
                  {
                      $id = [];
                      foreach($posts_array as $key=>$val) :

                          $id[] = $val->ID;
                      endforeach;
                      $new_cate_id = get_cat_ID('媒体新闻'); 
                      $arg = array(
                        //需要提取的文章数
                        'numberposts'   => 5-count($posts_array),
                        
                        //以第几篇文章为起始位置
                        'offset'     => 0,
                        
                        //分类的ID，多个用逗号将分类编号隔开，或传递编号数组，可指定多个分类编号。
                        //大部分 CMS 使用该函数的重点。
                        'category'    => $new_cate_id,
                        
                        //排序规则（注1）
                        'orderby'     => 'post_views_count',
                        
                        //升序、降序 'ASC' —— 升序 （低到高） 'DESC' —— 降序 （高到底）
                        'order'      => 'DESC',
                        
                        // //要显示文章的ID
                        // 'include'     => ,
                        
                        // //要排除文章的ID
                        'exclude'     => $id,
                        
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
                        $new_Arr  = get_posts( $arg );
                        $data = array_merge($posts_array,$new_Arr);
                  }

              ?>
                <?php foreach( $data as $post ) : setup_postdata( $post ); ?>
                <a href="<?php the_permalink(); ?>"><li>
                    <p class='left_photo'>
                         <?php 
                              $post_thumbnail_id = get_post_thumbnail_id(get_the_ID());
                              $thumbnail_image_url = wp_get_attachment_image_src( $post_thumbnail_id,'full'); 
                          ?>
                        <img src="<?php echo $thumbnail_image_url[0];?>" alt="">
                    </p>
                    <p class='right_hot'>
                        <span><?php echo the_title();?></span>
                        <span><?php echo the_author_meta( 'display_name', $user_id );?></span>
                    </p>
                </li></a>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
    
</div>




<?php get_footer(); ?>
<script type='text/javascript' src='<?php bloginfo('template_directory'); ?>/jquery-1.11.1.min.js'></script>
<script type='text/javascript' src='<?php bloginfo('template_directory'); ?>/unslider.min.js'></script>
<script>

    $(document).ready(function(e) {
      var unslider04 = $('#b06').unslider({
          dots: true
      }),
      data04 = unslider04.data('unslider');
      $('.unslider-arrow04').click(function() {
          var fn = this.className.split(' ')[1];
          data04[fn]();
      });
  });
    $("#sina").click(function(){
      var title = $("#title").text();
      var url   = window.location.href;
      var sharesinastring='http://v.t.sina.com.cn/share/share.php?title='+title+'&url='+url+'&content=utf-8';
      window.open(sharesinastring,'newwindow','height=400,width=400,top=100,left=100');
    });
    $("#wechat").mouseover(function(){
      var url = window.location.href;
      // var url = "http://baidu.com";
      var src = 'http://qr.liantu.com/api.php?&bg=ffffff&fg=000000&text='+url+'&w=150';
      // alert()
      $("#qrcode").html('<img src="'+src+'" alt="" />');

    });

  $("#wechat").mouseout(function(){
      $("#qrcode").html('');

  });
    $("#q-zone").click(function(){
         var _url = window.location.href;
         // var _showcount = 0;
         // var _desc = desc_;
         // var _summary = "";
         var _title = $("#title").text();
         // var _site = "";
         var _width = "600px";
         var _height = "800px";
         // var _url = "http://baidu.com";
         // var _summary = "";
         // var _pic = "http://www.junlenet.com/uploads/allimg/150510/1-150510104044.jpg";
         var _shareUrl = 'http://connect.qq.com/widget/shareqq/index.html?';
         _shareUrl += 'url=' + encodeURIComponent(_url||document.location);   //参数url设置分享的内容链接|默认当前页location
         // _shareUrl += '&showcount=' + _showcount||0;      //参数showcount是否显示分享总数,显示：'1'，不显示：'0'，默认不显示
         // _shareUrl += '&desc=' + encodeURIComponent(_desc||'分享的描述');    //参数desc设置分享的描述，可选参数
         //_shareUrl += '&summary=' + encodeURIComponent(_summary||'分享摘要');    //参数summary设置分享摘要，可选参数
         _shareUrl += '&title=' + encodeURIComponent(_title||document.title);    //参数title设置分享标题，可选参数
         //_shareUrl += '&site=' + encodeURIComponent(_site||'');   //参数site设置分享来源，可选参数
         // _shareUrl += '&pics=' + encodeURIComponent(_pic||'');   //参数pics设置分享图片的路径，多张图片以＂|＂隔开，可选参数
        window.open(_shareUrl,'width='+_width+',height='+_height+',top='+(screen.height-_height)/2+',left='+(screen.width-_width)/2+',toolbar=no,menubar=no,scrollbars=no,resizable=1,location=no,status=0'); 
    });
</script>

