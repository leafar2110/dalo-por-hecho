<!DOCTYPE html>
<html lang="<?php bloginfo('language'); ?>">

<head>
    <meta charset="UTF-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title><?php wp_title('|', true, 'right'); ?></title>
    <link rel="icon" type="image/png" sizes="32x32" href="https://daloporhecho.cl/wp-content/uploads/2020/09/favicon-32x32-1.png">
    <?php wp_head(); global $current_user, $wp_roles;?>
</head>

            <?php if( is_user_logged_in() != NULL):?>
                
                <?php else: ?>
                    <style> 
                        .next-step, .round-tab{
                            pointer-events: none;
                        }
                    </style>        
            <?php endif; ?>
                    <style> 
                        .round-tab{
                            pointer-events: none;
                        }
                    </style>
        
<body>
     <div class="main-fixed__ws">
    <?php if ( wp_is_mobile() ) : ?>
        <a href="https://api.whatsapp.com/send?phone=56937069999" >
            <img src="https://daloporhecho.cl/wp-content/uploads/2020/10/whatsapp-1.png">
        </a>
     <?php else:?>
    
        <a href="https://web.whatsapp.com/send?phone=56937069999" >
            <img src="https://daloporhecho.cl/wp-content/uploads/2020/10/whatsapp-1.png">
        </a>
     <?php endif;?>
  </div>
    
    
    <header>
        <nav class="navbar navbar-expand-md fixed-top navbar-fixed-js">
            <div class="container">
                <div class="main-brand">
                    <div class="main-brand">
                        <a class="navbar-brand" href="<?php echo get_home_url() ?>">
                            <img class="iso-desk" src="<?php echo get_template_directory_uri();?>/assets/img/logo-blanco.png">
                        </a>

                    </div>
                    <button class="navbar-toggler p-0 border-0" data-toggle="offcanvas" type="button">
                        <span class="navbar-toggler-icon fa fa-bars"></span>
                    </button>
                </div>
                <div class="navbar-collapse offcanvas-collapse">
                    <div class="main-brand">
                        <a class="navbar-brand" href="<?php echo get_home_url() ?>">
                            <img id="iso" src="<?php echo get_template_directory_uri();?>/assets/img/logo-blanco.png">
                        </a>

                    </div>

                    <ul class="navbar-nav ">
                        <li class="nav-item">
                            <a class="nav-link btn-custom-nav mr-3" href="<?php echo get_home_url() ?>/buscar-tareas"><?php echo get_theme_mod('banner1_button1'); ?></a>
                        </li>
                        <li class="nav-item">
                        <?php if( is_user_logged_in() != NULL):?>
                            <a class="nav-link btn-custom-nav  btn-custom-transparent-nav" id="form_conf" href="" data-toggle="modal"
                                data-target="#step" onclick=""><?php echo get_theme_mod('banner1_button2'); ?></a>
                            <?php else: ?>
