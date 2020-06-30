<?php

namespace App;

use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Database\Eloquent\Model;
use GuzzleHttp\Client;

class Providers extends Model
{
    protected $table = 'providers';

    public function getData($data){

        $client =  new Client();
        try {
            $response = $client->request('POST', $data);
        } catch (GuzzleException $e) {
            echo $e->getMessage();
        }
        $viewData = $response->getBody();
        $viewData = json_decode($viewData);

        return $viewData;
    }

}
