<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\EmployeeRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Employee;
use Auth;

class EmployeeController extends Controller {


	public function __construct()
	{
		$this->middleware('auth');
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        $thisUser = Auth::user();
        $employees = Employee::orderBy('name', 'ASC')->get();
		return view('employees', compact('employees', 'thisUser'));
	}
    public function index2()
    {
        $thisUser = Auth::user();
        $employees = Employee::orderBy('job', 'ASC')->get();
        return view('employees', compact('employees', 'thisUser'));
    }
    public function index3()
    {
        $thisUser = Auth::user();
        $employees = Employee::orderBy('pay', 'ASC')->get();
        return view('employees', compact('employees', 'thisUser'));
    }
	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		$employee = new Employee;
		$employee->user_id = Auth::id();
        $employee->name = $request->add_employee_name;
        $employee->email = $request->add_employee_email;
        $employee->phone = $request->add_employee_phone;
        $employee->job_title = $request->add_employee_job;
        $employee->pay_rate = $request->add_employee_pay;
        $employee->save();

        return redirect('employees');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show()
	{

	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit(Employee $employee)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(Employee $employee, Request $request)
	{
        $editedEmployee = $employee;
        $editedEmployee->user_id = Auth::id();
        $editedEmployee->name = $request->edit_employee_name;
        $editedEmployee->email = $request->edit_employee_email;
        $editedEmployee->phone = $request->edit_employee_phone;
        $editedEmployee->job_title = $request->edit_employee_job_title;
        $editedEmployee->pay_rate = $request->edit_employee_pay;
        $editedEmployee->save();

		return redirect('employees');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy(Employee $employee)
	{
		//
	}

    public function delete(Employee $employee, Request $request)
    {
        $uri = $request->url();
        $toRemove = 'http://totalgig/employees/delete/';
        $employeeId = str_replace($toRemove, '', $uri);
        DB::table('employees')->where('id', $employeeId)->delete();
        return redirect('employees');
    }

}
