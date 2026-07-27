<?php

namespace App\Http\Controllers;

use App\Models\Merchant;
use Illuminate\Http\Request;

class MerchantController extends Controller
{
    public function index()
    {
        $merchants = Merchant::latest()->get();
        return view('merchants.index', compact('merchants'));
    }

    public function create()
    {
        return view('merchants.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:merchants,email',
            'status' => 'required|boolean',
        ]);

        Merchant::create($request->all());
        return redirect()->route('merchants.index');
    }

    public function edit(Merchant $merchant)
    {
        return view('merchants.edit', compact('merchant'));
    }

    public function update(Request $request, Merchant $merchant)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:merchants,email,' . $merchant->id,
            'status' => 'required|boolean',
        ]);

        $merchant->update($request->all());
        return redirect()->route('merchants.index');
    }

    public function destroy(Merchant $merchant)
    {
        $merchant->delete();
        return redirect()->route('merchants.index');
    }
}
