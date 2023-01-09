<?php

namespace App\Http\Controllers;

use App\Http\Requests\TransportStoreRequest;
use App\Http\Requests\TransportUpdateRequest;
use Illuminate\Http\Request;
use App\Interfaces\ITransportRepository;


class TransportController extends Controller
{
	protected $transport;


	public function __construct(ITransportRepository $transport)
	{
		$this->transport = $transport;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		return $this->transport->getAllTransports();
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(TransportStoreRequest $request)
	{
		$transport = $request->only(
			"car_id",
			"start_province_id",
			"start_countie_id",
			"start_district_id",
			"finish_province_id",
			"finish_countie_id",
			"finish_district_id",
			"travellers",
			"start_date"
		);

		return $this->transport->createTransport($transport);
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id)
	{
		return $this->transport->getTransportById($id);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(TransportUpdateRequest $request, $id)
	{
		$transport = $request->only(
			"car_id",
			"start_province_id",
			"start_countie_id",
			"start_district_id",
			"finish_province_id",
			"finish_countie_id",
			"finish_district_id",
			"travellers",
			"start_date"
		);

		return $this->transport->updateTransportById($id, $transport);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id)
	{
		$this->transport->deleteTransportById($id);
	}
}
