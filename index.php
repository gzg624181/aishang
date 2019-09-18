<?php require_once(dirname(__FILE__).'/include/config.inc.php'); ?>
<!DOCTYPE html>
<html
><head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<meta charset="utf-8">
<meta name="renderer" content="webkit">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0,user-scalable=0,minimal-ui">
<meta name="format-detection" content="telephone=no">
<?php echo GetHeader(); ?>
<meta name="generator" content="MetInfo 6.2.0" data-variable="https://mb.mituo.cn/mui468/|cn|cn|mui468|10001|10001|0" data-user_name="">
<link rel="stylesheet" type="text/css" href="templates/default/style/basic.css">
<link rel="stylesheet" type="text/css" href="templates/default/style/index_cn.css">
<link rel="stylesheet" href="templates/default/style/font-awesome-4.3.0/css/font-awesome.css">
<link rel="stylesheet" href="templates/default/style/font-awesome-4.3.0/css/font-awesome.min.css">
<link href="templates/default/style/on_index.css" rel="stylesheet" type="text/css">
<script src="templates/default/js/jquery.js" type="text/javascript"></script>
<script src="templates/default/js/bplayer.js" type="text/javascript"></script>
<script src="templates/default/js/basic.js" type="text/javascript"></script>
</head>
<body class="met-navfixed">
  <!-- header-->
  <?php require_once('header.php'); ?>
  <!-- /header-->

  <div class="banner_met_11_1_80 page-bg slick-initialized slick-slider" m-id="80" m-type="banner">
    <div class="topvebanner">
    <div id="myjQuery">
      <div id="myjQueryContent">
        <?php
        $dosql->Execute("SELECT * FROM `#@__infoimg` WHERE classid=13 AND delstate='' AND checkinfo=true ORDER BY orderid DESC LIMIT 0,5");
        $nums = $dosql->GetTotalRow();
        while($row = $dosql->GetArray())
        {
          if($row['linkurl'] != '')
          $gourl = $row['linkurl'];
          else $gourl = 'javascript:;';
        ?>
        <div><a href="<?php echo $gourl; ?>" target="_blank"><img src="<?php echo $row['picurl']; ?>" title="<?php echo $row['title']; ?>"></a></div>
        <?php
        }
        ?>
      </div>
      <ul id="myjQueryNav">
       <?php for($i=0;$i<$nums; $i++){ ?>
        <li></li>
       <?php } ?>
      </ul>
    </div>
  </div>
  </div>
    </div>

  <div class="product_list_met_21_7_35 met-index-body text-xs-center     bgpic" m-id="35">
  	<div class="container">
  		<div class="title text-xs-center">
              <h2 class="animation-slide-top50 appear-no-repeat" data-plugin="appear" data-animate="slide-top50" data-repeat="false">产品展示</h2>
              <p class="desc">
                  <span class="bor-hr animation-slide-left50 appear-no-repeat" data-plugin="appear" data-animate="slide-left50" data-repeat="false"></span>
                  <span class="desc-con animation-slide-top50 appear-no-repeat" data-plugin="appear" data-animate="slide-top50" data-repeat="false">Product display</span>
                  <span class="bor-hr animation-slide-right50 appear-no-repeat" data-plugin="appear" data-animate="slide-right50" data-repeat="false"></span>
              </p>
              <p class="desc-bom animation-slide-bottom50 appear-no-repeat" data-plugin="appear" data-animate="slide-bottom50" data-repeat="false">
  				            </p>
          </div>
  			<div class="nav-tabs-horizontal nav-tabs-inverse nav-tabs-animate" data-plugin="tabs">
  				<ul class="nav nav-tabs nav-tabs-solid flex flex-center animation-slide-top50 appear-no-repeat" data-plugin="appear" data-animate="slide-top50" data-repeat="false">
  					<li class="nav-item" role="presentation">
  					 <a class="nav-link active radius0" data-toggle="tab" href="#all" aria-controls="all" role="tab" aria-expanded="true">
  							<h3 class="font-weight-300">全部</h3>
  						</a>
  					</li>
           <?php
            $parentid =5;
            $dosql->Execute("SELECT * FROM  `#@__infoclass` where parentid='$parentid' and checkinfo=true order by orderid asc");
            $nums = $dosql->GetTotalRow();
            for($i=0;$i<$nums;$i++){
            $row = $dosql->GetArray()
            ?>
  					<li class="nav-item" role="presentation">
  						<a class="nav-link radius0" href="#list_<?php echo $i;?>" data-toggle="tab" aria-controls="list_<?php echo $i;?>" role="tab" aria-expanded="true" title="<?php echo $row['classname']; ?>">
  							<h3 class="font-weight-300"><?php echo $row['classname']; ?></h3>
  						</a>
  					</li>
          <?php } ?>
          </ul>
  			</div>
  		<div class="tab-content">

  		<ul data-plugin="appear" data-animate="slide-bottom50" data-repeat="false" class="blocks-xs-2       blocks-md-2 blocks-lg-4 blocks-xxl-4 no-space imagesize index-product-list tab-pane active animation-scale-up animation-slide-bottom50 appear-no-repeat" id="all" role="tabpanel" data-scale="$ui[img_h]X$ui[img_w]">


       <?php
        $cid=5;
        $dosql->Execute("SELECT * FROM `#@__infoimg` WHERE (classid=$cid OR parentstr LIKE '%,$cid,%') AND delstate='' AND checkinfo=true ORDER BY orderid DESC limit 8");
        while($row= $dosql->GetArray()){
        $gourl = 'productshow-'.$row['classid'].'-'.$row['id'].'-1.html';
        ?>
  		 	<li class="p-r-10 m-b-10" data-type="list_8">
  					<div class="card ">
  						<figure class="card-header cover">
  							<a href="<?php echo $gourl; ?>" title="<?php echo $row['title']; ?>" target="_self">
  								<img style="border-radius:3px;" class="cover-image lazy" alt="<?php echo $row['title']; ?>" data-lazyload="true" src="<?php echo $row['picurl']; ?>" style="display: inline;"></a>
  						</figure>

  						<h4 class="card-title m-0 p-x-10 text-shadow-none font-szie-16 font-weight-300">
  							<a href="<?php echo $gourl; ?>" title="<?php echo $row['title']; ?>" class="block text-truncate" target="_self"><?php echo $row['title']; ?></a>
  							<!-- <p class='m-b-0 m-t-5 red-600'></p>									 -->
  						</h4>
  					</div>
  				</li>
        <?php } ?>
  	        		</ul>
          <!-- 榻榻米床垫 cid=6 -->
  		     <ul class="blocks-xs-2	blocks-md-2 blocks-lg-4 blocks-xxl-4 no-space imagesize index-product-list tab-pane animation-scale-up" data-scale="$ui[img_h]X$ui[img_w]" id="list_0" role="tabpanel">

             <?php
              $cid=6;
              $dosql->Execute("SELECT * FROM `#@__infoimg` WHERE classid=$cid  AND delstate='' AND checkinfo=true ORDER BY orderid DESC limit 4");
              while($row= $dosql->GetArray()){
              $gourl = 'productshow-'.$row['classid'].'-'.$row['id'].'-1.html';
              ?>
        		 	<li class="p-r-10 m-b-10" data-type="list_0">
        					<div class="card ">
        						<figure class="card-header cover">
        							<a href="<?php echo $gourl; ?>" title="<?php echo $row['title']; ?>" target="_self">
        								<img style="border-radius:3px;" class="cover-image lazy" alt="<?php echo $row['title']; ?>" data-lazyload="true" src="<?php echo $row['picurl']; ?>" style="display: inline;"></a>
        						</figure>

        						<h4 class="card-title m-0 p-x-10 text-shadow-none font-szie-16 font-weight-300">
        							<a href="<?php echo $gourl; ?>" title="<?php echo $row['title']; ?>" class="block text-truncate" target="_self"><?php echo $row['title']; ?></a>
        							<!-- <p class='m-b-0 m-t-5 red-600'></p>									 -->
        						</h4>
        					</div>
        				</li>
              <?php } ?>

  						</ul>
             <!-- 飘窗垫 cid=7 -->
  					<ul class="blocks-xs-2 blocks-md-2 blocks-lg-4 blocks-xxl-4 no-space imagesize index-product-list tab-pane animation-scale-up" data-scale="$ui[img_h]X$ui[img_w]" id="list_1" role="tabpanel">

              <?php
               $cid=7;
               $dosql->Execute("SELECT * FROM `#@__infoimg` WHERE classid=$cid  AND delstate='' AND checkinfo=true ORDER BY orderid DESC limit 4");
               while($row= $dosql->GetArray()){
               $gourl = 'productshow-'.$row['classid'].'-'.$row['id'].'-1.html';
               ?>
         		 	<li class="p-r-10 m-b-10" data-type="list_1">
         					<div class="card ">
         						<figure class="card-header cover">
         							<a href="<?php echo $gourl; ?>" title="<?php echo $row['title']; ?>" target="_self">
         								<img style="border-radius:3px;" class="cover-image lazy" alt="<?php echo $row['title']; ?>" data-lazyload="true" src="<?php echo $row['picurl']; ?>" style="display: inline;"></a>
         						</figure>

         						<h4 class="card-title m-0 p-x-10 text-shadow-none font-szie-16 font-weight-300">
         							<a href="<?php echo $gourl; ?>" title="<?php echo $row['title']; ?>" class="block text-truncate" target="_self"><?php echo $row['title']; ?></a>
         							<!-- <p class='m-b-0 m-t-5 red-600'></p>									 -->
         						</h4>
         					</div>
         				</li>
               <?php } ?>

  					</ul>

             <!-- 沙发垫 cid=14 -->
  					<ul class="blocks-xs-2	blocks-md-2 blocks-lg-4 blocks-xxl-4 no-space imagesize index-product-list tab-pane animation-scale-up" data-scale="$ui[img_h]X$ui[img_w]" id="list_2" role="tabpanel">

              <?php
               $cid=14;
               $dosql->Execute("SELECT * FROM `#@__infoimg` WHERE classid=$cid  AND delstate='' AND checkinfo=true ORDER BY orderid DESC limit 4");
               while($row= $dosql->GetArray()){
               $gourl = 'productshow-'.$row['classid'].'-'.$row['id'].'-1.html';
               ?>
         		 	<li class="p-r-10 m-b-10" data-type="list_2">
         					<div class="card ">
         						<figure class="card-header cover">
         							<a href="<?php echo $gourl; ?>" title="<?php echo $row['title']; ?>" target="_self">
         								<img style="border-radius:3px;" class="cover-image lazy" alt="<?php echo $row['title']; ?>" data-lazyload="true" src="<?php echo $row['picurl']; ?>" style="display: inline;"></a>
         						</figure>

         						<h4 class="card-title m-0 p-x-10 text-shadow-none font-szie-16 font-weight-300">
         							<a href="<?php echo $gourl; ?>" title="<?php echo $row['title']; ?>" class="block text-truncate" target="_self"><?php echo $row['title']; ?></a>
         							<!-- <p class='m-b-0 m-t-5 red-600'></p>									 -->
         						</h4>
         					</div>
         				</li>
               <?php } ?>
  						</ul>

              <!-- 	布艺窗帘 cid=15 -->
              <ul class="blocks-xs-2	blocks-md-2 blocks-lg-4 blocks-xxl-4 no-space imagesize index-product-list tab-pane animation-scale-up" data-scale="$ui[img_h]X$ui[img_w]" id="list_3" role="tabpanel">

               <?php
                $cid=15;
                $dosql->Execute("SELECT * FROM `#@__infoimg` WHERE classid=$cid  AND delstate='' AND checkinfo=true ORDER BY orderid DESC limit 4");
                while($row= $dosql->GetArray()){
                $gourl = 'productshow-'.$row['classid'].'-'.$row['id'].'-1.html';
                ?>
               <li class="p-r-10 m-b-10" data-type="list_3">
                   <div class="card ">
                     <figure class="card-header cover">
                       <a href="<?php echo $gourl; ?>" title="<?php echo $row['title']; ?>" target="_self">
                         <img style="border-radius:3px;" class="cover-image lazy" alt="<?php echo $row['title']; ?>" data-lazyload="true" src="<?php echo $row['picurl']; ?>" style="display: inline;"></a>
                     </figure>

                     <h4 class="card-title m-0 p-x-10 text-shadow-none font-szie-16 font-weight-300">
                       <a href="<?php echo $gourl; ?>" title="<?php echo $row['title']; ?>" class="block text-truncate" target="_self"><?php echo $row['title']; ?></a>
                       <!-- <p class='m-b-0 m-t-5 red-600'></p>									 -->
                     </h4>
                   </div>
                 </li>
                <?php } ?>
               </ul>


  						</div>
  		<div class="more-btn">
  		<a href="product-5-1.html"><span>查看更多</span><i class="fa fa-angle-right"></i></a>
  		</div>
  	</div>
  </div>

