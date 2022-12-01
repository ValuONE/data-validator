<?php
/*
 * Copyright (c) 2022 by Valu. All rights reserved
 *
 * @author Valu
 */

namespace Valu\PostValidator\Validator;

use Valu\PostValidator\Handler\ValidationException;

class Validator
{
    /**
     * @param array $data The data array that should be validated
     * @param array $rules The array of rules that are being applied to the data
     *
     * @throws ValidationException
     */
    public static function validate(array $data, array $rules): void
    {
        foreach ($data as $key => $d) {
            foreach ($rules[$key] as $rule) {
                switch ($rule) {
                    case 'required': {
                        if ($d === null || $d === '') {
                            throw new ValidationException("Data is empty or null");
                        }
                        break;
                    }
                    case 'string': {
                        if (gettype($d) !== "string"){
                            throw new ValidationException("Data is not a string");
                        }
                        break;
                    }
                    case 'integer': {
                        if (gettype($d) !== "integer"){
                            throw new ValidationException("Data is not an integer");
                        }
                        break;
                    }
                }
            }
        }
    }
}