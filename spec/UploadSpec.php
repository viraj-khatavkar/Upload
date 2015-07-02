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

    function it_should_return_an_exception_for_blank_file_name()
    {
        $this->shouldThrow('Viraj\Upload\Exceptions\InvalidFileException')->during('file', ['']);
    }
}
