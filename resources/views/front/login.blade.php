@extends('front.default')
@section('title'){{trans('front.login')}} @Stop
@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Please Sign In</h3>
                    </div>
                    <div class="panel-body">
                        {!! Form::open(array('url'=>'login','method'=>'POST')) !!}
                            <fieldset>
                                <div class="form-group">
                                    {!! Form::email('email', '', array('class'=>'form-control','placeholder'=>trans('front.email'))) !!}
                                </div>
                                <div class="form-group">
                                    {!! Form::password('password', array('class'=>'form-control','placeholder'=>trans('front.password'))) !!}
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input name="remember" type="checkbox" value="Remember Me">Remember Me
                                    </label>
                                </div>
                                <!-- Change this to a button or input when using this as a form -->
                                {!! Form::submit(trans('front.sign_up'), array('class'=>'btn btn-success btn-quirk btn-block')) !!}
                            </fieldset>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery -->
    <script src="../bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>
@Stop