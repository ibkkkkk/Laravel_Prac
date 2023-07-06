<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LifeCycleController extends Controller
{
    public function showServiceContainerTest() {
        app()->bind('lifeCycleTest', function(){
            return 'life cycle test';
        });

       $test = app()->make('lifeCycleTest');

       //no serviceContainer
       $message = new Message();
       $sample = new Sample($message);
       $sample->run();

       // use serviceContainer
       app()->bind('s', Sample::class);
       $sample = app()->make('s');
       $sample->run();

        dd(app(), $test);
    }

    public function showServiceProviderTest() {
        $encrypt = app()->make('encrypter');
        $password = $encrypt->encrypt('password');

        $sample = app()->make('ServiceProviderTest');

        dd($sample, $password, $encrypt->decrypt($password));
    }
}

class Sample
{
    public $message;
    public function __construct(Message $message) {
        $this->message = $message;
    }
    public function run() {
        $this->message->send();
    }
}


class Message
{
    public function send() {
        echo 'message send';
    }
}
