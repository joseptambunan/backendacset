<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Corporate Principal</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                About Us > Corporate Principal
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
            <div class="panel-group" id="accordion">
              <?php 
            foreach ($raw_principal as $key) 
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
                                          'admin/edit_principal/'.$key->id => 
                                          array(
                                            array(
                                                    'type' => 'text',
                                                    'name' => 'title',
                                                    'class' => 'form-control ckeditor',
                                                    'value' => $key->title
                                                 ),    
                                            array(
                                                    'type' => 'textarea',
                                                    'name' => 'desc',
                                                    'class' => 'form-control ckeditor',
                                                    'value' => $key->desc
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
                            <a class="btn btn-danger" href="<?php echo base_url().'admin/delete_principal/'.$key->id;?>">Hapus</a>                  
                          </div>
                    </div>
                </div>
            </div>
        
                        

          <?php
            }
          ?>
          </div>    
          <span><strong>Add Principal</strong></span>
          <div class="cat-editmulti-wrapper">
            <div class="warning"></div>
            <?php
              $config = array(
                  'admin/add_principal/'.$key->id => 
                  array(
                    array(
                            'type' => 'text',
                            'name' => 'title',
                            'class' => 'form-control ckeditor',
                            'value' => ''
                         ),    
                    array(
                            'type' => 'textarea',
                            'name' => 'desc',
                            'class' => 'form-control ckeditor',
                            'value' => ''
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
                            'value' => 'Add'
                         ),                                  
                  )
              );

              $this->cat_form->form_maker($config);              
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