<main class="about_list_met_28_8_34 page-content" m-id="34">
    <div class="container">
        <div class="row">
            <div class="title">
            <h3 class="animation-slide-bottom50 appear-no-repeat" data-plugin="appear" data-animate="slide-bottom50" data-repeat="false">关于我们</h3>
          <p class="animation-slide-bottom50 appear-no-repeat" data-plugin="appear" data-animate="slide-bottom50" data-repeat="false">about us</p>
                            </div>
            <div class="show_item clearfix">
                <div class="show_item_left col-sm-5 animation-slide-right50 appear-no-repeat" data-plugin="appear" data-animate="slide-right50" data-repeat="false">
                    <div class="row">
                    <div class="show_item_left_bor">
            <img  style="border-radius:3px;" src="<?php echo InfoPic(2); ?>" class="leftimg animation-slide-left50 appear-no-repeat" alt="<?php echo $cfg_webname; ?>" data-plugin="appear" data-animate="slide-left50" data-repeat="false">
                    </div>
                    </div>
                </div>
                <div class="show_item_right col-sm-7 animation-slide-bottom50 appear-no-repeat" data-plugin="appear" data-animate="slide-bottom50" data-repeat="false">
                    <p><?php echo Info(2); ?></p>
                    <h3><a href="about-2-1.html" target="_blank">了解更多 &gt;&gt;</a></h3>
                </div>
            </div>
        </div>
    </div>
