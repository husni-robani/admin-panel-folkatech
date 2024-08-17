<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEmployeeRequest;
use App\Http\Requests\UpdateEmployeeRequest;
use App\Mail\EmployeeAdded;
use App\Models\Company;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $employees = Employee::with(['company' => function($query) {
            $query->select('id', 'name', 'logo_path');
        }])->orderBy('created_at', 'desc')->paginate(10);

        return view('employee.index', [
            'employees' => $employees
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('employee.create', ['company_names' => Company::getCompanyNames()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreEmployeeRequest $request)
    {
        $employee = Employee::create($request->validated());
        Mail::to('admin@folkatech.com')->send(new EmployeeAdded($employee));
        return redirect()->route('employees.index')->with('message', 'Employee added successfully');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $employee = Employee::with(['company' => function($query) {
            $query->select(['id', 'name']);
        }])->findOrFail($id);

        return view('employee.edit', [
            'employee' => $employee,
            'company_names' => Company::getCompanyNames()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEmployeeRequest $request, Employee $employee)
    {
        $employee->update($request->validated());
        return redirect()->route('employees.index')->with('message', 'Employee updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $employee = Employee::findOrFail($id);
        $employee->delete();
        return back()->with('message', 'Employee deleted successfully');
    }
}
