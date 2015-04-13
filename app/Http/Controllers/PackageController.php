<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\PackageRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Package;
use Auth;

class PackageController extends Controller {


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
		$packages = Package::all();
		return view('packages', compact('packages'));
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
	public function store(PackageRequest $request)
	{
		$this->createPackage($request);
		return redirect('packages');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show(Package $package)
	{
		return view ('packageDetail')->with('package', $package);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit(Package $package)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(Package $package, PackageRequest $request)
	{
		$package->update($request->all());
		return redirect('packages');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy(Package $package)
	{
		$package->delete();
		return redirect('packages');
	}

	private function createPackage(PackageRequest $request)
	{
		$package = Auth::user()->package()->create($request->all());
		return $package;
	}

}
