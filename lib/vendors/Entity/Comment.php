<?php
namespace Entity;
 
use \BlogFram\Entity;
 
class Comment extends Entity
{
  protected $chapter,
            $auteur,
            $contenu,
            $date;
 
  const AUTEUR_INVALIDE = 1;
  const CONTENU_INVALIDE = 2;
 
  public function isValid()
  {
    return !(empty($this->auteur) || empty($this->contenu));
  }
 
  public function setChapter($chapter)
  {
    $this->chapter = (int) $chapter;
  }
 
  public function setAuteur($auteur)
  {
    if (!is_string($auteur) || empty($auteur))
    {
      $this->erreurs[] = self::AUTEUR_INVALIDE;
    }
 
    $this->auteur = $auteur;
  }
 
  public function setContenu($contenu)
  {
    if (!is_string($contenu) || empty($contenu))
    {
      $this->erreurs[] = self::CONTENU_INVALIDE;
    }
 
    $this->contenu = $contenu;
  }
 
  public function setDate(\DateTime $date)
  {
    $this->date = $date;
  }
 
  public function chapter()
  {
    return $this->chapter;
  }
 
  public function auteur()
  {
    return $this->auteur;
  }
 
  public function contenu()
  {
    return $this->contenu;
  }
 
  public function date()
  {
    return $this->date;
  }
}