<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class PlayController extends Controller
{
    public function first()
    {
        return Inertia::render('First');
    }

    public function second()
    {
        return Inertia::render('Second');
    }

    public function smilies(Request $request)
    {
        if ($request->isMethod('POST')) {
            dump($request->all());
            return redirect()->back();
        }

        return Inertia::render('Smilies');
    }
}