<a class="nav-link btn-custom-nav  btn-custom-transparent-nav" href="#" data-toggle="modal" data-target="#exampleModal"><?php echo get_theme_mod('banner1_button2'); ?></a>
                                <?php endif; ?>
                        </li>

                    </ul>

                    <ul class="navbar-nav ">
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo get_home_url() ?>/politicas-de-empresa">Políticas de Empresa</a>
                        </li>						
                        <?php 
                            if ( is_home()): ?>
                                <li class="nav-item">
                                    <a class="nav-link" href="#funciona">Como funciona</a>
                                </li>
                            <?php else:?>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo get_home_url() ?>/#funciona">Como funciona</a>
                                </li>
                            <?php endif;?>
                                
                        <li class="nav-item dropdown dowms" style="color: #ec8603;margin-top: 5px;">
                            <?php if( is_user_logged_in() != NULL):?>
                            
                        
                            <div aria-labelledby='dropdownMenuButton' class='dropdown-menu' >
                                <div class='content-drop'>
                                    
                                    <?php if( meta_user_value( 'user_registration_radio_1600171615', $current_user->ID ) == "Ofrezco un Servicio" )
                                    { ?>
                                        <a class='dropdown-item' href="<?php bloginfo('url'); ?>/mis-tareas">Mis tareas</a>
                                    <?php } ?>
                                    <a class='dropdown-item' href='<?php echo wp_logout_url( home_url() ); ?>'>
                                        <p>
                                            Cerrar Sesión
                                        </p>
                                    </a>
                                </div>
                            </div>
                            <?php else: ?>
                            <a class="nav-link naranja-color" style="margin-top:-5px;" href="#" data-toggle="modal" data-target="#exampleModal"> 
                            <?php endif; ?>
                            
                        <?php if (is_user_logged_in()){ ?>
                                <a class="naranja-color" href='<?php echo get_home_url() ?>/confi-perfil'> 
                                <?php 
                                    echo "Mi cuenta";
                                    echo get_avatar( $current_user->user_email, 30 );
                                ?>
                                </a>
                                
                             <?php
                        }else{ ?>
                            Ingresa
                            
                        <?php } ?>
                            </a>
                        </li>
                        <?php if( meta_user_value( 'user_registration_radio_1600171615', $current_user->ID ) == "Ofrezco un Servicio" ) {
                            $url = "/confi-perfil/?tab=notification";
                        }
                        else{
                            $url = "/confi-perfil/?tab=notification-empleado";
                        }
                        ?>
                        <?php if (is_user_logged_in()){ ?>
                            <li class="nav-item-notifications">
                                <a class="nav-link-notifications" href="<?php bloginfo('url'); echo $url; ?>"> 
                                    <i class="fa fa-bell-o" aria-hidden="true"></i>
                                    <span>1</span> 
                                </a>
                                <a class="nav-link-notifications" href="<?php bloginfo('url'); echo $url; ?>">
                                    <i class="fa fa-envelope-o" aria-hidden="true"></i> 
                                    <span><?php echo count_chat($current_user->ID); ?></span>
                                </a>
                            </li>
                            
                            <?php
                        } ?>
                    </ul>
                </div>
            </div>
        </nav>
    </header>



