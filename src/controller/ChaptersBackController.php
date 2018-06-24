<?php
namespace src\controller;
 
use \BlogFram\BackController;
use \BlogFram\HTTPRequest;
use \Entity\Chapters;
use \Entity\Comment;
 
class ChaptersBackController extends BackController
{
  protected $defaultAuthor;

  public function executeDelete(HTTPRequest $request)
  {
    $chaptersId = $request->getData('id');
 
    $this->managers->getManagerOf('Chapters')->delete($chaptersId);
    $this->managers->getManagerOf('Comments')->deleteFromChapters($chaptersId);
 
    $this->app->user()->setFlash('Le chapitre a bien été supprimé !');
 
    $this->app->httpResponse()->redirect('.');
  }
 
  public function executeDeleteComment(HTTPRequest $request)
  {
    $this->managers->getManagerOf('Comments')->delete($request->getData('id'));
 
    $this->app->user()->setFlash('Le commentaire a bien été supprimé !');
 
    $this->app->httpResponse()->redirect('.');
  }
 
  public function executeIndex(HTTPRequest $request)
  {
    $this->page->addVar('title', 'Gestion des chapitres');
 
    $manager = $this->managers->getManagerOf('Chapters');
 
    $this->page->addVar('listeChapters', $manager->getList());
    $this->page->addVar('nombreChapters', $manager->count());

    $manager = $this->managers->getManagerOf('Comments');

    $this->page->addVar('listeCommentsReported', $manager->getListOfReported());
  }
 
  public function executeInsert(HTTPRequest $request)
  {
    if ($request->postExists('auteur'))
    {
      $this->processForm($request);
    }
 
    $this->page->addVar('title', 'Ajout d\'un chapitre');
    $this->page->addVar('defaultAuthor', $this->app->config()->get('auteur'));
  }
 
  public function executeUpdate(HTTPRequest $request)
  {
    if ($request->postExists('auteur'))
    {
      $this->processForm($request);
    }
    else
    {
      $this->page->addVar('chapters', $this->managers->getManagerOf('Chapters')->getUnique($request->getData('id')));
    }
 
    $this->page->addVar('title', 'Modification d\'un chapitre');
  }
 
  public function processForm(HTTPRequest $request)
  {
    $chapters = new Chapters([
      'auteur' => $request->postData('auteur'),
      'titre' => $request->postData('titre'),
      'contenu' => $request->postData('contenu')
    ]);
 
    // L'identifiant du chapitre est transmis si on veut la modifier.
    if ($request->postExists('id'))
    {
      $chapters->setId($request->postData('id'));
    }
 
    if ($chapters->isValid())
    {
      $this->managers->getManagerOf('Chapters')->save($chapters);
 
      $this->app->user()->setFlash($chapters->isNew() ? 'Le chapitre a bien été ajouté !' : 'Le chapitre a bien été modifié !');
    }
    else
    {
      $this->page->addVar('erreurs', $chapters->erreurs());
    }
 
    $this->page->addVar('chapters', $chapters);
  }
}