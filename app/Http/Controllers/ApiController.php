<?php

namespace App\Http\Controllers;

use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use App\Providers;
use App\Tasks;


class ApiController extends Controller
{
    public function getRemoteData(){
        $provider = Providers::find(1);
        $client =  new Client([
            'headers' => ['content-type' => 'application/json', 'Accept' => 'application/json']
        ]);

        try {
            $response = $client->request('POST', $provider->url);
        } catch (GuzzleException $e) {
            echo $e->getMessage();
        }

        $data = $response->getBody();
        $data = json_decode($data);

        $task = new Tasks();
        $task->saveData($data);


    }
}
