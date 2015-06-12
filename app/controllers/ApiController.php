<?php
use LucaDegasperi\OAuth2Server\Authorizer;
class ApiController extends Controller {
  protected $authorizer;
  public function __construct(Authorizer $authorizer)
  {
      if (Agent::isMobile() || Agent::isTablet() || Request::header('Authorization') != NULL){
        $this->authorizer = $authorizer;
        $this->beforeFilter('oauth');
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
