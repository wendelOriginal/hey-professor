<?php

namespace App\Http\Controllers\Question;

use App\Http\Controllers\Controller;
use App\Models\{Question, User};
use Illuminate\Http\RedirectResponse;

class LikeQuestionController extends Controller
{
    public function __invoke(Question $question): RedirectResponse
    {

        User::findOrFail(auth()->guard()->id())->likeQuestion()->create(
            [
                'question_id' => $question->id,
                'like'        => 1,
                'unlike'      => 0,
            ]
        );

        return back();
    }
}
