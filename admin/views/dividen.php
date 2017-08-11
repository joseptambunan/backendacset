<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Dividen</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Investor > Dividen
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
            <div class="panel-group" id="accordion">
              <?php 
            foreach ($raw_dividen as $key) 
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
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapse<?= $key->id ?>"><h4 class="box-title"><?= strip_tags($key->year) ?></h4></a>
                    </h4>
                </div>
                <div id="collapse<?= $key->id ?>" class="panel-collapse collapse">
                    <div class="panel-body">
                          <div class="cat-editmulti-wrapper">
                            <div class="warning"></div>
                            <?php
                              $config = array(
                                          'admin/edit_dividen/'.$key->id => 
                                          array(
                                            array(
                                                    'type' => 'text',
                                                    'name' => 'year',
                                                    'class' => 'form-control ckeditor',
                                                    'value' => $key->year,
                                                    'placeholder' => 'Insert Year',
                                      'required' => 'required'
                                                 ),
                                            array(
                                                    'type' => 'text',
                                                    'name' => 'final',
                                                    'class' => 'form-control ckeditor',
                                                    'value' => $key->final,
                                                    'placeholder' => 'Insert Final (IDR)',
                                      'required' => 'required'
                                                 ),
                                            array(
                                                    'type' => 'date',
                                                    'name' => 'date',
                                                    'value' => $key->date,
                                      'required' => 'required'
                                                 ),
                                            array(
                                                    'type' => 'text',
                                                    'name' => 'ratio',
                                                    'class' => 'form-control ckeditor',
                                                    'value' => $key->ratio,
                                                    'placeholder' => 'Insert Payout Ratio',
                                      'required' => 'required'
                                                 ),
                                            array(
                                                    'type' => 'text',
                                                    'name' => 'outstanding',
                                                    'class' => 'form-control ckeditor',
                                                    'value' => $key->outstanding,
                                                    'placeholder' => 'Insert Outstanding Shares',
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
                          <a href="admin/delete_dividen/<?= $key->id?>" class="btn btn-danger" style="margin-top: 10px" onclick="return confirm('Are you sure you want to delete?')">Delete</a>

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
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseAdd"><h4 class="box-title">Add Dividen</h4></a>
                    </h4>
                </div>
                <div id="collapseAdd" class="panel-collapse collapse">
                    <div class="panel-body">

                          <div class="cat-editmulti-wrapper">
                            <div class="warning"></div>
                            <?php
                $config = array(
                            'admin/add_dividen/' => 
                            array(
                              array(
                                      'type' => 'text',
                                      'name' => 'year',
                                      'class' => 'form-control',
                                      'rules' => 'trim|required',
                                      'placeholder' => 'Insert Year',
                                      'required' => 'required'
                                   ),
                              array(
                                      'type' => 'text',
                                      'name' => 'final',
                                      'class' => 'form-control',
                                      'rules' => 'trim|required',
                                      'placeholder' => 'Insert Final (IDR)',
                                      'required' => 'required'
                                   ),      
                              array(
                                      'type' => 'date',
                                      'name' => 'date',
                                      'required' => 'required'
                                   ),  
                              array(
                                      'type' => 'text',
                                      'name' => 'ratio',
                                      'class' => 'form-control',
                                      'rules' => 'trim|required',
                                      'placeholder' => 'Insert Payout Ratio',
                                      'required' => 'required'
                                   ),
                              array(
                                      'type' => 'text',
                                      'name' => 'outstanding',
                                      'class' => 'form-control',
                                      'rules' => 'trim|required',
                                      'placeholder' => 'Insert Outstanding Shares',
                                      'required' => 'required'
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
  