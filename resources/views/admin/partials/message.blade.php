@if (session()->has('message'))
<div class="alert alert-warning alert-dismissible fade in" role="alert"> 
	<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button> {{session()->get('message')}}
</div>
@endif
