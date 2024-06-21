<?php

namespace Database\Seeders;

use App\Models\Job;
use App\Models\Tag;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class JobSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // $tags = Tag::factory(3)->create();
        // Job::factory(20)->hasAttached($tags)->create(new Sequence(
        //     ['is_featured' => false],
        //     ['is_featured' => true]
        // ));

        $jobs = Job::factory(20)->state(new Sequence(
            ['is_featured' => false],
            ['is_featured' => true]
        ))->create();

        $tags = Tag::factory(15)->create();
        foreach ($jobs as $job) {
            $randomTags = $tags->random(rand(0, 3))->pluck('id')->toArray();
            $job->tags()->attach($randomTags);
        }
    }
}