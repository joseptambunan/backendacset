<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Ikhtisar Keuangan</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Investor > Ikhtisar Keuangan
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
            <div class="panel-group" id="accordion">
              <?php 
            foreach ($raw_ikhtisar as $key) 
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
                                          'admin/edit_ikhtisar/'.$key->id => 
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
                                                    'name' => 'netrevenue',
                                                    'class' => 'form-control ckeditor',
                                                    'value' => $key->netrevenue,
                                                    'placeholder' => 'Net Revenue',
                                      'required' => 'required'
                                                 ),
                                            array(
                                                    'type' => 'text',
                                                    'name' => 'grossprofit',
                                                    'class' => 'form-control ckeditor',
                                                    'value' => $key->grossprofit,
                                                    'placeholder' => 'Gross Profit',
                                      'required' => 'required'
                                                 ),
                                            array(
                                                    'type' => 'text',
                                                    'name' => 'profityear',
                                                    'class' => 'form-control ckeditor',
                                                    'value' => $key->profityear,
                                                    'placeholder' => 'Profit for the year',
                                      'required' => 'required'
                                                 ),
                                            array(
                                                    'type' => 'text',
                                                    'name' => 'profitowner',
                                                    'class' => 'form-control ckeditor',
                                                    'value' => $key->profitowner,
                                                    'placeholder' => 'Profit/(loss) after tax attributable to Owners of the Parent',
                                      'required' => 'required'
                                                 ),
                                            array(
                                                    'type' => 'text',
                                                    'name' => 'profitinterest',
                                                    'class' => 'form-control ckeditor',
                                                    'value' => $key->profitinterest,
                                                    'placeholder' => 'Profit/(loss) after tax attributable to Non-controlling Interest',
                                      'required' => 'required'
                                                 ),
                                            array(
                                                    'type' => 'text',
                                                    'name' => 'earnings',
                                                    'class' => 'form-control ckeditor',
                                                    'value' => $key->earnings,
                                                    'placeholder' => 'Earnings per share (in Rupiah)',
                                      'required' => 'required'
                                                 ),
                                            array(
                                                    'type' => 'text',
                                                    'name' => 'assets',
                                                    'class' => 'form-control ckeditor',
                                                    'value' => $key->assets,
                                                    'placeholder' => 'Total Assets',
                                      'required' => 'required'
                                                 ),
                                            array(
                                                    'type' => 'text',
                                                    'name' => 'liabilities',
                                                    'class' => 'form-control ckeditor',
                                                    'value' => $key->liabilities,
                                                    'placeholder' => 'Total Liabilities',
                                      'required' => 'required'
                                                 ),
                                            array(
                                                    'type' => 'text',
                                                    'name' => 'equity',
                                                    'class' => 'form-control ckeditor',
                                                    'value' => $key->equity,
                                                    'placeholder' => 'Total Equity',
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
                          <a href="admin/delete_ikhtisar/<?= $key->id?>" class="btn btn-danger" style="margin-top: 10px" onclick="return confirm('Are you sure you want to delete?')">Delete</a>

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
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseAdd"><h4 class="box-title">Add Ikhtisar Keuangan</h4></a>
                    </h4>
                </div>
                <div id="collapseAdd" class="panel-collapse collapse">
                    <div class="panel-body">

                          <div class="cat-editmulti-wrapper">
                            <div class="warning"></div>
                            <?php
                $config = array(
                            'admin/add_ikhtisar/' => 
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
                                      'name' => 'netrevenue',
                                      'class' => 'form-control',
                                      'rules' => 'trim|required',
                                      'placeholder' => 'Net Revenue',
                                      'required' => 'required'
                                   ),
                              array(
                                      'type' => 'text',
                                      'name' => 'grossprofit',
                                      'class' => 'form-control',
                                      'rules' => 'trim|required',
                                      'placeholder' => 'Gross Profit',
                                      'required' => 'required'
                                   ),
                              array(
                                      'type' => 'text',
                                      'name' => 'profityear',
                                      'class' => 'form-control',
                                      'rules' => 'trim|required',
                                      'placeholder' => 'Profit for the year',
                                      'required' => 'required'
                                   ),
                              array(
                                      'type' => 'text',
                                      'name' => 'profitowner',
                                      'class' => 'form-control',
                                      'rules' => 'trim|required',
                                      'placeholder' => 'Profit/(loss) after tax attributable to Owners of the Parent',
                                      'required' => 'required'
                                   ),
                              array(
                                      'type' => 'text',
                                      'name' => 'profitinterest',
                                      'class' => 'form-control',
                                      'rules' => 'trim|required',
                                      'placeholder' => 'Profit/(loss) after tax attributable to Non-controlling Interest',
                                      'required' => 'required'
                                   ),
                              array(
                                      'type' => 'text',
                                      'name' => 'earnings',
                                      'class' => 'form-control',
                                      'rules' => 'trim|required',
                                      'placeholder' => 'Earnings per share (in Rupiah)',
                                      'required' => 'required'
                                   ),
                              array(
                                      'type' => 'text',
                                      'name' => 'assets',
                                      'class' => 'form-control',
                                      'rules' => 'trim|required',
                                      'placeholder' => 'Total Assets',
                                      'required' => 'required'
                                   ),
                              array(
                                      'type' => 'text',
                                      'name' => 'liabilities',
                                      'class' => 'form-control',
                                      'rules' => 'trim|required',
                                      'placeholder' => 'Total Liabilities',
                                      'required' => 'required'
                                   ),
                              array(
                                      'type' => 'text',
                                      'name' => 'equity',
                                      'class' => 'form-control',
                                      'rules' => 'trim|required',
                                      'placeholder' => 'Total Equity',
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
  