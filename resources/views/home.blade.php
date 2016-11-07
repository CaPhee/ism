@extends('layouts.app')
@section('title', 'DashBoard')
@section('css')
    <link rel="stylesheet" href="{{ URL::asset('public/css/dashboard.css') }}">
@endsection
@section('content')
<div class="container">
    <div class="row">
        <div id="success" class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    You are logged in!
                </div>
            </div>
        </div>      
    </div>
    <div class="form-group">
        <div class="col-md-6">
            <div id="payrate" style="height: 300px; width: 100%;"></div>
        </div>
        <div class="col-md-6">
            <div id="totalearning" style="height: 300px; width: 100%;"></div>
        </div>
        <div class="col-md-6 col-md-offset-3" style="margin-top: 30px;">
            <div id="dayoff" style="height: 300px; width: 100%;"></div>
        </div>
    </div>           
</div>
@endsection

@section('js')
    <script>
            $("#success").delay(2000).slideUp();
    </script>
    <script type="text/javascript" src="{{ URL::asset('public/js/jquery.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('public/js/jquery-canvanjs.js') }}"></script>
<script type="text/javascript">
window.onload = function () {

//Better to construct options first and then pass it as a parameter
    var pie = {
        title: {
            text: "Pay Rate"
        },
                animationEnabled: true,
        data: [
        {
            type: "pie", //change it to line, area, bar, pie, etc
            dataPoints: [
                { x: 10, y: 30 },
                { x: 20, y: 11 },
                { x: 30, y: 14 },
                { x: 40, y: 16 },
                { x: 50, y: 19 },
                { x: 80, y: 10 },
                { x: 80, y: 10 },
                { x: 80, y: 10 },
                { x: 80, y: 10 },
                { x: 80, y: 10 },
                { x: 80, y: 10 },
                { x: 80, y: 10 },
            ]
        }
        ]
    };
     var line = {
        title: {
            text: "Total Earning"
        },
                animationEnabled: true,
        data: [
        {
            type: "line", //change it to line, area, bar, pie, etc
            dataPoints: [
                { x: 01, y: 10 },
                { x: 02, y: 11 },
                { x: 03, y: 14 },
                { x: 04, y: 16 },
                { x: 05, y: {!! $totalearning !!} },
                { x: 06, y: 10 },
                { x: 07, y: 10 },
                { x: 08, y: 10 },
                { x: 09, y: 10 },
                { x: 10, y: 10 },
                { x: 11, y: 10 },
                { x: 12, y: 10 },
            ]
        }
        ]
    };
     var bar = {
        title: {
            text: "Vacation Days"
        },
                animationEnabled: true,
        data: [
        {
            type: "bar", //change it to line, area, bar, pie, etc
            dataPoints: [
                { x: 01, y: 30 },
                { x: 02, y: 11 },
                { x: 03, y: 14 },
                { x: 04, y: 16 },
                { x: 05, y: 19 },
                { x: 06, y: 10 },
                { x: 07, y: 10 },
                { x: 08, y: 10 },
                { x: 09, y: 10 },
                { x: 10, y: 10 },
                { x: 11, y: 10 },
                { x: 12, y: 10 },
            ]
        }
        ]
    };

    $("#payrate").CanvasJSChart(pie);
    $("#totalearning").CanvasJSChart(line);
    $("#dayoff").CanvasJSChart(bar);

}
</script>
@endsection
