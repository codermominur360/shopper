@extends('Backend.Layout.app')
@section('content')

    <div class="col-lg-5 col-md-5 col-sm-5 ">
        <h4 class="title">Product  Update</h4>
        <div id="message"></div>
        <form class="contact-form php-mail-form" role="form" action="/update_product/{{$product->product_id}}" method="post">
            @csrf
            <div class="form-group">
                <input type="text" name="product_name" value="{{$product->product_name}}" class="form-control" id="contact-name" placeholder="product Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars" >
                <div class="validate"></div>
            </div>
            <div class="form-group">
                <input type="text" name="category_id" value="{{$product->category_id}}" class="form-control" id="contact-name" placeholder="product Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars" >
                <div class="validate"></div>
            </div>
            <div class="form-group">
                <input type="text" name="menufacture_id" value="{{$product->menufacture_id}}" class="form-control" id="contact-name" placeholder="product Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars" >
                <div class="validate"></div>
            </div>
            <div class="form-group">
                <textarea class="form-control" name="product_short_description" rows="5" data-rule="required" >{{$product->product_short_description}}</textarea>
            </div>
            <div class="form-group">
                <textarea class="form-control" name="product_long_description" rows="5" data-rule="required"  >{{$product->product_long_description}}</textarea>
            </div>
            <div class="form-group">
                <input type="number" name="product_price" value="{{$product->product_price}}" class="form-control" id="contact-name" placeholder="product Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars" >
                <div class="validate"></div>
            </div>
            <div class="form-group">
                <input type="text" name="product_size" value="{{$product->product_size}}" class="form-control" id="contact-name" placeholder="product Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars" >
                <div class="validate"></div>
            </div>
            <div class="form-group">
                <input type="text" name="product_color" value="{{$product->product_color}}" class="form-control" id="contact-name" placeholder="product Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars" >
                <div class="validate"></div>
            </div>

            <div class="form-send">
                <button type="submit" class="btn btn-large btn-primary">Brand Update</button>

{{--                <input type="hidden" method="PUT">--}}
{{--                <input type="submit" value="Update Product">--}}

            </div>

        </form>
    </div>
    <div class="col-lg-7 col-md-7 col-sm-7">
        <div class="header">
            <h>product List</h>
        </div>
        <div class="product-list">
            <table>
                <tr>
                    <td>fds</td>
                    <td>fsd</td>
                    <td></td>
                    <td></td>
                </tr>
            </table>
        </div>
    </div>
@endsection
