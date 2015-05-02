<?php

namespace Teamnfc\Http\Controllers;

/**
 * DashboardController
 */
final class DashboardController extends Controller
{

    public function index()
    {
        return view('dashboard/index');
    }
}