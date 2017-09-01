<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends Catalyst_Admin_Panel
{
    public function index()
    {
        $catalyst['header'] = null;
        $catalyst['label'] = $this->_admin;
        $catalyst['themes'] = "admin_login";
        $catalyst['processor'] = null;
        $catalyst['footer'] = null;

        // render the settings
        $this->catalyst->render($catalyst);
    }

    public function login_processor()
    {
    	$this->admin->catalyst_admin_login_process();
    }

    public function dashboard()
    {
        // check if users has login
        $this->cat_login->is_login();

        $catalyst['header'] = 'admin-main-header';
        $catalyst['label'] = $this->_admin;
        $catalyst['themes'] = "dashboard";
        $catalyst['processor'] = null;
        $catalyst['footer'] = null;        

        // to enable SB Admin 2 table and graphic
        $catalyst = $this->catalyst->enables('morris,flot,table',$catalyst);

        $data = $this->admin->catalyst_admin_dashboard();
        $this->catalyst->render($catalyst,$data);
    }

    public function sliding_banner()
    {
        $this->cat_login->is_login();

        $catalyst['header'] = 'admin-main-header';
        $catalyst['label'] = $this->_admin;
        $catalyst['themes'] = "sliding_banner";
        $catalyst['processor'] = null;
        $catalyst['footer'] = null; 

        $catalyst = $this->catalyst->enables('morris,flot,table',$catalyst);

        $data['raw_slider'] = $this->cat_model->getall('home_header');

        $this->catalyst->render($catalyst, $data);

    }

    public function delete_sliding_banner($id){
      $this->db->query("delete from home_header where id ='$id'");
      echo '<script>window.location.href = "'.base_url('admin/sliding_banner').'"</script>';
    }

    public function add_sliding(){
      $url = $this->uri->uri_string();
        $url = explode('/',$url);

        $id = $url[count($url)-1];

        $click = $this->input->post('btn-edpre');

        $config = array(
                    'admin/sliding_banner' => 
                    array(
                      array(
                              'type' => 'textarea',
                              'name' => 'descriptor',
                              'class' => 'form-control',
                              'value' => set_value('descriptor'),
                              'rules' => 'trim|required'
                           ),
                      array(
                              'type' => 'file',
                              'name' => 'userfile',
                              'path' => '/assets/image/headerslider/',
                              'allowed' => 'jpg|jpeg|png',
                              'size' => '0',
                              'width' => '4000',
                              'height' => '4000'

                           )                      
                    )
                );
     

        $detail = $this->cat_form->validator($config,false,true);

        if ( $this->input->post("descriptor") == "" ){
            echo "<script>alert('Please fill title banner');</script>";
            echo '<script>window.location.href = "'.base_url('admin/sliding_banner').'"</script>';     
        }else{
            if ( $detail['userfile'] == "" ){
               // echo "<script>alert('Please select image to upload');</script>";
                //echo '<script>window.location.href = "'.base_url('admin/sliding_banner').'"</script>'; 
                 $config = array(
                    'admin/sliding_banner' => 
                    array(
                      array(
                              'type' => 'textarea',
                              'name' => 'descriptor',
                              'class' => 'form-control',
                              'value' => set_value('descriptor'),
                              'rules' => 'trim|required'
                           )
                    ));
                $detail = $this->cat_form->validator($config,false,true);
                $this->cat_model->insert('home_header',$detail);

                echo '<script>window.location.href = "'.base_url('admin/sliding_banner').'"</script>'; 
            }else{
              //$var = array( 'table' => 'home_header', 'condition' => 'id = '.$id.'');      
              $this->cat_model->insert('home_header',$detail);
            }
            echo '<script>window.location.href = "'.base_url('admin/sliding_banner').'"</script>';     
        }         
       
    }

    public function edit_sliding()
    {
        $url = $this->uri->uri_string();
        $url = explode('/',$url);

        $id = $url[count($url)-1];

        $click = $this->input->post('btn-edpre');

        $config = array(
                    'admin/sliding_banner' => 
                    array(
                      array(
                              'type' => 'textarea',
                              'name' => 'descriptor',
                              'class' => 'form-control',
                              'value' => set_value('descriptor'),
                              'rules' => 'trim|required'
                           ),
                      array(
                              'type' => 'file',
                              'name' => 'userfile',
                              'path' => '/assets/image/headerslider/',
                              'allowed' => 'jpg|jpeg|png',
                              'size' => '0',
                              'width' => '4000',
                              'height' => '4000'

                           )                      
                    )
                );
     

        $detail = $this->cat_form->validator($config,false,true);

        if ( $this->input->post("descriptor") == "" ){
            echo "<script>alert('Please fill title banner');</script>";
            echo '<script>window.location.href = "'.base_url('admin/sliding_banner').'"</script>';     
        }else{
            if ( $detail['userfile'] == "" ){
               // echo "<script>alert('Please select image to upload');</script>";
                //echo '<script>window.location.href = "'.base_url('admin/sliding_banner').'"</script>'; 
                 $config = array(
                    'admin/sliding_banner' => 
                    array(
                      array(
                              'type' => 'textarea',
                              'name' => 'descriptor',
                              'class' => 'form-control',
                              'value' => set_value('descriptor'),
                              'rules' => 'trim|required'
                           )
                    ));
                $detail = $this->cat_form->validator($config,false,true);
                $var = array( 'table' => 'home_header', 'condition' => 'id = '.$id.'');      
                $this->cat_model->update($var,$detail);

                echo '<script>window.location.href = "'.base_url('admin/sliding_banner').'"</script>'; 
            }else{
              $var = array( 'table' => 'home_header', 'condition' => 'id = '.$id.'');      
              $this->cat_model->update($var,$detail);
            }
            echo '<script>window.location.href = "'.base_url('admin/sliding_banner').'"</script>';     
        }         
       
    }

    public function still_banner()
    {
        $this->cat_login->is_login();

        $catalyst['header'] = 'admin-main-header';
        $catalyst['label'] = $this->_admin;
        $catalyst['themes'] = "still_banner";
        $catalyst['processor'] = null;
        $catalyst['footer'] = null; 

        $catalyst = $this->catalyst->enables('morris,flot,table',$catalyst);

        $data['raw_banner'] = $this->cat_model->getall('home_banner');

        $this->catalyst->render($catalyst, $data);

    }

     public function edit_banner()
    {
        $url = $this->uri->uri_string();
        $url = explode('/',$url);

        $id = $url[count($url)-1];

        $click = $this->input->post('btn-edpre');

        $config = array(
                    'admin/still_banner' => 
                    array(
                      array(
                              'type' => 'file',
                              'name' => 'userfile',
                              'path' => '/assets/image/logo_header/',
                              'allowed' => 'jpg|jpeg|png',
                              'size' => '0',
                              'width' => '4000',
                              'height' => '4000'

                           )                      
                    )
                );

        $detail = $this->cat_form->validator($config,false,true);
        if ( $detail['userfile'] == "" ){
          echo "<script>alert('Please select image to upload');</script>";
          echo '<script>window.location.href = "'.base_url('admin/still_banner').'"</script>'; 
        }else{
            $var = array('table' => 'home_banner', 
                         'condition' => 'id = '.$id.''
                        );
            // var_dump($var);
            $this->cat_model->update($var,$detail);
            echo '<script>window.location.href = "'.base_url('admin/still_banner').'"</script>';
        }
       
       
    }

    public function mengapa_acset()
    {
        $this->cat_login->is_login();

        $catalyst['header'] = 'admin-main-header';
        $catalyst['label'] = $this->_admin;
        $catalyst['themes'] = "mengapa_acset";
        $catalyst['processor'] = null;
        $catalyst['footer'] = null; 

        $catalyst = $this->catalyst->enables('morris,flot,table',$catalyst);

        $data['raw_mengapa'] = $this->cat_model->getall('home_why_acset_id');

        $this->catalyst->render($catalyst, $data);

    }

    public function delete_mengapa_acset($id){
      $this->db->query("delete from home_why_acset_id where id ='$id'");
       echo '<script>window.location.href = "'.base_url('admin/mengapa_acset').'"</script>'; 
    }

    public function add_mengapa_acset(){      
        $url = $this->uri->uri_string();
        $url = explode('/',$url);

        $id = $url[count($url)-1];

        $click = $this->input->post('btn-edpre');

        $config = array(
                    'admin/mengapa_acset' => 
                    array(
                      array(
                              'type' => 'textarea',
                              'name' => 'descriptor',
                              'class' => 'form-control',
                              'value' => set_value('descriptor'),
                              'rules' => 'trim|required'
                           ),
                      array(
                              'type' => 'file',
                              'name' => 'userfile',
                              'path' => '/assets/image/why_acset/',
                              'allowed' => 'jpg|jpeg|png',
                              'size' => '0',
                              'width' => '4000',
                              'height' => '4000'

                           )                      
                    )
                );

        $detail = $this->cat_form->validator($config,false,true);
        if ( $this->input->post("descriptor") == "" ){
            echo "<script>alert('Please fill title');</script>";
          echo '<script>window.location.href = "'.base_url('admin/mengapa_acset').'"</script>';   
        }else{
            if ( $detail['userfile'] == "" ){
                //echo "<script>alert('Please select image to upload');</script>";
                echo '<script>window.location.href = "'.base_url('admin/mengapa_acset').'"</script>';  
                $var = array('table' => 'home_why_acset_id', 'condition' => 'id = '.$id.'' );
                $config = array(
                    'admin/mengapa_acset' => 
                    array(
                      array(
                              'type' => 'textarea',
                              'name' => 'descriptor',
                              'class' => 'form-control',
                              'value' => set_value('descriptor'),
                              'rules' => 'trim|required'
                           )));
              
                $detail = $this->cat_form->validator($config,false,true);
                $this->cat_model->insert("home_why_acset_id",$detail);
                echo '<script>window.location.href = "'.base_url('admin/mengapa_acset').'"</script>'; 
            }else{
            
            // var_dump($var);
             $this->cat_model->insert("home_why_acset_id",$detail);
            }
           echo '<script>window.location.href = "'.base_url('admin/mengapa_acset').'"</script>'; 
        }     
        
    }

    public function edit_mengapa_acset()
    {
        $url = $this->uri->uri_string();
        $url = explode('/',$url);

        $id = $url[count($url)-1];

        $click = $this->input->post('btn-edpre');

        $config = array(
                    'admin/mengapa_acset' => 
                    array(
                      array(
                              'type' => 'textarea',
                              'name' => 'descriptor',
                              'class' => 'form-control',
                              'value' => set_value('descriptor'),
                              'rules' => 'trim|required'
                           ),
                      array(
                              'type' => 'file',
                              'name' => 'userfile',
                              'path' => '/assets/image/why_acset/',
                              'allowed' => 'jpg|jpeg|png',
                              'size' => '0',
                              'width' => '4000',
                              'height' => '4000'

                           )                      
                    )
                );

        $detail = $this->cat_form->validator($config,false,true);
        if ( $this->input->post("descriptor") == "" ){
            echo "<script>alert('Please fill title');</script>";
          echo '<script>window.location.href = "'.base_url('admin/mengapa_acset').'"</script>';   
        }else{
            if ( $detail['userfile'] == "" ){
                //echo "<script>alert('Please select image to upload');</script>";
                echo '<script>window.location.href = "'.base_url('admin/mengapa_acset').'"</script>';  
                $var = array('table' => 'home_why_acset_id', 'condition' => 'id = '.$id.'' );
                $config = array(
                    'admin/mengapa_acset' => 
                    array(
                      array(
                              'type' => 'textarea',
                              'name' => 'descriptor',
                              'class' => 'form-control',
                              'value' => set_value('descriptor'),
                              'rules' => 'trim|required'
                           )));
                $var = array('table' => 'home_why_acset_id', 
                       'condition' => 'id = '.$id.''
                      );
                $detail = $this->cat_form->validator($config,false,true);
                $this->cat_model->update($var,$detail);
                echo '<script>window.location.href = "'.base_url('admin/mengapa_acset').'"</script>'; 
            }else{
              $var = array('table' => 'home_why_acset_id', 
                         'condition' => 'id = '.$id.''
                        );
            // var_dump($var);
             $this->cat_model->update($var,$detail);
            }
           echo '<script>window.location.href = "'.base_url('admin/mengapa_acset').'"</script>'; 
        }     
        
       
    }

    public function why_acset()
    {
        $this->cat_login->is_login();

        $catalyst['header'] = 'admin-main-header';
        $catalyst['label'] = $this->_admin;
        $catalyst['themes'] = "why_acset";
        $catalyst['processor'] = null;
        $catalyst['footer'] = null; 

        $catalyst = $this->catalyst->enables('morris,flot,table',$catalyst);

        $data['raw_why'] = $this->cat_model->getall('home_why_acset');

        $this->catalyst->render($catalyst, $data);

    }

    public function delete_why_acset($id){
      $this->db->query("delete from home_why_acset where id ='$id'");
      echo '<script>window.location.href = "'.base_url('admin/why_acset').'"</script>';
    }

    public function add_why_acset(){
      $url = $this->uri->uri_string();
        $url = explode('/',$url);

        $id = $url[count($url)-1];

        $click = $this->input->post('btn-edpre');

        $config = array(
                    'admin/why_acset' => 
                    array(
                      array(
                              'type' => 'textarea',
                              'name' => 'descriptor',
                              'class' => 'form-control',
                              'value' => set_value('descriptor'),
                              'rules' => 'trim|required'
                           ),
                      array(
                              'type' => 'file',
                              'name' => 'userfile',
                              'path' => '/assets/image/why_acset/',
                              'allowed' => 'jpg|jpeg|png',
                              'size' => '0',
                              'width' => '4000',
                              'height' => '4000'

                           )                      
                    )
                );

        $detail = $this->cat_form->validator($config,false,true);

         if ( $this->input->post("descriptor") == "" ){
            echo "<script>alert('Please fill title');</script>";
            echo '<script>window.location.href = "'.base_url('admin/why_acset').'"</script>';
        }else{
            if ( $detail['userfile'] == "" ){
                //echo "<script>alert('Please select image to upload');</script>";
                //echo '<script>window.location.href = "'.base_url('admin/why_acset').'"</script>'; 
                $config = array(
                    'admin/why_acset' => 
                    array(
                      array(
                              'type' => 'textarea',
                              'name' => 'descriptor',
                              'class' => 'form-control',
                              'value' => set_value('descriptor'),
                              'rules' => 'trim|required'
                           ))); 
              /*  $var = array('table' => 'home_why_acset_id', 
                       'condition' => 'id = '.$id.''
                      );*/
                $detail = $this->cat_form->validator($config,false,true);
                $this->cat_model->insert("home_why_acset",$detail);
                 echo '<script>window.location.href = "'.base_url('admin/why_acset').'"</script>';
            }else{
/*               $var = array('table' => 'home_why_acset', 
                         'condition' => 'id = '.$id.''
                        );*/
            // var_dump($var);
            $this->cat_model->insert("home_why_acset",$detail);
            }
            echo '<script>window.location.href = "'.base_url('admin/why_acset').'"</script>';
        }    

       
           
       
    }

    public function edit_why_acset()
    {
        $url = $this->uri->uri_string();
        $url = explode('/',$url);

        $id = $url[count($url)-1];

        $click = $this->input->post('btn-edpre');

        $config = array(
                    'admin/why_acset' => 
                    array(
                      array(
                              'type' => 'textarea',
                              'name' => 'descriptor',
                              'class' => 'form-control',
                              'value' => set_value('descriptor'),
                              'rules' => 'trim|required'
                           ),
                      array(
                              'type' => 'file',
                              'name' => 'userfile',
                              'path' => '/assets/image/why_acset/',
                              'allowed' => 'jpg|jpeg|png',
                              'size' => '0',
                              'width' => '4000',
                              'height' => '4000'

                           )                      
                    )
                );

        $detail = $this->cat_form->validator($config,false,true);

         if ( $this->input->post("descriptor") == "" ){
            echo "<script>alert('Please fill title');</script>";
            echo '<script>window.location.href = "'.base_url('admin/why_acset').'"</script>';
        }else{
            if ( $detail['userfile'] == "" ){
                //echo "<script>alert('Please select image to upload');</script>";
                //echo '<script>window.location.href = "'.base_url('admin/why_acset').'"</script>'; 
                $config = array(
                    'admin/why_acset' => 
                    array(
                      array(
                              'type' => 'textarea',
                              'name' => 'descriptor',
                              'class' => 'form-control',
                              'value' => set_value('descriptor'),
                              'rules' => 'trim|required'
                           ))); 
                $var = array('table' => 'home_why_acset_id', 
                       'condition' => 'id = '.$id.''
                      );
                $detail = $this->cat_form->validator($config,false,true);
                $this->cat_model->update($var,$detail);
                 echo '<script>window.location.href = "'.base_url('admin/why_acset').'"</script>';
            }else{
               $var = array('table' => 'home_why_acset', 
                         'condition' => 'id = '.$id.''
                        );
            // var_dump($var);
            $this->cat_model->update($var,$detail);
            }
            echo '<script>window.location.href = "'.base_url('admin/why_acset').'"</script>';
        }    

       
           
       
    }

    public function proyek()
    {
        $this->cat_login->is_login();

        $catalyst['header'] = 'admin-main-header';
        $catalyst['label'] = $this->_admin;
        $catalyst['themes'] = "proyek";
        $catalyst['processor'] = null;
        $catalyst['footer'] = null; 

        $catalyst = $this->catalyst->enables('morris,flot,table',$catalyst);

        $data['raw_proyek'] = $this->cat_model->getall('home_projects_id');

        $this->catalyst->render($catalyst, $data);

    }

    public function delete_proyek($id){
      $this->db->query("delete from home_projects_id where id ='$id'");
      echo '<script>window.location.href = "'.base_url('admin/proyek').'"</script>';
    }

    public function add_proyek(){
      $url = $this->uri->uri_string();
        $url = explode('/',$url);

        $id = $url[count($url)-1];

        $click = $this->input->post('btn-edpre');

        $config = array(
                    'admin/projects' => 
                    array(
                      array(
                              'type' => 'text',
                              'name' => 'title',
                              'class' => 'form-control',
                              'value' => set_value('descriptor'),
                              'rules' => 'trim|required'
                           ),
                      array(
                              'type' => 'textarea',
                              'name' => 'descriptor',
                              'class' => 'form-control',
                              'value' => set_value('descriptor'),
                              'rules' => 'trim|required'
                           ),
                      array(
                              'type' => 'file',
                              'name' => 'userfile',
                              'path' => '/assets/image/projects/',
                              'allowed' => 'jpg|jpeg|png',
                              'size' => '0',
                              'width' => '4000',
                              'height' => '4000'

                           )                      
                    )
                );

        $detail = $this->cat_form->validator($config,false,true);
        if ( $this->input->post("descriptor") == "" ){
          echo "<script>alert('Please fill title');</script>";
          echo '<script>window.location.href = "'.base_url('admin/projects').'"</script>';
        }else{
            if ( $detail['userfile'] == "" ){
                 $config = array(
                    'admin/proyek' => 
                    array(
                      array(
                              'type' => 'textarea',
                              'name' => 'descriptor',
                              'class' => 'form-control',
                              'value' => set_value('descriptor'),
                              'rules' => 'trim|required'
                           ),
                       array(
                              'type' => 'text',
                              'name' => 'title',
                              'class' => 'form-control',
                              'value' => set_value('descriptor'),
                              'rules' => 'trim|required'
                           )
                      ));

                $this->cat_model->insert("home_projects_id",$detail);

            }else{
              $this->cat_model->insert("home_projects_id",$detail);
            }
          echo '<script>window.location.href = "'.base_url('admin/proyek').'"</script>';
        }  
     // var_dump($var);
             
    }


     public function edit_proyek()
    {
        $url = $this->uri->uri_string();
        $url = explode('/',$url);

        $id = $url[count($url)-1];

        $click = $this->input->post('btn-edpre');

        $config = array(
                    'admin/proyek' => 
                    array(
                      array(
                              'type' => 'textarea',
                              'name' => 'descriptor',
                              'class' => 'form-control',
                              'value' => set_value('descriptor'),
                              'rules' => 'trim|required'
                           ),
                      array(
                              'type' => 'file',
                              'name' => 'userfile',
                              'path' => '/assets/image/projects/',
                              'allowed' => 'jpg|jpeg|png',
                              'size' => '0',
                              'width' => '4000',
                              'height' => '4000'

                           )                      
                    )
                );

        $detail = $this->cat_form->validator($config,false,true);
        if ( $this->input->post("descriptor") == "" ){
          echo "<script>alert('Please fill title');</script>";
          echo '<script>window.location.href = "'.base_url('admin/proyek').'"</script>'; 
        }else{
            if ( $detail['userfile'] == "" ){
                //echo "<script>alert('Please select image to upload');</script>";
                //echo '<script>window.location.href = "'.base_url('admin/proyek').'"</script>';  
                $config = array(
                    'admin/proyek' => 
                    array(
                      array(
                              'type' => 'textarea',
                              'name' => 'descriptor',
                              'class' => 'form-control',
                              'value' => set_value('descriptor'),
                              'rules' => 'trim|required'
                           )));
                $var = array('table' => 'home_projects_id', 'condition' => 'id = '.$id.'' );
                $this->cat_model->update($var,$detail);

            }else{
              $var = array('table' => 'home_projects_id', 'condition' => 'id = '.$id.'' );
              $this->cat_model->update($var,$detail);
            }
          echo '<script>window.location.href = "'.base_url('admin/proyek').'"</script>';
        }  

       
            // var_dump($var);
           
            
       
    }

    public function projects()
    {
        $this->cat_login->is_login();

        $catalyst['header'] = 'admin-main-header';
        $catalyst['label'] = $this->_admin;
        $catalyst['themes'] = "projects";
        $catalyst['processor'] = null;
        $catalyst['footer'] = null; 

        $catalyst = $this->catalyst->enables('morris,flot,table',$catalyst);

        $data['raw_projects'] = $this->cat_model->getall('home_projects');

        $this->catalyst->render($catalyst, $data);

    }

    public function delete_projects($id){
      $this->db->query("delete from home_projects where id ='$id'");
      echo '<script>window.location.href = "'.base_url('admin/projects').'"</script>';
    }

    public function add_projects(){
      $url = $this->uri->uri_string();
        $url = explode('/',$url);

        $id = $url[count($url)-1];

        $click = $this->input->post('btn-edpre');

        $config = array(
                    'admin/projects' => 
                    array(
                      array(
                              'type' => 'text',
                              'name' => 'title',
                              'class' => 'form-control',
                              'value' => set_value('descriptor'),
                              'rules' => 'trim|required'
                           ),
                      array(
                              'type' => 'textarea',
                              'name' => 'descriptor',
                              'class' => 'form-control',
                              'value' => set_value('descriptor'),
                              'rules' => 'trim|required'
                           ),
                      array(
                              'type' => 'file',
                              'name' => 'userfile',
                              'path' => '/assets/image/projects/',
                              'allowed' => 'jpg|jpeg|png',
                              'size' => '0',
                              'width' => '4000',
                              'height' => '4000'

                           )                      
                    )
                );

        $detail = $this->cat_form->validator($config,false,true);
        if ( $this->input->post("descriptor") == "" ){
          echo "<script>alert('Please fill title');</script>";
          echo '<script>window.location.href = "'.base_url('admin/projects').'"</script>';
        }else{
            if ( $detail['userfile'] == "" ){
                 $config = array(
                    'admin/proyek' => 
                    array(
                      array(
                              'type' => 'textarea',
                              'name' => 'descriptor',
                              'class' => 'form-control',
                              'value' => set_value('descriptor'),
                              'rules' => 'trim|required'
                           ),
                       array(
                              'type' => 'text',
                              'name' => 'title',
                              'class' => 'form-control',
                              'value' => set_value('descriptor'),
                              'rules' => 'trim|required'
                           )
                      ));

                $this->cat_model->insert("home_projects",$detail);

            }else{
              $this->cat_model->insert("home_projects",$detail);
            }
          echo '<script>window.location.href = "'.base_url('admin/projects').'"</script>';
        }  
       
            // var_dump($var);
           
             
    }

     public function edit_projects()
    {
        $url = $this->uri->uri_string();
        $url = explode('/',$url);

        $id = $url[count($url)-1];

        $click = $this->input->post('btn-edpre');

        $config = array(
                    'admin/projects' => 
                    array(
                      array(
                              'type' => 'textarea',
                              'name' => 'descriptor',
                              'class' => 'form-control',
                              'value' => set_value('descriptor'),
                              'rules' => 'trim|required'
                           ),
                      array(
                              'type' => 'file',
                              'name' => 'userfile',
                              'path' => '/assets/image/projects/',
                              'allowed' => 'jpg|jpeg|png',
                              'size' => '0',
                              'width' => '4000',
                              'height' => '4000'

                           )                      
                    )
                );

        $detail = $this->cat_form->validator($config,false,true);
        if ( $this->input->post("descriptor") == "" ){
          echo "<script>alert('Please fill title');</script>";
          echo '<script>window.location.href = "'.base_url('admin/projects').'"</script>';
        }else{
            if ( $detail['userfile'] == "" ){
                 $config = array(
                    'admin/proyek' => 
                    array(
                      array(
                              'type' => 'textarea',
                              'name' => 'descriptor',
                              'class' => 'form-control',
                              'value' => set_value('descriptor'),
                              'rules' => 'trim|required'
                           )));
                $var = array('table' => 'home_projects', 'condition' => 'id = '.$id.'' );
                $this->cat_model->update($var,$detail);

            }else{
              $var = array('table' => 'home_projects','condition' => 'id = '.$id.''  );
              $this->cat_model->update($var,$detail);
            }
          echo '<script>window.location.href = "'.base_url('admin/projects').'"</script>';
        }  
       
            // var_dump($var);
           
            
       
    }

    public function our_clients()
    {
        $this->cat_login->is_login();

        $catalyst['header'] = 'admin-main-header';
        $catalyst['label'] = $this->_admin;
        $catalyst['themes'] = "our_clients";
        $catalyst['processor'] = null;
        $catalyst['footer'] = null; 

        $catalyst = $this->catalyst->enables('morris,flot,table',$catalyst);

        $data['raw_clients'] = $this->cat_model->getall('home_ourclients');

        $this->catalyst->render($catalyst, $data);

    }

    public function add_clients(){
        $url = $this->uri->uri_string();
        $url = explode('/',$url);

        $id = $url[count($url)-1];

        $click = $this->input->post('btn-edpre');

        $config = array(
                    'admin/our_clients' => 
                    array(
                      array(
                              'type' => 'text',
                              'name' => 'title',
                              'class' => 'form-control',
                              'value' => set_value('title'),
                              'rules' => 'trim|required'
                           ),
                      array(
                              'type' => 'file',
                              'name' => 'userfile',
                              'path' => '/assets/image/clients/',
                              'allowed' => 'jpg|jpeg|png',
                              'size' => '0',
                              'width' => '4000',
                              'height' => '4000'

                           )                      
                    )
                );

        $detail = $this->cat_form->validator($config,false,true);
        if ( $detail['userfile'] == "" ){
          echo "<script>alert('Please select image to upload');</script>";
          echo '<script>window.location.href = "'.base_url('admin/our_clients').'"</script>';
        }else{
            $this->cat_model->insert("home_ourclients",$detail);
            echo '<script>window.location.href = "'.base_url('admin/our_clients').'"</script>';
        }
    }

    public function delete_client($id){
      $this->db->query("delete from home_ourclients where id ='$id'");
      echo '<script>window.location.href = "'.base_url('admin/our_clients').'"</script>';
    }

    public function edit_clients()
    {
        $url = $this->uri->uri_string();
        $url = explode('/',$url);

        $id = $url[count($url)-1];

        $click = $this->input->post('btn-edpre');

        $config = array(
                    'admin/our_clients' => 
                    array(
                      array(
                              'type' => 'text',
                              'name' => 'title',
                              'class' => 'form-control',
                              'value' => set_value('title'),
                              'rules' => 'trim|required'
                           ),
                      array(
                              'type' => 'file',
                              'name' => 'userfile',
                              'path' => '/assets/image/clients/',
                              'allowed' => 'jpg|jpeg|png',
                              'size' => '0',
                              'width' => '4000',
                              'height' => '4000'

                           )                      
                    )
                );

        $detail = $this->cat_form->validator($config,false,true);
        if ( $detail['userfile'] == "" ){
          echo "<script>alert('Please select image to upload');</script>";
          echo '<script>window.location.href = "'.base_url('admin/our_clients').'"</script>';
        }else{
        $var = array('table' => 'home_ourclients', 
                         'condition' => 'id = '.$id.''
                        );
            // var_dump($var);
            $this->cat_model->update($var,$detail);
            echo '<script>window.location.href = "'.base_url('admin/our_clients').'"</script>';
        }
       
    }

//ABOUT US ABOUT US ABOUT US ABOUT US ABOUT US
//ABOUT US ABOUT US ABOUT US ABOUT US ABOUT US
//ABOUT US ABOUT US ABOUT US ABOUT US ABOUT US

    public function sambutan()
    {
        $this->cat_login->is_login();

        $catalyst['header'] = 'admin-main-header';
        $catalyst['label'] = $this->_admin;
        $catalyst['themes'] = "sambutan";
        $catalyst['processor'] = null;
        $catalyst['footer'] = null; 

        $catalyst = $this->catalyst->enables('morris,flot,table',$catalyst);

        $data['raw_sambutan'] = $this->cat_model->getall('aboutus_messageceo_id');

        $this->catalyst->render($catalyst, $data);

    }

     public function edit_sambutan()
    {
        $url = $this->uri->uri_string();
        $url = explode('/',$url);

        $id = $url[count($url)-1];

        $click = $this->input->post('btn-edpre');

        $config = array(
                    'admin/sambutan' => 
                    array(
                      array(
                              'type' => 'textarea',
                              'name' => 'descriptor',
                              'class' => 'form-control',
                              'value' => set_value('descriptor'),
                              'rules' => 'trim|required'
                           )
                      // ,
                      // array(
                      //         'type' => 'file',
                      //         'name' => 'userfile',
                      //         'path' => '/assets/image/about_us/',
                      //         'allowed' => 'jpg|jpeg|png',
                      //         'size' => '0',
                      //         'width' => '4000',
                      //         'height' => '4000'

                      //      )                      
                    )
                );

        $detail = $this->cat_form->validator($config,false,true);

        $var = array('table' => 'aboutus_messageceo_id', 
                         'condition' => 'id = '.$id.''
                        );
            // var_dump($var);
            $this->cat_model->update($var,$detail);
            echo '<script>window.location.href = "'.base_url('admin/sambutan').'"</script>';
       
    }

    public function greetings()
    {
        $this->cat_login->is_login();

        $catalyst['header'] = 'admin-main-header';
        $catalyst['label'] = $this->_admin;
        $catalyst['themes'] = "greetings";
        $catalyst['processor'] = null;
        $catalyst['footer'] = null; 

        $catalyst = $this->catalyst->enables('morris,flot,table',$catalyst);

        $data['raw_greetings'] = $this->cat_model->getall('aboutus_messageceo');

        $this->catalyst->render($catalyst, $data);

    }

     public function edit_greetings()
    {
        $url = $this->uri->uri_string();
        $url = explode('/',$url);

        $id = $url[count($url)-1];

        $click = $this->input->post('btn-edpre');

        $config = array(
                    'admin/greetings' => 
                    array(
                      array(
                              'type' => 'textarea',
                              'name' => 'descriptor',
                              'class' => 'form-control',
                              'value' => set_value('descriptor'),
                              'rules' => 'trim|required'
                           )
                      // ,
                      // array(
                      //         'type' => 'file',
                      //         'name' => 'userfile',
                      //         'path' => '/assets/image/about_us/',
                      //         'allowed' => 'jpg|jpeg|png',
                      //         'size' => '0',
                      //         'width' => '4000',
                      //         'height' => '4000'

                      //      )                      
                    )
                );

        $detail = $this->cat_form->validator($config,false,true);

        $var = array('table' => 'aboutus_messageceo', 
                         'condition' => 'id = '.$id.''
                        );
            // var_dump($var);
            $this->cat_model->update($var,$detail);
            echo '<script>window.location.href = "'.base_url('admin/greetings').'"</script>';
       
    }

    public function visimisi()
    {
        $this->cat_login->is_login();

        $catalyst['header'] = 'admin-main-header';
        $catalyst['label'] = $this->_admin;
        $catalyst['themes'] = "visimisi";
        $catalyst['processor'] = null;
        $catalyst['footer'] = null; 

        $catalyst = $this->catalyst->enables('morris,flot,table',$catalyst);

        $data['raw_visimisi'] = $this->cat_model->getall('aboutus_visionmission_id');

        $this->catalyst->render($catalyst, $data);

    }

     public function edit_visimisi()
    {
        $url = $this->uri->uri_string();
        $url = explode('/',$url);

        $id = $url[count($url)-1];

        $click = $this->input->post('btn-edpre');

        $config = array(
                    'admin/visimisi' => 
                    array(
                      array(
                              'type' => 'textarea',
                              'name' => 'vision_desc',
                              'class' => 'form-control',
                              'value' => set_value('vision_desc'),
                              'rules' => 'trim|required'
                           ),
                      array(
                              'type' => 'textarea',
                              'name' => 'mission_desc',
                              'class' => 'form-control',
                              'value' => set_value('mission_desc'),
                              'rules' => 'trim|required'
                           ),
                      array(
                              'type' => 'file',
                              'name' => 'userfile',
                              'path' => '/assets/image/about_us/',
                              'allowed' => 'jpg|jpeg|png',
                              'size' => '0',
                              'width' => '4000',
                              'height' => '4000'

                           )                      
                    )
                );

        $detail = $this->cat_form->validator($config,false,true);
        if ( $detail['vision_desc'] == "" || $detail['mission_desc'] == "" ){
          echo "<script>alert('Please fill description');</script>";
          echo '<script>window.location.href = "'.base_url('admin/visimisi').'"</script>';
        }else{
            if ( $detail['userfile'] == "" ){
              //echo "<script>alert('Please select image to upload');</script>";
              $config = array(
                    'admin/visimisi' => 
                    array(
                      array(
                              'type' => 'textarea',
                              'name' => 'vision_desc',
                              'class' => 'form-control',
                              'value' => set_value('vision_desc'),
                              'rules' => 'trim|required'
                           ),
                      array(
                              'type' => 'textarea',
                              'name' => 'mission_desc',
                              'class' => 'form-control',
                              'value' => set_value('mission_desc'),
                              'rules' => 'trim|required'
                           )));
              $var = array('table' => 'aboutus_visionmission_id', 
                         'condition' => 'id = '.$id.''
                        );
              $detail = $this->cat_form->validator($config,false,true);
              $this->cat_model->update($var,$detail);
              echo '<script>window.location.href = "'.base_url('admin/visimisi').'"</script>';
            }else{
              $var = array('table' => 'aboutus_visionmission_id', 
                         'condition' => 'id = '.$id.''
                        );
              // var_dump($var);
              $this->cat_model->update($var,$detail);
              echo '<script>window.location.href = "'.base_url('admin/visimisi').'"</script>';
            }
           
        }
       
       
    }

    public function visionmission()
    {
        $this->cat_login->is_login();

        $catalyst['header'] = 'admin-main-header';
        $catalyst['label'] = $this->_admin;
        $catalyst['themes'] = "visionmission";
        $catalyst['processor'] = null;
        $catalyst['footer'] = null; 

        $catalyst = $this->catalyst->enables('morris,flot,table',$catalyst);

        $data['raw_visionmission'] = $this->cat_model->getall('aboutus_visionmission');

        $this->catalyst->render($catalyst, $data);

    }

     public function edit_visionmission()
    {
        $url = $this->uri->uri_string();
        $url = explode('/',$url);

        $id = $url[count($url)-1];

        $click = $this->input->post('btn-edpre');

        $config = array(
                    'admin/visiomission' => 
                    array(
                      array(
                              'type' => 'textarea',
                              'name' => 'vision_desc',
                              'class' => 'form-control',
                              'value' => set_value('vision_desc'),
                              'rules' => 'trim|required'
                           ),
                      array(
                              'type' => 'textarea',
                              'name' => 'mission_desc',
                              'class' => 'form-control',
                              'value' => set_value('mission_desc'),
                              'rules' => 'trim|required'
                           ),
                      array(
                              'type' => 'file',
                              'name' => 'userfile',
                              'path' => '/assets/image/about_us/',
                              'allowed' => 'jpg|jpeg|png',
                              'size' => '0',
                              'width' => '4000',
                              'height' => '4000'

                           )                      
                    )
                );

        $detail = $this->cat_form->validator($config,false,true);

        if ( $detail['vision_desc'] == "" || $detail['mission_desc'] == "" ){
          echo "<script>alert('Please fill description');</script>";
          echo '<script>window.location.href = "'.base_url('admin/visionmission').'"</script>';
        }else{
            if ( $detail['userfile'] == "" ){
              //echo "<script>alert('Please select image to upload');</script>";
              $config = array(
                    'admin/visiomission' => 
                    array(
                      array(
                              'type' => 'textarea',
                              'name' => 'vision_desc',
                              'class' => 'form-control',
                              'value' => set_value('vision_desc'),
                              'rules' => 'trim|required'
                           ),
                      array(
                              'type' => 'textarea',
                              'name' => 'mission_desc',
                              'class' => 'form-control',
                              'value' => set_value('mission_desc'),
                              'rules' => 'trim|required'
                           )));
              $var = array('table' => 'aboutus_visionmission', 
                         'condition' => 'id = '.$id.''
                        );
              $detail = $this->cat_form->validator($config,false,true);
              $this->cat_model->update($var,$detail);
              
               echo '<script>window.location.href = "'.base_url('admin/visionmission').'"</script>';
            }else{
               $var = array('table' => 'aboutus_visionmission', 
                         'condition' => 'id = '.$id.''
                        );
            // var_dump($var);
            $this->cat_model->update($var,$detail);
            echo '<script>window.location.href = "'.base_url('admin/visionmission').'"</script>';
            }
           
        }

       
       
    }

    public function filosofi()
    {
        $this->cat_login->is_login();

        $catalyst['header'] = 'admin-main-header';
        $catalyst['label'] = $this->_admin;
        $catalyst['themes'] = "filosofi";
        $catalyst['processor'] = null;
        $catalyst['footer'] = null; 

        $catalyst = $this->catalyst->enables('morris,flot,table',$catalyst);

        $data['raw_filosofi'] = $this->cat_model->getall('aboutus_corporatephilosophy_id');

        $this->catalyst->render($catalyst, $data);

    }

     public function edit_filosofi()
    {
        $url = $this->uri->uri_string();
        $url = explode('/',$url);

        $id = $url[count($url)-1];

        $click = $this->input->post('btn-edpre');

        $config = array(
                    'admin/filosofi' => 
                    array(
                      array(
                              'type' => 'textarea',
                              'name' => 'descriptor',
                              'class' => 'form-control',
                              'value' => set_value('descriptor'),
                              'rules' => 'trim|required'
                           ),
                      array(
                              'type' => 'file',
                              'name' => 'userfile',
                              'path' => '/assets/image/about_us/',
                              'allowed' => 'jpg|jpeg|png',
                              'size' => '0',
                              'width' => '4000',
                              'height' => '4000'

                           )                      
                    )
                );

        $detail = $this->cat_form->validator($config,false,true);
        if ( $detail['descriptor'] == "" ){
          echo "<script>alert('Please fill description');</script>";
          echo '<script>window.location.href = "'.base_url('admin/filosofi').'"</script>';
        }else{
            if ( $detail['userfile'] == "" ){
              echo "<script>alert('Please select image to upload');</script>";
              echo '<script>window.location.href = "'.base_url('admin/filosofi').'"</script>';
            }else{
            $var = array('table' => 'aboutus_corporatephilosophy_id', 
                         'condition' => 'id = '.$id.''
                        );
            // var_dump($var);
            $this->cat_model->update($var,$detail);
            echo '<script>window.location.href = "'.base_url('admin/filosofi').'"</script>';
          }
        }
        
       
    }

    public function philosophy()
    {
        $this->cat_login->is_login();

        $catalyst['header'] = 'admin-main-header';
        $catalyst['label'] = $this->_admin;
        $catalyst['themes'] = "philosophy";
        $catalyst['processor'] = null;
        $catalyst['footer'] = null; 

        $catalyst = $this->catalyst->enables('morris,flot,table',$catalyst);

        $data['raw_philosophy'] = $this->cat_model->getall('aboutus_corporatephilosophy');

        $this->catalyst->render($catalyst, $data);

    }

     public function edit_philosophy()
    {
        $url = $this->uri->uri_string();
        $url = explode('/',$url);

        $id = $url[count($url)-1];

        $click = $this->input->post('btn-edpre');

        $config = array(
                    'admin/philosophy' => 
                    array(
                      array(
                              'type' => 'textarea',
                              'name' => 'descriptor',
                              'class' => 'form-control',
                              'value' => set_value('descriptor'),
                              'rules' => 'trim|required'
                           ),
                      array(
                              'type' => 'file',
                              'name' => 'userfile',
                              'path' => '/assets/image/about_us/',
                              'allowed' => 'jpg|jpeg|png',
                              'size' => '0',
                              'width' => '4000',
                              'height' => '4000'

                           )                      
                    )
                );

        $detail = $this->cat_form->validator($config,false,true);

        if ( $detail['descriptor'] == "" ){
          echo "<script>alert('Please fill description');</script>";
         echo '<script>window.location.href = "'.base_url('admin/philosophy').'"</script>';
        }else{
            if ( $detail['userfile'] == "" ){
              echo "<script>alert('Please select image to upload');</script>";
              echo '<script>window.location.href = "'.base_url('admin/philosophy').'"</script>';
            }else{
             $var = array('table' => 'aboutus_corporatephilosophy', 
                         'condition' => 'id = '.$id.''
                        );
            // var_dump($var);
            $this->cat_model->update($var,$detail);
            echo '<script>window.location.href = "'.base_url('admin/philosophy').'"</script>';
          }
        }

       
       
    }

    public function prinsip()
    {
        $this->cat_login->is_login();

        $catalyst['header'] = 'admin-main-header';
        $catalyst['label'] = $this->_admin;
        $catalyst['themes'] = "prinsip";
        $catalyst['processor'] = null;
        $catalyst['footer'] = null; 

        $catalyst = $this->catalyst->enables('morris,flot,table',$catalyst);

        $data['raw_prinsip'] = $this->cat_model->getall('aboutus_corporateprincipal_id');

        $this->catalyst->render($catalyst, $data);

    }

    public function edit_prinsip()
    {
        $url = $this->uri->uri_string();
        $url = explode('/',$url);

        $id = $url[count($url)-1];

        $click = $this->input->post('btn-edpre');

        $config = array(
                    'admin/prinsip' => 
                    array(
                      array(
                              'type' => 'text',
                              'name' => 'title',
                              'class' => 'form-control',
                              'value' => set_value('title'),
                              'rules' => 'trim|required'
                           ),
                      array(
                              'type' => 'textarea',
                              'name' => 'desc',
                              'class' => 'form-control',
                              'value' => set_value('desc'),
                              'rules' => 'trim|required'
                           ),
                      array(
                              'type' => 'file',
                              'name' => 'userfile',
                              'path' => '/assets/image/about_us/',
                              'allowed' => 'jpg|jpeg|png',
                              'size' => '0',
                              'width' => '4000',
                              'height' => '4000'

                           )                      
                    )
                );

        $detail = $this->cat_form->validator($config,false,true);

        if ( $detail['desc'] == "" || $detail['title'] == "" ){
          echo "<script>alert('Please fill description or title');</script>";
          echo '<script>window.location.href = "'.base_url('admin/prinsip').'"</script>';
        }else{

            if ( $detail['userfile'] == "" ){
              $config = array(
                    'admin/prinsip' => 
                    array(
                      array(
                              'type' => 'text',
                              'name' => 'title',
                              'class' => 'form-control',
                              'value' => set_value('title'),
                              'rules' => 'trim|required'
                           ),
                      array(
                              'type' => 'textarea',
                              'name' => 'desc',
                              'class' => 'form-control',
                              'value' => set_value('desc'),
                              'rules' => 'trim|required'
                           )));
              $var = array('table' => 'aboutus_corporateprincipal_id', 'condition' => 'id = '.$id.'' );
               $detail = $this->cat_form->validator($config,false,true);
              $this->cat_model->update($var,$detail);
            }else{
              $var = array('table' => 'aboutus_corporateprincipal_id', 
                         'condition' => 'id = '.$id.''
                        );
              // var_dump($var);
              $this->cat_model->update($var,$detail);
            }
            echo '<script>window.location.href = "'.base_url('admin/prinsip').'"</script>';
        }

       
       
    }

    public function add_prinsip()
    {
        $url = $this->uri->uri_string();
        $url = explode('/',$url);

        $id = $url[count($url)-1];

        $click = $this->input->post('btn-edpre');

        $config = array(
                    'admin/prinsip' => 
                    array(
                      array(
                              'type' => 'text',
                              'name' => 'title',
                              'class' => 'form-control',
                              'value' => set_value('title'),
                              'rules' => 'trim|required'
                           ),
                      array(
                              'type' => 'textarea',
                              'name' => 'desc',
                              'class' => 'form-control',
                              'value' => set_value('desc'),
                              'rules' => 'trim|required'
                           ),
                      array(
                              'type' => 'file',
                              'name' => 'userfile',
                              'path' => '/assets/image/about_us/',
                              'allowed' => 'jpg|jpeg|png',
                              'size' => '0',
                              'width' => '4000',
                              'height' => '4000'

                           )                      
                    )
                );

        $detail = $this->cat_form->validator($config,false,true);

        if ( $detail['desc'] == "" || $detail['title'] == "" ){
          echo "<script>alert('Please fill description or title');</script>";
          echo '<script>window.location.href = "'.base_url('admin/prinsip').'"</script>';
        }else{

            if ( $detail['userfile'] == "" ){
              $config = array(
                    'admin/prinsip' => 
                    array(
                      array(
                              'type' => 'text',
                              'name' => 'title',
                              'class' => 'form-control',
                              'value' => set_value('title'),
                              'rules' => 'trim|required'
                           ),
                      array(
                              'type' => 'textarea',
                              'name' => 'desc',
                              'class' => 'form-control',
                              'value' => set_value('desc'),
                              'rules' => 'trim|required'
                           )));
              
               $detail = $this->cat_form->validator($config,false,true);
              $this->cat_model->insert("aboutus_corporateprincipal_id",$detail);
            }else{
             
              // var_dump($var);
              $this->cat_model->insert("aboutus_corporateprincipal_id",$detail);
            }
            echo '<script>window.location.href = "'.base_url('admin/prinsip').'"</script>';
        }      
       
    }

    public function delete_prinsip($id){
      $this->db->query("delete from aboutus_corporateprincipal_id where id ='$id'");
      echo '<script>window.location.href = "'.base_url('admin/prinsip').'"</script>';
    }

    public function principal()
    {
        $this->cat_login->is_login();

        $catalyst['header'] = 'admin-main-header';
        $catalyst['label'] = $this->_admin;
        $catalyst['themes'] = "principal";
        $catalyst['processor'] = null;
        $catalyst['footer'] = null; 

        $catalyst = $this->catalyst->enables('morris,flot,table',$catalyst);

        $data['raw_principal'] = $this->cat_model->getall('aboutus_corporateprincipal');

        $this->catalyst->render($catalyst, $data);

    }

    public function delete_principal($id){
      $this->db->query("delete from aboutus_corporateprincipal where id ='$id'");
      echo '<script>window.location.href = "'.base_url('admin/principal').'"</script>';
    }

    public function edit_principal()
    {
        $url = $this->uri->uri_string();
        $url = explode('/',$url);

        $id = $url[count($url)-1];

        $click = $this->input->post('btn-edpre');

        $config = array(
                    'admin/principal' => 
                    array(
                      array(
                              'type' => 'text',
                              'name' => 'title',
                              'class' => 'form-control',
                              'value' => set_value('title'),
                              'rules' => 'trim|required'
                           ),
                      array(
                              'type' => 'textarea',
                              'name' => 'desc',
                              'class' => 'form-control',
                              'value' => set_value('desc'),
                              'rules' => 'trim|required'
                           ),
                      array(
                              'type' => 'file',
                              'name' => 'userfile',
                              'path' => '/assets/image/about_us/',
                              'allowed' => 'jpg|jpeg|png',
                              'size' => '0',
                              'width' => '4000',
                              'height' => '4000'

                           )                      
                    )
                );

        $detail = $this->cat_form->validator($config,false,true);

        if ( $detail['desc'] == "" || $detail['title'] == "" ){
          echo "<script>alert('Please fill description or title');</script>";
          echo '<script>window.location.href = "'.base_url('admin/principal').'"</script>';
        }else{

            if ( $detail['userfile'] == "" ){
              $config = array(
                    'admin/principal' => 
                    array(
                      array(
                              'type' => 'text',
                              'name' => 'title',
                              'class' => 'form-control',
                              'value' => set_value('title'),
                              'rules' => 'trim|required'
                           ),
                      array(
                              'type' => 'textarea',
                              'name' => 'desc',
                              'class' => 'form-control',
                              'value' => set_value('desc'),
                              'rules' => 'trim|required'
                           )));
              $var = array('table' => 'aboutus_corporateprincipal', 'condition' => 'id = '.$id.'' );
               $detail = $this->cat_form->validator($config,false,true);
              $this->cat_model->update($var,$detail);
            }else{
             $var = array('table' => 'aboutus_corporateprincipal', 
                         'condition' => 'id = '.$id.''
                        );
            // var_dump($var);
            $this->cat_model->update($var,$detail);
            }
            echo '<script>window.location.href = "'.base_url('admin/principal').'"</script>';
        }

        
            
       
    }

    public function add_principal()
    {
        $url = $this->uri->uri_string();
        $url = explode('/',$url);

        $id = $url[count($url)-1];

        $click = $this->input->post('btn-edpre');

        $config = array(
                    'admin/principal' => 
                    array(
                      array(
                              'type' => 'text',
                              'name' => 'title',
                              'class' => 'form-control',
                              'value' => set_value('title'),
                              'rules' => 'trim|required'
                           ),
                      array(
                              'type' => 'textarea',
                              'name' => 'desc',
                              'class' => 'form-control',
                              'value' => set_value('desc'),
                              'rules' => 'trim|required'
                           ),
                      array(
                              'type' => 'file',
                              'name' => 'userfile',
                              'path' => '/assets/image/about_us/',
                              'allowed' => 'jpg|jpeg|png',
                              'size' => '0',
                              'width' => '4000',
                              'height' => '4000'

                           )                      
                    )
                );

        $detail = $this->cat_form->validator($config,false,true);

        if ( $detail['desc'] == "" || $detail['title'] == "" ){
          echo "<script>alert('Please fill description or title');</script>";
          echo '<script>window.location.href = "'.base_url('admin/principal').'"</script>';
        }else{

            if ( $detail['userfile'] == "" ){
              $config = array(
                    'admin/principal' => 
                    array(
                      array(
                              'type' => 'text',
                              'name' => 'title',
                              'class' => 'form-control',
                              'value' => set_value('title'),
                              'rules' => 'trim|required'
                           ),
                      array(
                              'type' => 'textarea',
                              'name' => 'desc',
                              'class' => 'form-control',
                              'value' => set_value('desc'),
                              'rules' => 'trim|required'
                           )));
               $detail = $this->cat_form->validator($config,false,true);
              $this->cat_model->insert("aboutus_corporateprincipal",$detail);
            }else{
              $this->cat_model->insert("aboutus_corporateprincipal",$detail);
            }
            echo '<script>window.location.href = "'.base_url('admin/principal').'"</script>';
        }

        
            
       
    }

     public function sekilas()
    {
        $this->cat_login->is_login();

        $catalyst['header'] = 'admin-main-header';
        $catalyst['label'] = $this->_admin;
        $catalyst['themes'] = "sekilas";
        $catalyst['processor'] = null;
        $catalyst['footer'] = null; 

        $catalyst = $this->catalyst->enables('morris,flot,table',$catalyst);

        $data['raw_sekilas'] = $this->cat_model->getall('aboutus_glance_id');

        $this->catalyst->render($catalyst, $data);

    }

     public function edit_sekilas()
    {
        $url = $this->uri->uri_string();
        $url = explode('/',$url);

        $id = $url[count($url)-1];

        $click = $this->input->post('btn-edpre');

        $config = array(
                    'admin/sekilas' => 
                    array(
                      array(
                              'type' => 'textarea',
                              'name' => 'content',
                              'class' => 'form-control',
                              'value' => set_value('content'),
                              'rules' => 'trim|required'
                           )                  
                    )
                );

        $detail = $this->cat_form->validator($config,false,true);

        $var = array('table' => 'aboutus_glance_id', 
                         'condition' => 'id = '.$id.''
                        );
            // var_dump($var);
            $this->cat_model->update($var,$detail);
            echo '<script>window.location.href = "'.base_url('admin/sekilas').'"</script>';
       
    }

    public function glance()
    {
        $this->cat_login->is_login();

        $catalyst['header'] = 'admin-main-header';
        $catalyst['label'] = $this->_admin;
        $catalyst['themes'] = "glance";
        $catalyst['processor'] = null;
        $catalyst['footer'] = null; 

        $catalyst = $this->catalyst->enables('morris,flot,table',$catalyst);

        $data['raw_glance'] = $this->cat_model->getall('aboutus_glance');

        $this->catalyst->render($catalyst, $data);

    }

     public function edit_glance()
    {
        $url = $this->uri->uri_string();
        $url = explode('/',$url);

        $id = $url[count($url)-1];

        $click = $this->input->post('btn-edpre');

        $config = array(
                    'admin/glance' => 
                    array(
                      array(
                              'type' => 'textarea',
                              'name' => 'content',
                              'class' => 'form-control',
                              'value' => set_value('content'),
                              'rules' => 'trim|required'
                           )                  
                    )
                );

        $detail = $this->cat_form->validator($config,false,true);

        $var = array('table' => 'aboutus_glance', 
                         'condition' => 'id = '.$id.''
                        );
            // var_dump($var);
            $this->cat_model->update($var,$detail);
            echo '<script>window.location.href = "'.base_url('admin/glance').'"</script>';
       
    }

    public function milestone()
    {
        $this->cat_login->is_login();

        $catalyst['header'] = 'admin-main-header';
        $catalyst['label'] = $this->_admin;
        $catalyst['themes'] = "milestone";
        $catalyst['processor'] = null;
        $catalyst['footer'] = null; 

        $catalyst = $this->catalyst->enables('morris,flot,table',$catalyst);

        $data['raw_milestone'] = $this->cat_model->getall('aboutus_milestone');

        $this->catalyst->render($catalyst, $data);

    }

     public function edit_milestone()
    {
        $url = $this->uri->uri_string();
        $url = explode('/',$url);

        $id = $url[count($url)-1];

        $click = $this->input->post('btn-edpre');

        $config = array(
                    'admin/milestone' => 
                    array(
                      array(
                              'type' => 'file',
                              'name' => 'userfile',
                              'path' => '/assets/image/logo_header/',
                              'allowed' => 'jpg|jpeg|png',
                              'size' => '0',
                              'width' => '4000',
                              'height' => '4000'

                           )                      
                    )
                );

        $detail = $this->cat_form->validator($config,false,true);

        $var = array('table' => 'aboutus_milestone', 
                         'condition' => 'id = '.$id.''
                        );
            // var_dump($var);
            $this->cat_model->update($var,$detail);
            echo '<script>window.location.href = "'.base_url('admin/milestone').'"</script>';
       
    }

    public function komisaris()
    {
        $this->cat_login->is_login();

        $catalyst['header'] = 'admin-main-header';
        $catalyst['label'] = $this->_admin;
        $catalyst['themes'] = "komisaris";
        $catalyst['processor'] = null;
        $catalyst['footer'] = null; 

        $catalyst = $this->catalyst->enables('morris,flot,table',$catalyst);

        $data['raw_komisaris'] = $this->cat_model->getall('aboutus_management_boc_id');

        $this->catalyst->render($catalyst, $data);

    }

     public function edit_komisaris()
    {
        $url = $this->uri->uri_string();
        $url = explode('/',$url);

        $id = $url[count($url)-1];

        $click = $this->input->post('btn-edpre');

        $config = array(
                    'admin/komisaris' => 
                    array(
                      array(
                              'type' => 'text',
                              'name' => 'name',
                              'class' => 'form-control',
                              'value' => set_value('name'),
                              'rules' => 'trim|required'
                           ),
                      array(
                              'type' => 'text',
                              'name' => 'position',
                              'class' => 'form-control',
                              'value' => set_value('position'),
                              'rules' => 'trim|required'
                           ),
                      array(
                              'type' => 'textarea',
                              'name' => 'descriptor',
                              'class' => 'form-control',
                              'value' => set_value('descriptor'),
                              'rules' => 'trim|required'
                           ),
                      array(
                              'type' => 'file',
                              'name' => 'userfile',
                              'path' => '/assets/image/about_us/management_team/boc/',
                              'allowed' => 'jpg|jpeg|png',
                              'size' => '0',
                              'width' => '4000',
                              'height' => '4000'

                           )                      
                    )
                );

        $detail = $this->cat_form->validator($config,false,true);

        $var = array('table' => 'aboutus_management_boc_id', 
                         'condition' => 'id = '.$id.''
                        );
            // var_dump($var);
            $this->cat_model->update($var,$detail);
            echo '<script>window.location.href = "'.base_url('admin/komisaris').'"</script>';
       
    }

    public function add_komisaris()
    {
       $config = array(
                    'admin/komisaris' => 
                    array(
                      array(
                              'type' => 'text',
                              'name' => 'name',
                              'class' => 'form-control',
                              'value' => set_value('name'),
                              'rules' => 'trim|required'
                           ),
                      array(
                              'type' => 'text',
                              'name' => 'position',
                              'class' => 'form-control',
                              'value' => set_value('position'),
                              'rules' => 'trim|required'
                           ),
                      array(
                              'type' => 'textarea',
                              'name' => 'descriptor',
                              'class' => 'form-control',
                              'value' => set_value('descriptor'),
                              'rules' => 'trim|required'
                           ),
                      array(
                              'type' => 'file',
                              'name' => 'userfile',
                              'path' => '/assets/image/about_us/management_team/boc/',
                              'allowed' => 'jpg|jpeg|png',
                              'size' => '0',
                              'width' => '4000',
                              'height' => '4000'

                           ),
                      array(
                              'type' => 'text',
                              'name' => 'active',
                              'class' => 'form-control',
                              'value' => '1'
                           ),              
                    )
                );

            $detail = $this->cat_form->validator($config,false,true);
            if ( $detail['descriptor'] == "" ){
              $detail['descriptor'] = "<p></p>";
            }
            $this->cat_model->insert('aboutus_management_boc_id',$detail);
            echo '<script>window.location.href = "'.base_url('admin/komisaris').'"</script>';
    }

    public function delete_komisaris()
    {
        $url = $this->uri->uri_string();
        $url = explode('/',$url);

        $id = $url[count($url)-1];

        $this->db->delete('aboutus_management_boc_id', array('id' => $id)); 
        echo '<script>window.location.href = "'.base_url('admin/komisaris').'"</script>';
    }

    public function commissioners()
    {
        $this->cat_login->is_login();

        $catalyst['header'] = 'admin-main-header';
        $catalyst['label'] = $this->_admin;
        $catalyst['themes'] = "commissioners";
        $catalyst['processor'] = null;
        $catalyst['footer'] = null; 

        $catalyst = $this->catalyst->enables('morris,flot,table',$catalyst);

        $data['raw_commissioners'] = $this->cat_model->getall('aboutus_management_boc');

        $this->catalyst->render($catalyst, $data);

    }

     public function edit_commissioners()
    {
        $url = $this->uri->uri_string();
        $url = explode('/',$url);

        $id = $url[count($url)-1];

        $click = $this->input->post('btn-edpre');

        $config = array(
                    'admin/komisaris' => 
                    array(
                      array(
                              'type' => 'text',
                              'name' => 'name',
                              'class' => 'form-control',
                              'value' => set_value('name'),
                              'rules' => 'trim|required'
                           ),
                      array(
                              'type' => 'text',
                              'name' => 'position',
                              'class' => 'form-control',
                              'value' => set_value('position'),
                              'rules' => 'trim|required'
                           ),
                      array(
                              'type' => 'textarea',
                              'name' => 'descriptor',
                              'class' => 'form-control',
                              'value' => set_value('descriptor'),
                              'rules' => 'trim|required'
                           ),
                      array(
                              'type' => 'file',
                              'name' => 'userfile',
                              'path' => '/assets/image/about_us/management_team/boc/',
                              'allowed' => 'jpg|jpeg|png',
                              'size' => '0',
                              'width' => '4000',
                              'height' => '4000'

                           )                      
                    )
                );

        $detail = $this->cat_form->validator($config,false,true);

        $var = array('table' => 'aboutus_management_boc', 
                         'condition' => 'id = '.$id.''
                        );
            // var_dump($var);
            $this->cat_model->update($var,$detail);
            echo '<script>window.location.href = "'.base_url('admin/commissioners').'"</script>';
       
    }

    public function add_commissioners()
    {
       $config = array(
                    'admin/commissioners' => 
                    array(
                      array(
                              'type' => 'text',
                              'name' => 'name',
                              'class' => 'form-control',
                              'value' => set_value('name'),
                              'rules' => 'trim|required'
                           ),
                      array(
                              'type' => 'text',
                              'name' => 'position',
                              'class' => 'form-control',
                              'value' => set_value('position'),
                              'rules' => 'trim|required'
                           ),
                      array(
                              'type' => 'textarea',
                              'name' => 'descriptor',
                              'class' => 'form-control',
                              'value' => set_value('descriptor'),
                              'rules' => 'trim|required'
                           ),
                      array(
                              'type' => 'file',
                              'name' => 'userfile',
                              'path' => '/assets/image/about_us/management_team/boc/',
                              'allowed' => 'jpg|jpeg|png',
                              'size' => '0',
                              'width' => '4000',
                              'height' => '4000'

                           ),
                      array(
                              'type' => 'text',
                              'name' => 'active',
                              'class' => 'form-control',
                              'value' => '1'
                           ),              
                    )
                );

            $detail = $this->cat_form->validator($config,false,true);
            if ( $detail['descriptor'] == "" ){
              $detail['descriptor'] = "<p></p>";
            }
            $this->cat_model->insert('aboutus_management_boc',$detail);
            echo '<script>window.location.href = "'.base_url('admin/commissioners').'"</script>';
    }

    public function delete_commissioners()
    {
        $url = $this->uri->uri_string();
        $url = explode('/',$url);

        $id = $url[count($url)-1];

        $this->db->delete('aboutus_management_boc', array('id' => $id)); 
        echo '<script>window.location.href = "'.base_url('admin/commissioners').'"</script>';
    }

    public function direksi()
    {
        $this->cat_login->is_login();

        $catalyst['header'] = 'admin-main-header';
        $catalyst['label'] = $this->_admin;
        $catalyst['themes'] = "direksi";
        $catalyst['processor'] = null;
        $catalyst['footer'] = null; 

        $catalyst = $this->catalyst->enables('morris,flot,table',$catalyst);

        $data['raw_direksi'] = $this->cat_model->getall('aboutus_management_bod_id');

        $this->catalyst->render($catalyst, $data);

    }

     public function edit_direksi()
    {
        $url = $this->uri->uri_string();
        $url = explode('/',$url);

        $id = $url[count($url)-1];

        $click = $this->input->post('btn-edpre');

        $config = array(
                    'admin/direksi' => 
                    array(
                      array(
                              'type' => 'text',
                              'name' => 'name',
                              'class' => 'form-control',
                              'value' => set_value('name'),
                              'rules' => 'trim|required'
                           ),
                      array(
                              'type' => 'text',
                              'name' => 'position',
                              'class' => 'form-control',
                              'value' => set_value('position'),
                              'rules' => 'trim|required'
                           ),
                      array(
                              'type' => 'textarea',
                              'name' => 'descriptor',
                              'class' => 'form-control',
                              'value' => set_value('descriptor'),
                              'rules' => 'trim|required'
                           ),
                      array(
                              'type' => 'file',
                              'name' => 'userfile',
                              'path' => '/assets/image/about_us/management_team/bod/',
                              'allowed' => 'jpg|jpeg|png',
                              'size' => '0',
                              'width' => '4000',
                              'height' => '4000'

                           )                      
                    )
                );

        $detail = $this->cat_form->validator($config,false,true);

        $var = array('table' => 'aboutus_management_bod_id', 
                         'condition' => 'id = '.$id.''
                        );
            // var_dump($var);
            $this->cat_model->update($var,$detail);
            echo '<script>window.location.href = "'.base_url('admin/direksi').'"</script>';
       
    }

    public function add_direksi()
    {
       $config = array(
                    'admin/direksi' => 
                    array(
                      array(
                              'type' => 'text',
                              'name' => 'name',
                              'class' => 'form-control',
                              'value' => set_value('name'),
                              'rules' => 'trim|required'
                           ),
                      array(
                              'type' => 'text',
                              'name' => 'position',
                              'class' => 'form-control',
                              'value' => set_value('position'),
                              'rules' => 'trim|required'
                           ),
                      array(
                              'type' => 'textarea',
                              'name' => 'descriptor',
                              'class' => 'form-control',
                              'value' => set_value('descriptor'),
                              'rules' => 'trim|required'
                           ),
                      array(
                              'type' => 'file',
                              'name' => 'userfile',
                              'path' => '/assets/image/about_us/management_team/bod/',
                              'allowed' => 'jpg|jpeg|png',
                              'size' => '0',
                              'width' => '4000',
                              'height' => '4000'

                           ),
                      array(
                              'type' => 'text',
                              'name' => 'active',
                              'class' => 'form-control',
                              'value' => '1'
                           ),              
                    )
                );

            $detail = $this->cat_form->validator($config,false,true);
            $detail = $this->cat_form->validator($config,false,true);
             if ( $detail['descriptor'] == "" ){
              $detail['descriptor'] = "<p></p>";
            }
            $this->cat_model->insert('aboutus_management_bod_id',$detail);
            echo '<script>window.location.href = "'.base_url('admin/direksi').'"</script>';
    }

    public function delete_direksi()
    {
        $url = $this->uri->uri_string();
        $url = explode('/',$url);

        $id = $url[count($url)-1];

        $this->db->delete('aboutus_management_bod_id', array('id' => $id)); 
        echo '<script>window.location.href = "'.base_url('admin/direksi').'"</script>';
    }

    public function directors()
    {
        $this->cat_login->is_login();

        $catalyst['header'] = 'admin-main-header';
        $catalyst['label'] = $this->_admin;
        $catalyst['themes'] = "directors";
        $catalyst['processor'] = null;
        $catalyst['footer'] = null; 

        $catalyst = $this->catalyst->enables('morris,flot,table',$catalyst);

        $data['raw_directors'] = $this->cat_model->getall('aboutus_management_bod');

        $this->catalyst->render($catalyst, $data);

    }

     public function edit_directors()
    {
        $url = $this->uri->uri_string();
        $url = explode('/',$url);

        $id = $url[count($url)-1];

        $click = $this->input->post('btn-edpre');

        $config = array(
                    'admin/directors' => 
                    array(
                      array(
                              'type' => 'text',
                              'name' => 'name',
                              'class' => 'form-control',
                              'value' => set_value('name'),
                              'rules' => 'trim|required'
                           ),
                      array(
                              'type' => 'text',
                              'name' => 'position',
                              'class' => 'form-control',
                              'value' => set_value('position'),
                              'rules' => 'trim|required'
                           ),
                      array(
                              'type' => 'textarea',
                              'name' => 'descriptor',
                              'class' => 'form-control',
                              'value' => set_value('descriptor'),
                              'rules' => 'trim|required'
                           ),
                      array(
                              'type' => 'file',
                              'name' => 'userfile',
                              'path' => '/assets/image/about_us/management_team/bod/',
                              'allowed' => 'jpg|jpeg|png',
                              'size' => '0',
                              'width' => '4000',
                              'height' => '4000'

                           )                      
                    )
                );

        $detail = $this->cat_form->validator($config,false,true);

        $var = array('table' => 'aboutus_management_bod', 
                         'condition' => 'id = '.$id.''
                        );
            // var_dump($var);
            $this->cat_model->update($var,$detail);
            echo '<script>window.location.href = "'.base_url('admin/directors').'"</script>';
       
    }

    public function add_directors()
    {
       $config = array(
                    'admin/directors' => 
                    array(
                      array(
                              'type' => 'text',
                              'name' => 'name',
                              'class' => 'form-control',
                              'value' => set_value('name'),
                              'rules' => 'trim|required'
                           ),
                      array(
                              'type' => 'text',
                              'name' => 'position',
                              'class' => 'form-control',
                              'value' => set_value('position'),
                              'rules' => 'trim|required'
                           ),
                      array(
                              'type' => 'textarea',
                              'name' => 'descriptor',
                              'class' => 'form-control',
                              'value' => set_value('descriptor'),
                              'rules' => 'trim|required'
                           ),
                      array(
                              'type' => 'file',
                              'name' => 'userfile',
                              'path' => '/assets/image/about_us/management_team/bod/',
                              'allowed' => 'jpg|jpeg|png',
                              'size' => '0',
                              'width' => '4000',
                              'height' => '4000'

                           ),
                      array(
                              'type' => 'text',
                              'name' => 'active',
                              'class' => 'form-control',
                              'value' => '1'
                           ),              
                    )
                );

            $detail = $this->cat_form->validator($config,false,true);
             if ( $detail['descriptor'] == "" ){
              $detail['descriptor'] = "<p></p>";
            }

            $this->cat_model->insert('aboutus_management_bod',$detail);
            echo '<script>window.location.href = "'.base_url('admin/directors').'"</script>';
    }

    public function delete_directors()
    {
        $url = $this->uri->uri_string();
        $url = explode('/',$url);

        $id = $url[count($url)-1];

        $this->db->delete('aboutus_management_bod', array('id' => $id)); 
        echo '<script>window.location.href = "'.base_url('admin/directors').'"</script>';
    }

    public function anakperusahaan()
    {
        $this->cat_login->is_login();

        $catalyst['header'] = 'admin-main-header';
        $catalyst['label'] = $this->_admin;
        $catalyst['themes'] = "anakperusahaan";
        $catalyst['processor'] = null;
        $catalyst['footer'] = null; 

        $catalyst = $this->catalyst->enables('morris,flot,table',$catalyst);

        $data['raw_anakperusahaan'] = $this->cat_model->getall('home_subsidiaries_id');

        $this->catalyst->render($catalyst, $data);

    }

     public function edit_anakperusahaan()
    {
        $url = $this->uri->uri_string();
        $url = explode('/',$url);

        $id = $url[count($url)-1];

        $click = $this->input->post('btn-edpre');

        $config = array(
                    'admin/anakperusahaan' => 
                    array(
                      array(
                              'type' => 'text',
                              'name' => 'title',
                              'class' => 'form-control',
                              'value' => set_value('title'),
                              'rules' => 'trim|required'
                           ),
                      array(
                              'type' => 'text',
                              'name' => 'email',
                              'class' => 'form-control',
                              'value' => set_value('email'),
                              'rules' => 'trim|required'
                           ),
                      array(
                              'type' => 'textarea',
                              'name' => 'descriptor',
                              'class' => 'form-control',
                              'value' => set_value('descriptor'),
                              'rules' => 'trim|required'
                           ),
                      array(
                              'type' => 'file',
                              'name' => 'userfile',
                              'path' => '/assets/image/subsidiaries/',
                              'allowed' => 'jpg|jpeg|png',
                              'size' => '0',
                              'width' => '4000',
                              'height' => '4000'

                           )                      
                    )
                );

        $detail = $this->cat_form->validator($config,false,true);

        $var = array('table' => 'home_subsidiaries_id', 
                         'condition' => 'id = '.$id.''
                        );
            // var_dump($var);
            $this->cat_model->update($var,$detail);
            echo '<script>window.location.href = "'.base_url('admin/anakperusahaan').'"</script>';
       
    }

    public function add_anakperusahaan()
    {
       $config = array(
                    'admin/anakperusahaan' => 
                    array(
                      array(
                              'type' => 'text',
                              'name' => 'title',
                              'class' => 'form-control',
                              'value' => set_value('title'),
                              'rules' => 'trim|required'
                           ),
                      array(
                              'type' => 'text',
                              'name' => 'email',
                              'class' => 'form-control',
                              'value' => set_value('email'),
                              'rules' => 'trim|required'
                           ),
                      array(
                              'type' => 'textarea',
                              'name' => 'descriptor',
                              'class' => 'form-control',
                              'value' => set_value('descriptor'),
                              'rules' => 'trim|required'
                           ),
                      array(
                              'type' => 'file',
                              'name' => 'userfile',
                              'path' => '/assets/image/subsidiaries/',
                              'allowed' => 'jpg|jpeg|png',
                              'size' => '0',
                              'width' => '4000',
                              'height' => '4000'

                           ),
                      array(
                              'type' => 'text',
                              'name' => 'active',
                              'class' => 'form-control',
                              'value' => '1'
                           ),              
                    )
                );

            $detail = $this->cat_form->validator($config,false,true);
            if ( $detail['descriptor'] == "" ){
              $detail['descriptor'] = "<p></p>";
            }
            $this->cat_model->insert('home_subsidiaries_id',$detail);
            echo '<script>window.location.href = "'.base_url('admin/anakperusahaan').'"</script>';
    }

    public function delete_anakperusahaan()
    {
        $url = $this->uri->uri_string();
        $url = explode('/',$url);

        $id = $url[count($url)-1];

        $this->db->delete('home_subsidiaries_id', array('id' => $id)); 
        echo '<script>window.location.href = "'.base_url('admin/anakperusahaan').'"</script>';
    }

    public function subsidiaries()
    {
        $this->cat_login->is_login();

        $catalyst['header'] = 'admin-main-header';
        $catalyst['label'] = $this->_admin;
        $catalyst['themes'] = "subsidiaries";
        $catalyst['processor'] = null;
        $catalyst['footer'] = null; 

        $catalyst = $this->catalyst->enables('morris,flot,table',$catalyst);

        $data['raw_subsidiaries'] = $this->cat_model->getall('home_subsidiaries');

        $this->catalyst->render($catalyst, $data);

    }

     public function edit_subsidiaries()
    {
        $url = $this->uri->uri_string();
        $url = explode('/',$url);

        $id = $url[count($url)-1];

        $click = $this->input->post('btn-edpre');

        $config = array(
                    'admin/subsidiaries' => 
                    array(
                      array(
                              'type' => 'text',
                              'name' => 'title',
                              'class' => 'form-control',
                              'value' => set_value('title'),
                              'rules' => 'trim|required'
                           ),
                      array(
                              'type' => 'text',
                              'name' => 'email',
                              'class' => 'form-control',
                              'value' => set_value('email'),
                              'rules' => 'trim|required'
                           ),
                      array(
                              'type' => 'textarea',
                              'name' => 'descriptor',
                              'class' => 'form-control',
                              'value' => set_value('descriptor'),
                              'rules' => 'trim|required'
                           ),
                      array(
                              'type' => 'file',
                              'name' => 'userfile',
                              'path' => '/assets/image/subsidiaries/',
                              'allowed' => 'jpg|jpeg|png',
                              'size' => '0',
                              'width' => '4000',
                              'height' => '4000'

                           )                      
                    )
                );

        $detail = $this->cat_form->validator($config,false,true);

        $var = array('table' => 'home_subsidiaries', 
                         'condition' => 'id = '.$id.''
                        );
            // var_dump($var);
            $this->cat_model->update($var,$detail);
            echo '<script>window.location.href = "'.base_url('admin/subsidiaries').'"</script>';
       
    }

    public function add_subsidiaries()
    {
       $config = array(
                    'admin/subsidiaries' => 
                    array(
                      array(
                              'type' => 'text',
                              'name' => 'title',
                              'class' => 'form-control',
                              'value' => set_value('title'),
                              'rules' => 'trim|required'
                           ),
                      array(
                              'type' => 'text',
                              'name' => 'email',
                              'class' => 'form-control',
                              'value' => set_value('email'),
                              'rules' => 'trim|required'
                           ),
                      array(
                              'type' => 'textarea',
                              'name' => 'descriptor',
                              'class' => 'form-control',
                              'value' => set_value('descriptor'),
                              'rules' => 'trim|required'
                           ),
                      array(
                              'type' => 'file',
                              'name' => 'userfile',
                              'path' => '/assets/image/subsidiaries/',
                              'allowed' => 'jpg|jpeg|png',
                              'size' => '0',
                              'width' => '4000',
                              'height' => '4000'

                           ),
                      array(
                              'type' => 'text',
                              'name' => 'active',
                              'class' => 'form-control',
                              'value' => '1'
                           ),              
                    )
                );

            $detail = $this->cat_form->validator($config,false,true);
            $this->cat_model->insert('home_subsidiaries',$detail);
            echo '<script>window.location.href = "'.base_url('admin/subsidiaries').'"</script>';
    }

    public function delete_subsidiaries()
    {
        $url = $this->uri->uri_string();
        $url = explode('/',$url);

        $id = $url[count($url)-1];

        $this->db->delete('home_subsidiaries', array('id' => $id)); 
        echo '<script>window.location.href = "'.base_url('admin/subsidiaries').'"</script>';
    }

    public function penghargaan()
    {
        $this->cat_login->is_login();

        $catalyst['header'] = 'admin-main-header';
        $catalyst['label'] = $this->_admin;
        $catalyst['themes'] = "penghargaan";
        $catalyst['processor'] = null;
        $catalyst['footer'] = null; 

        $catalyst = $this->catalyst->enables('morris,flot,table',$catalyst);

        $data['raw_penghargaan'] = $this->cat_model->getall('aboutus_achievement_id');

        $this->catalyst->render($catalyst, $data);

    }

     public function edit_penghargaan()
    {
        $url = $this->uri->uri_string();
        $url = explode('/',$url);

        $id = $url[count($url)-1];

        $click = $this->input->post('btn-edpre');

        $config = array(
                    'admin/penghargaan' => 
                    array(
                      array(
                              'type' => 'textarea',
                              'name' => 'descriptor',
                              'class' => 'form-control',
                              'value' => set_value('descriptor'),
                              'rules' => 'trim|required'
                           ),
                      array(
                              'type' => 'file',
                              'name' => 'userfile',
                              'path' => '/assets/image/about_us/achievement/',
                              'allowed' => 'jpg|jpeg|png',
                              'size' => '0',
                              'width' => '4000',
                              'height' => '4000'

                           )                      
                    )
                );

        $detail = $this->cat_form->validator($config,false,true);
        if ( $detail['userfile'] == "" && $detail['descriptor'] == "" ){
          echo "<script>alert('Please insert description');</script>";
          echo '<script>window.location.href = "'.base_url('admin/achievement').'"</script>';
        }else{
          if ( $detail['userfile'] == "" ){
            $config = array(
                    'admin/penghargaan' => 
                    array(
                      array(
                              'type' => 'textarea',
                              'name' => 'descriptor',
                              'class' => 'form-control',
                              'value' => set_value('descriptor'),
                              'rules' => 'trim|required'
                           )));
            $detail = $this->cat_form->validator($config,false,true);
            $var = array('table' => 'aboutus_achievement_id', 'condition' => 'id = '.$id.'' );
            $this->cat_model->update($var,$detail);
            echo '<script>window.location.href = "'.base_url('admin/penghargaan').'"</script>';

          }else{
            $var = array('table' => 'aboutus_achievement_id', 'condition' => 'id = '.$id.'' );
            $this->cat_model->update($var,$detail);
            echo '<script>window.location.href = "'.base_url('admin/penghargaan').'"</script>';
          }
         
        }

       
       
    }

    public function add_penghargaan()
    {
       $config = array(
                    'admin/penghargaan' => 
                    array(
                      array(
                              'type' => 'textarea',
                              'name' => 'descriptor',
                              'class' => 'form-control',
                              'value' => set_value('descriptor'),
                              'rules' => 'trim|required'
                           ),
                      array(
                              'type' => 'file',
                              'name' => 'userfile',
                              'path' => '/assets/image/about_us/achievement/',
                              'allowed' => 'jpg|jpeg|png',
                              'size' => '0',
                              'width' => '4000',
                              'height' => '4000'

                           ),
                      array(
                              'type' => 'text',
                              'name' => 'active',
                              'class' => 'form-control',
                              'value' => '1'
                           ),              
                    )
                );

            $detail = $this->cat_form->validator($config,false,true);
            if ( $detail['descriptor'] == "" ){
              $detail['descriptor'] = "<p></p>";  
            }
            $this->cat_model->insert('aboutus_achievement_id',$detail);
            echo '<script>window.location.href = "'.base_url('admin/penghargaan').'"</script>';
    }

    public function delete_penghargaan()
    {
        $url = $this->uri->uri_string();
        $url = explode('/',$url);

        $id = $url[count($url)-1];

        $this->db->delete('aboutus_achievement_id', array('id' => $id)); 
        echo '<script>window.location.href = "'.base_url('admin/penghargaan').'"</script>';
    }

     public function achievement()
    {
        $this->cat_login->is_login();

        $catalyst['header'] = 'admin-main-header';
        $catalyst['label'] = $this->_admin;
        $catalyst['themes'] = "achievement";
        $catalyst['processor'] = null;
        $catalyst['footer'] = null; 

        $catalyst = $this->catalyst->enables('morris,flot,table',$catalyst);

        $data['raw_achievement'] = $this->cat_model->getall('aboutus_achievement');

        $this->catalyst->render($catalyst, $data);

    }

     public function edit_achievement()
    {
        $url = $this->uri->uri_string();
        $url = explode('/',$url);

        $id = $url[count($url)-1];

        $click = $this->input->post('btn-edpre');

        $config = array(
                    'admin/achievement' => 
                    array(
                      array(
                              'type' => 'textarea',
                              'name' => 'descriptor',
                              'class' => 'form-control',
                              'value' => set_value('descriptor'),
                              'rules' => 'trim|required'
                           ),
                      array(
                              'type' => 'file',
                              'name' => 'userfile',
                              'path' => '/assets/image/about_us/achievement/',
                              'allowed' => 'jpg|jpeg|png',
                              'size' => '0',
                              'width' => '4000',
                              'height' => '4000'

                           )                      
                    )
                );

        $detail = $this->cat_form->validator($config,false,true);
        if ( $detail['userfile'] == "" && $detail['descriptor'] == ""){
          echo "<script>alert('Please insert description');</script>";
          echo '<script>window.location.href = "'.base_url('admin/achievement').'"</script>';
        }else{
          if ( $detail['userfile'] == "" ){
            $config = array(
                    'admin/achievement' => 
                    array(
                      array(
                              'type' => 'textarea',
                              'name' => 'descriptor',
                              'class' => 'form-control',
                              'value' => set_value('descriptor'),
                              'rules' => 'trim|required'
                           )));
            $detail = $this->cat_form->validator($config,false,true);
            $var = array('table' => 'aboutus_achievement', 'condition' => 'id = '.$id.'');
            $this->cat_model->update($var,$detail);
          }else{
            $var = array('table' => 'aboutus_achievement', 
                         'condition' => 'id = '.$id.''
                        );
            // var_dump($var);
            $this->cat_model->update($var,$detail);
          }
          
        }
       
            echo '<script>window.location.href = "'.base_url('admin/achievement').'"</script>';
       
    }

    public function add_achievement()
    {
       $config = array(
                    'admin/achievement' => 
                    array(
                      array(
                              'type' => 'textarea',
                              'name' => 'descriptor',
                              'class' => 'form-control',
                              'value' => set_value('descriptor'),
                              'rules' => 'trim|required'
                           ),
                      array(
                              'type' => 'file',
                              'name' => 'userfile',
                              'path' => '/assets/image/about_us/achievement/',
                              'allowed' => 'jpg|jpeg|png',
                              'size' => '0',
                              'width' => '4000',
                              'height' => '4000'

                           ),
                      array(
                              'type' => 'text',
                              'name' => 'active',
                              'class' => 'form-control',
                              'value' => '1'
                           ),              
                    )
                );

            $detail = $this->cat_form->validator($config,false,true);
            if ( $detail['descriptor'] == "" ){
              $detail['descriptor'] = "<p></p>";
            }
            $this->cat_model->insert('aboutus_achievement',$detail);
            echo '<script>window.location.href = "'.base_url('admin/achievement').'"</script>';
    }

    public function delete_achievement()
    {
        $url = $this->uri->uri_string();
        $url = explode('/',$url);

        $id = $url[count($url)-1];

        $this->db->delete('aboutus_achievement', array('id' => $id)); 
        echo '<script>window.location.href = "'.base_url('admin/achievement').'"</script>';
    }

//EXPERTISE EXPERTISE EXPERTISE EXPERTISE EXPERTIS

    public function spesialisasi()
    {
        $this->cat_login->is_login();

        $catalyst['header'] = 'admin-main-header';
        $catalyst['label'] = $this->_admin;
        $catalyst['themes'] = "spesialisasi";
        $catalyst['processor'] = null;
        $catalyst['footer'] = null; 

        $catalyst = $this->catalyst->enables('morris,flot,table',$catalyst);

        $data['raw_spesialisasi'] = $this->cat_model->getall('expertise_front_id');

        $this->catalyst->render($catalyst, $data);

    }

    public function edit_spesialisasi()
    {
        $url = $this->uri->uri_string();
        $url = explode('/',$url);

        $id = $url[count($url)-1];

        $click = $this->input->post('btn-edpre');

        $config = array(
                    'admin/spesialisasi' => 
                    array(
                      array(
                              'type' => 'textarea',
                              'name' => 'descriptor',
                              'class' => 'form-control',
                              'value' => set_value('descriptor'),
                              'rules' => 'trim|required'
                           ),
                      array(
                              'type' => 'file',
                              'name' => 'userfile',
                              'path' => '/assets/image/expertise/',
                              'allowed' => 'jpg|jpeg|png',
                              'size' => '0',
                              'width' => '4000',
                              'height' => '4000'

                           )                      
                    )
                );

        $detail = $this->cat_form->validator($config,false,true);
        if ( $detail['userfile'] == "" && $detail['descriptor'] == "" ){
            echo "<script>alert('Please insert description');</script>";
            echo '<script>window.location.href = "'.base_url('admin/achievement').'"</script>';
        }else{
            if ( $detail['userfile'] == "" ){
              $config = array(
                    'admin/spesialisasi' => 
                    array(
                      array(
                              'type' => 'textarea',
                              'name' => 'descriptor',
                              'class' => 'form-control',
                              'value' => set_value('descriptor'),
                              'rules' => 'trim|required'
                           )));
              $detail = $this->cat_form->validator($config,false,true);
              $var = array('table' => 'expertise_front_id', 'condition' => 'id = '.$id.'' );
              $this->cat_model->update($var,$detail);
            }else{             
              $var = array('table' => 'expertise_front_id', 'condition' => 'id = '.$id.'' );
              $this->cat_model->update($var,$detail);
            }
            echo '<script>window.location.href = "'.base_url('admin/spesialisasi').'"</script>';
        }
       
    }

    public function expertise()
    {
        $this->cat_login->is_login();

        $catalyst['header'] = 'admin-main-header';
        $catalyst['label'] = $this->_admin;
        $catalyst['themes'] = "expertise";
        $catalyst['processor'] = null;
        $catalyst['footer'] = null; 

        $catalyst = $this->catalyst->enables('morris,flot,table',$catalyst);

        $data['raw_expertise'] = $this->cat_model->getall('expertise_front');

        $this->catalyst->render($catalyst, $data);

    }

    public function edit_expertise()
    {
        $url = $this->uri->uri_string();
        $url = explode('/',$url);

        $id = $url[count($url)-1];

        $click = $this->input->post('btn-edpre');

        $config = array(
                    'admin/expertise' => 
                    array(
                      array(
                              'type' => 'textarea',
                              'name' => 'descriptor',
                              'class' => 'form-control',
                              'value' => set_value('descriptor'),
                              'rules' => 'trim|required'
                           ),
                      array(
                              'type' => 'file',
                              'name' => 'userfile',
                              'path' => '/assets/image/expertise/',
                              'allowed' => 'jpg|jpeg|png',
                              'size' => '0',
                              'width' => '4000',
                              'height' => '4000'

                           )                      
                    )
                );

        $detail = $this->cat_form->validator($config,false,true);
        if ( $detail['userfile'] == "" && $detail['descriptor'] == "" ){
            echo "<script>alert('Please insert description');</script>";
            echo '<script>window.location.href = "'.base_url('admin/achievement').'"</script>';
        }else{
          if ( $detail['userfile'] == "" ){

              $config = array(
                    'admin/expertise' => 
                    array(
                      array(
                              'type' => 'textarea',
                              'name' => 'descriptor',
                              'class' => 'form-control',
                              'value' => set_value('descriptor'),
                              'rules' => 'trim|required'
                           )));
              $detail = $this->cat_form->validator($config,false,true);
              $var = array('table' => 'expertise_front', 
                         'condition' => 'id = '.$id.''
                        );
              // var_dump($var);
              $this->cat_model->update($var,$detail);
              echo '<script>window.location.href = "'.base_url('admin/expertise').'"</script>';
          }else{
             $var = array('table' => 'expertise_front', 
                         'condition' => 'id = '.$id.''
                        );
            // var_dump($var);
            $this->cat_model->update($var,$detail);
            echo '<script>window.location.href = "'.base_url('admin/expertise').'"</script>';
          }
        }
       
       
    }

    public function fondasi()
    {
        $this->cat_login->is_login();

        $catalyst['header'] = 'admin-main-header';
        $catalyst['label'] = $this->_admin;
        $catalyst['themes'] = "fondasi";
        $catalyst['processor'] = null;
        $catalyst['footer'] = null; 

        $catalyst = $this->catalyst->enables('morris,flot,table',$catalyst);

        $data['raw_fondasi'] = $this->cat_model->getall('expertise_foundation_id');

        $this->catalyst->render($catalyst, $data);

    }

    public function edit_fondasi()
    {
        $url = $this->uri->uri_string();
        $url = explode('/',$url);

        $id = $url[count($url)-1];

        $click = $this->input->post('btn-edpre');

        $config = array(
                    'admin/fondasi' => 
                    array(
                      array(
                              'type' => 'textarea',
                              'name' => 'descriptor',
                              'class' => 'form-control',
                              'value' => set_value('descriptor'),
                              'rules' => 'trim|required'
                           ),
                      array(
                              'type' => 'file',
                              'name' => 'userfile',
                              'path' => '/assets/image/expertise/',
                              'allowed' => 'jpg|jpeg|png',
                              'size' => '0',
                              'width' => '4000',
                              'height' => '4000'

                           )                      
                    )
                );

        $detail = $this->cat_form->validator($config,false,true);
        if ( $detail['descriptor'] == "" ){
            echo "<script>alert('Please fill description');</script>";
            echo '<script>window.location.href = "'.base_url('admin/fondasi').'"</script>';
        }else{
            if ( $detail['userfile'] == ""){
              $config = array(
                    'admin/fondasi' => 
                    array(
                      array(
                              'type' => 'textarea',
                              'name' => 'descriptor',
                              'class' => 'form-control',
                              'value' => set_value('descriptor'),
                              'rules' => 'trim|required'
                           )));
              $detail = $this->cat_form->validator($config,false,true);
              $var = array('table' => 'expertise_foundation_id', 
                         'condition' => 'id = '.$id.''
                        );
              // var_dump($var);
              $this->cat_model->update($var,$detail);
            }else{
              $var = array('table' => 'expertise_foundation_id', 
                         'condition' => 'id = '.$id.''
                        );
              // var_dump($var);
              $this->cat_model->update($var,$detail);
            }
            echo '<script>window.location.href = "'.base_url('admin/fondasi').'"</script>';
        }
       
       
    }

    public function foundation()
    {
        $this->cat_login->is_login();

        $catalyst['header'] = 'admin-main-header';
        $catalyst['label'] = $this->_admin;
        $catalyst['themes'] = "foundation";
        $catalyst['processor'] = null;
        $catalyst['footer'] = null; 

        $catalyst = $this->catalyst->enables('morris,flot,table',$catalyst);

        $data['raw_foundation'] = $this->cat_model->getall('expertise_foundation');

        $this->catalyst->render($catalyst, $data);

    }

    public function edit_foundation()
    {
        $url = $this->uri->uri_string();
        $url = explode('/',$url);

        $id = $url[count($url)-1];

        $click = $this->input->post('btn-edpre');

        $config = array(
                    'admin/foundation' => 
                    array(
                      array(
                              'type' => 'textarea',
                              'name' => 'descriptor',
                              'class' => 'form-control',
                              'value' => set_value('descriptor'),
                              'rules' => 'trim|required'
                           ),
                      array(
                              'type' => 'file',
                              'name' => 'userfile',
                              'path' => '/assets/image/expertise/',
                              'allowed' => 'jpg|jpeg|png',
                              'size' => '0',
                              'width' => '4000',
                              'height' => '4000'

                           )                      
                    )
                );

        $detail = $this->cat_form->validator($config,false,true);
        if ( $detail['descriptor'] == "" ){
            echo "<script>alert('Please fill description');</script>";
            echo '<script>window.location.href = "'.base_url('admin/foundation').'"</script>';
        }else{
        if ( $detail['userfile'] == ""){
          $config = array(
                'admin/foundation' => 
                array(
                  array(
                          'type' => 'textarea',
                          'name' => 'descriptor',
                          'class' => 'form-control',
                          'value' => set_value('descriptor'),
                          'rules' => 'trim|required'
                       )));
          $detail = $this->cat_form->validator($config,false,true);
          $var = array('table' => 'expertise_foundation', 
                         'condition' => 'id = '.$id.''
                        );
            // var_dump($var);
            $this->cat_model->update($var,$detail);
            echo '<script>window.location.href = "'.base_url('admin/foundation').'"</script>';
        }else{
           $var = array('table' => 'expertise_foundation', 
                         'condition' => 'id = '.$id.''
                        );
            // var_dump($var);
            $this->cat_model->update($var,$detail);
            echo '<script>window.location.href = "'.base_url('admin/foundation').'"</script>';
        }
      }

       
       
    }

    public function pembongkaran()
    {
        $this->cat_login->is_login();

        $catalyst['header'] = 'admin-main-header';
        $catalyst['label'] = $this->_admin;
        $catalyst['themes'] = "pembongkaran";
        $catalyst['processor'] = null;
        $catalyst['footer'] = null; 

        $catalyst = $this->catalyst->enables('morris,flot,table',$catalyst);

        $data['raw_pembongkaran'] = $this->cat_model->getall('expertise_demolition_id');

        $this->catalyst->render($catalyst, $data);

    }

    public function edit_pembongkaran()
    {
        $url = $this->uri->uri_string();
        $url = explode('/',$url);

        $id = $url[count($url)-1];

        $click = $this->input->post('btn-edpre');

        $config = array(
                    'admin/pembongkaran' => 
                    array(
                      array(
                              'type' => 'textarea',
                              'name' => 'descriptor',
                              'class' => 'form-control',
                              'value' => set_value('descriptor'),
                              'rules' => 'trim|required'
                           ),
                      array(
                              'type' => 'file',
                              'name' => 'userfile',
                              'path' => '/assets/image/expertise/',
                              'allowed' => 'jpg|jpeg|png',
                              'size' => '0',
                              'width' => '4000',
                              'height' => '4000'

                           )                      
                    )
                );

        $detail = $this->cat_form->validator($config,false,true);
        if ( $detail['descriptor'] == "" ){
          echo "<script>alert('Please fill description');</script>";
          echo '<script>window.location.href = "'.base_url('admin/foundation').'"</script>'; 
        }else{
          if ( $detail['userfile'] == "" ){

            $config = array(
                    'admin/pembongkaran' => 
                    array(
                      array(
                              'type' => 'textarea',
                              'name' => 'descriptor',
                              'class' => 'form-control',
                              'value' => set_value('descriptor'),
                              'rules' => 'trim|required'
                           )));
            $detail = $this->cat_form->validator($config,false,true);
            $var = array('table' => 'expertise_demolition_id', 
                         'condition' => 'id = '.$id.''
                        );
            // var_dump($var);
            $this->cat_model->update($var,$detail);
            echo '<script>window.location.href = "'.base_url('admin/pembongkaran').'"</script>';
          }else{
            $var = array('table' => 'expertise_demolition_id', 
                         'condition' => 'id = '.$id.''
                        );
            // var_dump($var);
            $this->cat_model->update($var,$detail);
            echo '<script>window.location.href = "'.base_url('admin/pembongkaran').'"</script>';
          }
        }

          
       
    }

    public function demolition()
    {
        $this->cat_login->is_login();

        $catalyst['header'] = 'admin-main-header';
        $catalyst['label'] = $this->_admin;
        $catalyst['themes'] = "demolition";
        $catalyst['processor'] = null;
        $catalyst['footer'] = null; 

        $catalyst = $this->catalyst->enables('morris,flot,table',$catalyst);

        $data['raw_demolition'] = $this->cat_model->getall('expertise_demolition');

        $this->catalyst->render($catalyst, $data);

    }

    public function edit_demolition()
    {
        $url = $this->uri->uri_string();
        $url = explode('/',$url);

        $id = $url[count($url)-1];

        $click = $this->input->post('btn-edpre');

        $config = array(
                    'admin/demolition' => 
                    array(
                      array(
                              'type' => 'textarea',
                              'name' => 'descriptor',
                              'class' => 'form-control',
                              'value' => set_value('descriptor'),
                              'rules' => 'trim|required'
                           ),
                      array(
                              'type' => 'file',
                              'name' => 'userfile',
                              'path' => '/assets/image/expertise/',
                              'allowed' => 'jpg|jpeg|png',
                              'size' => '0',
                              'width' => '4000',
                              'height' => '4000'

                           )                      
                    )
                );

        $detail = $this->cat_form->validator($config,false,true);
        if ( $detail['descriptor'] == "" ){
          echo "<script>alert('Please fill description');</script>";
          echo '<script>window.location.href = "'.base_url('admin/foundation').'"</script>'; 
        }else{
          if ( $detail['userfile'] == "" ){
            $config = array(
                    'admin/demolition' => 
                    array(
                      array(
                              'type' => 'textarea',
                              'name' => 'descriptor',
                              'class' => 'form-control',
                              'value' => set_value('descriptor'),
                              'rules' => 'trim|required'
                           )));
            $detail = $this->cat_form->validator($config,false,true);
            $var = array('table' => 'expertise_demolition', 
                         'condition' => 'id = '.$id.''
                        );
            // var_dump($var);
            $this->cat_model->update($var,$detail);
            echo '<script>window.location.href = "'.base_url('admin/demolition').'"</script>';
          }else{
            $var = array('table' => 'expertise_demolition', 
                         'condition' => 'id = '.$id.''
                        );
            // var_dump($var);
            $this->cat_model->update($var,$detail);
            echo '<script>window.location.href = "'.base_url('admin/demolition').'"</script>';
          }
        }
       
       
    }

    public function bangunan()
    {
        $this->cat_login->is_login();

        $catalyst['header'] = 'admin-main-header';
        $catalyst['label'] = $this->_admin;
        $catalyst['themes'] = "bangunan";
        $catalyst['processor'] = null;
        $catalyst['footer'] = null; 

        $catalyst = $this->catalyst->enables('morris,flot,table',$catalyst);

        $data['raw_bangunan'] = $this->cat_model->getall('expertise_building_id');

        $this->catalyst->render($catalyst, $data);

    }

    public function edit_bangunan()
    {
        $url = $this->uri->uri_string();
        $url = explode('/',$url);

        $id = $url[count($url)-1];

        $click = $this->input->post('btn-edpre');

        $config = array(
                    'admin/bangunan' => 
                    array(
                      array(
                              'type' => 'textarea',
                              'name' => 'descriptor',
                              'class' => 'form-control',
                              'value' => set_value('descriptor'),
                              'rules' => 'trim|required'
                           ),
                      array(
                              'type' => 'file',
                              'name' => 'userfile',
                              'path' => '/assets/image/expertise/',
                              'allowed' => 'jpg|jpeg|png',
                              'size' => '0',
                              'width' => '4000',
                              'height' => '4000'

                           )                      
                    )
                );

        $detail = $this->cat_form->validator($config,false,true);
        if ( $detail['descriptor'] == ""){
          echo "<script>alert('Please fill description');</script>";
          echo '<script>window.location.href = "'.base_url('admin/bangunan').'"</script>';
        }else{

            if ( $detail['userfile'] == ""){
              $config = array(
                    'admin/bangunan' => 
                    array(
                      array(
                              'type' => 'textarea',
                              'name' => 'descriptor',
                              'class' => 'form-control',
                              'value' => set_value('descriptor'),
                              'rules' => 'trim|required'
                           )));
               $detail = $this->cat_form->validator($config,false,true);
               $var = array('table' => 'expertise_building_id', 
                         'condition' => 'id = '.$id.''
                        );
              // var_dump($var);
              $this->cat_model->update($var,$detail);
              echo '<script>window.location.href = "'.base_url('admin/bangunan').'"</script>'; 
            }else{
              $var = array('table' => 'expertise_building_id', 
                         'condition' => 'id = '.$id.''
                        );
              // var_dump($var);
              $this->cat_model->update($var,$detail);
              echo '<script>window.location.href = "'.base_url('admin/bangunan').'"</script>';  
            }
            
        }
       
       
    }

    public function building()
    {
        $this->cat_login->is_login();

        $catalyst['header'] = 'admin-main-header';
        $catalyst['label'] = $this->_admin;
        $catalyst['themes'] = "building";
        $catalyst['processor'] = null;
        $catalyst['footer'] = null; 

        $catalyst = $this->catalyst->enables('morris,flot,table',$catalyst);

        $data['raw_building'] = $this->cat_model->getall('expertise_building');

        $this->catalyst->render($catalyst, $data);

    }

    public function edit_building()
    {
        $url = $this->uri->uri_string();
        $url = explode('/',$url);

        $id = $url[count($url)-1];

        $click = $this->input->post('btn-edpre');

        $config = array(
                    'admin/building' => 
                    array(
                      array(
                              'type' => 'textarea',
                              'name' => 'descriptor',
                              'class' => 'form-control',
                              'value' => set_value('descriptor'),
                              'rules' => 'trim|required'
                           ),
                      array(
                              'type' => 'file',
                              'name' => 'userfile',
                              'path' => '/assets/image/expertise/',
                              'allowed' => 'jpg|jpeg|png',
                              'size' => '0',
                              'width' => '4000',
                              'height' => '4000'

                           )                      
                    )
                );

        $detail = $this->cat_form->validator($config,false,true);
        if ( $detail['descriptor'] == ""){
          echo "<script>alert('Please fill description');</script>";
          echo '<script>window.location.href = "'.base_url('admin/building').'"</script>';
        }else{

            if ( $detail['userfile'] == ""){
              $config = array(
                    'admin/building' => 
                    array(
                      array(
                              'type' => 'textarea',
                              'name' => 'descriptor',
                              'class' => 'form-control',
                              'value' => set_value('descriptor'),
                              'rules' => 'trim|required'
                           )));
               $detail = $this->cat_form->validator($config,false,true);
               $var = array('table' => 'expertise_building', 
                         'condition' => 'id = '.$id.''
                        );
            // var_dump($var);
            $this->cat_model->update($var,$detail);
            echo '<script>window.location.href = "'.base_url('admin/building').'"</script>';
            }else{
               $var = array('table' => 'expertise_building', 
                         'condition' => 'id = '.$id.''
                        );
            // var_dump($var);
            $this->cat_model->update($var,$detail);
            echo '<script>window.location.href = "'.base_url('admin/building').'"</script>';
            }
            
        }


       
       
    }

    public function sipil()
    {
        $this->cat_login->is_login();

        $catalyst['header'] = 'admin-main-header';
        $catalyst['label'] = $this->_admin;
        $catalyst['themes'] = "sipil";
        $catalyst['processor'] = null;
        $catalyst['footer'] = null; 

        $catalyst = $this->catalyst->enables('morris,flot,table',$catalyst);

        $data['raw_sipil'] = $this->cat_model->getall('expertise_civil_id');

        $this->catalyst->render($catalyst, $data);

    }

    public function edit_sipil()
    {
        $url = $this->uri->uri_string();
        $url = explode('/',$url);

        $id = $url[count($url)-1];

        $click = $this->input->post('btn-edpre');

        $config = array(
                    'admin/sipil' => 
                    array(
                      array(
                              'type' => 'textarea',
                              'name' => 'descriptor',
                              'class' => 'form-control',
                              'value' => set_value('descriptor'),
                              'rules' => 'trim|required'
                           ),
                      array(
                              'type' => 'file',
                              'name' => 'userfile',
                              'path' => '/assets/image/expertise/',
                              'allowed' => 'jpg|jpeg|png',
                              'size' => '0',
                              'width' => '4000',
                              'height' => '4000'

                           )                      
                    )
                );

        $detail = $this->cat_form->validator($config,false,true);     
        if ( $detail['descriptor'] == "" ){
          echo "<script>alert('Please fill description');</script>";
          echo '<script>window.location.href = "'.base_url('admin/sipil').'"</script>';
        }else{
            if ( $detail['userfile'] == "" ){
              $config = array(
                    'admin/sipil' => 
                    array(
                      array(
                              'type' => 'textarea',
                              'name' => 'descriptor',
                              'class' => 'form-control',
                              'value' => set_value('descriptor'),
                              'rules' => 'trim|required'
                           )));
            }

          $detail = $this->cat_form->validator($config,false,true);     
          $var = array('table' => 'expertise_civil_id', 
                         'condition' => 'id = '.$id.''
                        );
          // var_dump($var);
          $this->cat_model->update($var,$detail);
          echo '<script>window.location.href = "'.base_url('admin/sipil').'"</script>';
        }
       
    }

    public function civil()
    {
        $this->cat_login->is_login();

        $catalyst['header'] = 'admin-main-header';
        $catalyst['label'] = $this->_admin;
        $catalyst['themes'] = "civil";
        $catalyst['processor'] = null;
        $catalyst['footer'] = null; 

        $catalyst = $this->catalyst->enables('morris,flot,table',$catalyst);

        $data['raw_civil'] = $this->cat_model->getall('expertise_civil');

        $this->catalyst->render($catalyst, $data);

    }

    public function edit_civil()
    {
        $url = $this->uri->uri_string();
        $url = explode('/',$url);

        $id = $url[count($url)-1];

        $click = $this->input->post('btn-edpre');

        $config = array(
                    'admin/civil' => 
                    array(
                      array(
                              'type' => 'textarea',
                              'name' => 'descriptor',
                              'class' => 'form-control',
                              'value' => set_value('descriptor'),
                              'rules' => 'trim|required'
                           ),
                      array(
                              'type' => 'file',
                              'name' => 'userfile',
                              'path' => '/assets/image/expertise/',
                              'allowed' => 'jpg|jpeg|png',
                              'size' => '0',
                              'width' => '4000',
                              'height' => '4000'

                           )                      
                    )
                );

        $detail = $this->cat_form->validator($config,false,true);
        if ( $detail['descriptor'] == "" ){
          echo "<script>alert('Please fill description');</script>";
          echo '<script>window.location.href = "'.base_url('admin/civil').'"</script>';
        }else{
            if ( $detail['userfile'] == "" ){
              $config = array(
                    'admin/civil' => 
                    array(
                      array(
                              'type' => 'textarea',
                              'name' => 'descriptor',
                              'class' => 'form-control',
                              'value' => set_value('descriptor'),
                              'rules' => 'trim|required'
                           )));
            }

          $detail = $this->cat_form->validator($config,false,true);     
          $var = array('table' => 'expertise_civil', 
                         'condition' => 'id = '.$id.''
                        );
            // var_dump($var);
          $this->cat_model->update($var,$detail);
          echo '<script>window.location.href = "'.base_url('admin/civil').'"</script>';
        }
       
       
    }

    public function mep_id()
    {
        $this->cat_login->is_login();

        $catalyst['header'] = 'admin-main-header';
        $catalyst['label'] = $this->_admin;
        $catalyst['themes'] = "mep_id";
        $catalyst['processor'] = null;
        $catalyst['footer'] = null; 

        $catalyst = $this->catalyst->enables('morris,flot,table',$catalyst);

        $data['raw_mep_id'] = $this->cat_model->getall('expertise_mep_id');

        $this->catalyst->render($catalyst, $data);

    }

    public function edit_mep_id()
    {
        $url = $this->uri->uri_string();
        $url = explode('/',$url);

        $id = $url[count($url)-1];

        $click = $this->input->post('btn-edpre');

        $config = array(
                    'admin/mep_id' => 
                    array(
                      array(
                              'type' => 'textarea',
                              'name' => 'descriptor',
                              'class' => 'form-control',
                              'value' => set_value('descriptor'),
                              'rules' => 'trim|required'
                           ),
                      array(
                              'type' => 'file',
                              'name' => 'userfile',
                              'path' => '/assets/image/expertise/',
                              'allowed' => 'jpg|jpeg|png',
                              'size' => '0',
                              'width' => '4000',
                              'height' => '4000'

                           )                      
                    )
                );

        $detail = $this->cat_form->validator($config,false,true);
        if ( $detail['descriptor'] == "" ){
          echo "<script>alert('Please fill description');</script>";
          echo '<script>window.location.href = "'.base_url('admin/mep_id').'"</script>';
        }else{
          if ( $detail['userfile'] == "" ){
            $config = array(
                    'admin/mep_id' => 
                    array(
                      array(
                              'type' => 'textarea',
                              'name' => 'descriptor',
                              'class' => 'form-control',
                              'value' => set_value('descriptor'),
                              'rules' => 'trim|required'
                           )));
          }
           $detail = $this->cat_form->validator($config,false,true);
          $var = array('table' => 'expertise_mep_id', 
                         'condition' => 'id = '.$id.''
                        );
          // var_dump($var);
          $this->cat_model->update($var,$detail);
          echo '<script>window.location.href = "'.base_url('admin/mep_id').'"</script>';
        }
        
       
    }

    public function mep_en()
    {
        $this->cat_login->is_login();

        $catalyst['header'] = 'admin-main-header';
        $catalyst['label'] = $this->_admin;
        $catalyst['themes'] = "mep_en";
        $catalyst['processor'] = null;
        $catalyst['footer'] = null; 

        $catalyst = $this->catalyst->enables('morris,flot,table',$catalyst);

        $data['raw_mep_en'] = $this->cat_model->getall('expertise_mep');

        $this->catalyst->render($catalyst, $data);

    }

    public function edit_mep_en()
    {
        $url = $this->uri->uri_string();
        $url = explode('/',$url);

        $id = $url[count($url)-1];

        $click = $this->input->post('btn-edpre');

        $config = array(
                    'admin/mep_en' => 
                    array(
                      array(
                              'type' => 'textarea',
                              'name' => 'descriptor',
                              'class' => 'form-control',
                              'value' => set_value('descriptor'),
                              'rules' => 'trim|required'
                           ),
                      array(
                              'type' => 'file',
                              'name' => 'userfile',
                              'path' => '/assets/image/expertise/',
                              'allowed' => 'jpg|jpeg|png',
                              'size' => '0',
                              'width' => '4000',
                              'height' => '4000'

                           )                      
                    )
                );

        $detail = $this->cat_form->validator($config,false,true);
         if ( $detail['descriptor'] == "" ){
          echo "<script>alert('Please fill description');</script>";
          echo '<script>window.location.href = "'.base_url('admin/mep_en').'"</script>';
        }else{
          if ( $detail['userfile'] == "" ){
            $config = array(
                    'admin/mep_en' => 
                    array(
                      array(
                              'type' => 'textarea',
                              'name' => 'descriptor',
                              'class' => 'form-control',
                              'value' => set_value('descriptor'),
                              'rules' => 'trim|required'
                           )));
          }
          $detail = $this->cat_form->validator($config,false,true);
            $var = array('table' => 'expertise_mep', 
                         'condition' => 'id = '.$id.''
                        );
            // var_dump($var);
            $this->cat_model->update($var,$detail);
            echo '<script>window.location.href = "'.base_url('admin/mep_en').'"</script>';
        }

        
       
    }

//PROJECTS PROJECTS PROJECTS PROJECTS PROJECTS

    public function fondasi_proyek()
    {
        $this->cat_login->is_login();

        $catalyst['header'] = 'admin-main-header';
        $catalyst['label'] = $this->_admin;
        $catalyst['themes'] = "fondasi_proyek";
        $catalyst['processor'] = null;
        $catalyst['footer'] = null; 

        $catalyst = $this->catalyst->enables('morris,flot,table',$catalyst);

        $var = array('table' => 'projects_foundation',
                             'condition' => 'active = "1" order by year desc',
                            );

        $data['raw_fondasi_proyek'] = $this->cat_model->get_allcondition($var);

        $this->catalyst->render($catalyst, $data);

    }

     public function edit_fondasi_proyek()
    {
        $url = $this->uri->uri_string();
        $url = explode('/',$url);

        $id = $url[count($url)-1];

        $click = $this->input->post('btn-edpre');

        $config = array(
                    'admin/fondasi_proyek' => 
                    array(
                      array(
                              'type' => 'text',
                              'name' => 'name',
                              'class' => 'form-control',
                              'value' => set_value('name'),
                              'rules' => 'trim|required'
                           ),
                      array(
                              'type' => 'text',
                              'name' => 'location',
                              'class' => 'form-control',
                              'value' => set_value('location'),
                              'rules' => 'trim|required'
                           ),
                      array(
                              'type' => 'text',
                              'name' => 'year',
                              'class' => 'form-control',
                              'value' => set_value('year'),
                              'rules' => 'trim|required'
                           ),
                      array(
                              'type' => 'text',
                              'name' => 'client',
                              'class' => 'form-control',
                              'value' => set_value('client'),
                              'rules' => 'trim|required'
                           ),
                      array(
                              'type' => 'file',
                              'name' => 'userfile',
                              'path' => '/assets/image/projects/foundation/',
                              'allowed' => 'jpg|jpeg|png',
                              'size' => '0',
                              'width' => '4000',
                              'height' => '4000'

                           )                      
                    )
                );

        $detail = $this->cat_form->validator($config,false,true);

        $var = array('table' => 'projects_foundation', 
                         'condition' => 'id = '.$id.''
                        );
            // var_dump($var);
            $this->cat_model->update($var,$detail);
            echo '<script>window.location.href = "'.base_url('admin/fondasi_proyek').'"</script>';
       
    }

    public function add_fondasi_proyek()
    {
       $config = array(
                    'admin/fondasi_proyek' => 
                    array(
                      array(
                              'type' => 'text',
                              'name' => 'name',
                              'class' => 'form-control',
                              'value' => set_value('name'),
                              'rules' => 'trim|required'
                           ),
                      array(
                              'type' => 'text',
                              'name' => 'location',
                              'class' => 'form-control',
                              'value' => set_value('location'),
                              'rules' => 'trim|required'
                           ),
                      array(
                              'type' => 'text',
                              'name' => 'year',
                              'class' => 'form-control',
                              'value' => set_value('year'),
                              'rules' => 'trim|required'
                           ),
                      array(
                              'type' => 'text',
                              'name' => 'client',
                              'class' => 'form-control',
                              'value' => set_value('client'),
                              'rules' => 'trim|required'
                           ),
                      array(
                              'type' => 'file',
                              'name' => 'userfile',
                              'path' => '/assets/image/projects/foundation/',
                              'allowed' => 'jpg|jpeg|png',
                              'size' => '0',
                              'width' => '4000',
                              'height' => '4000'

                           ),
                      array(
                              'type' => 'text',
                              'name' => 'active',
                              'class' => 'form-control',
                              'value' => '1'
                           ),              
                    )
                );

            $detail = $this->cat_form->validator($config,false,true);
            $this->cat_model->insert('projects_foundation',$detail);
            echo '<script>window.location.href = "'.base_url('admin/fondasi_proyek').'"</script>';
    }

    public function delete_fondasi_proyek()
    {
        $url = $this->uri->uri_string();
        $url = explode('/',$url);

        $id = $url[count($url)-1];

        $this->db->delete('projects_foundation', array('id' => $id)); 
        echo '<script>window.location.href = "'.base_url('admin/fondasi_proyek').'"</script>';
    }

    public function perkantoran()
    {
        $this->cat_login->is_login();

        $catalyst['header'] = 'admin-main-header';
        $catalyst['label'] = $this->_admin;
        $catalyst['themes'] = "perkantoran";
        $catalyst['processor'] = null;
        $catalyst['footer'] = null; 

        $catalyst = $this->catalyst->enables('morris,flot,table',$catalyst);

        $var = array('table' => 'projects_structure_perkantoran',
                             'condition' => 'active = "1" order by year desc',
                            );

        $data['raw_perkantoran'] = $this->cat_model->get_allcondition($var);

        $this->catalyst->render($catalyst, $data);

    }

     public function edit_perkantoran()
    {
        $url = $this->uri->uri_string();
        $url = explode('/',$url);

        $id = $url[count($url)-1];

        $click = $this->input->post('btn-edpre');

        $config = array(
                    'admin/perkantoran' => 
                    array(
                      array(
                              'type' => 'text',
                              'name' => 'name',
                              'class' => 'form-control',
                              'value' => set_value('name'),
                              'rules' => 'trim|required'
                           ),
                      array(
                              'type' => 'text',
                              'name' => 'location',
                              'class' => 'form-control',
                              'value' => set_value('location'),
                              'rules' => 'trim|required'
                           ),
                      array(
                              'type' => 'text',
                              'name' => 'year',
                              'class' => 'form-control',
                              'value' => set_value('year'),
                              'rules' => 'trim|required'
                           ),
                      array(
                              'type' => 'text',
                              'name' => 'client',
                              'class' => 'form-control',
                              'value' => set_value('client'),
                              'rules' => 'trim|required'
                           ),
                      array(
                              'type' => 'file',
                              'name' => 'userfile',
                              'path' => '/assets/image/projects/structure/',
                              'allowed' => 'jpg|jpeg|png',
                              'size' => '0',
                              'width' => '4000',
                              'height' => '4000'

                           )                      
                    )
                );

        $detail = $this->cat_form->validator($config,false,true);
        if ( $detail['userfile'] == "" ){
          $config = array(
                    'admin/perkantoran' => 
                    array(
                      array(
                              'type' => 'text',
                              'name' => 'name',
                              'class' => 'form-control',
                              'value' => set_value('name'),
                              'rules' => 'trim|required'
                           ),
                      array(
                              'type' => 'text',
                              'name' => 'location',
                              'class' => 'form-control',
                              'value' => set_value('location'),
                              'rules' => 'trim|required'
                           ),
                      array(
                              'type' => 'text',
                              'name' => 'year',
                              'class' => 'form-control',
                              'value' => set_value('year'),
                              'rules' => 'trim|required'
                           ),
                      array(
                              'type' => 'text',
                              'name' => 'client',
                              'class' => 'form-control',
                              'value' => set_value('client'),
                              'rules' => 'trim|required'
                           )));
           $detail = $this->cat_form->validator($config,false,true);
        }
       
        $var = array('table' => 'projects_structure_perkantoran', 
                         'condition' => 'id = '.$id.''
                        );
            // var_dump($var);
            $this->cat_model->update($var,$detail);
            echo '<script>window.location.href = "'.base_url('admin/perkantoran').'"</script>';
       
    }

    public function add_perkantoran()
    {
       $config = array(
                    'admin/perkantoran' => 
                    array(
                      array(
                              'type' => 'text',
                              'name' => 'name',
                              'class' => 'form-control',
                              'value' => set_value('name'),
                              'rules' => 'trim|required'
                           ),
                      array(
                              'type' => 'text',
                              'name' => 'location',
                              'class' => 'form-control',
                              'value' => set_value('location'),
                              'rules' => 'trim|required'
                           ),
                      array(
                              'type' => 'text',
                              'name' => 'year',
                              'class' => 'form-control',
                              'value' => set_value('year'),
                              'rules' => 'trim|required'
                           ),
                      array(
                              'type' => 'text',
                              'name' => 'client',
                              'class' => 'form-control',
                              'value' => set_value('client'),
                              'rules' => 'trim|required'
                           ),
                      array(
                              'type' => 'file',
                              'name' => 'userfile',
                              'path' => '/assets/image/projects/structure/',
                              'allowed' => 'jpg|jpeg|png',
                              'size' => '0',
                              'width' => '4000',
                              'height' => '4000'

                           ),
                      array(
                              'type' => 'text',
                              'name' => 'active',
                              'class' => 'form-control',
                              'value' => '1'
                           ),              
                    )
                );

            $detail = $this->cat_form->validator($config,false,true);
            $this->cat_model->insert('projects_structure_perkantoran',$detail);
            echo '<script>window.location.href = "'.base_url('admin/perkantoran').'"</script>';
    }

    public function delete_perkantoran()
    {
        $url = $this->uri->uri_string();
        $url = explode('/',$url);

        $id = $url[count($url)-1];

        $this->db->delete('projects_structure_perkantoran', array('id' => $id)); 
        echo '<script>window.location.href = "'.base_url('admin/perkantoran').'"</script>';
    }

    public function perbelanjaan()
    {
        $this->cat_login->is_login();

        $catalyst['header'] = 'admin-main-header';
        $catalyst['label'] = $this->_admin;
        $catalyst['themes'] = "perbelanjaan";
        $catalyst['processor'] = null;
        $catalyst['footer'] = null; 

        $catalyst = $this->catalyst->enables('morris,flot,table',$catalyst);

        $var = array('table' => 'projects_structure_perbelanjaan',
                             'condition' => 'active = "1" order by year desc',
                            );

        $data['raw_perbelanjaan'] = $this->cat_model->get_allcondition($var);

        $this->catalyst->render($catalyst, $data);

    }

     public function edit_perbelanjaan()
    {
        $url = $this->uri->uri_string();
        $url = explode('/',$url);

        $id = $url[count($url)-1];

        $click = $this->input->post('btn-edpre');

        $config = array(
                    'admin/perbelanjaan' => 
                    array(
                      array(
                              'type' => 'text',
                              'name' => 'name',
                              'class' => 'form-control',
                              'value' => set_value('name'),
                              'rules' => 'trim|required'
                           ),
                      array(
                              'type' => 'text',
                              'name' => 'location',
                              'class' => 'form-control',
                              'value' => set_value('location'),
                              'rules' => 'trim|required'
                           ),
                      array(
                              'type' => 'text',
                              'name' => 'year',
                              'class' => 'form-control',
                              'value' => set_value('year'),
                              'rules' => 'trim|required'
                           ),
                      array(
                              'type' => 'text',
                              'name' => 'client',
                              'class' => 'form-control',
                              'value' => set_value('client'),
                              'rules' => 'trim|required'
                           ),
                      array(
                              'type' => 'file',
                              'name' => 'userfile',
                              'path' => '/assets/image/projects/structure/',
                              'allowed' => 'jpg|jpeg|png',
                              'size' => '0',
                              'width' => '4000',
                              'height' => '4000'

                           )                      
                    )
                );

        $detail = $this->cat_form->validator($config,false,true);
        if ( $detail['userfile'] == "" ){
           $config = array(
                    'admin/perbelanjaan' => 
                    array(
                      array(
                              'type' => 'text',
                              'name' => 'name',
                              'class' => 'form-control',
                              'value' => set_value('name'),
                              'rules' => 'trim|required'
                           ),
                      array(
                              'type' => 'text',
                              'name' => 'location',
                              'class' => 'form-control',
                              'value' => set_value('location'),
                              'rules' => 'trim|required'
                           ),
                      array(
                              'type' => 'text',
                              'name' => 'year',
                              'class' => 'form-control',
                              'value' => set_value('year'),
                              'rules' => 'trim|required'
                           ),
                      array(
                              'type' => 'text',
                              'name' => 'client',
                              'class' => 'form-control',
                              'value' => set_value('client'),
                              'rules' => 'trim|required'
                           )));
           $detail = $this->cat_form->validator($config,false,true);
        }
        $var = array('table' => 'projects_structure_perbelanjaan', 
                         'condition' => 'id = '.$id.''
                        );
            // var_dump($var);
            $this->cat_model->update($var,$detail);
            echo '<script>window.location.href = "'.base_url('admin/perbelanjaan').'"</script>';
       
    }

    public function add_perbelanjaan()
    {
       $config = array(
                    'admin/perbelanjaan' => 
                    array(
                      array(
                              'type' => 'text',
                              'name' => 'name',
                              'class' => 'form-control',
                              'value' => set_value('name'),
                              'rules' => 'trim|required'
                           ),
                      array(
                              'type' => 'text',
                              'name' => 'location',
                              'class' => 'form-control',
                              'value' => set_value('location'),
                              'rules' => 'trim|required'
                           ),
                      array(
                              'type' => 'text',
                              'name' => 'year',
                              'class' => 'form-control',
                              'value' => set_value('year'),
                              'rules' => 'trim|required'
                           ),
                      array(
                              'type' => 'text',
                              'name' => 'client',
                              'class' => 'form-control',
                              'value' => set_value('client'),
                              'rules' => 'trim|required'
                           ),
                      array(
                              'type' => 'file',
                              'name' => 'userfile',
                              'path' => '/assets/image/projects/structure/',
                              'allowed' => 'jpg|jpeg|png',
                              'size' => '0',
                              'width' => '4000',
                              'height' => '4000'

                           ),
                      array(
                              'type' => 'text',
                              'name' => 'active',
                              'class' => 'form-control',
                              'value' => '1'
                           ),              
                    )
                );

            $detail = $this->cat_form->validator($config,false,true);
            $this->cat_model->insert('projects_structure_perbelanjaan',$detail);
            echo '<script>window.location.href = "'.base_url('admin/perbelanjaan').'"</script>';
    }

    public function delete_perbelanjaan()
    {
        $url = $this->uri->uri_string();
        $url = explode('/',$url);

        $id = $url[count($url)-1];

        $this->db->delete('projects_structure_perbelanjaan', array('id' => $id)); 
        echo '<script>window.location.href = "'.base_url('admin/perbelanjaan').'"</script>';
    }

    public function hotel()
    {
        $this->cat_login->is_login();

        $catalyst['header'] = 'admin-main-header';
        $catalyst['label'] = $this->_admin;
        $catalyst['themes'] = "hotel";
        $catalyst['processor'] = null;
        $catalyst['footer'] = null; 

        $catalyst = $this->catalyst->enables('morris,flot,table',$catalyst);

        $var = array('table' => 'projects_structure_hotel',
                             'condition' => 'active = "1" order by year desc',
                            );

        $data['raw_hotel'] = $this->cat_model->get_allcondition($var);

        $this->catalyst->render($catalyst, $data);

    }

     public function edit_hotel()
    {
        $url = $this->uri->uri_string();
        $url = explode('/',$url);

        $id = $url[count($url)-1];

        $click = $this->input->post('btn-edpre');

        $config = array(
                    'admin/hotel' => 
                    array(
                      array(
                              'type' => 'text',
                              'name' => 'name',
                              'class' => 'form-control',
                              'value' => set_value('name'),
                              'rules' => 'trim|required'
                           ),
                      array(
                              'type' => 'text',
                              'name' => 'location',
                              'class' => 'form-control',
                              'value' => set_value('location'),
                              'rules' => 'trim|required'
                           ),
                      array(
                              'type' => 'text',
                              'name' => 'year',
                              'class' => 'form-control',
                              'value' => set_value('year'),
                              'rules' => 'trim|required'
                           ),
                      array(
                              'type' => 'text',
                              'name' => 'client',
                              'class' => 'form-control',
                              'value' => set_value('client'),
                              'rules' => 'trim|required'
                           ),
                      array(
                              'type' => 'file',
                              'name' => 'userfile',
                              'path' => '/assets/image/projects/structure/',
                              'allowed' => 'jpg|jpeg|png',
                              'size' => '0',
                              'width' => '4000',
                              'height' => '4000'

                           )                      
                    )
                );

        $detail = $this->cat_form->validator($config,false,true);
        if ( $detail['userfile'] == "" ){
          $config = array(
                    'admin/hotel' => 
                    array(
                      array(
                              'type' => 'text',
                              'name' => 'name',
                              'class' => 'form-control',
                              'value' => set_value('name'),
                              'rules' => 'trim|required'
                           ),
                      array(
                              'type' => 'text',
                              'name' => 'location',
                              'class' => 'form-control',
                              'value' => set_value('location'),
                              'rules' => 'trim|required'
                           ),
                      array(
                              'type' => 'text',
                              'name' => 'year',
                              'class' => 'form-control',
                              'value' => set_value('year'),
                              'rules' => 'trim|required'
                           ),
                      array(
                              'type' => 'text',
                              'name' => 'client',
                              'class' => 'form-control',
                              'value' => set_value('client'),
                              'rules' => 'trim|required'
                           )));
          $detail = $this->cat_form->validator($config,false,true);
        }

        $var = array('table' => 'projects_structure_hotel', 
                         'condition' => 'id = '.$id.''
                        );
            // var_dump($var);
            $this->cat_model->update($var,$detail);
            echo '<script>window.location.href = "'.base_url('admin/hotel').'"</script>';
       
    }

    public function add_hotel()
    {
       $config = array(
                    'admin/hotel' => 
                    array(
                      array(
                              'type' => 'text',
                              'name' => 'name',
                              'class' => 'form-control',
                              'value' => set_value('name'),
                              'rules' => 'trim|required'
                           ),
                      array(
                              'type' => 'text',
                              'name' => 'location',
                              'class' => 'form-control',
                              'value' => set_value('location'),
                              'rules' => 'trim|required'
                           ),
                      array(
                              'type' => 'text',
                              'name' => 'year',
                              'class' => 'form-control',
                              'value' => set_value('year'),
                              'rules' => 'trim|required'
                           ),
                      array(
                              'type' => 'text',
                              'name' => 'client',
                              'class' => 'form-control',
                              'value' => set_value('client'),
                              'rules' => 'trim|required'
                           ),
                      array(
                              'type' => 'file',
                              'name' => 'userfile',
                              'path' => '/assets/image/projects/structure/',
                              'allowed' => 'jpg|jpeg|png',
                              'size' => '0',
                              'width' => '4000',
                              'height' => '4000'

                           ),
                      array(
                              'type' => 'text',
                              'name' => 'active',
                              'class' => 'form-control',
                              'value' => '1'
                           ),              
                    )
                );

            $detail = $this->cat_form->validator($config,false,true);
            $this->cat_model->insert('projects_structure_hotel',$detail);
            echo '<script>window.location.href = "'.base_url('admin/hotel').'"</script>';
    }

    public function delete_hotel()
    {
        $url = $this->uri->uri_string();
        $url = explode('/',$url);

        $id = $url[count($url)-1];

        $this->db->delete('projects_structure_hotel', array('id' => $id)); 
        echo '<script>window.location.href = "'.base_url('admin/hotel').'"</script>';
    }

    public function industri()
    {
        $this->cat_login->is_login();

        $catalyst['header'] = 'admin-main-header';
        $catalyst['label'] = $this->_admin;
        $catalyst['themes'] = "industri";
        $catalyst['processor'] = null;
        $catalyst['footer'] = null; 

        $catalyst = $this->catalyst->enables('morris,flot,table',$catalyst);

        $var = array('table' => 'projects_structure_industri',
                             'condition' => 'active = "1" order by year desc',
                            );

        $data['raw_industri'] = $this->cat_model->get_allcondition($var);

        $this->catalyst->render($catalyst, $data);

    }

     public function edit_industri()
    {
        $url = $this->uri->uri_string();
        $url = explode('/',$url);

        $id = $url[count($url)-1];

        $click = $this->input->post('btn-edpre');

        $config = array(
                    'admin/industri' => 
                    array(
                      array(
                              'type' => 'text',
                              'name' => 'name',
                              'class' => 'form-control',
                              'value' => set_value('name'),
                              'rules' => 'trim|required'
                           ),
                      array(
                              'type' => 'text',
                              'name' => 'location',
                              'class' => 'form-control',
                              'value' => set_value('location'),
                              'rules' => 'trim|required'
                           ),
                      array(
                              'type' => 'text',
                              'name' => 'year',
                              'class' => 'form-control',
                              'value' => set_value('year'),
                              'rules' => 'trim|required'
                           ),
                      array(
                              'type' => 'text',
                              'name' => 'client',
                              'class' => 'form-control',
                              'value' => set_value('client'),
                              'rules' => 'trim|required'
                           ),
                      array(
                              'type' => 'file',
                              'name' => 'userfile',
                              'path' => '/assets/image/projects/structure/',
                              'allowed' => 'jpg|jpeg|png',
                              'size' => '0',
                              'width' => '4000',
                              'height' => '4000'

                           )                      
                    )
                );

        $detail = $this->cat_form->validator($config,false,true);
        if ( $detail['userfile'] == "" ){
          $config = array(
          'admin/industri' => 
          array(
            array(
                    'type' => 'text',
                    'name' => 'name',
                    'class' => 'form-control',
                    'value' => set_value('name'),
                    'rules' => 'trim|required'
                 ),
            array(
                    'type' => 'text',
                    'name' => 'location',
                    'class' => 'form-control',
                    'value' => set_value('location'),
                    'rules' => 'trim|required'
                 ),
            array(
                    'type' => 'text',
                    'name' => 'year',
                    'class' => 'form-control',
                    'value' => set_value('year'),
                    'rules' => 'trim|required'
                 ),
            array(
                    'type' => 'text',
                    'name' => 'client',
                    'class' => 'form-control',
                    'value' => set_value('client'),
                    'rules' => 'trim|required'
           )));
           $detail = $this->cat_form->validator($config,false,true);
        }
        $var = array('table' => 'projects_structure_industri', 
                         'condition' => 'id = '.$id.''
                        );
            // var_dump($var);
            $this->cat_model->update($var,$detail);
            echo '<script>window.location.href = "'.base_url('admin/industri').'"</script>';
       
    }

    public function add_industri()
    {
       $config = array(
                    'admin/industri' => 
                    array(
                      array(
                              'type' => 'text',
                              'name' => 'name',
                              'class' => 'form-control',
                              'value' => set_value('name'),
                              'rules' => 'trim|required'
                           ),
                      array(
                              'type' => 'text',
                              'name' => 'location',
                              'class' => 'form-control',
                              'value' => set_value('location'),
                              'rules' => 'trim|required'
                           ),
                      array(
                              'type' => 'text',
                              'name' => 'year',
                              'class' => 'form-control',
                              'value' => set_value('year'),
                              'rules' => 'trim|required'
                           ),
                      array(
                              'type' => 'text',
                              'name' => 'client',
                              'class' => 'form-control',
                              'value' => set_value('client'),
                              'rules' => 'trim|required'
                           ),
                      array(
                              'type' => 'file',
                              'name' => 'userfile',
                              'path' => '/assets/image/projects/structure/',
                              'allowed' => 'jpg|jpeg|png',
                              'size' => '0',
                              'width' => '4000',
                              'height' => '4000'

                           ),
                      array(
                              'type' => 'text',
                              'name' => 'active',
                              'class' => 'form-control',
                              'value' => '1'
                           ),              
                    )
                );

            $detail = $this->cat_form->validator($config,false,true);
            $this->cat_model->insert('projects_structure_industri',$detail);
            echo '<script>window.location.href = "'.base_url('admin/industri').'"</script>';
    }

    public function delete_industri()
    {
        $url = $this->uri->uri_string();
        $url = explode('/',$url);

        $id = $url[count($url)-1];

        $this->db->delete('projects_structure_industri', array('id' => $id)); 
        echo '<script>window.location.href = "'.base_url('admin/industri').'"</script>';
    }

    public function lainlain()
    {
        $this->cat_login->is_login();

        $catalyst['header'] = 'admin-main-header';
        $catalyst['label'] = $this->_admin;
        $catalyst['themes'] = "lainlain";
        $catalyst['processor'] = null;
        $catalyst['footer'] = null; 

        $catalyst = $this->catalyst->enables('morris,flot,table',$catalyst);

        $var = array('table' => 'projects_structure_fasilitas',
                             'condition' => 'active = "1" order by year desc',
                            );

        $data['raw_lainlain'] = $this->cat_model->get_allcondition($var);

        $this->catalyst->render($catalyst, $data);

    }

     public function edit_lainlain()
    {
        $url = $this->uri->uri_string();
        $url = explode('/',$url);

        $id = $url[count($url)-1];

        $click = $this->input->post('btn-edpre');

        $config = array(
            'admin/lainlain' => 
            array(
              array(
                      'type' => 'text',
                      'name' => 'name',
                      'class' => 'form-control',
                      'value' => set_value('name'),
                      'rules' => 'trim|required'
                   ),
              array(
                      'type' => 'text',
                      'name' => 'location',
                      'class' => 'form-control',
                      'value' => set_value('location'),
                      'rules' => 'trim|required'
                   ),
              array(
                      'type' => 'text',
                      'name' => 'year',
                      'class' => 'form-control',
                      'value' => set_value('year'),
                      'rules' => 'trim|required'
                   ),
              array(
                      'type' => 'text',
                      'name' => 'client',
                      'class' => 'form-control',
                      'value' => set_value('client'),
                      'rules' => 'trim|required'
                   ),
              array(
                      'type' => 'file',
                      'name' => 'userfile',
                      'path' => '/assets/image/projects/structure/',
                      'allowed' => 'jpg|jpeg|png',
                      'size' => '0',
                      'width' => '4000',
                      'height' => '4000'

                   )                      
            )
        );

        $detail = $this->cat_form->validator($config,false,true);
        if ( $detail['userfile'] == "" ){
          $config = array(
            'admin/lainlain' => 
            array(
              array(
                      'type' => 'text',
                      'name' => 'name',
                      'class' => 'form-control',
                      'value' => set_value('name'),
                      'rules' => 'trim|required'
                   ),
              array(
                      'type' => 'text',
                      'name' => 'location',
                      'class' => 'form-control',
                      'value' => set_value('location'),
                      'rules' => 'trim|required'
                   ),
              array(
                      'type' => 'text',
                      'name' => 'year',
                      'class' => 'form-control',
                      'value' => set_value('year'),
                      'rules' => 'trim|required'
                   ),
              array(
                      'type' => 'text',
                      'name' => 'client',
                      'class' => 'form-control',
                      'value' => set_value('client'),
                      'rules' => 'trim|required'
                   )));
          $detail = $this->cat_form->validator($config,false,true);
        }
        $var = array('table' => 'projects_structure_fasilitas', 
                         'condition' => 'id = '.$id.''
                        );
            // var_dump($var);
            $this->cat_model->update($var,$detail);
            echo '<script>window.location.href = "'.base_url('admin/lainlain').'"</script>';
       
    }

    public function add_lainlain()
    {
       $config = array(
                    'admin/lainlain' => 
                    array(
                      array(
                              'type' => 'text',
                              'name' => 'name',
                              'class' => 'form-control',
                              'value' => set_value('name'),
                              'rules' => 'trim|required'
                           ),
                      array(
                              'type' => 'text',
                              'name' => 'location',
                              'class' => 'form-control',
                              'value' => set_value('location'),
                              'rules' => 'trim|required'
                           ),
                      array(
                              'type' => 'text',
                              'name' => 'year',
                              'class' => 'form-control',
                              'value' => set_value('year'),
                              'rules' => 'trim|required'
                           ),
                      array(
                              'type' => 'text',
                              'name' => 'client',
                              'class' => 'form-control',
                              'value' => set_value('client'),
                              'rules' => 'trim|required'
                           ),
                      array(
                              'type' => 'file',
                              'name' => 'userfile',
                              'path' => '/assets/image/projects/structure/',
                              'allowed' => 'jpg|jpeg|png',
                              'size' => '0',
                              'width' => '4000',
                              'height' => '4000'

                           ),
                      array(
                              'type' => 'text',
                              'name' => 'active',
                              'class' => 'form-control',
                              'value' => '1'
                           ),              
                    )
                );

            $detail = $this->cat_form->validator($config,false,true);
            $this->cat_model->insert('projects_structure_fasilitas',$detail);
            echo '<script>window.location.href = "'.base_url('admin/lainlain').'"</script>';
    }

    public function delete_lainlain()
    {
        $url = $this->uri->uri_string();
        $url = explode('/',$url);

        $id = $url[count($url)-1];

        $this->db->delete('projects_structure_fasilitas', array('id' => $id)); 
        echo '<script>window.location.href = "'.base_url('admin/lainlain').'"</script>';
    }

    public function silo()
    {
        $this->cat_login->is_login();

        $catalyst['header'] = 'admin-main-header';
        $catalyst['label'] = $this->_admin;
        $catalyst['themes'] = "silo";
        $catalyst['processor'] = null;
        $catalyst['footer'] = null; 

        $catalyst = $this->catalyst->enables('morris,flot,table',$catalyst);

        $var = array('table' => 'projects_infrastructure_silo',
                             'condition' => 'active = "1" order by year desc',
                            );

        $data['raw_silo'] = $this->cat_model->get_allcondition($var);

        $this->catalyst->render($catalyst, $data);

    }

     public function edit_silo()
    {
        $url = $this->uri->uri_string();
        $url = explode('/',$url);

        $id = $url[count($url)-1];

        $click = $this->input->post('btn-edpre');

        $config = array(
                    'admin/silo' => 
                    array(
                      array(
                              'type' => 'text',
                              'name' => 'name',
                              'class' => 'form-control',
                              'value' => set_value('name'),
                              'rules' => 'trim|required'
                           ),
                      array(
                              'type' => 'text',
                              'name' => 'location',
                              'class' => 'form-control',
                              'value' => set_value('location'),
                              'rules' => 'trim|required'
                           ),
                      array(
                              'type' => 'text',
                              'name' => 'year',
                              'class' => 'form-control',
                              'value' => set_value('year'),
                              'rules' => 'trim|required'
                           ),
                      array(
                              'type' => 'text',
                              'name' => 'client',
                              'class' => 'form-control',
                              'value' => set_value('client'),
                              'rules' => 'trim|required'
                           ),
                      array(
                              'type' => 'file',
                              'name' => 'userfile',
                              'path' => '/assets/image/projects/infrastructure/',
                              'allowed' => 'jpg|jpeg|png',
                              'size' => '0',
                              'width' => '4000',
                              'height' => '4000'

                           )                      
                    )
                );

        $detail = $this->cat_form->validator($config,false,true);
        if ( $detail['userfile'] == "" ){
            $config = array(
                    'admin/silo' => 
                    array(
                      array(
                              'type' => 'text',
                              'name' => 'name',
                              'class' => 'form-control',
                              'value' => set_value('name'),
                              'rules' => 'trim|required'
                           ),
                      array(
                              'type' => 'text',
                              'name' => 'location',
                              'class' => 'form-control',
                              'value' => set_value('location'),
                              'rules' => 'trim|required'
                           ),
                      array(
                              'type' => 'text',
                              'name' => 'year',
                              'class' => 'form-control',
                              'value' => set_value('year'),
                              'rules' => 'trim|required'
                           ),
                      array(
                              'type' => 'text',
                              'name' => 'client',
                              'class' => 'form-control',
                              'value' => set_value('client'),
                              'rules' => 'trim|required'
                           )));
           $detail = $this->cat_form->validator($config,false,true); 
        }
        $var = array('table' => 'projects_infrastructure_silo', 
                         'condition' => 'id = '.$id.''
                        );
            // var_dump($var);
            $this->cat_model->update($var,$detail);
            echo '<script>window.location.href = "'.base_url('admin/silo').'"</script>';
       
    }

    public function add_silo()
    {
       $config = array(
                    'admin/silo' => 
                    array(
                      array(
                              'type' => 'text',
                              'name' => 'name',
                              'class' => 'form-control',
                              'value' => set_value('name'),
                              'rules' => 'trim|required'
                           ),
                      array(
                              'type' => 'text',
                              'name' => 'location',
                              'class' => 'form-control',
                              'value' => set_value('location'),
                              'rules' => 'trim|required'
                           ),
                      array(
                              'type' => 'text',
                              'name' => 'year',
                              'class' => 'form-control',
                              'value' => set_value('year'),
                              'rules' => 'trim|required'
                           ),
                      array(
                              'type' => 'text',
                              'name' => 'client',
                              'class' => 'form-control',
                              'value' => set_value('client'),
                              'rules' => 'trim|required'
                           ),
                      array(
                              'type' => 'file',
                              'name' => 'userfile',
                              'path' => '/assets/image/projects/infrastructure/',
                              'allowed' => 'jpg|jpeg|png',
                              'size' => '0',
                              'width' => '4000',
                              'height' => '4000'

                           ),
                      array(
                              'type' => 'text',
                              'name' => 'active',
                              'class' => 'form-control',
                              'value' => '1'
                           ),              
                    )
                );

            $detail = $this->cat_form->validator($config,false,true);
            $this->cat_model->insert('projects_infrastructure_silo',$detail);
            echo '<script>window.location.href = "'.base_url('admin/silo').'"</script>';
    }

    public function delete_silo()
    {
        $url = $this->uri->uri_string();
        $url = explode('/',$url);

        $id = $url[count($url)-1];

        $this->db->delete('projects_infrastructure_silo', array('id' => $id)); 
        echo '<script>window.location.href = "'.base_url('admin/silo').'"</script>';
    }

    public function listrik()
    {
        $this->cat_login->is_login();

        $catalyst['header'] = 'admin-main-header';
        $catalyst['label'] = $this->_admin;
        $catalyst['themes'] = "listrik";
        $catalyst['processor'] = null;
        $catalyst['footer'] = null; 

        $catalyst = $this->catalyst->enables('morris,flot,table',$catalyst);

        $var = array('table' => 'projects_infrastructure_listrik',
                             'condition' => 'active = "1" order by year desc',
                            );

        $data['raw_listrik'] = $this->cat_model->get_allcondition($var);

        $this->catalyst->render($catalyst, $data);

    }

     public function edit_listrik()
    {
        $url = $this->uri->uri_string();
        $url = explode('/',$url);

        $id = $url[count($url)-1];

        $click = $this->input->post('btn-edpre');

        $config = array(
                    'admin/listrik' => 
                    array(
                      array(
                              'type' => 'text',
                              'name' => 'name',
                              'class' => 'form-control',
                              'value' => set_value('name'),
                              'rules' => 'trim|required'
                           ),
                      array(
                              'type' => 'text',
                              'name' => 'location',
                              'class' => 'form-control',
                              'value' => set_value('location'),
                              'rules' => 'trim|required'
                           ),
                      array(
                              'type' => 'text',
                              'name' => 'year',
                              'class' => 'form-control',
                              'value' => set_value('year'),
                              'rules' => 'trim|required'
                           ),
                      array(
                              'type' => 'text',
                              'name' => 'client',
                              'class' => 'form-control',
                              'value' => set_value('client'),
                              'rules' => 'trim|required'
                           ),
                      array(
                              'type' => 'file',
                              'name' => 'userfile',
                              'path' => '/assets/image/projects/infrastructure/',
                              'allowed' => 'jpg|jpeg|png',
                              'size' => '0',
                              'width' => '4000',
                              'height' => '4000'

                           )                      
                    )
                );

        $detail = $this->cat_form->validator($config,false,true);
        if ( $detail['userfile'] == "" ){
          $config = array(
                    'admin/listrik' => 
                    array(
                      array(
                              'type' => 'text',
                              'name' => 'name',
                              'class' => 'form-control',
                              'value' => set_value('name'),
                              'rules' => 'trim|required'
                           ),
                      array(
                              'type' => 'text',
                              'name' => 'location',
                              'class' => 'form-control',
                              'value' => set_value('location'),
                              'rules' => 'trim|required'
                           ),
                      array(
                              'type' => 'text',
                              'name' => 'year',
                              'class' => 'form-control',
                              'value' => set_value('year'),
                              'rules' => 'trim|required'
                           ),
                      array(
                              'type' => 'text',
                              'name' => 'client',
                              'class' => 'form-control',
                              'value' => set_value('client'),
                              'rules' => 'trim|required'
                           )));
          $detail = $this->cat_form->validator($config,false,true);
        }
        $var = array('table' => 'projects_infrastructure_listrik', 
                         'condition' => 'id = '.$id.''
                        );
            // var_dump($var);
            $this->cat_model->update($var,$detail);
            echo '<script>window.location.href = "'.base_url('admin/listrik').'"</script>';
       
    }

    public function add_listrik()
    {
       $config = array(
                    'admin/listrik' => 
                    array(
                      array(
                              'type' => 'text',
                              'name' => 'name',
                              'class' => 'form-control',
                              'value' => set_value('name'),
                              'rules' => 'trim|required'
                           ),
                      array(
                              'type' => 'text',
                              'name' => 'location',
                              'class' => 'form-control',
                              'value' => set_value('location'),
                              'rules' => 'trim|required'
                           ),
                      array(
                              'type' => 'text',
                              'name' => 'year',
                              'class' => 'form-control',
                              'value' => set_value('year'),
                              'rules' => 'trim|required'
                           ),
                      array(
                              'type' => 'text',
                              'name' => 'client',
                              'class' => 'form-control',
                              'value' => set_value('client'),
                              'rules' => 'trim|required'
                           ),
                      array(
                              'type' => 'file',
                              'name' => 'userfile',
                              'path' => '/assets/image/projects/infrastructure/',
                              'allowed' => 'jpg|jpeg|png',
                              'size' => '0',
                              'width' => '4000',
                              'height' => '4000'

                           ),
                      array(
                              'type' => 'text',
                              'name' => 'active',
                              'class' => 'form-control',
                              'value' => '1'
                           ),              
                    )
                );

            $detail = $this->cat_form->validator($config,false,true);
            $this->cat_model->insert('projects_infrastructure_listrik',$detail);
            echo '<script>window.location.href = "'.base_url('admin/listrik').'"</script>';
    }

    public function delete_listrik()
    {
        $url = $this->uri->uri_string();
        $url = explode('/',$url);

        $id = $url[count($url)-1];

        $this->db->delete('projects_infrastructure_listrik', array('id' => $id)); 
        echo '<script>window.location.href = "'.base_url('admin/listrik').'"</script>';
    }

    public function tol()
    {
        $this->cat_login->is_login();

        $catalyst['header'] = 'admin-main-header';
        $catalyst['label'] = $this->_admin;
        $catalyst['themes'] = "tol";
        $catalyst['processor'] = null;
        $catalyst['footer'] = null; 

        $catalyst = $this->catalyst->enables('morris,flot,table',$catalyst);

        $var = array('table' => 'projects_infrastructure_tol',
                             'condition' => 'active = "1" order by year desc',
                            );

        $data['raw_tol'] = $this->cat_model->get_allcondition($var);

        $this->catalyst->render($catalyst, $data);

    }

     public function edit_tol()
    {
        $url = $this->uri->uri_string();
        $url = explode('/',$url);

        $id = $url[count($url)-1];

        $click = $this->input->post('btn-edpre');

        $config = array(
                    'admin/tol' => 
                    array(
                      array(
                              'type' => 'text',
                              'name' => 'name',
                              'class' => 'form-control',
                              'value' => set_value('name'),
                              'rules' => 'trim|required'
                           ),
                      array(
                              'type' => 'text',
                              'name' => 'location',
                              'class' => 'form-control',
                              'value' => set_value('location'),
                              'rules' => 'trim|required'
                           ),
                      array(
                              'type' => 'text',
                              'name' => 'year',
                              'class' => 'form-control',
                              'value' => set_value('year'),
                              'rules' => 'trim|required'
                           ),
                      array(
                              'type' => 'text',
                              'name' => 'client',
                              'class' => 'form-control',
                              'value' => set_value('client'),
                              'rules' => 'trim|required'
                           ),
                      array(
                              'type' => 'file',
                              'name' => 'userfile',
                              'path' => '/assets/image/projects/infrastructure/',
                              'allowed' => 'jpg|jpeg|png',
                              'size' => '0',
                              'width' => '4000',
                              'height' => '4000'

                           )                      
                    )
                );

        $detail = $this->cat_form->validator($config,false,true);
        if ( $detail['userfile'] == "" ){
           $config = array(
                    'admin/tol' => 
                    array(
                      array(
                              'type' => 'text',
                              'name' => 'name',
                              'class' => 'form-control',
                              'value' => set_value('name'),
                              'rules' => 'trim|required'
                           ),
                      array(
                              'type' => 'text',
                              'name' => 'location',
                              'class' => 'form-control',
                              'value' => set_value('location'),
                              'rules' => 'trim|required'
                           ),
                      array(
                              'type' => 'text',
                              'name' => 'year',
                              'class' => 'form-control',
                              'value' => set_value('year'),
                              'rules' => 'trim|required'
                           ),
                      array(
                              'type' => 'text',
                              'name' => 'client',
                              'class' => 'form-control',
                              'value' => set_value('client'),
                              'rules' => 'trim|required'
                           )));
           $detail = $this->cat_form->validator($config,false,true);   
        }
        $var = array('table' => 'projects_infrastructure_tol', 
                         'condition' => 'id = '.$id.''
                        );
            // var_dump($var);
            $this->cat_model->update($var,$detail);
            echo '<script>window.location.href = "'.base_url('admin/tol').'"</script>';
       
    }

    public function add_tol()
    {
       $config = array(
                    'admin/tol' => 
                    array(
                      array(
                              'type' => 'text',
                              'name' => 'name',
                              'class' => 'form-control',
                              'value' => set_value('name'),
                              'rules' => 'trim|required'
                           ),
                      array(
                              'type' => 'text',
                              'name' => 'location',
                              'class' => 'form-control',
                              'value' => set_value('location'),
                              'rules' => 'trim|required'
                           ),
                      array(
                              'type' => 'text',
                              'name' => 'year',
                              'class' => 'form-control',
                              'value' => set_value('year'),
                              'rules' => 'trim|required'
                           ),
                      array(
                              'type' => 'text',
                              'name' => 'client',
                              'class' => 'form-control',
                              'value' => set_value('client'),
                              'rules' => 'trim|required'
                           ),
                      array(
                              'type' => 'file',
                              'name' => 'userfile',
                              'path' => '/assets/image/projects/infrastructure/',
                              'allowed' => 'jpg|jpeg|png',
                              'size' => '0',
                              'width' => '4000',
                              'height' => '4000'

                           ),
                      array(
                              'type' => 'text',
                              'name' => 'active',
                              'class' => 'form-control',
                              'value' => '1'
                           ),              
                    )
                );

            $detail = $this->cat_form->validator($config,false,true);
            $this->cat_model->insert('projects_infrastructure_tol',$detail);
            echo '<script>window.location.href = "'.base_url('admin/tol').'"</script>';
    }

    public function delete_tol()
    {
        $url = $this->uri->uri_string();
        $url = explode('/',$url);

        $id = $url[count($url)-1];

        $this->db->delete('projects_infrastructure_tol', array('id' => $id)); 
        echo '<script>window.location.href = "'.base_url('admin/tol').'"</script>';
    }

// GOOD CORPORATE GOVERNANCE GOOD CORPORATE GOVERNANCE

    public function tatakelolasekilas()
    {
        $this->cat_login->is_login();

        $catalyst['header'] = 'admin-main-header';
        $catalyst['label'] = $this->_admin;
        $catalyst['themes'] = "sekilastatakelola";
        $catalyst['processor'] = null;
        $catalyst['footer'] = null; 

        $catalyst = $this->catalyst->enables('morris,flot,table',$catalyst);

        $data['raw_sekilastatakelola'] = $this->cat_model->getall('governance_sekilas_id');

        $this->catalyst->render($catalyst, $data);

    }

     public function edit_sekilastatakelola()
    {
        $url = $this->uri->uri_string();
        $url = explode('/',$url);

        $id = $url[count($url)-1];

        $click = $this->input->post('btn-edpre');

        $config = array(
                    'admin/tatakelolasekilas' => 
                    array(
                      array(
                              'type' => 'textarea',
                              'name' => 'content',
                              'class' => 'form-control',
                              'value' => set_value('content'),
                              'rules' => 'trim|required'
                           )                     
                    )
                );

        $detail = $this->cat_form->validator($config,false,true);

        $var = array('table' => 'governance_sekilas_id', 
                         'condition' => 'id = '.$id.''
                        );
            // var_dump($var);
            $this->cat_model->update($var,$detail);
            echo '<script>window.location.href = "'.base_url('admin/tatakelolasekilas').'"</script>';
       
    }

    public function governanceglance()
    {
        $this->cat_login->is_login();

        $catalyst['header'] = 'admin-main-header';
        $catalyst['label'] = $this->_admin;
        $catalyst['themes'] = "governanceglance";
        $catalyst['processor'] = null;
        $catalyst['footer'] = null; 

        $catalyst = $this->catalyst->enables('morris,flot,table',$catalyst);

        $data['raw_governanceglance'] = $this->cat_model->getall('governance_sekilas');

        $this->catalyst->render($catalyst, $data);

    }

     public function edit_governanceglance()
    {
        $url = $this->uri->uri_string();
        $url = explode('/',$url);

        $id = $url[count($url)-1];

        $click = $this->input->post('btn-edpre');

        $config = array(
                    'admin/governanceglance' => 
                    array(
                      array(
                              'type' => 'textarea',
                              'name' => 'content',
                              'class' => 'form-control',
                              'value' => set_value('content'),
                              'rules' => 'trim|required'
                           )                     
                    )
                );

        $detail = $this->cat_form->validator($config,false,true);

        $var = array('table' => 'governance_sekilas', 
                         'condition' => 'id = '.$id.''
                        );
            // var_dump($var);
            $this->cat_model->update($var,$detail);
            echo '<script>window.location.href = "'.base_url('admin/governanceglance').'"</script>';
       
    }

    public function tujuantatakelola()
    {
        $this->cat_login->is_login();

        $catalyst['header'] = 'admin-main-header';
        $catalyst['label'] = $this->_admin;
        $catalyst['themes'] = "tujuantatakelola";
        $catalyst['processor'] = null;
        $catalyst['footer'] = null; 

        $catalyst = $this->catalyst->enables('morris,flot,table',$catalyst);

        $data['raw_tujuantatakelola'] = $this->cat_model->getall('governance_tujuan_id');

        $this->catalyst->render($catalyst, $data);

    }

     public function edit_tujuantatakelola()
    {
        $url = $this->uri->uri_string();
        $url = explode('/',$url);

        $id = $url[count($url)-1];

        $click = $this->input->post('btn-edpre');

        $config = array(
                    'admin/tujuantatakelola' => 
                    array(
                      array(
                              'type' => 'textarea',
                              'name' => 'content',
                              'class' => 'form-control',
                              'value' => set_value('content'),
                              'rules' => 'trim|required'
                           )                     
                    )
                );

        $detail = $this->cat_form->validator($config,false,true);

        $var = array('table' => 'governance_tujuan_id', 
                         'condition' => 'id = '.$id.''
                        );
            // var_dump($var);
            $this->cat_model->update($var,$detail);
            echo '<script>window.location.href = "'.base_url('admin/tujuantatakelola').'"</script>';
       
    }

    public function governanceobjectives()
    {
        $this->cat_login->is_login();

        $catalyst['header'] = 'admin-main-header';
        $catalyst['label'] = $this->_admin;
        $catalyst['themes'] = "governanceobjectives";
        $catalyst['processor'] = null;
        $catalyst['footer'] = null; 

        $catalyst = $this->catalyst->enables('morris,flot,table',$catalyst);

        $data['raw_governanceobjectives'] = $this->cat_model->getall('governance_tujuan');

        $this->catalyst->render($catalyst, $data);

    }

     public function edit_governanceobjectives()
    {
        $url = $this->uri->uri_string();
        $url = explode('/',$url);

        $id = $url[count($url)-1];

        $click = $this->input->post('btn-edpre');

        $config = array(
                    'admin/governanceobjectives' => 
                    array(
                      array(
                              'type' => 'textarea',
                              'name' => 'content',
                              'class' => 'form-control',
                              'value' => set_value('content'),
                              'rules' => 'trim|required'
                           )                     
                    )
                );

        $detail = $this->cat_form->validator($config,false,true);

        $var = array('table' => 'governance_tujuan', 
                         'condition' => 'id = '.$id.''
                        );
            // var_dump($var);
            $this->cat_model->update($var,$detail);
            echo '<script>window.location.href = "'.base_url('admin/governanceobjectives').'"</script>';
       
    }

    public function roadmaptatakelola()
    {
        $this->cat_login->is_login();

        $catalyst['header'] = 'admin-main-header';
        $catalyst['label'] = $this->_admin;
        $catalyst['themes'] = "roadmaptatakelola";
        $catalyst['processor'] = null;
        $catalyst['footer'] = null; 

        $catalyst = $this->catalyst->enables('morris,flot,table',$catalyst);

        $data['raw_roadmaptatakelola'] = $this->cat_model->getall('governance_roadmap_id');

        $this->catalyst->render($catalyst, $data);

    }

    public function edit_roadmaptatakelola()
    {
        $url = $this->uri->uri_string();
        $url = explode('/',$url);

        $id = $url[count($url)-1];

        $click = $this->input->post('btn-edpre');

        $config = array(
                    'admin/roadmaptatakelola' => 
                    array(
                      array(
                              'type' => 'textarea',
                              'name' => 'content',
                              'class' => 'form-control',
                              'value' => set_value('content'),
                              'rules' => 'trim|required'
                           ),
                      array(
                              'type' => 'file',
                              'name' => 'userfile',
                              'path' => '/assets/image/governance/',
                              'allowed' => 'jpg|jpeg|png',
                              'size' => '0',
                              'width' => '4000',
                              'height' => '4000'

                           )                      
                    )
                );

        $detail = $this->cat_form->validator($config,false,true);
        if ( $detail['content'] == "" ){
          echo "<script>alert('Please fill description');</script>";
          echo '<script>window.location.href = "'.base_url('admin/roadmaptatakelola').'"</script>';
        }else{
          if ( $detail['userfile'] == "" ){
            $config = array(
                      'admin/roadmaptatakelola' => 
                      array(
                        array(
                                'type' => 'textarea',
                                'name' => 'content',
                                'class' => 'form-control',
                                'value' => set_value('content'),
                                'rules' => 'trim|required'
                             )));
            $detail = $this->cat_form->validator($config,false,true);
          }
           $var = array('table' => 'governance_roadmap_id', 
                         'condition' => 'id = '.$id.''
                        );
            // var_dump($var);
            $this->cat_model->update($var,$detail);
            echo '<script>window.location.href = "'.base_url('admin/roadmaptatakelola').'"</script>';
        }
       
       
    }

    public function governanceroadmap()
    {
        $this->cat_login->is_login();

        $catalyst['header'] = 'admin-main-header';
        $catalyst['label'] = $this->_admin;
        $catalyst['themes'] = "governanceroadmap";
        $catalyst['processor'] = null;
        $catalyst['footer'] = null; 

        $catalyst = $this->catalyst->enables('morris,flot,table',$catalyst);

        $data['raw_governanceroadmap'] = $this->cat_model->getall('governance_roadmap');

        $this->catalyst->render($catalyst, $data);

    }

    public function edit_governanceroadmap()
    {
        $url = $this->uri->uri_string();
        $url = explode('/',$url);

        $id = $url[count($url)-1];

        $click = $this->input->post('btn-edpre');

        $config = array(
                    'admin/governanceroadmap' => 
                    array(
                      array(
                              'type' => 'textarea',
                              'name' => 'content',
                              'class' => 'form-control',
                              'value' => set_value('content'),
                              'rules' => 'trim|required'
                           ),
                      array(
                              'type' => 'file',
                              'name' => 'userfile',
                              'path' => '/assets/image/governance/',
                              'allowed' => 'jpg|jpeg|png',
                              'size' => '0',
                              'width' => '4000',
                              'height' => '4000'

                           )                      
                    )
                );

        $detail = $this->cat_form->validator($config,false,true);
        if ( $detail['content'] == "" ){
          echo "<script>alert('Please fill description');</script>";
          echo '<script>window.location.href = "'.base_url('admin/governanceroadmap').'"</script>';
        }else{
            if ( $detail['userfile'] == "" ){
            $config = array(
                      'admin/governanceroadmap' => 
                      array(
                        array(
                                'type' => 'textarea',
                                'name' => 'content',
                                'class' => 'form-control',
                                'value' => set_value('content'),
                                'rules' => 'trim|required'
                             )));
            $detail = $this->cat_form->validator($config,false,true);
          }
          $var = array('table' => 'governance_roadmap', 
                         'condition' => 'id = '.$id.''
                        );
            // var_dump($var);
            $this->cat_model->update($var,$detail);
            echo '<script>window.location.href = "'.base_url('admin/governanceroadmap').'"</script>';
        }
        
       
    }

    public function implementasitatakelola()
    {
        $this->cat_login->is_login();

        $catalyst['header'] = 'admin-main-header';
        $catalyst['label'] = $this->_admin;
        $catalyst['themes'] = "implementasitatakelola";
        $catalyst['processor'] = null;
        $catalyst['footer'] = null; 

        $catalyst = $this->catalyst->enables('morris,flot,table',$catalyst);

        $data['raw_implementasitatakelola'] = $this->cat_model->getall('governance_implementasi_id');

        $this->catalyst->render($catalyst, $data);

    }

     public function edit_implementasitatakelola()
    {
        $url = $this->uri->uri_string();
        $url = explode('/',$url);

        $id = $url[count($url)-1];

        $click = $this->input->post('btn-edpre');

        $config = array(
                    'admin/implementasitatakelola' => 
                    array(
                      array(
                              'type' => 'textarea',
                              'name' => 'content',
                              'class' => 'form-control',
                              'value' => set_value('content'),
                              'rules' => 'trim|required'
                           )                     
                    )
                );

        $detail = $this->cat_form->validator($config,false,true);

        $var = array('table' => 'governance_implementasi_id', 
                         'condition' => 'id = '.$id.''
                        );
            // var_dump($var);
            $this->cat_model->update($var,$detail);
            echo '<script>window.location.href = "'.base_url('admin/implementasitatakelola').'"</script>';
       
    }

    public function governanceimplementation()
    {
        $this->cat_login->is_login();

        $catalyst['header'] = 'admin-main-header';
        $catalyst['label'] = $this->_admin;
        $catalyst['themes'] = "governanceimplementation";
        $catalyst['processor'] = null;
        $catalyst['footer'] = null; 

        $catalyst = $this->catalyst->enables('morris,flot,table',$catalyst);

        $data['raw_governanceimplementation'] = $this->cat_model->getall('governance_implementasi');

        $this->catalyst->render($catalyst, $data);

    }

     public function edit_governanceimplementation()
    {
        $url = $this->uri->uri_string();
        $url = explode('/',$url);

        $id = $url[count($url)-1];

        $click = $this->input->post('btn-edpre');

        $config = array(
                    'admin/governanceimplementation' => 
                    array(
                      array(
                              'type' => 'textarea',
                              'name' => 'content',
                              'class' => 'form-control',
                              'value' => set_value('content'),
                              'rules' => 'trim|required'
                           )                     
                    )
                );

        $detail = $this->cat_form->validator($config,false,true);

        $var = array('table' => 'governance_implementasi', 
                         'condition' => 'id = '.$id.''
                        );
            // var_dump($var);
            $this->cat_model->update($var,$detail);
            echo '<script>window.location.href = "'.base_url('admin/governanceimplementation').'"</script>';
       
    }

    public function strukturtatakelola()
    {
        $this->cat_login->is_login();

        $catalyst['header'] = 'admin-main-header';
        $catalyst['label'] = $this->_admin;
        $catalyst['themes'] = "strukturtatakelola";
        $catalyst['processor'] = null;
        $catalyst['footer'] = null; 

        $catalyst = $this->catalyst->enables('morris,flot,table',$catalyst);

        $data['raw_strukturtatakelola'] = $this->cat_model->getall('governance_struktur_id');

        $this->catalyst->render($catalyst, $data);

    }

    public function edit_strukturtatakelola()
    {
        $url = $this->uri->uri_string();
        $url = explode('/',$url);

        $id = $url[count($url)-1];

        $click = $this->input->post('btn-edpre');

        $config = array(
                    'admin/strukturtatakelola' => 
                    array(
                      array(
                              'type' => 'textarea',
                              'name' => 'content',
                              'class' => 'form-control',
                              'value' => set_value('content'),
                              'rules' => 'trim|required'
                           ),
                      array(
                              'type' => 'file',
                              'name' => 'userfile',
                              'path' => '/assets/image/governance/',
                              'allowed' => 'jpg|jpeg|png',
                              'size' => '0',
                              'width' => '6000',
                              'height' => '6000'

                           )                      
                    )
                );

        $detail = $this->cat_form->validator($config,false,true);
        if ( $detail['content'] == "" ){
          echo "<script>alert('Please fill description');</script>";
          echo '<script>window.location.href = "'.base_url('admin/strukturtatakelola').'"</script>';
        }else{
            if ( $detail['userfile'] == "" ){
              $config = array(
                    'admin/strukturtatakelola' => 
                    array(
                      array(
                              'type' => 'textarea',
                              'name' => 'content',
                              'class' => 'form-control',
                              'value' => set_value('content'),
                              'rules' => 'trim|required'
                           )));
              $detail = $this->cat_form->validator($config,false,true);
            }
            $var = array('table' => 'governance_struktur_id', 
                         'condition' => 'id = '.$id.''
                        );
            // var_dump($var);
            $this->cat_model->update($var,$detail);
            echo '<script>window.location.href = "'.base_url('admin/strukturtatakelola').'"</script>';
        }
       
    }

    public function governancestructure()
    {
        $this->cat_login->is_login();

        $catalyst['header'] = 'admin-main-header';
        $catalyst['label'] = $this->_admin;
        $catalyst['themes'] = "governancestructure";
        $catalyst['processor'] = null;
        $catalyst['footer'] = null; 

        $catalyst = $this->catalyst->enables('morris,flot,table',$catalyst);

        $data['raw_governancestructure'] = $this->cat_model->getall('governance_struktur');

        $this->catalyst->render($catalyst, $data);

    }

    public function edit_governancestructure()
    {
        $url = $this->uri->uri_string();
        $url = explode('/',$url);

        $id = $url[count($url)-1];

        $click = $this->input->post('btn-edpre');

        $config = array(
                    'admin/governancestructure' => 
                    array(
                      array(
                              'type' => 'textarea',
                              'name' => 'content',
                              'class' => 'form-control',
                              'value' => set_value('content'),
                              'rules' => 'trim|required'
                           ),
                      array(
                              'type' => 'file',
                              'name' => 'userfile',
                              'path' => '/assets/image/governance/',
                              'allowed' => 'jpg|jpeg|png',
                              'size' => '0',
                              'width' => '4000',
                              'height' => '4000'

                           )                      
                    )
                );

        $detail = $this->cat_form->validator($config,false,true);
        if ( $detail['content'] == "" ){
          echo "<script>alert('Please fill description');</script>";
          echo '<script>window.location.href = "'.base_url('admin/governancestructure').'"</script>';
        }else{
            if ( $detail['userfile'] == "" ){
              $config = array(
                    'admin/governancestructure' => 
                    array(
                      array(
                              'type' => 'textarea',
                              'name' => 'content',
                              'class' => 'form-control',
                              'value' => set_value('content'),
                              'rules' => 'trim|required'
                           )));
              $detail = $this->cat_form->validator($config,false,true);
            }
            $var = array('table' => 'governance_struktur', 
                         'condition' => 'id = '.$id.''
                        );
            // var_dump($var);
            $this->cat_model->update($var,$detail);
            echo '<script>window.location.href = "'.base_url('admin/governancestructure').'"</script>';
        }
        
       
    }

     public function dokumentatakelola()
    {
        $this->cat_login->is_login();

        $catalyst['header'] = 'admin-main-header';
        $catalyst['label'] = $this->_admin;
        $catalyst['themes'] = "dokumentatakelola";
        $catalyst['processor'] = null;
        $catalyst['footer'] = null; 

        $catalyst = $this->catalyst->enables('morris,flot,table',$catalyst);

        $data['raw_dokumentatakelola'] = $this->cat_model->getall('governance_dokumen_id');

        $this->catalyst->render($catalyst, $data);

    }

     public function edit_dokumentatakelola()
    {
        $url = $this->uri->uri_string();
        $url = explode('/',$url);

        $id = $url[count($url)-1];

        $click = $this->input->post('btn-edpre');

        $config = array(
                    'admin/dokumentatakelola' => 
                    array(
                      array(
                              'type' => 'text',
                              'name' => 'title',
                              'class' => 'form-control',
                              'value' => set_value('title'),
                              'rules' => 'trim|required'
                           ),
                      array(
                              'type' => 'text',
                              'name' => 'type',
                              'class' => 'form-control',
                              'value' => set_value('type'),
                              'rules' => 'trim|required'
                           ),
                      array(
                              'type' => 'file',
                              'name' => 'userfile',
                              'path' => '/assets/file/governance/',
                              'allowed' => 'pdf',
                              'size' => '0',
                              'width' => '4000',
                              'height' => '4000'

                           )                      
                    )
                );

        $detail = $this->cat_form->validator($config,false,true);
        if ( $detail['userfile'] == "" ){
          $config = array(
                    'admin/dokumentatakelola' => 
                    array(
                      array(
                              'type' => 'text',
                              'name' => 'title',
                              'class' => 'form-control',
                              'value' => set_value('title'),
                              'rules' => 'trim|required'
                           )));
          $detail = $this->cat_form->validator($config,false,true);
        }
        $var = array('table' => 'governance_dokumen_id', 
                         'condition' => 'id = '.$id.''
                        );
            // var_dump($var);
            $this->cat_model->update($var,$detail);
            echo '<script>window.location.href = "'.base_url('admin/dokumentatakelola').'"</script>';
       
    }

    public function add_dokumentatakelola()
    {
       $config = array(
                    'admin/dokumentatakelola' => 
                    array(
                      array(
                              'type' => 'text',
                              'name' => 'title',
                              'class' => 'form-control',
                              'value' => set_value('title'),
                              'rules' => 'trim|required'
                           ),
                      array(
                              'type' => 'text',
                              'name' => 'type',
                              'class' => 'form-control',
                              'value' => set_value('type'),
                              'rules' => 'trim|required'
                           ),
                      array(
                              'type' => 'file',
                              'name' => 'userfile',
                              'path' => '/assets/file/governance/',
                              'allowed' => 'pdf',
                              'size' => '0',
                              'width' => '4000',
                              'height' => '4000'

                           ),
                      array(
                              'type' => 'text',
                              'name' => 'active',
                              'class' => 'form-control',
                              'value' => '1'
                           ),              
                    )
                );

            $detail = $this->cat_form->validator($config,false,true);
            $this->cat_model->insert('governance_dokumen_id',$detail);
            echo '<script>window.location.href = "'.base_url('admin/dokumentatakelola').'"</script>';
    }

    public function delete_dokumentatakelola()
    {
        $url = $this->uri->uri_string();
        $url = explode('/',$url);

        $id = $url[count($url)-1];

        $this->db->delete('governance_dokumen_id', array('id' => $id)); 
        echo '<script>window.location.href = "'.base_url('admin/dokumentatakelola').'"</script>';
    }

    public function governancedocuments()
    {
        $this->cat_login->is_login();

        $catalyst['header'] = 'admin-main-header';
        $catalyst['label'] = $this->_admin;
        $catalyst['themes'] = "governancedocuments";
        $catalyst['processor'] = null;
        $catalyst['footer'] = null; 

        $catalyst = $this->catalyst->enables('morris,flot,table',$catalyst);

        $data['raw_governancedocuments'] = $this->cat_model->getall('governance_dokumen');

        $this->catalyst->render($catalyst, $data);

    }

     public function edit_governancedocuments()
    {
        $url = $this->uri->uri_string();
        $url = explode('/',$url);

        $id = $url[count($url)-1];

        $click = $this->input->post('btn-edpre');

        $config = array(
                    'admin/governancedocuments' => 
                    array(
                      array(
                              'type' => 'text',
                              'name' => 'title',
                              'class' => 'form-control',
                              'value' => set_value('title'),
                              'rules' => 'trim|required'
                           ),
                      array(
                              'type' => 'text',
                              'name' => 'type',
                              'class' => 'form-control',
                              'value' => set_value('type'),
                              'rules' => 'trim|required'
                           ),
                      array(
                              'type' => 'file',
                              'name' => 'userfile',
                              'path' => '/assets/file/governance/',
                              'allowed' => 'pdf',
                              'size' => '0',
                              'width' => '4000',
                              'height' => '4000'

                           )                      
                    )
                );

        $detail = $this->cat_form->validator($config,false,true);
         if ( $detail['userfile'] == "" ){
          $config = array(
                    'admin/governancedocuments' => 
                    array(
                      array(
                              'type' => 'text',
                              'name' => 'title',
                              'class' => 'form-control',
                              'value' => set_value('title'),
                              'rules' => 'trim|required'
                           )));
          $detail = $this->cat_form->validator($config,false,true);
        }
        $var = array('table' => 'governance_dokumen', 
                         'condition' => 'id = '.$id.''
                        );
            // var_dump($var);
            $this->cat_model->update($var,$detail);
            echo '<script>window.location.href = "'.base_url('admin/governancedocuments').'"</script>';
       
    }

    public function add_governancedocuments()
    {
       $config = array(
                    'admin/governancedocuments' => 
                    array(
                      array(
                              'type' => 'text',
                              'name' => 'title',
                              'class' => 'form-control',
                              'value' => set_value('title'),
                              'rules' => 'trim|required'
                           ),
                      array(
                              'type' => 'text',
                              'name' => 'type',
                              'class' => 'form-control',
                              'value' => set_value('type'),
                              'rules' => 'trim|required'
                           ),
                      array(
                              'type' => 'file',
                              'name' => 'userfile',
                              'path' => '/assets/file/governance/',
                              'allowed' => 'pdf',
                              'size' => '0',
                              'width' => '4000',
                              'height' => '4000'

                           ),
                      array(
                              'type' => 'text',
                              'name' => 'active',
                              'class' => 'form-control',
                              'value' => '1'
                           ),              
                    )
                );

            $detail = $this->cat_form->validator($config,false,true);
            $this->cat_model->insert('governance_dokumen',$detail);
            echo '<script>window.location.href = "'.base_url('admin/governancedocuments').'"</script>';
    }

    public function delete_governancedocuments()
    {
        $url = $this->uri->uri_string();
        $url = explode('/',$url);

        $id = $url[count($url)-1];

        $this->db->delete('governance_dokumen', array('id' => $id)); 
        echo '<script>window.location.href = "'.base_url('admin/governancedocuments').'"</script>';
    }

    public function komiteaudit()
    {
        $this->cat_login->is_login();

        $catalyst['header'] = 'admin-main-header';
        $catalyst['label'] = $this->_admin;
        $catalyst['themes'] = "komiteaudit";
        $catalyst['processor'] = null;
        $catalyst['footer'] = null; 

        $catalyst = $this->catalyst->enables('morris,flot,table',$catalyst);

        $data['raw_komiteaudit'] = $this->cat_model->getall('governance_audit_id');

        $this->catalyst->render($catalyst, $data);

    }

     public function edit_komiteaudit()
    {
        $url = $this->uri->uri_string();
        $url = explode('/',$url);

        $id = $url[count($url)-1];

        $click = $this->input->post('btn-edpre');

        $config = array(
                    'admin/komiteaudit' => 
                    array(
                      array(
                              'type' => 'textarea',
                              'name' => 'descriptor',
                              'class' => 'form-control',
                              'value' => set_value('descriptor'),
                              'rules' => 'trim|required'
                           ),
                      array(
                              'type' => 'textarea',
                              'name' => 'independensi',
                              'class' => 'form-control',
                              'value' => set_value('independensi'),
                              'rules' => 'trim|required'
                           ),
                      array(
                              'type' => 'textarea',
                              'name' => 'tugas',
                              'class' => 'form-control',
                              'value' => set_value('tugas'),
                              'rules' => 'trim|required'
                           ),
                      array(
                              'type' => 'textarea',
                              'name' => 'komposisi',
                              'class' => 'form-control',
                              'value' => set_value('komposisi'),
                              'rules' => 'trim|required'
                           ),
                      array(
                              'type' => 'text',
                              'name' => 'filetitle',
                              'class' => 'form-control',
                              'value' => set_value('filetitle'),
                              'rules' => 'trim|required'
                           ),
                      array(
                              'type' => 'file',
                              'name' => 'userfile',
                              'path' => '/assets/file/governance/',
                              'allowed' => 'pdf',
                              'size' => '0',
                              'width' => '4000',
                              'height' => '4000'

                           )                      
                    )
                );

        $detail = $this->cat_form->validator($config,false,true);
        if ( $detail['userfile'] == "" ){
           $config = array(
                    'admin/komiteaudit' => 
                    array(
                      array(
                              'type' => 'textarea',
                              'name' => 'descriptor',
                              'class' => 'form-control',
                              'value' => set_value('descriptor'),
                              'rules' => 'trim|required'
                           ),
                      array(
                              'type' => 'textarea',
                              'name' => 'independensi',
                              'class' => 'form-control',
                              'value' => set_value('independensi'),
                              'rules' => 'trim|required'
                           ),
                      array(
                              'type' => 'textarea',
                              'name' => 'tugas',
                              'class' => 'form-control',
                              'value' => set_value('tugas'),
                              'rules' => 'trim|required'
                           ),
                      array(
                              'type' => 'textarea',
                              'name' => 'komposisi',
                              'class' => 'form-control',
                              'value' => set_value('komposisi'),
                              'rules' => 'trim|required'
                           ),
                      array(
                              'type' => 'text',
                              'name' => 'filetitle',
                              'class' => 'form-control',
                              'value' => set_value('filetitle'),
                              'rules' => 'trim|required'
                           )));
           $detail = $this->cat_form->validator($config,false,true);
        }
        $var = array('table' => 'governance_audit_id', 
                         'condition' => 'id = '.$id.''
                        );
            // var_dump($var);
            $this->cat_model->update($var,$detail);
            echo '<script>window.location.href = "'.base_url('admin/komiteaudit').'"</script>';
       
    }

    public function auditcommittee()
    {
        $this->cat_login->is_login();

        $catalyst['header'] = 'admin-main-header';
        $catalyst['label'] = $this->_admin;
        $catalyst['themes'] = "auditcommittee";
        $catalyst['processor'] = null;
        $catalyst['footer'] = null; 

        $catalyst = $this->catalyst->enables('morris,flot,table',$catalyst);

        $data['raw_auditcommittee'] = $this->cat_model->getall('governance_audit');

        $this->catalyst->render($catalyst, $data);

    }

     public function edit_auditcommittee()
    {
        $url = $this->uri->uri_string();
        $url = explode('/',$url);

        $id = $url[count($url)-1];

        $click = $this->input->post('btn-edpre');

        $config = array(
                    'admin/auditcommittee' => 
                    array(
                      array(
                              'type' => 'textarea',
                              'name' => 'descriptor',
                              'class' => 'form-control',
                              'value' => set_value('descriptor'),
                              'rules' => 'trim|required'
                           ),
                      array(
                              'type' => 'textarea',
                              'name' => 'independensi',
                              'class' => 'form-control',
                              'value' => set_value('independensi'),
                              'rules' => 'trim|required'
                           ),
                      array(
                              'type' => 'textarea',
                              'name' => 'tugas',
                              'class' => 'form-control',
                              'value' => set_value('tugas'),
                              'rules' => 'trim|required'
                           ),
                      array(
                              'type' => 'textarea',
                              'name' => 'komposisi',
                              'class' => 'form-control',
                              'value' => set_value('komposisi'),
                              'rules' => 'trim|required'
                           ),
                      array(
                              'type' => 'text',
                              'name' => 'filetitle',
                              'class' => 'form-control',
                              'value' => set_value('filetitle'),
                              'rules' => 'trim|required'
                           ),
                      array(
                              'type' => 'file',
                              'name' => 'userfile',
                              'path' => '/assets/file/governance/',
                              'allowed' => 'pdf',
                              'size' => '0',
                              'width' => '4000',
                              'height' => '4000'

                           )                      
                    )
                );

        $detail = $this->cat_form->validator($config,false,true);

        $var = array('table' => 'governance_audit', 
                         'condition' => 'id = '.$id.''
                        );
            // var_dump($var);
            $this->cat_model->update($var,$detail);
            echo '<script>window.location.href = "'.base_url('admin/auditcommittee').'"</script>';
       
    }

    public function profilkomiteaudit()
    {
        $this->cat_login->is_login();

        $catalyst['header'] = 'admin-main-header';
        $catalyst['label'] = $this->_admin;
        $catalyst['themes'] = "profilkomiteaudit";
        $catalyst['processor'] = null;
        $catalyst['footer'] = null; 

        $catalyst = $this->catalyst->enables('morris,flot,table',$catalyst);

        $data['raw_profilkomiteaudit'] = $this->cat_model->getall('governance_audit_profile_id');

        $this->catalyst->render($catalyst, $data);

    }

     public function edit_profilkomiteaudit()
    {
        $url = $this->uri->uri_string();
        $url = explode('/',$url);

        $id = $url[count($url)-1];

        $click = $this->input->post('btn-edpre');

        $config = array(
                    'admin/profilkomiteaudit' => 
                    array(
                      array(
                              'type' => 'text',
                              'name' => 'nama',
                              'class' => 'form-control',
                              'value' => set_value('nama'),
                              'rules' => 'trim|required'
                           ),
                      array(
                              'type' => 'text',
                              'name' => 'jabatan_komite',
                              'class' => 'form-control',
                              'value' => set_value('jabatan_komite'),
                              'rules' => 'trim|required'
                           ),
                      array(
                              'type' => 'text',
                              'name' => 'jabatan_perusahaan',
                              'class' => 'form-control',
                              'value' => set_value('jabatan_perusahaan'),
                              'rules' => 'trim|required'
                           ),
                      array(
                              'type' => 'text',
                              'name' => 'periode',
                              'class' => 'form-control',
                              'value' => set_value('periode'),
                              'rules' => 'trim|required'
                           ),
                      array(
                              'type' => 'textarea',
                              'name' => 'descriptor_profile',
                              'class' => 'form-control',
                              'value' => set_value('descriptor_profile'),
                              'rules' => 'trim|required'
                           ),
                      array(
                              'type' => 'file',
                              'name' => 'userfile',
                              'path' => '/assets/image/governance/',
                              'allowed' => 'jpg|jpeg|png',
                              'size' => '0',
                              'width' => '4000',
                              'height' => '4000'

                           )                      
                    )
                );

        $detail = $this->cat_form->validator($config,false,true);
        if ( $detail['userfile'] == "" ){
           $config = array(
                    'admin/profilkomiteaudit' => 
                    array(
                      array(
                              'type' => 'text',
                              'name' => 'nama',
                              'class' => 'form-control',
                              'value' => set_value('nama'),
                              'rules' => 'trim|required'
                           ),
                      array(
                              'type' => 'text',
                              'name' => 'jabatan_komite',
                              'class' => 'form-control',
                              'value' => set_value('jabatan_komite'),
                              'rules' => 'trim|required'
                           ),
                      array(
                              'type' => 'text',
                              'name' => 'jabatan_perusahaan',
                              'class' => 'form-control',
                              'value' => set_value('jabatan_perusahaan'),
                              'rules' => 'trim|required'
                           ),
                      array(
                              'type' => 'text',
                              'name' => 'periode',
                              'class' => 'form-control',
                              'value' => set_value('periode'),
                              'rules' => 'trim|required'
                           ),
                      array(
                              'type' => 'textarea',
                              'name' => 'descriptor_profile',
                              'class' => 'form-control',
                              'value' => set_value('descriptor_profile'),
                              'rules' => 'trim|required'
                           )));
           $detail = $this->cat_form->validator($config,false,true);
        }
        $var = array('table' => 'governance_audit_profile_id', 
                         'condition' => 'id = '.$id.''
                        );
            // var_dump($var);
            $this->cat_model->update($var,$detail);
            echo '<script>window.location.href = "'.base_url('admin/profilkomiteaudit').'"</script>';
       
    }

    public function add_profilkomiteaudit()
    {
       $config = array(
                    'admin/profilkomiteaudit' => 
                    array(
                      array(
                              'type' => 'text',
                              'name' => 'nama',
                              'class' => 'form-control',
                              'value' => set_value('nama'),
                              'rules' => 'trim|required'
                           ),
                      array(
                              'type' => 'text',
                              'name' => 'jabatan_komite',
                              'class' => 'form-control',
                              'value' => set_value('jabatan_komite'),
                              'rules' => 'trim|required'
                           ),
                      array(
                              'type' => 'text',
                              'name' => 'jabatan_perusahaan',
                              'class' => 'form-control',
                              'value' => set_value('jabatan_perusahaan'),
                              'rules' => 'trim|required'
                           ),
                      array(
                              'type' => 'text',
                              'name' => 'periode',
                              'class' => 'form-control',
                              'value' => set_value('periode'),
                              'rules' => 'trim|required'
                           ),
                      array(
                              'type' => 'textarea',
                              'name' => 'descriptor_profile',
                              'class' => 'form-control',
                              'value' => set_value('descriptor_profile'),
                              'rules' => 'trim|required'
                           ),
                      array(
                              'type' => 'file',
                              'name' => 'userfile',
                              'path' => '/assets/image/governance/',
                              'allowed' => 'jpg|jpeg|png',
                              'size' => '0',
                              'width' => '4000',
                              'height' => '4000'

                           ),
                      array(
                              'type' => 'text',
                              'name' => 'active',
                              'class' => 'form-control',
                              'value' => '1'
                           ),              
                    )
                );

            $detail = $this->cat_form->validator($config,false,true);
            if ( $detail['descriptor_profile'] == "" ){
              $detail['descriptor_profile'] = "<p></p>";
            }
            $this->cat_model->insert('governance_audit_profile_id',$detail);
            echo '<script>window.location.href = "'.base_url('admin/profilkomiteaudit').'"</script>';
    }

    public function delete_profilkomiteaudit()
    {
        $url = $this->uri->uri_string();
        $url = explode('/',$url);

        $id = $url[count($url)-1];

        $this->db->delete('governance_audit_profile_id', array('id' => $id)); 
        echo '<script>window.location.href = "'.base_url('admin/profilkomiteaudit').'"</script>';
    }

    public function auditcommitteeprofile()
    {
        $this->cat_login->is_login();

        $catalyst['header'] = 'admin-main-header';
        $catalyst['label'] = $this->_admin;
        $catalyst['themes'] = "auditcommitteeprofile";
        $catalyst['processor'] = null;
        $catalyst['footer'] = null; 

        $catalyst = $this->catalyst->enables('morris,flot,table',$catalyst);

        $data['raw_auditcommitteeprofile'] = $this->cat_model->getall('governance_audit_profile');

        $this->catalyst->render($catalyst, $data);

    }

     public function edit_auditcommitteeprofile()
    {
        $url = $this->uri->uri_string();
        $url = explode('/',$url);

        $id = $url[count($url)-1];

        $click = $this->input->post('btn-edpre');

        $config = array(
                    'admin/auditcommitteeprofile' => 
                    array(
                      array(
                              'type' => 'text',
                              'name' => 'nama',
                              'class' => 'form-control',
                              'value' => set_value('nama'),
                              'rules' => 'trim|required'
                           ),
                      array(
                              'type' => 'text',
                              'name' => 'jabatan_komite',
                              'class' => 'form-control',
                              'value' => set_value('jabatan_komite'),
                              'rules' => 'trim|required'
                           ),
                      array(
                              'type' => 'text',
                              'name' => 'jabatan_perusahaan',
                              'class' => 'form-control',
                              'value' => set_value('jabatan_perusahaan'),
                              'rules' => 'trim|required'
                           ),
                      array(
                              'type' => 'text',
                              'name' => 'periode',
                              'class' => 'form-control',
                              'value' => set_value('periode'),
                              'rules' => 'trim|required'
                           ),
                      array(
                              'type' => 'textarea',
                              'name' => 'descriptor_profile',
                              'class' => 'form-control',
                              'value' => set_value('descriptor_profile'),
                              'rules' => 'trim|required'
                           ),
                      array(
                              'type' => 'file',
                              'name' => 'userfile',
                              'path' => '/assets/image/governance/',
                              'allowed' => 'jpg|jpeg|png',
                              'size' => '0',
                              'width' => '4000',
                              'height' => '4000'

                           )                      
                    )
                );

        $detail = $this->cat_form->validator($config,false,true);
        if ( $detail['userfile'] == "" ){
          $config = array(
                    'admin/auditcommitteeprofile' => 
                    array(
                      array(
                              'type' => 'text',
                              'name' => 'nama',
                              'class' => 'form-control',
                              'value' => set_value('nama'),
                              'rules' => 'trim|required'
                           ),
                      array(
                              'type' => 'text',
                              'name' => 'jabatan_komite',
                              'class' => 'form-control',
                              'value' => set_value('jabatan_komite'),
                              'rules' => 'trim|required'
                           ),
                      array(
                              'type' => 'text',
                              'name' => 'jabatan_perusahaan',
                              'class' => 'form-control',
                              'value' => set_value('jabatan_perusahaan'),
                              'rules' => 'trim|required'
                           ),
                      array(
                              'type' => 'text',
                              'name' => 'periode',
                              'class' => 'form-control',
                              'value' => set_value('periode'),
                              'rules' => 'trim|required'
                           ),
                      array(
                              'type' => 'textarea',
                              'name' => 'descriptor_profile',
                              'class' => 'form-control',
                              'value' => set_value('descriptor_profile'),
                              'rules' => 'trim|required'
                           )));
           $detail = $this->cat_form->validator($config,false,true);
        }
        $var = array('table' => 'governance_audit_profile', 
                         'condition' => 'id = '.$id.''
                        );
            // var_dump($var);
            $this->cat_model->update($var,$detail);
            echo '<script>window.location.href = "'.base_url('admin/auditcommitteeprofile').'"</script>';
       
    }

    public function add_auditcommitteeprofile()
    {
       $config = array(
                    'admin/auditcommitteeprofile' => 
                    array(
                      array(
                              'type' => 'text',
                              'name' => 'nama',
                              'class' => 'form-control',
                              'value' => set_value('nama'),
                              'rules' => 'trim|required'
                           ),
                      array(
                              'type' => 'text',
                              'name' => 'jabatan_komite',
                              'class' => 'form-control',
                              'value' => set_value('jabatan_komite'),
                              'rules' => 'trim|required'
                           ),
                      array(
                              'type' => 'text',
                              'name' => 'jabatan_perusahaan',
                              'class' => 'form-control',
                              'value' => set_value('jabatan_perusahaan'),
                              'rules' => 'trim|required'
                           ),
                      array(
                              'type' => 'text',
                              'name' => 'periode',
                              'class' => 'form-control',
                              'value' => set_value('periode'),
                              'rules' => 'trim|required'
                           ),
                      array(
                              'type' => 'textarea',
                              'name' => 'descriptor_profile',
                              'class' => 'form-control',
                              'value' => set_value('descriptor_profile'),
                              'rules' => 'trim|required'
                           ),
                      array(
                              'type' => 'file',
                              'name' => 'userfile',
                              'path' => '/assets/image/governance/',
                              'allowed' => 'jpg|jpeg|png',
                              'size' => '0',
                              'width' => '4000',
                              'height' => '4000'

                           ),
                      array(
                              'type' => 'text',
                              'name' => 'active',
                              'class' => 'form-control',
                              'value' => '1'
                           ),              
                    )
                );

            $detail = $this->cat_form->validator($config,false,true);
            if ( $detail['descriptor_profile'] == "" ){
              $detail['descriptor_profile'] = "<p></p>";
            }
            $this->cat_model->insert('governance_audit_profile',$detail);
            echo '<script>window.location.href = "'.base_url('admin/auditcommitteeprofile').'"</script>';
    }

    public function delete_auditcommitteeprofile()
    {
        $url = $this->uri->uri_string();
        $url = explode('/',$url);

        $id = $url[count($url)-1];

        $this->db->delete('governance_audit_profile', array('id' => $id)); 
        echo '<script>window.location.href = "'.base_url('admin/auditcommitteeprofile').'"</script>';
    }

    public function nominasi()
    {
        $this->cat_login->is_login();

        $catalyst['header'] = 'admin-main-header';
        $catalyst['label'] = $this->_admin;
        $catalyst['themes'] = "nominasi";
        $catalyst['processor'] = null;
        $catalyst['footer'] = null; 

        $catalyst = $this->catalyst->enables('morris,flot,table',$catalyst);

        $data['raw_nominasi'] = $this->cat_model->getall('governance_nominasi_id');

        $this->catalyst->render($catalyst, $data);

    }

     public function edit_nominasi()
    {
        $url = $this->uri->uri_string();
        $url = explode('/',$url);

        $id = $url[count($url)-1];

        $click = $this->input->post('btn-edpre');

        $config = array(
                    'admin/nominasi' => 
                    array(
                      array(
                              'type' => 'textarea',
                              'name' => 'descriptor',
                              'class' => 'form-control',
                              'value' => set_value('descriptor'),
                              'rules' => 'trim|required'
                           ),
                      array(
                              'type' => 'textarea',
                              'name' => 'tugas',
                              'class' => 'form-control',
                              'value' => set_value('tugas'),
                              'rules' => 'trim|required'
                           ),
                      array(
                              'type' => 'text',
                              'name' => 'filetitle',
                              'class' => 'form-control',
                              'value' => set_value('filetitle'),
                              'rules' => 'trim|required'
                           ),
                      array(
                              'type' => 'file',
                              'name' => 'userfile',
                              'path' => '/assets/file/governance/',
                              'allowed' => 'pdf',
                              'size' => '0',
                              'width' => '4000',
                              'height' => '4000'

                           )                      
                    )
                );

        $detail = $this->cat_form->validator($config,false,true);

        $var = array('table' => 'governance_nominasi_id', 
                         'condition' => 'id = '.$id.''
                        );
            // var_dump($var);
            $this->cat_model->update($var,$detail);
            echo '<script>window.location.href = "'.base_url('admin/nominasi').'"</script>';
       
    }

    public function nomination()
    {
        $this->cat_login->is_login();

        $catalyst['header'] = 'admin-main-header';
        $catalyst['label'] = $this->_admin;
        $catalyst['themes'] = "nomination";
        $catalyst['processor'] = null;
        $catalyst['footer'] = null; 

        $catalyst = $this->catalyst->enables('morris,flot,table',$catalyst);

        $data['raw_nomination'] = $this->cat_model->getall('governance_nominasi');

        $this->catalyst->render($catalyst, $data);

    }

     public function edit_nomination()
    {
        $url = $this->uri->uri_string();
        $url = explode('/',$url);

        $id = $url[count($url)-1];

        $click = $this->input->post('btn-edpre');

        $config = array(
                    'admin/nomination' => 
                    array(
                      array(
                              'type' => 'textarea',
                              'name' => 'descriptor',
                              'class' => 'form-control',
                              'value' => set_value('descriptor'),
                              'rules' => 'trim|required'
                           ),
                      array(
                              'type' => 'textarea',
                              'name' => 'tugas',
                              'class' => 'form-control',
                              'value' => set_value('tugas'),
                              'rules' => 'trim|required'
                           ),
                      array(
                              'type' => 'text',
                              'name' => 'filetitle',
                              'class' => 'form-control',
                              'value' => set_value('filetitle'),
                              'rules' => 'trim|required'
                           ),
                      array(
                              'type' => 'file',
                              'name' => 'userfile',
                              'path' => '/assets/file/governance/',
                              'allowed' => 'pdf',
                              'size' => '0',
                              'width' => '4000',
                              'height' => '4000'

                           )                      
                    )
                );

        $detail = $this->cat_form->validator($config,false,true);

        $var = array('table' => 'governance_nominasi', 
                         'condition' => 'id = '.$id.''
                        );
            // var_dump($var);
            $this->cat_model->update($var,$detail);
            echo '<script>window.location.href = "'.base_url('admin/nomination').'"</script>';
       
    }

    public function nominationprofile()
    {
        $this->cat_login->is_login();

        $catalyst['header'] = 'admin-main-header';
        $catalyst['label'] = $this->_admin;
        $catalyst['themes'] = "nominationprofile";
        $catalyst['processor'] = null;
        $catalyst['footer'] = null; 

        $catalyst = $this->catalyst->enables('morris,flot,table',$catalyst);

        $data['raw_nominationprofile'] = $this->cat_model->getall('governance_nominasi_profile');

        $this->catalyst->render($catalyst, $data);

    }

     public function edit_nominationprofile()
    {
        $url = $this->uri->uri_string();
        $url = explode('/',$url);

        $id = $url[count($url)-1];

        $click = $this->input->post('btn-edpre');

        $config = array(
                    'admin/nominationprofile' => 
                    array(
                      array(
                              'type' => 'text',
                              'name' => 'nama',
                              'class' => 'form-control',
                              'value' => set_value('nama'),
                              'rules' => 'trim|required'
                           ),
                      array(
                              'type' => 'text',
                              'name' => 'jabatan',
                              'class' => 'form-control',
                              'value' => set_value('jabatan'),
                              'rules' => 'trim|required'
                           ),
                      array(
                              'type' => 'textarea',
                              'name' => 'descriptor_profile',
                              'class' => 'form-control',
                              'value' => set_value('descriptor_profile'),
                              'rules' => 'trim|required'
                           ),
                      array(
                              'type' => 'file',
                              'name' => 'userfile',
                              'path' => '/assets/image/governance/',
                              'allowed' => 'jpg|jpeg|png',
                              'size' => '0',
                              'width' => '4000',
                              'height' => '4000'

                           )                      
                    )
                );

        $detail = $this->cat_form->validator($config,false,true);
        if ( $detail['userfile'] == "" ){
          $config = array(
                    'admin/nominationprofile' => 
                    array(
                      array(
                              'type' => 'text',
                              'name' => 'nama',
                              'class' => 'form-control',
                              'value' => set_value('nama'),
                              'rules' => 'trim|required'
                           ),
                      array(
                              'type' => 'text',
                              'name' => 'jabatan',
                              'class' => 'form-control',
                              'value' => set_value('jabatan'),
                              'rules' => 'trim|required'
                           ),
                      array(
                              'type' => 'textarea',
                              'name' => 'descriptor_profile',
                              'class' => 'form-control',
                              'value' => set_value('descriptor_profile'),
                              'rules' => 'trim|required'
                           )));
          $detail = $this->cat_form->validator($config,false,true);
        }
        $var = array('table' => 'governance_nominasi_profile', 
                         'condition' => 'id = '.$id.''
                        );
            // var_dump($var);
            $this->cat_model->update($var,$detail);
            echo '<script>window.location.href = "'.base_url('admin/nominationprofile').'"</script>';
       
    }

    public function add_nominationprofile()
    {
       $config = array(
                    'admin/nominationprofile' => 
                    array(
                      array(
                              'type' => 'text',
                              'name' => 'nama',
                              'class' => 'form-control',
                              'value' => set_value('nama'),
                              'rules' => 'trim|required'
                           ),
                      array(
                              'type' => 'text',
                              'name' => 'jabatan',
                              'class' => 'form-control',
                              'value' => set_value('jabatan'),
                              'rules' => 'trim|required'
                           ),
                      array(
                              'type' => 'textarea',
                              'name' => 'descriptor_profile',
                              'class' => 'form-control',
                              'value' => set_value('descriptor_profile'),
                              'rules' => 'trim|required'
                           ),
                      array(
                              'type' => 'file',
                              'name' => 'userfile',
                              'path' => '/assets/image/governance/',
                              'allowed' => 'jpg|jpeg|png',
                              'size' => '0',
                              'width' => '4000',
                              'height' => '4000'

                           ),
                      array(
                              'type' => 'text',
                              'name' => 'active',
                              'class' => 'form-control',
                              'value' => '1'
                           ),              
                    )
                );

            $detail = $this->cat_form->validator($config,false,true);
            if ( $detail['descriptor_profile'] == "" ){
              $detail['descriptor_profile'] = "<p></p>";
            }
            $this->cat_model->insert('governance_nominasi_profile',$detail);
            echo '<script>window.location.href = "'.base_url('admin/nominationprofile').'"</script>';
    }

    public function delete_nominationprofile()
    {
        $url = $this->uri->uri_string();
        $url = explode('/',$url);

        $id = $url[count($url)-1];

        $this->db->delete('governance_nominasi_profile', array('id' => $id)); 
        echo '<script>window.location.href = "'.base_url('admin/nominationprofile').'"</script>';
    }

    public function profilnominasi()
    {
        $this->cat_login->is_login();

        $catalyst['header'] = 'admin-main-header';
        $catalyst['label'] = $this->_admin;
        $catalyst['themes'] = "profilnominasi";
        $catalyst['processor'] = null;
        $catalyst['footer'] = null; 

        $catalyst = $this->catalyst->enables('morris,flot,table',$catalyst);

        $data['raw_profilnominasi'] = $this->cat_model->getall('governance_nominasi_profile_id');

        $this->catalyst->render($catalyst, $data);

    }

     public function edit_profilnominasi()
    {
        $url = $this->uri->uri_string();
        $url = explode('/',$url);

        $id = $url[count($url)-1];

        $click = $this->input->post('btn-edpre');

        $config = array(
                    'admin/profilnominasi' => 
                    array(
                      array(
                              'type' => 'text',
                              'name' => 'nama',
                              'class' => 'form-control',
                              'value' => set_value('nama'),
                              'rules' => 'trim|required'
                           ),
                      array(
                              'type' => 'text',
                              'name' => 'jabatan',
                              'class' => 'form-control',
                              'value' => set_value('jabatan'),
                              'rules' => 'trim|required'
                           ),
                      array(
                              'type' => 'textarea',
                              'name' => 'descriptor_profile',
                              'class' => 'form-control',
                              'value' => set_value('descriptor_profile'),
                              'rules' => 'trim|required'
                           ),
                      array(
                              'type' => 'file',
                              'name' => 'userfile',
                              'path' => '/assets/image/governance/',
                              'allowed' => 'jpg|jpeg|png',
                              'size' => '0',
                              'width' => '4000',
                              'height' => '4000'

                           )                      
                    )
                );

        $detail = $this->cat_form->validator($config,false,true);
        if ( $detail['userfile'] == "" ){
           $config = array(
                    'admin/profilnominasi' => 
                    array(
                      array(
                              'type' => 'text',
                              'name' => 'nama',
                              'class' => 'form-control',
                              'value' => set_value('nama'),
                              'rules' => 'trim|required'
                           ),
                      array(
                              'type' => 'text',
                              'name' => 'jabatan',
                              'class' => 'form-control',
                              'value' => set_value('jabatan'),
                              'rules' => 'trim|required'
                           ),
                      array(
                              'type' => 'textarea',
                              'name' => 'descriptor_profile',
                              'class' => 'form-control',
                              'value' => set_value('descriptor_profile'),
                              'rules' => 'trim|required'
                           )));
          $detail = $this->cat_form->validator($config,false,true);
        }
        $var = array('table' => 'governance_nominasi_profile_id', 
                         'condition' => 'id = '.$id.''
                        );
            // var_dump($var);
            $this->cat_model->update($var,$detail);
            echo '<script>window.location.href = "'.base_url('admin/profilnominasi').'"</script>';
       
    }

    public function add_profilnominasi()
    {
       $config = array(
                    'admin/profilnominasi' => 
                    array(
                      array(
                              'type' => 'text',
                              'name' => 'nama',
                              'class' => 'form-control',
                              'value' => set_value('nama'),
                              'rules' => 'trim|required'
                           ),
                      array(
                              'type' => 'text',
                              'name' => 'jabatan',
                              'class' => 'form-control',
                              'value' => set_value('jabatan'),
                              'rules' => 'trim|required'
                           ),
                      array(
                              'type' => 'textarea',
                              'name' => 'descriptor_profile',
                              'class' => 'form-control',
                              'value' => set_value('descriptor_profile'),
                              'rules' => 'trim|required'
                           ),
                      array(
                              'type' => 'file',
                              'name' => 'userfile',
                              'path' => '/assets/image/governance/',
                              'allowed' => 'jpg|jpeg|png',
                              'size' => '0',
                              'width' => '4000',
                              'height' => '4000'

                           ),
                      array(
                              'type' => 'text',
                              'name' => 'active',
                              'class' => 'form-control',
                              'value' => '1'
                           ),              
                    )
                );

            $detail = $this->cat_form->validator($config,false,true);
            if ( $detail['descriptor_profile'] == "" ){
              $detail['descriptor_profile'] = "<p></p>";
            }
            $this->cat_model->insert('governance_nominasi_profile_id',$detail);
            echo '<script>window.location.href = "'.base_url('admin/profilnominasi').'"</script>';
    }

    public function delete_profilnominasi()
    {
        $url = $this->uri->uri_string();
        $url = explode('/',$url);

        $id = $url[count($url)-1];

        $this->db->delete('governance_nominasi_profile_id', array('id' => $id)); 
        echo '<script>window.location.href = "'.base_url('admin/profilnominasi').'"</script>';
    }

    public function unitinternal()
    {
        $this->cat_login->is_login();

        $catalyst['header'] = 'admin-main-header';
        $catalyst['label'] = $this->_admin;
        $catalyst['themes'] = "unitinternal";
        $catalyst['processor'] = null;
        $catalyst['footer'] = null; 

        $catalyst = $this->catalyst->enables('morris,flot,table',$catalyst);

        $data['raw_unitinternal'] = $this->cat_model->getall('governance_internal_id');

        $this->catalyst->render($catalyst, $data);

    }

     public function edit_unitinternal()
    {
        $url = $this->uri->uri_string();
        $url = explode('/',$url);

        $id = $url[count($url)-1];

        $click = $this->input->post('btn-edpre');

        $config = array(
                    'admin/unitinternal' => 
                    array(
                      array(
                              'type' => 'textarea',
                              'name' => 'descriptor',
                              'class' => 'form-control',
                              'value' => set_value('descriptor'),
                              'rules' => 'trim|required'
                           ),
                      array(
                              'type' => 'textarea',
                              'name' => 'tugas',
                              'class' => 'form-control',
                              'value' => set_value('tugas'),
                              'rules' => 'trim|required'
                           ),
                      array(
                              'type' => 'text',
                              'name' => 'filetitle',
                              'class' => 'form-control',
                              'value' => set_value('filetitle'),
                              'rules' => 'trim|required'
                           ),
                      array(
                              'type' => 'file',
                              'name' => 'userfile',
                              'path' => '/assets/file/governance/',
                              'allowed' => 'pdf',
                              'size' => '0',
                              'width' => '4000',
                              'height' => '4000'

                           )                      
                    )
                );

        $detail = $this->cat_form->validator($config,false,true);

        $var = array('table' => 'governance_internal_id', 
                         'condition' => 'id = '.$id.''
                        );
            // var_dump($var);
            $this->cat_model->update($var,$detail);
            echo '<script>window.location.href = "'.base_url('admin/unitinternal').'"</script>';
       
    }

    public function internalunit()
    {
        $this->cat_login->is_login();

        $catalyst['header'] = 'admin-main-header';
        $catalyst['label'] = $this->_admin;
        $catalyst['themes'] = "internalunit";
        $catalyst['processor'] = null;
        $catalyst['footer'] = null; 

        $catalyst = $this->catalyst->enables('morris,flot,table',$catalyst);

        $data['raw_internalunit'] = $this->cat_model->getall('governance_internal');

        $this->catalyst->render($catalyst, $data);

    }

     public function edit_internalunit()
    {
        $url = $this->uri->uri_string();
        $url = explode('/',$url);

        $id = $url[count($url)-1];

        $click = $this->input->post('btn-edpre');

        $config = array(
                    'admin/internalunit' => 
                    array(
                      array(
                              'type' => 'textarea',
                              'name' => 'descriptor',
                              'class' => 'form-control',
                              'value' => set_value('descriptor'),
                              'rules' => 'trim|required'
                           ),
                      array(
                              'type' => 'textarea',
                              'name' => 'tugas',
                              'class' => 'form-control',
                              'value' => set_value('tugas'),
                              'rules' => 'trim|required'
                           ),
                      array(
                              'type' => 'text',
                              'name' => 'filetitle',
                              'class' => 'form-control',
                              'value' => set_value('filetitle'),
                              'rules' => 'trim|required'
                           ),
                      array(
                              'type' => 'file',
                              'name' => 'userfile',
                              'path' => '/assets/file/governance/',
                              'allowed' => 'pdf',
                              'size' => '0',
                              'width' => '4000',
                              'height' => '4000'

                           )                      
                    )
                );

        $detail = $this->cat_form->validator($config,false,true);

        $var = array('table' => 'governance_internal', 
                         'condition' => 'id = '.$id.''
                        );
            // var_dump($var);
            $this->cat_model->update($var,$detail);
            echo '<script>window.location.href = "'.base_url('admin/internalunit').'"</script>';
       
    }

    public function profilunitinternal()
    {
        $this->cat_login->is_login();

        $catalyst['header'] = 'admin-main-header';
        $catalyst['label'] = $this->_admin;
        $catalyst['themes'] = "profilunitinternal";
        $catalyst['processor'] = null;
        $catalyst['footer'] = null; 

        $catalyst = $this->catalyst->enables('morris,flot,table',$catalyst);

        $data['raw_profilunitinternal'] = $this->cat_model->getall('governance_internal_profile_id');

        $this->catalyst->render($catalyst, $data);

    }

    public function edit_profilunitinternal()
    {
        $url = $this->uri->uri_string();
        $url = explode('/',$url);

        $id = $url[count($url)-1];

        $click = $this->input->post('btn-edpre');

        $config = array(
                    'admin/profilunitinternal' => 
                    array(
                      array(
                              'type' => 'text',
                              'name' => 'nama',
                              'class' => 'form-control',
                              'value' => set_value('nama'),
                              'rules' => 'trim|required'
                           ),
                      array(
                              'type' => 'textarea',
                              'name' => 'descriptor_profile',
                              'class' => 'form-control',
                              'value' => set_value('descriptor'),
                              'rules' => 'trim|required'
                           ),
                      array(
                              'type' => 'file',
                              'name' => 'userfile',
                              'path' => '/assets/image/governance/',
                              'allowed' => 'jpg|jpeg|png',
                              'size' => '0',
                              'width' => '4000',
                              'height' => '4000'

                           )                      
                    )
                );

        $detail = $this->cat_form->validator($config,false,true);
        if ( $detail['userfile'] == "" ){
           $config = array(
                    'admin/profilunitinternal' => 
                    array(
                      array(
                              'type' => 'text',
                              'name' => 'nama',
                              'class' => 'form-control',
                              'value' => set_value('nama'),
                              'rules' => 'trim|required'
                           ),
                      array(
                              'type' => 'textarea',
                              'name' => 'descriptor_profile',
                              'class' => 'form-control',
                              'value' => set_value('descriptor'),
                              'rules' => 'trim|required'
                           )));
          $detail = $this->cat_form->validator($config,false,true);
        }
        $var = array('table' => 'governance_internal_profile_id', 
                         'condition' => 'id = '.$id.''
                        );
            // var_dump($var);
            $this->cat_model->update($var,$detail);
            echo '<script>window.location.href = "'.base_url('admin/profilunitinternal').'"</script>';
       
    }

    public function internalunitprofile()
    {
        $this->cat_login->is_login();

        $catalyst['header'] = 'admin-main-header';
        $catalyst['label'] = $this->_admin;
        $catalyst['themes'] = "internalunitprofile";
        $catalyst['processor'] = null;
        $catalyst['footer'] = null; 

        $catalyst = $this->catalyst->enables('morris,flot,table',$catalyst);

        $data['raw_internalunitprofile'] = $this->cat_model->getall('governance_internal_profile');

        $this->catalyst->render($catalyst, $data);

    }

    public function edit_internalunitprofile()
    {
        $url = $this->uri->uri_string();
        $url = explode('/',$url);

        $id = $url[count($url)-1];

        $click = $this->input->post('btn-edpre');

        $config = array(
                    'admin/internalunitprofile' => 
                    array(
                      array(
                              'type' => 'text',
                              'name' => 'nama',
                              'class' => 'form-control',
                              'value' => set_value('nama'),
                              'rules' => 'trim|required'
                           ),
                      array(
                              'type' => 'textarea',
                              'name' => 'descriptor_profile',
                              'class' => 'form-control',
                              'value' => set_value('descriptor'),
                              'rules' => 'trim|required'
                           ),
                      array(
                              'type' => 'file',
                              'name' => 'userfile',
                              'path' => '/assets/image/governance/',
                              'allowed' => 'jpg|jpeg|png',
                              'size' => '0',
                              'width' => '4000',
                              'height' => '4000'

                           )                      
                    )
                );

        $detail = $this->cat_form->validator($config,false,true);
        if ( $detail['userfile'] == "" ){
          $config = array(
                    'admin/internalunitprofile' => 
                    array(
                      array(
                              'type' => 'text',
                              'name' => 'nama',
                              'class' => 'form-control',
                              'value' => set_value('nama'),
                              'rules' => 'trim|required'
                           ),
                      array(
                              'type' => 'textarea',
                              'name' => 'descriptor_profile',
                              'class' => 'form-control',
                              'value' => set_value('descriptor'),
                              'rules' => 'trim|required'
                           )));
          $detail = $this->cat_form->validator($config,false,true);
        }
        $var = array('table' => 'governance_internal_profile', 
                         'condition' => 'id = '.$id.''
                        );
            // var_dump($var);
            $this->cat_model->update($var,$detail);
            echo '<script>window.location.href = "'.base_url('admin/internalunitprofile').'"</script>';
       
    }

    public function sekretaris()
    {
        $this->cat_login->is_login();

        $catalyst['header'] = 'admin-main-header';
        $catalyst['label'] = $this->_admin;
        $catalyst['themes'] = "sekretaris";
        $catalyst['processor'] = null;
        $catalyst['footer'] = null; 

        $catalyst = $this->catalyst->enables('morris,flot,table',$catalyst);

        $data['raw_sekretaris'] = $this->cat_model->getall('governance_sekretaris_id');

        $this->catalyst->render($catalyst, $data);

    }

     public function edit_sekretaris()
    {
        $url = $this->uri->uri_string();
        $url = explode('/',$url);

        $id = $url[count($url)-1];

        $click = $this->input->post('btn-edpre');

        $config = array(
                    'admin/sekretaris' => 
                    array(
                      array(
                              'type' => 'textarea',
                              'name' => 'descriptor',
                              'class' => 'form-control',
                              'value' => set_value('descriptor'),
                              'rules' => 'trim|required'
                           ),
                      array(
                              'type' => 'textarea',
                              'name' => 'tugas',
                              'class' => 'form-control',
                              'value' => set_value('tugas'),
                              'rules' => 'trim|required'
                           ),
                      array(
                              'type' => 'text',
                              'name' => 'filetitle',
                              'class' => 'form-control',
                              'value' => set_value('filetitle'),
                              'rules' => 'trim|required'
                           ),
                      array(
                              'type' => 'file',
                              'name' => 'userfile',
                              'path' => '/assets/file/governance/',
                              'allowed' => 'pdf',
                              'size' => '0',
                              'width' => '4000',
                              'height' => '4000'

                           )                      
                    )
                );

        $detail = $this->cat_form->validator($config,false,true);

        $var = array('table' => 'governance_sekretaris_id', 
                         'condition' => 'id = '.$id.''
                        );
            // var_dump($var);
            $this->cat_model->update($var,$detail);
            echo '<script>window.location.href = "'.base_url('admin/sekretaris').'"</script>';
       
    }

    public function secretary()
    {
        $this->cat_login->is_login();

        $catalyst['header'] = 'admin-main-header';
        $catalyst['label'] = $this->_admin;
        $catalyst['themes'] = "secretary";
        $catalyst['processor'] = null;
        $catalyst['footer'] = null; 

        $catalyst = $this->catalyst->enables('morris,flot,table',$catalyst);

        $data['raw_secretary'] = $this->cat_model->getall('governance_sekretaris');

        $this->catalyst->render($catalyst, $data);

    }

     public function edit_secretary()
    {
        $url = $this->uri->uri_string();
        $url = explode('/',$url);

        $id = $url[count($url)-1];

        $click = $this->input->post('btn-edpre');

        $config = array(
                    'admin/secretary' => 
                    array(
                      array(
                              'type' => 'textarea',
                              'name' => 'descriptor',
                              'class' => 'form-control',
                              'value' => set_value('descriptor'),
                              'rules' => 'trim|required'
                           ),
                      array(
                              'type' => 'textarea',
                              'name' => 'tugas',
                              'class' => 'form-control',
                              'value' => set_value('tugas'),
                              'rules' => 'trim|required'
                           ),
                      array(
                              'type' => 'text',
                              'name' => 'filetitle',
                              'class' => 'form-control',
                              'value' => set_value('filetitle'),
                              'rules' => 'trim|required'
                           ),
                      array(
                              'type' => 'file',
                              'name' => 'userfile',
                              'path' => '/assets/file/governance/',
                              'allowed' => 'pdf',
                              'size' => '0',
                              'width' => '4000',
                              'height' => '4000'

                           )                      
                    )
                );

        $detail = $this->cat_form->validator($config,false,true);

        $var = array('table' => 'governance_sekretaris', 
                         'condition' => 'id = '.$id.''
                        );
            // var_dump($var);
            $this->cat_model->update($var,$detail);
            echo '<script>window.location.href = "'.base_url('admin/secretary').'"</script>';
       
    }

    public function profilsekretaris()
    {
        $this->cat_login->is_login();

        $catalyst['header'] = 'admin-main-header';
        $catalyst['label'] = $this->_admin;
        $catalyst['themes'] = "profilsekretaris";
        $catalyst['processor'] = null;
        $catalyst['footer'] = null; 

        $catalyst = $this->catalyst->enables('morris,flot,table',$catalyst);

        $data['raw_profilsekretaris'] = $this->cat_model->getall('governance_sekretaris_profile_id');

        $this->catalyst->render($catalyst, $data);

    }

    public function edit_profilsekretaris()
    {
        $url = $this->uri->uri_string();
        $url = explode('/',$url);

        $id = $url[count($url)-1];

        $click = $this->input->post('btn-edpre');

        $config = array(
                    'admin/profilsekretaris' => 
                    array(
                      array(
                              'type' => 'text',
                              'name' => 'nama',
                              'class' => 'form-control',
                              'value' => set_value('nama'),
                              'rules' => 'trim|required'
                           ),
                      array(
                              'type' => 'textarea',
                              'name' => 'descriptor_profile',
                              'class' => 'form-control',
                              'value' => set_value('descriptor'),
                              'rules' => 'trim|required'
                           ),
                      array(
                              'type' => 'file',
                              'name' => 'userfile',
                              'path' => '/assets/image/governance/',
                              'allowed' => 'jpg|jpeg|png',
                              'size' => '0',
                              'width' => '4000',
                              'height' => '4000'

                           )                      
                    )
                );

        $detail = $this->cat_form->validator($config,false,true);
        if ( $detail['userfile'] == "" ){
          $config = array(
                    'admin/profilsekretaris' => 
                    array(
                      array(
                              'type' => 'text',
                              'name' => 'nama',
                              'class' => 'form-control',
                              'value' => set_value('nama'),
                              'rules' => 'trim|required'
                           ),
                      array(
                              'type' => 'textarea',
                              'name' => 'descriptor_profile',
                              'class' => 'form-control',
                              'value' => set_value('descriptor'),
                              'rules' => 'trim|required'
                           )));
          $detail = $this->cat_form->validator($config,false,true);
        }
        $var = array('table' => 'governance_sekretaris_profile_id', 
                         'condition' => 'id = '.$id.''
                        );
            // var_dump($var);
            $this->cat_model->update($var,$detail);
            echo '<script>window.location.href = "'.base_url('admin/profilsekretaris').'"</script>';
       
    }

    public function secretaryprofile()
    {
        $this->cat_login->is_login();

        $catalyst['header'] = 'admin-main-header';
        $catalyst['label'] = $this->_admin;
        $catalyst['themes'] = "secretaryprofile";
        $catalyst['processor'] = null;
        $catalyst['footer'] = null; 

        $catalyst = $this->catalyst->enables('morris,flot,table',$catalyst);

        $data['raw_secretaryprofile'] = $this->cat_model->getall('governance_sekretaris_profile');

        $this->catalyst->render($catalyst, $data);

    }

    public function edit_secretaryprofile()
    {
        $url = $this->uri->uri_string();
        $url = explode('/',$url);

        $id = $url[count($url)-1];

        $click = $this->input->post('btn-edpre');

        $config = array(
                    'admin/secretaryprofile' => 
                    array(
                      array(
                              'type' => 'text',
                              'name' => 'nama',
                              'class' => 'form-control',
                              'value' => set_value('nama'),
                              'rules' => 'trim|required'
                           ),
                      array(
                              'type' => 'textarea',
                              'name' => 'descriptor_profile',
                              'class' => 'form-control',
                              'value' => set_value('descriptor'),
                              'rules' => 'trim|required'
                           ),
                      array(
                              'type' => 'file',
                              'name' => 'userfile',
                              'path' => '/assets/image/governance/',
                              'allowed' => 'jpg|jpeg|png',
                              'size' => '0',
                              'width' => '4000',
                              'height' => '4000'

                           )                      
                    )
                );

        $detail = $this->cat_form->validator($config,false,true);
        if ( $detail['userfile'] == "" ){
          $config = array(
                    'admin/secretaryprofile' => 
                    array(
                      array(
                              'type' => 'text',
                              'name' => 'nama',
                              'class' => 'form-control',
                              'value' => set_value('nama'),
                              'rules' => 'trim|required'
                           ),
                      array(
                              'type' => 'textarea',
                              'name' => 'descriptor_profile',
                              'class' => 'form-control',
                              'value' => set_value('descriptor'),
                              'rules' => 'trim|required'
                           )));
          $detail = $this->cat_form->validator($config,false,true);
        }
        $var = array('table' => 'governance_sekretaris_profile', 
                         'condition' => 'id = '.$id.''
                        );
            // var_dump($var);
            $this->cat_model->update($var,$detail);
            echo '<script>window.location.href = "'.base_url('admin/secretaryprofile').'"</script>';
       
    }

    public function relasi()
    {
        $this->cat_login->is_login();

        $catalyst['header'] = 'admin-main-header';
        $catalyst['label'] = $this->_admin;
        $catalyst['themes'] = "relasi";
        $catalyst['processor'] = null;
        $catalyst['footer'] = null; 

        $catalyst = $this->catalyst->enables('morris,flot,table',$catalyst);

        $data['raw_relasi'] = $this->cat_model->getall('governance_hubungan_id');

        $this->catalyst->render($catalyst, $data);

    }

     public function edit_relasi()
    {
        $url = $this->uri->uri_string();
        $url = explode('/',$url);

        $id = $url[count($url)-1];

        $click = $this->input->post('btn-edpre');

        $config = array(
                    'admin/relasi' => 
                    array(
                      array(
                              'type' => 'textarea',
                              'name' => 'descriptor',
                              'class' => 'form-control',
                              'value' => set_value('descriptor'),
                              'rules' => 'trim|required'
                           )                     
                    )
                );

        $detail = $this->cat_form->validator($config,false,true);

        $var = array('table' => 'governance_hubungan_id', 
                         'condition' => 'id = '.$id.''
                        );
            // var_dump($var);
            $this->cat_model->update($var,$detail);
            echo '<script>window.location.href = "'.base_url('admin/relasi').'"</script>';
       
    }

    public function relation()
    {
        $this->cat_login->is_login();

        $catalyst['header'] = 'admin-main-header';
        $catalyst['label'] = $this->_admin;
        $catalyst['themes'] = "relation";
        $catalyst['processor'] = null;
        $catalyst['footer'] = null; 

        $catalyst = $this->catalyst->enables('morris,flot,table',$catalyst);

        $data['raw_relation'] = $this->cat_model->getall('governance_hubungan');

        $this->catalyst->render($catalyst, $data);

    }

     public function edit_relation()
    {
        $url = $this->uri->uri_string();
        $url = explode('/',$url);

        $id = $url[count($url)-1];

        $click = $this->input->post('btn-edpre');

        $config = array(
                    'admin/relation' => 
                    array(
                      array(
                              'type' => 'textarea',
                              'name' => 'descriptor',
                              'class' => 'form-control',
                              'value' => set_value('descriptor'),
                              'rules' => 'trim|required'
                           )                     
                    )
                );

        $detail = $this->cat_form->validator($config,false,true);

        $var = array('table' => 'governance_hubungan', 
                         'condition' => 'id = '.$id.''
                        );
            // var_dump($var);
            $this->cat_model->update($var,$detail);
            echo '<script>window.location.href = "'.base_url('admin/relation').'"</script>';
       
    }

// INVESTOR INVESTOR INVESTOR INVESTOR INVESTOR

    public function investorsekilas()
    {
        $this->cat_login->is_login();

        $catalyst['header'] = 'admin-main-header';
        $catalyst['label'] = $this->_admin;
        $catalyst['themes'] = "investorsekilas";
        $catalyst['processor'] = null;
        $catalyst['footer'] = null; 

        $catalyst = $this->catalyst->enables('morris,flot,table',$catalyst);

        $data['raw_investorsekilas'] = $this->cat_model->getall('investor_front_id');

        $this->catalyst->render($catalyst, $data);

    }

     public function edit_investorsekilas()
    {
        $url = $this->uri->uri_string();
        $url = explode('/',$url);

        $id = $url[count($url)-1];

        $click = $this->input->post('btn-edpre');

        $config = array(
                    'admin/investorsekilas' => 
                    array(
                      array(
                              'type' => 'textarea',
                              'name' => 'descriptor',
                              'class' => 'form-control',
                              'value' => set_value('descriptor'),
                              'rules' => 'trim|required'
                           )                  
                    )
                );

        $detail = $this->cat_form->validator($config,false,true);

        $var = array('table' => 'investor_front_id', 
                         'condition' => 'id = '.$id.''
                        );
            // var_dump($var);
            $this->cat_model->update($var,$detail);
            echo '<script>window.location.href = "'.base_url('admin/investorsekilas').'"</script>';
       
    }

    public function investorglance()
    {
        $this->cat_login->is_login();

        $catalyst['header'] = 'admin-main-header';
        $catalyst['label'] = $this->_admin;
        $catalyst['themes'] = "investorglance";
        $catalyst['processor'] = null;
        $catalyst['footer'] = null; 

        $catalyst = $this->catalyst->enables('morris,flot,table',$catalyst);

        $data['raw_investorglance'] = $this->cat_model->getall('investor_front');

        $this->catalyst->render($catalyst, $data);

    }

     public function edit_investorglance()
    {
        $url = $this->uri->uri_string();
        $url = explode('/',$url);

        $id = $url[count($url)-1];

        $click = $this->input->post('btn-edpre');

        $config = array(
                    'admin/investorglance' => 
                    array(
                      array(
                              'type' => 'textarea',
                              'name' => 'descriptor',
                              'class' => 'form-control',
                              'value' => set_value('descriptor'),
                              'rules' => 'trim|required'
                           )                  
                    )
                );

        $detail = $this->cat_form->validator($config,false,true);

        $var = array('table' => 'investor_front', 
                         'condition' => 'id = '.$id.''
                        );
            // var_dump($var);
            $this->cat_model->update($var,$detail);
            echo '<script>window.location.href = "'.base_url('admin/investorglance').'"</script>';
       
    }

    public function laporankeuangan()
    {
        $this->cat_login->is_login();

        $catalyst['header'] = 'admin-main-header';
        $catalyst['label'] = $this->_admin;
        $catalyst['themes'] = "laporankeuangan";
        $catalyst['processor'] = null;
        $catalyst['footer'] = null; 

        $catalyst = $this->catalyst->enables('morris,flot,table',$catalyst);

        $var = array('table' => 'investor_financial',
                             'condition' => 'active = "1" order by year desc',
                            );

        $data['raw_laporankeuangan'] = $this->cat_model->get_allcondition($var);

        $this->catalyst->render($catalyst, $data);

    }

     public function edit_laporankeuangan()
    {
        $url = $this->uri->uri_string();
        $url = explode('/',$url);

        $id = $url[count($url)-1];

        $click = $this->input->post('btn-edpre');

        $config = array(
                    'admin/laporankeuangan' => 
                    array(
                      array(
                              'type' => 'text',
                              'name' => 'title',
                              'class' => 'form-control',
                              'value' => set_value('title'),
                              'rules' => 'trim|required'
                           ),
                      array(
                              'type' => 'text',
                              'name' => 'title_en',
                              'class' => 'form-control',
                              'value' => set_value('title_en'),
                              'rules' => 'trim|required'
                           ),
                      array(
                              'type' => 'text',
                              'name' => 'year',
                              'class' => 'form-control',
                              'value' => set_value('year'),
                              'rules' => 'trim|required'
                           ),
                      array(
                              'type' => 'file',
                              'name' => 'userfile',
                              'path' => '/assets/file/investor/financial/',
                              'allowed' => 'pdf',
                              'size' => '0',
                              'width' => '4000',
                              'height' => '4000'

                           )                      
                    )
                );

        $detail = $this->cat_form->validator($config,false,true);
        if ( $detail['userfile'] == "" ){
           $config = array(
                    'admin/laporankeuangan' => 
                    array(
                      array(
                              'type' => 'text',
                              'name' => 'title',
                              'class' => 'form-control',
                              'value' => set_value('title'),
                              'rules' => 'trim|required'
                           ),
                      array(
                              'type' => 'text',
                              'name' => 'title_en',
                              'class' => 'form-control',
                              'value' => set_value('title_en'),
                              'rules' => 'trim|required'
                           ),
                      array(
                              'type' => 'text',
                              'name' => 'year',
                              'class' => 'form-control',
                              'value' => set_value('year'),
                              'rules' => 'trim|required'
                           )));
           $detail = $this->cat_form->validator($config,false,true);
        }
        $var = array('table' => 'investor_financial', 
                         'condition' => 'id = '.$id.''
                        );
            // var_dump($var);
            $this->cat_model->update($var,$detail);
           echo '<script>window.location.href = "'.base_url('admin/laporankeuangan').'"</script>';
       
    }

    public function add_laporankeuangan()
    {
       $config = array(
                    'admin/laporankeuangan' => 
                    array(
                      array(
                              'type' => 'text',
                              'name' => 'title',
                              'class' => 'form-control',
                              'value' => set_value('title'),
                              'rules' => 'trim|required'
                           ),
                      array(
                              'type' => 'text',
                              'name' => 'title_en',
                              'class' => 'form-control',
                              'value' => set_value('title_en'),
                              'rules' => 'trim|required'
                           ),
                      array(
                              'type' => 'text',
                              'name' => 'year',
                              'class' => 'form-control',
                              'value' => set_value('year'),
                              'rules' => 'trim|required'
                           ),
                      array(
                              'type' => 'file',
                              'name' => 'userfile',
                              'path' => '/assets/file/investor/financial/',
                              'allowed' => 'pdf',
                              'size' => '0',
                              'width' => '4000',
                              'height' => '4000'

                           ),
                      array(
                              'type' => 'text',
                              'name' => 'active',
                              'class' => 'form-control',
                              'value' => '1'
                           ),              
                    )
                );

            $detail = $this->cat_form->validator($config,false,true);
            $this->cat_model->insert('investor_financial',$detail);
            echo '<script>window.location.href = "'.base_url('admin/laporankeuangan').'"</script>';
    }

    public function delete_laporankeuangan()
    {
        $url = $this->uri->uri_string();
        $url = explode('/',$url);

        $id = $url[count($url)-1];

        $this->db->delete('investor_financial', array('id' => $id)); 
        echo '<script>window.location.href = "'.base_url('admin/laporankeuangan').'"</script>';
    }

    public function laporantahunan()
    {
        $this->cat_login->is_login();

        $catalyst['header'] = 'admin-main-header';
        $catalyst['label'] = $this->_admin;
        $catalyst['themes'] = "laporantahunan";
        $catalyst['processor'] = null;
        $catalyst['footer'] = null; 

        $catalyst = $this->catalyst->enables('morris,flot,table',$catalyst);

        $var = array('table' => 'investor_annual',
                             'condition' => 'active = "1" order by id asc',
                            );

        $data['raw_laporantahunan'] = $this->cat_model->get_allcondition($var);

        $this->catalyst->render($catalyst, $data);

    }

     public function edit_laporantahunan()
    {
        $url = $this->uri->uri_string();
        $url = explode('/',$url);

        $id = $url[count($url)-1];

        $click = $this->input->post('btn-edpre');

        $config = array(
                    'admin/laporantahunan' => 
                    array(
                      array(
                              'type' => 'text',
                              'name' => 'title',
                              'class' => 'form-control',
                              'value' => set_value('title'),
                              'rules' => 'trim|required'
                           ),
                      array(
                              'type' => 'text',
                              'name' => 'title_en',
                              'class' => 'form-control',
                              'value' => set_value('title_en'),
                              'rules' => 'trim|required'
                           ),
                      array(
                              'type' => 'file',
                              'name' => 'userfile',
                              'path' => '/assets/file/investor/annual/',
                              'allowed' => 'pdf',
                              'size' => '0',
                              'width' => '4000',
                              'height' => '4000'

                           )                      
                    )
                );

        $detail = $this->cat_form->validator($config,false,true);
        if ( $detail['userfile'] == "" ){

          $config = array(
                    'admin/laporantahunan' => 
                    array(
                      array(
                              'type' => 'text',
                              'name' => 'title',
                              'class' => 'form-control',
                              'value' => set_value('title'),
                              'rules' => 'trim|required'
                           ),
                      array(
                              'type' => 'text',
                              'name' => 'title_en',
                              'class' => 'form-control',
                              'value' => set_value('title_en'),
                              'rules' => 'trim|required'
                           )));
          $detail = $this->cat_form->validator($config,false,true);
        }
        $var = array('table' => 'investor_annual', 
                         'condition' => 'id = '.$id.''
                        );
            // var_dump($var);
            $this->cat_model->update($var,$detail);
           echo '<script>window.location.href = "'.base_url('admin/laporantahunan').'"</script>';
       
    }

    public function add_laporantahunan()
    {
       $config = array(
                    'admin/laporantahunan' => 
                    array(
                      array(
                              'type' => 'text',
                              'name' => 'title',
                              'class' => 'form-control',
                              'value' => set_value('title'),
                              'rules' => 'trim|required'
                           ),
                      array(
                              'type' => 'text',
                              'name' => 'title_en',
                              'class' => 'form-control',
                              'value' => set_value('title_en'),
                              'rules' => 'trim|required'
                           ),
                      array(
                              'type' => 'file',
                              'name' => 'userfile',
                              'path' => '/assets/file/investor/annual/',
                              'allowed' => 'pdf',
                              'size' => '0',
                              'width' => '4000',
                              'height' => '4000'

                           ),
                      array(
                              'type' => 'text',
                              'name' => 'active',
                              'class' => 'form-control',
                              'value' => '1'
                           ),              
                    )
                );

            $detail = $this->cat_form->validator($config,false,true);
            $this->cat_model->insert('investor_annual',$detail);
            echo '<script>window.location.href = "'.base_url('admin/laporantahunan').'"</script>';
    }

    public function delete_laporantahunan()
    {
        $url = $this->uri->uri_string();
        $url = explode('/',$url);

        $id = $url[count($url)-1];

        $this->db->delete('investor_annual', array('id' => $id)); 
        echo '<script>window.location.href = "'.base_url('admin/laporantahunan').'"</script>';
    }

    public function laporanprospektus()
    {
        $this->cat_login->is_login();

        $catalyst['header'] = 'admin-main-header';
        $catalyst['label'] = $this->_admin;
        $catalyst['themes'] = "laporanprospektus";
        $catalyst['processor'] = null;
        $catalyst['footer'] = null; 

        $catalyst = $this->catalyst->enables('morris,flot,table',$catalyst);

        $var = array('table' => 'investor_prospectus',
                             'condition' => 'active = "1" order by id asc',
                            );

        $data['raw_laporanprospektus'] = $this->cat_model->get_allcondition($var);

        $this->catalyst->render($catalyst, $data);

    }

     public function edit_laporanprospektus()
    {
        $url = $this->uri->uri_string();
        $url = explode('/',$url);

        $id = $url[count($url)-1];

        $click = $this->input->post('btn-edpre');

        $config = array(
                    'admin/laporanprospektus' => 
                    array(
                      array(
                              'type' => 'text',
                              'name' => 'title',
                              'class' => 'form-control',
                              'value' => set_value('title'),
                              'rules' => 'trim|required'
                           ),
                      array(
                              'type' => 'text',
                              'name' => 'title_en',
                              'class' => 'form-control',
                              'value' => set_value('title_en'),
                              'rules' => 'trim|required'
                           ),
                      array(
                              'type' => 'file',
                              'name' => 'userfile',
                              'path' => '/assets/file/investor/prospectus/',
                              'allowed' => 'pdf',
                              'size' => '0',
                              'width' => '4000',
                              'height' => '4000'

                           )                      
                    )
                );

        $detail = $this->cat_form->validator($config,false,true);
        if ( $detail['userfile'] == "" ){
           $config = array(
                    'admin/laporanprospektus' => 
                    array(
                      array(
                              'type' => 'text',
                              'name' => 'title',
                              'class' => 'form-control',
                              'value' => set_value('title'),
                              'rules' => 'trim|required'
                           ),
                      array(
                              'type' => 'text',
                              'name' => 'title_en',
                              'class' => 'form-control',
                              'value' => set_value('title_en'),
                              'rules' => 'trim|required'
                           )));
           $detail = $this->cat_form->validator($config,false,true);
        }
        $var = array('table' => 'investor_prospectus', 
                         'condition' => 'id = '.$id.''
                        );
            // var_dump($var);
            $this->cat_model->update($var,$detail);
           echo '<script>window.location.href = "'.base_url('admin/laporanprospektus').'"</script>';
       
    }

    public function add_laporanprospektus()
    {
       $config = array(
                    'admin/laporanprospektus' => 
                    array(
                      array(
                              'type' => 'text',
                              'name' => 'title',
                              'class' => 'form-control',
                              'value' => set_value('title'),
                              'rules' => 'trim|required'
                           ),
                      array(
                              'type' => 'text',
                              'name' => 'title_en',
                              'class' => 'form-control',
                              'value' => set_value('title_en'),
                              'rules' => 'trim|required'
                           ),
                      array(
                              'type' => 'file',
                              'name' => 'userfile',
                              'path' => '/assets/file/investor/prospectus/',
                              'allowed' => 'pdf',
                              'size' => '0',
                              'width' => '4000',
                              'height' => '4000'

                           ),
                      array(
                              'type' => 'text',
                              'name' => 'active',
                              'class' => 'form-control',
                              'value' => '1'
                           ),              
                    )
                );

            $detail = $this->cat_form->validator($config,false,true);
            $this->cat_model->insert('investor_prospectus',$detail);
            echo '<script>window.location.href = "'.base_url('admin/laporanprospektus').'"</script>';
    }

    public function delete_laporanprospektus()
    {
        $url = $this->uri->uri_string();
        $url = explode('/',$url);

        $id = $url[count($url)-1];

        $this->db->delete('investor_prospectus', array('id' => $id)); 
        echo '<script>window.location.href = "'.base_url('admin/laporanprospektus').'"</script>';
    }

    public function laporananalis()
    {
        $this->cat_login->is_login();

        $catalyst['header'] = 'admin-main-header';
        $catalyst['label'] = $this->_admin;
        $catalyst['themes'] = "laporananalis";
        $catalyst['processor'] = null;
        $catalyst['footer'] = null; 

        $catalyst = $this->catalyst->enables('morris,flot,table',$catalyst);

        $var = array('table' => 'investor_analyst',
                             'condition' => 'active = "1" order by id asc',
                            );

        $data['raw_laporananalis'] = $this->cat_model->get_allcondition($var);

        $this->catalyst->render($catalyst, $data);

    }

     public function edit_laporananalis()
    {
        $url = $this->uri->uri_string();
        $url = explode('/',$url);

        $id = $url[count($url)-1];

        $click = $this->input->post('btn-edpre');

        $config = array(
                    'admin/laporananalis' => 
                    array(
                      array(
                              'type' => 'text',
                              'name' => 'title',
                              'class' => 'form-control',
                              'value' => set_value('title'),
                              'rules' => 'trim|required'
                           ),
                      array(
                              'type' => 'text',
                              'name' => 'title_en',
                              'class' => 'form-control',
                              'value' => set_value('title_en'),
                              'rules' => 'trim|required'
                           ),
                      array(
                              'type' => 'file',
                              'name' => 'userfile',
                              'path' => '/assets/file/investor/analyst/',
                              'allowed' => 'pdf',
                              'size' => '0',
                              'width' => '4000',
                              'height' => '4000'

                           )                      
                    )
                );

        $detail = $this->cat_form->validator($config,false,true);
        if ( $detail['userfile'] == "" ){
          $config = array(
                    'admin/laporananalis' => 
                    array(
                      array(
                              'type' => 'text',
                              'name' => 'title',
                              'class' => 'form-control',
                              'value' => set_value('title'),
                              'rules' => 'trim|required'
                           ),
                      array(
                              'type' => 'text',
                              'name' => 'title_en',
                              'class' => 'form-control',
                              'value' => set_value('title_en'),
                              'rules' => 'trim|required'
                           )));
          $detail = $this->cat_form->validator($config,false,true);
        }
        $var = array('table' => 'investor_analyst', 
                         'condition' => 'id = '.$id.''
                        );
            // var_dump($var);
            $this->cat_model->update($var,$detail);
           echo '<script>window.location.href = "'.base_url('admin/laporananalis').'"</script>';
       
    }

    public function add_laporananalis()
    {
       $config = array(
                    'admin/laporananalis' => 
                    array(
                      array(
                              'type' => 'text',
                              'name' => 'title',
                              'class' => 'form-control',
                              'value' => set_value('title'),
                              'rules' => 'trim|required'
                           ),
                      array(
                              'type' => 'text',
                              'name' => 'title_en',
                              'class' => 'form-control',
                              'value' => set_value('title_en'),
                              'rules' => 'trim|required'
                           ),
                      array(
                              'type' => 'file',
                              'name' => 'userfile',
                              'path' => '/assets/file/investor/analyst/',
                              'allowed' => 'pdf',
                              'size' => '0',
                              'width' => '4000',
                              'height' => '4000'

                           ),
                      array(
                              'type' => 'text',
                              'name' => 'active',
                              'class' => 'form-control',
                              'value' => '1'
                           ),              
                    )
                );

            $detail = $this->cat_form->validator($config,false,true);
            $this->cat_model->insert('investor_analyst',$detail);
            echo '<script>window.location.href = "'.base_url('admin/laporananalis').'"</script>';
    }

    public function delete_laporananalis()
    {
        $url = $this->uri->uri_string();
        $url = explode('/',$url);

        $id = $url[count($url)-1];

        $this->db->delete('investor_analyst', array('id' => $id)); 
        echo '<script>window.location.href = "'.base_url('admin/laporananalis').'"</script>';
    }

    public function sahamkomposisi()
    {
        $this->cat_login->is_login();

        $catalyst['header'] = 'admin-main-header';
        $catalyst['label'] = $this->_admin;
        $catalyst['themes'] = "sahamkomposisi";
        $catalyst['processor'] = null;
        $catalyst['footer'] = null; 

        $catalyst = $this->catalyst->enables('morris,flot,table',$catalyst);

        $data['raw_sahamkomposisi'] = $this->cat_model->getall('investor_composition');

        $this->catalyst->render($catalyst, $data);

    }

     public function edit_sahamkomposisi()
    {
        $url = $this->uri->uri_string();
        $url = explode('/',$url);

        $id = $url[count($url)-1];

        $click = $this->input->post('btn-edpre');

        $config = array(
                    'admin/sahamkomposisi' => 
                    array(
                      array(
                              'type' => 'file',
                              'name' => 'userfile',
                              'path' => '/assets/image/investor/',
                              'allowed' => 'jpg|jpeg|png',
                              'size' => '0',
                              'width' => '4000',
                              'height' => '4000'

                           )                      
                    )
                );

        $detail = $this->cat_form->validator($config,false,true);

        $var = array('table' => 'investor_composition', 
                         'condition' => 'id = '.$id.''
                        );
            // var_dump($var);
            $this->cat_model->update($var,$detail);
            echo '<script>window.location.href = "'.base_url('admin/sahamkomposisi').'"</script>';
       
    }

    public function sahamstruktur()
    {
        $this->cat_login->is_login();

        $catalyst['header'] = 'admin-main-header';
        $catalyst['label'] = $this->_admin;
        $catalyst['themes'] = "sahamstruktur";
        $catalyst['processor'] = null;
        $catalyst['footer'] = null; 

        $catalyst = $this->catalyst->enables('morris,flot,table',$catalyst);

        $data['raw_sahamstruktur'] = $this->cat_model->getall('investor_shareholder');

        $this->catalyst->render($catalyst, $data);

    }

     public function edit_sahamstruktur()
    {
        $url = $this->uri->uri_string();
        $url = explode('/',$url);

        $id = $url[count($url)-1];

        $click = $this->input->post('btn-edpre');

        $config = array(
                    'admin/sahamstruktur' => 
                    array(
                      array(
                              'type' => 'file',
                              'name' => 'userfile',
                              'path' => '/assets/image/investor/shareholder/',
                              'allowed' => 'jpg|jpeg|png',
                              'size' => '0',
                              'width' => '6000',
                              'height' => '6000'

                           )                      
                    )
                );

        $detail = $this->cat_form->validator($config,false,true);

        $var = array('table' => 'investor_shareholder', 
                         'condition' => 'id = '.$id.''
                        );
            // var_dump($var);
            $this->cat_model->update($var,$detail);
            echo '<script>window.location.href = "'.base_url('admin/sahamstruktur').'"</script>';
       
    }

    public function sahaminformasi()
    {
        $this->cat_login->is_login();

        $catalyst['header'] = 'admin-main-header';
        $catalyst['label'] = $this->_admin;
        $catalyst['themes'] = "sahaminformasi";
        $catalyst['processor'] = null;
        $catalyst['footer'] = null; 

        $catalyst = $this->catalyst->enables('morris,flot,table',$catalyst);

        $data['raw_sahaminformasi'] = $this->cat_model->getall('investor_stockinformation_up_id');

        $this->catalyst->render($catalyst, $data);

    }

     public function edit_sahaminformasi()
    {
        $url = $this->uri->uri_string();
        $url = explode('/',$url);

        $id = $url[count($url)-1];

        $click = $this->input->post('btn-edpre');

        $config = array(
                    'admin/sahaminformasi' => 
                    array(
                      array(
                              'type' => 'text',
                              'name' => 'title',
                              'class' => 'form-control',
                              'value' => set_value('title'),
                              'rules' => 'trim|required'
                           ),
                      array(
                              'type' => 'text',
                              'name' => 'name',
                              'class' => 'form-control',
                              'value' => set_value('name'),
                              'rules' => 'trim|required'
                           ),
                      array(
                              'type' => 'textarea',
                              'name' => 'content',
                              'class' => 'form-control',
                              'value' => set_value('content'),
                              'rules' => 'trim|required'
                           )                
                    )
                );

        $detail = $this->cat_form->validator($config,false,true);

        $var = array('table' => 'investor_stockinformation_up_id', 
                         'condition' => 'id = '.$id.''
                        );
            // var_dump($var);
            $this->cat_model->update($var,$detail);
            echo '<script>window.location.href = "'.base_url('admin/sahaminformasi').'"</script>';
       
    }

    public function add_sahaminformasi()
    {
       $config = array(
                    'admin/sahaminformasi' => 
                    array(
                      array(
                              'type' => 'text',
                              'name' => 'title',
                              'class' => 'form-control',
                              'value' => set_value('title'),
                              'rules' => 'trim|required'
                           ),
                      array(
                              'type' => 'text',
                              'name' => 'name',
                              'class' => 'form-control',
                              'value' => set_value('name'),
                              'rules' => 'trim|required'
                           ),
                      array(
                              'type' => 'textarea',
                              'name' => 'content',
                              'class' => 'form-control',
                              'value' => set_value('content'),
                              'rules' => 'trim|required'
                           ),
                      array(
                              'type' => 'text',
                              'name' => 'active',
                              'class' => 'form-control',
                              'value' => '1'
                           ),              
                    )
                );

            $detail = $this->cat_form->validator($config,false,true);
            if ( $detail['content'] == "" ){
              $detail['content'] = "<p></p>";
            }
            $this->cat_model->insert('investor_stockinformation_up_id',$detail);
            echo '<script>window.location.href = "'.base_url('admin/sahaminformasi').'"</script>';
    }

    public function delete_sahaminformasi()
    {
        $url = $this->uri->uri_string();
        $url = explode('/',$url);

        $id = $url[count($url)-1];

        $this->db->delete('investor_stockinformation_up_id', array('id' => $id)); 
        echo '<script>window.location.href = "'.base_url('admin/sahaminformasi').'"</script>';
    }

    public function stockinformation()
    {
        $this->cat_login->is_login();

        $catalyst['header'] = 'admin-main-header';
        $catalyst['label'] = $this->_admin;
        $catalyst['themes'] = "stockinformation";
        $catalyst['processor'] = null;
        $catalyst['footer'] = null; 

        $catalyst = $this->catalyst->enables('morris,flot,table',$catalyst);

        $data['raw_stockinformation'] = $this->cat_model->getall('investor_stockinformation_up');

        $this->catalyst->render($catalyst, $data);

    }

     public function edit_stockinformation()
    {
        $url = $this->uri->uri_string();
        $url = explode('/',$url);

        $id = $url[count($url)-1];

        $click = $this->input->post('btn-edpre');

        $config = array(
                    'admin/stockinformation' => 
                    array(
                      array(
                              'type' => 'text',
                              'name' => 'title',
                              'class' => 'form-control',
                              'value' => set_value('title'),
                              'rules' => 'trim|required'
                           ),
                      array(
                              'type' => 'text',
                              'name' => 'name',
                              'class' => 'form-control',
                              'value' => set_value('name'),
                              'rules' => 'trim|required'
                           ),
                      array(
                              'type' => 'textarea',
                              'name' => 'content',
                              'class' => 'form-control',
                              'value' => set_value('content'),
                              'rules' => 'trim|required'
                           )                
                    )
                );

        $detail = $this->cat_form->validator($config,false,true);

        $var = array('table' => 'investor_stockinformation_up', 
                         'condition' => 'id = '.$id.''
                        );
            // var_dump($var);
            $this->cat_model->update($var,$detail);
            echo '<script>window.location.href = "'.base_url('admin/stockinformation').'"</script>';
       
    }

    public function add_stockinformation()
    {
       $config = array(
                    'admin/stockinformation' => 
                    array(
                      array(
                              'type' => 'text',
                              'name' => 'title',
                              'class' => 'form-control',
                              'value' => set_value('title'),
                              'rules' => 'trim|required'
                           ),
                      array(
                              'type' => 'text',
                              'name' => 'name',
                              'class' => 'form-control',
                              'value' => set_value('name'),
                              'rules' => 'trim|required'
                           ),
                      array(
                              'type' => 'textarea',
                              'name' => 'content',
                              'class' => 'form-control',
                              'value' => set_value('content'),
                              'rules' => 'trim|required'
                           ),
                      array(
                              'type' => 'text',
                              'name' => 'active',
                              'class' => 'form-control',
                              'value' => '1'
                           ),              
                    )
                );

            $detail = $this->cat_form->validator($config,false,true);
            if ( $detail['content'] == "" ){
              $detail['content'] = "<p></p>";
            }
            $this->cat_model->insert('investor_stockinformation_up',$detail);
            echo '<script>window.location.href = "'.base_url('admin/stockinformation').'"</script>';
    }

    public function delete_stockinformation()
    {
        $url = $this->uri->uri_string();
        $url = explode('/',$url);

        $id = $url[count($url)-1];

        $this->db->delete('investor_stockinformation_up', array('id' => $id)); 
        echo '<script>window.location.href = "'.base_url('admin/stockinformation').'"</script>';
    }

    public function regulasi()
    {
        $this->cat_login->is_login();

        $catalyst['header'] = 'admin-main-header';
        $catalyst['label'] = $this->_admin;
        $catalyst['themes'] = "regulasi";
        $catalyst['processor'] = null;
        $catalyst['footer'] = null; 

        $catalyst = $this->catalyst->enables('morris,flot,table',$catalyst);

        $var = array('table' => 'investor_filling',
                             'condition' => 'active = "1" order by year desc, id desc',
                            );

        $data['raw_regulasi'] = $this->cat_model->get_allcondition($var);

        $this->catalyst->render($catalyst, $data);

    }

     public function edit_regulasi()
    {
        $url = $this->uri->uri_string();
        $url = explode('/',$url);

        $id = $url[count($url)-1];

        $click = $this->input->post('btn-edpre');

        $config = array(
                    'admin/regulasi' => 
                    array(
                      array(
                              'type' => 'text',
                              'name' => 'title',
                              'class' => 'form-control',
                              'value' => set_value('title'),
                              'rules' => 'trim|required'
                           ),
                      array(
                              'type' => 'text',
                              'name' => 'year',
                              'class' => 'form-control',
                              'value' => set_value('year'),
                              'rules' => 'trim|required'
                           ),
                      array(
                              'type' => 'file',
                              'name' => 'userfile',
                              'path' => '/assets/file/investor/filling/',
                              'allowed' => 'pdf',
                              'size' => '0',
                              'width' => '4000',
                              'height' => '4000'

                           )                      
                    )
                );

        $detail = $this->cat_form->validator($config,false,true);

        $var = array('table' => 'investor_filling', 
                         'condition' => 'id = '.$id.''
                        );
            // var_dump($var);
            $this->cat_model->update($var,$detail);
           echo '<script>window.location.href = "'.base_url('admin/regulasi').'"</script>';
       
    }

    public function add_regulasi()
    {
       $config = array(
                    'admin/regulasi' => 
                    array(
                      array(
                              'type' => 'text',
                              'name' => 'title',
                              'class' => 'form-control',
                              'value' => set_value('title'),
                              'rules' => 'trim|required'
                           ),
                      array(
                              'type' => 'text',
                              'name' => 'year',
                              'class' => 'form-control',
                              'value' => set_value('year'),
                              'rules' => 'trim|required'
                           ),
                      array(
                              'type' => 'file',
                              'name' => 'userfile',
                              'path' => '/assets/file/investor/filling/',
                              'allowed' => 'pdf',
                              'size' => '0',
                              'width' => '4000',
                              'height' => '4000'

                           ),
                      array(
                              'type' => 'text',
                              'name' => 'active',
                              'class' => 'form-control',
                              'value' => '1'
                           ),              
                    )
                );

            $detail = $this->cat_form->validator($config,false,true);
            $this->cat_model->insert('investor_filling',$detail);
            echo '<script>window.location.href = "'.base_url('admin/regulasi').'"</script>';
    }

    public function delete_regulasi()
    {
        $url = $this->uri->uri_string();
        $url = explode('/',$url);

        $id = $url[count($url)-1];

        $this->db->delete('investor_filling', array('id' => $id)); 
        echo '<script>window.location.href = "'.base_url('admin/regulasi').'"</script>';
    }

    public function acarapresentasi()
    {
        $this->cat_login->is_login();

        $catalyst['header'] = 'admin-main-header';
        $catalyst['label'] = $this->_admin;
        $catalyst['themes'] = "acarapresentasi";
        $catalyst['processor'] = null;
        $catalyst['footer'] = null; 

        $catalyst = $this->catalyst->enables('morris,flot,table',$catalyst);

        $var = array('table' => 'investor_event',
                             'condition' => 'active = "1" order by year desc, id desc',
                            );

        $data['raw_acarapresentasi'] = $this->cat_model->get_allcondition($var);

        $this->catalyst->render($catalyst, $data);

    }

     public function edit_acarapresentasi()
    {
        $url = $this->uri->uri_string();
        $url = explode('/',$url);

        $id = $url[count($url)-1];

        $click = $this->input->post('btn-edpre');

        $config = array(
                    'admin/acarapresentasi' => 
                    array(
                      array(
                              'type' => 'text',
                              'name' => 'title',
                              'class' => 'form-control',
                              'value' => set_value('title'),
                              'rules' => 'trim|required'
                           ),
                      array(
                              'type' => 'text',
                              'name' => 'year',
                              'class' => 'form-control',
                              'value' => set_value('year'),
                              'rules' => 'trim|required'
                           ),
                      array(
                              'type' => 'file',
                              'name' => 'userfile',
                              'path' => '/assets/file/investor/event_and_presentation/',
                              'allowed' => 'pdf',
                              'size' => '0',
                              'width' => '4000',
                              'height' => '4000'

                           )                      
                    )
                );

        $detail = $this->cat_form->validator($config,false,true);
        if ( $detail['userfile'] == "" ){
          $config = array(
                    'admin/acarapresentasi' => 
                    array(
                      array(
                              'type' => 'text',
                              'name' => 'title',
                              'class' => 'form-control',
                              'value' => set_value('title'),
                              'rules' => 'trim|required'
                           ),
                      array(
                              'type' => 'text',
                              'name' => 'year',
                              'class' => 'form-control',
                              'value' => set_value('year'),
                              'rules' => 'trim|required'
                           )));
          $detail = $this->cat_form->validator($config,false,true);
        }
        $var = array('table' => 'investor_event', 
                         'condition' => 'id = '.$id.''
                        );
            // var_dump($var);
            $this->cat_model->update($var,$detail);
           echo '<script>window.location.href = "'.base_url('admin/acarapresentasi').'"</script>';
       
    }

    public function add_acarapresentasi()
    {
       $config = array(
                    'admin/acarapresentasi' => 
                    array(
                      array(
                              'type' => 'text',
                              'name' => 'title',
                              'class' => 'form-control',
                              'value' => set_value('title'),
                              'rules' => 'trim|required'
                           ),
                      array(
                              'type' => 'text',
                              'name' => 'year',
                              'class' => 'form-control',
                              'value' => set_value('year'),
                              'rules' => 'trim|required'
                           ),
                      array(
                              'type' => 'file',
                              'name' => 'userfile',
                              'path' => '/assets/file/investor/event_and_presentation/',
                              'allowed' => 'pdf',
                              'size' => '0',
                              'width' => '4000',
                              'height' => '4000'

                           ),
                      array(
                              'type' => 'text',
                              'name' => 'active',
                              'class' => 'form-control',
                              'value' => '1'
                           ),              
                    )
                );

            $detail = $this->cat_form->validator($config,false,true);
            $this->cat_model->insert('investor_event',$detail);
            echo '<script>window.location.href = "'.base_url('admin/acarapresentasi').'"</script>';
    }

    public function delete_acarapresentasi()
    {
        $url = $this->uri->uri_string();
        $url = explode('/',$url);

        $id = $url[count($url)-1];

        $this->db->delete('investor_event', array('id' => $id)); 
        echo '<script>window.location.href = "'.base_url('admin/acarapresentasi').'"</script>';
    }

    public function keterbukaan()
    {
        $this->cat_login->is_login();

        $catalyst['header'] = 'admin-main-header';
        $catalyst['label'] = $this->_admin;
        $catalyst['themes'] = "keterbukaan";
        $catalyst['processor'] = null;
        $catalyst['footer'] = null; 

        $catalyst = $this->catalyst->enables('morris,flot,table',$catalyst);

        $var = array('table' => 'investor_disclosure',
                             'condition' => 'active = "1" order by year desc, id desc',
                            );

        $data['raw_keterbukaan'] = $this->cat_model->get_allcondition($var);

        $this->catalyst->render($catalyst, $data);

    }

     public function edit_keterbukaan()
    {
        $url = $this->uri->uri_string();
        $url = explode('/',$url);

        $id = $url[count($url)-1];

        $click = $this->input->post('btn-edpre');

        $config = array(
                    'admin/keterbukaan' => 
                    array(
                      array(
                              'type' => 'text',
                              'name' => 'title',
                              'class' => 'form-control',
                              'value' => set_value('title'),
                              'rules' => 'trim|required'
                           ),
                      array(
                              'type' => 'text',
                              'name' => 'year',
                              'class' => 'form-control',
                              'value' => set_value('year'),
                              'rules' => 'trim|required'
                           ),
                      array(
                              'type' => 'file',
                              'name' => 'userfile',
                              'path' => '/assets/file/investor/disclosure/',
                              'allowed' => 'pdf',
                              'size' => '0',
                              'width' => '4000',
                              'height' => '4000'

                           )                      
                    )
                );

        $detail = $this->cat_form->validator($config,false,true);
        if ( $detail['userfile'] == "" ){
          $config = array(
                    'admin/keterbukaan' => 
                    array(
                      array(
                              'type' => 'text',
                              'name' => 'title',
                              'class' => 'form-control',
                              'value' => set_value('title'),
                              'rules' => 'trim|required'
                           ),
                      array(
                              'type' => 'text',
                              'name' => 'year',
                              'class' => 'form-control',
                              'value' => set_value('year'),
                              'rules' => 'trim|required'
                           )));
           $detail = $this->cat_form->validator($config,false,true);
        }
        $var = array('table' => 'investor_disclosure', 
                         'condition' => 'id = '.$id.''
                        );
            // var_dump($var);
            $this->cat_model->update($var,$detail);
           echo '<script>window.location.href = "'.base_url('admin/keterbukaan').'"</script>';
       
    }

    public function add_keterbukaan()
    {
       $config = array(
                    'admin/keterbukaan' => 
                    array(
                      array(
                              'type' => 'text',
                              'name' => 'title',
                              'class' => 'form-control',
                              'value' => set_value('title'),
                              'rules' => 'trim|required'
                           ),
                      array(
                              'type' => 'text',
                              'name' => 'year',
                              'class' => 'form-control',
                              'value' => set_value('year'),
                              'rules' => 'trim|required'
                           ),
                      array(
                              'type' => 'file',
                              'name' => 'userfile',
                              'path' => '/assets/file/investor/disclosure/',
                              'allowed' => 'pdf',
                              'size' => '0',
                              'width' => '4000',
                              'height' => '4000'

                           ),
                      array(
                              'type' => 'text',
                              'name' => 'active',
                              'class' => 'form-control',
                              'value' => '1'
                           ),              
                    )
                );

            $detail = $this->cat_form->validator($config,false,true);
            $this->cat_model->insert('investor_disclosure',$detail);
            echo '<script>window.location.href = "'.base_url('admin/keterbukaan').'"</script>';
    }

    public function delete_keterbukaan()
    {
        $url = $this->uri->uri_string();
        $url = explode('/',$url);

        $id = $url[count($url)-1];

        $this->db->delete('investor_disclosure', array('id' => $id)); 
        echo '<script>window.location.href = "'.base_url('admin/keterbukaan').'"</script>';
    }

    public function dividen()
    {
        $this->cat_login->is_login();

        $catalyst['header'] = 'admin-main-header';
        $catalyst['label'] = $this->_admin;
        $catalyst['themes'] = "dividen";
        $catalyst['processor'] = null;
        $catalyst['footer'] = null; 

        $catalyst = $this->catalyst->enables('morris,flot,table',$catalyst);

        $var = array('table' => 'investor_dividend_table',
                             'condition' => 'active = "1" order by year desc, id desc',
                            );

        $data['raw_dividen'] = $this->cat_model->get_allcondition($var);

        $this->catalyst->render($catalyst, $data);

    }

     public function edit_dividen()
    {
        $url = $this->uri->uri_string();
        $url = explode('/',$url);

        $id = $url[count($url)-1];

        $click = $this->input->post('btn-edpre');

        $config = array(
                    'admin/dividen' => 
                    array(
                      array(
                              'type' => 'text',
                              'name' => 'year',
                              'class' => 'form-control',
                              'value' => set_value('year'),
                              'rules' => 'trim|required'
                           ),
                      array(
                              'type' => 'text',
                              'name' => 'final',
                              'class' => 'form-control',
                              'value' => set_value('final'),
                              'rules' => 'trim|required'
                           ),
                      array(
                              'type' => 'date',
                              'name' => 'date'
                           ),
                      array(
                              'type' => 'text',
                              'name' => 'ratio',
                              'class' => 'form-control',
                              'value' => set_value('ratio'),
                              'rules' => 'trim|required'
                           ),
                      array(
                              'type' => 'text',
                              'name' => 'outstanding',
                              'class' => 'form-control',
                              'value' => set_value('outstanding'),
                              'rules' => 'trim|required'
                           ),                    
                    )
                );

        $detail = $this->cat_form->validator($config,false,true);

        $var = array('table' => 'investor_dividend_table', 
                         'condition' => 'id = '.$id.''
                        );
            // var_dump($var);
            $this->cat_model->update($var,$detail);
           echo '<script>window.location.href = "'.base_url('admin/dividen').'"</script>';
       
    }

    public function add_dividen()
    {
       $config = array(
                    'admin/dividen' => 
                    array(
                      array(
                              'type' => 'text',
                              'name' => 'year',
                              'class' => 'form-control',
                              'value' => set_value('year'),
                              'rules' => 'trim|required'
                           ),
                      array(
                              'type' => 'text',
                              'name' => 'final',
                              'class' => 'form-control',
                              'value' => set_value('final'),
                              'rules' => 'trim|required'
                           ),
                      array(
                              'type' => 'date',
                              'name' => 'date'
                           ),    
                      array(
                              'type' => 'text',
                              'name' => 'ratio',
                              'class' => 'form-control',
                              'value' => set_value('ratio'),
                              'rules' => 'trim|required'
                           ),
                      array(
                              'type' => 'text',
                              'name' => 'outstanding',
                              'class' => 'form-control',
                              'value' => set_value('outstanding'),
                              'rules' => 'trim|required'
                           ),           
                      array(
                              'type' => 'text',
                              'name' => 'active',
                              'class' => 'form-control',
                              'value' => '1'
                           ),              
                    )
                );

            $detail = $this->cat_form->validator($config,false,true);
            $this->cat_model->insert('investor_dividend_table',$detail);
            echo '<script>window.location.href = "'.base_url('admin/dividen').'"</script>';
    }

    public function delete_dividen()
    {
        $url = $this->uri->uri_string();
        $url = explode('/',$url);

        $id = $url[count($url)-1];

        $this->db->delete('investor_dividend_table', array('id' => $id)); 
        echo '<script>window.location.href = "'.base_url('admin/dividen').'"</script>';
    }

    public function ikhtisar()
    {
        $this->cat_login->is_login();

        $catalyst['header'] = 'admin-main-header';
        $catalyst['label'] = $this->_admin;
        $catalyst['themes'] = "ikhtisar";
        $catalyst['processor'] = null;
        $catalyst['footer'] = null; 

        $catalyst = $this->catalyst->enables('morris,flot,table',$catalyst);

        $var = array('table' => 'investor_highlights_tablenew',
                             'condition' => 'active = "1" order by year desc',
                            );

        $data['raw_ikhtisar'] = $this->cat_model->get_allcondition($var);

        $this->catalyst->render($catalyst, $data);

    }

     public function edit_ikhtisar()
    {
        $url = $this->uri->uri_string();
        $url = explode('/',$url);

        $id = $url[count($url)-1];

        $click = $this->input->post('btn-edpre');

        $config = array(
                    'admin/ikhtisar' => 
                    array(
                      array(
                              'type' => 'text',
                              'name' => 'year',
                              'class' => 'form-control',
                              'value' => set_value('year'),
                              'rules' => 'trim|required'
                           ),
                      array(
                              'type' => 'text',
                              'name' => 'netrevenue',
                              'class' => 'form-control',
                              'value' => set_value('netrevenue'),
                              'rules' => 'trim|required'
                           ),
                      array(
                              'type' => 'text',
                              'name' => 'grossprofit',
                              'class' => 'form-control',
                              'value' => set_value('grossprofit'),
                              'rules' => 'trim|required'
                           ),
                      array(
                              'type' => 'text',
                              'name' => 'profityear',
                              'class' => 'form-control',
                              'value' => set_value('profityear'),
                              'rules' => 'trim|required'
                           ),
                      array(
                              'type' => 'text',
                              'name' => 'profitowner',
                              'class' => 'form-control',
                              'value' => set_value('profitowner'),
                              'rules' => 'trim|required'
                           ),
                      array(
                              'type' => 'text',
                              'name' => 'profitinterest',
                              'class' => 'form-control',
                              'value' => set_value('profitinterest'),
                              'rules' => 'trim|required'
                           ),
                      array(
                              'type' => 'text',
                              'name' => 'earnings',
                              'class' => 'form-control',
                              'value' => set_value('earnings'),
                              'rules' => 'trim|required'
                           ),
                      array(
                              'type' => 'text',
                              'name' => 'assets',
                              'class' => 'form-control',
                              'value' => set_value('assets'),
                              'rules' => 'trim|required'
                           ),
                      array(
                              'type' => 'text',
                              'name' => 'liabilities',
                              'class' => 'form-control',
                              'value' => set_value('liabilities'),
                              'rules' => 'trim|required'
                           ),
                      array(
                              'type' => 'text',
                              'name' => 'equity',
                              'class' => 'form-control',
                              'value' => set_value('equity'),
                              'rules' => 'trim|required'
                           )
                    )
                );

        $detail = $this->cat_form->validator($config,false,true);

        $var = array('table' => 'investor_highlights_tablenew', 
                         'condition' => 'id = '.$id.''
                        );
            // var_dump($var);
            $this->cat_model->update($var,$detail);
           echo '<script>window.location.href = "'.base_url('admin/ikhtisar').'"</script>';
       
    }

    public function add_ikhtisar()
    {
       $config = array(
                    'admin/ikhtisar' => 
                    array(
                      array(
                              'type' => 'text',
                              'name' => 'year',
                              'class' => 'form-control',
                              'value' => set_value('year'),
                              'rules' => 'trim|required'
                           ),
                      array(
                              'type' => 'text',
                              'name' => 'netrevenue',
                              'class' => 'form-control',
                              'value' => set_value('netrevenue'),
                              'rules' => 'trim|required'
                           ),
                      array(
                              'type' => 'text',
                              'name' => 'grossprofit',
                              'class' => 'form-control',
                              'value' => set_value('grossprofit'),
                              'rules' => 'trim|required'
                           ),
                      array(
                              'type' => 'text',
                              'name' => 'profityear',
                              'class' => 'form-control',
                              'value' => set_value('profityear'),
                              'rules' => 'trim|required'
                           ),
                      array(
                              'type' => 'text',
                              'name' => 'profitowner',
                              'class' => 'form-control',
                              'value' => set_value('profitowner'),
                              'rules' => 'trim|required'
                           ),
                      array(
                              'type' => 'text',
                              'name' => 'profitinterest',
                              'class' => 'form-control',
                              'value' => set_value('profitinterest'),
                              'rules' => 'trim|required'
                           ),
                      array(
                              'type' => 'text',
                              'name' => 'earnings',
                              'class' => 'form-control',
                              'value' => set_value('earnings'),
                              'rules' => 'trim|required'
                           ),
                      array(
                              'type' => 'text',
                              'name' => 'assets',
                              'class' => 'form-control',
                              'value' => set_value('assets'),
                              'rules' => 'trim|required'
                           ),
                      array(
                              'type' => 'text',
                              'name' => 'liabilities',
                              'class' => 'form-control',
                              'value' => set_value('liabilities'),
                              'rules' => 'trim|required'
                           ),
                      array(
                              'type' => 'text',
                              'name' => 'equity',
                              'class' => 'form-control',
                              'value' => set_value('equity'),
                              'rules' => 'trim|required'
                           ),           
                      array(
                              'type' => 'text',
                              'name' => 'active',
                              'class' => 'form-control',
                              'value' => '1'
                           ),              
                    )
                );

            $detail = $this->cat_form->validator($config,false,true);
            $this->cat_model->insert('investor_highlights_tablenew',$detail);
            echo '<script>window.location.href = "'.base_url('admin/ikhtisar').'"</script>';
    }

    public function delete_ikhtisar()
    {
        $url = $this->uri->uri_string();
        $url = explode('/',$url);

        $id = $url[count($url)-1];

        $this->db->delete('investor_highlights_tablenew', array('id' => $id)); 
        echo '<script>window.location.href = "'.base_url('admin/ikhtisar').'"</script>';
    }

// CSR CSR CSR CSR CSR CSR CSR CSR CSR CSR

    public function csr_id()
    {
        $this->cat_login->is_login();

        $catalyst['header'] = 'admin-main-header';
        $catalyst['label'] = $this->_admin;
        $catalyst['themes'] = "csr_id";
        $catalyst['processor'] = null;
        $catalyst['footer'] = null; 

        $catalyst = $this->catalyst->enables('morris,flot,table',$catalyst);

        $data['raw_csr_id'] = $this->cat_model->getall('csr_id');

        $this->catalyst->render($catalyst, $data);

    }

     public function edit_csr_id()
    {
        $url = $this->uri->uri_string();
        $url = explode('/',$url);

        $id = $url[count($url)-1];

        $click = $this->input->post('btn-edpre');

        $config = array(
                    'admin/csr_id' => 
                    array(
                      array(
                              'type' => 'textarea',
                              'name' => 'descriptor',
                              'class' => 'form-control',
                              'value' => set_value('descriptor'),
                              'rules' => 'trim|required'
                           )                     
                    )
                );

        $detail = $this->cat_form->validator($config,false,true);

        $var = array('table' => 'csr_id', 
                         'condition' => 'id = '.$id.''
                        );
            // var_dump($var);
            $this->cat_model->update($var,$detail);
            echo '<script>window.location.href = "'.base_url('admin/csr_id').'"</script>';
       
    }

    public function csr()
    {
        $this->cat_login->is_login();

        $catalyst['header'] = 'admin-main-header';
        $catalyst['label'] = $this->_admin;
        $catalyst['themes'] = "csr";
        $catalyst['processor'] = null;
        $catalyst['footer'] = null; 

        $catalyst = $this->catalyst->enables('morris,flot,table',$catalyst);

        $data['raw_csr'] = $this->cat_model->getall('csr');

        $this->catalyst->render($catalyst, $data);

    }

     public function edit_csr()
    {
        $url = $this->uri->uri_string();
        $url = explode('/',$url);

        $id = $url[count($url)-1];

        $click = $this->input->post('btn-edpre');

        $config = array(
                    'admin/csr' => 
                    array(
                      array(
                              'type' => 'textarea',
                              'name' => 'descriptor',
                              'class' => 'form-control',
                              'value' => set_value('descriptor'),
                              'rules' => 'trim|required'
                           )                     
                    )
                );

        $detail = $this->cat_form->validator($config,false,true);

        $var = array('table' => 'csr', 
                         'condition' => 'id = '.$id.''
                        );
            // var_dump($var);
            $this->cat_model->update($var,$detail);
            echo '<script>window.location.href = "'.base_url('admin/csr').'"</script>';
       
    }

    public function actrees_id()
    {
        $this->cat_login->is_login();

        $catalyst['header'] = 'admin-main-header';
        $catalyst['label'] = $this->_admin;
        $catalyst['themes'] = "actrees_id";
        $catalyst['processor'] = null;
        $catalyst['footer'] = null; 

        $catalyst = $this->catalyst->enables('morris,flot,table',$catalyst);

        $data['raw_actrees_id'] = $this->cat_model->getall('csr_lingsoskem_id');

        $this->catalyst->render($catalyst, $data);

    }

    public function edit_actrees_id()
    {
        $url = $this->uri->uri_string();
        $url = explode('/',$url);

        $id = $url[count($url)-1];

        $click = $this->input->post('btn-edpre');

        $config = array(
                    'admin/actrees_id' => 
                    array(
                      array(
                              'type' => 'textarea',
                              'name' => 'descriptor',
                              'class' => 'form-control',
                              'value' => set_value('descriptor'),
                              'rules' => 'trim|required'
                           ),
                      array(
                              'type' => 'file',
                              'name' => 'userfile',
                              'path' => '/assets/image/csr/',
                              'allowed' => 'jpg|jpeg|png',
                              'size' => '0',
                              'width' => '4000',
                              'height' => '4000'

                           )                      
                    )
                );

        $detail = $this->cat_form->validator($config,false,true);

        $var = array('table' => 'csr_lingsoskem_id', 
                         'condition' => 'id = '.$id.''
                        );
            // var_dump($var);
            $this->cat_model->update($var,$detail);
            echo '<script>window.location.href = "'.base_url('admin/actrees_id').'"</script>';
       
    }

    public function actrees()
    {
        $this->cat_login->is_login();

        $catalyst['header'] = 'admin-main-header';
        $catalyst['label'] = $this->_admin;
        $catalyst['themes'] = "actrees";
        $catalyst['processor'] = null;
        $catalyst['footer'] = null; 

        $catalyst = $this->catalyst->enables('morris,flot,table',$catalyst);

        $data['raw_actrees'] = $this->cat_model->getall('csr_lingsoskem');

        $this->catalyst->render($catalyst, $data);

    }

    public function edit_actrees()
    {
        $url = $this->uri->uri_string();
        $url = explode('/',$url);

        $id = $url[count($url)-1];

        $click = $this->input->post('btn-edpre');

        $config = array(
                    'admin/actrees' => 
                    array(
                      array(
                              'type' => 'textarea',
                              'name' => 'descriptor',
                              'class' => 'form-control',
                              'value' => set_value('descriptor'),
                              'rules' => 'trim|required'
                           ),
                      array(
                              'type' => 'file',
                              'name' => 'userfile',
                              'path' => '/assets/image/csr/',
                              'allowed' => 'jpg|jpeg|png',
                              'size' => '0',
                              'width' => '4000',
                              'height' => '4000'

                           )                      
                    )
                );

        $detail = $this->cat_form->validator($config,false,true);

        $var = array('table' => 'csr_lingsoskem', 
                         'condition' => 'id = '.$id.''
                        );
            // var_dump($var);
            $this->cat_model->update($var,$detail);
            echo '<script>window.location.href = "'.base_url('admin/actrees').'"</script>';
       
    }

    public function actgrowth_id()
    {
        $this->cat_login->is_login();

        $catalyst['header'] = 'admin-main-header';
        $catalyst['label'] = $this->_admin;
        $catalyst['themes'] = "actgrowth_id";
        $catalyst['processor'] = null;
        $catalyst['footer'] = null; 

        $catalyst = $this->catalyst->enables('morris,flot,table',$catalyst);

        $data['raw_actgrowth_id'] = $this->cat_model->getall('csr_praktik_id');

        $this->catalyst->render($catalyst, $data);

    }

    public function edit_actgrowth_id()
    {
        $url = $this->uri->uri_string();
        $url = explode('/',$url);

        $id = $url[count($url)-1];

        $click = $this->input->post('btn-edpre');

        $config = array(
                    'admin/actgrowth_id' => 
                    array(
                      array(
                              'type' => 'textarea',
                              'name' => 'descriptor',
                              'class' => 'form-control',
                              'value' => set_value('descriptor'),
                              'rules' => 'trim|required'
                           ),
                      array(
                              'type' => 'file',
                              'name' => 'userfile',
                              'path' => '/assets/image/csr/',
                              'allowed' => 'jpg|jpeg|png',
                              'size' => '0',
                              'width' => '4000',
                              'height' => '4000'

                           )                      
                    )
                );

        $detail = $this->cat_form->validator($config,false,true);

        $var = array('table' => 'csr_praktik_id', 
                         'condition' => 'id = '.$id.''
                        );
            // var_dump($var);
            $this->cat_model->update($var,$detail);
            echo '<script>window.location.href = "'.base_url('admin/actgrowth_id').'"</script>';
       
    }

    public function actgrowth()
    {
        $this->cat_login->is_login();

        $catalyst['header'] = 'admin-main-header';
        $catalyst['label'] = $this->_admin;
        $catalyst['themes'] = "actgrowth";
        $catalyst['processor'] = null;
        $catalyst['footer'] = null; 

        $catalyst = $this->catalyst->enables('morris,flot,table',$catalyst);

        $data['raw_actgrowth'] = $this->cat_model->getall('csr_praktik');

        $this->catalyst->render($catalyst, $data);

    }

    public function edit_actgrowth()
    {
        $url = $this->uri->uri_string();
        $url = explode('/',$url);

        $id = $url[count($url)-1];

        $click = $this->input->post('btn-edpre');

        $config = array(
                    'admin/actgrowth' => 
                    array(
                      array(
                              'type' => 'textarea',
                              'name' => 'descriptor',
                              'class' => 'form-control',
                              'value' => set_value('descriptor'),
                              'rules' => 'trim|required'
                           ),
                      array(
                              'type' => 'file',
                              'name' => 'userfile',
                              'path' => '/assets/image/csr/',
                              'allowed' => 'jpg|jpeg|png',
                              'size' => '0',
                              'width' => '4000',
                              'height' => '4000'

                           )                      
                    )
                );

        $detail = $this->cat_form->validator($config,false,true);

        $var = array('table' => 'csr_praktik', 
                         'condition' => 'id = '.$id.''
                        );
            // var_dump($var);
            $this->cat_model->update($var,$detail);
            echo '<script>window.location.href = "'.base_url('admin/actgrowth').'"</script>';
       
    }

    public function actfuture_id()
    {
        $this->cat_login->is_login();

        $catalyst['header'] = 'admin-main-header';
        $catalyst['label'] = $this->_admin;
        $catalyst['themes'] = "actfuture_id";
        $catalyst['processor'] = null;
        $catalyst['footer'] = null; 

        $catalyst = $this->catalyst->enables('morris,flot,table',$catalyst);

        $data['raw_actfuture_id'] = $this->cat_model->getall('csr_k3_id');

        $this->catalyst->render($catalyst, $data);

    }

    public function edit_actfuture_id()
    {
        $url = $this->uri->uri_string();
        $url = explode('/',$url);

        $id = $url[count($url)-1];

        $click = $this->input->post('btn-edpre');

        $config = array(
                    'admin/actfuture_id' => 
                    array(
                      array(
                              'type' => 'textarea',
                              'name' => 'descriptor',
                              'class' => 'form-control',
                              'value' => set_value('descriptor'),
                              'rules' => 'trim|required'
                           ),
                      array(
                              'type' => 'file',
                              'name' => 'userfile',
                              'path' => '/assets/image/csr/',
                              'allowed' => 'jpg|jpeg|png',
                              'size' => '0',
                              'width' => '4000',
                              'height' => '4000'

                           )                      
                    )
                );

        $detail = $this->cat_form->validator($config,false,true);

        $var = array('table' => 'csr_k3_id', 
                         'condition' => 'id = '.$id.''
                        );
            // var_dump($var);
            $this->cat_model->update($var,$detail);
            echo '<script>window.location.href = "'.base_url('admin/actfuture_id').'"</script>';
       
    }

    public function actfuture()
    {
        $this->cat_login->is_login();

        $catalyst['header'] = 'admin-main-header';
        $catalyst['label'] = $this->_admin;
        $catalyst['themes'] = "actfuture";
        $catalyst['processor'] = null;
        $catalyst['footer'] = null; 

        $catalyst = $this->catalyst->enables('morris,flot,table',$catalyst);

        $data['raw_actfuture'] = $this->cat_model->getall('csr_k3');

        $this->catalyst->render($catalyst, $data);

    }

    public function edit_actfuture()
    {
        $url = $this->uri->uri_string();
        $url = explode('/',$url);

        $id = $url[count($url)-1];

        $click = $this->input->post('btn-edpre');

        $config = array(
                    'admin/actfuture' => 
                    array(
                      array(
                              'type' => 'textarea',
                              'name' => 'descriptor',
                              'class' => 'form-control',
                              'value' => set_value('descriptor'),
                              'rules' => 'trim|required'
                           ),
                      array(
                              'type' => 'file',
                              'name' => 'userfile',
                              'path' => '/assets/image/csr/',
                              'allowed' => 'jpg|jpeg|png',
                              'size' => '0',
                              'width' => '4000',
                              'height' => '4000'

                           )                      
                    )
                );

        $detail = $this->cat_form->validator($config,false,true);

        $var = array('table' => 'csr_k3', 
                         'condition' => 'id = '.$id.''
                        );
            // var_dump($var);
            $this->cat_model->update($var,$detail);
            echo '<script>window.location.href = "'.base_url('admin/actfuture').'"</script>';
       
    }

    public function actcare_id()
    {
        $this->cat_login->is_login();

        $catalyst['header'] = 'admin-main-header';
        $catalyst['label'] = $this->_admin;
        $catalyst['themes'] = "actcare_id";
        $catalyst['processor'] = null;
        $catalyst['footer'] = null; 

        $catalyst = $this->catalyst->enables('morris,flot,table',$catalyst);

        $data['raw_actcare_id'] = $this->cat_model->getall('csr_tanggungjawab_id');

        $this->catalyst->render($catalyst, $data);

    }

    public function edit_actcare_id()
    {
        $url = $this->uri->uri_string();
        $url = explode('/',$url);

        $id = $url[count($url)-1];

        $click = $this->input->post('btn-edpre');

        $config = array(
                    'admin/actcare_id' => 
                    array(
                      array(
                              'type' => 'textarea',
                              'name' => 'descriptor',
                              'class' => 'form-control',
                              'value' => set_value('descriptor'),
                              'rules' => 'trim|required'
                           ),
                      array(
                              'type' => 'file',
                              'name' => 'userfile',
                              'path' => '/assets/image/csr/',
                              'allowed' => 'jpg|jpeg|png',
                              'size' => '0',
                              'width' => '4000',
                              'height' => '4000'

                           )                      
                    )
                );

        $detail = $this->cat_form->validator($config,false,true);

        $var = array('table' => 'csr_tanggungjawab_id', 
                         'condition' => 'id = '.$id.''
                        );
            // var_dump($var);
            $this->cat_model->update($var,$detail);
            echo '<script>window.location.href = "'.base_url('admin/actcare_id').'"</script>';
       
    }

    public function actcare()
    {
        $this->cat_login->is_login();

        $catalyst['header'] = 'admin-main-header';
        $catalyst['label'] = $this->_admin;
        $catalyst['themes'] = "actcare";
        $catalyst['processor'] = null;
        $catalyst['footer'] = null; 

        $catalyst = $this->catalyst->enables('morris,flot,table',$catalyst);

        $data['raw_actcare'] = $this->cat_model->getall('csr_tanggungjawab');

        $this->catalyst->render($catalyst, $data);

    }

    public function edit_actcare()
    {
        $url = $this->uri->uri_string();
        $url = explode('/',$url);

        $id = $url[count($url)-1];

        $click = $this->input->post('btn-edpre');

        $config = array(
                    'admin/actcare' => 
                    array(
                      array(
                              'type' => 'textarea',
                              'name' => 'descriptor',
                              'class' => 'form-control',
                              'value' => set_value('descriptor'),
                              'rules' => 'trim|required'
                           ),
                      array(
                              'type' => 'file',
                              'name' => 'userfile',
                              'path' => '/assets/image/csr/',
                              'allowed' => 'jpg|jpeg|png',
                              'size' => '0',
                              'width' => '4000',
                              'height' => '4000'

                           )                      
                    )
                );

        $detail = $this->cat_form->validator($config,false,true);

        $var = array('table' => 'csr_tanggungjawab', 
                         'condition' => 'id = '.$id.''
                        );
            // var_dump($var);
            $this->cat_model->update($var,$detail);
            echo '<script>window.location.href = "'.base_url('admin/actcare').'"</script>';
       
    }

// MEDIA MEDIA MEDIA MEDIA MEDIA MEDIA

    public function siaranpers()
    {
        $this->cat_login->is_login();

        $catalyst['header'] = 'admin-main-header';
        $catalyst['label'] = $this->_admin;
        $catalyst['themes'] = "siaranpers";
        $catalyst['processor'] = null;
        $catalyst['footer'] = null; 

        $catalyst = $this->catalyst->enables('morris,flot,table',$catalyst);

        $var = array('table' => 'media_release_id',
                             'condition' => 'active = "1" order by date desc',
                            );

        $data['raw_siaranpers'] = $this->cat_model->get_allcondition($var);

        $this->catalyst->render($catalyst, $data);

    }

     public function edit_siaranpers()
    {
        $url = $this->uri->uri_string();
        $url = explode('/',$url);

        $id = $url[count($url)-1];

        $click = $this->input->post('btn-edpre');

        $config = array(
                    'admin/siaranpers' => 
                    array(
                      array(
                              'type' => 'text',
                              'name' => 'title',
                              'class' => 'form-control',
                              'value' => set_value('title'),
                              'rules' => 'trim|required'
                           ),
                      array(
                              'type' => 'textarea',
                              'name' => 'descriptor',
                              'class' => 'form-control',
                              'value' => set_value('descriptor'),
                              'rules' => 'trim|required'
                           ),
                      array(
                              'type' => 'date',
                              'name' => 'date'
                           )                      
                    )
                );

        $detail = $this->cat_form->validator($config,false,true);

        $var = array('table' => 'media_release_id', 
                         'condition' => 'id = '.$id.''
                        );
            // var_dump($var);
            $this->cat_model->update($var,$detail);
            echo '<script>window.location.href = "'.base_url('admin/siaranpers').'"</script>';
       
    }

    public function add_siaranpers()
    {
       $config = array(
                    'admin/siaranpers' => 
                    array(
                      array(
                              'type' => 'text',
                              'name' => 'title',
                              'class' => 'form-control',
                              'value' => set_value('title'),
                              'rules' => 'trim|required'
                           ),
                      array(
                              'type' => 'textarea',
                              'name' => 'descriptor',
                              'class' => 'form-control',
                              'value' => set_value('descriptor'),
                              'rules' => 'trim|required'
                           ),
                      array(
                              'type' => 'date',
                              'name' => 'date'
                           ),
                      array(
                              'type' => 'text',
                              'name' => 'active',
                              'class' => 'form-control',
                              'value' => '1'
                           ),              
                    )
                );

            $detail = $this->cat_form->validator($config,false,true);
            if ( $detail['descriptor'] == "" ){
              $detail['descriptor'] = "<p></p>";
            }
            $this->cat_model->insert('media_release_id',$detail);
            echo '<script>window.location.href = "'.base_url('admin/siaranpers').'"</script>';
    }

    public function delete_siaranpers()
    {
        $url = $this->uri->uri_string();
        $url = explode('/',$url);

        $id = $url[count($url)-1];

        $this->db->delete('media_release_id', array('id' => $id)); 
        echo '<script>window.location.href = "'.base_url('admin/siaranpers').'"</script>';
    }

    public function pressrelease()
    {
        $this->cat_login->is_login();

        $catalyst['header'] = 'admin-main-header';
        $catalyst['label'] = $this->_admin;
        $catalyst['themes'] = "pressrelease";
        $catalyst['processor'] = null;
        $catalyst['footer'] = null; 

        $catalyst = $this->catalyst->enables('morris,flot,table',$catalyst);

        $var = array('table' => 'media_release',
                             'condition' => 'active = "1" order by date desc',
                            );

        $data['raw_pressrelease'] = $this->cat_model->get_allcondition($var);

        $this->catalyst->render($catalyst, $data);

    }

     public function edit_pressrelease()
    {
        $url = $this->uri->uri_string();
        $url = explode('/',$url);

        $id = $url[count($url)-1];

        $click = $this->input->post('btn-edpre');

        $config = array(
                    'admin/pressrelease' => 
                    array(
                      array(
                              'type' => 'text',
                              'name' => 'title',
                              'class' => 'form-control',
                              'value' => set_value('title'),
                              'rules' => 'trim|required'
                           ),
                      array(
                              'type' => 'textarea',
                              'name' => 'descriptor',
                              'class' => 'form-control',
                              'value' => set_value('descriptor'),
                              'rules' => 'trim|required'
                           ),
                      array(
                              'type' => 'date',
                              'name' => 'date'
                           )                      
                    )
                );

        $detail = $this->cat_form->validator($config,false,true);

        $var = array('table' => 'media_release', 
                         'condition' => 'id = '.$id.''
                        );
            // var_dump($var);
            $this->cat_model->update($var,$detail);
            echo '<script>window.location.href = "'.base_url('admin/pressrelease').'"</script>';
       
    }

    public function add_pressrelease()
    {
       $config = array(
                    'admin/pressrelease' => 
                    array(
                      array(
                              'type' => 'text',
                              'name' => 'title',
                              'class' => 'form-control',
                              'value' => set_value('title'),
                              'rules' => 'trim|required'
                           ),
                      array(
                              'type' => 'textarea',
                              'name' => 'descriptor',
                              'class' => 'form-control',
                              'value' => set_value('descriptor'),
                              'rules' => 'trim|required'
                           ),
                      array(
                              'type' => 'date',
                              'name' => 'date'
                           ),
                      array(
                              'type' => 'text',
                              'name' => 'active',
                              'class' => 'form-control',
                              'value' => '1'
                           ),              
                    )
                );

            $detail = $this->cat_form->validator($config,false,true);
             if ( $detail['descriptor'] == "" ){
              $detail['descriptor'] = "<p></p>";
            }
            $this->cat_model->insert('media_release',$detail);
            echo '<script>window.location.href = "'.base_url('admin/pressrelease').'"</script>';
    }

    public function delete_pressrelease()
    {
        $url = $this->uri->uri_string();
        $url = explode('/',$url);

        $id = $url[count($url)-1];

        $this->db->delete('media_release', array('id' => $id)); 
        echo '<script>window.location.href = "'.base_url('admin/pressrelease').'"</script>';
    }

    public function berita()
    {
        $this->cat_login->is_login();

        $catalyst['header'] = 'admin-main-header';
        $catalyst['label'] = $this->_admin;
        $catalyst['themes'] = "berita";
        $catalyst['processor'] = null;
        $catalyst['footer'] = null; 

        $catalyst = $this->catalyst->enables('morris,flot,table',$catalyst);

        $var = array('table' => 'media_news_id',
                             'condition' => 'active = "1" order by date desc',
                            );

        $data['raw_berita'] = $this->cat_model->get_allcondition($var);

        $this->catalyst->render($catalyst, $data);

    }

     public function edit_berita()
    {
        $url = $this->uri->uri_string();
        $url = explode('/',$url);

        $id = $url[count($url)-1];

        $click = $this->input->post('btn-edpre');

        $config = array(
                    'admin/berita' => 
                    array(
                      array(
                              'type' => 'text',
                              'name' => 'title',
                              'class' => 'form-control',
                              'value' => set_value('title'),
                              'rules' => 'trim|required'
                           ),
                      array(
                              'type' => 'textarea',
                              'name' => 'descriptor',
                              'class' => 'form-control',
                              'value' => set_value('descriptor'),
                              'rules' => 'trim|required'
                           ),  
                      array(
                              'type' => 'date',
                              'name' => 'date'
                           ), 
                      array(
                              'type' => 'file',
                              'name' => 'userfile',
                              'path' => '/assets/image/media_news/',
                              'allowed' => 'jpg|jpeg|png',
                              'size' => '0',
                              'width' => '4000',
                              'height' => '4000'

                           )                    
                    )
                );

        $detail = $this->cat_form->validator($config,false,true);
        if ( $detail['userfile'] == "" ){
          $config = array(
                    'admin/berita' => 
                    array(
                      array(
                              'type' => 'text',
                              'name' => 'title',
                              'class' => 'form-control',
                              'value' => set_value('title'),
                              'rules' => 'trim|required'
                           ),
                      array(
                              'type' => 'textarea',
                              'name' => 'descriptor',
                              'class' => 'form-control',
                              'value' => set_value('descriptor'),
                              'rules' => 'trim|required'
                           ),  
                      array(
                              'type' => 'date',
                              'name' => 'date'
                           )));
          $detail = $this->cat_form->validator($config,false,true);
        }
        $var = array('table' => 'media_news_id', 
                         'condition' => 'id = '.$id.''
                        );
            // var_dump($var);
            $this->cat_model->update($var,$detail);
            echo '<script>window.location.href = "'.base_url('admin/berita').'"</script>';
       
    }

    public function add_berita()
    {
       $config = array(
                    'admin/berita' => 
                    array(
                      array(
                              'type' => 'text',
                              'name' => 'title',
                              'class' => 'form-control',
                              'value' => set_value('title'),
                              'rules' => 'trim|required'
                           ),
                      array(
                              'type' => 'textarea',
                              'name' => 'descriptor',
                              'class' => 'form-control',
                              'value' => set_value('descriptor'),
                              'rules' => 'trim|required'
                           ),
                      array(
                              'type' => 'date',
                              'name' => 'date'
                           ),
                      array(
                              'type' => 'file',
                              'name' => 'userfile',
                              'path' => '/assets/image/media_news/',
                              'allowed' => 'jpg|jpeg|png',
                              'size' => '0',
                              'width' => '4000',
                              'height' => '4000'

                           ),
                      array(
                              'type' => 'text',
                              'name' => 'active',
                              'class' => 'form-control',
                              'value' => '1'
                           ),              
                    )
                );

            $detail = $this->cat_form->validator($config,false,true);
            if ( $detail['descriptor'] == "" ){
              $detail['descriptor'] = "<p></p>";
            }
            $this->cat_model->insert('media_news_id',$detail);
            echo '<script>window.location.href = "'.base_url('admin/berita').'"</script>';
    }

    public function delete_berita()
    {
        $url = $this->uri->uri_string();
        $url = explode('/',$url);

        $id = $url[count($url)-1];

        $this->db->delete('media_news_id', array('id' => $id)); 
        echo '<script>window.location.href = "'.base_url('admin/berita').'"</script>';
    }

    public function news()
    {
        $this->cat_login->is_login();

        $catalyst['header'] = 'admin-main-header';
        $catalyst['label'] = $this->_admin;
        $catalyst['themes'] = "news";
        $catalyst['processor'] = null;
        $catalyst['footer'] = null; 

        $catalyst = $this->catalyst->enables('morris,flot,table',$catalyst);

        $var = array('table' => 'media_news',
                             'condition' => 'active = "1" order by date desc',
                            );

        $data['raw_news'] = $this->cat_model->get_allcondition($var);

        $this->catalyst->render($catalyst, $data);

    }

     public function edit_news()
    {
        $url = $this->uri->uri_string();
        $url = explode('/',$url);

        $id = $url[count($url)-1];

        $click = $this->input->post('btn-edpre');

        $config = array(
                    'admin/news' => 
                    array(
                      array(
                              'type' => 'text',
                              'name' => 'title',
                              'class' => 'form-control',
                              'value' => set_value('title'),
                              'rules' => 'trim|required'
                           ),
                      array(
                              'type' => 'textarea',
                              'name' => 'descriptor',
                              'class' => 'form-control',
                              'value' => set_value('descriptor'),
                              'rules' => 'trim|required'
                           ),  
                      array(
                              'type' => 'date',
                              'name' => 'date'
                           ), 
                      array(
                              'type' => 'file',
                              'name' => 'userfile',
                              'path' => '/assets/image/media_news/',
                              'allowed' => 'jpg|jpeg|png',
                              'size' => '0',
                              'width' => '4000',
                              'height' => '4000'

                           )                    
                    )
                );

        $detail = $this->cat_form->validator($config,false,true);
        if ( $detail['userfile'] == "" ){
          $config = array(
                    'admin/news' => 
                    array(
                      array(
                              'type' => 'text',
                              'name' => 'title',
                              'class' => 'form-control',
                              'value' => set_value('title'),
                              'rules' => 'trim|required'
                           ),
                      array(
                              'type' => 'textarea',
                              'name' => 'descriptor',
                              'class' => 'form-control',
                              'value' => set_value('descriptor'),
                              'rules' => 'trim|required'
                           ),  
                      array(
                              'type' => 'date',
                              'name' => 'date'
                           )));
          $detail = $this->cat_form->validator($config,false,true);
        }
        $var = array('table' => 'media_news', 
                         'condition' => 'id = '.$id.''
                        );
            // var_dump($var);
            $this->cat_model->update($var,$detail);
            echo '<script>window.location.href = "'.base_url('admin/news').'"</script>';
       
    }

    public function add_news()
    {
       $config = array(
                    'admin/news' => 
                    array(
                      array(
                              'type' => 'text',
                              'name' => 'title',
                              'class' => 'form-control',
                              'value' => set_value('title'),
                              'rules' => 'trim|required'
                           ),
                      array(
                              'type' => 'textarea',
                              'name' => 'descriptor',
                              'class' => 'form-control',
                              'value' => set_value('descriptor'),
                              'rules' => 'trim|required'
                           ),
                      array(
                              'type' => 'date',
                              'name' => 'date'
                           ),
                      array(
                              'type' => 'file',
                              'name' => 'userfile',
                              'path' => '/assets/image/media_news/',
                              'allowed' => 'jpg|jpeg|png',
                              'size' => '0',
                              'width' => '4000',
                              'height' => '4000'

                           ),
                      array(
                              'type' => 'text',
                              'name' => 'active',
                              'class' => 'form-control',
                              'value' => '1'
                           ),              
                    )
                );

            $detail = $this->cat_form->validator($config,false,true);
            if ( $detail['descriptor'] == "" ){
              $detail['descriptor'] = "<p></p>";
            }
            $this->cat_model->insert('media_news',$detail);
            echo '<script>window.location.href = "'.base_url('admin/news').'"</script>';
    }

    public function delete_news()
    {
        $url = $this->uri->uri_string();
        $url = explode('/',$url);

        $id = $url[count($url)-1];

        $this->db->delete('media_news', array('id' => $id)); 
        echo '<script>window.location.href = "'.base_url('admin/news').'"</script>';
    }

    public function pengumuman()
    {
        $this->cat_login->is_login();

        $catalyst['header'] = 'admin-main-header';
        $catalyst['label'] = $this->_admin;
        $catalyst['themes'] = "pengumuman";
        $catalyst['processor'] = null;
        $catalyst['footer'] = null; 

        $catalyst = $this->catalyst->enables('morris,flot,table',$catalyst);

        $var = array('table' => 'media_announcement1_id',
                             'condition' => 'active = "1" order by id desc',
                            );

        $data['raw_pengumuman'] = $this->cat_model->get_allcondition($var);

        $this->catalyst->render($catalyst, $data);

    }

     public function edit_pengumuman()
    {
        $url = $this->uri->uri_string();
        $url = explode('/',$url);

        $id = $url[count($url)-1];

        $click = $this->input->post('btn-edpre');

        $config = array(
                    'admin/pengumuman' => 
                    array(
                      array(
                              'type' => 'text',
                              'name' => 'title',
                              'class' => 'form-control',
                              'value' => set_value('title'),
                              'rules' => 'trim|required'
                           ),
                      array(
                              'type' => 'file',
                              'name' => 'userfile',
                              'path' => '/assets/file/media/announcement/',
                              'allowed' => 'pdf',
                              'size' => '0',
                              'width' => '4000',
                              'height' => '4000'

                           )                      
                    )
                );

        $detail = $this->cat_form->validator($config,false,true);
        if ( $detail['userfile'] == "" ){
           $config = array(
                    'admin/pengumuman' => 
                    array(
                      array(
                              'type' => 'text',
                              'name' => 'title',
                              'class' => 'form-control',
                              'value' => set_value('title'),
                              'rules' => 'trim|required'
                           )));
          $detail = $this->cat_form->validator($config,false,true);
        }
        $var = array('table' => 'media_announcement1_id', 
                         'condition' => 'id = '.$id.''
                        );
            // var_dump($var);
            $this->cat_model->update($var,$detail);
            echo '<script>window.location.href = "'.base_url('admin/pengumuman').'"</script>';
       
    }

    public function add_pengumuman()
    {
       $config = array(
                    'admin/pengumuman' => 
                    array(
                      array(
                              'type' => 'text',
                              'name' => 'title',
                              'class' => 'form-control',
                              'value' => set_value('title'),
                              'rules' => 'trim|required'
                           ),
                      array(
                              'type' => 'file',
                              'name' => 'userfile',
                              'path' => '/assets/file/media/announcement/',
                              'allowed' => 'pdf',
                              'size' => '0',
                              'width' => '4000',
                              'height' => '4000'

                           ),
                      array(
                              'type' => 'text',
                              'name' => 'active',
                              'class' => 'form-control',
                              'value' => '1'
                           ),              
                    )
                );

            $detail = $this->cat_form->validator($config,false,true);
            $this->cat_model->insert('media_announcement1_id',$detail);
            echo '<script>window.location.href = "'.base_url('admin/pengumuman').'"</script>';
    }

    public function delete_pengumuman()
    {
        $url = $this->uri->uri_string();
        $url = explode('/',$url);

        $id = $url[count($url)-1];

        $this->db->delete('media_announcement1_id', array('id' => $id)); 
        echo '<script>window.location.href = "'.base_url('admin/pengumuman').'"</script>';
    }

    public function announcement()
    {
        $this->cat_login->is_login();

        $catalyst['header'] = 'admin-main-header';
        $catalyst['label'] = $this->_admin;
        $catalyst['themes'] = "announcement";
        $catalyst['processor'] = null;
        $catalyst['footer'] = null; 

        $catalyst = $this->catalyst->enables('morris,flot,table',$catalyst);

        $var = array('table' => 'media_announcement1',
                             'condition' => 'active = "1" order by id desc',
                            );

        $data['raw_announcement'] = $this->cat_model->get_allcondition($var);

        $this->catalyst->render($catalyst, $data);

    }

     public function edit_announcement()
     {
        $url = $this->uri->uri_string();
        $url = explode('/',$url);

        $id = $url[count($url)-1];

        $click = $this->input->post('btn-edpre');

        $config = array(
                    'admin/announcement' => 
                    array(
                      array(
                              'type' => 'text',
                              'name' => 'title',
                              'class' => 'form-control',
                              'value' => set_value('title'),
                              'rules' => 'trim|required'
                           ),
                      array(
                              'type' => 'file',
                              'name' => 'userfile',
                              'path' => '/assets/file/media/announcement/',
                              'allowed' => 'pdf',
                              'size' => '0',
                              'width' => '4000',
                              'height' => '4000'

                           )                      
                    )
                );

        $detail = $this->cat_form->validator($config,false,true);
        if ( $detail['userfile'] == "" ){
          $config = array(
                    'admin/announcement' => 
                    array(
                      array(
                              'type' => 'text',
                              'name' => 'title',
                              'class' => 'form-control',
                              'value' => set_value('title'),
                              'rules' => 'trim|required'
                           )));
          $detail = $this->cat_form->validator($config,false,true);
        }
        $var = array('table' => 'media_announcement1', 
                         'condition' => 'id = '.$id.''
                        );
            // var_dump($var);
            $this->cat_model->update($var,$detail);
            echo '<script>window.location.href = "'.base_url('admin/announcement').'"</script>';
       
    }

    public function add_announcement()
    {
       $config = array(
                    'admin/announcement' => 
                    array(
                      array(
                              'type' => 'text',
                              'name' => 'title',
                              'class' => 'form-control',
                              'value' => set_value('title'),
                              'rules' => 'trim|required'
                           ),
                      array(
                              'type' => 'file',
                              'name' => 'userfile',
                              'path' => '/assets/file/media/announcement/',
                              'allowed' => 'pdf',
                              'size' => '0',
                              'width' => '4000',
                              'height' => '4000'

                           ),
                      array(
                              'type' => 'text',
                              'name' => 'active',
                              'class' => 'form-control',
                              'value' => '1'
                           ),              
                    )
                );

            $detail = $this->cat_form->validator($config,false,true);
            $this->cat_model->insert('media_announcement1',$detail);
            echo '<script>window.location.href = "'.base_url('admin/announcement').'"</script>';
    }

    public function delete_announcement()
    {
        $url = $this->uri->uri_string();
        $url = explode('/',$url);

        $id = $url[count($url)-1];

        $this->db->delete('media_announcement1', array('id' => $id)); 
        echo '<script>window.location.href = "'.base_url('admin/announcement').'"</script>';
    }


    public function traffic_detail($identifier="",$selected_quarter="")
    {
        $this->cat_login->is_login();

        $catalyst['header'] = 'admin-main-header';
        $catalyst['label'] = $this->_admin;
        $catalyst['themes'] = "traffic_detail";
        $catalyst['processor'] = null;
        $catalyst['footer'] = null;

        $catalyst = $this->catalyst->enables('morris,table',$catalyst);
  	    $data = $this->admin->catalyst_admin_traffic_detail($identifier,$selected_quarter);
        $this->catalyst->render($catalyst,$data);
    }

    public function signout()
    {
        $this->admin->logout();
    }

    public function career(){

      $this->cat_login->is_login();

      $catalyst['header'] = 'admin-main-header';
      $catalyst['label'] = $this->_admin;
      $catalyst['themes'] = "career";
      $catalyst['processor'] = null;
      $catalyst['footer'] = null;
      $data['career_open_data'] = $this->cat_model->getall('career_open');

      $this->catalyst->render($catalyst,$data);
    }

    public function edit_career(){
       $url = $this->uri->uri_string();
        $url = explode('/',$url);

        $id = $url[count($url)-1];

        $click = $this->input->post('btn-edpre');

        $config = array(
                    'admin/career' => 
                    array(
                      array(
                          'type' => 'text',
                          'name' => 'position',
                          'class' => 'form-control',
                          'value' => set_value('position'),
                          'rules' => 'trim|required'
                           ),
                        array(
                          'type' => 'text',
                          'name' => 'location',
                          'class' => 'form-control',
                          'value' => set_value('location'),
                          'rules' => 'trim|required'
                           ),
                        array(
                          'type' => 'text',
                          'name' => 'department',
                          'class' => 'form-control',
                          'value' => set_value('department'),
                          'rules' => 'trim|required'
                        )                   
                    )
                );

        $detail = $this->cat_form->validator($config,false,true);        
        $var = array('table' => 'career_open', 
           'condition' => 'id = '.$id.''
        );
      // var_dump($var);
      $this->cat_model->update($var,$detail);
      echo '<script>window.location.href = "'.base_url('admin/career').'"</script>';
    }

    public function add_career(){
      $config = array(
          'admin/career' => 
          array(
            array(
                    'type' => 'text',
                    'name' => 'position',
                    'class' => 'form-control',
                    'value' => set_value('position'),
                    'rules' => 'trim|required'
                 ),
            array(
                    'type' => 'text',
                    'name' => 'location',
                    'class' => 'form-control',
                    'value' => set_value('location'),
                    'rules' => 'trim|required'
                 ),
            array(
                    'type' => 'text',
                    'name' => 'department',
                    'class' => 'form-control',
                    'value' => set_value('department'),
                    'rules' => 'trim|required'
                 ),
            array(
                    'type' => 'text',
                    'name' => 'active',
                    'class' => 'form-control',
                    'value' => '1',
                 ),              
          )
      );

      $detail = $this->cat_form->validator($config,false,true);
      $this->cat_model->insert('career_open',$detail);
      echo '<script>window.location.href = "'.base_url('admin/career').'"</script>';
    }

    public function delete_career(){
      $url = $this->uri->uri_string();
      $url = explode('/',$url);
      $id = $url[count($url)-1];

      $this->db->delete('career_open', array('id' => $id)); 
      echo '<script>window.location.href = "'.base_url('admin/career').'"</script>';
    }

    public function setting(){
      $this->cat_login->is_login();

      $catalyst['header'] = 'admin-main-header';
      $catalyst['label'] = $this->_admin;
      $catalyst['themes'] = "setting";
      $catalyst['processor'] = null;
      $catalyst['footer'] = null;
      $data['setting'] = $this->cat_model->getall('maintenance');

      $this->catalyst->render($catalyst,$data);
    }

    public function edit_setting(){
      $status = $this->input->post("setting_value");
      $this->db->query("update maintenance set status ='$status' where id ='1'");
      echo '<script>window.location.href = "'.base_url('admin/setting').'"</script>';

    }

    public function logs(){
        $this->cat_login->is_login();

        $catalyst['header'] = 'admin-main-header';
        $catalyst['label'] = $this->_admin;
        $catalyst['themes'] = "logs";
        $catalyst['processor'] = null;
        $catalyst['footer'] = null;
        $data['logs'] = $this->cat_model->getall('setting_log');

        $this->catalyst->render($catalyst,$data);
    }

    public function access(){
        $this->cat_login->is_login();

        $catalyst['header'] = 'admin-main-header';
        $catalyst['label'] = $this->_admin;
        $catalyst['themes'] = "access";
        $catalyst['processor'] = null;
        $catalyst['footer'] = null;
        $data['access_list'] = $this->cat_model->getall('cat_admin');

        $this->catalyst->render($catalyst,$data);
    }

    public function updateaccess(){
      $userid = $this->input->post("userid");
      $privilege = trim($this->input->post("privilege_".$userid),",");
      $passwords = md5($this->input->post("password"));
      $token = $this->input->post("password");
      if ( $passwords == "" ){
        $this->db->query("update cat_admin set privilege ='$privilege' where id ='$userid'");
      }else{
        $this->db->query("update cat_admin set privilege ='$privilege',password = '$passwords',token ='$token' where id ='$userid'");
      }
      echo '<script>window.location.href = "'.base_url('admin/access').'"</script>';
    }

    public function add_access(){
      $username = $this->input->post("username");
      $passwords = sha1($this->input->post("passwords"));
      $token = $this->input->post("passwords");
      $privilege = trim($this->input->post("privilege_new"),",");

      $this->db->query("insert into cat_admin(username,password,valid,privilege,token)values('$username','$passwords','0','$privilege','$token')");

      echo '<script>window.location.href = "'.base_url('admin/access').'"</script>';
    }
}