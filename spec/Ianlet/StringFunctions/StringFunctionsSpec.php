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

    function it_formats_a_string_to_camel_case_format()
    {
        $this::snakeCase('This, is a (great) string!')->shouldReturn('this_is_a_great_string');
        $this::snakeCase('-Maybe this OneIs even-better!')->shouldReturn('maybe_this_oneis_even_better');
        $this::snakeCase('-What happens---with---multiple-?!')->shouldReturn('what_happens_with_multiple');
        $this::snakeCase('Nín hǎo. Wǒ shì zhōng guó rén')->shouldReturn('nin_hao_wo_shi_zhong_guo_ren');
    }

    function it_formats_a_string_to_a_slug()
    {
        $this::slug('A great organization name')->shouldReturn('a-great-organization-name');
        $this::slug('An ltd. organization')->shouldReturn('an-ltd-organization');
        $this::slug('Uncommon_organization_name')->shouldReturn('uncommon-organization-name');
        $this::slug('Nín hǎo. Wǒ shì zhōng guó rén')->shouldReturn('nin-hao-wo-shi-zhong-guo-ren');
    }

    function it_guards_a_string()
    {
        $this->shouldNotThrow('\InvalidArgumentException')->duringGuardString('A string');
        $this->shouldThrow(new \InvalidArgumentException('String expected'))->duringGuardString(new \stdClass());
        $this->shouldThrow(new \InvalidArgumentException('String expected'))->duringGuardString(5);
        $this->shouldThrow(new \InvalidArgumentException('String expected'))->duringGuardString([]);
        $this->shouldThrow(new \InvalidArgumentException('The string should not be empty'))->duringGuardString('    ');
    }

    function it_expects_a_string_length_to_be_in_positive_integer_range()
    {
        $start = 0;
        $end = 15;
        $string = 'small string';

        $this::shouldBeLengthInRange($string, $start, $end);

        $start = -1;
        $this->shouldThrow(new \InvalidArgumentException('Start and end value should be positives'))->duringIsLengthInRange($string, $start, $end);

        $start = 0;
        $end = -1;
        $this->shouldThrow(new \InvalidArgumentException('Start and end value should be positives'))->duringIsLengthInRange($string, $start, $end);

        $start = 'ha';
        $end = 2;
        $this->shouldThrow(new \InvalidArgumentException('Start and end value should be integers'))->duringIsLengthInRange($string, $start, $end);

        $start = 0;
        $end = 'rt';
        $this->shouldThrow(new \InvalidArgumentException('Start and end value should be integers'))->duringIsLengthInRange($string, $start, $end);

        $start = 5;
        $end = 2;
        $this->shouldThrow(new \InvalidArgumentException('Start value should be less than end value'))->duringIsLengthInRange($string, $start, $end);
    }

}
