<?php

use App\Models\Job;
use App\Models\Employer;

test('a job belongs to an employer', function () {
    // arrange
    $employer = Employer::factory()->create();

    $job = Job::factory()->create([
        'employer_id' => $employer->id,
    ]);

    // act & assert
    expect($job->employer->is($employer))->toBe(true);
});

it('belongs to a user', function () {
    $employer = Employer::factory()->create();

    $job = Job::factory()->create([
        'employer_id' => $employer->id,
    ]);

    expect($job->user->is($employer->user))->toBe(true);
});

it('can have tags', function () {
    // arrange
    $job = Job::factory()->create();

    // act (interact with the code world that would be ideal)
    $job->tag('Frontend');

    // assert
    expect($job->tags)->toHaveCount(1);
});