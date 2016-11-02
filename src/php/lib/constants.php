<?php
define( 'FLICKR_BROWSER_API_KEY', '92698b2d022c2ffe5a2bb4635db04220' );
define( 'FLICKR_BROWSER_USER_ID', '143886964@N03' );

// Google Calendar API Key
define( 'CALENDAR_API_KEY', 'AIzaSyC-mZU83ude9XK3msUju-9_LUFbglFQ7pk' );

// Define different calendar IDs depending on locale
switch (get_locale()) {
  case "id_ID":
    define( 'CALENDAR_ID', 'seabs.saat@gmail.com' );
    break;
  case "en_US":
    define( 'CALENDAR_ID', '1tfte4rk19tcu5kbvnecn9rjkc@group.calendar.google.com' );
    break;
  case "zh_CN":
    define( 'CALENDAR_ID', 'al85q8s0n6of7m1s2177eebsbk@group.calendar.google.com' );
    break;
  default:
    define( 'CALENDAR_ID', 'seabs.saat@gmail.com' );
}
