<?php
class Node
{
    public $data;
    public $next;

    public function __construct($data){
        $this->data = $data;
    }
}

class Stack
{
    public $head;

    public function push($data){
        $temp = $this->head;
        $this->head = new Node($data);
        $this->head->next = $temp;
    }

    public function pop(){
        if($this->head == null) return null;
        $temp = $this->head;
        $this->head = $this->head->next;
        return $temp->data;
    }

    public function peek(){
        if($this->head == null) return null;
        return $this->head->data;
    }

}

function reverse($arr){
    $stack = new Stack();
    for($i = 0; $i < count($arr); $i++) $stack->push($arr[$i]);
    $reversed = [];
    while($stack->peek() != null) array_push($reversed, $stack->pop());
    return $reversed;
}
$arr = [1,2,3,4,5,6];
var_dump (reverse($arr)) .PHP_EOL;
