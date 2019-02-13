@extends('layouts.admin.app')

@section('title', 'Dashboard | ')

@section('content')
<section class="content-header">
      <h1>
        Report Order 
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Report</li>
      </ol>
    </section>
<section class="content">

  @include('admin.partials.message')

  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">Report Order</h3>
          
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <form class="form-horizontal" action="{{ route('reportorder.pdfview',['download'=>'pdf']) }}" method="GET">
            {{csrf_field()}}
         <div class="form-group">
            <div class="col-md-3"> 
              <label class="control-label" for="first-name">From <span class="required">*</span></label>
              <input type="date"  name="name" required="required"  class="form-control" placeholder="Name" value="Wage Rizal Solichin">
            </div>
          </div>
           <div class="form-group">
            <div class="col-md-3"> 
              <label for="name">To<span class="required">*</span></label>
              <input type="date" name="name" required="required" class="form-control" placeholder="Name" value="rizal@email.com">
            </div>
          </div>
          <div class="form-group">
            <div class="col-md-3"> 
              <label for="name">Status Order<span class="required">*</span></label>
             <select class="form-control">
                <option>All</option>
                <option>Waiting</option>
                <option>Confirmed</option>
                <option>Canceled</option>
             </select>
            </div>
          </div>
          <div class="form-group">
            <div class="col-md-3"> 
             <button class="btn btn-primary" id="generate">Submit</button>
            </div>
          </div>
        </form>
        </div>
        <!-- /.box-body -->
      </div>
    </div>
  </div>
</section>

@endsection

@push('scripts')
@include('admin.reportorder.scripts')
@endpush
