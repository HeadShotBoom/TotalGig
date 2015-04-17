<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\GearRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Gear;
use App\User;
use Auth;

class GearController extends Controller {


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
		$gears = Gear::all();
		return view('gear', compact('thisUser', 'gears'));
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
	public function store(GearRequest $request)
	{
		$this->createGear($request);
		return redirect('gear');
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
	public function edit(Gear $gear)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(Gear $gear, GearRequest $request)
	{
		$gear->update($request->all());
		return redirect('gear');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy(Gear $gear)
	{
		$gear->delete();
		return redirect('gear');
	}

	private function createGear(GearRequest $request)
	{
		$gear = Auth::user()->gear()->create($request->all());
		return $gear;
	}

}
