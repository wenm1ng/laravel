<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HomeRegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function rules()
    {
        return [
            //
            'username'=>'required',//用户名规则
            'username'=>'regex:/\w{4,16}/',
            'username'=>'unique:lv_user,login_name',
            'email'=>'required',
            'email'=>'email',
            'email'=>'unique:lv_user:email',
            'password'=>'required',
            'repassword'=>'required',
            'repassword'=>'same:password',
            'code'=>'required',
        ];
    }

    public function messages(){
        return [
            'username.required'=>'用户名不能为空',
            'username.regex'=>'用户名不符合规则',
            'username.unique'=>'用户名已经被注册',
            'email.required'=>'邮箱不能为空',
            'email.email'=>'邮箱不符合规则',
            'email.unique'=>'该邮箱已经被注册',
            'password.require'=>'密码不能为空',
            'repassword.require'=>'确认密码不能为空',
            'repassword.same'=>'两次密码不一致',
            'code.require'=>'验证码不能为空',
        ];
    }
}
