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
}
