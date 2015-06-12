<?php

class Category extends \Eloquent {
	protected $table = 'un_categories';
	protected $fillable = ['name','description','slug','restricted'];

  public function events(){
    return $this->belongsToMany('Event');
  }
}