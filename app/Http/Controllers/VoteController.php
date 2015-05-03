<?php

namespace Teamnfc\Http\Controllers;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\View\View;
use Redirect;
use Symfony\Component\HttpFoundation\Request;
use Teamnfc\Entity\TeamEntity;
use Teamnfc\Entity\VoteEntity;
use Teamnfc\Repository\CriteriaRepository;
use Teamnfc\Repository\Users;
use Teamnfc\Repository\VoteRepository;

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
     * @var VoteRepository
     */
    private $voteRepository;

    /**
     * @param Users $usersRepository
     */
    public function __construct(Users $usersRepository, CriteriaRepository $criteriaRepository, VoteRepository $voteRepository)
    {
        $this->usersRepository    = $usersRepository;
        $this->criteriaRepository = $criteriaRepository;
        $this->voteRepository     = $voteRepository;
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

    public function registerVote(Authenticatable $user) {
        $request = Request::createFromGlobals();

        $vote = new VoteEntity(
            $request->request->get('criteria_id'),
            $request->request->get('rating'),
            $request->request->get('team_id'),
            $user['id'],
            new \DateTime(),
            new \DateTime()
        );

        $this->voteRepository->save($vote);

        return Redirect::to('/')->with('message', 'Thanks for voting');
    }
}