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

$s = new Stack();
$s->push(2);
echo $s->peek() .PHP_EOL;

$s->push(4);
$s->push(3);
$s->push(1);
$s->pop();
echo $s->peek() .PHP_EOL;
