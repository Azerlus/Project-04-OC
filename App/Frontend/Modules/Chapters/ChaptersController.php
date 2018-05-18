<?php
namespace App\Frontend\Modules\Chapters;
 
use \BlogFram\BackController;
use \BlogFram\HTTPRequest;
use \Entity\Chapters;
use \Entity\Comment;
 
class ChaptersController extends BackController
{
  public function executeIndex(HTTPRequest $request)
  {
    $nombreChapters = $this->app->config()->get('nombre_chapters');
    $nombreCaracteres = $this->app->config()->get('nombre_caracteres');
 
    // On ajoute une définition pour le titre.
    $this->page->addVar('title', 'Liste des '.$nombreChapters.' derniers chapitres');
 
    // On récupère le manager des chapitres.
    $manager = $this->managers->getManagerOf('Chapters');
 
    $listeChapters = $manager->getList(0, $nombreChapters);
 
    foreach ($listeChapters as $chapters)
    {
      if (strlen($chapters->contenu()) > $nombreCaracteres)
      {
        $debut = substr($chapters->contenu(), 0, $nombreCaracteres);
        $debut = substr($debut, 0, strrpos($debut, ' ')) . '...';
 
        $chapters->setContenu($debut);
      }
    }
 
    // On ajoute la variable $listeChapters à la vue.
    $this->page->addVar('listeChapters', $listeChapters);
  }
 
  public function executeShow(HTTPRequest $request)
  {
    $chapters = $this->managers->getManagerOf('Chapters')->getUnique($request->getData('id'));
    $test = $request->getData('id');
 
    if (empty($chapters))
    {
      $this->app->httpResponse()->redirect404();
    }
    
    $this->page->addVar('test', $test);
    $this->page->addVar('title', $chapters->titre());
    $this->page->addVar('chapters', $chapters);
    $this->page->addVar('comments', $this->managers->getManagerOf('Comments')->getListOf($chapters->id()));
  }
 
  public function executeInsertComment(HTTPRequest $request)
  {
    $this->page->addVar('title', 'Ajout d\'un commentaire');
    if ($request->postExists('pseudo'))
    {
      $comment = new Comment([
        'chapters' => $request->getData('id'),
        'auteur' => $request->postData('pseudo'),
        'contenu' => $request->postData('contenu'),
        'report' => 0
      ]);
 
      if ($comment->isValid())
      {
        $this->managers->getManagerOf('Comments')->save($comment);
 
        $this->app->user()->setFlash('Le commentaire a bien été ajouté, merci !');
 
        $this->app->httpResponse()->redirect('chapters-'.$request->getData('id').'.html');
      }
      else
      {
        $this->page->addVar('erreurs', $comment->erreurs());
      }
    }
  }
}