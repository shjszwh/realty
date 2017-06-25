@extends('layouts.realty')

@section('content')
    <div class="row-bg el-row is-justify-center el-row--flex">
        <div class="el-col el-col-16">
            <div class="panel panel-default">
                <div class="panel-heading">重置密码</div>
                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form class="el-form demo-form-inline el-form--inline" role="form" method="POST"
                          action="{{ route('password.email') }}">
                        {{ csrf_field() }}

                        <div class="el-form-item {{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="el-form-item__label">注册邮箱</label>

                            <div class="el-form-item__content">
                                <div class="el-input">
                                    <input id="email" type="email" class="el-input__inner" name="email"
                                           value="{{ old('email') }}" required>

                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="el-form-item ">
                            <div class="el-form-item__content">
                                <button type="submit" class="el-button el-button--primary">
                                    发送密码重置邮件
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
