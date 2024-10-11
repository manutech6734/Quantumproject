<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;
use Illuminate\Support\Facades\File;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $companies = Company::paginate(3);
        return view('company.index', [
            'companies' => $companies
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('company.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        if($request->has('image')){

            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();

            $filename = time().'.'.$extension;

            $path = 'storage/app/public';
            $file->move($path, $filename);
        }


        Company::create([
            'name' => $request->name,
            'email' => $request->email,
            'image' => $path.$filename
        ]);

        return redirect('/company')->with('status','New Company added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Company $company)
    {
        return view('company.show', compact('company'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Company $company)
    {
        return view('company.edit', compact('company'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Company $company)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $company = Company::findOrFail($company->company_id);

        if($request->has('image')){

            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();

            $filename = time().'.'.$extension;

            $path = 'storage/app/public';
            $file->move($path, $filename);

            if(File::exists($company->image)){
                File::delete($company->image);
            }
        }

        $company->update([
            'name' => $request->name,
            'email' => $request->email,
            'image' => $path.$filename
        ]);

        return redirect('/company')->with('status','New Company updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Company $company)
    {
        $company->delete();
        return redirect('/company')->with('status', 'Company deleted successfully');
    }
}
