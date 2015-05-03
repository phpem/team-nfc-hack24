<?php

namespace Teamnfc\Http\Controllers;

use Illuminate\Contracts\Auth\Authenticatable;
use Teamnfc\Repository\UsersRepository;

/**
 * AccountController
 */
final class TeamController extends Controller
{
    public function index()
    {
        return view('team/index');
    }

    public function teams(Authenticatable $user, UsersRepository $usersRepository) {
        $teams = $usersRepository->getTeamsForUser($user);
        return view('account/teams', ['teams'   =>  $teams]);
    }
}