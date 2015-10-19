@extends('front.default')
@section('title'){{trans('front.login')}} @Stop
@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">{{trans('front.welcome_please_login')}}</h3>
                    </div>
                    <div class="panel-body">
                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <fieldset>

                            {!! Form::open(array('url'=>'login','method'=>'POST')) !!}
                                <div class="form-group">
                                    {!! Form::email('email', '', array('class'=>'form-control','placeholder'=>trans('front.email'))) !!}
                                </div>
                                <div class="form-group">
                                    {!! Form::password('password', array('class'=>'form-control','placeholder'=>trans('front.password'))) !!}
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input name="rememberme" type="checkbox" value="1">{{trans('front.remember_me')}}
                                    </label>
                                </div>
                                {!! Form::submit(trans('front.login'), array('class'=>'btn btn-success btn-block')) !!}
                                <br>
                                <a href="{{URL::route('signup')}}" class="btn btn-default btn-block">{{trans('front.not_a_member_sign_up')}}</a>
                            {!! Form::close() !!}
                        </fieldset>
                    </div>

                    <div id="polyglotLanguageSwitcher" class="front_langchooser">
                        <form id="updatelang" action="{{URL::route('set-locale')}}">
                            <select id="polyglot-language-options">
                                <option id="en" value="en" @if(Lang::locale() == 'en') selected @endif>English</option>
                                <option id="my" value="my" @if(Lang::locale() == 'my') selected @endif>Bahasa</option>
                            </select>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>

@Stop