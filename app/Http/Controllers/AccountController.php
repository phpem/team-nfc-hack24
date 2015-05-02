<?php

namespace Teamnfc\Http\Controllers;

/**
 * AccountController
 */
final class AccountController extends Controller
{
    public function index()
    {
        return view('account/index');
    }
}