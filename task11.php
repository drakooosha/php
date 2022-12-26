<?php

namespace task11;

class findPath {
  protected array $coordinates = [];
  protected int $rows = 10;
  protected int $columns = 10;
  protected int $startX;
  protected int $startY;
  protected int $endX;
  protected int $endY;
  protected array $path;

  public function __construct(int $startX, int $startY,int $endX, int $endY )
  {
    $this->startX = $startX-1;
    $this->startY = $startY-1;
    $this->endX  = $endX-1;
    $this->endY = $endY-1;
    $this->coordinates = $this->createArr();
    $this -> path = [];
  }

  public function getResult() {
    $this->findPath($this->startX,$this->startY);

    $file = fopen('output.txt', 'w');
    $this->printArrInFile($file);

    if(count($this->path) == 0) {
      fwrite($file, "There is no possible ways from point A to point B \r\n");  
    }
    else {
      $this->printAllWaysInFile($file);
      fwrite($file, "Shortest way: \r\n");
      $this->printShortWayInFile($file);
    }

    fclose($file);
  }

  protected function createArr() {
    $result = [];
    for($i = 0; $i < $this->rows; $i++) {
      $result[]=[];
      for($j = 0; $j < $this->columns; $j++) {
        $result[$i][$j] = rand(0,1);
      }
    }
    $result[$this->startX][$this->startY] = 'A';
    $result[$this->endX][$this->endY] = 'B';

    return $result;
  } 

  protected function printArrInFile($file) {
    fwrite($file, "Matrix : \r\n");
    for($i = 0; $i < $this->rows; $i++) {
      for($j = 0; $j < $this->columns; $j++) {
        fwrite($file, ' '.$this->coordinates[$i][$j].' ');
      }
      fwrite($file,"\r\n");
    }
  }

  protected function printAllWaysInFile($file) {
    fwrite($file, "All possible ways : \r\n");
    foreach($this->path as $way) {
      $result = "A(x:".$way[0][0].", y:".$way[0][1].")->";
      for($i = 1; $i < count($way) -1; $i++){
        $result.="(x:".$way[$i][0].", у:".$way[$i][1].")->";
      }
      $result .= "B(x:".$way[count($way)-1][0].", y:".$way[count($way)-1][1].")";
      fwrite($file, $result."\r\n");
    }
  }

  protected function printShortWayInFile($file) {
    $shortestPath = [$this->path[0]];
    for($i = 0; $i < count($this->path); $i++) {
      if(count($this->path[$i]) < count($shortestPath[0])) {
        $shortestPath[0] = $this->path[$i];
      }
    }

    foreach($shortestPath as $way) {
      $result = "A(x:".$way[0][0].", y:".$way[0][1].")->";
      for($i = 1; $i < count($way)-1; $i++){
        $result.="(x:".$way[$i][0].", у:".$way[$i][1].")->";
      }
      $result .= "B(x:".$way[count($way)-1][0].", y:".$way[count($way)-1][1].")";
      fwrite($file, $result."\r\n");
    }
  }

  protected function findPath($pointX, $pointY, $visitedPoints = [])  {
    $visitedPoints[] = [$pointX,$pointY];
    if($this->coordinates[$pointX][$pointY] == 'B') {
      $this->path[] = $visitedPoints;
      
      return null;
    }

    $neighbors = $this->findNeighbors($pointX, $pointY, $visitedPoints);
    if(count($neighbors) == 0) {
      return null;
    }

    for($i = 0; $i < count($neighbors); $i++) {
      $this->findPath($neighbors[$i][0], $neighbors[$i][1], $visitedPoints);
    }
  }

  protected function findNeighbors($pointX, $pointY, $visitedPoints) {
    $points = [];
    if($pointX-1 != -1) { 
      if($this->coordinates[$pointX-1][$pointY] != 1 && array_search([$pointX-1, $pointY], $visitedPoints) == false){
        $points[] = [$pointX-1, $pointY];
      }
    }
    if($pointX+1 < $this->rows) {
      if($this->coordinates[$pointX+1][$pointY] != 1 && array_search([$pointX+1, $pointY], $visitedPoints) === false) {
        $points[] = [$pointX+1, $pointY];
      }
    }
    if($pointY-1 != -1) {
      if($this->coordinates[$pointX][$pointY-1] != 1 && array_search([$pointX, $pointY-1], $visitedPoints) === false) {
        $points[] = [$pointX, $pointY-1];
      }
    }
    if($pointY+1 < $this->columns) {
      if( $this->coordinates[$pointX][$pointY+1] != 1 && array_search([$pointX, $pointY+1], $visitedPoints) === false) {
        $points[] = [$pointX, $pointY+1];
      }
    }
    return $points;
  }
}

$a = array("x"=>2, "y"=>3);
$b = array("x"=>5, "y"=>4);

$class = new findPath($a['x'],$a['y'],$b['x'],$b['y']);
$class->getResult();