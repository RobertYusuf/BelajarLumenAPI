<?php

namespace App\Http\Controllers\V1;

use App\Http\Controllers\Controller;
use App\Repositories\User\IUserRepository;
use Illuminate\Http\Request;

class UserController extends Controller
{
    protected $userRepo;

    public function __construct(IUserRepository $userRepo)
    {
        $this->userRepo = $userRepo;
        $this->middleware('auth', ['except' => ['register']]);
    }

    public function register(Request $request)
    {
        $user = $this->userRepo->addUser($request);

        return response()->json([
            "data" => $user
        ]);
    }

    public function update($id, Request $request)
    {
        $user =  $this->userRepo->updateUser($id, $request);

        return response()->json([
            "data" => $user
        ]);
    }

    public function delete($id)
    {
        $user = $this->userRepo->deleteUser($id);

        return response()->json([
            "data" => $user
        ]);
    }
}
