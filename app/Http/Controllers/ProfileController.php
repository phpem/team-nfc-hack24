<?php

namespace Teamnfc\Http\Controllers;

use Illuminate\Contracts\Auth\Authenticatable;
use Teamnfc\Repository\UsersRepository;
use Teamnfc\Services\Data;

/**
 * AccountController
 */
final class ProfileController extends Controller
{

    /**
     * @var Data
     */
    private $dataService;

    public function __construct(Data $dataService) {
        $this->dataService = $dataService;
    }
    public function index(UsersRepository $userRepository, $userId)
    {
        $user = $userRepository->getUserById($userId);
        $teams = $userRepository->getTeamsForUser($user);
        $data['overall'] = $this->dataService->getOverall($userId);

        $numberOfTeams = 0;
        $overallPercentage = 0;

        foreach($data['overall'] as $teamId => $information) {
            $overallPercentage += $information['percentage'];
            $numberOfTeams++;
        }

        $data['overall']['percentage'] = $overallPercentage / $numberOfTeams;

        $data['positive'] = $this->dataService->getPositive($userId);

        $numberOfTeams = 0;
        $positivePercentage = 0;

        foreach($data['positive'] as $teamId => $information) {
            $positivePercentage += $information['percentage'];
            $numberOfTeams++;
        }

        $data['positive']['percentage'] = $positivePercentage / $numberOfTeams;

        $data['negative'] = $this->dataService->getNegative($userId);


        $numberOfTeams = 0;
        $negativePercentage = 0;

        foreach($data['negative'] as $teamId => $information) {
            $negativePercentage += $information['percentage'];
            $numberOfTeams++;
        }

        $data['negative']['percentage'] = $negativePercentage / $numberOfTeams;

        //$data['all']    =   $this->dataService->
        return view('profile/index',
            [
                'user'      =>      $user,
                'teams'     =>      $teams,
                'data'      =>      $data
            ]
        );
    }
}