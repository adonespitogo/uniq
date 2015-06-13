<?php

class AccountController extends ApiController {
  public function postSubscribedDates(){
    $num_days = Input::get('num_days');

    $this->current_user()->update(['number_of_days'=>$num_days]);
    return Response::make('',200);
  }
}