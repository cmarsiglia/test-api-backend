<?php

namespace App\Http\Controllers;

use App\Models\User;

use Illuminate\Http\Request;
use Src\Repositories\EloquentUserRepository;


class UserUpdateController extends Controller
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
        //
        return $this->repository->update($request->all());
    }
}
