<?php
use LucaDegasperi\OAuth2Server\Authorizer;
class ApiController extends Controller {
  protected $authorizer;
  public function __construct(Authorizer $authorizer)
  {
      if (Agent::isMobile() || Agent::isTablet()){
        $this->authorizer = $authorizer;
        $this->beforeFilter('check-authorization-params');
      }else{
        $this->beforeFilter('auth');
      }
  }

  public function current_user(){
    if (Agent::isMobile() || Agent::isTablet()){
      return User::find(Authorizer::getResourceOwnerId());
    }else{
      return Auth::user();
    }
  }
}
