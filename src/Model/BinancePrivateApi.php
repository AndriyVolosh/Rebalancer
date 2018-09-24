<?php

/**
 *  Connect to authentification point and get private data
 */
class BinancePrivateApi
{

    protected $base = "https://api.binance.com/api/", $api_key, $api_secret;

    /**
     * @param string $api_key
     * @param string $api_secret
     */
    public function __construct($api_key, $api_secret)
    {
        $this->api_key = $api_key;
        $this->api_secret = $api_secret;
    }

    /**
     * @param url $url
     * @param array $params
     * @param http $method
     * @return json
     */
    public function signedRequest($url, $params = [], $method = "GET")
    {
        $params['timestamp'] = number_format((microtime(true)) * 1000, 0, '.', '');
        $query = http_build_query($params, '', '&');
        $signature = hash_hmac('sha256', $query, $this->api_secret);
        $opt = [
            "http" => [
                "method" => $method,
                "ignore_errors" => true,
                "header" => "User-Agent: Rebalancer\r\nX-MBX-APIKEY: {$this->api_key}\r\nContent-type: application/x-www-form-urlencoded\r\n"
            ]
        ];
        if ($method == 'GET') {
            $endpoint = "{$this->base}{$url}?{$query}&signature={$signature}";
        } else {
            $endpoint = "{$this->base}{$url}";
            $postdata = "{$query}&signature={$signature}";
            $opt['http']['content'] = $postdata;
        }
        $context = stream_context_create($opt);
        $res = file_get_contents($endpoint, false, $context);
        return $res;
    }

}

/**
 * Set your own keys
 * @param your_key KEY
 * @param your_secret SECRET
 */
$api = new BinancePrivateApi("KEY", "SECRET");
