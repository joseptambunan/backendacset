<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Logs</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Home > Logs
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
           


          <?php 
            $arrStatus = array("M" => array("label" => "Maintenance", "color" => "red"), "T" => array("label" => "Live Production", "color" => "blue"));

            if($this->session->userdata('error'))
            {
              if(($this->session->userdata('error') == 'data submitted'))
              {
                echo '<div class="alert alert-success text-center" role="alert">'.$this->session->userdata('error').'</div>';             
              }
              else
              {
                echo '<div class="alert alert-warning text-center" role="alert">'.$this->session->userdata('error').'</div>';
              }

              $this->session->unset_userdata('error');
            }
          ?>

                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                          <th style="width:5%;">No.</th>
                          <th>Logs</th>
                          <th style="width:15%;">Date</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                          $i = 0;
                          foreach ($logs as $key) {                  
                        ?>
                          <tr>
                              <td><?php echo ($i+1);?></td>
                              <td><?php echo $key->description;?></td>
                              <td><?php echo $key->created_at;?></td>
                            </tr>
                        <?php $i++; } ?>
                      </tbody>
                  </table>
                             
            
                    
          </div>
            </div>
            <!-- /.panel-body -->
        </div>
        <!-- /.panel -->
    </div>
    <!-- /.col-lg-12 -->
</div>
  