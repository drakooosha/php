<?php

namespace task8;

class Matrix
{
    protected array $matrix;
    protected int $rows;
    protected int $columns;

    public function __construct(array $matrix)
    {
        $this->matrix = $matrix;
        $this->rows = count($this->matrix);
        $this->columns = count($this->matrix[0]);
    }

    public function printMatrix()
    {
        $result = '';
        foreach ($this->matrix as $value) {
            foreach ($value as $value1) {
                $result .= "$value1 ";
            }
            $result .= "\n";
        }
        echo $result;
    }

    public function matrixSum(array $secondMatrix)
    {
        if ($this->rows != count($secondMatrix)) {
            throw new \InvalidArgumentException('Unable to summ to matrices : matrices must be same rows');
        }

        for ($i = 0; $i < $this->rows; $i++) {
            if ($this->columns != count($secondMatrix[$i])) {
                throw new \InvalidArgumentException('Unable to summ to matrices : matrices must be same columns');
            }
        }

        for ($i = 0; $i < $this->rows; $i++) {
            for ($j = 0; $j < $this->columns; $j++) {
                $this->matrix[$i][$j] += $secondMatrix[$i][$j];
            }
        }
    }

    public function matrixMult(array $secondMatrix)
    {
        for ($i = 0; $i < count($secondMatrix) - 1; $i++) {
            if (count($secondMatrix[$i]) != count($secondMatrix[$i + 1])) {
                throw new \InvalidArgumentException('Check number of elements in each row: it must be same');
            }
        }

        if ($this->columns != count($secondMatrix)) {
            throw new \InvalidArgumentException('Unable to multiply matrices : columns number of matrix A are not equal rows number of B');
        }

        $matrixMult = [];

        for ($i = 0; $i < $this->rows; $i++) {
            $matrixMult[$i] = [];
            for ($j = 0; $j < count($secondMatrix[0]); $j++) {
                $columnElems = array_column($secondMatrix, $j);
                $result = 0;
                for ($elem = 0; $elem < $this->columns; $elem++) {
                    $result += $this->matrix[$i][$elem] * $columnElems[$elem];
                }
                $matrixMult[$i][$j] = $result;
            }
        }
        $this->matrix = $matrixMult;
    }

    public function multByNumber(int $number)
    {
        for ($i = 0; $i < $this->rows; $i++) {
            for ($j = 0; $j < $this->columns; $j++) {
                $this->matrix[$i][$j] *= $number;
            }
        }
    }
}

$a = new Matrix([[4, 2], [3, 1], [1, 5]]);
$a->multByNumber(2);
$a->printMatrix();
