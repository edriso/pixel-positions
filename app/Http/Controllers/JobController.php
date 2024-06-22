<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\Tag;
use App\Mail\JobPosted;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use App\Enums\EmploymentType;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jobs = Job::latest()
            ->with(['employer', 'tags'])
            ->get()
            ->groupBy('is_featured');

        return view('jobs.index', [
            'featured_jobs' => $jobs[1],
            'regular_jobs' => $jobs[0],
            'tags' => Tag::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('jobs.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $attributes = $request->validate([
            'title' => ['required'],
            'salary' => ['required'],
            'location' => ['required'],
            // 'employment_type' => ['required', Rule::in(EmploymentType::class)],
            'employment_type' => ['required', Rule::in(array_column(EmploymentType::cases(), 'value'))],
            'url' => ['required', 'active_url'],
            'tags' => ['nullable'],
        ]);

        $attributes['is_featured'] = $request->has('is_featured');

        $job = Auth::user()->employer->jobs()->create(Arr::except($attributes, 'tags'));

        // if (!empty($attributes['tags'])) {
        if ($attributes['tags']) {
            foreach (explode(',', $attributes['tags']) as $tag) {
                $job->tag($tag);
            }
        }

        Mail::to($job->employer->user)->queue(new JobPosted($job));

        return redirect('/');
    }

    /**
     * Display the specified resource.
     */
    public function show(Job $job)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Job $job)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Job $job)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Job $job)
    {
        //
    }
}
