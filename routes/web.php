<?php


use Illuminate\Support\Facades\Route;
use App\Models\Job;
use Illuminate\Http\Request;


Route::get('/', function () {
    return view('home');
});

// Index
Route::get('/jobs', function () {
    $jobs = Job::with('employer')->latest()->simplePaginate(perPage: 6);
    return view('jobs.index', [
        'jobs' => $jobs
    ]);
});

// Create
Route::get('/jobs/create', function () {
    return view('jobs.create');
});

// Show
Route::get('/jobs/{id}', function ($id) {
    $job = Job::find($id);

    return view('jobs.show', [
        'job' => $job
    ]);
});

// Store
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

// Edit
Route::get('/jobs/{id}/edit', function ($id) {
    $job = Job::find($id);

    return view('jobs.edit', [
        'job' => $job
    ]);
});

// Update
Route::patch('/jobs/{id}', function ($id, Request $request) {
    $request->validate([
        'title' => ['required', 'min:3'],
        'salary' => ['required']
    ]);

    //TODO: authorize...

    $job = Job::findOrFail($id);

    $job->update([
        'title' => request('title'),
        'salary' => request('salary')
    ]);

    return redirect('/jobs/' . $job->id);
});

// Destroy
Route::delete('/jobs/{id}', function ($id) {
    //TODO: authorize
    $job = Job::findOrFail($id)->delete();
    return redirect('/jobs');
});

Route::get('/contact', function () {
    return view('contact');
});
