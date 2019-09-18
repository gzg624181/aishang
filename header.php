<link rel="shortcut icon" href="favicon.ico" />

    <header class="met-head navbar-fixed-top" m-id="72" m-type="head_nav">
    <nav class="navbar navbar-default  head_nav_met_27_2_72">
        <div class="container">
            <div class="row">
              <!-- logo -->
             <div class="navbar-header pull-xs-left">
                 <a href="https://mb.mituo.cn/mui468/" class="met-logo vertical-align block pull-xs-left p-y-5" title="窗帘布艺公司响应式网站模板">
                     <div class="vertical-align-middle">
                         <img src="templates/default/images/1544767077.png" alt="窗帘布艺公司响应式网站模板"></div>
                 </a>
             </div>
          <h1 hidden="">窗帘布艺公司响应式网站模板</h1>

             <!-- logo -->

                <!-- 导航 -->
        <div class="collapse navbar-collapse navbar-collapse-toolbar pull-md-right p-0" id="head_nav_met_27_2_72-collapse">

        <ul class="nav navbar-nav navlist">


        <?php

         $one=1;
         $pid=0;
         $dosql->Execute("SELECT * FROM  `#@__infoclass` where parentid='$pid' and checkinfo=true order by orderid asc",$one);
         $nums = $dosql->GetTotalRow($one);
         while($show = $dosql->GetArray($one)){
         $gourl = $show['linkurl'];
         $parentid = $show['id'];
         $keyword = $show['keyword'];
         ?>
        <li class="nav-item <?php if($keyword==1){echo "dropdown m-l-0";} ?>">
        <?php if($keyword==1){ ?>
        <a href="<?php echo $gourl; ?>" target="_self" title="<?php echo $show['classname']; ?>" class="nav-link dropdown-toggle " data-toggle="dropdown" data-hover="dropdown"><?php echo $show['classname']; ?></a>
        <?php }else{ ?>
        <a href="<?php echo $gourl; ?>" target="_self" title="<?php echo $show['classname']; ?>" class="nav-link "><?php echo $show['classname']; ?></a>
        <?php } ?>


      <div class="dropdown-menu dropdown-menu-right animate two-menu" style="">
      <?php
      $two=2;
      $dosql->Execute("SELECT * FROM  `#@__infoclass` where parentid='$parentid' and checkinfo=true order by orderid asc",$two);
      while($row = $dosql->GetArray($two)){
      $gourls = $row['linkurl'];
       ?>
      <a href="<?php echo $gourls; ?>" target="_self" title="<?php echo $row['classname']; ?>" class="dropdown-item hassub"><?php echo $row['classname']; ?></a>
      <?php } ?>
      </div>

      </li>
      <?php  }?>

    </ul>
                </div>
                <!-- 导航 -->
            </div>
        </div>
    </nav>
</header>
