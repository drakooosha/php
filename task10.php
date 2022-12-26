<?php

namespace task10;

class MyCalculator
{
    protected float $num1;
    protected float $num2;
    private ?float $result = null;

    public function __construct(float $num1, float $num2)
    {
        $this->num1 = $num1;
        $this->num2 = $num2;
    }

    public function add()
    {
        $this->result = $this->num1 + $this->num2;

        return  $this;
    }

    public function subtrac()
    {
        $this->result = $this->num1 - $this->num2;

        return $this;
    }

    public function multiply()
    {
        $this->result = $this->num1 * $this->num2;

        return $this;
    }

    public function divide()
    {
        $this->result = $this->num2 == 0 ? $this->showError("You can't divide by zero") : $this->num1 / $this->num2;

        return $this;
    }

    public function addBy(float $num)
    {
        return $this->result == null ? $this->showError("You can't use this method first. Please, use one of this: add(),subtract,multiply(),divide()") : $this->result + $num;
    }

    public function subtracBy(float $num)
    {
        return $this->result == null ? $this->showError("You can't use this method first. Please, use one of this: add(),subtract,multiply(),divide()") : $this->result - $num;
    }

    public function divideBy(float $num)
    {
        return $num == 0 ? $this->showError("You can't divide by zero")
        : ($this->result == null ? $this->showError("You can't use this method first. Please, use one of this: add(),subtract,multiply(),divide()")
        : $this->result / $num);
    }

    public function multiplyBy(float $num)
    {
        return $this->result == null ? $this->showError("You can't use this method first. Please, use one of this: add(),subtract,multiply(),divide()") : $this->result * $num;
    }

    protected function showError(string $err)
    {
        throw new \InvalidArgumentException($err);
    }
}
