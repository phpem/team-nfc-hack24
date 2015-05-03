<?php

namespace Teamnfc\Http\Controllers;

use Illuminate\Contracts\Auth\Authenticatable;
use Teamnfc\Repository\TeamRepository;
use Teamnfc\Repository\UsersRepository;

/**
 * AccountController
 */
final class TeamController extends Controller
{
    public function index(TeamRepository $teamRepository, UsersRepository $usersRepository, $teamId)
    {
        $team = $teamRepository->getTeamById($teamId);
        $organisation = $teamRepository->getOrganisationForTeam($team);
        $manager = $teamRepository->getManagerForTeam($team);
        $users = $usersRepository->getUsersForTeam($team);

        return view('team/index',
            [
                'organisation'  =>  $organisation[0],
                'team'          =>  $team,
                'manager'       =>  $manager[0],
                'users'         =>  $users
            ]
        );
    }

    public function teams(Authenticatable $user, UsersRepository $usersRepository) {
        $teams = $usersRepository->getTeamsForUser($user);
        return view('account/teams', ['teams'   =>  $teams]);
    }
}