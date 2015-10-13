@extends('member.default')

@section('title'){{trans('member.home')}} @Stop
@section('homeclass')nav-active @Stop

@section('content')

<div id="onlineuser">
    <div class="oluserlist chatbar-collapse">
        <ul>
            <li>
                <img class="img-rounded" src="{{asset('profiles/no_img.jpg')}}"/>
                <div class="olname">Khairul Azlan</div>
                <div class="olindicator"><span class="fa fa-circle"></span></div>
                <div style="clear:both;"></div>
            </li>
            <li>
                <img class="img-rounded" src="{{asset('profiles/no_img.jpg')}}"/>
                <div class="olname">Khairul Azlan</div>
                <div class="olindicator"><span class="fa fa-circle"></span></div>
                <div style="clear:both;"></div>
            </li>

        </ul>
    </div>
</div>

<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">

            <div class="col-lg-12">
                <h1 class="page-header">Blank</h1>
                <p id="dimensions">sdasd</p>
            </div>

        </div>
    </div>
</div>

<script>
    window.onresize = displayWindowSize;
    window.onload = displayWindowSize;
    function displayWindowSize() {
        // your size calculation code here
        document.getElementById("dimensions").innerHTML = myWidth + "x" + myHeight;
    };
</script>
@Stop
