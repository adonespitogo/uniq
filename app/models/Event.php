<?php
use LaravelBook\Ardent\Ardent;
class Event extends Ardent {
	protected $fillable = ['title', 'description', 'slug', 'start_datetime', 'end_datetime', 'venue'];

  public function attachments()
  {
      return $this->morphTo("Attachment", "attachable");
  }

  public function categories(){
    return $this->belongsToMany('Category');
  }
}