<?php
if ( ( class_exists( 'LearnDash_Shortcodes_Section' ) ) && ( !class_exists( 'LearnDash_Shortcodes_Section_course_content' ) ) ) {
	class LearnDash_Shortcodes_Section_course_content extends LearnDash_Shortcodes_Section {

		function __construct( $fields_args = array() ) {
			$this->fields_args = $fields_args;

			$this->shortcodes_section_key 			= 	'course_content';
			$this->shortcodes_section_title 		= 	sprintf( esc_html_x( '%s Content', 'placeholder: Course', 'learndash' ), LearnDash_Custom_Label::get_label( 'course' ) );
			$this->shortcodes_section_type			=	1;
			$this->shortcodes_section_description	=	sprintf( esc_html_x( 'This shortcode displays the %1$s Content table (%2$s, %3$s, and %4$s) when inserted on a page or post.', 'placeholders: Course, lesson, topics, quizzes', 'learndash' ), LearnDash_Custom_Label::get_label( 'course' ), LearnDash_Custom_Label::label_to_lower( 'lessons' ), LearnDash_Custom_Label::label_to_lower( 'topics' ), LearnDash_Custom_Label::label_to_lower( 'quizzes' ));
			
			parent::__construct(); 
		}
		
		function init_shortcodes_section_fields() {
			$this->shortcodes_option_fields = array(
				'course_id' => array(
					'id'			=>	$this->shortcodes_section_key . '_course_id',
					'name'  		=> 	'course_id', 
					'type'  		=> 	'number',
					'label' 		=> 	sprintf( esc_html_x( '%s ID', 'placeholder: Course', 'learndash' ), LearnDash_Custom_Label::get_label( 'course' ) ),
					'help_text'		=>	sprintf( esc_html_x( 'Enter single %s ID', 'placeholders: Course', 'learndash' ), LearnDash_Custom_Label::get_label( 'course' ) ),
					'value' 		=> 	'',
					'class'			=>	'small-text',
					'required'		=>	'required'
				),
				'num' => array(
					'id'			=>	$this->shortcodes_section_key . '_num',
					'name'  		=> 	'num', 
					'type'  		=> 	'number',
					'label' 		=> 	sprintf( esc_html_x('%s Per Page', 'placeholders: lessons', 'learndash' ), LearnDash_Custom_Label::get_label( 'lessons' ) ),
					'help_text'		=>	sprintf( esc_html_x( '%s per page. Default is is taken from %s. Set to zero for all.', 'placeholders: lessons, course', 'learndash' ), LearnDash_Custom_Label::get_label( 'lessons' ), LearnDash_Custom_Label::label_to_lower( 'course' ) ),
					'value' 		=> 	'',
					'class'			=>	'small-text',
					'attrs'			=>	array(
											'min' => 0,
											'step' => 1
										)
				),
				
			);
		
			if ( ( !isset( $this->fields_args['post_type'] ) ) || ( $this->fields_args['post_type'] != 'sfwd-courses' ) ) {
				$this->shortcodes_option_fields['course_id']['required'] = 'required';	
			} 
		
			$this->shortcodes_option_fields = apply_filters( 'learndash_settings_fields', $this->shortcodes_option_fields, $this->shortcodes_section_key );
			
			parent::init_shortcodes_section_fields();
		}
	}
}
