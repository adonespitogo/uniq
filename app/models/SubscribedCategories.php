<?php

class SubscribedCategories extends \Eloquent {
	protected $table = 'un_subscribed_categories';
	protected $fillable = ['user_id','category_id'];
}