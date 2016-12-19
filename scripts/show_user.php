<?php

// show_user.php <id>
require_once __DIR__ . '/bootstrap.php';

if ($argc != 2){
    echo "php " . $argv[0] . ' id' . PHP_EOL;
    return;
}

$id = $argv[1];
$userRepository = $em->getRepository(\App\Entity\User::class);

/** @var \App\Entity\User $user */
$user = $userRepository->find($id);

if ($user === null) {
    echo "No user found.\n";
    exit(1);
}

echo sprintf("- %s\n", $user->assembleDisplayName());