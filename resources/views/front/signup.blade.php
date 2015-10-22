@extends('front.default')
@section('title'){{trans('front.sign_up')}} @Stop
@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">{{trans('front.signup_new_account')}}</h3>
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

                        {!! Form::open(array('url'=>'signup','method'=>'POST')) !!}
                            <fieldset>
                                <div class="form-group">
                                    {!! Form::email('email', '', array('class'=>'form-control','placeholder'=>trans('front.email'))) !!}
                                </div>
                                <div class="form-group">
                                    {!! Form::password('password', array('class'=>'form-control','placeholder'=>trans('front.password'))) !!}
                                </div>
                                <div class="form-group">
                                    {!! Form::password('repassword', array('class'=>'form-control','placeholder'=>trans('front.confirm_password'))) !!}
                                </div>
                                <!-- Change this to a button or input when using this as a form -->
                                {!! Form::submit(trans('front.sign_up'), array('class'=>'btn btn-success btn-quirk btn-block')) !!}
                                <br>
                                <a href="{{URL::route('login')}}" class="btn btn-default btn-block">{{trans('front.already_a_member')}} {{trans('front.login_now')}}</a>
                            </fieldset>
                        {!! Form::close() !!}
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