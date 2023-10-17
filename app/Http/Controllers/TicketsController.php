<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTicketsRequest;
use App\Http\Resources\TicketResource;
use App\Models\Tickets;
use Exception;
use Illuminate\Http\Request;

class TicketsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return new TicketResource(Tickets::get());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTicketsRequest $request)
    {
        // Validate the incoming data using the request class
        $validatedData = $request->validated();
        
        // Generate a random code
        $code = random_int(100000, 999999);
        $data = array_merge($validatedData, ['code' => $code]);
    
        try {
            // Create a new ticket instance and save it to the database
            Tickets::create($data);
    
            // You may want to return a success response with the created ticket
            return response()->json(['message' => 'Ticket created successfully'], 201);
        } catch (Exception $e) {
            // Handle exceptions, and return an error response
            return response(['error'=>'Something went wrong during storing the ticket.'], 400);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
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
        //
    }
}
