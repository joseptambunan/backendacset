<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Access</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Home > Access
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
              <div class="panel-group" id="accordion">
              <?php 
            foreach ($access_list as $key) 
            {
             
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
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapse<?= $key->id ?>"><h4 class="box-title"><?= strip_tags($key->username) ?></h4></a>
                    </h4>
                </div>
                <div id="collapse<?= $key->id ?>" class="panel-collapse collapse">
                    <div class="panel-body">
                        <form action="<?php echo base_url().'admin/updateaccess';?>" method="post" name="form1">
                          <div class="cat-editmulti-wrapper">
                            <input type="hidden" name="userid" value="<?php echo $key->id;?>"/>
                            <input type="hidden" name="privilege" value="<?php echo $key->privilege;?>"/>
                            <input type="text" name="password" value="" placeholder="type to change password" />
                            <input type="hidden" name="privilege_<?php echo $key->id;?>" id="privilege_<?php echo $key->id;?>" value="<?php echo $key->privilege;?>"/>
                            <?php 
                              $code_privilege = "HM,AB,EX,PR,GR,IN,CS,MD,CR,ST";
                              $array_code = array(
                                "HM" => array("label" => "Home"),
                                "AB" => array("label" => "About Us"),
                                "EX" => array("label" => "Expertise"),
                                "PR" => array("label" => "Projects"),
                                "GR" => array("label" => "Governance"),
                                "IN" => array("label" => "Investor"),
                                "CS" => array("label" => "CSR"),
                                "MD" => array("label" => "Media"),
                                "CR" => array("label" => "Carreer"),
                                "ST" => array("label" => "Setting")
                              );

                              $privilege = explode(",", $code_privilege);
                              $set_privilege_gifted = $key->privilege;
       
                              for ( $i = 0; $i<10; $i++ ){  
                                $checked = strpos($set_privilege_gifted,$privilege[$i]);
                                
                                if (strlen($checked) == 0 ){
                                  $value_checked = '';
                                }else{
                                  $value_checked = 'checked';
                                }
                               
                            ?>
                              <input type="checkbox" name="privilege_<?php echo $privilege[$i].'_'.$key->id; ?>" id="privilege_<?php echo $privilege[$i].'_'.$key->id; ?>" <?php echo $value_checked;?> onclick="setPrivilege('<?php echo $privilege[$i]; ?>','<?php echo $key->id;?>')"/><?php echo $array_code[$privilege[$i]]['label'];?><br/>
                            <?php } ?>
                            <div class="warning"> </div>
                            <button type="submit">Submit</button>             
                          </div>
                        </form>
                    </div>
                </div>

            </div>
        
                        

          <?php
            }
          ?>
         
          </div>          
              <form action="<?php echo base_url();?>/admin/add_access" class="cat-form-open" enctype="multipart/form-data" method="post" accept-charset="utf-8">
                      <div class="form-group">
                       <h4>Add User</h4>
                        <div class="form-group">
                          Username
                          <input type="text" name="username" value="" class="form-control" required placeholder="Insert Username" >
                        </div>
                        <div class="form-group">
                          Password
                          <input type="password" name="passwords" value="" class="form-control" required placeholder="Insert Password" >
                          <input type="hidden" name="privilege_new" id="privilege_new" value="" class="form-control" required>
                        </div>
                        <div class="form-group">
                          Privilege<br/>
                           <?php 
                              $code_privilege = "HM,AB,EX,PR,GR,IN,CS,MD,CR,ST";
                              $array_code = array(
                                "HM" => array("label" => "Home"),
                                "AB" => array("label" => "About Us"),
                                "EX" => array("label" => "Expertise"),
                                "PR" => array("label" => "Projects"),
                                "GR" => array("label" => "Governance"),
                                "IN" => array("label" => "Investor"),
                                "CS" => array("label" => "CSR"),
                                "MD" => array("label" => "Media"),
                                "CR" => array("label" => "Carreer"),
                                "ST" => array("label" => "Setting")
                              );

                              $privilege = explode(",", $code_privilege);
                 
                              for ( $i = 0; $i<10; $i++ ){  
                               
                            ?>
                              <input type="checkbox" name="privilege_<?php echo $privilege[$i].'_new'; ?>" id="privilege_<?php echo $privilege[$i].'_new'; ?>" onclick="setPrivilegeNew('<?php echo $privilege[$i]; ?>','new')"/><?php echo $array_code[$privilege[$i]]['label'];?><br/>
                            <?php } ?>
                        </div>
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
<script type="text/javascript">
  function setPrivilege(privilege,userid){
    var value_privilege = $("#privilege_" + userid).val();
    var add_privilege = "";
    if ( $("#privilege_"+ privilege + "_" + userid).is(":checked")){
      add_privilege = value_privilege + "," + privilege;
      $("#privilege_" + userid).val(add_privilege);  
      console.log("checked");    
    }else{
      var rem_privilege = value_privilege.replace( "," + privilege, "");
      $("#privilege_" + userid).val(rem_privilege);
      console.log("not checked");
    }
  }

  function setPrivilegeNew(privilege,userid){
    var value_privilege = $("#privilege_" + userid).val();
    var add_privilege = "";
    if ( $("#privilege_"+ privilege + "_" + userid).is(":checked")){
      add_privilege =  privilege + "," + value_privilege;
      $("#privilege_" + userid).val(add_privilege);  
      console.log("checked");    
    }else{
      var rem_privilege = value_privilege.replace( privilege + ",", "");
      $("#privilege_" + userid).val(rem_privilege);
      console.log("not checked");
    }
  }
</script>
  