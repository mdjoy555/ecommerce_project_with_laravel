<!DOCTYPE html>
<html lang="en">
    <base href="/public">
  <head>
    @include('admin.css')
    <style type="text/css">
      .title
      {
        color: white;
        padding-top: 25px;
        font-size: 25px;
      }
      label
      {
        display: inline-block;
        width: 200px;
      }
    </style>
  </head>
  <body>
    @include('admin.sidebar')
      @include('admin.navbar')
      <div class="container-fluid page-body-wrapper">
        <div class="container" align="center">
          <h1 class="title">Add Product</h1>
          @if(session()->has('message'))
            <div class="alert alert-success">
              <!-- <button type="button" class="close" data-dismiss="alert">x</button> -->
              {{session()->get('message')}}
            </div>
          @endif
          <form action="{{url('edit',$data->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div style="padding: 15px;">
              <label>Product Title</label>
              <input style="color: black;" type="text" name="title" value="{{$data->title}}" required="">
            </div>
            <div style="padding: 15px;">
              <label>Product Price</label>
              <input style="color: black;" type="number" name="price" value="{{$data->price}}" required="">
            </div>
            <div style="padding: 15px;">
              <label>Product Description</label>
              <input style="color: black;" type="text" name="description" value="{{$data->description}}" required="">
            </div>
            <div style="padding: 15px;">
              <label>Product Quantity</label>
              <input style="color: black;" type="text" name="quantity" value="{{$data->quantity}}" required="">
            </div>
            <div style="padding: 15px;">
              <label>Old Image</label>
              <img height="100px" width="100px" src="/productimage/{{$data->image}}">
            </div>
            <div style="padding: 15px;">
              <input type="file" name="image" required="">
            </div>
            <div style="padding: 15px">
              <input class="btn btn-success" type="submit">
            </div>
          </form>
        </div>
      </div>
      @include('admin.script')
</html>