<?php

namespace App\Http\Controllers;

use App\Models\Score;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Inertia\Inertia;

class PlayController extends Controller
{
    public function preview($template)
    {
        return Inertia::render('Preview', [
            'template' => $template,
        ]);
    }

    public function second()
    {
        return Inertia::render('Second');
    }

    public function smilies(Request $request)
    {
        $sessionId = Session::getId();

        if ($request->isMethod('POST')) {
            // Regenerate session if it's not from today,
            $lastScore = Score::where('session_id', $sessionId)
                ->orderBy('created_at', 'desc')
                ->first();

            if ($lastScore !== null && $lastScore->created_at->endOfDay()->lt(now())) {
                Session::regenerate();
            }

            Score::updateOrCreate(['session_id' => Session::getId()], [
                'type' => $request->route()->getName(),
                'score' => $request->input('score'),
            ]);

            return redirect()->back();
        }

        return Inertia::render('Smilies');
    }

    public function quote(Request $request)
    {
        if ($request->isMethod('POST')) {

            Score::create([
                'session_id' => Session::getId(),
                'type' => 'todo',
                'score' => 33,
            ]);

            return redirect()->back();
        }

        return Inertia::render('Quote');
    }
}
