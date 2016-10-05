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
  $context['categories'][$category->id] = array(
    'name' => $category->name,
    'slug' => $category->slug,
    'color' => $category->category_color
  );
}
$context['categories_json'] = json_encode($context['categories']);

// Get sidebar contents
$context['sidebar_sections'] = get_field('event_sidebar_sections', 'option');

// Get featured events
$context['featured_events'] = array();
$featured_events = get_field('event_featured', 'option');
foreach (Timber::get_posts($featured_events) as $event) {
  $gcal = $event->get_field('gcal');
  array_push($context['featured_events'], array(
    'id'          => $gcal['id'],
    'title'       => $event->title,
    'category'    => $event->get_terms('event_category')[0]->name,
    'date'        => $event->date,
    'link'        => $event->link,
    'location'    => $gcal['location'],
    'description' => $gcal['description'],
    'image'       => $event->get_field('image'),
  ));
}

Timber::render( 'event/archive-event.twig' , $context );
