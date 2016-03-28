<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected $errors = [];

    public function gatherResponseData($data = [])
    {
    	return [
    		'errors'	=>	$this->errors,
    		'data'		=>	$data,
    	];
    }

    protected function handleException(\Exception $e)
    {
    	$this->errors = [
    		'message'	=>	$e->getMessage(),
    		'file'	=>	$e->getFile(),
    		'line'	=>	$e->getLine(),
    	];

    	return $this->errors;
    }

    /**
     * Gets the value of errors.
     *
     * @return mixed
     */
    public function getErrors()
    {
        return $this->errors;
    }

    /**
     * Sets the value of errors.
     *
     * @param mixed $errors the errors
     *
     * @return self
     */
    protected function setErrors(array $errors)
    {
        $this->errors = $errors;

        return $this;
    }
}
