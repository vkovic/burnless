<?php

namespace App\Console\Commands;

use App\Models\Action;
use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class SendActionEmails extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'mail:send';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send emails for day actions';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $todayActions = Action::where('date', now()->format('Y-m-d'))->get();

        foreach ($todayActions as $action) {
            $class = 'App\\Mail\\' . $action['module'];
            $mail = new $class($action);

            $recipients = User::where('email', 'LIKE', '%@prine.ch')->get();
            foreach ($recipients as $recipient) {
                Mail::to($recipient->email)->send($mail);
            }
        }

        return 0;
    }
}
