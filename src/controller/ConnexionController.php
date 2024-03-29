<?php
namespace src\controller;
 
use \BlogFram\BackController;
use \BlogFram\HTTPRequest;
 
class ConnexionController extends BackController
{
  public function executeIndex(HTTPRequest $request)
  {
    $this->page->addVar('title', 'Connexion');
 
    if ($request->postExists('login'))
    {
      $login = $request->postData('login');
      $password = $request->postData('password');
 
      if ($login == $this->app->config()->get('login') && $password == $this->app->config()->get('pass'))
      {
        $this->app->user()->setAuthenticated(true);
        $this->app->httpResponse()->redirect('.');
      }
      else
      {
        $this->app->user()->setFlash('Le nom d\'utilisateur ou le mot de passe est incorrect.');
      }
    }
  }
}