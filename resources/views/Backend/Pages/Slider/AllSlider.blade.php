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

{{--    <?php--}}
{{--    $message=Session::get('message');--}}
{{--    if($message)--}}
{{--    {?>--}}

{{--    <p class="btn btn-success">--}}
{{--        <?php--}}
{{--        echo $message; Session::flush();--}}
{{--        ?></p>--}}

{{--    <?php--}}
{{--    }--}}
{{--    ?>--}}

    <h2>Slider list table</h2>
    <a href="{{URL::to('sliderImage/create')}}"><button class="btn btn-facebook">Add Slider</button></a>
    <table id="data" class="table table-striped table-bordered" style="width:100%">
        <thead>
        <tr>
            <th>Slider Id</th>
            <th>Slider Image</th>
            <th>status</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>

        @foreach($sliderImage as $V_sliderImage)

            <tr>
                <td>{{$V_sliderImage -> slider_id}}</td>
                <td><img src="/storage/slider/{{$V_sliderImage ->slider_image}}" style="width:120px;" alt="Slider Image"></td>
                 <td>
                    @if($V_sliderImage->status==1)
                        <span class="btn btn-success pl-10">Active</span>
                    @else
                        <span class="btn btn-danger pl-10">De-active</span>
                    @endif
                </td>
                <td>
                    @if($V_sliderImage->status==1)
                        <span class="btn btn-success pl-10"><a href="{{URL::to('unactive_slider/'.$V_sliderImage->slider_id)}}"><i class="fa fa-pencil"></i></a></span>
                    @else
                        <span class="btn btn-success pl-10"><a href="{{URL::to('active_slider/'.$V_sliderImage->slider_id)}}"><i class="fa fa-pencil"></i></a></span>
                    @endif
                    <a href="destroy/{{$V_sliderImage->slider_id}}" id="delete_id" class="btn btn-danger btn-sm">Delete</a>

{{--                                        {!!Form::open(['action' => ['CategoryController@destroy', $V_sliderImage->category_id], 'method' => 'POST','class' => 'pull-right'])!!}--}}
{{--                                        {{Form::hidden('_method', 'delete')}}--}}
{{--                                        {{Form::submit('Delete', ['class' => 'btn btn-danger btn-sm'])}}--}}
{{--                                        {!!Form::close()!!}--}}
                </td>>
            </tr>
        @endforeach
        </tbody>
    </table>

@endsection
@section('js_script')



@endsection
