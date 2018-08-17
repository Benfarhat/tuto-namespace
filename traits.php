<?php

trait Hello {
    public function sayHello() {
        echo 'Hello ';
    }
    
    public function sayWorld(){
        echo 'Monde';
    }
}

trait World {
    public function sayWorld(){
        echo 'World';
    }
}

class HelloWorld {
    public function sayWorld(){
        echo 'Mundo';
    }
}

class MyHelloWorld extends HelloWorld {
    use World, Hello {
        Hello::sayWorld insteadof World;
        Hello::sayWorld as sayWorld2;
    }

    public function sayExclamationMark(){
        echo '!';
    }
}

class MyHelloWorld2 extends HelloWorld {
    use Hello;
    public function sayExclamationMark(){
        echo '!';
    }
}

$o = new MyHelloWorld();
$o->sayHello(); // Hello
$o->sayWorld(); // Monde
echo " ";
$o->sayWorld2(); // Monde
$o->sayExclamationMark(); // !

echo '<br>';

$o2 = new MyHelloWorld2();
$o2->sayHello(); // Hello
$o2->sayWorld(); // Mundo
$o2->sayExclamationMark(); // !

?>