<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class Base64 implements Rule
{
    protected $parameters = [];
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($parameters)
    {
        //
        $this->parameters = $parameters;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        if( 
            $value == '' || 
            is_null($value) || 
            !strpos($value,env('APP_URL'))
        ) return TRUE;

        @list($type, $value) = explode(';', $value);
        @list(, $value) = explode(',', $value);
        if($value) {
            $image = base64_decode($value);
            $f = finfo_open();
            $result = finfo_buffer($f, $image, FILEINFO_MIME_TYPE);
            $result = explode('/',$result);
        
            return in_array($result[1],$this->parameters);
        }
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Los formatos válidos son ' . implode(',',$this->parameters);
    }
}