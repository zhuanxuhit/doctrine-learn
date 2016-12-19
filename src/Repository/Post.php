<?php namespace Repository;

use Mapper\Post as PostMapper;
use Entity\Post as PostEntity;
use Entity\User as UserEntity;

class Post {

    private $em;
    private $mapper;

    public function __construct( \EntityManager $em )
    {
        $this->mapper = new PostMapper;
        $this->em     = $em;
    }

    public function findByUser( UserEntity $user )
    {
        $postsData = $this->em
            ->query( 'SELECT * FROM posts WHERE user_id = ' . $user->getId() )->fetchAll();
        $posts     = [];
        foreach ( $postsData as $postData ) {
            $newPost = new PostEntity();
            $posts[] = $this->mapper->populate( $postData, $newPost );
        }
        return $posts;
    }
}