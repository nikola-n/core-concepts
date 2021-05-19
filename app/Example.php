<?php


namespace App;


class Example
{
//    public function go()
//    {
//        dump('It works!');
//    }
//    public function  __construct($foo)
//    {
//        $this->foo = $foo;
//    }

    protected $foo;
    protected $collaborator;

    /**
     * Example constructor.
     * @param $collaborator
     */
    public function __construct(Collaborator $collaborator,$foo)
    {
        $this->collaborator = $collaborator;
        $this->foo = $foo;
    }
}
