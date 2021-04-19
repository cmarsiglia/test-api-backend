<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\CharacterResource;
use Src\Repositories\ApiCharacterRepository;

class CharacterAllController extends Controller
{
    private $repository;

    public function __construct(ApiCharacterRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        //
        $response = new CharacterResource($this->repository->all()->json());

        return response($response, 200);
    }
}
