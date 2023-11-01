<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\Company;

class EmployeeController extends Controller
{
    public function index()
    {
        // Retrieve and paginate the list of employees
        $employees = Employee::paginate(10);

        return view('employees.index', compact('employees'));
    }

    public function create()
    {
        $companies = Company::all();
        return view('employees.create', compact('companies'));
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'first_name' => 'required',
            'last_name' => 'required',
            'company_id' => 'required',
            'email' => 'email',
            'phone' => 'nullable',
        ]);
    
        $employee = new Employee;
        $employee->first_name = $request->input('first_name');
        $employee->last_name = $request->input('last_name');
        $employee->company_id = $request->input('company_id');
        $employee->email = $request->input('email');
        $employee->phone = $request->input('phone');
    
        $employee->save();
    
        return redirect()->route('employees.index')->with('success', 'Employee created successfully.');
    }

    public function show($id)
    {
        $employee = Employee::findOrFail($id);
        return view('employees.show', compact('employee'));
    }

    public function edit($id)
    {
        $employee = Employee::findOrFail($id);
        $companies = Company::all(); // Retrieve the list of companies
        return view('employees.edit', compact('employee', 'companies'));
    }
    public function update(Request $request, $id)
    {
        // Validate the request data
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'company_id' => 'required',
            'email' => 'email',
            'phone' => 'nullable',
        ]);
    
        // Find the employee by ID
        $employee = Employee::findOrFail($id);
    
        // Update the employee's information
        $employee->update([
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'company_id' => $request->input('company_id'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
        ]);
    
        return redirect()->route('employees.index')->with('success', 'Employee updated successfully.');
    }

    public function destroy($id)
    {
        $employee = Employee::findOrFail($id);
        $employee->delete();

        return redirect()->route('employees.index')->with('success', 'Employee deleted successfully.');
    }
}
