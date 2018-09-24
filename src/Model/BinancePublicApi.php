<?php

/**
 * Connect to public point and get public data
 */
class BinancePublicApi
{

    protected $base = "https://api.binance.com/api/";

    /**
     * 
     * @param irl $url
     * @param string $query
     * @param http $method
     * @return json
     */
    function request($url, $query = '', $method = "GET")
    {
        $endpoint = "{$this->base}{$url}?{$query}";
        $opt = [
            "http" => [
                "method" => $method
            ]
        ];
        $context = stream_context_create($opt);
        $res_json = json_decode(file_get_contents($endpoint, false, $context));
        return $res_json;
    }

}

$api_pub = new BinancePublicApi();
