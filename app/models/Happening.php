<?php
class Happening extends Eloquent {
  protected $table = 'events';
	protected $fillable = ['title', 'description', 'slug', 'start_datetime', 'end_datetime', 'venue'];

  public function attachments()
  {
      return $this->morphTo("Attachment", "attachable");
  }

  public function categories(){
    return $this->belongsToMany('Category');
  }

  public function publisher(){
    return $this->belongsTo('User', 'user_id');
  }

  public function comments(){
    return $this->hasMany('Comment', 'event_id');
  }
}