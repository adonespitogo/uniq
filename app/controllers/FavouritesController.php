<?php

class FavouritesController extends ApiController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        return Response::json(
			$this->current_user()->events()
		);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		 $event = Happening::find(Input::get('id'));
		 $this->current_user()->favourite_events()->save($event);
		 return Response::make('',200);
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
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$this->current_user()->favourite_events()->newPivotStatements(Input::get('id'))->delete();
		return Response::make('',200);
	}


}
