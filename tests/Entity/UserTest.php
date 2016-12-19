<?php
use Entity\User;

class UserTest extends PHPUnit_Framework_TestCase {

    public function testAssembleDisplayName()
    {
        $user = new User();
        $user->setFirstName( 'Max' );
        $user->setLastName( 'Mustermann' );
        $user->setGender( 0 );
        $user->setNamePrefix( 'Prof. Dr' );
        $this->assertEquals( "Mr. Prof. Dr Max Mustermann", $user->assembleDisplayName() );
    }

    public function testLoadFromDataBase()
    {
        $db       = new \PDO( 'mysql:host=127.0.0.1;dbname=app;port=33060', 'root', 'root' );
        $userData = $db->query( 'SELECT * FROM users WHERE id = 1' )->fetch();
        $user = new Entity\User();
        $user->setId( $userData['id'] );
        $user->setFirstName( $userData['first_name'] );
        $user->setLastName( $userData['last_name'] );
        $user->setGender( $userData['gender'] );
        $user->setNamePrefix( $userData['name_prefix'] );
        $this->assertEquals( "Mr. Prof. Dr. Max Mustermann", $user->assembleDisplayName() );
    }
}
