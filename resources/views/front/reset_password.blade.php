@extends('front.default')
@section('title'){{trans('front.reset_password')}} @Stop
@section('content')
<section class="body-sign">
    <div class="center-sign">
        <div id="xbticon"><span class="xbt-icon">X<span style="font-size:45px;" class="fa fa-bitcoin"></span>T</span><span class="xbt-text">Charity</span></div>

        <div class="panel panel-sign">
            <div class="panel-title-sign mt-xl text-right">
                <h2 class="title text-uppercase text-weight-bold m-none"><i class="fa fa-envelope mr-xs"></i> {{trans('front.reset_password')}}</h2>
            </div>
            <div class="panel-body">

                @if ($errors->any())
                    <div id="thealert" class='alert alert-danger'><i class="md md-warning"></i> {{ implode('', $errors->all(":message")) }}</div>
                @endif
                @if(Session::has('message'))
                    <div id="thealert" class='alert alert-success'><i class="md md-done"></i> {{ Session::get('message') }}</div>
                @endif

                @if(Session::has('theemail'))

                    <form action="{{ URL::route('reset-password-int') }}" method="post">
                        <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                        <input type="hidden" name="email" value="{{ Session::get('theemail') }}">

                        <div class="form-group mb-none">
                            <div class="row">
                                <div class="col-sm-6 mb-lg">
                                    <label>New Password</label>
                                    <input name="password" type="password" class="form-control input-lg" />
                                </div>
                                <div class="col-sm-6 mb-lg">
                                    <label>New Password Confirmation</label>
                                    <input name="repassword" type="password" class="form-control input-lg" />
                                </div>
                            </div>
                        </div>


                        <div class="col-col-9 text-right">
                            <button type="submit" class="btn btn-primary hidden-xs">Change Password</button>
                            <button type="submit" class="btn btn-primary btn-block btn-lg visible-xs mt-lg">Change Password</button>
                        </div>

                        <hr>

                        <p class="text-center mt-lg">Remembered? <a href="{{ URL::route('login') }}">Sign In!</a>


                        <hr>
                    </form>

                @else

                    {!! Form::open(array('url'=>URL::route('reset-password'),'method'=>'POST')) !!}
                        <div class="alert alert-info">
                            <p class="m-none text-weight-semibold h6">{{trans('front.enter_your_email_below_and')}}</p>
                        </div>

                        <div class="form-group mb-none">
                            <div class="input-group">
                                {!! Form::text('email', Input::old('email'), array('class' => 'form-control input-lg','tabindex' => '1', 'placeholder' => trans('front.email'))) !!}
									<span class="input-group-btn">
                                        {!! Form::submit(trans('front.reset'), array('class' => 'btn btn-primary btn-lg')) !!}
									</span>
                            </div>
                        </div>

                        <p class="text-center mt-lg">{{trans('front.remembered')}} <a href="{{ URL::route('login') }}">{{trans('front.login')}}</a>


                        <hr>
                    {!! Form::close() !!}

                @endif
            </div>
        </div>

        <p class="text-center text-muted mt-md mb-md">{!!trans('general.footer_copyright')!!}</p>
    </div>
</section>
@Stop