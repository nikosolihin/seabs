(function($) {
	// Multisite dropdown
	// Indonesian
	$("#wp-admin-bar-blog-1-n").hide();
	$("#wp-admin-bar-blog-1-c").hide();

	// English
	$("#wp-admin-bar-blog-2-n").hide();
	$("#wp-admin-bar-blog-2-c").hide();

	// Chinese
	$("#wp-admin-bar-blog-3-n").hide();
	$("#wp-admin-bar-blog-3-c").hide();

	// New Plus dropdown
	$("#wp-admin-bar-new-post a").text("File");
	$("#wp-admin-bar-new-post a").attr("href", "https://drive.google.com/");
	$("#wp-admin-bar-new-post a").attr("target", "_blank");

	$("#wp-admin-bar-new-media a").text("Image");
	$("#wp-admin-bar-new-media a").attr("href", "https://www.flickr.com/photos/upload/");
	$("#wp-admin-bar-new-media a").attr("target", "_blank");

	$("#wp-admin-bar-new-user a").text("Form");
	$("#wp-admin-bar-new-user a").attr("href", "https://docs.google.com/forms");
	$("#wp-admin-bar-new-user a").attr("target", "_blank");
})(jQuery);
