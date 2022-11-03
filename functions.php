<?php
// My theme Function


// Theme title

add_theme_support('title-tag');
// Theme CSS jQuery File calling
function sultana_css_js_file(){
    wp_enqueue_style('sultana-style', get_stylesheet_uri());
    wp_register_style('bootstrap', get_template_directory_uri().'/css/bootstrap.css', array(), '5.0.2', 'all');
    wp_register_style('custom', get_template_directory_uri().'/css/custom.css', array(), '1.0.0', 'all');
    wp_enqueue_style('bootstrap');
    wp_enqueue_style('custom');


    // jQuery
    // wp_enqueue_script( $handle:string, $src:string, $deps:array, $ver:string|boolean|null, $in_footer:boolean )
    wp_enqueue_script('jQuery');
    wp_enqueue_script('bootstrap', get_template_directory_uri().'/js/bootstrap.js', array(), '5.0.2', 'true');
    wp_enqueue_script('main', get_template_directory_uri().'/js/main.js', array(), '1.0.0', 'true');

}
add_action('wp_enqueue_scripts', 'sultana_css_js_file');

// Google fonts

function zim_add_google_fonts(){
    wp_enqueue_style('zim_google_fonts', 'https://fonts.googleapis.com/css2?family=Kaisei+Decol&family=Oswald&display=swap', false);
  }
  add_action('wp_enqueue_scripts', 'zim_add_google_fonts');



// Theme function
function zim_logo_customize($wp_customize){

    // header area function

    $wp_customize->add_section('zim_header_area', array(
        'title' =>__('HeaderArea', 'sultanaparvin'),
        'description' => 'Si vous souhaitez mettre à jour votre zone de header, vous pouvez le faire'
    ));
    $wp_customize ->add_setting('zimam_logo', array(
        'default' => get_bloginfo('template_directory') . '/img/logo.png',
    ));
    $wp_customize -> add_control(new WP_Customize_Image_Control($wp_customize, 'zimam_logo', array(
        'label' =>'Logo upload',
        'description' => 'Si vous souhaitez mettre à jour votre logo, vous pouvez le faire',
        'setting' => 'zimam_logo',
        'section' => 'zim_header_area',
    ) ));

    // menu position option

    $wp_customize->add_section('zimam_menu_option', array(
        'title' =>__('Menu position option', 'sultanaparvin'),
        'description' => 'Si vous souhaitez changer votre position de menu, vous pouvez le faire'
    ));

    $wp_customize->add_setting('zimam_menu_position', array(
        'default' => 'right_menu',
    ));

    $wp_customize-> add_control('zimam_menu_position', array(
        'label' =>'Menu position',
        'description' => 'sélectionnez votre position de menu',
        'setting' => 'zimam_menu_position',
        'section' => 'zimam_menu_option',
        'type' => 'radio',
        'choices' => array(
            'left_menu' => 'Left menu',
            'right_menu' => 'Right menu',
            'center_menu' => 'Center menu',
        )
    ));

}

add_action( 'customize_register', 'zim_logo_customize' );

// menu register

register_nav_menu( 'main_menu', __('Main Menu', 'sultanaparvin') );

?>