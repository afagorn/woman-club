<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Repositories\Interfaces\IPromocodeRepository;
use Illuminate\Http\Request;

class PromocodeController extends Controller
{
    /**
     * @var IPromocodeRepository
     */
    private $repository;

    public function __construct(IPromocodeRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function check(Request $request)
    {
        \Validator::make($requestData = $request->all(), [
            'name' => 'required|max:64'
        ])->validate();

        $jsonData = ['valid' => false, 'discount' => null];
        if(!is_null($promocode = $this->repository->getValidByName($requestData['name'])))
            $jsonData = ['valid' => true, 'discount' => $promocode->discount];

        return response()->json($jsonData);
    }
}
