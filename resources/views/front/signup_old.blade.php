@extends('front.default')
@section('title'){{trans('front.sign_up')}} @Stop
@section('content')
<div class="sign-overlay"></div>
<div class="signpanel"></div>

<div class="signup">
    <div class="row">
        <div class="col-sm-5">
            <div class="panel">
                <div class="panel-heading">
                    <div id="xbticon">
                        <span class="xbt-icon">X<span style="font-size:45px;" class="fa fa-bitcoin"></span>T</span>
                        <span class="xbt-text">Charity</span>
                    </div>
                    <h4 style="color:white; text-align:center;">{{trans('front.signup_new_account')}}</h4>
                </div>
                <div class="panel-body">
                    <button class="btn btn-primary btn-quirk btn-fb btn-block">{{trans('front.signup_using')}} Facebook</button>
                    <div class="or">{{trans('front.or')}}</div>

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
                        <div class="form-group mb15">
                            {!! Form::email('email', '', array('class'=>'form-control','placeholder'=>trans('front.email'))) !!}
                        </div>
                        <div class="row mb15">
                            <div class="col-xs-6">
                                <div class="form-group">
                                    {!! Form::password('password', array('class'=>'form-control','placeholder'=>trans('front.password'))) !!}
                                </div>
                            </div>
                            <div class="col-xs-6">
                                <div class="form-group">
                                    {!! Form::password('repassword', array('class'=>'form-control','placeholder'=>trans('front.confirm_password'))) !!}
                                </div>
                            </div>
                        </div>

                        <div class="row mb15">
                            <div class="col-sm-12 small">
                                <div id="basic" data-input-name="country" data-selected-country="MY"></div>
                            </div>
                        </div>

                        <div class="form-group">
                            {!! Form::submit(trans('front.sign_up'), array('class'=>'btn btn-success btn-quirk btn-block')) !!}
                        </div>

                        <div class="form-group visible-xs">
                            <a href="{{URL::route('login')}}" class="btn btn-default btn-quirk btn-stroke btn-stroke-thin btn-block btn-sign">{{trans('front.already_a_member')}} {{trans('front.login_now')}}</a>
                        </div>
                    {!! Form::close() !!}
                    <br>
                        <div class="lang_container">
                            <div id="polyglotLanguageSwitcher" class="pull-right">
                                <form action="set-locale">
                                    <select id="polyglot-language-options">
                                        <option id="en" value="en" @if(Lang::locale() == 'en') selected @endif>English</option>
                                        <option id="my" value="my" @if(Lang::locale() == 'my') selected @endif>Bahasa</option>
                                    </select>
                                </form>
                            </div>
                            <div style="height:10px;"></div>
                        </div>

                </div><!-- panel-body -->
            </div><!-- panel -->
        </div><!-- col-sm-5 -->
        <div class="col-sm-7">
            <div class="sign-sidebar">
                <h3 class="signtitle mb20"><strong>{{trans('front.signup_title')}}</strong></h3>

                <h4 class="reason">{{trans('front.signup_first_title')}}</h4>
                <p>{{trans('front.signup_first_text')}}</p>

                <br>

                <h4 class="reason">{{trans('front.signup_second_title')}}</h4>
                <p>{{trans('front.signup_second_text')}}</p>

                <div class="or">{{trans('front.your_ref_info')}}</div>
                <div style="padding-left:100px;">

                    <p><strong>Firstname Lastname</strong></p>
                    <p>+60123456789 (Malaysia)<br>
                    <em>email@address.com</em></p>

                </div>

                <hr class="invisible">

                <div class="form-group">
                    <a href="{{URL::route('login')}}" class="btn btn-default btn-quirk btn-stroke btn-stroke-thin btn-block btn-sign">{{trans('front.already_a_member')}} {{trans('front.login_now')}}</a>
                </div>
            </div><!-- sign-sidebar -->
        </div>
    </div>
</div><!-- signup -->
@Stop