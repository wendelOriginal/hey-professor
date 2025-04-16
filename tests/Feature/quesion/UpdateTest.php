<?php

use App\Models\{Question, User};

it('creating put to put the question in the list', function () {
    $user     = User::factory()->create();
    $question = Question::factory()->create();

    $this->actingAs($user);

    $this->put(route('question.update', [
        'question' => $question,
    ]))->assertRedirect();

    $question->refresh();

    expect($question->draft)->toBeFalse();
});
