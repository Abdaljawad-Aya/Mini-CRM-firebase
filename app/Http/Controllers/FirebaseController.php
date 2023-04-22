<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;

class FirebaseController extends Controller
{
    public function index()
    {
        $serviceAccount = ServiceAccount::fromValue(config('service.firebase.service_account'));
        $firebase = (new Factory)
            ->withServiceAccount($serviceAccount)
            ->withDatabaseUri(config('service.firebase.database_uri'))
            ->create();

        $database = $firebase->getDatabase();
        $ref = $database->getReference('users');

        $users = $ref->getValue();

        return response()->json($users);
    }
}
