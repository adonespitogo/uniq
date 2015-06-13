<?php

class EventCategory extends Eloquent  {
  protected $table = 'un_events_categories';
  protected $fillable=['event_id','category_id'];
}
