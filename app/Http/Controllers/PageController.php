<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class PageController extends Controller
{
    /**
     * Show home page.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $template = config('portfolio.template');
        $user = User::all()->first();
        return view(sprintf('%s.index', $template))->with('user', $user);
    }
}
