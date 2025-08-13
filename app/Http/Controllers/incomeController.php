<?php

namespace App\Http\Controllers;

use App\Models\Incomes;
use Illuminate\Http\Request;

class IncomeController extends Controller
{
    public function index()
    {
        $incomes = Incomes::orderBy('created_at', 'asc')->paginate(5);

        return view('income.index', compact('incomes'));
    }

    public function create()
    {
        return view('income.create');
    }

    // create new income

    public function store(Request $request){
        $validated = $request->validate([
        'title' => 'required|string|max:255',
        'amount' => 'required|numeric',
        'Rec_date' => 'required|date',
        'notes' => 'nullable|string',
        ]);

        Incomes::create($validated);

        return redirect()->route('income.index')->with('success', 'Income added successfully.');
    }

    // show details of single income
    
    // public function show($id)
    // {
    //     $income = Incomes::findOrFail($id);

    //     return view('income.show', [
    //         'income' => $income,
    //     ]);
    // }

    public function update(Request $request, $id){
    $validated = $request->validate([
        'title' => 'required|string|max:255',
        'amount' => 'required|numeric',
        'Rec_date' => 'required|date',
        'notes' => 'nullable|string',
    ]);

    $income = Incomes::findOrFail($id);
    $income->update($validated);

    return redirect()->route('income.index')->with('success', 'Income Updated successfully.');
    }

    public function destroy($id){

        $income = Incomes::findOrFail($id);
        $income->delete();

        return redirect()->route('income.index')->with('success', 'Income Deleted successfully.');
    }

}
