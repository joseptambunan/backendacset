<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Informasi Saham</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Investor > Informasi Saham
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
            <div class="panel-group" id="accordion">
              <?php 
            foreach ($raw_sahaminformasi as $key) 
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

                          <div class="cat-editmulti-wrapper">
                            <div class="warning"></div>
                            <?php
                              $config = array(
                                          'admin/edit_sahaminformasi/'.$key->id => 
                                          array(
                                            array(
                                                    'type' => 'text',
                                                    'name' => 'title',
                                                    'class' => 'form-control ckeditor',
                                                    'value' => $key->title,
                                      'required' => 'required'
                                                 ), 
                                            array(
                                                    'type' => 'text',
                                                    'name' => 'name',
                                                    'class' => 'form-control ckeditor',
                                                    'value' => $key->name,
                                      'required' => 'required'
                                                 ),       
                                            array(
                                                    'type' => 'textarea',
                                                    'name' => 'content',
                                                    'class' => 'form-control ckeditor',
                                                    'value' => $key->content
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
                          <a href="admin/delete_sahaminformasi/<?= $key->id?>" class="btn btn-danger" style="margin-top: 10px" onclick="return confirm('Are you sure you want to delete?')">Delete</a>

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
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseAdd"><h4 class="box-title">Add Informasi Saham</h4></a>
                    </h4>
                </div>
                <div id="collapseAdd" class="panel-collapse collapse">
                    <div class="panel-body">

                          <div class="cat-editmulti-wrapper">
                            <div class="warning"></div>
                            <?php
                $config = array(
                            'admin/add_sahaminformasi/' => 
                            array(
                              array(
                                      'type' => 'text',
                                      'name' => 'title',
                                      'class' => 'form-control',
                                      'rules' => 'trim|required',
                                      'placeholder' => 'Insert Title',
                                      'required' => 'required'
                                   ),
                              array(
                                      'type' => 'text',
                                      'name' => 'name',
                                      'class' => 'form-control',
                                      'rules' => 'trim|required',
                                      'placeholder' => 'Insert Name',
                                      'required' => 'required'
                                   ),
                              array(
                                      'type' => 'textarea',
                                      'name' => 'content',
                                      'class' => 'form-control ckeditor',
                                      'rules' => 'required',
                                      'placeholder' => 'Content'
                                   ),
                              array(
                                      'type' => 'text',
                                      'name' => 'active',
                                      'class' => 'form-control',
                                      'rules' => 'trim|required',
                                      'value' => '1',
                                      'required' => 'required'
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
