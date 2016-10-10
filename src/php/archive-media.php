<?php
/**
 * The template for media archive
 */
$context = Timber::get_context();
$post = new TimberPost();
$context['post'] = $post;
$context['ppp'] = get_field('media_listing_ppp', 'option');
$context['label'] = get_field('media_link_label', 'option');


// Get all media types to be passed to media.js
$context['types'] = array();
foreach (Timber::get_terms('media_type') as $type) {
  $context['types'][$type->id] = array(
    'id'   => $type->id,
    'name' => $type->name,
    'slug' => $type->slug,
    'color' => $type->type_color
  );
}
$context['types_json'] = json_encode($context['types']);

// Get all media categories to be passed to media.js
$context['categories'] = array();
foreach (Timber::get_terms('media_category') as $category) {
  $context['categories'][$category->id] = array(
    'id'   => $category->id,
    'name' => $category->name,
    'slug' => $category->slug
  );
}
$context['categories_json'] = json_encode($context['categories']);

// Get all media categories grouped by slug
$cat_by_slug = array();
foreach (Timber::get_terms('media_category') as $category) {
  $cat_by_slug[$category->slug] = array(
    'id'   => $category->id,
    'name' => $category->name,
    'slug' => $category->slug
  );
}
$context['categories_by_slug_json'] = json_encode($cat_by_slug);

Timber::render( 'media/archive-media.twig' , $context );
