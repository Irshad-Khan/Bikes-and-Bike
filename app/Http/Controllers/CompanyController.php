<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CompanyController extends Controller
{

    /**
     * return all companies
     */
    public function index()
    {
        $companies = Company::latest()->paginate(5);
        return view('companies.index', compact('companies'));
    }

    /**
     * show company create form
     */
    public function create()
    {
        return view('companies.create');
    }

    /**
     * store company data in table
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'address' => 'required'
        ]);

        Company::create([
            'name' => $request->name,
            'address' => $request->address,
        ]);

        return redirect()->route('company.index')->with('status', 'Company Addedd Successfully!');
    }

    /**
     * show company data
     */
    public function show($id)
    {
        $company = Company::findOrFail($id);
        return view('companies.show', compact('company'));
    }

    /**
     * return compny record for update
     */
    public function edit($id)
    {
        $company = Company::findOrFail($id);
        return view('companies.edit', compact('company'));
    }

    /**
     * update company record
     */
    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'address' => 'required'
        ]);

        Company::findOrFail($request->id)->update([
            'name' => $request->name,
            'address' => $request->address
        ]);
        return redirect()->route('company.index')->with('status', 'Company updated Successfully!');
    }

    /**
     * delete company
     */
    public function delete($id)
    {
        $company = Company::findOrFail($id);

        $company->vehicles()->delete();
        $company->delete();
        return redirect()->back()->with('status', 'Company deleted successfully');
    }
}
