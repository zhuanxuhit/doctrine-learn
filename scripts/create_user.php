<?php
// create_user.php
require_once __DIR__ . '/bootstrap.php';

if ($argc != 4){
    echo "php " . $argv[0] . ' firstName lastName gender' . PHP_EOL;
    return;
}

$firstName = $argv[1];
$lastName  = $argv[2];
$gender = $argv[3];

$newUser = new \App\Entity\User();
$newUser->setFirstName($firstName);
$newUser->setLastName($lastName);
$newUser->setGender($gender);

$em->persist($newUser);
$em->flush();
echo "Created User with ID " . $newUser->getId() . "\n";