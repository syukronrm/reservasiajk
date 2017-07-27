@extends('layouts.main')

@section('title', 'Admin Reservasi')

@section('navbar')
@include('layouts.navbar')
@endsection

@section('content')
	<div class="col-xs-5">
		<form method="POST" action="/reserve">
			{{ csrf_field() }}
			<div class="form-group">
				<label for="keperluan">Keperluan</label>
				<input type="text" class="form-control" name="keperluan" placeholder="Keperluan" required>
			</div>
			<div class="form-group">
				<div class='input-group date' id='startTime'>
					<input type='text' class="form-control" name="start" placeholder="Waktu mulai" required/>
					<span class="input-group-addon">
	                <span class="glyphicon glyphicon-calendar"></span>
	            </span>
				</div>
			</div>
			<div class="form-group">
				<div class='input-group date' id='endTime'>
					<input type='text' class="form-control" name="end" placeholder="Waktu selesai" required/>
					<span class="input-group-addon">
	                <span class="glyphicon glyphicon-calendar"></span>
	            </span>
				</div>
			</div>
			<button type="submit" class="btn btn-default">Submit</button>
		</form>
	</div>
@endsection

@section('css')
	<link rel="stylesheet" href="{{ asset('/css/bootstrap-datetimepicker.min.css') }}">
@endsection

@section('js')
	<script src="{{URL::asset('js/moment.min.js')}}"></script>
	<script src="{{URL::asset('js/bootstrap-datetimepicker.min.js')}}"></script>
	<script type="text/javascript">
        $(function () {
            $('#startTime').datetimepicker();
            $('#endTime').datetimepicker();
        });
    </script>
@endsection