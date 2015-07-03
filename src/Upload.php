<?php

namespace Viraj\Upload;

use Viraj\Upload\Exceptions\InvalidFileException;

class Upload
{
    public function file($field_name)
    {
        if (trim ($field_name) == '') {
            throw new InvalidFileException('File seems to be corrupt or Invalid');
        }
    }

    public function normalize($argument)
    {
        $newfiles = [ ];

        foreach ($argument as $fieldname => $fieldvalue):
            foreach ($fieldvalue as $paramname => $paramvalue):
                foreach ((array)$paramvalue as $index => $value):
                    $newfiles[ $fieldname ][ $index ][ $paramname ] = $value;
                endforeach;
            endforeach;
        endforeach;

        return $newfiles[ 'files' ];
    }
}
