<?php

use App\Models\User;

use function Pest\Laravel\{actingAs, assertDatabaseCount, assertDatabaseHas, post};

it('should be able to create a new question bigger than 255 characters', function () {

    actingAs(User::factory()->create());

    $request = post(route('question.store'), [
        "question" => str_repeat('*', 255) . "?",
    ]);

    $request->assertRedirect(route('dashboard'));
    assertDatabaseCount('questions', 1);
    assertDatabaseHas('questions', ['question' => str_repeat('*', 255) . '?']);
});

it('should check if ends with question mark ?', function () {});

it('should have at least 10 characters', function () {
    actingAs(User::factory()->create());

    $request = post(route('question.store'), [
        "question" => str_repeat('*', 8) . "?",
    ]);

    $request->assertSessionHasErrors(['question' => __('validation.min.string', ['attribute' => 'question', 'min' => 10])]);
    assertDatabaseCount('questions', 0);
});
