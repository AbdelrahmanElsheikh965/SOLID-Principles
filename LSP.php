<?php
# Liskov Substiution Principle

#==> We can use inheriting class instead of base class.
#==> Intent : Derived types must be completely substitutable for their base types.
#==> Most similar to "Adapter pattern".

class Bird
{
    public function eat(){
        return "I can eat";
    }

    public function fly(){
        return "I can fly";
    }
}

class Duck extends Bird
{
    public function eat(){
        return "I can eat";
    }

    public function fly(){
        return "oOps I can't fly";
    }
}

class Flappy extends Bird
{
    public function eat(){
        return "I can eat";
    }

    public function fly(){
        return "I can fly";
    }
}

# $b = new Bird;
# echo $b->eat();  # I can eat 
# echo $b->fly();  # I can fly

# $d = new Duck;
# echo $d->eat(); # I can eat
# echo $d->fly(); # oOps I can't fly

// Now child classes don't do what they're supposed to do (same as parent).
// So the solution in separating classes to give every child class the ability to replace its parent.

class newBird{
    public function eat(){
        return "I can eat";
    }
}

class newDuck extends newBird{
    public function eat(){
        return "I can eat";
    }
}

class FlyableBird extends newBird
{
    // it can eats too
    public function fly(){
        return "I can fly";
    }
}

class newFlappy extends FlyableBird{
    // it can eats too
    public function fly(){
        return "I can fly";
    }
}

# $nb = new FlyableBird;  // OR $nb = new newFlappy; # => same Result 
# echo $nb->eat();
# echo '<br />';
# echo $nb->fly();
// Now we applied Liskov Substitution Principle 
// because we can now replace parent by its child.

$nb = new newBird;  // OR $nb = new newDuck; # => same Result 
echo $nb->eat();