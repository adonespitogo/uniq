<?php

class EventsController extends ApiController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return Response::json($this->current_user()->events());
	}

	public function getByPage($page = 1, $limit = 10){
		$result = $this->current_user()->events($page, $limit);
		Paginator::make($result[0], $result[1], $result[2]);
	}
	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::only('title', 'description', 'slug', 'start_datetime', 'end_datetime', 'venue');
		$happening = Happening::create($input);
		$attachment = Attachment::create(['attachable_type'=>'Happening', 'attachable_id'=>$happening->id, 'file'=>Input::file('file')]);
		return Response::make('', 200);
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		return Response::json(Happening::find($id));
	}

	public function getComments($id){
		return Response::json(Happening::find($id)->comments);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$input = Input::only('title', 'description', 'slug', 'start_datetime', 'end_datetime', 'venue');
		$happening = Happening::find($id);
		$happening->update($input);
		return Response::make('', 200);
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Happening::find($id)->delete();
		return Response::make('', 200);
	}
	public function getMyEvents($id=0)
	{

	}
}
