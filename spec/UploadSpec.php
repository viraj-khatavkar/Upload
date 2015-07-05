<?php

namespace spec\Viraj\Upload;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class UploadSpec extends ObjectBehavior
{
    function let()
    {
        $_FILES['files'] = [
            'name'  => [
                0 => 'demo 1' ,
                1 => 'demo 2'
            ] ,
            'type'  => [
                0 => 'image/jpeg' ,
                1 => 'image/jpeg'
            ] ,
            'error' => [
                0 => 0 ,
                1 => 1
            ]
        ];

        $this->beConstructedWith('files');
    }

    function it_is_initializable()
    {
        $this->shouldHaveType( 'Viraj\Upload\Upload' );
    }

    function it_should_return_an_exception_for_blank_file_name()
    {
        $this->shouldThrow( 'Viraj\Upload\Exceptions\InvalidFileException' )->during( 'file' , [ '' ] );
    }

    function it_should_return_normalized_multidimensional_array_for_native_multidimensional_array_of_files()
    {
        $files = [
            'name'  => [
                0 => 'demo 1' ,
                1 => 'demo 2'
            ] ,
            'type'  => [
                0 => 'image/jpeg' ,
                1 => 'image/jpeg'
            ] ,
            'error' => [
                0 => 0 ,
                1 => 1
            ]
        ];

        $expected_normalized_array = [
            0 => [
                'name'  => 'demo 1' ,
                'type'  => 'image/jpeg' ,
                'error' => 0
            ] ,
            1 => [
                'name'  => 'demo 2' ,
                'type'  => 'image/jpeg' ,
                'error' => 1
            ]
        ];

        $this->normalize( $files )->shouldReturn( $expected_normalized_array );
    }

    function it_should_return_normalized_multidimensional_array_for_native_single_dimensional_array_of_files()
    {
        $files = [
            'name'  => 'demo 1' ,
            'type'  => 'image/jpeg' ,
            'error' => 0
        ];

        $expected_normalized_array = [
            0 => [
                'name'  => 'demo 1' ,
                'type'  => 'image/jpeg' ,
                'error' => 0
            ]
        ];

        $this->normalize( $files )->shouldReturn( $expected_normalized_array );
    }
}
