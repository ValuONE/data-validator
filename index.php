<?php
/*
 * Copyright (c) 2022 by Valu. All rights reserved
 *
 * @author Valu
 */

use Valu\PostValidator\Handler\ValidationException;
use Valu\PostValidator\Validator\Validator;

require 'vendor/autoload.php';

$data = [
    'test' => 123,
];

try {
    Validator::validate($data, [
        'test' => ['required', 'integer'],
    ]);
} catch (ValidationException $exception) {
    die($exception);
}

var_dump($data);