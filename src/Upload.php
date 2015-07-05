<?php

namespace Viraj\Upload;

use Viraj\Upload\Exceptions\InvalidFileException;

class Upload
{
    private $files;

    private $field_name;

    public function __construct( $field_name )
    {
        $this->field_name = $field_name;
        $this->files = $this->normalize( $_FILES[ $field_name ] );
    }

    /**
     * @param $argument
     *
     * @return mixed
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

    /**
     * @param $field_name
     *
     * @throws \Viraj\Upload\Exceptions\InvalidFileException
     */
    public function file( $field_name )
    {
        if ( trim( $field_name ) == '' )
        {
            throw new InvalidFileException( 'File seems to be corrupt or Invalid' );
        }

        $this->files = $this->normalize( $_FILES );
    }
}
