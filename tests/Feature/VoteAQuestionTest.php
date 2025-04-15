<?php

use App\Models\{Question, User};

use function Pest\Laravel\{actingAs, assertDatabaseHas, post};

it('should be able to like a question', function () {
    $user     = User::factory()->create();
    $question = Question::factory()->create();

    actingAs($user);

    post(route('question.like', $question))
        ->assertRedirect();

    assertDatabaseHas('like_questions', [
        'user_id'     => $user->id,
        'question_id' => $question->id,
        'like'        => 1,
        'unlike'      => 0,
    ]);
});

it('should allow only one like per user', function () {
    $user     = User::factory()->create();
    $question = Question::factory()->create();

    actingAs($user);

    post(route('question.like', $question), [
        'user_id'     => $user->id,
        'question_id' => $question->id,
    ]);
    post(route('question.like', $question), [
        'user_id'     => $user->id,
        'question_id' => $question->id,
    ]);
    post(route('question.like', $question), [
        'user_id'     => $user->id,
        'question_id' => $question->id,
    ]);
    post(route('question.like', $question), [
        'user_id'     => $user->id,
        'question_id' => $question->id,
    ]);

    expect(
        $user->likeQuestion()->where('user_id', $user->id)
            ->where('question_id', $question->id)
            ->get()
            ->count(1)
    )
        ->toBe(1);
});
