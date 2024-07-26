<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Job;


class JobController extends Controller
{
    public function index()
    {
        $jobs = Job::with('employer')->latest()->simplePaginate(perPage: 5);
        return view('jobs.index', [
            'jobs' => $jobs
        ]);
    }

    public function show(Job $job)
    {
        return view('jobs.show', [
            'job' => $job
        ]);
    }

    public function create()
    {
        return view('jobs.create');
    }

    public function store(Job $job, Request $request)
    {
        //TODO: authorize

        $request->validate([
            'title' => ['required', 'min:3'],
            'salary' => ['required']
        ]);

        $job->create([
            'title' => request('title'),
            'salary' => request('salary'),
            'employer_id' => 6
        ]);

        return redirect('/jobs');
    }

    public function update(Job $job, Request $request)
    {
        //TODO: authorize

        $request->validate([
            'title' => ['required', 'min:3'],
            'salary' => ['required']
        ]);

        $job->update([
            'title' => request('title'),
            'salary' => request('salary')
        ]);

        return redirect('/jobs/' . $job->id);
    }

    public function edit(Job $job)
    {
        return view('jobs.edit', [
            'job' => $job
        ]);
    }

    public function destroy(Job $job)
    {
        $job->delete();
        return redirect('/jobs');
    }
}
