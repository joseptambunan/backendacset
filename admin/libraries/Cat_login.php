<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
    class Cat_login
    {
        var $ci;
        var $base;
        var $view;
         
        function __construct() 
        {
            $this->ci =& get_instance();

            $this->ci->load->database();

            $this->base = $this->ci->config->item('admin_base');
            $this->view = $this->ci->config->item('tmp_dir_system');

        }

        public function is_login()
        {
            $base = $this->ci->config->item('admin_base');

            $logged = read_file('assets/json/catalyst_admin_notification.json');

            $logged = json_decode($logged,true);

            $user = $logged['admin_notification']['logged'][0]['id'];
            $login = $logged['admin_notification']['logged'][0]['passed'];            

            if(isset($user) && $login === true): $ses_user = $user;
            else: $ses_user = NULL;
            endif;

            $username = $this->ci->encrypt->decode($ses_user);
            $this->ci->db->where('username', $username);
            $this->ci->db->from('cat_admin');
            $exist = $this->ci->db->count_all_results();

            if($exist == 0 || $ses_user == NULL)
            {
                $this->ci->help->redirect_to($base);
            }
        }    

        private function login_process($data)
        {
            $base = $this->ci->config->item('admin_base');
            $success = $data['success'];
            $data['password'] = sha1($data['password']);
            $ip = $this->ci->help->get_ip();

            $date = date('Y-m-d H:i:s');
            
            $log = array(
               'username' => $data['username'] ,
               'ip' => $ip ,
               'date' => $date
            );          

            // $this->ci->db->insert('cat_adminlog', $log);

            $this->ci->db->where('username', $data['username']);
            $this->ci->db->where('password', $data['password']);            
            $this->ci->db->from('cat_admin');
            $exist = $this->ci->db->count_all_results();

            
            $condition = '(date > now() - INTERVAL 5 MINUTE)';
            $this->ci->db->select('*');
            $this->ci->db->where($condition);
            $this->ci->db->where('username',$data['username']);
            $this->ci->db->where('ip',$ip);
            $this->ci->db->from('cat_adminlog');

            $attempt = $this->ci->db->count_all_results();

            if($data['username'] == "" || $data['password'] == "")
            {
                echo '<div class="alert alert-danger text-center" role="alert">';
                echo "Please fill the fieldtext properly";
                echo '</div>';
                $empty = 1;            
                exit();
            }
            else
            {
                $empty = 0;
            }


            if($attempt > 7)
            {
                $data['valid'] = '0';
                $this->ci->db->where('username',$data['username']);
                $this->ci->db->update('cat_admin',array('valid' => '0'));

                $this->ci->session->set_userdata('error','Your Account is unvailable please contact the operator');
                $this->ci->help->redirect_to($base);
                $under = 1;
                exit();
            }

            else if($attempt > 5)
            {
                $this->ci->session->set_userdata('error','Your Account is unvailable for now try again later');
                $this->ci->help->redirect_to($base);
                $under = 0;            
                exit();
            }
            else{
                $under = 2;
            }


            if($exist == 0)
            {
                $this->ci->session->set_userdata('error','Your password is wrong or your account is not yet registered');
                $this->ci->help->redirect_to($base);
                exit();            
            }
            else
            {
                
                $this->ci->db->select('*');
                $this->ci->db->where('username',$data['username']);
                $this->ci->db->from('cat_admin');
                $query = $this->ci->db->get();
               
                foreach ($query->result() as $k) 
                    {
                        $valid = $k->valid;
                    }           
            }

            if($valid == "no")
            {
                $val = 0;
                
                $this->ci->session->set_userdata('error','Your Account is unvailable please contact the operator');
                $this->ci->help->redirect_to($base);
                exit();            
            }
            else
            {
                $val = 1;
            }

            if($empty == 0 && $under == 2 && $exist == 1 && $val == 1 );
            {
                // $_SESSION['user'] = $this->ci->encrypt->encode($data['username']);

                $logged = read_file('assets/json/catalyst_admin_notification.json');

                $logged = json_decode($logged,true);

                $this->ci->db->where('username', $data['username']);
                $this->ci->db->where('password', $data['password']);  
                $detail_db = $this->ci->db->get("cat_admin")->result();
                $privilege = $detail_db[0]->privilege;

                $logged['admin_notification']['logged'][0]['passed'] = true;
                $logged['admin_notification']['logged'][0]['id'] = $this->ci->encrypt->encode($data['username']);
                $logged['admin_notification']['logged'][0]['last_login'] = date('Y/m/d h:i:s');

                $data = json_encode($logged,JSON_PRETTY_PRINT);
                $this->ci->session->set_userdata("privilege",$privilege);
                write_file('assets/json/catalyst_admin_notification.json',$data);

                echo "login success! Please wait";
                
                $this->ci->help->redirect_to($success);
            }
        }

        public function logout($data)
        {
            $this->ci->session->sess_destroy(); 
           
            if(!isset($data['path']))
            {
                $path = 'assets/image/temp/*';
            }
            else
            {
                $path = $data['path'];
            }

            $files = glob($path);

            foreach($files as $file)
            {
                if(is_file($file))
                {
                    unlink($file);    
                }
            }
        }

        public function initialize($data="")
        {
            if($data == ""):

                $this->ci->load->view($this->view.'/no-data');

            else:
            
                $this->ci->form_validation->set_rules($data['username'], ucfirst($data['username']), 'required');
                $this->ci->form_validation->set_rules($data['password'], ucfirst($data['password']), 'required');

                if ($this->ci->form_validation->run() == FALSE):
                    $this->ci->session->set_userdata('error',validation_errors());
                    $this->ci->help->redirect_to($data['return']);
                    exit();
                else:
                    $username = $this->ci->input->post($data["username"]);
                    $password = $this->ci->input->post($data["password"]);

                    $data = array(
                                   'username' => $username ,
                                   'password' => $password ,
                                   'ip' => $this->ci->help->get_ip() ,
                                   'date' => 'now()',
                                   'success' => $data['success']
                                );

                    $this->login_process($data);
                endif;
            endif;
        }

        public function admin_log()
        {
            $var['username'] = $this->ci->input->post('username');
            $var['ip'] = $this->ci->help->get_ip();
            $var['date'] = date("Y/m/d h:i:s");

            $this->ci->db->insert('cat_adminlog', $var);
        }
} 