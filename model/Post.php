<?php
class Post
{
  private $id;
  private $author;
  private $title;
  private $content;
  private $creation_date;


  public function __construct($donnees = [])
  {
    if(!empty($donnees)) // si on a specifie des valeurs alors on hydrate l objet
    {
      $this->hydrate($donnees);
    }
  }

  public function hydrate(array $donnees)
  {
    foreach($donnees as $key => $value)
    {
      $method = 'set'.ucfirst($key);
      if(method_exists($this, $method))
      {
        $this->$method($value);
      }
    }
  }
  // getters -> retournent les proprietes
  public function getId()
  {
    return $this->id;
  }
  public function getAuthor()
  {
    return $this->author;
  }
  public function getTitle()
  {
    return $this->title;
  }
  public function getContent()
  {
    return $this->content;
  }
  public function getCreation_date()
  {
    return $this->creation_date;
  }
  public function getDonnees()
  {
    return $this->donnees;
  }

  // SETTERS
  public function setId($id)
  {
      $this->id =  $id;
  }
  public function setAuthor($author)
  {
      $this->author = $author;
  }
  public function setTitle($title)
  {
      $this->title = $title;
  }
  public function setContent($content)
  {
      $this->content = $content;
  }
  public function setCreation_date($creation_date)
  {

    $this->creation_date = $creation_date;
  }
  public function setDonnees(array $donnees)
  {
    $this->donnees = $donnees;
  }
}
