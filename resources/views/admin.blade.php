@extends('layouts.main')

@section('title', 'Admin Reservasi')

@section('navbar')
	@include('layouts.navbar')
@endsection
@section('content')
	<table id="reservation" class="display" cellspacing="0" width="100%">
		<thead>
		<tr>
			<th>Name</th>
			<th>NRP</th>
			<th>Mulai</th>
			<th>Selesai</th>
			<th>Keperluan</th>
			<th>Status</th>
			<th>Aksi</th>
		</tr>
		</thead>
		<tfoot>
		<tr>
			<th>Name</th>
			<th>NRP</th>
			<th>Mulai</th>
			<th>Selesai</th>
			<th>Keperluan</th>
			<th>Status</th>
			<th>Aksi</th>
		</tr>
		</tfoot>
		<tbody>
		@foreach ($reservations as $res)
			<tr>
				<th>{{ $res->user->name }}</th>
				<th>{{ $res->nrp }}</th>
				<th>{{ $res->start }}</th>
				<th>{{ $res->end }}</th>
				<th>{{ $res->keperluan }}</th>
				<th>{{ $res->status }}</th>
				<th>
					<form action="/admin/accept" method="post" accept-charset="utf-8">
						{{ csrf_field() }}
						<input type="hidden" value="{{ $res->id }}" name="idReservasi">
						<button type="submit" class="btn btn-warning">Accept</button>
					</form>
					<form action="/admin/reject" method="post" accept-charset="utf-8">
						{{ csrf_field() }}
						<input type="hidden" value="{{ $res->id }}" name="idReservasi">
						<button type="submit" class="btn btn-warning">Reject</button>
					</form>
					<form action="/admin/delete" method="post" accept-charset="utf-8">
						{{ csrf_field() }}
						<input type="hidden" value="{{ $res->id }}" name="idReservasi">
						<button type="submit" class="btn btn-danger">Delete</button>
					</form>
				</th>

			</tr>
		@endforeach
		</tbody>
	</table>
@endsection

@section('css')
	<link rel="stylesheet" href="{{URL::asset('css/jquery.dataTables.min.css')}}">
@endsection

@section('js')
	<script src="{{URL::asset('js/jquery.dataTables.min.js')}}"></script>
	<script type="text/javascript">
        $(document).ready(function() {
            $('#reservation').DataTable();
        });
	</script>
@endsection