<?php

namespace App\Channels\Web;

use App\Channels\AbstractModule;
use Inertia\Inertia;

class QuoteModule extends AbstractModule
{
    public function getPopupView()
    {
        return Inertia::render('QuoteModule')->with([
            'question' => 'some question'
        ]);
    }
}
