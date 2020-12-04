@extends('admin_layout')
@section('admin_content')
<ul class="breadcrumb">
  <li>
    <i class="icon-home"></i>
    <a href="{{URL::to('/dashboard')}}">Home</a>
    <i class="icon-angle-right"></i>
  </li>
  <li><a href="{{URL::to('/admin.all_slider')}}">Slider</a></li>
</ul>
<p class="alert-success">
<?php
$message = Session::get('message');
if ($message) {
  echo($message);
  Session::put('message',null);

}
 ?>
 </p>

<div class="row-fluid sortable">
  <div class="box span12">
    <div class="box-header" data-original-title>
      <h2><i class="halflings-icon user"></i><span class="break"></span>All slider</h2>

      <div class="box-icon">
        <a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
        <a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
        <a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
      </div>
    </div>

    <div class="box-content">
      <a  href="{{URL::to('/add-slider')}}">Add Slider</a>
      <table class="table table-striped table-bordered bootstrap-datatable datatable">
        <thead>
          <tr>
            <th>slider ID</th>
            <th>slider Title</th>
            <th>slider Description</th>
            <th>slider Image</th>
            <th>Status</th>
            <th>Actions</th>
          </tr>
        </thead>
        @foreach($all_slider_info as $v_slider)
        <tbody>
        <tr>
          <td>{{$v_slider->slider_id}}</td>
          <td class="center">{{$v_slider->slider_title}}</td>
          <td class="center">{{$v_slider->slider_description}}</td>
          <td class="center"><img src="{{ URL::to($v_slider->slider_image) }}" alt="">  </td>
          <td class="center">
            @if($v_slider->publication_status==1)

              <span class="label label-success">Active</span>

            @else
              <span class="label label-danger">Inactive</span>
            @endif
            </td>

          <td class="center">
            @if($v_slider->publication_status==1)

            <a class="btn btn-danger" href="{{URL::to('/inactive_slider/'.$v_slider->slider_id)}}">
              <i class="halflings-icon white thumbs-down"></i>
            </a>

            @else
            <a class="btn btn-success" href="{{URL::to('/active_slider/'.$v_slider->slider_id)}}">
              <i class="halflings-icon white thumbs-up"></i>
            </a>
            @endif

            <a class="btn btn-info" href="{{URL::to('/edit_slider/'.$v_slider->slider_id)}}">
              <i class="halflings-icon white edit"></i>
            </a>
            <a class="btn btn-danger" href="{{URL::to('/delete_slider/'.$v_slider->slider_id)}}" id="delete">
              <i class="halflings-icon white trash"></i>
            </a>
          </td>
        </tr>

        </tbody>
        @endforeach
      </table>
    </div>
  </div><!--/span-->

</div><!--/row-->

@endsection
