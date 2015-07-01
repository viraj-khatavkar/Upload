<?php

namespace spec\Viraj\Upload;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class UploadSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Viraj\Upload\Upload');
    }
}
