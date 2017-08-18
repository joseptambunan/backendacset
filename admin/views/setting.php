<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Setting</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Home > Setting
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

          
            
              
               
                  <h4 class="panel-title">
                        <h4 class="box-title">Status : <span style="color:<?=strip_tags( $arrStatus[$setting[0]->status]['color'])?>"><strong><?= strip_tags( $arrStatus[$setting[0]->status]['label'] );?></strong></span></h4>
                    </h4>
                  <form action="<?php echo base_url();?>/admin/edit_setting" class="cat-form-open" enctype="multipart/form-data" method="post" accept-charset="utf-8">
                      <div class="form-group">
                        Set Status<br>
                        <select name="setting_value">
                          <option value="T">Live Production</option>
                          <option value="M">Maintenance</option>
                        </select>
                      </div>
                      <div class="form-group">
                        <input type="submit" name="answer1" value="submit" class="btn btn-primary">
                      </div>
                  </form>
                             
            
                    
          </div>
            </div>
            <!-- /.panel-body -->
        </div>
        <!-- /.panel -->
    </div>
    <!-- /.col-lg-12 -->
</div>
  