<?php 
    $uri = $this->uri->uri_string();
    $uri = explode('/', $uri);
    
    if($identifier = end($uri) == 'first' || $identifier = end($uri) == 'second' || $identifier = end($uri) == 'third'): 
        $identifier = $uri[count($uri)-2];
    else:
        $identifier = end($uri);
    endif;
?>

<?php 
    switch ($identifier) 
    {
        case 'total_visitor':
?>
            <div class="heading-wrapper">
                <h1>Visitor Traffic on <?= date('Y') ?></h1>    
            </div>
            <div id="morris-area-chart"></div>

            <p>&nbsp;</p>
                <a href="<?= base_url('admin/traffic_detail/total_visitor/first') ?>">View First Quarter</a>&nbsp;|&nbsp;
                <a href="<?= base_url('admin/traffic_detail/total_visitor/second') ?>">View Second Quarter</a>&nbsp;|&nbsp;
                <a href="<?= base_url('admin/traffic_detail/total_visitor/third') ?>">View Third Quarter</a>
            <p>&nbsp;</p>

            <div class="panel panel-default">
                <div class="panel-heading">
                    Visitor Details on <?= $quarter ?> Quarter
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div class="dataTable_wrapper">
                        <table class="table table-striped table-bordered table-hover" id="sb-table">
                            <thead>
                                <tr>
                                    <th>IP Address</th>
                                    <th>Country</th>
                                    <th>Country Code</th>
                                    <th>City</th>
                                    <th>Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $c = 0;
                                    foreach ($record as $key) 
                                    {
                                        if($c % 2 == 0): $num = 'odd';
                                        else: $num = 'even';
                                        endif;

                                        echo    '<tr class="'.$num.'">'.
                                                    '<td>'.$key->ip.'</td>'.
                                                    '<td>'.$key->country.'</td>'.
                                                    '<td>'.$key->country_code.'</td>'.
                                                    '<td>'.$key->city.'</td>'.
                                                    '<td>'.$key->date.'</td>'.
                                                '</tr>';    
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.table-responsive -->
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
<?php 
            break;

        case 'total_uniquevisitor':
?>
            <div class="heading-wrapper">
                <h1>Unique Visitor Traffic on <?= date('Y') ?></h1> 
            </div>
            <div id="morris-area-chart"></div>

            <p>&nbsp;</p>
                <a href="<?= base_url('admin/traffic_detail/total_uniquevisitor/first') ?>">View First Quarter</a>&nbsp;|&nbsp;
                <a href="<?= base_url('admin/traffic_detail/total_uniquevisitor/second') ?>">View Second Quarter</a>&nbsp;|&nbsp;
                <a href="<?= base_url('admin/traffic_detail/total_uniquevisitor/third') ?>">View Third Quarter</a>
            <p>&nbsp;</p>

            <div class="panel panel-default">
                <div class="panel-heading">
                    Unique Visitor Details on <?= $quarter ?> Quarter
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div class="dataTable_wrapper">
                        <table class="table table-striped table-bordered table-hover" id="sb-table">
                            <thead>
                                <tr>
                                    <th>IP Address</th>
                                    <th>Country</th>
                                    <th>Country Code</th>
                                    <th>City</th>
                                    <th>Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $c = 0;
                                    foreach ($record as $key) 
                                    {
                                        if($c % 2 == 0): $num = 'odd';
                                        else: $num = 'even';
                                        endif;

                                        echo    '<tr class="'.$num.'">'.
                                                    '<td>'.$key->ip.'</td>'.
                                                    '<td>'.$key->country.'</td>'.
                                                    '<td>'.$key->country_code.'</td>'.
                                                    '<td>'.$key->city.'</td>'.
                                                    '<td>'.$key->date.'</td>'.
                                                '</tr>';    
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.table-responsive -->
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->            
<?php
            break;

        case 'total_bouncerate':
?>
            <div class="heading-wrapper">
                <h1>Bounce Rate Traffic on <?= date('Y') ?></h1>    
            </div>
            <div id="morris-area-chart"></div>

            <p>&nbsp;</p>
                <a href="<?= base_url('admin/traffic_detail/total_bouncerate/first') ?>">View First Quarter</a>&nbsp;|&nbsp;
                <a href="<?= base_url('admin/traffic_detail/total_bouncerate/second') ?>">View Second Quarter</a>&nbsp;|&nbsp;
                <a href="<?= base_url('admin/traffic_detail/total_bouncerate/third') ?>">View Third Quarter</a>
            <p>&nbsp;</p>

            <div class="panel panel-default">
                <div class="panel-heading">
                    Bounce Rate Details on <?= $quarter ?> Quarter
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div class="dataTable_wrapper">
                        <table class="table table-striped table-bordered table-hover" id="sb-table">
                            <thead>
                                <tr>
                                    <th>IP Address</th>
                                    <th>Country</th>
                                    <th>Country Code</th>
                                    <th>City</th>
                                    <th>Stayed for</th>
                                    <th>Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $c = 0;
                                    foreach ($record as $key) 
                                    {
                                        if($c % 2 == 0): $num = 'odd';
                                        else: $num = 'even';
                                        endif;

                                        echo    '<tr class="'.$num.'">'.
                                                    '<td>'.$key->ip.'</td>'.
                                                    '<td>'.$key->country.'</td>'.
                                                    '<td>'.$key->country_code.'</td>'.
                                                    '<td>'.$key->city.'</td>'.
                                                    '<td>'.$key->timer.'</td>'.
                                                    '<td>'.$key->date.'</td>'.
                                                '</tr>';    
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.table-responsive -->
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->                        
<?php
            break;

        case 'total_pageview':
?>
            <div class="heading-wrapper">
                <h1>Page View Traffic on <?= date('Y') ?></h1>  
            </div>
            <div id="morris-area-chart"></div>

            <p>&nbsp;</p>
                <a href="<?= base_url('admin/traffic_detail/total_pageview/first') ?>">View First Quarter</a>&nbsp;|&nbsp;
                <a href="<?= base_url('admin/traffic_detail/total_pageview/second') ?>">View Second Quarter</a>&nbsp;|&nbsp;
                <a href="<?= base_url('admin/traffic_detail/total_pageview/third') ?>">View Third Quarter</a>
            <p>&nbsp;</p>

            <div class="panel panel-default">
                <div class="panel-heading">
                    Page Viewed Details on <?= $quarter ?> Quarter
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div class="dataTable_wrapper">
                        <table class="table table-striped table-bordered table-hover" id="sb-table">
                            <thead>
                                <tr>
                                    <th>Page</th>
                                    <th>Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $c = 0;
                                    foreach ($record as $key) 
                                    {
                                        if($c % 2 == 0): $num = 'odd';
                                        else: $num = 'even';
                                        endif;

                                        echo    '<tr class="'.$num.'">'.
                                                    '<td>'.$key->page.'</td>'.
                                                    '<td>'.$key->date.'</td>'.
                                                '</tr>';    
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.table-responsive -->
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->                                
<?php
            break;

        case 'common_browser':
?>
            <div class="heading-wrapper">
                <h1>Common Browser on <?= date('Y') ?></h1> 
            </div>
            <div id="morris-area-chart"></div>

            <p>&nbsp;</p>
                <a href="<?= base_url('admin/traffic_detail/common_browser/first') ?>">View First Quarter</a>&nbsp;|&nbsp;
                <a href="<?= base_url('admin/traffic_detail/common_browser/second') ?>">View Second Quarter</a>&nbsp;|&nbsp;
                <a href="<?= base_url('admin/traffic_detail/common_browser/third') ?>">View Third Quarter</a>
            <p>&nbsp;</p>

            <div class="panel panel-default">
                <div class="panel-heading">
                    Page Viewed Details on <?= $quarter ?> Quarter
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div class="dataTable_wrapper">
                        <table class="table table-striped table-bordered table-hover" id="sb-table">
                            <thead>
                                <tr>
                                    <th>IP Address</th>
                                    <th>Country</th>
                                    <th>Country Code</th>
                                    <th>City</th>
                                    <th>Browser</th>
                                    <th>Platform</th>
                                    <th>Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $c = 0;
                                    foreach ($record as $key) 
                                    {
                                        if($c % 2 == 0): $num = 'odd';
                                        else: $num = 'even';
                                        endif;

                                        echo    '<tr class="'.$num.'">'.
                                                    '<td>'.$key->ip.'</td>'.
                                                    '<td>'.$key->country.'</td>'.
                                                    '<td>'.$key->country_code.'</td>'.
                                                    '<td>'.$key->city.'</td>'.
                                                    '<td>'.$key->agent.'</td>'.
                                                    '<td>'.$key->platform.'</td>'.
                                                    '<td>'.$key->date.'</td>'.                                                  
                                                '</tr>';    
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.table-responsive -->
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
<?php
            break;

        case 'total_direct':
?>
            <div class="heading-wrapper">
                <h1>Directed Access on <?= date('Y') ?></h1>    
            </div>
            <div id="morris-area-chart"></div>

            <p>&nbsp;</p>
                <a href="<?= base_url('admin/traffic_detail/total_direct/first') ?>">View First Quarter</a>&nbsp;|&nbsp;
                <a href="<?= base_url('admin/traffic_detail/total_direct/second') ?>">View Second Quarter</a>&nbsp;|&nbsp;
                <a href="<?= base_url('admin/traffic_detail/total_direct/third') ?>">View Third Quarter</a>
            <p>&nbsp;</p>

            <div class="panel panel-default">
                <div class="panel-heading">
                    Directed Access Details on <?= $quarter ?> Quarter
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div class="dataTable_wrapper">
                        <table class="table table-striped table-bordered table-hover" id="sb-table">
                            <thead>
                                <tr>
                                    <th>IP Address</th>
                                    <th>Country</th>
                                    <th>Country Code</th>
                                    <th>City</th>
                                    <th>Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $c = 0;
                                    foreach ($record as $key) 
                                    {
                                        if($c % 2 == 0): $num = 'odd';
                                        else: $num = 'even';
                                        endif;

                                        echo    '<tr class="'.$num.'">'.
                                                    '<td>'.$key->ip.'</td>'.
                                                    '<td>'.$key->country.'</td>'.
                                                    '<td>'.$key->country_code.'</td>'.
                                                    '<td>'.$key->city.'</td>'.
                                                    '<td>'.$key->date.'</td>'.                                                  
                                                '</tr>';    
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.table-responsive -->
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->           

<?php
            break;

        case 'total_organic':
?>
            <div class="heading-wrapper">
                <h1>Organic Access on <?= date('Y') ?></h1> 
            </div>
            <div id="morris-area-chart"></div>

            <p>&nbsp;</p>
                <a href="<?= base_url('admin/traffic_detail/total_organic/first') ?>">View First Quarter</a>&nbsp;|&nbsp;
                <a href="<?= base_url('admin/traffic_detail/total_organic/second') ?>">View Second Quarter</a>&nbsp;|&nbsp;
                <a href="<?= base_url('admin/traffic_detail/total_organic/third') ?>">View Third Quarter</a>
            <p>&nbsp;</p>

            <div class="panel panel-default">
                <div class="panel-heading">
                    Organic Access Details on <?= $quarter ?> Quarter
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div class="dataTable_wrapper">
                        <table class="table table-striped table-bordered table-hover" id="sb-table">
                            <thead>
                                <tr>
                                    <th>IP Address</th>
                                    <th>Country</th>
                                    <th>Country Code</th>
                                    <th>City</th>
                                    <th>Referer</th>
                                    <th>Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $c = 0;
                                    foreach ($record as $key) 
                                    {
                                        if($c % 2 == 0): $num = 'odd';
                                        else: $num = 'even';
                                        endif;

                                        echo    '<tr class="'.$num.'">'.
                                                    '<td>'.$key->ip.'</td>'.
                                                    '<td>'.$key->country.'</td>'.
                                                    '<td>'.$key->country_code.'</td>'.
                                                    '<td>'.$key->city.'</td>'.
                                                    '<td>'.$key->refer.'</td>'.
                                                    '<td>'.$key->date.'</td>'.                                                  
                                                '</tr>';    
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.table-responsive -->
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->          

<?php
            break;

        case 'total_referal':
?>
            <div class="heading-wrapper">
                <h1>Referal Access on <?= date('Y') ?></h1> 
            </div>
            <div id="morris-area-chart"></div>

            <p>&nbsp;</p>
                <a href="<?= base_url('admin/traffic_detail/total_referal/first') ?>">View First Quarter</a>&nbsp;|&nbsp;
                <a href="<?= base_url('admin/traffic_detail/total_referal/second') ?>">View Second Quarter</a>&nbsp;|&nbsp;
                <a href="<?= base_url('admin/traffic_detail/total_referal/third') ?>">View Third Quarter</a>
            <p>&nbsp;</p>
            
            <div class="panel panel-default">
                <div class="panel-heading">
                    Referal Access Details on <?= $quarter ?> Quarter
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div class="dataTable_wrapper">
                        <table class="table table-striped table-bordered table-hover" id="sb-table">
                            <thead>
                                <tr>
                                    <th>IP Address</th>
                                    <th>Country</th>
                                    <th>Country Code</th>
                                    <th>City</th>
                                    <th>Referer</th>
                                    <th>Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $c = 0;
                                    foreach ($record as $key) 
                                    {
                                        if($c % 2 == 0): $num = 'odd';
                                        else: $num = 'even';
                                        endif;

                                        echo    '<tr class="'.$num.'">'.
                                                    '<td>'.$key->ip.'</td>'.
                                                    '<td>'.$key->country.'</td>'.
                                                    '<td>'.$key->country_code.'</td>'.
                                                    '<td>'.$key->city.'</td>'.
                                                    '<td>'.$key->refer.'</td>'.
                                                    '<td>'.$key->date.'</td>'.                                                  
                                                '</tr>';    
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.table-responsive -->
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->

<?php
            break;          

        default:
            # code...
            break;
    }
?>