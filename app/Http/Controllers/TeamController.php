<?php

namespace Teamnfc\Http\Controllers;

use Illuminate\Contracts\Auth\Authenticatable;
use Teamnfc\Repository\Users;

/**
 * AccountController
 */
final class TeamController extends Controller
{
    public function index()
    {
        return view('team/index');
    }

    public function teams(Authenticatable $user, Users $usersRepository) {
        $teams = $usersRepository->getTeamsForUser($user);
        return view('account/teams', ['teams'   =>  $teams]);
    }
}