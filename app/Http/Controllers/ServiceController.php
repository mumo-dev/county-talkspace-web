<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  App\Http\Requests\ServiceRequest;

class ServiceController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function index()
    {
        return view('services.index');
    }

    public function create()
    {
        return view('services.create');
    }

    public function store(ServiceRequest $request)
    {
    
        auth()->user()->services()->create($request->validated());

        return back()->withMessage('Request successfully made');

    }
}
