<?php

class UserRepositoryTest extends \PHPUnit_Framework_TestCase {

    public function testPopulate()
    {
        $em = new \EntityManager('127.0.0.1','app',33060,'root','root');
        $repository = new Repository\User($em);
        $user = $repository->findOneById(1);
        $this->assertEquals( "Mr. Prof. Dr. Max Mustermann", $user->assembleDisplayName() );
    }
}
