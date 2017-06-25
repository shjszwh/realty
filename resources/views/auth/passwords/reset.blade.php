@extends('layouts.realty')

@section('content')
    <el-row type="flex" class="row-bg login" justify="center">
        <el-col :span="12">
            <el-card class="box-card">
                <div slot="header" class="clearfix">
                    <span style="line-height: 36px;">密码重置</span>
                </div>

                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif
                <el-form ref="form" :label-position="labelPosition" label-width="80px" method="POST"
                         action="{{ route('password.request') }}">
                    {{ csrf_field() }}

                    <input type="hidden" name="token" value="{{ $token }}">

                    <div class="el-form-item {{ $errors->has('email') ? ' has-error' : '' }}">
                        <label for="email" class="el-form-item__label">邮箱</label>

                        <div class="el-form-item__content" style="margin-left: 80px;">
                            <div class="el-input">
                                <input id="email" type="email" class="el-input__inner" name="email"
                                       value="{{ $email or old('email') }}" required autofocus>
                            </div>
                            @if ($errors->has('email'))
                                <span class="el-form-item__error">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>

                    <div class="el-form-item {{ $errors->has('password') ? ' has-error' : '' }}">
                        <label for="password" class="el-form-item__label">新密码</label>

                        <div class="el-form-item__content" style="margin-left: 80px;">
                            <div class="el-input">
                                <input id="password" type="password" class="el-input__inner" name="password" required>
                            </div>
                            @if ($errors->has('password'))
                                <span class="el-form-item__error">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>

                    <div class="el-form-item {{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                        <label for="password-confirm" class="el-form-item__label">确认密码</label>
                        <div class="el-form-item__content" style="margin-left: 80px;">
                            <div class="el-input">
                                <input id="password-confirm" type="password" class="el-input__inner"
                                       name="password_confirmation" required>
                            </div>
                            @if ($errors->has('password_confirmation'))
                                <span class="el-form-item__error">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>

                    <div class="el-form-item ">
                        <div class="el-form-item__content" style="margin-left: 80px;">
                            <div class="el-input"></div>
                            <button type="submit" class="el-button el-button--primary">
                                重置密码
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