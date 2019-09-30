@extends('Backend.Layout.app')
@section('content')

    <div class="col-lg-5 col-md-5 col-sm-5 ">
        <h4 class="title">Category Update</h4>
        <div id="message"></div>
        <form class="contact-form php-mail-form" role="form" action="/update_category/{{$category->category_id}}" method="post">
            @csrf
            <div class="form-group">
                <input type="name" name="category_name" value="{{$category->category_name}}" class="form-control" id="contact-name" placeholder="Category Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars" >
                <div class="validate"></div>
            </div>
            <div class="form-group">
                <textarea class="form-control" name="category_description" id="contact-message" placeholder="Description of Category" rows="5" data-rule="required" data-msg="Please write something for us">{{$category->category_description}}</textarea>
            </div>

            <div class="form-send">
                <button type="submit" class="btn btn-large btn-primary">Category Update</button>
{{--                {{Form::hidden('_method', 'PUT')}}--}}
{{--                {{Form::submit('Submit', ['class' => 'btn btn-primary'])}}--}}
{{--                <input type="hidden" method="PUT">--}}
{{--                <input type="submit" value="Update Category">--}}

            </div>

        </form>
    </div>
    <div class="col-lg-7 col-md-7 col-sm-7">
        <div class="header">
            <h>Category List</h>
        </div>
        <div class="category-list">
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
