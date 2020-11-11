<?php
class Node
{
    public $data;
    public $next;

    public function __construct($data){
        $this->data = $data;
    }
}

class SinglyLinkedList{
    public $arr;
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

echo $numList->at(2)->data .PHP_EOL;
echo $numList->at(3)->data .PHP_EOL;
echo $numList->at(4)->data .PHP_EOL;

$numList->printList();

$thirdEle = $numList->at(2);
$tempNode = $thirdEle->next;
$newNode = new Node(40);
$thirdEle->next = $newNode;
$newNode->next = $tempNode;

echo $numList->at(2)->data .PHP_EOL;
echo $numList->at(3)->data .PHP_EOL;
echo $numList->at(4)->data .PHP_EOL;
$numList->printList();
