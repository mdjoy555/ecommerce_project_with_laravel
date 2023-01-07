<!DOCTYPE html>
<html lang="en">
  <head>
    @include('admin.css')
  </head>
  <body>
    @include('admin.sidebar')
      @include('admin.navbar')
      <div style="padding-bottom: 30px; margin-left: 1px;" class="container-fluid page-body-wrapper mt-2">
        <div class="container" align="center">
          @if(session()->has('message'))
              <div class="alert alert-success">
                {{session()->get('message')}}
              </div>
          @endif
            <table>
                <tr style="background-color: grey;">
                    <td style="padding: 20px;">Customer Name</td>
                    <td style="padding: 20px;">Phone</td>
                    <td style="padding: 20px;">Address</td>
                    <td style="padding: 20px;">Product</td>
                    <td style="padding: 20px;">Price</td>
                    <td style="padding: 20px;">Quantity</td>
                    <td style="padding: 20px;">Status</td>
                    <td style="padding: 20px;">Action</td>
                </tr>
                @foreach($data as $order)
                    <tr style="background-color: black;" align="center">
                        <td style="padding: 20px;">{{$order->name}}</td>
                        <td style="padding: 20px;">{{$order->phone}}</td>
                        <td style="padding: 20px;">{{$order->address}}</td>
                        <td style="padding: 20px;">{{$order->product_name}}</td>
                        <td style="padding: 20px;">{{$order->price}}</td>
                        <td style="padding: 20px;">{{$order->quantity}}</td>
                        <td style="padding: 20px;">{{$order->status}}</td>
                        <td>
                            <a class="btn btn-success" href="{{url('deliver',$order->id)}}">Delivered</a>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
      </div>
      @include('admin.script')
</html>