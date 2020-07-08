<?php

namespace App\Http\Controllers;

use App\Client;
use App\VkApi;
use Illuminate\Http\Request;

class SocialController extends Controller
{
    public function index()
    {
        $clients = Client::all();

        return view('welcome', compact('clients'));
    }
}
