@extends('layouts.main')

@section('title', 'Admin Reservasi')

@section('content')
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
@endsection

@section('css')
	<link rel="stylesheet" href="{{ asset('/css/bootstrap-datetimepicker.min.css') }}">
@endsection

@section('js')
	<!-- Moment -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
	<!-- Datetimepicker -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js">

	</script>

	<script type="text/javascript">
        $(function () {
            $('#startTime').datetimepicker();
            $('#endTime').datetimepicker();
        });
    </script>
@endsection