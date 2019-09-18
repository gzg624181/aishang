<?php
require_once(dirname(__FILE__).'/include/config.inc.php');
//初始化参数检测正确性
$cid = empty($cid) ? 5 : intval($cid);
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<meta charset="utf-8">
<meta name="renderer" content="webkit">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0,user-scalable=0,minimal-ui">
<meta name="format-detection" content="telephone=no">
<?php echo GetHeader(1,$cid); ?>
<meta name="generator" content="MetInfo 7.0.0beta" data-variable="../|cn|cn|mui468|3|1|0" data-user_name="">
<link href="https://mb.mituo.cn/mui468/favicon.ico" rel="shortcut icon" type="image/x-icon">
<link rel="stylesheet" type="text/css" href="templates/default/style/basic.css">
<link rel="stylesheet" type="text/css" href="templates/default/style/product_cn.css">
<style>
body{
    background-color:#ffffff !important;font-family: !important;}
h1,h2,h3,h4,h5,h6{font-family: !important;}
</style>
</head>
<body class="met-navfixed">

  <!-- header-->
  <?php require_once('header.php'); ?>
  <!-- /header-->

      <div class="banner_met_11_1_80 page-bg" m-id="80" m-type="banner">
        <div class="slick-slide">
        <img class="cover-image" src="templates/default/images/1545014670.jpg" sizes="(max-width: 767px) 767px" alt="" data-height="0|0|0" data-fade="true" data-autoplayspeed="4000" style="height: auto;">
        </div>
    </div>


    <div class="subcolumn_nav_met_11_3_10" m-id="10" m-type="nocontent">
			<div class="container">
				<div class="row">
					<div class="clearfix">
						<!-- 左侧网址导航 -->
						<div class="subcolumn-nav-location clearfix ulstyle">
						<?php echo GetPosStr($cid); ?>
					  </div>

						<!-- 右侧产品类型 -->
						<div class="subcolumn-nav text-xs-left">
								<div class="box">
									<ul class="subcolumn_nav_met_11_3_10-ul m-b-0 p-y-10 p-x-0 ulstyle">

											  <li>
													<a href="product-5-1.html" title="全部" 0="" target="_self" class="active link">全部</a>
												</li>

                <?php
                 $parentid =5;
                 $dosql->Execute("SELECT * FROM  `#@__infoclass` where parentid='$parentid' and checkinfo=true order by orderid asc");
                 $nums = $dosql->GetTotalRow();
                 for($i=0;$i<$nums;$i++){
                 $row = $dosql->GetArray();
                 $gourls = $row['linkurl'];
                 ?>
								<li>
								<a href="<?php echo $gourls; ?>" 0="" target="_self" title="<?php echo $row['classname']; ?>" class="link">
                <?php echo $row['classname']; ?></a>
								</li>
               <?php } ?>
							  </ul>
								</div>
							</div>
								</div>

									</div>
			</div>
		</div>
        <main class="product_list_page_met_21_2_33 met-product animsition " m-id="33">
    <div class="container">
        <div class="row clearfix     left">
      <ul class="    			blocks-xs-2					 	blocks-md-2 blocks-lg-4 blocks-xxl-4  met-pager-ajax imagesize cover met-product-list met-grid" id="met-grid" data-scale="400x400" style="position: relative; height: 736px; perspective-origin: 50% 898.5px;">
        <?php
        $cid==6;
        if(!empty($keyword))
        {
          $keyword = htmlspecialchars($keyword);

          $sql = "SELECT * FROM `#@__infoimg` WHERE (classid=$cid OR parentstr LIKE '%,$cid,%') AND title LIKE '%$keyword%' AND delstate='' AND checkinfo=true ORDER BY orderid DESC";
        }
        else
        {
          $sql = "SELECT * FROM `#@__infoimg` WHERE (classid=$cid OR parentstr LIKE '%,$cid,%') AND delstate='' AND checkinfo=true ORDER BY orderid DESC";
        }

        $dopage->GetPage($sql,9);
        while($row = $dosql->GetArray())
        {
          if($row['picurl'] != '') $picurl = $row['picurl'];
          else $picurl = 'templates/default/images/nofoundpic.gif';

          if($row['linkurl']=='' and $cfg_isreurl!='Y') $gourl = 'productshow.php?cid='.$row['classid'].'&id='.$row['id'];
          else if($cfg_isreurl=='Y') $gourl = 'productshow-'.$row['classid'].'-'.$row['id'].'-1.html';
          else $gourl = $row['linkurl'];
        ?>

      <li class="prd-li animation-slide-bottom50 appear-no-repeat shown animate" data-plugin="appear" data-animate="slide-bottom50" data-repeat="false" style="position: absolute; left: 0px; top: 0px; animation-duration: 0.499911s;">
      <div class="prd-box">
    <a href="<?php echo $gourl; ?>" title="<?php echo $row['title']; ?>" class="img-url" target="_self">
  <img class="img-con" data-original="<?php echo $picurl; ?>" alt="加厚遮光窗帘" style="width: 100%; display: inline;" data-lazyload="true" src="<?php echo $picurl; ?>">
  </a>
  <div class="prd-li-title">
  <p>
  <a href="<?php echo $gourl; ?>" title="加厚遮光窗帘" target="_self">
  <span style=""><?php echo $row['title']; ?></span>                                        </a>
  </p>
  <span class="bor-bot"></span>
                                                                                                                   <p class="prd-desc"></p>
                                                                                                                    <p class="m-b-0 m-t-5 price"></p>
    </div>
    </div>
    </li>
  <?php } ?>
  </ul>
		    <div class="m-t-20 text-xs-center hidden-sm-down" m-type="nosysdata">
                <?php echo $dopage->GetList(); ?>

					</div>

			<div class="met_pager met-pager-ajax-link hidden-md-up invisible" data-plugin="appear" data-animate="slide-bottom" data-repeat="false" m-type="nosysdata" style="">
			    <button type="button" class="btn btn-primary btn-block btn-squared ladda-button" id="met-pager-btn" data-plugin="ladda" data-style="slide-left" data-url="" data-page="1"><span class="ladda-label">
			    <i class="icon wb-chevron-down m-r-5" aria-hidden="true"></i>
			     </span><span class="ladda-spinner"></span></button>
			</div>

                    </div>
    </div>
</main>
<!-- footer-->
<?php require_once('footer.php'); ?>
<!-- /footer-->
</body>
</html>
