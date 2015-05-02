<?php

namespace Teamnfc\Http\Controllers;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\View\View;
use Teamnfc\Entity\TeamEntity;
use Teamnfc\Repository\CriteriaRepository;
use Teamnfc\Repository\Users;

/**
 * VoteController
 */
final class VoteController extends Controller {

    /**
     * @var Users
     */
    private $usersRepository;

    /**
     * @var CriteriaRepository
     */
    private $criteriaRepository;

    /**
     * @param Users $usersRepository
     */
    public function __construct(Users $usersRepository, CriteriaRepository $criteriaRepository)
    {
        $this->usersRepository    = $usersRepository;
        $this->criteriaRepository = $criteriaRepository;
    }

    /**
     * @param Authenticatable $user
     * @param int             $rating
     *
     * @return View
     */
    public function rateManager(Authenticatable $user, $rating = 1)
    {
        $teams    = $this->usersRepository->getTeamsForUser($user);
        $criteria = $this->criteriaRepository->getAllCriteria();
        $managers = [];

        return view(
            'vote/rateManager',
            [
                'teams'    => $teams,
                'criteria' => $criteria,
                'managers' => $managers,
                'user'     => $user,
                'rating'   => $rating
            ]);
    }
}