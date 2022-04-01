<?php
namespace app\Components;
class recusive
{
    private $data;
    private $htmlSelect=" ";
    function __construct($data)
    {
        $this->data=$data;
    }
    public function categoryRecusive($id=0, $text=" ")
    {

        foreach($this->data as $value) 
        {
             $this->htmlSelect .="<option value='". $value['id']. "'>" . $text. $value['name'] ."</option>";
        }
        return $this->htmlSelect;
    }
}
?>