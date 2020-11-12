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

function consecutiveWalk($arr){
    $stack = new Stack();
    $stack->push($arr[0]);
    for($i = 1; $i < count($arr); $i++){
        if($stack->peek() < $arr[$i]){
            while($stack->pop() != null);
        }
        $stack->push($arr[$i]);
    }
    $results = [];
    while($stack->peek != null) array_unshift($results, $stack->pop());
    return $results;
}
var_dump (consecutiveWalk([3,4,20,45,56,6,4,3,5,3,2])) .PHP_EOL;
