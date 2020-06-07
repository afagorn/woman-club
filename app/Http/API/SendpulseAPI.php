<?php
namespace App\Http\API;

class SendpulseAPI
{
    /**
     * @var string
     */
    private $paymentAddressBookId;

    /**
     * @var string
     */
    private $guideAddressBookId;

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

        $this->setAddressBooksId();
    }

    private function setAddressBooksId()
    {
        $this->paymentAddressBookId = '811917';
        $this->guideAddressBookId = '811914';
    }


    /**
     * @return \Sendpulse\RestApi\ApiClient
     */
    public function getApi(): \Sendpulse\RestApi\ApiClient
    {
        return $this->api;
    }

    /**
     * @return string
     */
    public function getGuideAddressBookId()
    {
        return $this->guideAddressBookId;
    }

    /**
     * @return string
     */
    public function getPaymentAddressBookId()
    {
        return $this->paymentAddressBookId;
    }
}
