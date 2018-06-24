<?php
namespace Model;
 
use \Entity\Comment;
 
class CommentsManagerPDO extends CommentsManager
{
  protected function add(Comment $comment)
  {

    $q = $this->dao->prepare('INSERT INTO comments SET chapters = :chapters, auteur = :auteur, contenu = :contenu, report = :report, dateAjout = NOW()');
 
    $q->bindValue(':chapters', $comment->chapters(), \PDO::PARAM_INT);
    $q->bindValue(':auteur', $comment->auteur());
    $q->bindValue(':contenu', $comment->contenu());
    $q->bindValue(':report', $comment->report());
 
    $q->execute();
  }
 
  public function delete($id)
  {
    $this->dao->exec('DELETE FROM comments WHERE id = '.(int) $id);
  }
 
  public function deleteFromChapters($chapters)
  {
    $this->dao->exec('DELETE FROM comments WHERE chapters = '.(int) $chapters);
  }
 
  public function getListOf($chapters)
  {
    if (!ctype_digit($chapters))
    {
      throw new \InvalidArgumentException('L\'identifiant du chapitre passé doit être un nombre entier valide');
    }
 
    $q = $this->dao->prepare('SELECT id, chapters, auteur, contenu, dateAjout FROM comments WHERE chapters = :chapters');
    $q->bindValue(':chapters', $chapters, \PDO::PARAM_INT);
    $q->execute();
 
    $q->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, '\Entity\Comment');
 
    $comments = $q->fetchAll();
 
    foreach ($comments as $comment)
    {
      $comment->setDateAjout(new \DateTime($comment->dateAjout()));
    }
 
    return $comments;
  }

  public function getListOfReported()
  {
    $q = $this->dao->prepare('SELECT id, chapters, auteur, contenu, dateAjout FROM comments WHERE report = :report');
    $q->bindValue(':report', 1, \PDO::PARAM_INT);
    $q->execute();

    $q->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, '\Entity\Comment');

    $comments = $q->fetchAll();

    foreach ($comments as $comment)
    {
      $comment->setDateAjout(new \DateTime($comment->dateAjout()));
    }

    return $comments;
  }

  public function report($id)
  {
   $q = $this->dao->prepare('UPDATE comments SET report = :report WHERE id = :id');

   $q->bindValue(':report', 1);
   $q->bindValue(':id', $id, \PDO::PARAM_INT);

   $q->execute(); 
  }
 
  public function get($id)
  {
    $q = $this->dao->prepare('SELECT id, chapters, auteur, contenu FROM comments WHERE id = :id');
    $q->bindValue(':id', (int) $id, \PDO::PARAM_INT);
    $q->execute();
 
    $q->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, '\Entity\Comment');
 
    return $q->fetch();
  }
}