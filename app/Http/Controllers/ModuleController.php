<?php

namespace App\Http\Controllers;

use App\Models\Score;
use App\Modules\Web\ScoreModule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Inertia\Inertia;

class ModuleController extends Controller
{
    public function score(Request $request)
    {
        if ($request->isMethod('POST')) {
            try {
                (new ScoreModule)->handle($request->all());

                return redirect()->back();
            } catch (\Exception $e) {

                return ['test'];
                return redirect()->back()->withErrors([
                    'error' => $e->getMessage()
                ]);
            }
        }

        $question = 'Are you happy with your work lately?';

        return Inertia::render('ScoreModule')->with([
            'question' => $question
        ]);
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

        return Inertia::render('QuoteModule');
    }
}
