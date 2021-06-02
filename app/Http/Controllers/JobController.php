<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\Company;
use Illuminate\Http\Request;

class JobController extends Controller
{
    //
    public function index()
    {
        $jobs = Job::all();
        return view('jobs.index',compact('jobs'));
    }

    public function detail($id)
    {
        $job = Job::find($id);
        return view('jobs.detail',compact('job'));

    }
}
