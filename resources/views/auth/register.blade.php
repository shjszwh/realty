@extends('layouts.realty')

@section('content')
    <el-row type="flex" class="row-bg login" justify="center">
        <el-col :span="12">
            <el-card class="box-card">
                <div slot="header" class="clearfix">
                    <span style="line-height: 36px;">注册新用户</span>
                </div>
                <el-form ref="form" :label-position="labelPosition" label-width="80px" method="POST"
                         action="{{ route('register') }}">
                    {{ csrf_field() }}

                    <div class="el-form-item {{ $errors->has('name') ? ' has-error' : '' }}">
                        <label for="name" class="el-form-item__label">用户名</label>
                        <div class="el-form-item__content" style="margin-left: 80px;">
                            <div class="el-input">
                                <input id="name" type="text" class="el-input__inner" name="name"
                                       value="{{ old('name') }}"
                                       required autofocus>
                            </div>
                            @if ($errors->has('name'))
                                <div class="el-form-item__error">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </div>
                            @endif
                        </div>
                    </div>

                    <div class="el-form-item {{ $errors->has('email') ? ' has-error' : '' }}">
                        <label for="email" class="el-form-item__label">邮箱</label>

                        <div class="el-form-item__content" style="margin-left: 80px;">
                            <div class="el-input">
                                <input id="email" type="email" class="el-input__inner" name="email"
                                       value="{{ old('email') }}"
                                       required>
                            </div>
                            @if ($errors->has('email'))
                                <div class="el-form-item__error">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </div>
                            @endif
                        </div>
                    </div>

                    <div class="el-form-item {{ $errors->has('password') ? ' has-error' : '' }}">
                        <label for="password" class="el-form-item__label">密码</label>

                        <div class="el-form-item__content" style="margin-left: 80px;">
                            <div class="el-input">
                                <input id="password" type="password" class="el-input__inner" name="password" required>
                            </div>
                            @if ($errors->has('password'))
                                <div class="el-form-item__error">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </div>
                            @endif
                        </div>
                    </div>

                    <div class="el-form-item ">
                        <label for="password-confirm" class="el-form-item__label">重输密码</label>

                        <div class="el-form-item__content" style="margin-left: 80px;">
                            <div class="el-input">
                                <input id="password-confirm" type="password" class="el-input__inner"
                                       name="password_confirmation" required>
                            </div>
                        </div>
                    </div>

                    <div class="el-form-item ">
                        <div class="el-form-item__content" style="margin-left: 80px;">
                            <button type="submit" class="el-button el-button--primary">
                                注册
                            </button>
                        </div>
                    </div>
                </el-form>
            </el-card>
        </el-col>
    </el-row>
@endsection

@section('js')
    <script src="{{  mix('js/register.js')  }}"></script>
@endsection
@section('css')
    <style>
        .login {
            margin: 40px;
        }
    </style>
@endsection