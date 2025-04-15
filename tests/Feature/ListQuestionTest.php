<?php

use App\Models\{Question, User};

use function Pest\Laravel\{actingAs, get};

it('should list all the question', function () {

    // arrange
    $question = Question::factory()->count(5)->create();

    // act
    // acessor a rota
    actingAs(User::factory()->create());

    $response = get(route('dashboard'));

    /** @var Question $q */
    // assert

    foreach ($question as $q) {
        $response->assertSee($q->question);
    }

});
