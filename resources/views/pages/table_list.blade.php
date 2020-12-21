@extends('layouts.main', ['activePage' => 'task', 'titlePage' => __('Task List')])

@section('content')



<div class="content" >
  <div class="container-fluid" >
    <div id="appmain">
      <!-- show component -->
      <component-task></component-task>  
      <vue-progress-bar></vue-progress-bar>
    </div>
  </div>
</div>
<script src="{{ mix('js/app.js') }}"></script>


@endsection