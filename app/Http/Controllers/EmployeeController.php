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
		$employees = Employee::all();
		return view('employees', compact('employees'));
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
	public function store(EmployeeRequest $request)
	{
		$this->createEmployee($request);
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
	public function update(Employee $employee, EmployeeRequest $request)
	{
		$employee->update($request->all());
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
		$employee->delete();
		return redirect('employees');
	}

	private function createEmployee(EmployeeRequest $request)
	{
		$employee = Auth::user()->employee()->create($request->all());
		return $employee;
	}

}
