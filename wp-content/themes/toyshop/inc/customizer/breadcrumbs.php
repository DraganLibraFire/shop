<?php
$wp_customize->add_section( 'breadcrumbs_options' , array(
    'title'      => __( 'Breadcrumbs', 'starter' ),
    'priority'   => 100,
    'panel' => 'general_options'
) );
$wp_customize->add_setting( 'breadcrumbs_enable' , array(
    'default' => 'yes',
    'sanitize_callback' => 'sanitize_choices',
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'breadcrumbs_options', array(
    'label'    => __( 'Set cointainer width', 'starter' ),
    'section'  => 'breadcrumbs_options',
    'settings' => 'breadcrumbs_enable',
    'label' => __( 'Enable Breadcrumbs', 'starter' ),
    'type' => 'radio',
    'choices' => array(
        'yes' => 'Yes',
        'no' => 'No',
    ),
) ) );