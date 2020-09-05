<?php

// custom excerpt length
function new_excerpt_length($length) {
    return 100;
}
add_filter('excerpt_length', 'new_excerpt_length');

// add thumbnails support
if ( function_exists( 'add_theme_support' ) ) {
    add_theme_support( 'post-thumbnails' );
}
if ( function_exists( 'add_image_size' ) ) {
    add_image_size( 'customized-post-thumb', 232, 142 );
}

// remove header margin
add_action('get_header', 'remove_admin_login_header');
function remove_admin_login_header() {
    remove_action('wp_head', '_admin_bar_bump_cb');
}

function sanyi_setup() {
        register_nav_menus([
            'header_menu' => __('顶部导航'),
            'footer_menu'  => __('底部导航')
        ]);
    }

function my_init(){
    $url = get_template_directory_uri();
    // 注册样式表
    $styles = array(
        'style1' => $url . '/bootstrap/bootstrap-css/bootstrap.min.css',
    );
 
    foreach( $styles as $k => $v ){
        wp_register_style( $k, $v, false );
    }
 
    // 注册脚本
     
    // 其它需要在init action处运行的脚本
}
add_action( 'init', 'my_init' );




function main_scripts() {
    wp_enqueue_script('mainjs', get_template_directory_uri() . '/main.js'   );
	
}
add_action('init', 'main_scripts');



function getPostViews($postID){  
    $count_key = 'post_views_count';  
    $count = get_post_meta($postID, $count_key, true);  
    if($count==''){  
        delete_post_meta($postID, $count_key);  
        add_post_meta($postID, $count_key, '0');  
        return "阅读次数 0";  
    }  
    return '阅读次数 '.$count;  
}  
function setPostViews($postID) {  
    $count_key = 'post_views_count';  
    $count = get_post_meta($postID, $count_key, true);  
    if($count==''){  
        $count = 0;  
        delete_post_meta($postID, $count_key);  
        add_post_meta($postID, $count_key, '0');  
    }else{  
        $count++;  
        update_post_meta($postID, $count_key, $count);  
    }  
}


function hui_get_page_ID($pageName) { 
    global $wpdb; 
    $pages = get_pages(); 
    for($i = 0; $i < count($pages); $i++) { 
    if($pageName == $pages[$i]->post_title) $page_slug = $pages[$i]->post_name;//根据用户提供的页面名称获得页面别名 
    } 
    if($page_slug) { 
    //根据页面别名获得页面ID 
    $page_ID = $wpdb->get_var("SELECT ID FROM $wpdb->posts WHERE post_name = '" . $page_slug . "' AND post_status = 'publish' AND post_type = 'page'"); 
    return $page_ID; 
    } else { 
    return false; 
    } 
}


