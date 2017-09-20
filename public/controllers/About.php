<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class About extends Catalyst_Public_Role
{
    public function index($var)
    {
        $status_record = $this->cat_model->getall("maintenance");
        if ( $status_record[0]->status == "M" ){
            redirect("publics/maintenance");
        }

        switch ($var)
        {


            case 'about':
                $record = $this->cat_model->getall('aboutus_messageceo');

                foreach ($record as $key)
                {
                    $data['img_msc'] = $key->userfile;
                    $data['content_msc'] = $key->descriptor;
                }

                $this->load->view('message_from_ceo',$data);
                break;

            case 'sambutan':
                $record = $this->cat_model->getall('aboutus_messageceo_id');

                foreach ($record as $key)
                {
                    $data['img_msc'] = $key->userfile;
                    $data['content_msc'] = $key->descriptor;
                }

                $this->load->view('message_from_ceo_id',$data);
                break;

            case 'greetings':

                $record = $this->cat_model->getall('aboutus_messageceo');

                foreach ($record as $key)
                {
                    $data['img_msc'] = $key->userfile;
                    $data['content_msc'] = $key->descriptor;
                }

                $this->load->view('message_from_ceo',$data);
                break;

            case 'visi_dan_misi':
                $record = $this->cat_model->getall('aboutus_visionmission_id');

                foreach ($record as $key)
                {
                    $data['img'] = $key->userfile;
                    $data['vision_desc'] = $key->vision_desc;
                    $data['mission_desc'] = $key->mission_desc;
                }

                $this->load->view('vision_and_mission_id',$data);
                break;

            case 'vision_and_mission':
                $record = $this->cat_model->getall('aboutus_visionmission');

                foreach ($record as $key)
                {
                    $data['img'] = $key->userfile;
                    $data['vision_desc'] = $key->vision_desc;
                    $data['mission_desc'] = $key->mission_desc;
                }

                $this->load->view('vision_and_mission',$data);
                break;

            case 'filosofi_perusahaan':
                $record = $this->cat_model->getall('aboutus_corporatephilosophy_id');

                foreach ($record as $key)
                {
                    $data['img'] = $key->userfile;
                    $data['descriptor'] = $key->descriptor;
                }

                $this->load->view('corporate_philosophy_id',$data);
                break;

            case 'corporate_philosophy':
                $record = $this->cat_model->getall('aboutus_corporatephilosophy');

                foreach ($record as $key)
                {
                    $data['img'] = $key->userfile;
                    $data['descriptor'] = $key->descriptor;
                }

                $this->load->view('corporate_philosophy',$data);
                break;
            case 'prinsip_perusahaan':
                $data['raw_corporate_principal'] = $this->cat_model->getall('aboutus_corporateprincipal_id');

                $this->load->view('corporate_principal_id',$data);
                break;

            case 'corporate_principal':
                $data['raw_corporate_principal'] = $this->cat_model->getall('aboutus_corporateprincipal');

                $this->load->view('corporate_principal',$data);
                break;

            case 'sekilas_acset':
                $data['glance'] = $this->cat_model->getall('aboutus_glance_id');

                foreach($data['glance'] as $key)
                {
                    $data['content'] = $key->content;
                }

                $this->load->view('acset_at_glance_id',$data);
                break;

            case 'acset_at_glance':
                $data['glance'] = $this->cat_model->getall('aboutus_glance');

                foreach($data['glance'] as $key)
                {
                    $data['content'] = $key->content;
                }

                $this->load->view('acset_at_glance',$data);
                break;

            case 'riwayat_kami':
                $data['raw_milestone'] = $this->cat_model->getall('aboutus_milestone');
                $data['raw_milestoneyear'] = $this->cat_model->getall('aboutus_milestoneyear');  
                
                foreach ($data['raw_milestone'] as $key) 
                {
                    $data['image'] = $key->userfile;
                }

                $this->load->view('milestone_id',$data);
                break;

            case 'milestone':
                $data['raw_milestone'] = $this->cat_model->getall('aboutus_milestone');
                $data['raw_milestoneyear'] = $this->cat_model->getall('aboutus_milestoneyear');  
                
                foreach ($data['raw_milestone'] as $key) 
                {
                    $data['image'] = $key->userfile;
                }

                $this->load->view('milestone',$data);
                break;

            case 'management_team':
                $data['raw_boc'] = $this->cat_model->getall('aboutus_management_boc');
                $data['raw_bod'] = $this->cat_model->getall('aboutus_management_bod');
                
                $this->load->view('management_team',$data);
                break;

            case 'dewan_komisaris':
                $data['raw_boc'] = $this->cat_model->getall('aboutus_management_boc_id');
                
                $this->load->view('boc_id',$data);
                break;

            case 'board_of_commissioners':
                $data['raw_boc'] = $this->cat_model->getall('aboutus_management_boc');
                
                $this->load->view('boc',$data);
                break;

            case 'dewan_direksi':
                $data['raw_bod'] = $this->cat_model->getall('aboutus_management_bod_id');
                
                $this->load->view('bod_id',$data);
                break;

            case 'board_of_directors':
                $data['raw_bod'] = $this->cat_model->getall('aboutus_management_bod');
                
                $this->load->view('bod',$data);
                break;

            case 'anak_perusahaan':
                $data['raw_subsidiaries'] = $this->cat_model->getall('home_subsidiaries_id');
                
                $this->load->view('subsidiaries_id',$data);
                break;

            case 'subsidiaries':
                $data['raw_subsidiaries'] = $this->cat_model->getall('home_subsidiaries');
                
                $this->load->view('subsidiaries',$data);
                break;

            case 'penghargaan':
                $data['raw_achievement'] = $this->cat_model->getall('aboutus_achievement_id');
                
                $this->load->view('achievement_id',$data);
                break;               

            case 'achievement':
                $data['raw_achievement'] = $this->cat_model->getall('aboutus_achievement');
                
                $this->load->view('achievement',$data);
                break; 

            case 'tnc':
                $data['raw_tnc'] = $this->cat_model->getall('aboutus_tnc');
                
                $this->load->view('tnc',$data);
                break;

            case 'policy':
                $data['raw_policy'] = $this->cat_model->getall('aboutus_privacy');
                
                $this->load->view('policy',$data);
                break;

             case 'tnc_en':
                $data['raw_tnc'] = $this->cat_model->getall('aboutus_tnc_en');
                
                $this->load->view('tnc_en',$data);
                break;

            case 'policy_en':
                $data['raw_policy'] = $this->cat_model->getall('aboutus_privacy_en');
                
                $this->load->view('policy_en',$data);
                break;
            default:
                echo "The page you requested was not found.";
                break;
        }
    }


}
