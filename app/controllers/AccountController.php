<?php

class AccountController extends ApiController {
  public function postSubscribedDates(){
    $from = Input::get('from');
    $to = Input::get('to');

    $this->current_user()->update(['notify_date_start'=>$from, 'notify_date_end'=>$to]);
    return Response::make('',200);
  }
}