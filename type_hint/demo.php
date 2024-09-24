<?php
declare(strict_types=1);

include_once('I.php');
include_once('C.php');
include_once('A.php');
include_once('B.php');

class Demo{
    //A lần lượt trả về
    public function typeAReturnA(): A{
        echo __FUNCTION__ ."<br>";
        return new A;
    }

    public function typeAReturnB(): A{
        echo __FUNCTION__ ."<br>";
        return new B;
    }

    public function typeAReturnC(): A{
        echo __FUNCTION__ ."<br>";
        return new C;
    }

    public function typeAReturnI(): B{
        echo __FUNCTION__ ."<br>";
        return new I;
    }

    //B lần lượt trả về
    public function typeBReturnA(): B{
        echo __FUNCTION__ ."<br>";
        return new A;
    }

    public function typeBReturnB(): B{
        echo __FUNCTION__ ."<br>";
        return new B;
    }

    public function typeBReturnC(): B{
        echo __FUNCTION__ ."<br>";
        return new C;
    }

    public function typeBReturnI(): B{
        echo __FUNCTION__ ."<br>";
        return new I;
    }

    //C lần lượt trả về
    public function typeCReturnA(): C{
        echo __FUNCTION__ ."<br>";
        return new A;
    }

    public function typeCReturnB(): C{
        echo __FUNCTION__ ."<br>";
        return new B;
    }

    public function typeCReturnC(): C{
        echo __FUNCTION__ ."<br>";
        return new C;
    }

    public function typeCReturnI(): C{
        echo __FUNCTION__ ."<br>";
        return new I;
    }

    // I lần lượt trả về
    public function typeIReturnA(): I{
        echo __FUNCTION__ ."<br>";
        return new A;
    }

    public function typeIReturnB(): I{
        echo __FUNCTION__ ."<br>";
        return new B;
    }

    public function typeIReturnC(): I{
        echo __FUNCTION__ ."<br>";
        return new C;
    }

    public function typeIReturnI(): I{
        echo __FUNCTION__ ."<br>";
        return new I;
    }
    // Null
    public function typeIReturnNullA(): ?A{
        echo __FUNCTION__ ."<br>";
        return new A;
    }

    public function typeIReturnNullB(): ?B{
        echo __FUNCTION__ ."<br>";
        return new B;
    }

    public function typeIReturnNullC(): ?C{
        echo __FUNCTION__ ."<br>";
        return new C;
    }
    public function typeIReturnNullI(): ?I{
        echo __FUNCTION__ ."<br>";
        return new I;
    }
}

$demo = new Demo();
$demo->typeIReturnNullC();
