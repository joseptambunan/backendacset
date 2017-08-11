<?php 
    $str = read_file('assets/json/catalyst-attribute.json');
    $response = json_decode($str);
    $logo = $response->attribute->logo[0]->logo_desktop;
    //echo md5("12345");
?>

    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="logo-wrapper text-center">
                        <img src="<?= base_url($logo) ?>">
                    </div>
                    <div class="panel-heading">
                        <h3 class="panel-title">Please Sign In</h3>
                    </div>
                    <div class="panel-body">
                        <?php 
                            $var = array(   
                                            'admin/login_processor' => 
                                            array(
                                                    array(
                                                            'type' => 'text',
                                                            'name' => 'username',
                                                            'placeholder' => 'username',
                                                            'autofocus' => 'autofocus',
                                                            'class' => 'form-control',
                                                         ),
                                                    array(
                                                            'type' => 'password',
                                                            'name' => 'password',
                                                            'placeholder' => 'password',
                                                            'class' => 'form-control',
                                                         ),
                                                    array(
                                                            'type' => 'sitekey',
                                                            'appear_in' => 3, 
                                                         ),                                                    
                                                    array(
                                                            'type' => 'submit',
                                                            'name' => 'btn-login',
                                                            'class' => 'btn btn-success btn-block',
                                                            'value' => 'login',
                                                         ),

                                                 ), 
                                        );

                            $this->cat_form->form_maker($var);
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>