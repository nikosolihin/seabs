<?php
/**
 * The template for displaying a single event
 */
$context = Timber::get_context();
$post = new TimberPost();
$context['post'] = $post;
$context['acf'] = get_fields();

var_dump($context['acf']);

// Timber::render( 'event/single-event.twig' , $context );
