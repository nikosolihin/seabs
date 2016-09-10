<?php
/**
 * The template for displaying a single event
 */
$context = Timber::get_context();
$post = new TimberPost();
$context['post'] = $post;
$context['ppp'] = get_field('event_listing_ppp', 'option');
$context['label'] = get_field('event_link_label', 'option');

// Get all categories to be passed to event.js
$context['categories'] = array();
foreach (Timber::get_terms('event_category') as $category) {
  $context['categories'][$category->id] = $category->name;
}
$context['categories_json'] = json_encode($context['categories']);

// Get sidebar contents
$context['sidebar_sections'] = get_field('event_sidebar_sections', 'option');

Timber::render( 'event/archive-event.twig' , $context );
