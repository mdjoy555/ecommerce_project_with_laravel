<!DOCTYPE html>
<html lang="en">
  <head>
    @include('admin.css')
  </head>
  <body>
    @include('admin.sidebar')
      @include('admin.navbar')
      <div style="padding-bottom: 30px; margin-left: 30px;" class="container-fluid page-body-wrapper mt-2">
        <div class="container" align="center">
            @if(session()->has('message'))
                <div class="alert alert-success">
                    {{session()->get('message')}}
                </div>
            @endif
            <table>
                <tr style="background-color: grey;">
                    <td style="padding: 20px;">Title</td>
                    <td style="padding: 20px;">Description</td>
                    <td style="padding: 20px;">Quantity</td>
                    <td style="padding: 20px;">Price</td>
                    <td style="padding: 20px;">Image</td>
                    <td style="padding: 20px;">Update</td>
                    <td style="padding: 20px;">Delete</td>
                </tr>
                @if(count($data)>0)
                    @foreach($data as $product)
                        <tr style="background-color: black; align-items: center;">
                            <td>{{$product->title}}</td>
                            <td>{{$product->description}}</td>
                            <td>{{$product->quantity}}</td>
                            <td>{{$product->price}}</td>
                            <td>
                                <img src="/productimage/{{$product->image}}" height="100px" width="100px">
                            </td>
                            <td><a class="btn btn-primary" href="{{url('update',$product->id)}}">Update</a></td>
                            <td><a class="btn btn-danger" href="{{url('delete',$product->id)}}"
                            onclick="return confirm('Are you sure you want to delete?')">Delete</a></td>
                        </tr>
                    @endforeach
                @else
                    <tr><td><td><td style="padding: 10px; font-size: 20px;">
                    There is no product</td></td></td></tr>
                @endif
            </table>
        </div>
      </div>
      @include('admin.script')
</html>