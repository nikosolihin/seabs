<?php
/**
 * Description: Page template for all media types
 */
$context = Timber::get_context();
$post = new TimberPost();
$context['post'] = $post;
$context['acf'] = get_fields();

// Get media type
$context['media_type'] = $post->get_terms('media_type')[0]->slug;

// Get page contents
if ($context['acf']['sections']) {
	// If the page builder was used
	$context['sections'] = $context['acf']['sections'];
}

// Get Sidebar
$inherit = ($context['acf']['inherit'] === 'true');
$sidebar = $post->get_field('sidebar_sections');
if ($inherit) {
	$order = $context['acf']['order'];
	$parent = $post->get_parent();
	$parents_sidebar = $parent->get_field('sidebar_sections');
	if ($parents_sidebar) {
		if ($sidebar) {
			$context['sidebar_sections'] = $order == 'parent' ? array_merge($parents_sidebar, $sidebar) : array_merge($sidebar, $parents_sidebar);
		} else {
			$context['sidebar_sections'] = $parents_sidebar;
		}
	} else {
		$context['sidebar_sections'] = $sidebar;
	}
} else if ($sidebar) {
	// If the sidebar builder was used
	$context['sidebar_sections'] = $sidebar;
}

// Generate breadcrumb. Must be last.
$context['breadcrumb'] = array();
while( $post->get_parent ) {
	$post = $post->get_parent();
	array_push( $context['breadcrumb'], array(
    'title' => $post->title,
    'link' => $post->link
  ));
}
$context['breadcrumb'] = array_reverse( $context['breadcrumb'] );

Timber::render( 'media/single-media.twig' , $context );
