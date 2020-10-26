<?php

namespace App\Format;

abstract class BaseFormat{
  protected $data;

  public function __construct($data){
    $this->data = $data;
  }

  public function getData(){
    return $this->data;
  }

  public function setData($data){
    $this->data = $data;
  }

  public function __toString(){
    return $this->convert();
  }

  public abstract function convert();
}