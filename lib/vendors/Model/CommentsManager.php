<?php
namespace Model;
 
use \BlogFram\Manager;
use \Entity\Comment;
 
abstract class CommentsManager extends Manager
{
  /**
   * Méthode permettant d'ajouter un commentaire.
   * @param $comment Le commentaire à ajouter
   * @return void
   */
  abstract protected function add(Comment $comment);
 
  /**
   * Méthode permettant de supprimer un commentaire.
   * @param $id L'identifiant du commentaire à supprimer
   * @return void
   */
  abstract public function delete($id);
 
  /**
   * Méthode permettant de supprimer tous les commentaires liés à une chapters
   * @param $chapters L'identifiant de la chapters dont les commentaires doivent être supprimés
   * @return void
   */
  abstract public function deleteFromChapters($chapters);
 
  /**
   * Méthode permettant d'enregistrer un commentaire.
   * @param $comment Le commentaire à enregistrer
   * @return void
   */
  public function save(Comment $comment)
  {
    if ($comment->isValid())
    {
      $this->add($comment);
    }
    else
    {
      throw new \RuntimeException('Le commentaire doit être validé pour être enregistré');
    }
  }
 
  /**
   * Méthode permettant de récupérer une liste de commentaires.
   * @param $chapters Le chapters sur lequel on veut récupérer les commentaires
   * @return array
   */
  abstract public function getListOf($chapters);

  /**
   * Méthode permettant de récupérer la liste des commentaires signalés.
   * @param void
   * @return array
   */
  abstract public function getListOfReported();
 
  /**
   * Méthode permettant de report un commentaire spécifique.
   * @param $id L'identifiant du commentaire
   * @return void
   */
  abstract public function report($id);

  /**
   * Méthode permettant d'obtenir un commentaire spécifique.
   * @param $id L'identifiant du commentaire
   * @return Comment
   */
  abstract public function get($id);
}