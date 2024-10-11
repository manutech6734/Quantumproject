<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use Illuminate\Support\Facades\File;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $employees = Employee::paginate(3);
        return view('employee.index', [
            'employees' => $employees
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('employee.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
        ]);

        if($request->has('profile_picture')){

            $file = $request->file('profile_picture');
            $extension = $file->getClientOriginalExtension();

            $filename = time().'.'.$extension;

            $path = 'storage/app/public';
            $file->move($path, $filename);
        }

        Employee::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'company_id' => $request->company_id,
            'email' => $request->email,
            'contact' => $request->contact,
            'profile_picture' => $path.$filename
        ]);

        return redirect('/employee')->with('status','New employee added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Employee $employee)
    {
        return view('employee.show', compact('employee'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Employee $employee)
    {
        return view('employee.edit', compact('employee'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Employee $employee)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
        ]);

        $employee = Employee::findOrFail($employee->employee_id);

        if($request->has('profile_picture')){

            $file = $request->file('profile_picture');
            $extension = $file->getClientOriginalExtension();

            $filename = time().'.'.$extension;

            $path = 'storage/app/public';
            $file->move($path, $filename);

            if(File::exists($employee->image)){
                File::delete($employee->image);
            }
        }

        $employee->update([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'contact' => $request->contact,
            'profile_picture' => $path.$filename
        ]);

        return redirect('/employee')->with('status','New employee updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Employee $employee)
    {
        $employee->delete();
        return redirect('/employee')->with('status', 'employee deleted successfully');
    }
}
