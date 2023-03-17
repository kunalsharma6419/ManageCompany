<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $companies = Company::paginate(10);
       return view('companies.index', compact('companies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('companies.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
{
    try {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'nullable|email',
            'logo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048|dimensions:min_width=100,min_height=100',
            'website' => 'nullable|url',
        ]);

        // Store the company logo in the storage/app/public directory
        $logoPath = $request->file('logo')->store('public');

        // Create a new company instance and save it to the database
        $company = new Company;
        $company->name = $validatedData['name'];
        $company->email = $validatedData['email'];
        $company->logo = $logoPath;
        $company->website = $validatedData['website'];
        $company->save();

        return redirect()->route('company.create');
    } catch (\Exception $e) {
        return redirect()->back()->withInput()->withErrors(['error' => 'An error occurred while saving the company. Please try again later.']);
    }
}


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $company = Company::find($id);
        return view('companies.edit',compact('company'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
    $company = Company::find($id);
     $request->validate([
            'name' => 'required|max:255',
            'email' => 'nullable|email',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048|dimensions:min_width=100,min_height=100',
            'website' => 'nullable|url',
        ]);

    $company->name = $request->name;
    $company->email = $request->email;
    $company->website = $request->website;
    if ($request->hasFile('logo')) {
        // Delete the old logo from storage
        Storage::delete($company->logo);

        // Store the new logo in the storage/app/public directory
        $logoPath = $request->file('logo')->store('public');

        // Update the company logo path in the database
        $company->logo = $logoPath;
    }

    $company->save();
    // return redirect()->back()->with('message','Product Details Updated Successfully');
    return redirect()->route('company.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $data=Company::find($id);

        $data->delete();

        return redirect()->back();
    }
}