<!-- Modal Inicio de sesion -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
        <button type="button" class="close main-modal__close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
      <div class="modal-body">

      <nav>
        <div class="nav nav-tabs" id="nav-tab" role="tablist">
            <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Iniciar Sesión</a>
            <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Registrar</a>
            
           
        </div>
        </nav>
        <div class="tab-content" id="nav-tabContent">
            <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
            <div class="container main-login__container ">
                <div class="row">
                    <div class="col-lg-12 col-md-12 order-last-xs ">
                        <?php 
                        $create2 = $create ?? '';
                        if ($create2 != 'account') { ?>
<?php 
/*
 * This is the page users will see logged out. 
 * You can edit this, but for upgrade safety you should copy and modify this file into your template folder.
 * The location from within your template folder is plugins/login-with-ajax/ (create these directories if they don't exist)
*/
?>
    <div class="lwa lwa-default"><?php //class must be here, and if this is a template, class name should be that of template directory ?>
        <form class="lwa-form" action="<?php echo esc_url(LoginWithAjax::$url_login); ?>" method="post">
            <div>
                <br>
                <h2 class="text-center">Iniciar sesión</h2>
            <span class="lwa-status"></span>
            <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                <label><?php esc_html_e( 'Ingresa tu email','login-with-ajax' ) ?></label>                    
                <input type="text" name="log" /> 
            </p>
            <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                <label><?php esc_html_e( 'Ingresa tu clave','login-with-ajax' ) ?></label>
                <input type="password" name="pwd" />
            </p>
            <p class="form-row">
                        <input class="main-general__btn main-general__button woocommerce-button woocommerce-form-login__submit" type="submit" name="wp-submit" id="lwa_wp-submit" value="<?php esc_attr_e('Iniciar sesión', 'login-with-ajax'); ?>" tabindex="100" />
                        <?php if( isset($lwa_data['profile_link']) ): ?>
                            <input type="hidden" name="lwa_profile_link" value="<?php echo esc_attr($lwa_data['profile_link']); ?>" />
                        <?php endif; ?>
                        <input type="hidden" name="login-with-ajax" value="login" />
                        <?php if( !empty($lwa_data['redirect']) ): ?>
                            <input type="hidden" name="redirect_to" value="<?php echo esc_url($lwa_data['redirect']); ?>" />
                        <?php endif; ?>
            </p>
                                <div class="form-login__register text-center" >
                                    <p class="woocommerce-LostPassword lost_password">
                                        <a href="<?php echo esc_url( wp_lostpassword_url() ); ?>"><?php esc_html_e( '¿Se te olvidó tu contraseña?', 'woocommerce' ); ?></a>
                                        <p class="woocommerce-in-account">
                                            <!--<a href="?create=account"><?='Crea una cuenta' ?></a>--></p>
                                    </p>
                                </div>
            </div>
        </form>
        <?php if( !empty($lwa_data['remember']) && $lwa_data['remember'] == 1 ): ?>
        <form class="lwa-remember" action="<?php echo esc_attr(LoginWithAjax::$url_remember) ?>" method="post" style="display:none;">
            <div>
            <span class="lwa-status"></span>
            <table>
                <tr>
                    <td>
                        <strong><?php esc_html_e("Forgotten Password", 'login-with-ajax'); ?></strong>         
                    </td>
                </tr>
                <tr>
                    <td class="lwa-remember-email">  
                        <?php $msg = __("Enter username or email", 'login-with-ajax'); ?>
                        <input type="text" name="user_login" class="lwa-user-remember" value="<?php echo esc_attr($msg); ?>" onfocus="if(this.value == '<?php echo esc_attr($msg); ?>'){this.value = '';}" onblur="if(this.value == ''){this.value = '<?php echo esc_attr($msg); ?>'}" />
                        <?php do_action('lostpassword_form'); ?>
                    </td>
                </tr>
                <tr>
                    <td class="lwa-remember-buttons">
                        <input type="submit" value="<?php esc_attr_e("Get New Password", 'login-with-ajax'); ?>" class="lwa-button-remember" />
                        <a href="#" class="lwa-links-remember-cancel"><?php esc_html_e("Cancel", 'login-with-ajax'); ?></a>
                        <input type="hidden" name="login-with-ajax" value="remember" />
                    </td>
                </tr>
            </table>
            </div>
        </form>
        <?php endif; ?>
        <?php if( get_option('users_can_register') && !empty($lwa_data['registration']) && $lwa_data['registration'] == 1 ): ?>
        <div class="lwa-register lwa-register-default lwa-modal" style="display:none;">
            <h4><?php esc_html_e('Register For This Site','login-with-ajax') ?></h4>
            <p><em class="lwa-register-tip"><?php esc_html_e('A password will be e-mailed to you.','login-with-ajax') ?></em></p>
            <form class="lwa-register-form" action="<?php echo esc_attr(LoginWithAjax::$url_register); ?>" method="post">
                <div>
                <span class="lwa-status"></span>
                <p class="lwa-username">
                    <label><?php esc_html_e('Username','login-with-ajax') ?><br />
                    <input type="text" name="user_login" id="user_login" class="input" size="20" tabindex="10" /></label>
                </p>
                <p class="lwa-email">
                    <label><?php esc_html_e('E-mail','login-with-ajax') ?><br />
                    <input type="text" name="user_email" id="user_email" class="input" size="25" tabindex="20" /></label>
                </p>
                <?php do_action('register_form'); ?>
                <?php do_action('lwa_register_form'); ?>
                <p class="submit">
                    <input type="submit" name="wp-submit" id="wp-submit" class="button-primary" value="<?php esc_attr_e('Register', 'login-with-ajax'); ?>" tabindex="100" />
                </p>
                <input type="hidden" name="login-with-ajax" value="register" />
                </div>
            </form>
        </div>
        <?php endif; ?>
    </div>
                        <?php } ?> 
                    </div>
                </div>
            </div>


            </div>
            <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">

                <div class="main-login__container">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 order-last-xs ">
                            
                    

                            <div class="woocommerce-form form-custom woocommerce-form-login login">
                                <div class="">
                                <br>
                                <h2 class="text-center"> Registrarse</h2>
                                
                               
                                

                                <?php echo do_shortcode('[user_registration_form id="208"]');?>

                                    <center>
                                        <div class="form-login__register" >
                                            <p class="woocommerce-LostPassword lost_password">                  
                                                
                                                <!--<a href="?"><?='Iniciar sesión' ?></a>-->
                                                <p class="woocommerce-in-account"><a href="<?php echo esc_url( wp_lostpassword_url() ); ?>"><?php esc_html_e( 'Perdiste tu contraseña', 'woocommerce' ); ?></a>
                                            </p>
                                        </div>  
                                    </center>            
                                    </div>
                            </div>
                          

                        </div>
                    </div>
                </div>
            </div>
            
        </div>
         
    </div>
      </div>
      
    </div>
  </div>
</div>