<?php
// list_users.php
use Illuminate\Support\Collection;

require_once __DIR__ . '/bootstrap.php';

$userRepository = $em->getRepository(\App\Entity\User::class);
$users = $userRepository->findAll();

$users = new Collection($users);
$users->each(function( \App\Entity\User $user){
    echo sprintf("- %s\n",$user->assembleDisplayName());
});