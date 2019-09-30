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

<h2>Category table</h2>
        <a href="{{URL::to('category/create')}}"><button class="btn btn-facebook">Add Category</button></a>
    <table id="data" class="table table-striped table-bordered" style="width:100%">
        <thead>
        <tr>
            <th>Serial No</th>
            <th>Category Name</th>
            <th>Category Description</th>
            <th>status</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>

        @foreach($category as $categories)
            <tr>
                <td>{{$categories->category_id}}</td>
                <td>{{$categories->category_name}}</td>
                <td>{{$categories->category_description}}</td>
                <td>
                    @if($categories->status==1)
                        <span class="btn btn-success pl-10">Active</span>
                    @else
                        <span class="btn btn-danger pl-10">De-active</span>
                    @endif
                </td>
                <td>
                    @if($categories->status==1)
                        <span class="btn btn-success pl-10"><a href="{{URL::to('unactive_ctry/'.$categories->category_id)}}"><i class="fa fa-pencil"></i></a></span>
                    @else
                        <span class="btn btn-danger pl-10"><a href="{{URL::to('active_ctry/'.$categories->category_id)}}"><i class="fa fa-chain"></i></a></span>
                    @endif
                        <a href="/category/{{$categories->category_id}}/edit" class="btn btn-info btn-sm">Edit</a>
                        <a href="/destroy_category/{{$categories->category_id}}" id="delete_id" class="btn btn-danger btn-sm">Delete</a>

{{--                    {!!Form::open(['action' => ['CategoryController@destroy', $categories->category_id], 'method' => 'POST','class' => 'pull-right'])!!}--}}
{{--                    {{Form::hidden('_method', 'delete')}}--}}
{{--                    {{Form::submit('Delete', ['class' => 'btn btn-danger btn-sm'])}}--}}
{{--                    {!!Form::close()!!}--}}
                </td>>
            </tr>
         @endforeach
        </tbody>
        <tfoot>
        <tr>
            <th>Name</th>
            <th>Position</th>
            <th>Office</th>
            <th>Age</th>
            <th>Start date</th>
        </tr>
        </tfoot>
    </table>

@endsection
@section('js_script')



    @endsection
