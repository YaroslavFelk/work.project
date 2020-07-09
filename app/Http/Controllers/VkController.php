<?php

namespace App\Http\Controllers;

use App\Campaigns;
use App\Client;
use App\VkApi;
use ATehnix\VkClient\Requests\ExecuteRequest;
use Illuminate\Http\Request;

class VkController extends Controller
{
    public function __construct()
    {
        $this->vk = new VkApi();
    }

    public function index()
    {
        $clients = Client::all();
        $this->vk->getCampaigns();
        $campaigns = Campaigns::where('owner_id', $_COOKIE['clientId'])->get();

        $demographic = $this->vk->getDemographics();
        return view('welcome', compact('clients'));
    }


    public function company()
    {
        $clients = Client::all();
        $this->vk->getCampaigns();
        $campaigns = Campaigns::where('owner_id', $_COOKIE['clientId'])->get();

        return view('welcome', compact(['clients', 'campaigns']));
    }

    public function data()
    {
        $clients = Client::all();
        $campaigns = Campaigns::where('owner_id', $_COOKIE['clientId'])->get();
        $demographic = $this->vk->getDemographics();

        return view('welcome', compact(['clients', 'campaigns', 'demographic']));
    }
}
