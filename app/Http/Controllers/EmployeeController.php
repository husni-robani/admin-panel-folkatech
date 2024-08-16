<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEmployeeRequest;
use App\Http\Requests\UpdateEmployeeRequest;
use App\Models\Company;
use App\Models\Employee;
use Illuminate\Http\Request;

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
        return view('employee.create', ['company_names' => Company::select(['id', 'name'])->orderBy('created_at', 'desc')->get()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreEmployeeRequest $request)
    {
        Employee::create($request->input());
        return redirect()->route('employees.index');
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
        return view('employee.edit', [
            'employee' => Employee::with(['company' => function($query) {
                $query->select(['id', 'name']);
            }])->findOrFail($id),
            'company_names' => Company::select(['id', 'name'])->orderBy('created_at', 'desc')->get()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEmployeeRequest $request, Employee $employee)
    {
        $employee->update($request->input());
        return redirect()->route('employees.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $employee = Employee::findOrFail($id);
        $employee->delete();
        return redirect()->route('employees.index');
    }
}
