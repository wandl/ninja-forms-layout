<?php
   /*
   Plugin Name: Ninja Form Layout
   Plugin URI: http://marclloyd.co.uk
   Description: A plugin to add fieldset and div options to Ninja Forms for layout. Includes the option for custom classes.
   Version: 1.2
   Author: Marc Lloyd
   Author URI: http://marclloyd.co.uk
   License: GPL2
   Modfied: Joseph Blythe <josephb@wellnesslifetyles.com.au>
   Added: Fieldset legend
   */

// Licensing
function ninja_forms_layout_extend_setup_license() {
	if ( class_exists( 'NF_Extension_Updater' ) ) {
		$NF_Extension_Updater = new NF_Extension_Updater( 'Product Name', '1.0', 'Your Name', __FILE__, 'option_prefix' );
	}
}

add_action( 'admin_init', 'ninja_forms_layout_extend_setup_license' );


// Fieldset Start element
function ninja_forms_register_field_fieldset_start(){
	$args = array(
        'name' => __( 'Fieldset Start', 'ninja-forms' ),
        'sidebar' => 'layout_fields',
        'edit_function' => '',
        'display_function' => 'ninja_forms_field_fieldset_start',
        'group' => 'layout_elements',
        'display_label' => false,
        'display_wrap' => false,
        'edit_label' => false,
        'edit_label_pos' => false,
        'edit_req' => false,
        'edit_custom_class' => true,
        'edit_help' => false,
        'edit_meta' => false,
        'edit_conditional' => true,
        'process_field' => false,
	);

    if( function_exists( 'ninja_forms_register_field' ) ) {
        ninja_forms_register_field('_fieldset_start', $args);
    }

}

add_action('init', 'ninja_forms_register_field_fieldset_start');

function ninja_forms_field_fieldset_start($field_id, $data){
	$field_class = ninja_forms_get_field_class($field_id);
	?>
	<fieldset class="<?php echo $field_class;?>" id="ninja_forms_field_<?php echo $field_id;?>_div_wrap" rel="<?php echo $field_id;?>">
	<?php

}

// Fieldset Start element
function ninja_forms_register_field_fieldset_legend(){
    $args = array(
        'name' => __( 'Fieldset Legend', 'ninja-forms' ),
        'sidebar' => 'layout_fields',
        'edit_function' => '',
        'display_function' => 'ninja_forms_field_fieldset_legend',
        'group' => 'layout_elements',
        'display_label' => false,
        'display_wrap' => false,
        'edit_label' => false,
        'edit_label_pos' => false,
        'edit_req' => false,
        'edit_custom_class' => true,
        'edit_help' => false,
        'edit_meta' => false,
        'edit_conditional' => true,
        'process_field' => false,
    );

    if( function_exists( 'ninja_forms_register_field' ) ) {
        ninja_forms_register_field('_fieldset_legend', $args);
    }

}

add_action('init', 'ninja_forms_register_field_fieldset_legend');

function ninja_forms_field_fieldset_legend($field_id, $data){
    $field = ninja_forms_get_field_by_id( $field_id );
    $form_id = $field['form_id'];
    $form_title = Ninja_Forms()->form( $form_id )->get_setting( 'form_title' );
    ?>
    <legend id="ninja_forms_field_<?php echo $field_id;?>_div_wrap" rel="<?php echo $field_id;?>"><?php print  $form_title ?></legend>
    <?php

}

// Fieldset End element
function ninja_forms_register_field_fieldset_end(){
	$args = array(
		'name' => __( 'Fieldset End', 'ninja-forms' ),
		'sidebar' => 'layout_fields',
		'edit_function' => '',
		'display_function' => 'ninja_forms_field_fieldset_end',
		'group' => 'standard_fields',
		'display_label' => false,
		'display_wrap' => false,
		'edit_label' => false,
		'edit_label_pos' => false,
		'edit_req' => false,
		'edit_custom_class' => false,
		'edit_help' => false,
		'edit_meta' => false,
		'edit_conditional' => true,
		'process_field' => false,
	);

	ninja_forms_register_field('_fieldset_end', $args);
}

add_action('init', 'ninja_forms_register_field_fieldset_end');

function ninja_forms_field_fieldset_end($field_id, $data){
	?>
	</fieldset>
	<?php

}


// Div Start element
function ninja_forms_register_field_div_start(){
    $args = array(
        'name' => __( 'Div Start', 'ninja-forms' ),
        'sidebar' => 'layout_fields',
        'edit_function' => '',
        'display_function' => 'ninja_forms_field_div_start',
        'group' => 'layout_elements',
        'display_label' => false,
        'display_wrap' => false,
        'edit_label' => false,
        'edit_label_pos' => false,
        'edit_req' => false,
        'edit_custom_class' => true,
        'edit_help' => false,
        'edit_meta' => false,
        'edit_conditional' => true,
        'process_field' => false,
    );

    ninja_forms_register_field('_div_start', $args);
}

add_action('init', 'ninja_forms_register_field_div_start');

function ninja_forms_field_div_start($field_id, $data){
    $field_class = ninja_forms_get_field_class($field_id);
    ?>
    <div class="<?php echo $field_class;?>" id="ninja_forms_field_<?php echo $field_id;?>_div_wrap" rel="<?php echo $field_id;?>">
<?php

}

// Div End element
function ninja_forms_register_field_div_end(){
    $args = array(
        'name' => __( 'Div End', 'ninja-forms' ),
        'sidebar' => 'layout_fields',
        'edit_function' => '',
        'display_function' => 'ninja_forms_field_div_end',
        'group' => 'standard_fields',
        'display_label' => false,
        'display_wrap' => false,
        'edit_label' => false,
        'edit_label_pos' => false,
        'edit_req' => false,
        'edit_custom_class' => false,
        'edit_help' => false,
        'edit_meta' => false,
        'edit_conditional' => true,
        'process_field' => false,
    );

    ninja_forms_register_field('_div_end', $args);
}

add_action('init', 'ninja_forms_register_field_div_end');

function ninja_forms_field_div_end($field_id, $data){
    ?>
    </div>
<?php

}
?>