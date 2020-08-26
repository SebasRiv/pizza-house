<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pizza;

class PizzaController extends Controller
{
    // public function __construct() {
    //     $this->middleware('auth');
    // }

    public function index()
    {
        // get data from database
        // $pizza = [
        //     'type' => 'hawaiian', 
        //     'base' => 'garlic crust',
        //     'price' => 10
        // ];

        // $pizzas = [
        //     ['type' => 'hawaiian', 'base' => 'cheesy crust'],
        //     ['type' => 'volcano', 'base' => 'garlic crust'],
        //     ['type' => 'veg supreme', 'base' => 'thin & crispy']
        // ];

        // $pizzas = Pizza::all();
        // $pizzas = Pizza::orderBy('name', 'desc')->get();
        // $pizzas = Pizza::where('type', 'hawaiian')->get();
        $pizzas = Pizza::latest()->get();

        return view('pizzas.index', [
            'pizzas' => $pizzas
        ]);
        // return 'pizzas'; //plain text
        // return ['name' => 'veg pizza', 'base' => 'classic']; //json
    }

    public function show($id)
    {
        // use the $id variable to query the db for a record

        $pizza = Pizza::findOrFail($id);

        return view('pizzas.show', ['pizza' => $pizza]);
    }

    public function create()
    {
        return view('pizzas.create');
    }

    public function store()
    {
        $pizza = new Pizza();

        $pizza->name = request('name');
        $pizza->type = request('type');
        $pizza->base = request('base');
        $pizza->toppings = request('toppings');

        $pizza->save();

        return redirect('/')->with('msg', 'Thanks for you order');
    }

    public function destroy($id)
    {
        $pizza = Pizza::findOrFail($id);

        $pizza->delete();

        return redirect('/pizzas');
    }
}
