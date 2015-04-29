<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Client;
use Auth;
use DB;

class ClientController extends Controller {


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
		$clients = Client::orderBy('name', 'ASC')->get();
		return view('clients', compact('clients', 'thisUser'));
	}
	public function index2()
	{
		$thisUser = Auth::user();
		$clients = Client::orderBy('address', 'ASC')->get();
		return view('clients', compact('clients', 'thisUser'));
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
		$client = new Client;
		$client->user_id = Auth::id();
		$client->name = $request->add_client_name;
		$client->email = $request->add_client_email;
		$client->phone = $request->add_client_phone;
		$client->address = $request->add_client_location;
		$client->save();

		return redirect('clients');
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
	public function update(Client $client, Request $request)
	{
        $editedClient = $client;
        $editedClient->user_id = Auth::id();
        $editedClient->name = $request->edit_client_name;
        $editedClient->email = $request->edit_client_email;
        $editedClient->phone = $request->edit_client_phone;
        $editedClient->address = $request->edit_client_location;
        $editedClient->save();

        return redirect('clients');
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

    public function delete(Client $client, Request $request)
    {
        $uri = $request->url();
        $toRemove = 'http://totalgig/clients/delete/';
        $clientId = str_replace($toRemove, '', $uri);
        DB::table('clients')->where('id', $clientId)->delete();
        return redirect('clients');
    }

}
