<?php

namespace App\Http\Controllers;

use App\Models\Incomes;
use Illuminate\Http\Request;

class IncomeController extends Controller
{
    public function index()
    {
        $incomes = Incomes::orderBy('created_at', 'asc')->get();

        return view('income.index', [
            'incomes' => $incomes,
        ]);
    }
    // create new income

    public function create(Request $request)
    {
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
    
    public function show($id)
    {
        $income = Incomes::findOrFail($id);

        return view('income.show', [
            'income' => $income,
        ]);
    }

    public function update(Request $request, $id)
{
    $validated = $request->validate([
        'title' => 'required|string|max:255',
        'amount' => 'required|numeric',
        'Rec_date' => 'required|date',
        'notes' => 'nullable|string',
    ]);

    $income = Incomes::findOrFail($id);
    $income->update($validated);

    flash()
    ->option('position', 'top-center')
    ->option('timeout', 3000)
    ->success('Income updated successfully!');

    return redirect()->route('income.show', $id);
}

}
