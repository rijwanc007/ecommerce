<?php

namespace App\Http\Requests;
use App\Http\Requests\FormRequest;

class UserFormRequest extends FormRequest{
    protected $rules = [];
    public function authorize(){
        return true;
    }
    public function rules(){
        $this->rules['username']              = ['required', 'string','min:5', 'max:100','unique:users,username'];
        $this->rules['role_id']               = ['required', 'integer'];
        $this->rules['password']              = ['required', 'string', 'min:8', 'confirmed'];
        $this->rules['password_confirmation'] = ['required', 'string', 'min:8'];
        if(request()->update_id){
            $this->rules['username'][3]              = 'unique:users,username,'.request()->update_id;
            $this->rules['password'][0]              = 'nullable';
            $this->rules['password_confirmation'][0] = 'nullable';
        }

        return $this->rules;
    }
}
