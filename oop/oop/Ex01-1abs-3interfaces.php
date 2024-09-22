<?php

// Example 01 in OOP_Diagram.drawio
include ('MyClass.php');
include ('MyAbstract.php');
include ('MyInterface.php');
// Single Abstract, Many Interfaces
class Ex01 extends Abstract1 implements Interface1, Interface2, Interface3 {   
    
    function func_from_Ab1_no_body() {  
        echo 'Abstract 01 no body from Ex01';
    }
    
}

$ex = new Ex01();
