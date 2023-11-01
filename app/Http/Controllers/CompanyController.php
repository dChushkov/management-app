<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CompanyController extends Controller
{
    public function index()
    {
        $companies = Company::paginate(10);
        return view('companies.index', compact('companies'));
    }

    public function create()
    {
        return view('companies.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'address' => 'nullable',
            'email' => 'nullable|email',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048|dimensions:min_width=100,min_height=100',
            'website' => 'nullable',
        ]);

        $data = $request->except('_token');

        if ($request->hasFile('logo')) {
            $logoPath = $request->file('logo')->store('public/logos');
            $data['logo'] = $logoPath;
        }

        Company::create($data);

        return redirect()->route('companies.index')->with('success', 'Company created successfully.');
    }

    public function edit($id)
    {
        $company = Company::findOrFail($id);

        return view('companies.edit', compact('company'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'address' => 'nullable',
            'email' => 'nullable|email',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048|dimensions:min_width=100,min_height=100',
            'website' => 'nullable',
        ]);
    
        $company = Company::findOrFail($id);
        $data = $request->except(['_token', '_method']);
    
        if ($request->hasFile('logo')) {
            // Check if the company has a logo before deleting it
            if ($company->logo) {
                Storage::delete($company->logo); // Delete the old logo
            }
    
            $logoPath = $request->file('logo')->store('public/logos');
            $data['logo'] = $logoPath;
        }
    
        $company->update($data);
    
        return redirect()->route('companies.index')->with('success', 'Company updated successfully.');
    }
    

    public function show($id)
    {
        $company = Company::findOrFail($id);

        return view('companies.show', compact('company'));
    }

    public function destroy($id)
    {
        $company = Company::findOrFail($id);
    
        if (!is_null($company->logo)) {
            Storage::delete($company->logo); // Delete the logo file
        }
    
        $company->delete();
    
        return redirect()->route('companies.index')->with('success', 'Company deleted successfully.');
    }

}


