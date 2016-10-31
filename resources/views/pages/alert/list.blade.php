@extends('layouts.app')
@section('title', 'Alert')
@section('css')
    <link rel="stylesheet" href="{{ URL::asset('public/css/alert.css') }}">
@endsection
@section('content')
	<!-- /.col-lg-12 -->
    <div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="page-header">
                <h1>List Alert</h1>
            </div>
        </div>
    </div>
    <div class="col-md-3 col-md-offset-9">
        <div class="form-group">
            <a class="btn btn-primary btn-block" href="{!! URL::route('user.alert.create') !!}"> Create new Alert</a>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-4 col-lg-offset-4">
            <input type="search" id="search" value="" class="form-control" placeholder="Search ">
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
    <table class="table table-hover" id="table">
        <thead class="thead-inverse">
            <tr align="center">
                <th>ID</th>
                <th>Tiêu đề</th>
                <th>Loại</th>
                <th>Date</th>
                <th>Chi Tiết</th>
                <th>Delete</th>
                <th>Edit</th>
            </tr>
        </thead>
        <tbody>
            <?php  $stt =0?>
            @foreach($alert as $item)
            <?php  $stt= $stt +1?>
            <tr class="odd gradeX" align="center">
                <td>{!! $stt !!}</td>
                <td>{!! $item["title"] !!}</td>
                <td>{!! $item["type"] !!}</td>
                <td>
                    <?php
                        echo \Carbon\Carbon::createFromTimeStamp(strtotime($item['created_at']))->diffForHumans()
                    ?>
                </td>
                <td><a href="">Details</a></td>
                <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href=""> Delete</a></td>
                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="">Edit</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
    </div>
    </div>
    </div>
@endsection
@section('js')
    <script src="{{ URL::asset('public/js/alert.js') }}"></script>
    <script src="//rawgithub.com/stidges/jquery-searchable/master/dist/jquery.searchable-1.0.0.min.js"></script>

@endsection