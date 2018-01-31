<?php
/**
 * Template Name: index
 */
use App\Http\Controllers\IndexController;
$controller = IndexController::init();
print ($controller->index());