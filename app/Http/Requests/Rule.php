<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Rule extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     * 允许不允许验证
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'user_tel'=>array(
                'required','regex:/^1[345789][0-9]{9}$/','between:11,11',
            ),
            
            'user_pwd' => 'required|numeric',
            'password' =>'required|same:user_pwd'
        ];
    }

    /**
        * 获取被定义验证规则的错误消息
        *

        * @return array
        * @translator laravelacademy.org
    */
        public function messages(){
            return [
                'user_tel.required' => '手机不能为空，并输入正确手机号',
                'user_tel.regex'=>'填1/345789开头的11位电话',
                'user_pwd.required' => '密码不能为空，必须是数字',
                'user_pwd.numeric' => '密码必须是数字',
                'password.confirmed' => '密码与确认密码一致',
            ];
        }
}
