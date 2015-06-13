<?php

class CategoriesController extends ApiController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
			    $categories_id = $this->current_user()->subscribed_categories()->get();
		        $all_categories =DB::table('categories')->get();
		        $returns = [];
		        $raw_cat_ids = [];
		        foreach ($categories_id as $key => $value) {
		        	array_push($raw_cat_ids, $value->id);
		        }
		        foreach ($all_categories as $key => $cat) {
		        	$item = (array)$cat;
		        	$item['followed'] = in_array($cat->id,$raw_cat_ids);
		        	array_push($returns,$item);
		        }
		      return Response::json($returns);

	}
   public function getMyCategories($value='')
   {
     	$categories = $this->current_user()->subscribed_categories()->get();
		if (count($categories) > 0){
			    $categories_id = $this->current_user()->subscribed_categories()->get();
		        $all_categories =DB::table('categories')->get();
		        $returns = [];
		        $raw_cat_ids = [];
		        foreach ($categories_id as $key => $value) {
		        	array_push($raw_cat_ids, $value->id);
		        }
		        foreach ($all_categories as $key => $cat) {
		        	$item = (array)$cat;
		        	$item['followed'] = in_array($cat->id,$raw_cat_ids);
		        	array_push($returns,$item);
		        }
		      return Response::json($returns);
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

	 public function getFollow($id=0)
    {
    	$data = DB::table('users_subscribed_categories')->where('user_id','=',$this->current_user()->id)->where('category_id','=',$id)->count();
        if( $data <= 0 )  DB::table('users_subscribed_categories')->insert(['user_id' => $this->current_user()->id,'category_id' => $id]);
        return Response::make('',200);
    }
    public function getUnFollow($id)
    {
    	 $data = DB::table('users_subscribed_categories')->where('user_id','=',$this->current_user()->id)->where('category_id','=',$id)->first();
        if( count($data) >= 1 )  DB::table('users_subscribed_categories')->where('user_id','=',$this->current_user()->id)->where('category_id','=',$id)->delete();

        return Response::make('',200);
    }



}
