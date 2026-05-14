<?php

function generateHash($filePath)
{
    return hash_file(
        'sha256',
        $filePath
    );
}
?>