@extends('member.default')

@section('title'){{trans('member.personal_info')}} @Stop
@section('homeclass')nav-active @Stop

@section('content')
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                <h2 class="panel-title">{{trans('member.personal_info')}}</h2>
                <p class="panel-subtitle">Update your personal information</p>
            </header>

            <div class="panel-body">


                <div class="form-group">
                    <label class="col-md-3 control-label text-right" for="inputDefault">Profile Picture</label>
                    <div class="col-md-6">
                        <div class="media-left">
                            <img src="../profiles/no_img.jpg" width="100" alt="person">
                        </div>
                        <div class="media-body media-middle">

                            {!! Form::open(array('url'=>'members/uploadprofile','method'=>'POST', 'files'=>true, 'id'=>'profileuploadform')) !!}
                            <div class="control-group">
                                <div class="controls">
                                    {!! Form::file('image', array('id'=>'uploadfile', 'class'=>'filestyle')) !!}
                                    <small class="text-muted">Your image will be resize & crop to 100x100px</small>
                                </div>
                            </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>

                <hr>

                <form action="{{ URL::route('home') }}" class="form-horizontal form-bordered" method="POST">
                    <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">

                    <div class="form-group">
                        <label class="col-md-3 control-label" for="inputDefault">First Name</label>
                        <div class="col-md-6">
                            <input type="text" name="firstname" class="form-control" id="inputDefault" value="{{ Auth::user()->firstname }}">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label" for="inputDefault">Last Name</label>
                        <div class="col-md-6">
                            <input type="text" name="lastname" class="form-control" id="inputDefault" value="{{ Auth::user()->lastname }}">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label" for="inputDefault">Address</label>
                        <div class="col-md-6">
                            <input type="text" name="address" class="form-control" id="inputDefault" value="{{ Auth::user()->address }}">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label" for="inputDefault">City</label>
                        <div class="col-md-6">
                            <input type="text" name="city" class="form-control" id="inputDefault" value="{{ Auth::user()->city }}">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label" for="inputDefault">Zipcode</label>
                        <div class="col-md-6">
                            <input type="text" name="zipcode" class="form-control" id="inputDefault" value="{{ Auth::user()->zipcode }}">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label" for="inputDefault">State</label>
                        <div class="col-md-6">
                            <input type="text" name="state" class="form-control" id="inputDefault" value="{{ Auth::user()->state }}">
                        </div>
                    </div>


                    <div class="form-group">
                        <label class="col-md-3 control-label" for="inputDefault"></label>
                        <div class="col-md-6">
                            <input class="btn btn-primary hidden-xs" type="submit" value="Save Changes">
                            <input class="btn btn-primary btn-block btn-lg visible-xs mt-lg" type="submit" value="Save Changes">

                        </div>
                    </div>


                </form>
            </div>
        </section>



    </div>
</div>
@Stop

