@extends('Backend.Layout.app')
@section('content')

    <div class="col-lg-5 col-md-5 col-sm-5 ">
        <h4 class="title">Delivery Man Added </h4>
        <div id="message"></div>
        <form class="contact-form php-mail-form" role="form" action="/sellman" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <input type="text" name="sellman_name" class="form-control" placeholder="Sell-Man Name" >
                <div class="validate"></div>
            </div>

            <div class="form-group">
                <input type="file" name="sell_image" class="form-control" placeholder="Choose Photo" >
                <div class="validate"></div>
            </div>

            <div class="form-group">
                <label class="control-label" for="textarea2"> Status</label>
                <div class="controls">
                    <input type="checkbox" name="status" value="1" >

                </div>
            </div>

            <div class="form-send">
                <button type="submit" class="btn btn-large btn-primary">Delivery Man Add</button>
            </div>

        </form>
    </div>
    <div class="col-lg-7 col-md-7 col-sm-7 text-justify">

            <div class="row ">
                <div class="cl-lg-6 text-center">
                    <h3><u><b>Delivery Man Detail</b></u></h3>
                </div>
            </div>

        <div class="row">
            <div class="col-lg-4">
                <div class="Category_name">
                    <h4>Delivery Man Name</h4>
                    <p>Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or web designs.</p>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="category_description">
                    <h4>Category Description</h4>
                    <p>Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or web designs.</p>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="category_description">
                    <h4>Status</h4>
                    <p>Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or web designs.</p>
                </div>
            </div>
        </div>

    </div>
@endsection
