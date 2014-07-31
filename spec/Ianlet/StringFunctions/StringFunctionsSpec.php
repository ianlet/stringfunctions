<?php

namespace spec\Ianlet\StringFunctions;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class StringFunctionsSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Ianlet\StringFunctions\StringFunctions');
    }
}
