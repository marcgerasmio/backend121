<?php

namespace App\Http\Controllers\Api;


use Illuminate\Http\Request;
use App\Models\Messages;

use App\Http\Requests\MessagesRequest;

use App\Http\Controllers\Controller;


class MessagesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Messages::all();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(MessagesRequest $request)
    {
        $validated = $request->validated();

        $messages= Messages::create($validated);
         
         return $messages;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $messages = Messages::findOrFail($id);

        $messages->delete();

        return $messages;
    }
}
