<?php

namespace App\Http\Controllers;

use App\Models\Tag;

class TagController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Tag $tag)
    {
        return view('jobs.results', ['jobs' => $tag->jobs->load(['employer', 'tags'])]);
        // // Notice when to use load() vs with()
        // return view('jobs.results', ['jobs' => $tag->jobs()->with(['employer', 'tags'])->get()]);
    }
}