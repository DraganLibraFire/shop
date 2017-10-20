<?php 
//Google analytics
    $wp_customize->add_section( 'google_analytics' , array(
    'title'      => __( 'Google analytics code', 'starter' ),
    'description'    => __( 'Enter your google analytics code', 'starter' ),
    'priority'   => 1000,
    
    ) );
    $wp_customize->add_setting( 'google_analytics_code' , array(
        'default'   => '',
        'sanitize_callback' => 'textarea_sanitize',
    ) );
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'google_analytics', array(
        'label'    => __( 'Google analytics', 'starter' ),
        'section'  => 'google_analytics',
        'settings' => 'google_analytics_code',
        'type'     => 'textarea',
    ) ) );


?>