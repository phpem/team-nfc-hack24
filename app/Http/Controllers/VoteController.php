<?php

namespace Teamnfc\Http\Controllers;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\View\View;

/**
 * VoteController
 */
final class VoteController extends Controller {

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