<?php namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;

class User {

    private $id;
    private $firstName;
    private $lastName;
    private $gender;
    private $namePrefix = '';
    private $posts;
    //    /** @var  PostRepository */
    //    private $postRepository;
    const GENDER_MALE                 = 0;

    const GENDER_FEMALE               = 1;

    const GENDER_MALE_DISPLAY_VALUE   = "Mr.";

    const GENDER_FEMALE_DISPLAY_VALUE = "Mrs.";

    /**
     * User constructor.
     *
     */
    public function __construct()
    {
        $this->posts = new ArrayCollection();
    }

    /**
     * @return string
     */
    public function assembleDisplayName()
    {
        $displayName = '';
        if ( $this->gender == self::GENDER_MALE ) {
            $displayName .= self::GENDER_MALE_DISPLAY_VALUE;
        } elseif ( $this->gender == self::GENDER_FEMALE ) {
            $displayName .= self::GENDER_FEMALE_DISPLAY_VALUE;
        }
        if ( $this->namePrefix ) {
            $displayName .= ' ' . $this->namePrefix;
        }
        $displayName .= ' ' . $this->firstName . ' ' . $this->lastName;
        return $displayName;
    }

    /**
     * @param $firstName
     */
    public function setFirstName( $firstName )
    {
        $this->firstName = $firstName;
    }

    /**
     * @return mixed
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * @param $gender
     */
    public function setGender( $gender )
    {
        $this->gender = $gender;
    }

    /**
     * @return mixed
     */
    public function getGender()
    {
        return $this->gender;
    }

    /**
     * @param $id
     */
    public function setId( $id )
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param $lastName
     */
    public function setLastName( $lastName )
    {
        $this->lastName = $lastName;
    }

    /**
     * @return mixed
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * @param $namePrefix
     */
    public function setNamePrefix( $namePrefix )
    {
        $this->namePrefix = $namePrefix;
    }

    /**
     * @return mixed
     */
    public function getNamePrefix()
    {
        return $this->namePrefix;
    }


    public function getPosts()
    {
        return $this->posts;
    }


    public function setPosts( $posts )
    {
        $this->posts = $posts;
    }
}

