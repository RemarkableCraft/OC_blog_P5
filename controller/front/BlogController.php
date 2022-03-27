<?php
namespace controller\front;

use controller\controller;

/**
 * Traitement de la page blog.php & post-view.php
 */
class BlogController extends Controller
{
	
	/**
	 * Affiche la page blog.php
	 */
	public function get_blog()
	{
		require 'view/front/blog.php';
	}

	/**
	 * Affiche la page post.php
	 */
	public function get_post()
	{
		require 'view/front/post-view.php';
	}
}