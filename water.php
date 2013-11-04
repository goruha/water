<?php

include_once 'MaxStack.inc';

$edges_array = array(3,1,2,1,2,1,1,1,3,5,7);



$maxStack = new MaxStack();
//init step
$i = 0;
$amount = 0;
while ($value = array_shift($edges_array)) {
  if ($lastMax = $maxStack->showLastMax()) {
    if ($value > $lastMax && $maxStack->getLength() == 1) {
      //if we still go to rock first time
      $maxStack->getValue();
      $maxStack->setValue($i, $value);
    }
    elseif ($value > $lastMax) {
      //if we go to rock from bottom

      //we should have current height more than prev and should be one more maximum edge
      if ($value > $maxStack->showLastMax() && $maxStack->getLength() > 1) {
        do {
          list($left_pool_side_position, $left_pool_side_value) = $maxStack->getValue();
          $left_pool_side_position = $maxStack->showLastMaxPosition();
          $pool_width = $i - $left_pool_side_position - 1;
          $side_edge = min($value, $maxStack->showLastMax());
          $pool_height = $side_edge - $left_pool_side_value;
          $amount += $pool_width * $pool_height;
          echo "Pool width from $i to $left_pool_side_position ($pool_width) , height is $side_edge - $left_pool_side_value ($pool_height) \n";
          echo $amount . " amount\n";
        }while ($maxStack->getLength() > 1 && $value > $maxStack->showLastMax());
      }

      if ($value >= $maxStack->showLastMax()) {
        $maxStack->getValue();
      }
      $maxStack->setValue($i, $value);
    }
    elseif ($value < $lastMax) {
      //if we go down
      $maxStack->setValue($i, $value);
    }

    //stack debug
    //echo $maxStack->showStack();
  }
  else {
    //if it is first round :-)
    $maxStack->setValue($i, $value);
  }

  $i++;
}

print "Answer is " . $amount . "\n";
