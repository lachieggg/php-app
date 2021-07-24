<?php

namespace LoginApp\Controllers;

// base class
class Controller
{
  protected $container;
  protected $privacy_mode;

  public function __construct($container)
  {
    $this->privacy_mode = True;
    $this->container = $container;
  }

  public function __get($property)
  {
    if ($this->container->{$property}) {
      return $this->container->{$property};
    }
  }
}
