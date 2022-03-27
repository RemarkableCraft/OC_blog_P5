<?php
namespace routeur;

use core\Superglobals;
use controller\{Controller};
use controller\front\{HomeController, SignController, BlogController, ContactController};

/**
 * 
 */
class Route extends Superglobals
{
	public function router()
	{
		$get = $this->get_GET();

		if (isset($get['action'])) {
			switch ($get['action']) {
				case 'home':
					$home = new HomeController;
					$home->get_home();
					break;

				case 'sign':
					$sign = new SignController;
					$sign->get_sign();
					break;

				case 'blog':
					$blog = new BlogController;
					$blog->get_blog();
					break;

				case 'post':
					$post = new BlogController;
					$post->get_post();
					break;

				case 'contact':
					$contact = new ContactController;
					$contact->contact();
					break;
				
				default:
					http_response_code(404);
					break;
			}
		} else {
			$home = new HomeController;
			$home->get_home();
		}
	}
}
