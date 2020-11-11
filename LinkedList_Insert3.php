<?php
class Node
{
    public $data;
    public $next;

    public function __construct($data){
        $this->data = $data;
    }

    public function addNextNode($newNode){
        $tempNode = $this->next;
        $this->next = $newNode;
        $newNode->next = $tempNode;
    }
}

class SinglyLinkedList{
    public $head;

    public function __construct($arr){
        $this->head = count($arr) > 0 ? new Node($arr[0]) : new Node(null);
        $currentNode = $this->head;
        for($i = 1; $i < count($arr); $i++){
            $currentNode->next = new Node($arr[$i]);
            $currentNode = $currentNode->next;
        }
    }

    public function at($index){
        $iterator = $this->head;
        for($i = 0; $i < $index; $i++){
            $iterator = $iterator->next;
            if($iterator == null) return null;
        }
        return $iterator;
    }

    public function preappend($newNode){
        $newNode->next = $this->head;
        $this->head = $newNode;
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
$numList = new SinglyLinkedList([35,23,546,67,86,234,56,767,34,1,98,78,555]);

$numList->printList();
$numList->preappend(new Node(45));
$numList->preappend(new Node(236));
$numList->printList();
