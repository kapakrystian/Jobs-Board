<?php


use Illuminate\Support\Facades\Route;
use App\Models\Job;
use Illuminate\Http\Request;


Route::get('/', function () {
    return view('home');
});

Route::get('/jobs', function () {
    $jobs = Job::with('employer')->latest()->simplePaginate(perPage: 6);
    return view('jobs.index', [
        'jobs' => $jobs
    ]);
});

Route::get('/jobs/create', function () {
    return view('jobs.create');
});

Route::get('/jobs/{id}', function ($id) {
    $job = Job::find($id);

    return view('jobs.show', [
        'job' => $job
    ]);
});

Route::post('/jobs', function (Request $request) {
    $request->validate([
        'title' => ['required', 'min:3'],
        'salary' => ['required']
    ]);

    Job::create([
        'title' => request('title'),
        'salary' => request('salary'),
        'employer_id' => 4
    ]);

    return redirect('/jobs');
});

Route::get('/contact', function () {
    return view('contact');
});
