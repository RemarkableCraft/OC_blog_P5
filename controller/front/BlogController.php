<?php
namespace controller\front;

use controller\controller;
use model\Model;

/**
 * Traitement de la page blog.php & post-view.php
 */
class BlogController extends Controller
{
	
	/**
	 * Affiche la page blog.php
	 */
	public function blog()
	{
		$posts = new Model;
		$posts = $posts->select('*','post','','','createDatePost DESC','');
		require 'view/front/blog.php';
	}

	/**
	 * Affiche la page post.php
	 */
	public function post()
	{
		require 'view/front/post-view.php';
	}
}