function LangArray($lang,$name)
{
    if($lang == 'zh_CN')
    {
        $arr['header1']        = '首页';
        $arr['header2']        = '新闻';
        $arr['header3']        = '公告';
        $arr['header4']        = '媒体新闻';
        $arr['header5']        = '活动事件';
        $arr['header6']        = '浏览器';
        $arr['header6_1']      = 'CallWallet';
        $arr['header7']        = '钱包App';
        $arr['header8']        = 'FAQ';

        $arr['front_page1']    = '天生骄傲 为你打Call';
        $arr['front_page2']    = '个人IP一键上链';
        $arr['front_page3']    = '白皮书';
        $arr['front_page4']    = '什么是CallChain ?';
        $arr['front_page5']    = '一个泛娱乐内容发布平台，实现创作者与消费者之间点对点的内容交互。<br/>一个让IP全方位变现的云经济平台，实现IP身价的精准管理。<br/>一个娱乐IP资产汇集的平台，还原真实的娱乐商业价值圈。<br/>
CallChain是基于区块链技术的去中心化泛娱乐平台，为全球泛娱乐社区提供价值流通枢纽。<br/>在这个平台上，观众、粉丝、影迷、歌迷、娱乐达人等，均可以深度参与到娱乐的方方面面，<br/>    真正实现为爱豆打Call，为自己打Call！';
        $arr['front_page6']    = '泛娱乐时代，每个人都可以成为明星、实现梦想、变为人人关注的IP。CallToken app让个人IP一键上链，发行专属于自己的个人通证。';
        $arr['front_page7']    = 'CallChain推出的“泛娱乐➕区块链”综艺频道，致力于打造全球具有影响力和竞争力的嘉宾访谈娱乐综艺秀。';
        $arr['front_page8']    = '欢迎下载使用Call Token钱包';
        $arr['front_page9']    = '新闻资讯';
        $arr['front_page10']   = '活动事件';
        $arr['front_page11']   = '合作机构';
        $arr['front_page12']   = '更多';
        $arr['front_page13']   = '每个人都可以发行个人代币';
        $arr['front_page14']   = 'Callchain支持';

        $arr['footer']         = '官方社交平台';


        $arr['page1']         = '阅读更多';
        $arr['page2']         = '媒体新闻';
        $arr['page3']         = '公告';
        $arr['page4']         = '请输入关键词';
        $arr['page5']         = '热门文章';
        $arr['page6']         = '分享到';


        $arr['faq1']           = '更新于: 2018.6.1';
        $arr['faq2']           = 'CallChain是什么？';
        $arr['faq3']           = 'CallChain基金会位于新加坡，致力于打造基于区块链技术的去中心化泛娱乐行业公链，为全球泛娱乐社区提供价值流通枢纽：一个泛娱乐内容发布平台，实现创作者与消费者之间点对点的内容交互；一个让IP全方位变现的云经济平台；实现IP身价的精准管理；一个娱乐资产汇集的平台，还原真实的娱乐商业价值圈。';
        $arr['faq4']           = 'CallChain的优势是？';
        $arr['faq5']           = 'CallChain创始人是中国最早做区块链技术的专家之一，有着丰富的区块链行业经验。合伙人及创始团队成员大多是历经多年创业的老兵。在资本、管理、泛娱乐等领域都涉足非常深入。CallChain作为全球泛娱乐行业的公链，其独特的“一键发币”+“币币交易”功能，为每位有梦想有才华的人，提供了基础支持平台，人人都可以把个人影响力数字资产证券化，可以发行自己的链上资产，用区块链的方式为爱豆打Call、为自己打Call！成为耀眼的明星！';
        $arr['faq6']           = 'CallChain创始团队如何？';
        $arr['faq7']           = 'CallChain邀请国内外著名区块链行业及泛娱乐行业的专家，和具有丰富市场实战经验的职场精英，组成了一支活力、高效、激情的团队，秉持着区块链精神，去中心化、公平、公正、开放、透明、包容、信任，专注于区块链技术在泛娱乐的推广、应用以及落地，基于中国市场并面向全球扩张。';
        $arr['faq8']           = 'CallChain有电报群等社交媒体么？';
        $arr['faq9']           = '微信公众号：CallChain<br>
                    官方QQ群：667484862<br>
                    中文官方电报群：http://0.plus/callchain.com<br>
                    微博：https://weibo.com/u/6523578854<br>
                    Facebook：https://www.facebook.com/cnzzhx/ ';
        $arr['faq10']          = 'CallChain的商业价值？';
        $arr['faq11']          = '帮助潜在和成名IP，开创一个全新的舞台，通过IP的影响力，可实现数字资产证券化。';
        $arr['faq12']          = 'CallChain有钱包么？';
        $arr['faq13']          = '有的，用户可以通过CallToken钱包地址https://www.pgyer.com/callchain 进行下载安装。';
        $arr['faq14']          = 'CallToken是什么？';
        $arr['faq15']          = 'CallToken是CallChain主网的发行通证。CallToken功能是CallChain运行的基本机制之一。通过Call Token功能实现数字资产发行的便捷，构建丰富的娱乐IP CallToken系统。CallToken功能包括IP CallToken发行、CallToken支付、CallToken兑换等，实现基于区块链简单交易的原始Token功能，无需合约。合约可以基于原始Token功能，构建更加复杂的组合式Token功能。';
        $arr['faq16']          = '个人的IP Token如何升值？';
        $arr['faq17']          = '用户在CallChain上一键发行个人IP Token后，Token根据市场影响力，将逐渐流动起来，IP资产就有了市场定价，粉丝会通过流通量、影响力等市场标准进行买入和卖出。
<br>另外，IP Token可自由创造多类消费场景，如换购IP的指定服务、周边衍生品、IP Token保值升值等，给予粉丝更多的互动参与和福利。';
        $arr['faq18']          = '什么是一键发币？';
        $arr['faq19']          = '一键发币是CallChain为了解决区块链技术发币难、设限多等问题，在CallToken钱包内开发的一项功能。
与其他区块链技术的发币功能对比，CallToken的一键发币功能，简单易行、无门槛、速度快、免费发币等综合特点，对新手级用户也可以做到一分钟操作。';
        $arr['faq20']          = 'CallToken的币币交易有什么区别？';
        $arr['faq21']          = '币币交易主要是针对虚拟币和虚拟币之间的交易，以其中一种币作为计价单位去购买其他币种 。币币交易规则同样是按照价格，优先时间、优先顺序完成撮合交易。
CallToken的币币交易也是基于CALL币的币币交易，用户可以发行自己的IP Token，而IP Token可以跟CallToken进行币币交易，CallToken可以在上线的交易所进行买卖。打通了IP Token与交易所的通道，免去成本高昂的各种门槛费用。让发行数字资产的IP们能更加专心的做自己擅长的事业。 ';
        $arr['faq22']          = '在未来，CallChain的场景应用有哪些？';
        $arr['faq23']          = 'CallChain以区块链技术为底层架构，可提供多种商业应用场景。例如：<br>
1) 影视领域,可为项目方募集资金,为投资人提供分红服务;<br>
2) 为客户提供合约性与有偿性的可信的数据服务;<br>
3) 为用户提供 IP 认证和交易服务;<br>
4) 销售独家发行的限量商品与服务等。<br>
随着CallChain的发展，在未来，我们相信还会有更多潜在有价值的场景应用不断涌现。';
        $arr['faq24']          = 'Call未来将会遇到的最大挑战是什么？';
        $arr['faq25']          = '让更多的用户接受区块链并理解DApps的价值。这不仅对CallChain而言，对整个区块链生态系统也是最大的挑战。CallChain是一个以社区为驱动的开源行业公链，服务与发展好CallChain社区，将会是CallChain在未来最大的保障。 CallChain以社区为动力，积极关注社区，倾听社区，与我们的社区一起建立更加美好的CallChain生态系统。';

        $arr['wallet1']         = 'CallToken app最新版本';
        $arr['wallet2']         = '一起为爱豆打Call';
        $arr['wallet3']         = '2018.6.29 更新 1.0.3版';
        $arr['wallet4']         = '一定保存好自己的私钥。';
        $arr['wallet5']         = '先卸载旧版本，再安装新版本。';
        $arr['wallet6']         = '可导入自己的钱包私钥或注册新钱包。';
        $arr['wallet7']         = '下载地址：https://www.pgyer.com/callchain';
        $arr['wallet8']         = '下载iOS版本';
        $arr['wallet9']         = '下载Android版本';




    }
    else
    {

        $arr['header1']        = 'Home';
        $arr['header2']        = 'News';
        $arr['header3']        = 'Notice';
        $arr['header4']        = 'Media';
        $arr['header5']        = 'Event';
        $arr['header6']        = 'Explore';
        $arr['header6_1']      = 'CallWallet';
        $arr['header7']        = 'WalletApp';
        $arr['header8']        = 'FAQ';




        $arr['front_page1']    = 'Born to be proud  Call for yourself';
        $arr['front_page2']    = 'Personal IP one-click on the chain';
        $arr['front_page3']    = 'White Paper';
        $arr['front_page4']    = 'What is CallChain?';
        $arr['front_page5']    = "A pan-entertainment content publishing platform that enables peer-to-peer content interaction between creators and consumers.<br/>A cloud economic platform that enables IP to be fully realized, achieving precise management of IP worth.<br/>A platform for the collection of entertainment IP assets to restore the real entertainment business value circle.<br/>CallChain is a decentralized pan-entertainment platform based on blockchain technology, providing a value distribution hub for the global pan-entertainment community.<br/>On this platform, The audience, fans, Entertainment Daren, etc., can deeply participate in all aspects of entertainment.<br/>Really realize the Call for idol, Call for yourself!";
        $arr['front_page6']    = "In the era of pan-entertainment, everyone can become a star, realize their dreams, and become the IP of everyone's attention. The CallToken app allows the personal IP to be linked to the chain and issue a personal pass.";
        $arr['front_page7']    = "CallChain's “Pan Entertainment, Blockchain” variety channel is dedicated to creating an influential and competitive guest interview entertainment show.";
        $arr['front_page8']    = 'Download CallToken Wallet';
        $arr['front_page9']    = 'Latest News';
        $arr['front_page10']   = 'Activity event';
        $arr['front_page11']   = 'Cooperative institution';
        $arr['front_page12']   = 'More';
        $arr['front_page13']   = 'Everyone Can Issue Own Tokens';
        $arr['front_page14']   = 'Powered by Callchain';
        $arr['footer']         = 'Official social platform';


        $arr['page1']         = 'Read More';
        $arr['page2']         = 'Media news';
        $arr['page3']         = 'Notice';
        $arr['page4']         = 'Input key words';
        $arr['page5']         = 'Popular articles';
        $arr['page6']         = 'Share to';


        $arr['faq1']           = 'Updated on: 2018.06.01';
        $arr['faq2']           = 'What is CallChain?';
        $arr['faq3']           = "The CallChain Foundation is located in Singapore and is dedicated to building a decentralized pan-entertainment industry chain based on blockchain technology, providing a value-for-money hub for the global pan-entertainment community: a pan-entertainment content publishing platform that enables peer-to-peer content interaction between creators and consumers; a cloud economic platform that enables IP to be fully realized; achieve precise management of IP value; and a platform for the collection of entertainment assets to restore the real entertainment business value circle.";
        $arr['faq4']           = 'What is the advantage of CallChain?';
        $arr['faq5']           = "The founder of CallChain is one of the earliest experts in China's blockchain technology and has extensive experience in the blockchain industry.Most of the partners and founding team members are veterans who have been entrepreneurial for many years.In the fields of capital, management, and pan-entertainment, they are deeply involved.CallChain is the public chain of the global pan-entertainment industry. Its unique “one-click coin” + “coin transaction” function provides a basic support platform for everyone who has dreams and talents. Everyone can personally influence Securitization of digital assets, you can issue your own chain assets, use the blockchain way to Call for idol, and Call for yourself! Become a dazzling star!";
        $arr['faq6']           = "How is CallChain's founding team?";
        $arr['faq7']           = "CallChain invites experts from the famous blockchain industry and the pan-entertainment industry at home and abroad, as well as the elites with rich experience in market practice, to form a dynamic, efficient and passionate team, adhering to the spirit of blockchain, decentralized and fair. Fair, open, transparent, inclusive, and trustful, focusing on the promotion, application, and landing of blockchain technology in pan-intelligence, based on the Chinese market and expanding globally.";
        $arr['faq8']           = 'Does CallChain have social media such as telegraph groups?';
        $arr['faq9']           = 'WeChat public number: CallChain
                    Official QQ group: 667484862
                    Chinese official telegraph group: http://0.plus/callchain.com
                    Weibo: https://weibo.com/u/6523578854
                    Facebook: https://www.facebook.com/cnzzhx/';
        $arr['faq10']          = 'The business value of CallChain?';
        $arr['faq11']          = 'Helping potential and fame IP, creating a new arena, through the influence of IP, can achieve digital asset securitization.';
        $arr['faq12']          = 'Does CallChain have a wallet?';
        $arr['faq13']          = 'Yes, users can download and install through the CallToken wallet address https://www.pgyer.com/callchain.';
        $arr['faq14']          = 'What is CallToken?';
        $arr['faq15']          = 'CallToken is the issuing certificate of the CallChain main network. The CallToken function is one of the basic mechanisms for CallChain to run. The Call Token function enables the distribution of digital assets and builds a rich entertainment IP CallToken system. CallToken features include IP CallToken distribution, CallToken payment, CallToken redemption, etc., to implement the original Token function based on blockchain simple transactions, without contract. Contracts can build more complex combined Token functions based on the original Token functionality.';
        $arr['faq16']          = "How does an individual's IP Token appreciate?";
        $arr['faq17']          = "After the user issues a personal IP Token on CallChain, Token will gradually flow according to market influence. IP assets will have market pricing, and fans will buy and sell through market standards such as liquidity and influence.In addition, IP Token is free to create a variety of consumer scenarios, such as the redemption of IP designated services, peripheral derivatives, IP Token value appreciation, etc., giving fans more interactive participation and benefits.";
        $arr['faq18']          = 'What is a one-click coin?';
        $arr['faq19']          = "One-click coin is a function developed by CallChain in the CallToken wallet to solve the problem of blockchain technology, such as difficulty in issuing coins and setting limits. Compared with the function of the other blockchain technology, CallToken's one-click coin function is simple, easy to operate, has no threshold, fast speed, and free currency. It can also be used for one-minute operation for novice users.";
        $arr['faq20']          = "What is the difference between CallToken coin transactions?";
        $arr['faq21']          = "The coin transaction is mainly for the transaction between the virtual coin and the virtual coin, and one of the coins is used as the pricing unit to purchase other coins. The coin trading rules also complete the matching transaction according to price, time and priority. The CallToken coin transaction is also based on the CALL coin transaction, the user can issue his own IP Token, and the IP Token can trade with the CallToken, and the CallToken can be bought and sold on the online exchange. Opened the IP Token and the exchange's access, eliminating the costly thresholds. Let IPs that issue digital assets be more focused on what they are good at.";
        $arr['faq22']          = 'In the future, what are the application scenarios of CallChain?';
        $arr['faq23']          = 'CallChain uses blockchain technology as the underlying architecture to provide a variety of business applications. For example: 
        1) In the field of film and television, funds can be raised for project parties to provide dividend services for investors;
        2) Providing customers with contractual and paid trusted data services;
        3) Provide users with IP authentication and transaction services;
        4) Sales of limited-edition products and services.
        With the development of CallChain, in the future, we believe that there will be more potential and valuable scene applications.';

        $arr['faq24']          = 'What is the biggest challenge that Call will encounter in the future?';
        $arr['faq25']          = 'Let more users accept the blockchain and understand the value of DApps. This is not only the biggest challenge for CallChain for the entire blockchain ecosystem. CallChain is a community-driven open source industry public chain, serving and developing the CallChain community, will be the biggest guarantee for CallChain in the future. CallChain is community-driven, actively focusing on the community, listening to the community, and building a better CallChain ecosystem with our community.';

        $arr['wallet1']         = 'Latest version of CallToken app';
        $arr['wallet2']         = 'Call for idol together';
        $arr['wallet3']         = '2018.6.29 Update Version 1.0.3';
        $arr['wallet4']         = 'Be sure to save your private key.';
        $arr['wallet5']         = 'Uninstall the old version before installing the new version.';
        $arr['wallet6']         = 'You can import your own wallet private key or register a new wallet.';
        $arr['wallet7']         = 'Download address：https://www.pgyer.com/callchain';
        $arr['wallet8']         = 'Download iOS';
        $arr['wallet9']         = 'Download Android';

    }
    return $arr[$name];
}

?>
