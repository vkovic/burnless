<?php

namespace App\Console\Commands;

use App\Mail\Score;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class TestCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'mail:test';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $type = 'job-expectations';
        $title = 'What\'s expected';
        $content = 'How clear is this sprint goals and job expectations?';

        $recipients = [
            'john@doe.com',
            'jane@doe.com'
        ];

        foreach ($recipients as $recipient) {
            Mail::to($recipient)->send(new Score($type, $title, $content));
        }

        return 0;
    }
}
