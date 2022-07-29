<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\HomeFormRequest;
use App\Service\WillyWonkaFactory;

class HomeController extends Controller
{
    public function view() 
    {
    	return view('home', ['amount' => []]);	
    }

    public function index(HomeFormRequest $request)
    {
    	$factory = (new WillyWonkaFactory())->get($request->input('amount'));

        return response()->json([
            'status' => 'OK',
            'packages' => $factory
        ]);	
    }
}
