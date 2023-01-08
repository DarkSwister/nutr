<?php

namespace App\Http\Livewire;

use GuzzleHttp\Client;
use Livewire\Component;

class Plants extends Component
{
    private $client;
    private string $token;
    public $devices;
    public function mount(){
        $this->client = new Client(['base_uri' => 'https://sandbox.smaapis.de']);
        $res = $this->client->request('POST', '/oauth2/token', [
            'form_params' => [
                'grant_type' => 'client_credentials',
                'client_id' => 'BATTLE_api',
                'client_secret' => '88f21383-67c8-4312-b433-764439fd7e3b',
            ],
            'headers' => [
                'Content-Type' => 'application/x-www-form-urlencoded',
            ],
        ]);
        $body = json_decode($res->getBody());
        $this->token = $body->access_token;
        $res = $this->client->request('GET', '/monitoring/v1/plants', [
            'headers' => [
                'Content-Type' => 'application/x-www-form-urlencoded',
                'Authorization' => 'Bearer '.$this->token
            ],
        ]);
        $this->plants = json_decode($res->getBody())->plants;
        foreach ($this->plants as $plant){
            $res = $this->client->request('GET', '/monitoring/v1/plants/'.$plant->plantId.'/devices', [
                'headers' => [
                    'Content-Type' => 'application/x-www-form-urlencoded',
                    'Authorization' => 'Bearer '.$this->token
                ],
            ]);
            $this->devices[$plant->plantId] = json_decode($res->getBody())->devices;
        }
    }


    public function render()
    {
        return view('livewire.plants');
    }
}
