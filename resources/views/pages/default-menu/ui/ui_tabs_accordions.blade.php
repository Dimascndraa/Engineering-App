@extends('inc.layout')
@section('title','Tabs & Accordions')
@section('content')
	<main id="js-page-content" role="main" class="page-content">
		@include('inc.breadcrumb',['bcrumb' => 'bc_level_dua','bc_1'=>'UI Components'])
		<div class="subheader">
			@component('inc.subheader',['subheader_title'=>'st_type_2'])
			@slot('sh_icon') window @endslot
			@slot('sh_descipt') tabs-and-accordions description @endslot
			@endcomponent
		</div>
		tabs-and-accordions
	</main>
@endsection
