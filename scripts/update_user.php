<?php
// update_user.php <id> <firstName>
require_once __DIR__ . '/bootstrap.php';

if ($argc != 3){
    echo "php " . $argv[0] . ' id firstName' . PHP_EOL;
    return;
}

$id = $argv[1];
$firstName = $argv[2];
$userRepository = $em->getRepository(\App\Entity\User::class);

/** @var \App\Entity\User $user */
$user = $userRepository->find($id);

if ($user === null) {
    echo "No user found.\n";
    exit(1);
}

$user->setFirstName($firstName);
$em->flush();