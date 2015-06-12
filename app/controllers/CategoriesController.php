<?php

class CategoriesController extends ApiController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$categories = $this->current_user()->subscribed_categories;
		if (count($categories) > 0){
			return Response::json($categories);
		}else{
			return Response::json([]);
		}

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
		$input = Input::only('name','description','slug','restricted');
		Category::create($input);
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
		//
	}


	public function getAll(){
		return Response::json(Category::all());
	}

	public function getEvents($category_id){
		$category = Category::find($category_id);
		if (count($category->events) > 0){
			return Response::json($category->events);
		}else{
			return Response::json([]);
		}
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
		Category::find(Input::get('id'))->delete();
		return Response::make('', 200);
	}


}
