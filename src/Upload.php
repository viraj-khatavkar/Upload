<?php

namespace Viraj\Upload;

use Viraj\Upload\Exceptions\InvalidFileException;

class Upload
{
    public function file($field_name)
    {
        if (trim($field_name) == '')
        {
            throw new InvalidFileException('File seems to be corrupt or Invalid');
        }
    }
}
