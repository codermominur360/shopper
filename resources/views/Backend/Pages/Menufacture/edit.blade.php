@extends('Backend.Layout.app')
@section('content')

    <div class="col-lg-5 col-md-5 col-sm-5 ">
        <h4 class="title">Menufacture Update</h4>
        <div id="message"></div>
        <form class="contact-form php-mail-form" role="form" action="/update_menufacture/{{$menufacture->menufacture_id}}" method="post">
            @csrf
            <div class="form-group">
                <input type="name" name="menufacture_name" value="{{$menufacture->menufacture_name}}" class="form-control" id="contact-name" placeholder="menufacture Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars" >
                <div class="validate"></div>
            </div>
            <div class="form-group">
                <textarea class="form-control" name="menufacture_description" id="contact-message" placeholder="Description of menufacture" rows="5" data-rule="required" data-msg="Please write something for us">{{$menufacture->menufacture_description}}</textarea>
            </div>

            <div class="form-send">
                <button type="submit" class="btn btn-large btn-primary">Brand Update</button>
{{--                {{Form::hidden('_method', 'PUT')}}--}}
{{--                {{Form::submit('Submit', ['class' => 'btn btn-primary'])}}--}}
{{--                <input type="hidden" method="PUT">--}}
{{--                <input type="submit" value="Update menufacture">--}}

            </div>

        </form>
    </div>
    <div class="col-lg-7 col-md-7 col-sm-7">
        <div class="header">
            <h>menufacture List</h>
        </div>
        <div class="menufacture-list">
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
