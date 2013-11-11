<?php
$stack = new SplStack();

//set items to the stack. Apply 'push' operation
$stack->push('Spain');
$stack->push('Argentina');
$stack->push('Italy');

//rewind the iterator to the beginning
$stack->rewind();

//output stack
while ($stack->valid())
{
    echo $stack->key() , " => ";
    echo $stack->current(), "<br>";
    $stack->next();
}

//set 'Italy' index to zero
$stack->offsetSet(0, 'Italy');

//output stack
$stack->rewind();
while ($stack->valid())
{
    echo $stack->key() . " => ";
    echo $stack->current(), "<br>";
    $stack->next();
}

//get the first element from the stack.
$elementFromStack =$stack->pop();

//output stack
$stack->rewind();
while ($stack->valid())
{
    echo $stack->key() . " => ";
    echo $stack->current(), "<br>";
    $stack->next();
}