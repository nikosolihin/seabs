<?php
//=============================================
// Radio Button for Taxonomies
//=============================================
// Disable the "No term" option on a the "resource_type" taxonomy
add_filter( "radio-buttons-for-taxonomies-no-term-event_category", "__return_FALSE" );
add_filter( "radio-buttons-for-taxonomies-no-term-news_topic", "__return_FALSE" );
add_filter( "radio-buttons-for-taxonomies-no-term-media_type", "__return_FALSE" );
add_filter( "radio-buttons-for-taxonomies-no-term-media_category", "__return_FALSE" );

//==========================================================
// Admin Columns Pro
// Use the following code so column settings
// apply to multisites
//
// Uncoment the action before pushing to prod
// Use the GUI on dev since if using php GUI is disabled
//==========================================================
// add_action( 'init', 'ac_custom_column_settings_5f331eb7' );
function ac_custom_column_settings_5f331eb7() {
	if ( function_exists( 'ac_register_columns' ) ) {
		ac_register_columns( 'page', array(
			array('columns' => array(

			'column-order' => array(
				'column-name' => 'column-order',
				'type' => 'column-order',
				'clone' => '',
				'label' => 'Order',
				'width' => '4',
				'width_unit' => '%',
				'edit' => 'on',
				'sort' => 'on'
			),
			'title' => array(
				'column-name' => 'title',
				'type' => 'title',
				'clone' => '',
				'label' => 'Title',
				'width' => '20',
				'width_unit' => '%',
				'edit' => 'off',
				'sort' => 'on'
			),
			'column-page_template' => array(
						'column-name' => 'column-page_template',
						'type' => 'column-page_template',
						'clone' => '',
						'label' => 'Template',
						'width' => '12',
						'width_unit' => '%',
						'edit' => 'off',
						'filter' => 'off',
						'sort' => 'on'
					),
			'column-acf_field' => array(
						'column-name' => 'column-acf_field',
						'type' => 'column-acf_field',
						'clone' => '',
						'label' => 'Overview',
						'width' => '',
						'width_unit' => '%',
						'field' => 'field_576ce022e631e',
						'excerpt_length' => '15',
						'edit' => 'off',
						'sort' => 'on'
					),
			'date' => array(
						'column-name' => 'date',
						'type' => 'date',
						'clone' => '',
						'label' => 'Date',
						'width' => '10',
						'width_unit' => '%',
						'edit' => 'off',
						'filter' => 'off',
						'sort' => 'on'
					)
				),
			)
		) );
		ac_register_columns( 'block', array(
			array(
				'columns' => array(
					'title' => array(
						'column-name' => 'title',
						'type' => 'title',
						'clone' => '',
						'label' => 'Title',
						'width' => '25',
						'width_unit' => '%',
						'edit' => 'off',
						'sort' => 'on'
					),
			'column-acf_field' => array(
						'column-name' => 'column-acf_field',
						'type' => 'column-acf_field',
						'clone' => '',
						'label' => 'Description',
						'width' => '',
						'width_unit' => '%',
						'field' => 'field_57715bb61788a',
						'excerpt_length' => '15',
						'edit' => 'off',
						'sort' => 'on'
					)
				),
			)
		) );
		ac_register_columns( 'event', array(
			array(
				'columns' => array(
					'title' => array(
						'column-name' => 'title',
						'type' => 'title',
						'clone' => '',
						'label' => 'Title',
						'width' => '20',
						'width_unit' => '%',
						'edit' => 'off',
						'sort' => 'on'
					),
			'taxonomy-event_category' => array(
						'column-name' => 'taxonomy-event_category',
						'type' => 'taxonomy-event_category',
						'clone' => '',
						'label' => 'Category',
						'width' => '10',
						'width_unit' => '%'
					),
			'date' => array(
						'column-name' => 'date',
						'type' => 'date',
						'clone' => '',
						'label' => 'Start Date',
						'width' => '10',
						'width_unit' => '%',
						'edit' => 'off',
						'filter' => 'off',
						'sort' => 'on'
					)
				),
			)
		) );
		ac_register_columns( 'news', array(
			array(
				'columns' => array(
					'title' => array(
						'column-name' => 'title',
						'type' => 'title',
						'clone' => '',
						'label' => 'Title',
						'width' => '20',
						'width_unit' => '%',
						'edit' => 'off',
						'sort' => 'on'
					),
			'taxonomy-news_topic' => array(
						'column-name' => 'taxonomy-news_topic',
						'type' => 'taxonomy-news_topic',
						'clone' => '',
						'label' => 'News Topics',
						'width' => '12',
						'width_unit' => '%'
					),
			'column-acf_field' => array(
						'column-name' => 'column-acf_field',
						'type' => 'column-acf_field',
						'clone' => '',
						'label' => 'Overview',
						'width' => '',
						'width_unit' => '%',
						'field' => 'field_57e383efb2d6e',
						'excerpt_length' => '15',
						'edit' => 'off',
						'sort' => 'on'
					),
			'date' => array(
						'column-name' => 'date',
						'type' => 'date',
						'clone' => '',
						'label' => 'Published On',
						'width' => '10',
						'width_unit' => '%',
						'edit' => 'off',
						'filter' => 'off',
						'sort' => 'on'
					)
				),
			)
		) );
		ac_register_columns( 'person', array(
			array(
				'columns' => array(
					'title' => array(
						'column-name' => 'title',
						'type' => 'title',
						'clone' => '',
						'label' => 'Name',
						'width' => '20',
						'width_unit' => '%',
						'edit' => 'off',
						'sort' => 'on'
					),
			'taxonomy-role' => array(
						'column-name' => 'taxonomy-role',
						'type' => 'taxonomy-role',
						'clone' => '',
						'label' => 'Roles',
						'width' => '10',
						'width_unit' => '%'
					),
			'column-acf_field' => array(
						'column-name' => 'column-acf_field',
						'type' => 'column-acf_field',
						'clone' => '',
						'label' => 'Titles',
						'width' => '',
						'width_unit' => '%',
						'field' => 'field_575faacb00736',
						'excerpt_length' => '15',
						'edit' => 'off',
						'sort' => 'on'
					),
			'column-acf_field-1' => array(
						'column-name' => 'column-acf_field-1',
						'type' => 'column-acf_field',
						'clone' => '1',
						'label' => 'Email',
						'width' => '25',
						'width_unit' => '%',
						'field' => 'field_575faa4800735',
						'edit' => 'off',
						'filter' => 'on',
						'sort' => 'on'
					)
				),
			)
		) );
	}
}
