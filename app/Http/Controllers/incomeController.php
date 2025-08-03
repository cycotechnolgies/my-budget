<?php

namespace App\Http\Controllers;

use App\Models\Incomes;
use Illuminate\Http\Request;

class incomeController extends Controller
{
    public function index()
    {
        $incomes = Incomes::orderBy('created_at', 'desc')->get();

        return view('income', [
            'incomes' => $incomes,
        ]);
    }
}
