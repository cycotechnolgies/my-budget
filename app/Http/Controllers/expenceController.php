<?php

namespace App\Http\Controllers;

use App\Models\Expenses;
use Illuminate\Http\Request;

class expenceController extends Controller
{
    
    public function index()
    {
       $expenses = Expenses::orderBy('created_at', 'asc')->paginate(5);

        $totalexpence = Expenses::sum('amount');

        return view('expences.index', compact('expenses', 'totalexpence'));
    }

   
    public function create()
    {
         return view('expences.create');
    }

    
    public function store(Request $request){
        $validated = $request->validate([
        'title' => 'required|string|max:255',
        'amount' => 'required|numeric',
        'Rec_date' => 'required|date',
        'notes' => 'nullable|string',
        ]);

        Expenses::create($validated);

        return redirect()->route('expences.index')->with('success', 'Expences added successfully.');
    }

    
    public function show(Expenses $Expenses)
    {
        //
    }

    
    public function edit(Expenses $Expenses)
    {
        //
    }

    public function update(Request $request, $id){
    $validated = $request->validate([
        'title' => 'required|string|max:255',
        'amount' => 'required|numeric',
        'Rec_date' => 'required|date',
        'notes' => 'nullable|string',
    ]);

    $income = Expenses::findOrFail($id);
    $income->update($validated);

    return redirect()->route('expences.index')->with('success', 'Expences Updated successfully.');
    }

    public function destroy($id){

        $income = Expenses::findOrFail($id);
        $income->delete();

        return redirect()->route('expences.index')->with('success', 'Expences Deleted successfully.');
    }
}
