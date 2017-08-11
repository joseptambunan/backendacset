<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Komite Audit</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                GCG > Komite Audit
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
            <div class="panel-group" id="accordion">
              <?php 
            foreach ($raw_komiteaudit as $key) 
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
                
                    <div class="panel-body">
                          <a href="<?= base_url($key->userfile) ?>"><div class="media">
                                <img src="<?= base_url('assets/image/investor/pdficon.png') ?>" class="img-responsive">
                            <div class="media-body">
                              <h5 align="center"><?= $key->filetitle ?></h5>
                            </div>
                            <div class="clearfix"></div>
                            </div></a>

                          <div class="cat-editmulti-wrapper">
                            <div class="warning"></div>
                            <?php
                              $config = array(
                                          'admin/edit_komiteaudit/'.$key->id => 
                                          array(  
                                            array(
                                                    'type' => 'textarea',
                                                    'name' => 'descriptor',
                                                    'class' => 'form-control ckeditor',
                                                    'value' => $key->descriptor
                                                 ), 
                                            array(
                                                    'type' => 'textarea',
                                                    'name' => 'independensi',
                                                    'class' => 'form-control ckeditor',
                                                    'value' => $key->independensi
                                                 ), 
                                            array(
                                                    'type' => 'textarea',
                                                    'name' => 'tugas',
                                                    'class' => 'form-control ckeditor',
                                                    'value' => $key->tugas
                                                 ), 
                                            array(
                                                    'type' => 'textarea',
                                                    'name' => 'komposisi',
                                                    'class' => 'form-control ckeditor',
                                                    'value' => $key->komposisi
                                                 ),
                                            array(
                                                    'type' => 'text',
                                                    'name' => 'filetitle',
                                                    'class' => 'form-control ckeditor',
                                                    'value' => $key->filetitle
                                                 ), 
                                            array(
                                                    'type' => 'file',
                                                    'name' => 'userfile',
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
          
                        

          <?php
            }
          ?>
          </div>    
          
          </div>      
            </div>
            <!-- /.panel-body -->
        </div>
        <!-- /.panel -->
    </div>
    <!-- /.col-lg-12 -->
</div>
