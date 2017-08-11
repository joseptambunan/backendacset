<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Proyek</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Beranda > Proyek
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
            <div class="panel-group" id="accordion">
              <?php 
            foreach ($raw_proyek as $key) 
            {
              if($key->active == 1)
              {
                $status = 'active';
                $color = 'green';
                $icon = "fa fa-times";
                $title = "remove";
              }
              else
              {
                $status = 'deactive';
                $color = 'red';
                $icon = "fa fa-check";
                $title = "activate";  
              }

          ?>

          <?php 
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

          
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapse<?= $key->id ?>"><h4 class="box-title"><?= strip_tags($key->title) ?></h4></a>
                    </h4>
                </div>
                <div id="collapse<?= $key->id ?>" class="panel-collapse collapse">
                    <div class="panel-body">
                         <img src="<?= base_url($key->userfile) ?>" class="img-responsive">

                          <div class="cat-editmulti-wrapper">
                            <div class="warning"></div>
                            <?php
                              $config = array(
                                          'admin/edit_proyek/'.$key->id => 
                                          array(
                                            array(
                                                    'type' => 'textarea',
                                                    'name' => 'descriptor',
                                                    'class' => 'form-control ckeditor',
                                                    'value' => $key->descriptor
                                                 ),    
                                            array(
                                                    'type' => 'file',
                                                    'name' => 'userfile',
                                                    'required' => 'required'
                                                 ),                      
                                            array(
                                                    'type' => 'submit',
                                                    'name' => 'btn-edpre',
                                                    'class' => 'btn btn-primary cat-edit-btn',
                                                    'value' => 'Edit'
                                                 ),                                  
                                          )
                                      );

                              $this->cat_form->form_maker($config);              
                            ?>                    
                          </div>
                    </div>
                </div>
            </div>
        
                        

          <?php
            }
          ?>
          </div>    
          <span>Fixed <strong>6 item proyek <i>( tidak ada penambahan atau pengurangan )</i></strong></span>
          </div>      
            </div>
            <!-- /.panel-body -->
        </div>
        <!-- /.panel -->
    </div>
    <!-- /.col-lg-12 -->
</div>
