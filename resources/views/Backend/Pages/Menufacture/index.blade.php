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
        <a href="{{URL::to('menufacture/create')}}"><button class="btn btn-facebook">Add menufacture</button></a>
    <table id="data" class="table table-striped table-bordered" style="width:100%">
        <thead>
        <tr>
            <th>Serial No</th>
            <th>menufacture Name</th>
            <th>menufacture Description</th>
            <th>status</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>

        @foreach($menufactures as $menufacture)
            <tr>
                <td>{{$menufacture->menufacture_id}}</td>
                <td>{{$menufacture->menufacture_name}}</td>
                <td>{{$menufacture->menufacture_description}}</td>
                <td>
                    @if($menufacture->status==1)
                        <span class="btn btn-success pl-10">Active</span>
                    @else
                        <span class="btn btn-danger pl-10">De-active</span>
                    @endif
                </td>
                <td>
                    @if($menufacture->status==1)
                        <span class="btn btn-success pl-10"><a href="{{URL::to('unactive_menufact/'.$menufacture->menufacture_id)}}"><i class="fa fa-pencil"></i></a></span>
                    @else
                        <span class="btn btn-danger pl-10"><a href="{{URL::to('active_menufact/'.$menufacture->menufacture_id)}}"><i class="fa fa-chain"></i></a></span>
                    @endif
                        <a href="/menufacture/{{$menufacture->menufacture_id}}/edit" class="btn btn-info btn-sm">Edit</a>
                        <a href="/destroy_menufacture/{{$menufacture->menufacture_id}}" id="delete_id" class="btn btn-danger btn-sm">Delete</a>

{{--                    {!!Form::open(['action' => ['menufactureController@destroy', $menufacture->menufacture_id], 'method' => 'POST','class' => 'pull-right'])!!}--}}
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
