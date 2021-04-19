<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\UserResource;
use Src\Repositories\EloquentUserRepository;

class UserLoginController extends Controller
{
    private $repository;

    public function __construct()
    {
        $this->repository = new EloquentUserRepository;
    }
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {

        return $this->repository->login($request);
        // $login = new UserResource($request);

        // return response($login, 200);
    }
}
