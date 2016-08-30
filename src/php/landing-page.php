<?php
/**
 * Template Name: Landing Page
 * Description: Page template for landing page
 */

$context = Timber::get_context();
$post = new TimberPost();
$context['post'] = $post;
$context['acf'] = get_fields();
$context['sections'] = $context['acf']['sections'];
$context['children'] = array();

foreach ($post->get_children() as $child) {
  $grandchildren = array();
  if ( $context['acf']['type'] ) {
    //Extensive. Fetch all children and grand children
    foreach ($child->get_children() as $grandchild) {
      array_push($grandchildren, array(
        'title' => $child->title(),
        'link' => $child->link()
      ));
    }
  }

  $image = $child->get_field('image');
  array_push($context['children'], array(
    'title' => $child->title(),
    'link' => $child->link(),
    'teaser' => $child->get_field('teaser'),
    'image' => reset($image)['url_n'],
    'children' => $grandchildren
  ));
}

Timber::render( 'page/landing-page-base.twig' , $context );
