<?php

namespace LoginApp\Auth;

use LoginApp\Models\User;

class Auth
{
  // get the currently signed in user
  // i.e. is the user signed in?
  public function user()
  {
    //$user_id = ; // token i.e. user id
    $user = User::where('uuid', $_SESSION['user'])
    ->first();
    return $user;
  }

  // has the user been approved?
  public function isApproved() {
    $approvedUser = User::where('uuid', $_SESSION['user'])
    ->where('is_approved', '=', 1)
    ->where('is_deleted', '!=', 1)
    ->first();


    if(isset($approvedUser)) {
      return true;
    }
    return false;
  }

  // has the user been removed from the database?
  public function isDeleted() {
    $bannedUser = User::where('uuid', $_SESSION['user'])
    ->where('is_deleted', '=', 1)
    ->first();

    if(isset($bannedUser)) {
      return true;
    }
    return false;
  }

  // is the user signed in?
  public function check()
  {
    $user = $this->user();
    if(!isset($user)) {
      return false;
    }
    return isset($_SESSION['user']);
  }

  public function attempt($email, $password)
  {
    // grab the user by email
    $user = User::where('email', $email)->first();
    if(!$user) {
      return false;
    }

    if(password_verify($password, $user->password)) {
      $_SESSION['user'] = $user->uuid;
      return true;
    }

    return false;

    // if !user return false
    // verify password for that user
    // set into a session
  }

  public function logout()
  {
    unset($_SESSION['user']);
  }

  public function isAdmin()
  {
    $user = User::where('uuid', $_SESSION['user']) // useful for user auth middleware
      ->where('is_admin', 1)
      ->first();

    if(isset($user)) {
      return true;
    }
    return false;
  }

  // public function isAdmin() {
  //   // TODO
  //   return false;
  // }

  // a boolean combination of:
  // check()
  // isApproved()
  // isDeleted()
  // to ensure that the user is valid, approved and not deleted in one function
  public function isVerified() {
    // privacy features
    // logged in
    if(!$this->user()) {
      return false;
    }
    // deleted?
    if($this->isDeleted()) {
      return false;
    }
    // approved?
    if(!$this->isApproved()) {
      return false;
    }
    return true;
  }

}
