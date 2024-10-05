<?php

use App\Mail\PostCountMail;
use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schedule;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote')->hourly();

// First way to use Schedule Tasks
Schedule::call(function() {
    Mail::to('admin@example.com')->send(new PostCountMail());
})->everyTwoMinutes()->name('SendAdminPostsCount')->withoutOverlapping();

