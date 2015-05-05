<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Gig;
use Auth;
use App\Client;
use App\Package;
use App\Employee;
use App\Gear;
use Illuminate\Http\Request;

class GigController extends Controller {

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
		$gigs = Gig::orderBy('gig_date', 'ASC')->get();
		$clients = Client::all();
		$employees = Employee::all();
		$gears = Gear::all();
		$packages = Package::all();
		return view('gigs', compact('thisUser', 'gigs', 'clients', 'employees', 'gears', 'packages'));
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

		$gig = new Gig;
		$gig->user_id = Auth::id();
		$gig->gig_name = $request->add_gig_name;
		$gig->client_id = $request->add_gig_client;
		$gig->category = $request->edit_gig_category;
		$gig->service_package = $request->add_gig_package;
		$gig->gig_date = $request->add_gig_date;
		$gig->notes = $request->add_gig_notes;
		$gig->save();
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
