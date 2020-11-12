<?php
class Node
{
    public $data;
    public $next;

    public function __construct($data){
        $this->data = $data;
    }
}

class Queue
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

    public function enqueue($data){
        if($this->head === null){
            $this->head = new Node($data);
        }
        else if($this->tail === null){
            $this->tail = new Node($data);
            $this->head->next = $this->tail;
        }
        else{
            $this->tail->next = new Node($data);
            $this->tail = $this->tail->next;
        }
    }

    public function dequeue(){
        if($this->head === null) return null;
        $temp = $this->head;

        if($this->head->next === null){
            $this->head = null;
            $this->tail = null;
        }
        else $this->head = $this->head->next;

        return $temp->data;
    }

}

$q = new Queue();
echo $q->peekFront() .PHP_EOL;
echo $q->peekBack() .PHP_EOL;

$q->enqueue(4);
echo $q->peekFront() .PHP_EOL;
echo $q->peekBack() .PHP_EOL;

$q->enqueue(50);
echo $q->peekFront() .PHP_EOL;
echo $q->peekBack() .PHP_EOL;

$q->enqueue(64);
echo $q->peekFront() .PHP_EOL;
echo $q->peekBack() .PHP_EOL;

echo "dequeued :" . $q->dequeue() .PHP_EOL;
echo $q->peekFront() .PHP_EOL;
echo $q->peekBack() .PHP_EOL;
