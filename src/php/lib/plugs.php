<?php
// RADIO BUTTONS FOR TAXONOMIES
// Disable the "No term" option on a the "resource_type" taxonomy
add_filter( "radio-buttons-for-taxonomies-no-term-event_category", "__return_FALSE" );
