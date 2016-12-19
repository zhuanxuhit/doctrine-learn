<?php

class UserMapperTest extends \PHPUnit_Framework_TestCase {

    public function testPopulate()
    {

        $db       = new \PDO( 'mysql:host=127.0.0.1;dbname=app;port=33060', 'root', 'root' );
        $userData = $db->query( 'SELECT * FROM users WHERE id = 1' )->fetch();
        $user       = new Entity\User();
        $userMapper = new Mapper\User();
        $user       = $userMapper->populate( $userData, $user );
        $this->assertEquals( "Mr. Prof. Dr. Max Mustermann", $user->assembleDisplayName() );
    }
}
