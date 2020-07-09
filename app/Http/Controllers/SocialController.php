<?php

namespace App\Http\Controllers;

use App\Campaigns;
use App\Client;
use App\VkApi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class SocialController extends Controller
{
    public function index()
    {
        VkApi::getClients();
        $clients = Client::all();



        return view('welcome', compact('clients, campaigns'));
    }

    public function store(Request $request)
    {
        $api = new \ATehnix\VkClient\Client();

        $api->setDefaultToken(env('VK_SECRET_KEY'));

        $response = $api->request('ads.getStatistics',
        [
            'account_id' => env('VK_CLIENT_ID'),
            'ids_type' => 'client',
            'ids' => 1604593793,
            'period' => 'overall',
            'date_from' => 0,
            'date_to' => 0,
        ]);

        return view('test', compact('response'));
    }
}
