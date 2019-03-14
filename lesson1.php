<?php

//class Person
//{
//    protected $email;
//    protected $password;
//
//    public function __construct($email, $password)
//    {
//        $this->password = $password;
//        $this->email = $email;
//    }
//
//    protected function isAdmin() {
//        if ((int)$_SESSION['login']['role'] === 1) {
//            return true;
//        } else return false;
//    }
//
//    public function login() {
//
//
//    }
//
//
//    function sayHallo() {
//        echo "Здравствуйте, ";
//    }
//}
//
//class Admin extends Person
//{
//    function sayHallo()
//    {
//        echo "Привет, хозяин!";
//    }
//}

class Person
{
    public $id;
    public $name;
    public $email;

    function __construct($id, $name, $email)
    {
        $this->id = $id;
        $this->name = $name;
        $this->email = $email;
    }

    public function sayHello() {
        echo "Здравствуйте, $this->name";
    }
}

class Admin extends Person
{
    public function sayHello()
    {
        echo "Здравствуй, хозяин!";
    }
    public function addProduct()
    {
        echo "Добавляет товар";
    }
    public function removeProduct()
    {
        echo "Удаляет товар";
    }
}

$p = new Person(1, 'Keka', 'keka@pepa.net');
echo $p->sayHello() . '<br/>';
$a = new Admin(2, 'Pepa', 'pepa@keka.net');
echo $a->sayHello();

class A {
    public function foo() {
        static $x = 0;
        echo ++$x;
    }
}
$a1 = new A();
$a2 = new A();
$a1->foo(); //1    Тут префиксный инкремент, поэтому он сначала увеличивает переменную на 1,
$a2->foo(); //2    а потом выводит результат. Сам метод принадлежит классу, поэтому неважно из какого объекта
$a1->foo(); //3    происходит вызов, результат при кажом вызове увеличивает переменную на 1.
$a2->foo(); //4

class B {
    public function foo() {
        static $x = 0;
        echo ++$x;
    }
}
class C extends B {
}
$a1 = new B();
$b1 = new C();
$a1->foo(); //1     Про инкремент такая же история, что и заданием выше. Но тут появляется класс наследник.
$b1->foo(); //1     И для него уже свой метод foo().
$a1->foo(); //2
$b1->foo(); //2

class D {
    public function foo() {
        static $x = 0;
        echo ++$x;
    }
}
class E extends D {
}
$a1 = new D;
$b1 = new E;
$a1->foo(); //1     Просто другой стиль написания. Ничем не отличается от предыдущего задания.
$b1->foo(); //1
$a1->foo(); //2
$b1->foo(); //2