<?php
namespace Model;
 
use \BlogFram\Manager;
use \Entity\Chapters;
 
abstract class ChaptersManager extends Manager
{
  /**
   * Méthode permettant d'ajouter un chapitre.
   * @param $chapters Chapters Le chapitre à ajouter
   * @return void
   */
  abstract protected function add(Chapters $chapters);
 
  /**
   * Méthode permettant d'enregistrer une chapters.
   * @param $chapters Chapters le chapitre à enregistrer
   * @see self::add()
   * @see self::modify()
   * @return void
   */
  public function save(Chapters $chapters)
  {
    if ($chapters->isValid())
    {
      $chapters->isNew() ? $this->add($chapters) : $this->modify($chapters);
    }
    else
    {
      throw new \RuntimeException('Le chapitre doit être validée pour être enregistrée');
    }
  }
 
  /**
   * Méthode renvoyant le nombre de chapitres total.
   * @return int
   */
  abstract public function count();
 
  /**
   * Méthode permettant de supprimer une chapters.
   * @param $id int L'identifiant du chapitre à supprimer
   * @return void
   */
  abstract public function delete($id);
 
  /**
   * Méthode retournant une liste de chapitres demandée.
   * @param $debut int Le premier chapitre à sélectionner
   * @param $limite int Le nombre de chapitres à sélectionner
   * @return array La liste des chapitres. Chaque entrée est une instance de chapters.
   */
  abstract public function getList($debut = -1, $limite = -1);
 
  /**
   * Méthode retournant une chapters précise.
   * @param $id int L'identifiant de la chapters à récupérer
   * @return Chapters Le chapitre demandée
   */
  abstract public function getUnique($id);
 
  /**
   * Méthode permettant de modifier un chapitre.
   * @param $chapters Chapters le chapitre à modifier
   * @return void
   */
  abstract protected function modify(Chapters $chapters);
}