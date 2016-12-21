<!--<div class="pageheader">
      <h2><i class="fa fa-home"></i> Member Name <span>Member Details</span></h2>
      <div class="breadcrumb-wrapper">
        <span class="label">You are here:</span>
        <ol class="breadcrumb">
          <li><a href="#">DPC</a></li>
          <li class="active">Member Details</li>
        </ol>
      </div>
</div>-->
<br>
<div class="panel panel-default">
        <div class="panel-body">
          Need Help - Ask Here!
        </div>
 </div>
<div class="row">    
    <div style="float: left; margin-left: 13px;"><h1 class="subtitle txtspace">MEMBER DETAIL <?php echo $membername[0]['company_name'];?></h1></div>
    <div style="float: left; margin-top: 7px;"><a href="<?php echo base_url();?>index.php?admin/member_information"><button class="btn btn-primary btn-xs">BACK TO LIST</button></a></div>
</div>
<div class="contentpanel">
    <div class="row">
        <div class="col-md-6">
            <div class="panel panel-primary panel-alt">
            <div class="panel-heading">
                <div class="panel-btns">
                  <a class="panel-close" href="">×</a>
                  <a class="minimize" href="">−</a>
                </div><!-- panel-btns -->
                <h3 class="panel-title">MEMBER INFORMATION</h3>
              </div>
              <div class="panel-body" style="display: block;">
                  <p>Industry :<?php echo $member_detail[0]['industry'];?></p>
                  <p>Target Markets :<?php echo $member_detail[0]['targetMarkets'];?></p>
                  <p>Things :<?php echo $member_detail[0]['things'];?></p>
                  <p>Web Link :<?php echo $member_detail[0]['webLink'];?></p>
                  <p>Preferences :<?php echo $member_detail[0]['preferences'];?></p>
              </div>
            </div><!-- panel -->
        </div>
        <div class="col-md-2">
            <div class="panel panel-warning panel-alt widget-today">
                <div class="panel-heading text-center cl">
                    <a href="<?php echo base_url();?>index.php?admin/logo_management/<?php echo $membername[0]['id'];?>"><i class="fa fa-picture-o"></i></a>
                </div>
                <div class="panel-body text-center">
                  <h3 class="today">LOGO FILES</h3>
                </div><!-- panel-body -->
              </div>
              <div class="panel panel-warning panel-alt widget-today">
                <div class="panel-heading text-center cl">
                    <a href="<?php echo base_url();?>index.php?admin/logo_management/<?php echo $membername[0]['id'];?>"><i class="fa fa-file-image-o"></i></a>
                </div>
                <div class="panel-body text-center">
                  <h3 class="today">IMAGES</h3>
                </div><!-- panel-body -->
              </div>
        </div>
        
        <div class="col-md-4">
        <div class="panel panel-dark panel-alt widget-quick-status-post">
          <div class="panel-heading">
              <div class="panel-btns">
                <a class="panel-close" href="">×</a>
                <a class="minimize" href="">−</a>
              </div><!-- panel-btns -->
              <h3 class="panel-title qmt">QUICK MERCHANDISE BOXES</h3>
            </div>
            <div class="panel-body">
              <ul class="nav nav-tabs nav-justified">
                <li class="active"><a data-toggle="tab" href="#post-status"><i class="fa fa-pencil"></i> <strong>Catalog</strong></a></li>
                <li class=""><a data-toggle="tab" href="#post-photo"><i class="fa fa-picture-o"></i> <strong>Photo/s</strong></a></li>
              </ul>
              <div class="tab-content">
                <div class="tab-pane active" id="post-status">
                  <input type="text" placeholder="SKU - Item/s Lookup" class="form-control">
                  &nbsp;
                  <button class="btn btn-primary btn-sm btn-block amb">ADD TO MEMBER</button>
                  <p>Classic i1000 | Relaxed Golf Cap with Velcro</p>
                  <p>Knits iK70 | Waffle Knit with Cuff</p>
                </div>
                <div class="tab-pane" id="post-photo">
                  <input type="text" placeholder="Choose photo" class="form-control">
                </div>
                <button class="btn btn-primary btn-block mt10 sb">SUBMIT</button>
              </div><!-- tab-content -->
              
            </div><!-- panel-body -->
          </div>
            <div class="mb20"></div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="panel panel-primary panel-alt">
            <div class="panel-heading">
                <div class="panel-btns">
                  <a class="panel-close" href="">×</a>
                  <a class="minimize" href="">−</a>
                </div><!-- panel-btns -->
                <h3 class="panel-title">MEMBER LINKED IN INFORMATION</h3>
              </div>
              <div class="panel-body" style="display: block;">
                  <p><?php echo $member_linkedin[0]['title'];?></p>
                  <p><?php echo $member_linkedin[0]['profileInfo'];?></p>
              </div>
            </div><!-- panel -->
        </div>
        <div class="col-md-2">
            <div class="panel panel-warning panel-alt widget-today">
                <div class="panel-heading text-center cl">
                  <a href="<?php echo base_url();?>index.php?admin/member_calendar/<?php echo $membername[0]['id'];?>"><i class="fa fa-calendar-o"></i></a>
                </div>
                <div class="panel-body text-center">
                  <h3 class="today">CALENDAR</h3>
                </div><!-- panel-body -->
              </div>
              <div class="panel panel-warning panel-alt widget-today">
                <div class="panel-heading text-center pb">
                  <a href="<?php echo base_url();?>index.php?admin/logo_management/<?php echo $membername[0]['id'];?>"><i class="fa fa-calendar-o"></i></a>
                </div>
                <div class="panel-body text-center">
                  <h3 class="today">PAST BOXES</h3>
                </div><!-- panel-body -->
              </div>
        </div>
        
        <div class="col-md-4">
              <div class="panel panel-default panel-alt widget-messaging">
          <div class="panel-heading">
              <div class="panel-btns">
                <a class="panel-edit" href=""><i class="fa fa-edit"></i></a>
              </div><!-- panel-btns -->
              <h3 class="panel-title">FEEDBACK FROM MEMBER</h3>
            </div>
            <div class="panel-body">
              <ul>
                <li>
                  <small class="pull-right">Dec 10</small>
                  <h4 class="sender">Jennier Lawrence</h4>
                  <small>Lorem ipsum dolor sit amet...</small>
                </li>
                <li>
                  <small class="pull-right">Dec 9</small>
                  <h4 class="sender">Marsha Mellow</h4>
                  <small>Lorem ipsum dolor sit amet...</small>
                </li>
                <li>
                  <small class="pull-right">Dec 9</small>
                  <h4 class="sender">Holly Golightly</h4>
                  <small>Lorem ipsum dolor sit amet...</small>
                </li>
              </ul>
            </div><!-- panel-body -->
          </div>
        </div>
    </div>  
</div>