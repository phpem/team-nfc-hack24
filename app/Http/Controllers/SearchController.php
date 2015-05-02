<?php

namespace Teamnfc\Http\Controllers;

/**
 * SearchController
 */
final class SearchController extends Controller
{

    public function index()
    {
        return view('search/index');
    }
}