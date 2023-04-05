<?php

namespace App\Http\Controllers;

use App\Models\Publisher;
use App\Http\Requests\StorePublisherRequest;
use App\Http\Requests\UpdatePublisherRequest;
use Illuminate\Http\RedirectResponse;

class PublisherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('publishers.index', [
            'publishers' => Publisher::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('publishers.create', [
            'action' => route('publishers.store')
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePublisherRequest $request) : RedirectResponse
    {
        Publisher::create($request->validated());

        return redirect(route('publishers.index'))->with([
            'message' => 'Izdevniecība "'.request('name').'" izveidota'
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Publisher $publisher)
    {
        return view('publishers.show', [
            'publisher' => $publisher
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Publisher $publisher)
    {
        return view('publishers.create', [
            'publisher' => $publisher,
            'action' => route('publishers.update', $publisher->id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePublisherRequest $request, Publisher $publisher)
    {
        $publisher->update($request->validated());

        return redirect(route('publishers.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Publisher $publisher)
    {
        $publisher->delete();

        return redirect(route('publishers.index'))->with([
            'message' => 'Izdevniecība "'.$publisher->name.'" dzēsta'
        ]);
    }
}
