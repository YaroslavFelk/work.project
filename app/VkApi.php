<?php

namespace App;

class VkApi
{
    static function getClients()
    {
        $params = [
            "v" => 5.92,
            "access_token" => "019de166f3f004118852943ee3b80724fc80e68349f00b3bd03ba3b8bf0f35b0e5ff273333be9c5b742d6",
            "account_id" => "1900013570"
        ];
        $_method = "ads.getClients";

        $clients =  json_decode(file_get_contents("https://api.vk.com/method/".$_method."?".http_build_query($params)))->{'response'};

        foreach ($clients as $client) {
            Client::firstOrCreate(
                ["id" => $client->id],
                ["id" => $client->id, "name" => $client->name, "owner_id" => 1]
            );
        }
    }

    static function getCompaign()
    {
        $params = [
            "v" => 5.92,
            "access_token" => "019de166f3f004118852943ee3b80724fc80e68349f00b3bd03ba3b8bf0f35b0e5ff273333be9c5b742d6",
            "account_id" => "1900013570"
        ];
        $_method = "ads.getCampaigns";

        return json_decode(file_get_contents("https://api.vk.com/method/".$_method."?".http_build_query($params)));
    }

}
