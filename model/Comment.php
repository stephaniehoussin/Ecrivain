<?php
// INUTILE POUR LE MOMENT
class Comment
{
  private $id;
  private $postId;
  private $author;
  private $comment;
  private $comment_date;
  private $is_signaled;

  //getters

  public function getId()
  {
    return $this->id;
  }
  public function getPostId()
  {
    return $this->postId;
  }
  public function getAuthor()
  {
    return $this->author;
  }
  public function getComment()
  {
    return $this->comment;
  }
  public function getComment_date()
  {
    return $this->comment_date;
  }
  public function getIs_signaled()
  {
    return $this->is_signaled;
  }
  // setters
  public function setId($id)
  {
    if(is_int($id) AND $id > 0)
    {
      $this->id = $id;
    }
  }
  public function setPostId($postId)
  {
    $this->postId = $postId;
  }
  public function setAuthor($author)
  {
    if(is_string($author) AND !empty($author))
    {
      $this->author = $author;
    }
  }
  public function setComment($comment)
  {
    if(is_string($comment) AND !empty($commentt))
    {
      $this->comment = $comment;
    }
  }
  public function setComment_date($comment_date)
  {
    $this->comment_date = $comment_date;
  }
  public function setIs_signaled()
  {
    $this->is_signaled = $is_signaled;
  }

}


 ?>
