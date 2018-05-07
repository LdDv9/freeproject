<?php
require './predis/autoload.php';

$predis = new Predis\Client([
    "scheme"=>"tcp",
    "host"=>"127.0.0.1",
    "port"=>6379
]);

$predis->set('mess','hello wold');

$value= $predis->get('mess');

print ($value);

echo !empty($predis->exists('mess')) ? 'yes' : 'nau';
die();
/**
 * Front to the WordPress application. This file doesn't do anything, but loads
 * wp-blog-header.php which does and tells WordPress to load the theme.
 *
 * @package WordPress
 */

/**
 * Tells WordPress to load the WordPress theme and output it.
 *
 * @var bool
 */
define('WP_USE_THEMES', true);

/** Loads the WordPress Environment and Template */
require( dirname( __FILE__ ) . '/wp-blog-header.php' );
