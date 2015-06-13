<?php

class CommentsController extends ApiController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return Response::json(
			$this->current_user()->comments
		);
	}



	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::only('event_id','content');
		$comment = Comment::create($input);
		$comment->user_id = $this->current_user()->id;
		$comment->save();
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
		return Response::json(Comment::find($id));
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
		$input = Input::only('event_id','content','user_id');
		$comment = Comment::find(Input::get('id'));
		$comment->event_id = $input['event_id'];
		$comment->content = $input['content'];
		$comment->user_id = $input['user_id'];
		$comment->save();
		return Response::json('ok');
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Comment::find($id)->delete();
		return Response::make('', 200);
	}


}
