<?php
namespace App\Http\Controllers\API;

use App\Http\API\SendpulseAPI;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MailingController extends \App\Http\Controllers\Controller
{
    /**
     * @var SendpulseAPI
     */
    private $sendpulseAPI;

    /**
     * MailingController constructor.
     * @param SendpulseAPI $sendpulseAPI
     */
    public function __construct(SendpulseAPI $sendpulseAPI)
    {
        $this->sendpulseAPI = $sendpulseAPI;
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function guide(Request $request)
    {
        $requestData = Validator::make($request->all(), [
            'email' => 'required|email'
        ])->validated();

        $this->sendpulseAPI->getApi()->addEmails(
            $this->sendpulseAPI->getGuideAddressBookId(),
            [['email' => $requestData['email']]]
        );

        return response()->json(['result' => 'success']);
    }
}
