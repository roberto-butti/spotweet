@extends('layouts.master')

@section('custom_javascripts')
  <!-- js of main.blade.php -->
  @include('block.js_map')

@stop




@section('content_map')
<h1>Main</h1>
<div id="map-canvas" style="width:100%; height:800px"></div>
@stop

@section('content_charts')
<div class="row">
  <div class="large-4 columns">
    <div id="chart_div_lang" style="width:100%; height:300"></div>
  </div>
  <div class="large-4 columns">
    <div id="chart_div_user" style="width:100%; height:300"></div>
  </div>
  <div class="large-4 columns">
    <div id="chart_div_hashtag" style="width:100%; height:300"></div>
  </div>


@stop  