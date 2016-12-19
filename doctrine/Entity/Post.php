<?php namespace App\Entity;

class Post {

    private $id;
    private $title;
    private $content;

    private $user;

    public function setContent( $content )
    {
        $this->content = $content;
    }

    public function getContent()
    {
        return $this->content;
    }

    public function setId( $id )
    {
        $this->id = $id;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setTitle( $title )
    {
        $this->title = $title;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function setUser( $user )
    {
        $this->user = $user;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getUser()
    {
        return $this->user;
    }
}