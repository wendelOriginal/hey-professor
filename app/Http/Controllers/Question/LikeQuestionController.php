<?php

namespace App\Http\Controllers\Question;

use App\Http\Controllers\Controller;
use App\Models\{LikeQuestion, Question};
use Illuminate\Http\RedirectResponse;

class LikeQuestionController extends Controller
{
    public function __invoke(Question $question): RedirectResponse
    {
        LikeQuestion::query()->create(
            [
                'user_id'     => auth()->guard()->id(),
                'question_id' => $question->id,
                'like'        => 1,
                'unlike'      => 0,
            ]
        );

        return back();
    }
}
