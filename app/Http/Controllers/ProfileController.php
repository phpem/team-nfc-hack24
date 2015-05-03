<?php

namespace Teamnfc\Http\Controllers;

use Illuminate\Contracts\Auth\Authenticatable;
use Teamnfc\Repository\UsersRepository;

/**
 * AccountController
 */
final class ProfileController extends Controller
{
    public function index(UsersRepository $userRepository, $userId)
    {
        $user = $userRepository->getUserById($userId);
        $teams = $userRepository->getTeamsForUser($user);
        return view('profile/index',
            [
                'user'    =>    $user,
                'teams'   =>    $teams
            ]
        );
    }
}