<?php

abstract class Abstract1 {
    // Khai báo  định nghĩa hàm
    public function Declare(){
        echo 'abcd';
    }
    // Khai báo ko định nghĩa hàm
    abstract function NotDeclare();
    // Final trong abstract: Không để bị override khi lớp con sử dụng
    final public FinalMethod(){
        echo "Hàm Final không để bị override";
    }

}

abstract class AbsB {
    abstract function runB();
    
}

abstract class AbsC {
    abstract function runC();
    
}



