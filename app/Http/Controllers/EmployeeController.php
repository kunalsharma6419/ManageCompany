<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\Company;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = Employee::with('company')->paginate(10);
       return view('employees.index', compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $companies = Company::all();
        return view('employees.create', compact('companies'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'gender' => 'nullable|in:male,female,other',
            'mobile' => 'required',
            'email' => 'nullable|email',
            'company_id' => 'required|exists:companies,id'
        ]);

        $employee = new Employee;
        $employee->first_name = $validatedData['first_name'];
        $employee->last_name = $validatedData['last_name'];
        $employee->gender = $validatedData['gender'];
        $employee->mobile = $validatedData['mobile'];
        $employee->email = $validatedData['email'];
        $employee->company_id = $validatedData['company_id'];
        $employee->save();

        return redirect()->route('employee.create');
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
        $employee = Employee::findOrFail($id);
        $companies = Company::all();
        return view('employees.edit', compact('employee', 'companies'));
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
        $employee = Employee::find($id);
            $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'gender' => 'nullable|in:male,female,other',
            'mobile' => 'required|string|max:255',
            'email' => 'nullable|string|email|max:255',
            'company_id' => 'required|exists:companies,id',
            'status' => 'nullable|boolean',
        ]);

        $employee->first_name = $request['first_name'];
        $employee->last_name = $request['last_name'];
        $employee->gender = $request['gender'];
        $employee->mobile = $request['mobile'];
        $employee->email = $request['email'];
        $employee->company_id = $request['company_id'];
        $employee->status = $request['status'];
        
        $employee->save();

        return redirect()->route('employee.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data=Employee::find($id);

        $data->delete();

        return redirect()->back();
    }
}
