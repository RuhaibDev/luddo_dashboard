<?php

namespace App\Repositories\UserRepository;

interface UserRepositoryInterface
{
    public function createUser(Array $data);
    public function userLogin(string $email);

}
