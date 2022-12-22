<?php

  function testNumTernary(int $inputNumber)
  {
      return ($inputNumber > 30 ? 'More that 30' : ($inputNumber > 20 ? 'More that 20' : ($inputNumber > 10 ? 'more than 10' : 'equal or less than 10')));
  }

  function testNumCondit(int $inputNumber)
  {
      if ($inputNumber > 30) {
          return 'More that 30';
      } elseif ($inputNumber > 20) {
          return 'More that 20';
      } elseif ($inputNumber > 10) {
          return 'more than 10';
      } else {
          return 'equal or less than 10';
      }
  }

  function testNumSwitch(int $inputNumber)
  {
      switch ($inputNumber) {
          case $inputNumber > 30:
              return'More that 30';
          case $inputNumber > 20:
              return'More that 20';
          case $inputNumber > 10:
              return'More that 10';
          default:
              return'equal or less than 10';
      }
  }

  $a = testNumSwitch(10);
  echo $a;
