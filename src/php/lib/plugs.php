<?php
// RADIO BUTTONS FOR TAXONOMIES
// Disable the "No term" option on a the "resource_type" taxonomy
add_filter( "radio-buttons-for-taxonomies-no-term-resource_type", "__return_FALSE" );
