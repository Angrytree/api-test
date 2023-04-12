<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class CheckService {

    private $url;
    private string $username;
    private string $password;

    public function __construct(string $url, string $username, string $password) {
        $this->url = $url;
        $this->username = $username;
        $this->password = $password;
    }


    public function getLastQuarterChecks(){
        $response = Http::withOptions([
            'verify' => false,
        ])->withBasicAuth($this->username, $this->password)->acceptJson()->get($this->url . 'Document_ДенежныйЧек?$filter=Date gt datetime\'2022-10-01T00:00:00\' and Date lt datetime\'2022-12-31T23:59:59\'');
        
        $result = json_decode($response->body(), 1);

        return $result['value'];
    }

}