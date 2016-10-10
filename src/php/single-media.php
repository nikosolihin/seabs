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

// If type is gallery, audio or video, grab og:image
if ($context['media_type'] == 'video') {
	preg_match('/src="([^"]+)"/', $context['acf']['video'], $match);
	$url = $match[1];
	if (preg_match('/youtube\.com\/watch\?v=([^\&\?\/]+)/', $url, $id)) {
  	$context['youtube_id'] = $id[1];
	} else if (preg_match('/youtube\.com\/embed\/([^\&\?\/]+)/', $url, $id)) {
	  $context['youtube_id'] = $id[1];
	} else if (preg_match('/youtube\.com\/v\/([^\&\?\/]+)/', $url, $id)) {
	  $context['youtube_id'] = $id[1];
	} else if (preg_match('/youtu\.be\/([^\&\?\/]+)/', $url, $id)) {
	  $context['youtube_id'] = $id[1];
	}
	else if (preg_match('/youtube\.com\/verify_age\?next_url=\/watch%3Fv%3D([^\&\?\/]+)/', $url, $id)) {
    $context['youtube_id'] = $id[1];
	}
}

// Get page contents
$context['sections'] = $context['acf']['sections'];

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
// Breadcrumb for media
$context['breadcrumb'] = array();
array_push( $context['breadcrumb'], array(
	'title' => ucfirst($post->type->name),
	'link' => $context['site']->url. '/' .$post->type->slug
));
$context['breadcrumb'] = array_reverse( $context['breadcrumb'] );

Timber::render( 'media/single-media.twig' , $context );
