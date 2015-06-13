<?php

class EventsController extends ApiController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index(){
		$result = $this->current_user()->events();
		return Response::json($result['allItems']);
	}
	public function getByPage($page = 1, $limit = 10){
		$result = $this->current_user()->events($page, $limit);
		return Paginator::make($result['items'], $result['itemTotal'], $result['page']);
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

	public function getMarkFavorite($id){
		$data = DB::table('users_favourite_events')->where(['user_id'=>$this->current_user()->id, 'event_id'=>$id])->count();
		if ($data <= 0) DB::table('users_favourite_events')->insert(['user_id'=>$this->current_user()->id, 'event_id'=>$id]);
		return Response::json('',200);
	}

	public function getUnmarkFavorite($id){
		DB::table('users_favourite_events')->where(['user_id'=>$this->current_user()->id, 'event_id'=>$id])->delete();
		return Response::json('',200);
	}

	public function getFavorites(){
		return Response::json($this->current_user()->favourite_events()->get());
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
}
