<?php

namespace App\Http\Controllers\Question;

use App\Http\Controllers\Controller;
use App\Models\{Question, User};
use Illuminate\Http\RedirectResponse;

class LikeQuestionController extends Controller
{
    public function __invoke(Question $question): RedirectResponse
    {
        /**
         * @var User $user
         */
        $user = auth()->guard()->user();
        $user->like($question);

        return back();
    }
}
