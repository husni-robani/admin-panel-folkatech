<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCompanyRequest;
use App\Http\Requests\UpdateCompanyRequest;
use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('company.index', [
            'companies' => Company::select(['id', 'name', 'email', 'link', 'logo_path'])->orderBy('created_at', 'desc')->paginate(10)
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
    public function store(StoreCompanyRequest $request)
    {
//        store logo
        $logo_path = $request->file('logo')->store('company', 'public');

//        store data to database
        Company::create([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'link' => $request->get('website'),
            'logo_path' => $logo_path
        ]);
        return redirect()->route('companies.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('company.edit', ['company' => Company::findOrFail($id)]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCompanyRequest $request, Company $company)
    {
//        if new logo is existed
        if ($request->hasFile('logo')){
            $new_logo_path = $request->file('logo')->store('company', 'public');
            $company->logo_path = $new_logo_path;
            $company->save();
        }
//        update company
        $company->update([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'link' => $request->get('website')
        ]);

        return redirect()->route('companies.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $company = Company::findOrFail($id);
        $company->delete();
        return redirect()->route('companies.index');
    }
}
