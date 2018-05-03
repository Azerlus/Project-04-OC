<?php
namespace Entity;
 
use \BlogFram\Entity;
 
class Chapters extends Entity
{
  protected $auteur,
            $titre,
            $contenu,
            $dateAjout,
            $dateModif;
 
  const INVALID_AUTHOR = 1;
  const INVALID_TITLE = 2;
  const INVALID_CONTENT = 3;
 
  public function isValid()
  {
    return !(empty($this->auteur) || empty($this->titre) || empty($this->contenu));
  }
 
 
  // SETTERS //
 
  public function setAuteur($auteur)
  {
    if (!is_string($auteur) || empty($auteur))
    {
      $this->erreurs[] = self::INVALID_AUTHOR;
    }
 
    $this->auteur = $auteur;
  }
 
  public function setTitre($titre)
  {
    if (!is_string($titre) || empty($titre))
    {
      $this->erreurs[] = self::INVALID_TITLE;
    }
 
    $this->titre = $titre;
  }
 
  public function setContenu($contenu)
  {
    if (!is_string($contenu) || empty($contenu))
    {
      $this->erreurs[] = self::INVALID_CONTENT;
    }
 
    $this->contenu = $contenu;
  }
 
  public function setDateAjout(\DateTime $dateAjout)
  {
    $this->dateAjout = $dateAjout;
  }
 
  public function setDateModif(\DateTime $dateModif)
  {
    $this->dateModif = $dateModif;
  }
 
  // GETTERS //
 
  public function auteur()
  {
    return $this->auteur;
  }
 
  public function titre()
  {
    return $this->titre;
  }
 
  public function contenu()
  {
    return $this->contenu;
  }
 
  public function dateAjout()
  {
    return $this->dateAjout;
  }
 
  public function dateModif()
  {
    return $this->dateModif;
  }
}