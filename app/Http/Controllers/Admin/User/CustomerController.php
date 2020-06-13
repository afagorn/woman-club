<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\User\Customer\CreateRequest;
use App\Models\DTO\User\CredentialsDTO;
use App\Models\DTO\User\CustomerDTO;
use App\Models\DTO\User\UserDTO;
use App\Models\User\Customer;
use App\Services\User\CustomerService;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class CustomerController extends Controller
{
    private $service;

    public function __construct(CustomerService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        $customers = Customer::with('user')->get();

        return view('admin.user.customer.index', compact('customers'));
    }

    public function create()
    {
        return view('admin.user.customer.create');
    }

    public function store(CreateRequest $request)
    {
        $customer = $this->service->create(
            new CustomerDTO(
                new UserDTO(
                    $request['email'] ?? null,
                    $request['name'] ?? null,
                    new CredentialsDTO($request['password'] ?? null)
                ),
                $request['tgUsername'] ?? null,
                isset($request['unsubscribeDate']) ? Carbon::make($request['unsubscribeDate']) : null
            )
        );

        if(is_null($customer)) {
            flash('Что-то пошло не так при создании покупателя')->error();
            return redirect()->back();
        }

        flash('Покупатель успешно создан')->success();

        return redirect(route('admin.customer.show', $customer->id));
    }

    public function show(Customer $customer)
    {
        return view('admin.user.customer.show', compact('customer'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer $customer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Customer $customer)
    {
        //
    }

    public function destroy(Customer $customer)
    {
        try {
            $customer->delete();
        } catch (\Exception $exception) {
            flash($exception->getMessage())->error();
            return back();
        }

        return redirect(route('admin.customer.index'));
    }
}
