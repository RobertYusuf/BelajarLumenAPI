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

    public function update(Request $request)
    {
        $user =  $this->userRepo->updateUser($request);

        return response()->json([
            "data" => $user
        ]);
    }

    public function delete()
    {
        $user = $this->userRepo->deleteUser();

        return response()->json([
            "data" => $user
        ]);
    }

    public function getAllUser()
    {
        $user = $this->userRepo->getAllUser();

        return response()->json([
            "data" => $user
        ]);
    }
    public function getUser()
    {
        $token = $this->userRepo->getAuthUser();

        // return $this->respondWithToken($token);
        // $books = $this->repository->getAllBook();

        return response()->json([
            "data" => $token
        ]);
    }

    public function deleteTokenUser()
    {
        $data = $this->userRepo->deleteToken();
        return response()->json([
            "Status" => "Token Has Been Deleted"
        ]);
    }
}
