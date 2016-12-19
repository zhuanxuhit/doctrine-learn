<?php
// create_post.php <user_id>
require_once __DIR__ . '/bootstrap.php';

if ($argc != 2){
    echo "php " . $argv[0] . ' <user_id>' . PHP_EOL;
    return;
}

$user_id = $argv[1];
$userRepository = $em->getRepository(\App\Entity\User::class);

/** @var \App\Entity\User $user */
$user = $userRepository->find($user_id);

if ($user === null) {
    echo "No user found.\n";
    exit(1);
}

$post = new \App\Entity\Post();
$post->setContent("some thing good");
$post->setTitle("good post");
$post->setUser($user);

$em->persist($post);
$em->flush();

echo "Your new Post Id: ".$post->getId()."\n";