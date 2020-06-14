<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Promocode;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class PromocodeController extends Controller
{
    public function index()
    {
        $promocodes = Promocode::all();
        return view('admin.promocode.index', compact('promocodes'));
    }

    public function create()
    {
        return view('admin.promocode.create');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Exception
     */
    public function store(Request $request)
    {
        $validator = \Validator::make($request->all(), [
            'name' => 'required|string|max:64',
            'discount' => 'required|integer|min:1|max:100',
            'expirationDate' => 'required|date',
            'status' => 'required|string'
        ]);
        $requestData = $validator->validated();

        $promocode = Promocode::new(
            $requestData['name'],
            $requestData['discount'],
            Carbon::make($requestData['expirationDate']),
            $requestData['status']
        );

        return redirect(route('admin.promocode.show', $promocode->id));
    }

    public function show(Promocode $promocode)
    {
        return view('admin.promocode.show', compact('promocode'));
    }

    public function edit(Promocode $promocode)
    {
        return view('admin.promocode.edit', compact('promocode'));
    }

    public function update(Request $request, Promocode $promocode)
    {
        $validator = \Validator::make($request->all(), [
            'name' => 'required|string|max:64',
            'discount' => 'required|integer|min:1|max:100',
            'expirationDate' => 'required|date',
            'status' => 'required|string'
        ]);
        $requestData = $validator->validated();

        if($promocode->update($requestData))
            flash('Продукт успешно сохранен')->success();

        return redirect(route('admin.promocode.show', $promocode->id));
    }

    public function destroy(Promocode $promocode)
    {
        try {
            $promocode->delete();
        } catch (\Exception $exception) {
            flash($exception->getMessage())->error();
            return back();
        }

        return redirect(route('admin.promocode.index'));
    }
}
