<?php

use App\Events\RegistrationEvent;
use App\Jobs\MailSendingJob;
use App\Mail\MarkDownMail;
use App\Models\User;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Mail;

use function GuzzleHttp\Promise\queue;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

#email send with queues
Route::get('queue',function(){
    $user= User::find(rand(1,10));

    // MailSendingJob::dispatch($user)->delay(now()->addSecond());
    dispatch(new MailSendingJob($user));

    echo 'registration complate';

});

#email send with queues and event
Route::get('event',function(){
    $user= User::find(rand(1,10));

    // RegistrationEvent::dispatch($user);
    event(new RegistrationEvent($user));


});







#clear all cache 
Route::get('clear-cache',function(){
    Artisan::call('cache:clear');

    Artisan::call('config:cache');
    Artisan::call('config:clear');

    Artisan::call('route:cache');
    Artisan::call('route:clear');

    Artisan::call('view:cache');
    Artisan::call('view:clear');

    echo 'all cache cleared';
});