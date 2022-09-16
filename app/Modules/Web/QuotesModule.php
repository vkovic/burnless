<?php

namespace App\Modules\Web;

use App\Models\Score;
use App\Modules\AbstractModule;
use Illuminate\Support\Facades\Session;

class QuotesModule extends AbstractModule
{
    public function handle(array $data): void
    {
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
            'score' => $data['score'] * $scoreMultiplier,
        ]);

        return;
    }
}