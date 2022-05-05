<?php
namespace routeur;

use core\Superglobals;
use controller\{Controller};
use controller\front\{HomeController, SignController, BlogController, ContactController, CommentController};
use controller\back\{AdminController};

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
					if (isset($get['id']) && !empty($get['id'])) {
						$post = new BlogController;
						$post->post();
						break;
					} else {
						http_response_code(404);
						break;
					}

				case 'comment':
					$comment = new CommentController;
					$comment->comment();
					break;

				case 'validComment':
					if (isset($get['id']) && !empty($get['id'])) {
						$validComment = new AdminController;
						$validComment->validComment();
						break;
					} else {
						http_response_code(404);
						break;
					}

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

				case 'admin':
					$admin = new AdminController;
					$admin->admin();
					break;

				case 'createPost':
					$createPost = new AdminController;
					$createPost->createPost();
					break;

				case 'addPost':
					$addPost = new AdminController;
					$addPost->addPost();
					break;

				case 'editPost':
					if (isset($get['id']) && !empty($get['id'])) {
						$editPost = new AdminController;
						$editPost->editPost();
						break;
					} else {
						http_response_code(404);
						break;
					}

				case 'updatePost':
					if (isset($get['id']) && !empty($get['id'])) {
						$updatePost = new AdminController;
						$updatePost->updatePost();
						break;
					} else {
						http_response_code(404);
						break;
					}

				case 'deletePost':
					if (isset($get['id']) && !empty($get['id'])) {
						$deletePost = new AdminController;
						$deletePost->deletePost();
						break;
					} else {
						http_response_code(404);
						break;
					}

				case 'viewPost':
					$viewPost = new AdminController;
					$viewPost->viewPost();
					break;

				case 'error404':
					$error404 = new Controller;
					$error404->error404();
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