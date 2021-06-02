<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    //
    public function index()
    {
        
    }

    public function detail($id)
    {
        $company = Company::find($id);
        return view('companies.detail',compact('company'));

    }
}
