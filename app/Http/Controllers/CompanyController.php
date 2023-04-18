<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;

class CompanyController extends Controller
{
    public function index()
    {
        $companies = Company::paginate(10);
        return view('companies.index', ['companies' => $companies]);
    }

    public function create()
    {
        return view('companies.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'nullable|email',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'website' => 'nullable|url|max:255'
        ]);

        if ($request->hasFile('logo')) {
            $image = $request->file('logo');
            $name = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = storage_path('/app/public');
            $image->move($destinationPath, $name);
            $validatedData['logo'] = $name;
        }

        $company = Company::create($validatedData);

        return redirect('/companies')->with('success', 'Company has been added');
    }

    public function show(Company $company)
    {
        return view('companies.show', ['company' => $company]);
    }

    public function edit(Company $company)
    {
        return view('companies.edit', ['company' => $company]);
    }

    public function update(Request $request, Company $company)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'nullable|email',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            // we can use url instead of string to restricted more
            'website' => 'nullable|string|max:255'
        ]);

        if ($request->hasFile('logo')) {
            $image = $request->file('logo');
            $name = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = storage_path('/app/public');
            $image->move($destinationPath, $name);
            $validatedData['logo'] = $name;

            // Delete old logo
            $oldLogo = $company->logo;
            if ($oldLogo) {
                unlink(storage_path('/app/public/'.$oldLogo));
            }
        }

        $company->update($validatedData);

        return redirect('/companies')->with('success', 'Company has been updated');
    }

    public function destroy(Company $company)
    {
        $company->delete();
        return redirect('/companies')->with('success', 'Company has been deleted');
    }
}

