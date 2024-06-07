<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Agent;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Validation\Rule;

class AgentController extends Controller
{
    /**
     * Display a listing of the agents.
     *
     * @return \Illuminate\View\View
     */
    public function index(): View
    {
        $agents = Agent::all();
        return view('agents.index', compact('agents'));
    }

    /**
     * Show the form for creating a new agent.
     *
     * @return \Illuminate\View\View
     */
    public function create(): View
    {
        return view('agents.agents_add');
    }

    /**
     * Store a newly created agent in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'company_name' => 'required|string|max:255',
            'phone' => 'nullable|string|max:20',
            'email' => 'required|string|email|max:255|unique:_agents',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
        ]);

        $input = $request->all();

        if ($image = $request->file('image')) {
            $destinationPath = 'images/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        }

        Agent::create($input);

        return redirect()->route('agents.index')
                        ->with('success', 'Agent created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $agent = Agent::findOrFail($id);
        return view('agents.agents_view', compact('agent'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $agent = Agent::findOrFail($id);
        return view('agents.agents_edit', compact('agent'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Agent $agent): RedirectResponse
{
    $request->validate([
        'name' => 'required|string|max:255',
        'company_name' => 'required|string|max:255',
        'phone' => 'nullable|string|max:20',
        'email' => [
            'required',
            'string',
            'email',
            'max:255',
            Rule::unique('_agents')->ignore($agent->id),
        ],
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);

        $input = $request->all();

        if ($image = $request->file('image')) {
            $destinationPath = 'images/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        } else {
            unset($input['image']);
        }

        $agent->update($input);

        return redirect()->route('agents.index')
                        ->with('success', 'Agent updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
{
    $agent = Agent::findOrFail($id);
    return view('agents.agents_delete', compact('agent'));
}

public function destroy($id): RedirectResponse
{
    $agent = Agent::findOrFail($id);
    $agent->delete();

    return redirect()->route('agents.index')
                    ->with('success', 'Agent deleted successfully.');
}

}
