<?php
/**
 * Custom functions that act independently of the theme templates.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package corporatebits
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function corporatebits_body_classes( $classes ) {
	// Adds a class of group-blog to blogs with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	return $classes;
}
add_filter( 'body_class', 'corporatebits_body_classes' );

/**
 * Custom excerpt more
 */
function corporatebits_custom_excerpt_more( $link ) {
	if ( is_admin() ) {
		return $link;
	}
	return ' &hellip; ';
}
add_filter( 'excerpt_more', 'corporatebits_custom_excerpt_more' );

/**
 * Add a pingback url auto-discovery header for singularly identifiable articles.
 */
function corporatebits_pingback_header() {
	if ( is_singular() && pings_open() ) {
		echo '<link rel="pingback" href="', bloginfo( 'pingback_url' ), '">';
	}
}
add_action( 'wp_head', 'corporatebits_pingback_header' );

function corporatebits_light_get_image_src( $image_id, $size = 'full' ) {
	$img_attr = wp_get_attachment_image_src( intval( $image_id ), $size );
	if ( ! empty( $img_attr[0] ) ) {
		return $img_attr[0];
	}
}


add_action( 'admin_menu', 'corporatebits_tp' );
function corporatebits_tp() {
	add_theme_page( __('Corporatebits Theme', 'corporatebits'), __('Corporatebits Theme', 'corporatebits'), 'edit_theme_options', 'corporatebits-themepage.php', 'coporatebits_theme_page_css');
}

function coporatebits_theme_page_css(){ ?>
<div class="develobots-tp">
	<div class="develobots-tp-leftside">
		<h2>Contact Support</h2>

		<div class="tp-info-box">
			<h3>Develobots Contact</h3>
			<p><strong>Please be ware that we cannot assist with plugin issues, only theme related issues.</strong> <br>If you are having issues setting the theme up, or if you have questions please contact us by clicking the button below</p>
			<a class="tp-button" target="_blank" href="http://develobots.com/contact/">Contact Develobots</a>
		</div>

		<h2>Useful Plugins</h2>
		<div class="tp-info-box">
			<h3>Yoast SEO</h3>
			<p>Write better content and have a fully optimized WordPress site using the Yoast SEO plugin.</p>
			<a class="tp-button" target="_blank" href="https://wordpress.org/plugins/wordpress-seo/">Download Plugin</a>
		</div>

		<div class="tp-info-box">
			<h3>WP Super Cache</h3>
			<p>A very fast caching engine for WordPress that produces static html files.</p>
			<a class="tp-button" target="_blank" href="https://wordpress.org/plugins/wp-super-cache/">Download Plugin</a>
		</div>

		<div class="tp-info-box">
			<h3>Google Analaytics for WP</h3>
			<p>The best Google Analytics plugin for WordPress. See how visitors find and use your website.</p>
			<a class="tp-button" target="_blank" href="https://wordpress.org/plugins/google-analytics-for-wordpress/">Download Plugin</a>
		</div>
	</div>
	<div class="develobots-tp-rightside">
		<h2>Corporatebits Premium</h2>
		<a href="http://develobots.com/corporatebits" target="_blank">
		<img src="http://develobots.com/wp-content/uploads/2017/10/corporatebits-tp.png">
		</a>
	</div>
</div>
<?php }
