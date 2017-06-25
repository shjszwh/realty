@extends('layouts.realty')

@section('content')
    <el-row type="flex" class="row-bg login" justify="center">
        <el-col :span="12">
            <el-card class="box-card">
                <div slot="header" class="clearfix">
                    <span style="line-height: 36px;">用户登录</span>
                </div>
                <el-form ref="form" :label-position="labelPosition" label-width="80px" method="POST"
                         action="{{ route('login') }}">
                    {{ csrf_field() }}
                    <div class="el-form-item {{ $errors->has('email') ? ' has-error' : '' }}">
                        <label for="email" class="el-form-item__label">邮箱地址</label>

                        <div class="el-form-item__content" style="margin-left: 80px;">
                            <div class="el-input">
                                <input id="email" type="email" class="el-input__inner" name="email"
                                       value="{{ old('email') }}" required autofocus>
                            </div>
                            @if ($errors->has('email'))
                                <div class="el-form-item__error">
                                    {{ $errors->first('email') }}
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
                                    {{ $errors->first('password') }}
                                </div>
                            @endif
                        </div>
                    </div>

                    <div class="el-form-item">
                        <div class="el-form-item__content" style="margin-left: 80px;">
                            <div class="el-input">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox"
                                               name="remember" {{ old('remember') ? 'checked' : '' }}> 下次免登录
                                    </label>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="el-form-item">
                        <div class="el-form-item__content" style="margin-left: 80px;">
                            <div class="el-input">
                                <button type="submit" class="el-button el-button--primary">
                                    登录
                                </button>

                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    忘记密码?
                                </a>
                            </div>
                        </div>
                    </div>
                </el-form>
            </el-card>
        </el-col>
    </el-row>
@endsection
@section('js')
    <script src="{{  mix('js/login.js')  }}"></script>
@endsection
@section('css')
    <style>
        .login {
            margin: 40px;
        }
    </style>
@endsection
