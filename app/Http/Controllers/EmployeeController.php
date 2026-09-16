<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $employees = Employee::orderBy('id', 'Desc')->simplePaginate(14);

        return view("dashboard", compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('employees.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title'      => 'required',
            'address'      => 'required',
            'description'=> 'required',
            'salary'     => 'required',
            'department' => 'required',
        ]);

        Employee::create($validated);

        return redirect()->route('dashboard')->with('success', 'Employee created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Employee $employee)
    {
        return view('employees.show', compact('employee'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Employee $employee)
    {
        return view('employees.edit', compact('employee'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Employee $employee)
    {
        $validated = $request->validate([
        'title'       => 'required|string|max:255',
        'description' => 'nullable|string',
        'department'  => 'required|string|max:255',
        'salary'       => 'required|numeric|min:0',
        'address'     => 'nullable|string|max:255',
    ]);

        $employee->update($validated);
        return redirect()->route('employees.show', $employee->id)->with('success', 'Employee updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $employee = Employee::find($id);
        $employee->delete();
        return redirect()->route("dashboard")->with('success', 'User Deleted Successfully');
    }
}
