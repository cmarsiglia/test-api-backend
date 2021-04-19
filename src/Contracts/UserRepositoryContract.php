<?php

declare(strict_types=1);

namespace Src\Contracts;

interface UserRepositoryContract
{

    public function create(array $User);

    public function update($UserId, array $User);

    public function login($User);
}