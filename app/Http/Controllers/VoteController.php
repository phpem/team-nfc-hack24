<?php

namespace Teamnfc\Http\Controllers;

use Illuminate\Contracts\Auth\Authenticatable;

/**
 * VoteController
 */
final class VoteController extends Controller {

    /**
     * @param Authenticatable $user
     * @param int             $rating
     */
    public function rateManager(Authenticatable $user, $rating)
    {

    }
}