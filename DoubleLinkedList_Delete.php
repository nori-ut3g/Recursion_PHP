<?php
class Node
{
    public $data;
    public $prev;
    public $next;

    public function __construct($data){
        $this->data = $data;
    }
}

class DoublyLinkedList
{
    public $arr;
    public $head;
    public $tail;

    public function __construct($arr){
        if(count($arr) <= 0){
            $this->head = new Node(null);
            $this->tail = $this->head;
            return;
        }

        $this->head = new Node($arr[0]);
        $currentNode = $this->head;

        for($i = 1; $i < count($arr); $i++){
            $currentNode->next = new Node($arr[$i]);
            $currentNode->next->prev = $currentNode;
            $currentNode = $currentNode->next;
        }
        $this->tail = $currentNode;
    }

    public function at($index){
        $iterator = $this->head;

        for($i = 0; $i < $index; $i++){
            $iterator = $iterator->next;
            if($iterator == null) return null;
        }
        return $iterator;
    }

    public function popFront(){
        $this->head = $this->head->next;
        $this->head->prev = null;
    }

    public function pop(){
        $this->tail = $this->tail->prev;
        $this->tail->next = $null;
    }

    public function preappend($newNode){
        $this->head->prev = $newNode;
        $newNode->next = $this->head;
        $newNode->prev = null;
        $this->head = $newNode;
    }

    public function append($newNode){
        $this->tail->next = $newNode;
        $newNode->next = null;
        $newNode->prev = $this->tail;
        $this->tail = $newNode;
    }

    public function addNextNode($node, $newNode){
        $tempNode = $node->next;
        $node->next = $newNode;
        $newNode->next = $tempNode;
        $newNode->prev = $node;

        if($node == $this->tail) $this->tail = $newNode;
        else $tempNode->prev = $newNode;
    }

    public function deleteNode($node){
        if($node == $this->tail) return $this->pop();
        if($node == $this->head) return $this->popFront();

        $node->prev->next = $node->next;
        $node->next->prev = $node->prev;
    }

    public function reverse(){
        $reverse = $this->tail;
        $iterator = $this->tail->prev;

        $currentNode = $reverse;
        while($iterator != null){
            $currentNode->next = $iterator;

            $iterator = $iterator->prev;
            if($iterator != null) $iterator->next = null;

            $currentNode->next->prev = $currentNode;
            $currentNode = $currentNode->next;
        }

        $this->tail = $currentNode;
        $this->head = $reverse;

    }
    public function printInReverse(){
        $iterator = $this->tail;
        $str = "";
        while($iterator != null){
            $str .= $iterator->data . " ";
            $iterator = $iterator->prev;
        }
        echo $str.PHP_EOL;
    }

    public function printList(){
        $iterator = $this->head;
        $str = "";
        while($iterator != null){
            $str .= $iterator->data . " ";
            $iterator = $iterator->next;
        }
        echo $str.PHP_EOL;
    }
}
$numList = new DoublyLinkedList([35,23,546,67,86,234,56,767,34,1,98,78,555]);
// pop
$numList->printList();

$numList->popFront();
$numList->pop();

$numList->printList();
$numList->printInReverse();

// 要素を削除します
echo "Deleting in O(1)".PHP_EOL;
$numList->printList();

$numList->deleteNode($numList->at(3));
$numList->deleteNode($numList->at(9));
$numList->deleteNode($numList->at(0));

$numList->printList();
$numList->printInReverse();
