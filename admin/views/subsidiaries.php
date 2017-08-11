<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Subsidiaries</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                About Us > Subsidiaries
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
            <div class="panel-group" id="accordion">
              <?php 
            foreach ($raw_subsidiaries as $key) 
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
                                          'admin/edit_subsidiaries/'.$key->id => 
                                          array(
                                            array(
                                                    'type' => 'text',
                                                    'name' => 'title',
                                                    'class' => 'form-control ckeditor',
                                                    'value' => $key->title
                                                 ), 
                                            array(
                                                    'type' => 'text',
                                                    'name' => 'email',
                                                    'class' => 'form-control ckeditor',
                                                    'value' => $key->email
                                                 ),       
                                            array(
                                                    'type' => 'textarea',
                                                    'name' => 'descriptor',
                                                    'class' => 'form-control ckeditor',
                                                    'value' => $key->descriptor
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
                          <a href="admin/delete_subsidiaries/<?= $key->id?>" class="btn btn-danger" style="margin-top: 10px" onclick="return confirm('Are you sure you want to delete?')">Delete</a>

                    </div>
                </div>
            </div>
        
                        

          <?php
            }
          ?>


          </div>    

          
          </div>

          <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseAdd"><h4 class="box-title">Add Subsidiaries</h4></a>
                    </h4>
                </div>
                <div id="collapseAdd" class="panel-collapse collapse">
                    <div class="panel-body">

                          <div class="cat-editmulti-wrapper">
                            <div class="warning"></div>
                            <?php
                $config = array(
                            'admin/add_subsidiaries/' => 
                            array(
                              array(
                                      'type' => 'text',
                                      'name' => 'title',
                                      'class' => 'form-control',
                                      'rules' => 'trim|required',
                                      'placeholder' => 'Masukkan Nama'
                                   ),
                              array(
                                      'type' => 'text',
                                      'name' => 'email',
                                      'class' => 'form-control',
                                      'rules' => 'trim|required',
                                      'placeholder' => 'Masukkan Email'
                                   ),
                              array(
                                      'type' => 'textarea',
                                      'name' => 'descriptor',
                                      'class' => 'form-control ckeditor',
                                      'rules' => 'required',
                                      'placeholder' => 'Description'
                                   ),
                              array(
                                      'type' => 'text',
                                      'name' => 'active',
                                      'class' => 'form-control',
                                      'rules' => 'trim|required',
                                      'value' => '1'
                                   ),      
                              array(
                                      'type' => 'file',
                                      'name' => 'userfile',
                                      'path' => './assets/image/temp/'
                                   ),              
                              array(
                                      'type' => 'submit',
                                      'name' => 'answer1',
                                      'class' => 'btn btn-primary',
                                      'value' => 'submit'
                                   )                        
                            )
                        );

                $this->cat_form->form_maker($config);              
              ?>                    
                          </div>
                    </div>
                </div>
            </div>

            </div>
            <!-- /.panel-body -->
        </div>
        <!-- /.panel -->
    </div>
    <!-- /.col-lg-12 -->
</div>
