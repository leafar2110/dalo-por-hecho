<?php
if(is_user_logged_in() != NULL)
{ 
  header('Location: '.get_home_url().'/confi-perfil/');
}
/**
 * Job listing in the loop.
 *
 * This template can be overridden by copying it to yourtheme/job_manager/content-job_listing.php.
 *
 * @see         https://wpjobmanager.com/document/template-overrides/
 * @author      Automattic
 * @package     WP Job Manager
 * @category    Template
 * @since       1.0.0
 * @version     1.27.0
 */
get_header();
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

$create = NULL;
$url = $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"];
if (strpos($url, '?') !== false) {
   $create = $_GET['create'];
}

?>



    <div class="container buscar_tareas ingresar-t perfil m-110">
        <div class="row">
            <div class="col-lg-12 col-md-12 scroll-admin order-last-xs ">



<div class="grid-woocommerce">
    <div class="padding-left-right padding-top-bottom">
 
<?php           
do_action( 'woocommerce_before_customer_login_form' ); ?>

<?php if ( 'yes' === get_option( 'woocommerce_enable_myaccount_registration' ) ) : ?>

<div class="u-columns col2-set" id="customer_login">

    <div class="u-column1 col-12 flex-login">

<?php endif; ?>

    <?php if ($create != 'account') { ?>
        <form class="woocommerce-form form-custom woocommerce-form-login login" method="post">
            <div class="login-img">

                <img class="" src="<?php echo get_template_directory_uri();?>/assets/img/user.png">
            </div>
            <h2 class="text-center">Iniciar sesión</h2>
            <?php do_action( 'woocommerce_login_form_start' ); ?>

            <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                <label for="username" class="label-user" >
                <img class="" src="<?php echo get_template_directory_uri();?>/assets/img/usergray.png">
                Ingresa tu email
                <input type="text" placeholder="" class="woocommerce-Input woocommerce-Input--text input-text" name="username" id="username" autocomplete="off" value="<?php echo ( ! empty( $_POST['username'] ) ) ? esc_attr( wp_unslash( $_POST['username'] ) ) : ''; ?>" /><?php // @codingStandardsIgnoreLine ?>
            </label>
            </p>
            <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                <label for="password">
                <img class="" src="<?php echo get_template_directory_uri();?>/assets/img/pass.png">
                Ingresa tu clave
                <input placeholder="" class="woocommerce-Input woocommerce-Input--text input-text" type="password" name="password" id="password" autocomplete="off" />
            </label>
            </p>

            <?php do_action( 'woocommerce_login_form' ); ?>

            <p class="form-row">
                <!-- <label class="woocommerce-form__label woocommerce-form__label-for-checkbox woocommerce-form-login__rememberme">
                    <input class="woocommerce-form__input woocommerce-form__input-checkbox" name="rememberme" type="checkbox" id="rememberme" value="forever" /> <span><?php esc_html_e('Recuerdame', 'woocommerce' ); ?></span>
                </label> -->
                <?php wp_nonce_field( 'woocommerce-login', 'woocommerce-login-nonce' ); ?>
                <button type="submit" class="main-general__button woocommerce-button woocommerce-form-login__submit" name="login" value="<?php esc_attr_e( 'Log in', 'woocommerce' ); ?>"><?php esc_html_e( 'Iniciar sesión', 'woocommerce' ); ?></button>
            </p>
            <div class="form-login__register text-center" >
                <p class="woocommerce-LostPassword lost_password">
                    <a href="<?php echo esc_url( wp_lostpassword_url() ); ?>"><?php esc_html_e( '¿Se te olvidó tu contraseña?', 'woocommerce' ); ?></a>
                    <p class="woocommerce-in-account"><a href="?create=account"><?='Crea una cuenta' ?></a></p>
                </p>
            </div>


            <?php do_action( 'woocommerce_login_form_end' ); ?>

        </form>
    <?php } ?> 



<?php if ($create == 'account') { ?>

    <div class="u-column2 col-12 flex-login">
        <div class="form-custom form-register">
        <div class="login-img">
            <img class="" src="<?php echo get_template_directory_uri();?>/assets/img/user.png">
        </div>
        Registrarse

        <h2><?php esc_html_e( $la, 'woocommerce' ); ?></h2>

        <?php echo do_shortcode('[user_registration_form id="96"]');?>

            <div class="form-login__register" >
                <p class="woocommerce-LostPassword lost_password">                  
                    
                    <a href="?"><?='Iniciar sesión' ?></a>
                    <p class="woocommerce-in-account"><a href="<?php echo esc_url( wp_lostpassword_url() ); ?>"><?php esc_html_e( 'Perdiste tu contraseña', 'woocommerce' ); ?></a></p>
                </p>
            </div>              
            </div>
    </div>
<?php } ?>

</div>


<?php do_action( 'woocommerce_after_customer_login_form' ); ?>

    </div>
</div>

                
            </div>
        </div>    
    </div>
        




    <?php get_footer(); ?>