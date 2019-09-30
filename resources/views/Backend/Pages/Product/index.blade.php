@extends('Backend.Layout.app')
@section('css_script')

    <link href="{{asset('Backend/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('Backend/css/dataTables.bootstrap.min.css')}}" rel="stylesheet">
    <script type="text/javascript" src="{{asset('Backend/lib/js/jquery-3.3.1.js')}}"></script>
    <script type="text/javascript" src="{{asset('Backend/lib/js/jquery.dataTables.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('Backend/lib/js/dataTables.bootstrap.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('Backend/lib/js/script.js')}}"></script>


@endsection

@section('content')

        <?php
        $message=Session::get('message');
        if($message)
        {?>

             <p class="btn btn-success">
          <?php
             echo $message; Session::flush();
          ?></p>

        <?php
        }
        ?>

<h2>Menufacture table</h2>
        <a href="{{URL::to('product/create')}}"><button class="btn btn-facebook">Add Product</button></a>
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <table id="data" class="table table-striped table-bordered" style="width:100%">
                <thead>
                <tr>
                    <th>Serial No</th>
                    <th>Product Name</th>
                    <th>Category </th>
                    <th>Brand </th>
                    <th>Product Short Description</th>
                    <th>Product Long Description</th>
                    <th> Product Price</th>
                    <th> Product Size</th>
                    <th> Product Color</th>
                    <th>status</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>

                @foreach($products as $product)
                    <tr>
                        <td>{{$product->product_id}}</td>
                        <td>{{$product->product_name}}</td>
                        <td>{{$product->category_name}}</td>
                        <td>{{$product->menufacture_name}}</td>
                        <td>{{$product->product_short_description}}</td>
                        <td>{{$product->product_long_description}}</td>
                        <td>{{$product->product_price}}</td>
                        <td>{{$product->product_size}}</td>
                        <td>{{$product->product_color}}</td>
                        <td>
                            @if($product->status==1)
                                <span class="btn btn-success pl-10">Active</span>
                            @else
                                <span class="btn btn-danger pl-10">De-active</span>
                            @endif
                        </td>
                        <td>
                            @if($product->status==1)
                                <span class="btn btn-success pl-10"><a href="{{URL::to('unactive_product/'.$product->product_id)}}"><i class="fa fa-pencil"></i></a></span>
                            @else
                                <span class="btn btn-danger pl-10"><a href="{{URL::to('active_product/'.$product->product_id)}}"><i class="fa fa-chain"></i></a></span>
                            @endif
                            <a href="/product/{{$product->product_id}}/edit" class="btn btn-info btn-sm">Edit</a>
                            <a href="/destroy_product/{{$product->product_id}}" id="delete_id" class="btn btn-danger btn-sm">Delete</a>

                        </td>>
                    </tr>
                @endforeach
                </tbody>
{{--                <tfoot>--}}
{{--                <tr>--}}
{{--                    <th>Name</th>--}}
{{--                    <th>Position</th>--}}
{{--                    <th>Office</th>--}}
{{--                    <th>Age</th>--}}
{{--                    <th>Start date</th>--}}
{{--                </tr>--}}
{{--                </tfoot>--}}
            </table>

        </div>
    </div>
</div>
@endsection
@section('js_script')



    @endsection
