@extends('admin_layout')
@section('admin_content')
<ul class="breadcrumb">
  <li>
    <i class="icon-home"></i>
    <a href="{{URL::to('/dashboard')}}">Home</a>
    <i class="icon-angle-right"></i>
  </li>
  <li>
    <i class="icon-edit"></i>
    <a href="{{URL::to('/admin.edit_manufacture')}}">Update manufacture</a>
  </li>
</ul>

<div class="row-fluid sortable">
  <div class="box span12">
    <div class="box-header" data-original-title>
      <h2><i class="halflings-icon edit"></i><span class="break"></span>Form Elements</h2>
      <div class="box-icon">
        <a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
        <a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
        <a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
      </div>
    </div>

    <p class="alert-success">
    <?php
    $message = Session::get('message');
    if ($message) {
      echo($message);
      Session::put('message',null);

    }
     ?>
     </p>
    <div class="box-content">
      <form class="form-horizontal" action="{{url('/update_manufacture',$manufacture_info->manufacture_id)}}" method="post">
        {{csrf_field()}}
        <fieldset>
        <div class="control-group">
          <label class="control-label" for="date01">manufacture Name</label>
          <div class="controls">
          <input type="text" class="input-xlarge" name="manufacture_name" value="{{$manufacture_info->manufacture_name}}">
          </div>
        </div>

        <div class="control-group hidden-phone">
          <label class="control-label" for="textarea2">manufacture Description</label>
          <div class="controls">
          <textarea class="cleditor" name="manufacture_description" rows="3" value="">{{$manufacture_info->manufacture_description}}</textarea>
          </div>
        </div>

        <div class="form-actions">
          <button type="submit" class="btn btn-primary">Update manufacture</button>
          <button type="reset" class="btn" href="{{URL::to('/admin.all_manufacture')}}">Cancel</button>
        </div>
        </fieldset>
      </form>

    </div>
  </div><!--/span-->

</div><!--/row-->

@endsection
