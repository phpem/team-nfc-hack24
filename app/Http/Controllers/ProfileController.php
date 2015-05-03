<?php

namespace Teamnfc\Http\Controllers;

use Illuminate\Contracts\Auth\Authenticatable;
use Teamnfc\Repository\CriteriaRepository;
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
    public function index(UsersRepository $userRepository, CriteriaRepository $criteriaRepository, $userId)
    {
        // this whole bunch of code sucks. I'm sorry, it was last minute panicking for the profile stats.
        // not even sure it works anyway...
        $user = $userRepository->getUserById($userId);
        $teams = $userRepository->getTeamsForUser($user);
        $data['overall'] = $this->dataService->getOverall($userId);


        $numberOfTeams = 0;
        $overallPercentage = 0;

        foreach($data['overall'] as $teamId => $information) {
            $overallPercentage += $information['percentage'];
            $numberOfTeams++;
        }

        $data['overall']['percentage'] = ($numberOfTeams > 0) ? $overallPercentage / $numberOfTeams : 0;

        $data['positive'] = $this->dataService->getVotesPositive($userId);

        $numberOfTeams = 0;
        $positivePercentage = 0;

        foreach($data['positive'] as $teamId => $information) {
            $positivePercentage += $information['percentage'];
            $numberOfTeams++;
        }

        $data['positive']['percentage'] = ($numberOfTeams > 0) ? $positivePercentage / $numberOfTeams : 0;

        $data['neutral'] = $this->dataService->getVotesNeutral($userId);

        $numberOfTeams = 0;
        $neutralPercentage = 0;

        foreach($data['neutral'] as $teamId => $information) {
            $neutralPercentage += $information['percentage'];
            $numberOfTeams++;
        }

        $data['neutral']['percentage'] = ($numberOfTeams > 0) ? $neutralPercentage / $numberOfTeams : 0;

        $data['negative'] = $this->dataService->getVotesNegative($userId);

        $numberOfTeams = 0;
        $negativePercentage = 0;

        foreach($data['negative'] as $teamId => $information) {
            $negativePercentage += $information['percentage'];
            $numberOfTeams++;
        }

        $data['negative']['percentage'] = ($numberOfTeams > 0) ? $negativePercentage / $numberOfTeams : 0;

        $data['all']    =   $this->dataService->getVotesAll($userId);

        $data['all']['positive'] = 0;
        $data['all']['negative'] = 0;
        $data['all']['neutral'] = 0;

        foreach($data['all'] as $teamId => $information) {
            $data['all']['positive'] += $information['positive'];
            $data['all']['negative'] += $information['negative'];
            $data['all']['neutral'] += $information['neutral'];
        }
        $criteria = $criteriaRepository->getAllCriteria();

        $allcriteriaScores = $this->dataService->getAverageScorePerCriteria($userId);

        $criterionScores = [];

        foreach($allcriteriaScores as $teamId => $teamData) {
            foreach($teamData as $criterion => $score) {
                $criterionScores[$criterion] = $score;
            }
        }


        return view('profile/index',
            [
                'user'              =>      $user,
                'teams'             =>      $teams,
                'data'              =>      $data,
                'criteriaScores'    =>      $criterionScores
            ]
        );
    }
}