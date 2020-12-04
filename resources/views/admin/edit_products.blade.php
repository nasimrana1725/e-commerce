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
    <a href="{{URL::to('/admin.edit_products')}}">Update products</a>
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
      <form class="form-horizontal" action="{{url('/update_products',$products_info->products_id)}}" method="post">
        {{csrf_field()}}
        <fieldset>
        <div class="control-group">
          <label class="control-label" for="date01">products Name</label>
          <div class="controls">
          <input type="text" class="input-xlarge" name="products_name" value="{{$products_info->products_name}}">
          </div>
        </div>

        <div class="control-group">
        <label class="control-label" for="selectError3">products Category</label>


        <div class="controls">
          <select id="selectError3" name="category_id">
            <?php
            $all_pubished_category=DB::table('category')
                                       ->where('publication_status',1)
                                       ->get();
            foreach ($all_pubished_category as $v_category) {
            ?>
          <option value="{{$v_category->category_id}}">{{$v_category->category_name}}</option>
          <?php
          }
          ?>
          </select>
        </div>
        </div>

        <div class="control-group">
        <label class="control-label" for="selectError3">products Manufacture</label>
        <div class="controls">
          <select id="selectError3" name="manufacture_id">
            <?php
            $all_pubished_manufacture=DB::table('manufacture')
                                       ->where('publication_status',1)
                                       ->get();
            foreach ($all_pubished_manufacture as $v_manufacture) {
            ?>
          <option value="{{$v_manufacture->manufacture_id}}">{{$v_manufacture->manufacture_name}}</option>
          <?php
          }
          ?>
          </select>
        </div>
        </div>

        <div class="control-group hidden-phone">
          <label class="control-label" for="textarea2">Products Short Description</label>
          <div class="controls">
          <textarea class="cleditor" name="products_short_description" rows="3" >{{$products_info->products_short_description}}</textarea>
          </div>
        </div>

        <div class="control-group hidden-phone">
          <label class="control-label" for="textarea2">Products Long Description</label>
          <div class="controls">
          <textarea class="cleditor" name="products_long_description" rows="3">{{$products_info->products_long_description}}</textarea>
          </div>
        </div>

        <div class="control-group">
          <label class="control-label" for="date01">products Price</label>
          <div class="controls">
          <input type="text" class="input-xlarge" name="products_price" value="{{$products_info->products_price}}">
          </div>
        </div>

        <div class="control-group">
          <label class="control-label" for="date01">Products Basic Price</label>
          <div class="controls">
          <input type="text" class="input-xlarge" name="products_basic_price" value="{{$products_info->products_basic_price}}">
          </div>
        </div>

        <div class="control-group">
          <label class="control-label" for="fileInput">Products Image</label>
          <div class="controls">
          <img src="{{ URL::to($products_info->products_image) }}" style="display: block; height: 300px; width: 300px;" alt="">
          <input class="input-file uniform_on" name="products_image" id="products_image" type="file" value="{{ URL::to($products_info->products_image) }}">
          </div>
        </div>



        <div class="control-group">
          <label class="control-label" for="date01">products Size</label>
          <div class="controls">
          <input type="text" class="input-xlarge" name="products_size" value="{{$products_info->products_size}}">
          </div>
        </div>

        <div class="control-group">
          <label class="control-label" for="date01">products Color</label>
          <div class="controls">
          <input type="text" class="input-xlarge" name="products_color" value="{{$products_info->products_color}}">
          </div>
        </div>

        <div class="form-actions">
          <button type="submit" class="btn btn-primary">Update products</button>
          <button type="reset" class="btn" href="{{URL::to('/admin.all_products')}}">Cancel</button>
        </div>
        </fieldset>
      </form>

    </div>
  </div><!--/span-->

</div><!--/row-->

@endsection
