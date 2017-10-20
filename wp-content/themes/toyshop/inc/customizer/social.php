<?php 
/*Social icons section */
    $wp_customize->add_section( 'social_icons' , array(
    'title'      => __( 'Social', 'starter' ),
    'priority'   => 260,
    ) );






    /*Facebook section */
    $wp_customize->add_setting( 'social_customizer_fb_icon' , array(
        'sanitize_callback' => 'sanitize_image'
    ) );
    $wp_customize->add_setting( 'social_customizer_fb_url' , array(
        'default'   => 'https://www.facebook.com/lfweb',
        'sanitize_callback' => 'text_sanitize',
    ) );

    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'facebook_icon', array(
        'label'    => __( 'Upload Facebook Icon', 'starter' ),
        'section'  => 'social_icons',
        'settings' => 'social_customizer_fb_icon',
    ) ) );

    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'facebook_url', array(
        'label'    => __( 'Facebook URL', 'starter' ),
        'section'  => 'social_icons',
        'settings' => 'social_customizer_fb_url',
    ) ) );
    /*Twitter section */
    $wp_customize->add_setting( 'social_customizer_tw_icon' , array(
        'sanitize_callback' => 'sanitize_image'
    ) );
    $wp_customize->add_setting( 'social_customizer_tw_url' , array(
        'default'   => 'https://twitter.com/LibraFireDev',
        'sanitize_callback' => 'text_sanitize',
    ) );

    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'twitter_icon', array(
        'label'    => __( 'Upload Twitter Icon', 'starter' ),
        'section'  => 'social_icons',
        'settings' => 'social_customizer_tw_icon',
    ) ) );

    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'twitter_url', array(
        'label'    => __( 'Twitter URL', 'starter' ),
        'section'  => 'social_icons',
        'settings' => 'social_customizer_tw_url',
    ) ) );
    /*Google section */
    $wp_customize->add_setting( 'social_customizer_g_icon' , array(
        'sanitize_callback' => 'sanitize_image'
    ) );
    $wp_customize->add_setting( 'social_customizer_g_url' , array(
        'default'   => 'https://plus.google.com/+LibrafireDev/',
        'sanitize_callback' => 'text_sanitize',
    ) );

    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'google_icon', array(
        'label'    => __( 'Upload Google+ Icon', 'starter' ),
        'section'  => 'social_icons',
        'settings' => 'social_customizer_g_icon',
    ) ) );

    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'google_url', array(
        'label'    => __( 'Google+ URL', 'starter' ),
        'section'  => 'social_icons',
        'settings' => 'social_customizer_g_url',
    ) ) );
    /*Instagram section */
    $wp_customize->add_setting( 'social_customizer_instagram_icon' , array(
        'sanitize_callback' => 'sanitize_image'
    ) );
    $wp_customize->add_setting( 'social_customizer_instagram_url' , array(
        'default'   => 'http://instagram.com/',
        'sanitize_callback' => 'text_sanitize',
    ) );

    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'instagram_icon', array(
        'label'    => __( 'Upload Instagram Icon', 'starter' ),
        'section'  => 'social_icons',
        'settings' => 'social_customizer_instagram_icon',
    ) ) );

    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'instagram_url', array(
        'label'    => __( 'Instagram URL', 'starter' ),
        'section'  => 'social_icons',
        'settings' => 'social_customizer_instagram_url',
    ) ) );
    /*LinkedIn section */
    $wp_customize->add_setting( 'social_customizer_lni_icon' , array(
        'sanitize_callback' => 'sanitize_image'
    ) );
    $wp_customize->add_setting( 'social_customizer_lni_url' , array(
        'default'   => 'https://www.linkedin.com/',
        'sanitize_callback' => 'text_sanitize',
    ) );

    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'linkedin_icon', array(
        'label'    => __( 'Upload LinkedIn Icon', 'starter' ),
        'section'  => 'social_icons',
        'settings' => 'social_customizer_lni_icon',
    ) ) );

    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'linkedin_url', array(
        'label'    => __( 'LinkedIn URL', 'starter' ),
        'section'  => 'social_icons',
        'settings' => 'social_customizer_lni_url',
    ) ) );


    /*Pinterest section */
    $wp_customize->add_setting( 'social_customizer_pinterest_icon' , array(
        'sanitize_callback' => 'sanitize_image'
    ) );
    $wp_customize->add_setting( 'social_customizer_pinterest_url' , array(
        'default'   => 'https://www.pinterest.com/',
        'sanitize_callback' => 'text_sanitize',
    ) );

    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'social_customizer_pinterest_icon', array(
        'label'    => __( 'Upload Pinterest Icon', 'starter' ),
        'section'  => 'social_icons',
        'settings' => 'social_customizer_pinterest_icon',
    ) ) );

    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'social_customizer_pinterest_url', array(
        'label'    => __( 'Pinterest URL', 'starter' ),
        'section'  => 'social_icons',
        'settings' => 'social_customizer_pinterest_url',
    ) ) );

?>