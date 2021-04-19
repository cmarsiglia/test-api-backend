<?php
declare(strict_types=1);

namespace Src\Repositories;

use App\Models\Favorite as eloquentFavoriteModel;
use Src\Contracts\FavoriteRepositoryContract;

final class EloquentFavoriteRepository implements FavoriteRepositoryContract
{
    private $eloquentFavoriteModel;

    public function __construct()
    {
        $this->eloquentFavoriteModel = new eloquentFavoriteModel;
    }

    public function create(array $favorite)
    {
        return $this->eloquentFavoriteModel->create([
            'user_id'   => $favorite['user_id'],
            'ref_api'   => $favorite['ref_api']
        ]);
    }

    public function find(array $favoriteUserId)
    {
        return $this->eloquentFavoriteModel->where('user_id', $favoriteUserId)
        ->get();
    }

    public function delete(int $favoriteId)
    {
        return $this->eloquentFavoriteModel->where('id', $favoriteId)
            ->destroy();
    }
    
}

