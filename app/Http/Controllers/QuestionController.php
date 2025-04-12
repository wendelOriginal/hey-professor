<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Http\{RedirectResponse};

class QuestionController extends Controller
{
    public function store(): RedirectResponse
    {

        request()->validate([
            'question' => 'required',
        ]);
        Question::query()->create([
            'question' => request()->question,
        ]);

        return to_route('dashboard');
    }

}
