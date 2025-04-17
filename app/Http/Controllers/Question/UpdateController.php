<?php

namespace App\Http\Controllers\Question;

use App\Http\Controllers\Controller;
use App\Models\Question;
use Illuminate\Http\RedirectResponse;

class UpdateController extends Controller
{
    public function __invoke(Question $question): RedirectResponse
    {
        abort_unless(user()->can('publish', $question), 403);

        $question->update([
            'draft' => false,
        ]);

        return back();
    }
}
