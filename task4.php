<?php

  function delElem(array $arr, int $position)
  {
      return array_merge(array_slice($arr, 0, $position), array_slice($arr, $position + 1));
  }
