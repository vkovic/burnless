<?php

namespace App\Http\Controllers;

use App\Models\Score;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Inertia\Inertia;

class ModuleController extends Controller
{
    public function preview($template)
    {
        return Inertia::render('Preview', [
            'template' => $template,
        ]);
    }

    public function admin()
    {
        return Inertia::render('Admin');
    }

    public function go()
    {
        $sid = Session::getId();

        $lastScore = Score::where('session_id', $sid)
            ->where('created_at', '>=', today()->startOfDay())
            ->orderBy('created_at', 'desc')
            ->first();

        if ($lastScore === null) {
            return Inertia::render('Quote');
        }

        return Inertia::render('Smilies');

    }

    public function second()
    {
        return Inertia::render('Second');
    }

    public function smilies(Request $request)
    {
        if ($request->isMethod('POST')) {

            $scoreExists = Score::where('session_id', Session::getId())
                ->where('created_at', '>=', today()->startOfDay())
                ->where('type', 'smilies')
                ->exists();

            if ($scoreExists) {
                throw new \Exception('already voted');
            }

            // Every module has it's own multiplier
            $scoreMultiplier = 5;

            Score::create([
                'session_id' => Session::getId(),
                'type' => 'smilies',
                'score' => $request->input('score') * $scoreMultiplier,
            ]);

            return;

            return redirect()->back();
        }

        return Inertia::render('Smilies');
    }

    public function quote(Request $request)
    {
        if ($request->isMethod('POST')) {

            $scoreExists = Score::where('session_id', Session::getId())
                ->where('created_at', '>=', today()->startOfDay())
                ->where('type', 'quote')
                ->exists();

            if ($scoreExists) {
                throw new \Exception('already voted');
            }

            // Every module has it's own multiplier
            $scoreMultiplier = 1;

            // TODO:
            // Inspiring::quote() instead of api

            Score::create([
                'session_id' => Session::getId(),
                'type' => 'quote',
                'score' => 5 * $scoreMultiplier,
            ]);

            return;

            return redirect()->back();
        }

        return Inertia::render('Quote');
    }
}
