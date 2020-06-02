<?php
namespace App\Http\API;

class SendpulseAPI {
    const PATH_TO_ATTACH_FILE = __FILE__;

    /**
     * @var \Sendpulse\RestApi\ApiClient
     */
    private $api;

    /**
     * SendpulseAPI constructor.
     * @throws \Exception
     */
    public function __construct()
    {
        $this->api = new \Sendpulse\RestApi\ApiClient(env('SENDPULSE_API_USER_ID'), env('SENDPULSE_API_SECRET'));
    }

    /**
     * @return \Sendpulse\RestApi\ApiClient
     */
    public function getApi(): \Sendpulse\RestApi\ApiClient
    {
        return $this->api;
    }
}
