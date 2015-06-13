<?php
class Happening extends Eloquent {
  protected $table = 'events';
	protected $fillable = ['title', 'description', 'slug', 'start_datetime', 'end_datetime', 'venue'];

  public function toArray()
  {
      $array = parent::toArray();
      $array['categories'] = $this->categories;
      return $array;
  }
  public function attachments()
  {
      return $this->morphTo("Attachment", "attachable");
  }

  public function categories(){
    return $this->belongsToMany('Category', 'events_categories', 'category_id', 'event_id');
  }

  public function publisher(){
    return $this->belongsTo('User', 'user_id');
  }

  public function comments(){
    return $this->hasMany('Comment', 'event_id');
  }
}