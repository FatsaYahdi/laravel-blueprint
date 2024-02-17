<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreStoreRequest;
use App\Http\Requests\StoreUpdateRequest;
use App\Models\Store;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;

class StoreController extends Controller
{
    public function index(Request $request)
    {
        $stores = Store::all();

        return view('stores.index', compact('stores'));
    }

    public function create(Request $request)
    {
        return view('stores.create');
    }

    public function store(StoreStoreRequest $request)
    {
        $store = Store::create($request->validated());

        return redirect()->route('stores.index');
    }

    public function show(Request $request, Store $store)
    {
        return view('stores.show', compact('store'));
    }

    public function edit(Request $request, Store $store)
    {
        return view('stores.edit', compact('store'));
    }

    public function update(StoreUpdateRequest $request, Store $store)
    {
        $store->update($request->validated());

        return redirect()->route('stores.show', ['stores' => $store]);
    }
}
