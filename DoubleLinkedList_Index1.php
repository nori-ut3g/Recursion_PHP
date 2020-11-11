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
    public $head, $tail;

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

$numList->printList();

echo $numList->at(0)->data .PHP_EOL;
echo $numList->at(2)->data .PHP_EOL;
echo $numList->at(12)->data .PHP_EOL;
