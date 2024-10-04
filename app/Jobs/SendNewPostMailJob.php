<?php

namespace App\Jobs;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Mail\PostMail;
use Illuminate\Support\Facades\Mail;


class SendNewPostMailJob implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new job instance.
     */
    public function __construct(public array $incoming)
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        // Take email field from auth user. Then call method send. Method send create instance of class and send mail.
        Mail::to($this->incoming['email'])->send(new PostMail(['name' => $this->incoming['name'], 'title' => $this->incoming['title']]));
    }
}
