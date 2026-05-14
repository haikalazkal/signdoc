<?php

function validateFile($fileName)
{
    $allowed = ['pdf', 'txt'];

    $ext = strtolower(
        pathinfo($fileName, PATHINFO_EXTENSION)
    );

    if(in_array($ext, $allowed)){
        return true;
    }

    return false;
}
?>