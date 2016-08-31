<?php
if ( ! class_exists( 'Timber' ) ) {
	add_action( 'admin_notices', function() {
			echo '<div class="error"><p>Timber not activated. Make sure you activate the plugin in <a href="' . esc_url( admin_url( 'plugins.php#timber' ) ) . '">' . esc_url( admin_url( 'plugins.php' ) ) . '</a></p></div>';
		} );
	return;
}

Timber::$dirname = array('templates', 'views');

class StarterSite extends TimberSite {

	function __construct() {
		add_filter( 'timber_context', array( $this, 'add_to_context' ) );
		add_filter( 'get_twig', array( $this, 'add_to_twig' ) );
		parent::__construct();
	}

	function add_to_context( $context ) {
		//=============================================
		// Globals
		//=============================================
		// Breakpoints - taken from variables.scss
	  $context['sm'] = '544px';
	  $context['md'] = '768px';
	  $context['lg'] = '992px';
	  $context['xl'] = '1200px';
	  $context['xxl'] = '1400px';

		// Height Breakpoints
		$context['short'] = '601px';
	  $context['tall'] = '700px';

		// Flicker Sizes
		$context['square'] = 'url_sq';	// 75
		$context['square2x'] = 'url_q';	// 150
		$context['thumb'] = 'url_t';		// 100
		$context['small'] = 'url_n';		// 320
		$context['medium'] = 'url_z';		// 640
		$context['large'] = 'url_c';		// 800
		$context['xlarge'] = 'url_l';		// 1024
		$context['xxlarge'] = 'url_h';	// 1600
		$context['original'] = 'url_o';	// Original

		//=============================================
		// Layout Modules
		//=============================================
		// Menu Items
		$primary_menu = get_field('primary_menu', 'option');
		$secondary_menu = get_field('secondary_menu', 'option');
		if ($primary_menu) {
			$context['primary_menu'] = array();
			foreach ($primary_menu as $item) {
				$post = Timber::get_post($item);
				array_push($context['primary_menu'], array(
					'title' => $post->title,
					'url' => $post->link
				));
			}
		}
		if ($secondary_menu) {
			$context['secondary_menu'] = array();
			foreach ($secondary_menu as $item) {
				$post = Timber::get_post($item);
				array_push($context['secondary_menu'], array(
					'title' => $post->title,
					'url' => $post->link
				));
			}
		}

		// // Social Links
		// $context['social'] = array(
		// 	'facebook' => get_field('facebook', 'option'),
		// 	'twitter' => get_field('twitter', 'option'),
		// 	'youtube' => get_field('youtube', 'option'),
		// 	'instagram' => get_field('instagram', 'option')
		// );

		// 404 stuff
		$context['error'] = array(
			'title' => get_field('error_title', 'option'),
			'description' => get_field('error_description', 'option')
		);

		// Org Info
		$context['org'] = array(
			'name' => get_field('org_name', 'option'),
			'address' => get_field('org_address', 'option'),
			'description' => get_field('org_description', 'option'),
			'contacts' => get_field('org_contacts', 'option')
		);

		// // Languages
		// $context['languages'] = get_field('languages', 'option');
		//
		// // Newsletter Sign-up
		// $context['newsletter'] = get_field('newsletter', 'option');
		//
		// // Donate Page
		// $context['donation'] = get_field('donation', 'option');
		//
		// // Policy Page
		// $context['policy'] = get_field('policy', 'option');

		// Footer items
		$context['footer_bg'] = get_field('footer_bg', 'option');
		$footer_items = Timber::get_posts(get_field('footer', 'option'));
		$context['footer']['singles'] = array();
		$context['footer']['parents'] = array();
		foreach ($footer_items as $item) {
			if ( empty($item->get_children()) ) {
				array_push($context['footer']['singles'], array(
		      'id' => $item->id,
		      'title' => $item->title,
		      'link' => $item->link
		    ));
			} else {
				$children = array();
				foreach ($item->get_children() as $child) {
					array_push($children, array(
						'id' => $child->id,
			      'title' => $child->title,
			      'link' => $child->link
					));
				}
				array_push($context['footer']['parents'], array(
					'id' => $item->id,
					'title' => $item->title,
					'link' => $item->link,
					'children' => $children
				));
			}
		}

		// Site Announcement
		if ( get_field('announcement_status', 'option') == 'on' ) {
			$link_type = get_field('announcement_link_type', 'option');
			if ($link_type == "single") {
				$url = get_field('announcement_link_single_url', 'option');
			} elseif ($link_type == "external") {
				$url = get_field('announcement_link_external_url', 'option');
			} else {
				$url = get_field('announcement_link_search_url', 'option');
			}
			$context['announcement'] = array(
				'dte' => get_field('announcement_dte', 'option'),
				'position' => get_field('announcement_position', 'option'),
				'message' => get_field('announcement_message', 'option'),
				'button' => get_field('announcement_button', 'option'),
				'link_type' => $link_type,
				'url' => $url,
			);
		}

		// Site default
		$context['site'] = $this;
		return $context;
	}

	function add_to_twig( $twig ) {
		/* this is where you can add your own fuctions to twig */
		$twig->addExtension( new Twig_Extension_StringLoader() );

		//=============================================
		// GRAVITY FORMS
		//=============================================
		// http://cmsmess.com/timber-gravity-forms-dynamic-population-fields/
		$gravityfunction = new Twig_SimpleFunction('displayform', function ($id) {
			// https://www.gravityhelp.com/documentation/article/gravity_form_enqueue_scripts/
	    gravity_form_enqueue_scripts($id, true);

			// https://www.gravityhelp.com/documentation/article/embedding-a-form/#function-call
			$form = gravity_form($id, false, false, false, '', false, 1, false);

			return $form;
		});
		$twig->addFunction($gravityfunction);

		//=============================================
		// LIST COMPONENT
		//=============================================
		$listfunction = new Twig_SimpleFunction('populatelist', function ($options) {
			return populateList($options);
		});
		$twig->addFunction($listfunction);

		//=============================================
		// Generate classes from component options
		//=============================================
		$classfilter = new Twig_SimpleFilter('modifiers', function ($component, $options) {
			$classes = '';
			if ($options) {
				$classes = array();
				foreach (explode(", ", $options) as $option) {
					$classes[] = $component.'--'.$option;
				}
				$classes = implode(" ", $classes);
			}
			return $component." ".$classes;
		});
		$twig->addFilter($classfilter);

		return $twig;
	}
}
new StarterSite();
