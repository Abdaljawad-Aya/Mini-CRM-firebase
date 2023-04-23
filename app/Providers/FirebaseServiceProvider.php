<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Kreait\Firebase\Factory;

class FirebaseServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind('firebase', function() {
            $factory = (new Factory)
                ->withServiceAccount('./mini-crm-firebase-firebase-adminsdk-xxqg8-8d89218da3.json')
                ->withDatabaseUri('https://mini-crm-firebase.firebaseapp.com/');
            return $factory->createDatabase();
        });
    }
}
