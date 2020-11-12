<?php
class Node
{
    public $data;
    public $next;
    public $prev;

    public function __construct($data){
        $this->data = $data;
    }
}

class Deque
{
    public $head;
    public $tail;

    public function peekFront(){
        if($this->head === null) return null;
        return $this->head->data;
    }

    public function peekBack(){
        if($this->tail === null) return $this->peekFront();
        return $this->tail->data;
    }

    public function enqueueFront($data){
        if($this->head === null){
            $this->head = new Node($data);
            $this->tail = $this->head;
        }
        else{
            $node = new Node($data);
            $this->head->prev = $node;
            $node->next = $this->head;
            $this->head = $node;
        }
    }

    public function enqueueBack($data){
        if($this->head === null){
            $this->head = new Node($data);
            $this->tail = $this->head;
        }
        else{
            $node = new Node($data);
            $this->tail->next = $node;
            $node->prev = $this->tail;
            $this->tail = $node;
        }
    }

    public function dequeueFront(){
        if($this->head === null) return null;

        $temp = $this->head;
        $this->head = $this->head->next;
        if($this->head != null) $this->head->prev = null;
        else $this->tail = null;
        return $temp->data;
    }

    public function dequeueBack(){
        if($this->tail === null) return null;

        $temp = $this->tail;
        $this->tail = $this->tail->prev;

        if($this->tail !== null) $this->tail->next = null;
        else $this->head = null;
        return $temp->data;
    }
}

function getMaxWindows($arr, $k){
    if($k > count($arr)) return [];

    $results = [];
    $deque = new Deque();

    for($i = 0; $i < $k; $i++){
        while($deque->peekBack() !== null && $arr[$deque->peekBack()] <= $arr[$i]){
            $deque->dequeueBack();
        }
        $deque->enqueueBack($i);
    }


    for($i = $k; $i < count($arr); $i++){
        array_push( $results,$arr[$deque->peekFront()]);

        while($deque->peekFront() !== null && $deque->peekFront() <= $i-$k) $deque->dequeueFront();


        while($deque->peekBack() !== null && $arr[$deque->peekBack()] <= $arr[$i]) $deque->dequeueBack();
        $deque->enqueueBack($i);
    }

    array_push($results, $arr[$deque->peekFront()]);


    return $results;
}

var_dump (getMaxWindows([34,35,64,34,10,2,14,5,353,23,35,63,23], 4)) .PHP_EOL;
