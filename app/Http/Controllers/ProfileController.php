<?php

namespace Teamnfc\Http\Controllers;

use Illuminate\Contracts\Auth\Authenticatable;
use Teamnfc\Repository\Users;

/**
 * AccountController
 */
final class ProfileController extends Controller
{
    public function index(Users $userRepository, $userId)
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