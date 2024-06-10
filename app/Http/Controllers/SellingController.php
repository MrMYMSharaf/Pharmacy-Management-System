<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Selling;
use App\Models\Drug;

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
                'drug_id' => 'required|exists:drugs,id',
                'price' => 'required|numeric',
                'quantity' => 'required|integer|min:1',
                'selling_date' => 'required|date',
            ]);
    
            $drug = Drug::find($request->get('drug_id'));
    
            if ($drug->quantity < $request->get('quantity')) {
                return redirect()->back()->with('error', 'Not enough quantity available.');
            }
    
            $selling = new Selling([
                'drug_id' => $request->get('drug_id'),
                'price' => $request->get('price'),
                'quantity' => $request->get('quantity'),
                'selling_date' => $request->get('selling_date'),
                'total_price' => $request->get('price') * $request->get('quantity'),
            ]);
    
            $selling->save();
    
            // Update the drug quantity
            $drug->quantity -= $request->get('quantity');
            $drug->save();
    
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
            'drug_id' => 'required|exists:drugs,id',
            'price' => 'required|numeric',
            'quantity' => 'required|integer|min:1',
            'selling_date' => 'required|date',
        ]);
    
        $selling = Selling::find($id);
        $drug = Drug::find($request->get('drug_id'));
    
        // Revert the old quantity
        $oldQuantity = $selling->quantity;
        $drug->quantity += $oldQuantity;
    
        // Check if the new quantity is sufficient
        if ($drug->quantity < $request->get('quantity')) {
            return redirect()->back()->with('error', 'Not enough quantity available.');
        }
    
        // Update the selling record
        $selling->drug_id = $request->get('drug_id');
        $selling->price = $request->get('price');
        $selling->quantity = $request->get('quantity');
        $selling->selling_date = $request->get('selling_date');
        $selling->total_price = $request->get('price') * $request->get('quantity');
        $selling->save();
    
        // Update the drug quantity
        $drug->quantity -= $request->get('quantity');
        $drug->save();
    
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
