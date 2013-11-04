<?php

class MaxStack {

  public $container = array();

  public function setValue($position, $value) {
    array_push($this->container, $position . '::' . $value);
  }

  public function getValue() {
    if (count($this->container)){
      return explode("::", array_pop($this->container));
    }
    else {
      return FALSE;
    }
  }

  public function getLength() {
    return count($this->container);
  }

  public function showStack() {
    return var_export($this->container, TRUE);
  }

  public function showLastMax() {
    $count = count($this->container);
    if ($count) {
      $stack_value = explode("::", $this->container[$count - 1]);
      return $stack_value[1];
    }
    else {
      return FALSE;
    }
  }

  public function showLastMaxPosition() {
    $count = count($this->container);
    if ($count) {
      $stack_value = explode("::", $this->container[$count - 1]);
      return $stack_value[0];
    }
    else {
      return FALSE;
    }
  }
}

