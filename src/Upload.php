<?php

namespace Viraj\Upload;


use Viraj\Upload\Exceptions\InvalidFileException;

class Upload
{
    private $files;
    private $files_key;

    public function __construct( $files_key )
    {
        $this->files_key = $files_key;
        $this->files = $this->normalize( $_FILES[ $files_key ] );
        $this->validate();
    }

    /**
     * @param $argument
     *
     * @return array
     */
    public function normalize( $argument )
    {
        $files = [ ];

        if ( is_array( $argument[ 'name' ] ) )
        {
            foreach ( $argument as $file_parameter => $value_array ):
                foreach ( $value_array as $key => $value ):
                    $files[ $key ][ $file_parameter ] = $value;
                endforeach;
            endforeach;
        }
        else
        {
            foreach ( $argument as $key => $value ):
                $files[ 0 ][ $key ] = $value;
            endforeach;
        }

        return $files;
    }

    public function validate()
    {
        foreach ( $this->files as $file ):
            if ( trim( $file[ 'name' ] ) == '' )
            {
                throw new InvalidFileException;
            }
        endforeach;
    }
}
