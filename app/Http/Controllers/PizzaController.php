<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PizzaController extends Controller
{
    public function index()
    {
        // get data from database
        // $pizza = [
        //     'type' => 'hawaiian', 
        //     'base' => 'garlic crust',
        //     'price' => 10
        // ];

        $pizzas = [
            ['type' => 'hawaiian', 'base' => 'cheesy crust'],
            ['type' => 'volcano', 'base' => 'garlic crust'],
            ['type' => 'veg supreme', 'base' => 'thin & crispy']
        ];

        return view('pizzas', [
            'pizzas' => $pizzas
        ]);
        // return 'pizzas'; //plain text
        // return ['name' => 'veg pizza', 'base' => 'classic']; //json
    }

    public function show($id)
    {
        // use the $id variable to query the db for a record
        return view('details', ['id' => $id]);
    }
}
