            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Welcome to ACSET Admin Panel!</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
<!--             <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-user fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?= $total_visitor ?></div>
                                    <div>Total Visitor</div>
                                </div>
                            </div>
                        </div>
                        <a href="<?= base_url('admin/traffic_detail/total_visitor') ?>">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-male fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?= $total_uniquevisitor ?></div>
                                    <div>Unique Visitor</div>
                                </div>
                            </div>
                        </div>
                        <a href="<?= base_url('admin/traffic_detail/total_uniquevisitor') ?>">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-yellow">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-pie-chart fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?= $total_bouncerate.'%' ?></div>
                                    <div>Bounce Rate</div>
                                </div>
                            </div>
                        </div>
                        <a href="<?= base_url('admin/traffic_detail/total_bouncerate') ?>">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-red">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-eye fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?= $total_pageview ?></div>
                                    <div>Page View</div>
                                </div>
                            </div>
                        </div>
                        <a href="<?= base_url('admin/traffic_detail/total_pageview') ?>">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-globe fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?= $common_agent ?></div>
                                    <div>Common Browser</div>
                                </div>
                            </div>
                        </div>
                        <a href="<?= base_url('admin/traffic_detail/common_browser') ?>">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-success">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-map-marker fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?= $total_direct ?></div>
                                    <div>Direct Access</div>
                                </div>
                            </div>
                        </div>
                        <a href="<?= base_url('admin/traffic_detail/total_direct') ?>">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-warning">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-leaf fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?= $total_robot ?></div>
                                    <div>Organic Accsess</div>
                                </div>
                            </div>
                        </div>
                        <a href="<?= base_url('admin/traffic_detail/total_organic') ?>">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-danger">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-share-alt-square fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?= $total_referal ?></div>
                                    <div>Referal</div>
                                </div>
                            </div>
                        </div>
                        <a href="<?= base_url('admin/traffic_detail/total_referal') ?>">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>  
            </div>
            <div class="row">
                <div class="col-lg-4">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-bell fa-fw"></i> Notifications Panel
                        </div>
                        <!-- /.panel-heading -->
                        <!-- <div class="panel-body">
                            <div class="list-group">
                                <div href="#" class="list-group-item">
                                    <i class="fa fa-tag fa-fw"></i> Last Login Name
                                    <span class="pull-right text-muted small"><em><?= $name ?></em>
                                    </span>
                                </div>
                                <div href="#" class="list-group-item">
                                    <i class="fa fa-calendar fa-fw"></i> Last Login Date
                                    <span class="pull-right text-muted small"><em><?= $last_login ?></em>
                                    </span>
                                </div>
                                <div href="#" class="list-group-item">
                                    <i class="fa fa-check fa-fw"></i> Login Successed
                                    <span class="pull-right text-muted small"><em><?= $success ?></em>
                                    </span>
                                </div>
                                <div href="#" class="list-group-item">
                                    <i class="fa fa-close fa-fw"></i> Login Failed
                                    <span class="pull-right text-muted small"><em><?= $failed ?></em>
                                    </span>
                                </div>
                                <div href="#" class="list-group-item">
                                    <i class="fa fa-upload fa-fw"></i> Total Added Post
                                    <span class="pull-right text-muted small"><em><?= $added_post ?></em>
                                    </span>
                                </div>
                                <div href="#" class="list-group-item">
                                    <i class="fa fa-edit fa-fw"></i> Total Editted Post
                                    <span class="pull-right text-muted small"><em><?= $editted_post ?></em>
                                    </span>
                                </div>
                                <div href="#" class="list-group-item">
                                    <i class="fa fa-trash fa-fw"></i> Total Deleted Post
                                    <span class="pull-right text-muted small"><em><?= $deleted_post ?></em>
                                    </span>
                                </div>
                                <div href="#" class="list-group-item">
                                    <i class="fa fa-calendar-o fa-fw"></i> Last Post Changed
                                    <span class="pull-right text-muted small"><em><?= $last_editted ?></em>
                                    </span>
                                </div>
                            </div> -->
                            <!-- /.list-group -->
                        <!-- </div> -->
                        <!-- /.panel-body -->
                    <!-- </div> -->
                    <!-- /.panel -->
                <!-- </div> -->
                <!-- /.col-lg-4 -->
<!--                 <div class="col-lg-8">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-clock-o fa-fw"></i> Responsive Timeline
                        </div> -->
                        <!-- /.panel-heading -->
 <!--                        <div class="panel-body">
                            <ul class="timeline">
<?php 
    $c = count($timeline['timeline']['history']);
    $c = $c - 1;

    if($c > 10): $t = $c - 10;
    else: $t = 0;
    endif;

    for ($i=$c; $i >= $t; $i--) 
    { 

        if($i % 2 == 0):
            $liclass = 'timeline-inverted';
        else:
            $liclass = null;
        endif;

        if($i == $c):
            $iclass = 'fa-spinner';
            $badge = null;
        else:
            $iclass = 'fa-check';
            $badge = 'primary';
        endif;
?>
                                <li class="<?= $liclass ?>">
                                    <div class="timeline-badge <?= $badge ?>"><i class="fa <?= $iclass ?>"></i>
                                    </div>
                                    <div class="timeline-panel">
                                        <div class="timeline-heading">
                                            <h4 class="timeline-title"><?= $timeline['timeline']['history'][$i]['name'] ?></h4>
                                            <p><small class="text-muted"><i class="fa fa-clock-o"></i><?= $timeline['timeline']['history'][$i]['date'] ?></small>
                                            </p>
                                        </div>
                                        <div class="timeline-body">
                                            <p><?= $timeline['timeline']['history'][$i]['activity'] ?></p>
                                        </div>
                                    </div>
                                </li>
<?php 
    }    
?>
                            </ul>
                        </div> -->
                        <!-- /.panel-body -->
                    <!-- </div> -->
                    <!-- /.panel -->                    
                <!-- </div>                                 -->
            <!-- </div> -->
            <!-- /.row -->