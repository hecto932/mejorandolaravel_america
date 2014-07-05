<?php
/**
 * Created by PhpStorm.
 * User: Hector Jose
 * Date: 5/07/14
 * Time: 18:38
 */

namespace HireMe\Managers;


class ValidationException extends \Exception{

    protected $errors;

    public function __construct($message, $errors)
    {
        $this->errors = $errors;
        parent::__construct($message);
    }

    public function getErrors()
    {
        return $this->errors;
    }
} 