<?php

namespace Teamnfc\Http\Controllers;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Redirect;
use Symfony\Component\HttpFoundation\Request;
use Teamnfc\Entity\TeamEntity;
use Teamnfc\Entity\VoteEntity;
use Teamnfc\Repository\CriteriaRepository;
use Teamnfc\Repository\TeamRepository;
use Teamnfc\Repository\UsersRepository;
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
     * @var TeamRepository
     */
    private $teamRepository;

    /**
     * @param UsersRepository $usersRepository
     */
    public function __construct(UsersRepository $usersRepository, CriteriaRepository $criteriaRepository, VoteRepository $voteRepository, TeamRepository $teamRepository)
    {
        $this->usersRepository    = $usersRepository;
        $this->criteriaRepository = $criteriaRepository;
        $this->voteRepository     = $voteRepository;
        $this->teamRepository     = $teamRepository;
    }

    /**
     * @param Authenticatable $user
     * @param int             $rating
     *
     * @return View
     */
    public function rateManager(Authenticatable $user, $rating = 4)
    {
        $teams    = $this->usersRepository->getTeamsForUser($user);
        $criteria = $this->criteriaRepository->getAllCriteria();
        $managers = $this->teamRepository->getManagerForTeam(TeamEntity::populate(['id' => $teams[0]->id]));

        return view(
            'vote/rateManager',
            [
                'teams'         => $teams,
                'criteria'      => $criteria,
                'managers'      => $managers,
                'user'          => $user,
                'rating'        => $rating,
                'total-rating'  => 5 // fixme: magic number
            ]);
    }

    /**
     * @param Authenticatable $user
     *
     * @return RedirectResponse
     */
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

        return Redirect::to('/dashboard')->with('message', 'Thanks for voting');
    }

    /**
     * Returns a Json array of Managers for the given team Id
     * Use to populate the Manager dropdown in the voting page
     *
     * @param $teamId
     *
     * @return JsonResponse
     */
    public function getManagersForTeam($teamId)
    {
        $managers = $this->teamRepository->getManagerForTeam(TeamEntity::populate(['id' => $teamId]));

        $response = [];
        foreach ($managers as $manager) {
            $response[] = [
                'id' => $manager->id,
                'name' => $manager->first_name . ' ' . $manager->last_name
            ];
        }

        return new JsonResponse($response);
    }
}