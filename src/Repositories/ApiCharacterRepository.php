<?php
declare(strict_types=1);

namespace Src\Repositories;

use Illuminate\Support\Facades\Http;

final class ApiCharacterRepository
{
    
    public function all()
    {
        $response = Http::get('https://rickandmortyapi.com/api/character');
        return $response;
    }

    public function show($id)
    {
        $response = Http::get('https://rickandmortyapi.com/api/character/'.$id);
        return $response;
    }
}