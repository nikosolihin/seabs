<?php
/**
 * The template for displaying a single event
 */
$context = Timber::get_context();
$post = new TimberPost();
$context['post'] = $post;

Timber::render( 'event/archive-event.twig' , $context );
