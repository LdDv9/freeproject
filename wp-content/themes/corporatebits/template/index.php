<?php
/**
 * Template Name: index
 */
use App\Http\Controllers\IndexController;
$controller = IndexController::init();
var_dump($controller);
print ($controller->index());