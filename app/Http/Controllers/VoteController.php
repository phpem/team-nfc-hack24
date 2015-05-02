<?php

namespace Teamnfc\Http\Controllers;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\View\View;
use Teamnfc\Entity\TeamEntity;
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
     * @param Users $usersRepository
     */
    public function __construct(Users $usersRepository)
    {
        $this->usersRepository = $usersRepository;
    }

    /**
     * @param Authenticatable $user
     * @param int             $rating
     *
     * @return View
     */
    public function rateManager(Authenticatable $user, $rating)
    {

        return view(
            'vote/rateManager',
            [
                'user'   => $user,
                'rating' => $rating
            ]);
    }
}