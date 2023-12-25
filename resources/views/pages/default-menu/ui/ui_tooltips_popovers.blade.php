@extends('inc.layout')
@section('title','Tabs & Pills')
@section('content')
@include('inc.breadcrumb',['bcrumb' => 'bc_level_dua','bc_1'=>'UI Components'])
		<div class="subheader">
			@component('inc.subheader',['subheader_title'=>'st_type_2'])
			@slot('sh_icon') window @endslot
			@slot('sh_descipt') tooltips-and-popovers description @endslot
			@endcomponent
		</div>
		tooltips-and-popovers
	</main>
@endsection
