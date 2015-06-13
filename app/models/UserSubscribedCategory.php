<?php

class UserSubscribedCategory extends \Eloquent {
	protected $table = 'subscribed_categories_Table';
	protected $fillable = ['user_id','category_id',];
}