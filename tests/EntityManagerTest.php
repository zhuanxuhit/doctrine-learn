<?php

class EntityManagerTest extends PHPUnit_Framework_TestCase {

    public function testSaveUser()
    {
        $em      = new \EntityManager( '127.0.0.1', 'app', 33060, 'root', 'root' );
        $newUser = new Entity\User();
        $newUser->setFirstName( 'Ute' );
        $newUser->setLastName( 'Musermann' );
        $newUser->setGender( 1 );
        $em->saveUser( $newUser );
        $this->assertEquals("Mrs. Ute Musermann",$newUser->assembleDisplayName());
    }
}
