<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Selling;

class SellingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sellings = Selling::all();
        return view('sellings.selling', compact('sellings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('sellings.selling_add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'drug_id' => 'required',
            'price' => 'required|numeric',
            'quantity' => 'required|integer',
            'selling_date' => 'required|date',
        ]);

        $selling = new Selling([
            'drug_id' => $request->get('drug_id'),
            'price' => $request->get('price'),
            'quantity' => $request->get('quantity'),
            'selling_date' => $request->get('selling_date'),
            'total_price' => $request->get('price') * $request->get('quantity'),
        ]);

        $selling->save();
        return redirect('/sellings')->with('success', 'Selling record created successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $selling = Selling::find($id);
        return view('sellings.edit', compact('selling'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'drug_id' => 'required',
            'price' => 'required|numeric',
            'quantity' => 'required|integer',
            'selling_date' => 'required|date',
        ]);

        $selling = Selling::find($id);
        $selling->drug_id = $request->get('drug_id');
        $selling->price = $request->get('price');
        $selling->quantity = $request->get('quantity');
        $selling->selling_date = $request->get('selling_date');
        $selling->total_price = $request->get('price') * $request->get('quantity');
        $selling->save();

        return redirect('/sellings')->with('success', 'Selling record updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $selling = Selling::find($id);
        $selling->delete();

        return redirect('/sellings')->with('success', 'Selling record deleted successfully.');
    }
}
