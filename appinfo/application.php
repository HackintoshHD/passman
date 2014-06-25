<?php
/**
 * ownCloud - passman
 *
 * This file is licensed under the Affero General Public License version 3 or
 * later. See the COPYING file.
 *
 * @author Sander Brand <brantje@gmail.com>
 * @copyright Sander Brand 2014
 */

namespace OCA\Passman\AppInfo;


use \OCP\AppFramework\App;


use \OCA\Passman\Controller\PageController;
use \OCA\Passman\Controller\FolderController;


class Application extends App {


	public function __construct (array $urlParams=array()) {
		parent::__construct('passman', $urlParams);

		$container = $this->getContainer();

		/**
		 * Controllers
		 */
		$container->registerService('PageController', function($c) {
			return new PageController(
				$c->query('AppName'), 
				$c->query('Request'),
				$c->query('UserId')
			);
		});

		$container->registerService('FolderController', function($c) {
			return new FolderController(
				$c->query('AppName'), 
				$c->query('Request'),
				$c->query('UserId')
			);
		});
		/**
		 * Core
		 */
		$container->registerService('UserId', function($c) {
			return \OCP\User::getUser();
		});		
		
	}


}