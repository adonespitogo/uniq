<?php

class UserSubscribedCategory extends \Eloquent {
	protected $table = 'subscribed_categories_Table';
	protected $fillable = ['user_id','category_id',];

  public function category(){
    return belongsTo('Category');
  }
  public function events(){
    return hasManyThough('Event', 'Category');
  }
}