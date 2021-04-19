<?php

declare(strict_types=1);

namespace Src\Contracts;

interface FavoriteRepositoryContract
{

    public function create(array $Favorite);

    public function find(int $FavoriteUserId);

    public function delete(int $FavoriteId);
}