<?php

use App\Models\Employer;
use App\Models\Job;
use App\Models\User;
use Illuminate\Support\Facades\Mail;

it('renders jobs when only one category exists', function () {
    Job::factory()->create(['is_featured' => false]);
    $this->get('/')->assertOk();
});

it('authenticates and logs out an employer', function () {
    $user = User::factory()->create();
    $this->post('/login', ['email' => $user->email, 'password' => 'password'])->assertRedirect('/');
    $this->assertAuthenticatedAs($user);
    $this->delete('/logout')->assertRedirect('/');
    $this->assertGuest();
});

it('rejects incomplete job posts without sending mail', function () {
    Mail::fake();
    $employer = Employer::factory()->create();
    $this->actingAs($employer->user)->postJson('/jobs', ['title' => 'Engineer'])
        ->assertUnprocessable()->assertJsonValidationErrors(['salary', 'location', 'url', 'employment_type']);
    $this->assertDatabaseCount('jobs', 0);
    Mail::assertNothingQueued();
});
