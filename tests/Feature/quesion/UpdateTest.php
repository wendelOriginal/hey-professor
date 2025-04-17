<?php

use App\Models\{Question, User};

it('creating put to put the question in the list', function () {
    $user     = User::factory()->create();
    $question = Question::factory()->for($user, 'createdBy')->create();
    $this->actingAs($user);

    $this->put(route('question.update', [
        'question' => $question,
    ]))->assertRedirect();

    $question->refresh();

    expect($question->draft)->toBeFalse();
});

it('authorization to post the question in this case only the owner can publish', function () {
    $user     = User::factory()->create();
    $userFake = User::Factory()->create();
    $question = Question::factory()->for($user, 'createdBy')->create();
    $this->actingAs($userFake);

    $this->put(route('question.update', [
        'question' => $question,
    ]))
        ->assertStatus(403);
});

it('passing authorized', function () {
    $user     = User::factory()->create();
    $question = Question::factory()->for($user, 'createdBy')->create();
    $this->actingAs($user);

    $this->put(route('question.update', [
        'question' => $question,
    ]))
        ->assertRedirect();

    $question->refresh();

    expect($question->draft)->toBeFalse;
});
