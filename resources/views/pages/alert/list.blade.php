@extends('layouts.app')
@section('title', 'Alert')
@section('css')
    <link rel="stylesheet" href="{{ URL::asset('public/css/alert.css') }}">
@endsection
@section('content')
	<!-- /.col-lg-12 -->
    <div class="container">
    <div class="row">
        <div class="col-lg-9">
            <div class="page-header">
                <h1>List Alert</h1>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="form-group">
                <a class="btn btn-primary btn-block" href="{!! URL::route('user.alert.create') !!}"> Create new Alert</a>
            </div>
        </div>
    </div>
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
          <p>{{$message}}</p>
        </div>
      @endif
    <div class="row">
        <div class="col-lg-4 col-lg-offset-4">
            <input type="search" id="search" value="" class="form-control" placeholder="Search ">
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
    <table  class="table table-hover" id="table">
        <thead class="thead-inverse" >
            <tr>
                <th>ID</th>
                <th style="text-align: center;" class="col-md-5">Tiêu đề</th>
                <th style="text-align: center;" class="col-md-2">Loại</th>
                <th style="text-align: center;">Date</th>
                <th style="text-align: center;">Chi Tiết</th>
                <th style="text-align: center;">Edit</th>
                <th style="text-align: center;">Delete</th>
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
                <td>
                    @if(Auth::user()->level <= 3)
                    <form action="{!! route('user.alert.detail',$item["id"]) !!}" method="POST" >
                      {{ csrf_field() }}
                      <input type="hidden" value="GET" name="_method">
                      <input type="submit" class="btn btn-link" value="Details">
                    </form>
                    @endif
                </td>
                <td >
                    @if(Auth::user()->level <= 2)
                    <form action="{!! route('user.alert.edit',$item['id']) !!}" method="POST">
                      {{ csrf_field() }}
                      <input type="hidden" value="GET" name="_method">
                      <i class="fa fa-pencil  fa-fw"></i>
                      <input type="submit" class="btn btn-link" value="Edit">
                    </form>
                    @endif 
                </td>
                <td>
                @if(Auth::user()->level <= 1)   
                    <form action="{!! route('user.alert.destroy',$item['id']) !!}" method="POST">
                      {{ csrf_field() }}
                      <input type="hidden" value="DELETE" name="_method">
                      <i class="fa fa-trash-o  fa-fw"></i>
                      <input type="submit" class="btn btn-link" value="Delete">
                    </form>
                @endif
                </td>
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
    <script>
            $("div.alert").delay(2000).slideUp();
    </script>
@endsection