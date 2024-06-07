<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Drug;
use App\Models\Agent;
use Illuminate\Http\RedirectResponse;
use Illuminate\Validation\Rule;

class DrugController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $drugs = Drug::all();
        return view('drugs.drugs',compact('drugs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $agents = Agent::all();
        return view('drugs.drugs_add', compact('agents'));
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
        'name' => 'required|string|max:255',
        'description' => 'nullable|string',
        'quantity' => 'required|integer',
        'agent_id' => 'required|exists:_agents,id',
        'expiry_date' => 'required|date',
        'price' => 'required|numeric',
        'discount' => 'nullable|numeric',
        'actual_price' => 'required|numeric',
    ]);

    Drug::create($request->all());
    return redirect()->route('drugs.index')->with('success', 'Drug created successfully.');
}

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $drug = Drug::with('agent')->findOrFail($id); // Eager load the agent
    return view('drugs.drugs_view', compact('drug'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
            $drug = Drug::findOrFail($id);
            $agents = Agent::all();
            return view('drugs.drug_edit', compact('drug', 'agents'));
        
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Drug $drug): RedirectResponse
    {
        $request->validate([
            'name' => 'required|string|max:255',
        'description' => 'nullable|string',
        'quantity' => 'required|integer',
        'agent_id' => 'required|exists:_agents,id',
        'expiry_date' => 'required|date',
        'price' => 'required|numeric',
        'discount' => 'nullable|numeric',
        'actual_price' => 'required|numeric',
        ]);

        $drug->update($request->all());

        return redirect()->route('drugs.index')->with('success', 'Drug updated successfully.');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $drug = Drug::findOrFail($id);
        return view('drugs.drug_delete', compact('drug'));
    }

    public function destroy(Drug $drug): RedirectResponse
    {
        $drug->delete();
         
        return redirect()->route('drugs.index')
                        ->with('success','Product deleted successfully');
    }
}
