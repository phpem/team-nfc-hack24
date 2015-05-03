<?php

namespace Teamnfc\Http\Controllers;

use Illuminate\Contracts\Auth\Authenticatable;
use Teamnfc\Repository\UsersRepository;

/**
 * AccountController
 */
final class AccountController extends Controller
{
    public function index(Authenticatable $user)
    {
        return view('account/index', ['user' => $user]);
    }

    public function teams(Authenticatable $user, UsersRepository $usersRepository) {
        $teams = $usersRepository->getTeamsForUser($user);
        return view('account/teams', ['teams'   =>  $teams]);
    }
}