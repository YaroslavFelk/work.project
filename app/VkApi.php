<?php

namespace App;

use ATehnix\VkClient\Requests\ExecuteRequest;
use ATehnix\VkClient\Requests\Request;

class VkApi
{
    public function __construct()
    {
        $this->api = new \ATehnix\VkClient\Client();

        $this->api->setDefaultToken(env('VK_SECRET_KEY'));
    }

    public function getClients()
    {
        $response = $this->api->request('ads.getClients', ['account_id' => env('VK_CLIENT_ID')]);
        foreach ($response['response'] as $client) {
            Client::firstOrCreate(
                ["id" => $client['id']],
                ["id" => $client['id'], "name" => $client['name'], "owner_id" => 1]
            );
        }
    }


    public function getCampaigns()
    {
//        $array = [];
//
//        foreach ($clients as $client) {
//            array_push($array, new Request(
//                    'ads.getCampaigns',
//                    [
//                        'account_id' => env('VK_CLIENT_ID'),
//                        'client_id' => $client
//                    ])
//            );
//
//        }

//        $execute = ExecuteRequest::make($array);
//        var_dump($this->api);
//        $response = $this->api->send($execute);


        $response = $this->api->request('ads.getCampaigns',
            ['account_id' => env('VK_CLIENT_ID'), 'client_id' => $_COOKIE['clientId']]
        );

        foreach ($response['response'] as $campaign) {
            Campaigns::firstOrCreate(
                ["id" => $campaign['id']],
                ["id" => $campaign['id'], "name" => $campaign['name'], "owner_id" => $_COOKIE['clientId']]
            );
        }
    }

    public function getStatistic()
    {
        $response = $this->api->request('ads.getDemographics',
            [
                'account_id' => env('VK_CLIENT_ID'),
                'ids_type' => 'client',
                'ids' => 1604593793,
                'period' => 'overall',
                'date_from' => 0,
                'date_to' => 0,
            ]);
    }

    public function getDemographics()
    {
        return $this->api->request('ads.getDemographics',
            [
                'account_id' => env('VK_CLIENT_ID'),
                'ids_type' => 'campaign',
                'ids' => $_COOKIE['campaignId'],
                'period' => 'overall',
                'date_from' => 0,
                'date_to' => 0,
            ]);


    }
}
