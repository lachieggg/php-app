<?php

namespace LoginApp\Auth;

use LoginApp\Models\User;

class Auth
{
  /**
   * @param $email
   * @param $password
   */
  public function attempt($email, $password)
  {
    $user = User::where('email', $email)->first();
    if(!$user) {
      return false;
    }

    if(password_verify($password, $user->password)) {
      $_SESSION['user'] = $user->uuid;
      return true;
    }

    return false;
  }

  public function logout()
  {
    unset($_SESSION['user']);
  }

  public function user()
  {
    return isset($_SESSION['user']) ? User::where('uuid', $_SESSION['user'])->first() : null;
  }

  public function check()
  {
    $user = $this->user();
    return isset($user);
  }

  public function admin()
  {
    if(isset($_SESSION['user'])) {
      $user = User::where('uuid', $_SESSION['user'])
      ->where('is_admin', 1)
      ->first();

      return isset($user);
    }

    return false;
  }

  public function deleted() 
  {
    $deleted = User::where('uuid', $_SESSION['user'])
    ->where('is_deleted', '=', 1)
    ->first();

    if(isset($deleted)) {
      return true;
    }
    return false;
  }

  public function isVerified() 
  {
    if(!$this->user()) {
      return false;
    }
    if($this->deleted()) {
      return false;
    }
    if(!$this->approved()) {
      return false;
    }
    return true;
  }

  public function approved() 
  {
    $approvedUser = User::where('uuid', $_SESSION['user'])
    ->where('is_approved', '=', 1)
    ->where('is_deleted', '!=', 1)
    ->first();

    return isset($approvedUser);
  }
}
