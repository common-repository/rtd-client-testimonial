<?php





function testimonial_metabox(){
	$cmb = new_cmb2_box( array(
		'id'            => 'testimonial_group',
		'title'         => __( 'Testimonial Options', 'rtd' ),
		'object_types'  => array( 'testimonial'), // Post type		
		'context'       => 'normal',
		'priority'      => 'low',
		'show_names'    => true, // Show field names on the left
		// 'cmb_styles' => false, // false to disable the CMB stylesheet
		// 'closed'     => true, // Keep the metabox closed by default
	) );


	$cmb->add_field( array(
    'name' => 'Client Name',
    'desc' => 'This is a Client Name',
    'type' => 'text',
    'id'   => 'client_name'
	) );

	$cmb->add_field( array(
    'name'    => 'Client Name Color',
    'id'      => 'name_colorpicker',
    'type'    => 'colorpicker',
    'default' => '#1A5088',
	) );	

	$cmb->add_field( array(
    'name' => 'Client Designation',
    'desc' => 'This is a Client Designation',
    'type' => 'text',
    'id'   => 'client_Designation'
	) );

	$cmb->add_field( array(
    'name'    => 'Client Designation Color',
    'id'      => 'designation_colorpicker',
    'type'    => 'colorpicker',
    'default' => '#1A5088',
	) );



}

add_action("cmb2_init","testimonial_metabox");











?>