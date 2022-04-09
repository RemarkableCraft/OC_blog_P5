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
					$home->home();
					break;

				case 'contact':
					$contact = new ContactController;
					$contact->contact();
					break;

				case 'blog':
					$blog = new BlogController;
					$blog->blog();
					break;

				case 'post':
					$post = new BlogController;
					$post->post();
					break;

				case 'sign':
					$sign = new SignController;
					$sign->sign();
					break;

				case 'signUp':
					$signUp = new SignController;
					$signUp->signUp();
					break;

				case 'valid':
					if (isset($get['token']) && isset($get['pseudo'])) {
						$valid = new SignController;
						$valid->valid();
						break;
					} else {
						http_response_code(404);
						break;
					}

				case 'confirm':
					$confirm = new SignController;
					$confirm->confirm();
					break;

				case 'signIn':
					$signIn = new SignController;
					$signIn->signIn();
					break;

				case 'signOut':
					$signOut = new SignController;
					$signOut->signOut();
					break;
					
				default:
					http_response_code(404);
					break;
			}
		} else {
			$home = new HomeController;
			$home->home();
		}
	}
}

