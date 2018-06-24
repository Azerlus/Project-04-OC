<?php

namespace App\Backend;

use \BlogFram\Application;

class BackendApplication extends Application
{
	public function __construct()
	{
		parent::__construct();

		$this->name = 'Backend';
	}

	public function run()
	{
		if ($this->user->isAuthenticated())
		{
			$controller = $this->getController();
		}
		else
		{
			$controllerPath = 'src\\controller\\connexionController';
			$controller = new $controllerPath($this, 'Connexion', 'Index');
		}

		$controller->execute();

		$this->httpResponse->setPage($controller->page());
		$this->httpResponse->send();
	}
}