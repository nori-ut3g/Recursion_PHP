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

$q = new Deque();
echo $q->peekFront() .PHP_EOL;
echo $q->peekBack() .PHP_EOL;

$q->enqueueBack(4);
echo $q->peekFront() .PHP_EOL;
echo $q->peekBack() .PHP_EOL;

$q->enqueueBack(50);
echo $q->peekFront() .PHP_EOL;
echo $q->peekBack() .PHP_EOL;

echo "dequeued :" . $q->dequeueFront() .PHP_EOL;
echo $q->peekFront() .PHP_EOL;
echo $q->peekBack() .PHP_EOL;

$q->enqueueFront(36);
$q->enqueueFront(96);
echo $q->peekFront() .PHP_EOL;
echo $q->peekBack() .PHP_EOL;

echo "dequeued :" . $q->dequeueBack() .PHP_EOL;
echo $q->peekFront() .PHP_EOL;
echo $q->peekBack() .PHP_EOL;

echo "Emptying" .PHP_EOL;
$q->dequeueBack();
$q->dequeueBack();
$q->dequeueBack();
$q->dequeueBack();

echo $q->peekFront() .PHP_EOL;
echo $q->peekBack() .PHP_EOL;
