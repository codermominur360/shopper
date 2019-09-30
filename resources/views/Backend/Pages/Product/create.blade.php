@extends('Backend.Layout.app')
@section('content')

    <div class="col-lg-6 col-md-6 col-sm-6 ">
        <h4 class="title">Product List</h4>
        <div id="message"></div>
        <form class="contact-form php-mail-form" role="form" action="/product" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <input type="name" name="product_name" class="form-control" id="contact-name" placeholder="product Name" >
                <div class="validate"></div>
            </div>

             <div class="form-group">
                 <label for="selectError3" class="control-label"> Product Category</label>
                 <div class="control"  >
                     <select name="category_id" id="selectError3" class="form-control">
                         <option value="">Select Category</option>
                         <?php
                            $product_categorys=DB::table('category')
                                                    ->where('status',1)
                                                    ->get();
                         ?>
                         @foreach($product_categorys as $product_category)
                         <option value="{{$product_category->category_id}}">{{$product_category->category_name}}</option>
                         @endforeach
                     </select>
                 </div>
            </div>

             <div class="form-group">
                 <label for="selectError3" class="control-label"> Menufacture Name</label>
                 <div class="control">
                     <select name="menufacture_id" id="selectError3" class="form-control">
                         <option value="0">Select Brand</option>
                         <?php
                            $menufacturetbls=DB::table('menufacture')
                                             ->where('status',1)
                                             ->get();
                         ?>
                         @foreach($menufacturetbls as $menufacturetbl)
                         <option value="{{$menufacturetbl->menufacture_id}}">{{$menufacturetbl->menufacture_name}}</option>
                         @endforeach
                     </select>
                 </div>
            </div>

             <div class="form-group">
                 <textarea name="product_short_description" id="" cols="10" rows="4" class="form-control">Your Product Short Description....</textarea>
                <div class="validate"></div>
            </div>

             <div class="form-group">
                 <textarea name="product_long_description" id="" cols="30" rows="10" class="form-control" >Your Product Long Description...</textarea>
                <div class="validate"></div>
            </div>

             <div class="form-group">
                <input type="text" name="product_price" placeholder="product price" class="form-control" id="contact-name"  >
                <div class="validate"></div>
            </div>


             <div class="form-group">
                <input type="text" name="product_size" placeholder="product size"class="form-control" id="contact-name"  >
                <div class="validate"></div>
            </div>

             <div class="form-group">
                <input type="text" name="product_color" placeholder="product color" class="form-control" id="contact-name"   >
                <div class="validate"></div>
            </div>

            <div class="form-group">
                <label class="control-label" for="textarea2"> Status</label>
                <div class="controls">
                    <input type="checkbox" name="status" value="1" >

                </div>
            </div>


            <div class="form-send">
                <button type="submit" class="btn btn-large btn-primary">Brand Add</button>
            </div>

        </form>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-6 text-justify">

            <div class="row ">
                <div class="cl-lg-6 text-center">
                    <h3><u><b>Brand Detail</b></u></h3>
                </div>
            </div>

        <div class="row">
            <div class="col-lg-4">
                <div class="Category_name">
                    <h4>Brand Name</h4>
                    <p>Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or web designs.</p>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="category_description">
                    <h4>Brand Description</h4>
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
