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
}
$numList = new SinglyLinkedList([35,23,546,67,86,234,56,767,34,1,98,78,555]);

echo $numList->at(2)->data .PHP_EOL;
echo $numList->at(12)->data .PHP_EOL;
?>
