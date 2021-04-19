<?php
declare(strict_types=1);

namespace Src\Repositories;

use App\Models\User as eloquentUserModel;
use Src\Contracts\UserRepositoryContract;

use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

final class EloquentUserRepository implements UserRepositoryContract
{
    private $eloquentUserModel;

    public function __construct()
    {
        $this->eloquentUserModel = new eloquentUserModel;
    }

    public function create(array $user)
    {
        return $this->eloquentUserModel->create([
            'name'      => $user['name'],
            'email'     => $user['email'],
            'password'  => bcrypt($user['password'])
        ]);
    }

    public function update($userId, array $user)
    {
        return $this->eloquentUserModel->where('id', $userId)
            ->update([
                'name'      => $user['name'],
                'password'  => bcrypt($user['password']),
                'address'   => $user['address'],
                'birthdate' => $user['birthdate'],
                'city'      => $user['city'] 
            ]);
    }

    public function login($data)
    {
        $data->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $user = $this->eloquentUserModel->where('email', $data->email)->first();

        // $user->tokens()->delete();

        if (!$user || !Hash::check($data->password, $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['The provided credentials are incorrect.'],
            ]);
        }

        $token = $user->createToken('web_token')->plainTextToken;

        return [
            'user'=> $user,
            'token'=> $token
        ];
    }
    
}

