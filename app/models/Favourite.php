<?php

class Favourite extends Eloquent  {
  protected $table = 'un_favourites';
  protected $fillable=['event_id','user_id'];
}
