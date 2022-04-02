<?php

namespace App\Http\Controllers;

use App\Models\Flight;

class FlightController extends Controller
{
    public function index()
    {
        $this->authorize('viewAny', Flight::class);

        return view('flights.index');
    }

    public function create()
    {
        $this->authorize('create', Flight::class);

        return view('flights.create');
    }

    public function show(Flight $flight)
    {
        $this->authorize('view', $flight);

        return view('flights.show', compact('flight'));
    }

    public function edit(Flight $flight)
    {
        $this->authorize('update', $flight);

        return view('flights.edit', compact('flight'));
    }

    public function destroy(Flight $flight)
    {
         $this->authorize('delete', $flight);

          $flight->delete();

         return back();
    }
}
