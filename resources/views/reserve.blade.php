@extends('layouts.app')

@section('title', 'Admin Reservasi')
    
@include('layouts.header')

@include('layouts.sidebar')

@section('content')
@section('class', 'hold-transition skin-blue sidebar-mini')
<div class="content-wrapper">
	<section class="content">
		<div class="box">
			<div class="box box-info">
				<div class="box-header with-border">
					<h3 class="box-title">Form Reservasi</h3>
				</div>
				<form method="POST" action="/reserve" class="form-horizontal">
					{{ csrf_field() }}
					<div class="box-body">
						<div class="form-group">
							<label for="Keperluan" class="col-sm-2 control-label">Keperluan</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" name="keperluan" placeholder="Keperluan" required/>
							</div>
						</div>
						<div class="form-group">
							<label for="startTime" class="col-sm-2 control-label">Mulai</label>
							<div class="col-sm-10">
								<div class="input-group date" id="startTime">
									<input class="form-control" type="text" name="start" placeholder="Waktu Mulai" required/>
									<span class="input-group-addon">
                    					<span class="glyphicon glyphicon-calendar"></span>
                					</span>
								</div>
							</div>
						</div>
						<div class="form-group">
							<label for="endTime" class="col-sm-2 control-label">Selesai</label>
							<div class="col-sm-10">
								<div class="input-group date" id="endTime">
									<input class="form-control" type="text" name="end" placeholder="Waktu Selesai" required/>
									<span class="input-group-addon">
                    					<span class="glyphicon glyphicon-calendar"></span>
                					</span>
								</div>
							</div>
						</div>
					</div>
					<div class="box-footer">
						<button type="submit" class="btn btn-info pull-right">Submit</button>
					</div>
				</form>
			</div>
		</div>
	</section>
</div>
    {{-- <form method="POST" action="/reserve">
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
    </form> --}}
        @include('layouts.footer')
@endsection

@section('css')
	<link rel="stylesheet" href="{{ asset('/css/bootstrap-datetimepicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('adminlte/dist/css/skins/_all-skins.min.css')}}">
@endsection

@section('js')
	<!-- Moment -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
	<!-- Datetimepicker -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>
	<script type="text/javascript">
        $(function () {
            $('#startTime').datetimepicker();
            $('#endTime').datetimepicker();
        });
    </script>
@endsection