</main>

<div class="service_list_met_35_8_39 met-index-body" m-id="39">
 	<div class="container">
 		     <div class="mytitlebox">
		 	 <div class="mytitle">
               	<h2 class="myh2">我们的优势</h2>
       </div>
       <div class="mydesc">advantage</div>
          </div>
            <div class="rowbox">
            	 <ul class="ulstyle slickul blocks-100 blocks-md-1 blocks-lg-2 blocks-xxl-4 no-space imagesize index-product-list tab-pane active animation-scale-up" role="tabpanel">

               <li class="sumary_list animation-slide-bottom appear-no-repeat" data-plugin="appear" data-animate="slide-bottom" data-repeat="false">
	                 <div class="animation-slide-bottom appear-no-repeat">
                   <div class="single-service-item">
		            	 	<div class="service-left-bg">
		            	 	</div>
		            	 		<div class="service-icon">
		            	 			<i class="fa fa-briefcase" aria-hidden="true"></i>
		            	 		</div>
		            	 		<div class="service-text">
		            	 			<h4 style="margin-top: 28px;" class="text">代理原则</h4>
		            	 			<p class="text service-textdesc">凡直接与本公司签约的代理商，均可在自己的代理区域内发展经销、</p>
		            	 		</div>
		            	 </div>
	            	</div>
                 </li>


             <li class="sumary_list animation-slide-bottom appear-no-repeat" data-plugin="appear" data-animate="slide-bottom" data-repeat="false">
	                 <div class="animation-slide-bottom appear-no-repeat">
                  <div class="single-service-item">
		            	 	<div class="service-left-bg">
		            	 	</div>
		            	 		<div class="service-icon">
		            	 			<i class="icon fa-gavel"></i>
		            	 		</div>
		            	 		<div class="service-text">
		            	 			<h4 style="margin-top: 28px;" class="text">授权品牌</h4>
		            	 			<p class="text service-textdesc">授权“丽人”品牌产品在当地的经销权，这样有了授权品牌作为后盾</p>
		            	 		</div>
		            	 </div>

	            	</div>
                 </li>

              <li class="sumary_list animation-slide-bottom appear-no-repeat" data-plugin="appear" data-animate="slide-bottom" data-repeat="false">
	                 <div class="animation-slide-bottom appear-no-repeat">
                         		            	 <div class="single-service-item">
		            	 	<div class="service-left-bg">
		            	 	</div>
		            	 		<div class="service-icon">
		            	 			<i class="fa fa-dollar"></i>
		            	 		</div>
		            	 		<div class="service-text">
		            	 			<h4 style="margin-top: 28px;" class="text">统一价格</h4>
		            	 			<p class="text service-textdesc">统一的价格政策，确保您的利益公平公正。统一市场的零售价，有助</p>
		            	 		</div>
		            	 </div>

	            	</div>
                 </li>

                <li class="sumary_list animation-slide-bottom appear-no-repeat" data-plugin="appear" data-animate="slide-bottom" data-repeat="false">
	                 <div class="animation-slide-bottom appear-no-repeat">
                         		            	 <div class="single-service-item">
		            	 	<div class="service-left-bg">
		            	 	</div>
		            	 		<div class="service-icon">
		            	 		<i class="fa fa-reply"></i>
		            	 		</div>
		            	 		<div class="service-text">
		            	 			<h4 style="margin-top: 28px;" class="text">整店输出</h4>
		            	 			<p class="text service-textdesc">丽人家纺为加盟商建立客户档案，提供市场调研、店面选址、店面评</p>
		            	 		</div>
		            	 </div>

	            	</div>
                 </li>
            </ul>
        </div>
 	</div>
 </div>

 <html>
 <head></head>
 <body>
  <div class="news_list_met_21_14_65 met-index-service met-index-body met-index-newproduct     bgcolor" m-id="65">
   <section class="lh-news lh-section clearfix">
    <div class="lh-news-con clearfix">

      <?php
        $cid=4;
        $r = $dosql->GetOne("SELECT * FROM pmw_infolist where (classid=$cid OR parentstr LIKE
		'%,$cid,%') AND delstate='' AND checkinfo=true and flag like '%a%'");
        $gourl = 'newsshow-'.$r['classid'].'-'.$r['id'].'-1.html';
       ?>
     <div class="lh-news-a clearfix">
      <div class="img left">
       <img style="border-radius:3px;" src="<?php echo $r['picurl']; ?>" />
      </div>
      <div class="title-wrap">
       <h4><?php echo date("Y-m-d",$r['posttime']); ?></h4>
       <h2> <span style=""><?php echo $r['title'] ?></span></h2>
       <h3><?php echo ReStrLen($r[ 'content'],250, "..."); ?></h3>
       <a href="<?php echo $gourl; ?>" title="<?php echo $r['title'] ?>" target="_self" class="lh-more">more<i class="icon fa-long-arrow-right"></i></a>
      </div>
      <a href="<?php echo $gourl; ?>" title="<?php echo $r['title'] ?>" target="_self" class="lh-mobnews-a"></a>
     </div>


     <ul class="lh-news-b lh-flex">
       <?php
       $cid=4;
        $dosql->Execute("SELECT * FROM pmw_infolist where (classid=$cid OR parentstr LIKE
		'%,$cid,%') AND delstate='' AND checkinfo=true and flag like '%c%' ORDER BY id desc limit 1,3");
        while($row= $dosql->GetArray()){
        $gourl = 'newsshow-'.$row['classid'].'-'.$row['id'].'-1.html';
        ?>
      <li class="animation-slide-bottom appear-no-repeat" data-plugin="appear" data-animate="slide-bottom" data-repeat="false">
       <div class="img">
        <img src="<?php echo $row['picurl']; ?>" />
      </div> <a href="<?php echo $gourl; ?>" class="bgopacity" data-bgs="#f2f2f2" data-bg="#0bbdba" data-opacity="0.5" target="_self"> <h4><?php echo date("Y-m-d",$row['posttime']); ?></h4> <h2 title="<?php echo $row['title'];?>">
      <span style=""><?php echo $row['title']; ?></span></h2> <p title="<?php echo $row['content']; ?>"> <?php echo ReStrLen($row[ 'content'],80, "..."); ?> </p> </a> </li>
      <?php } ?>
     </ul>
    </div>
   </section>
  </div>


    <div class="link_met_28_1_83 text-xs-center" m-id="83" m-type="link">
    <div class="container p-y-15">
        <ul class="breadcrumb p-0 link-img m-0">
            <li class="breadcrumb-item">友情链接 :</li>
            <?php
            $dosql->Execute("SELECT * FROM `#@__weblink` WHERE classid=1 AND checkinfo=true ORDER BY orderid,id DESC");
            while($row = $dosql->GetArray())
            {
            ?>
        <li class="breadcrumb-item     split">

        <a href="<?php echo $row['linkurl']; ?>" title="<?php echo $row['webname']; ?>" target="_blank">
        <span><?php echo $row['webname']; ?></span>
        </a>
            </li>
         <?php } ?>
      </ul>
    </div>
</div>

 <footer class="foot_nav_met_28_2_50 met-foot  border-top1     hasbgimg     hasbottom" m-id="50" m-type="foot">

       <div class="container text-center">
   		<p><?php echo $cfg_copyright;?> <?php echo $cfg_icp;?>
         &nbsp; <a style="font-size:13px;color: #848484;" href="sitemap.php">网站地图</a>
         Powered by <a style="font-size:13px;color: #848484;" href="http://www.internet-kf.com/" target="_blank"><?php echo $cfg_jishu;?></a>
         &nbsp;<span style="font-size:13px;color: #848484;">
         </span>
     <a href="http://webscan.360.cn/index/checkwebsite/url/www.zrcase.com">
       <img title="360网站安全监测" border="0" alt="360网站安全监测" style="width:60px;" src="http://webscan.360.cn/status/pai/hash/1365c411268ad8e924a52ea65e906756"/></a>
       </p>

       </div>

</footer>

</body>
</html>
