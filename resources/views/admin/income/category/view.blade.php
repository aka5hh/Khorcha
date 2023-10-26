@extends('layouts.admin')
@section('content')
  <div class="row">
      <div class="col-md-12">
          <div class="card mb-3">
            <div class="card-header">
              <div class="row">
                  <div class="col-md-8 card_title_part">
                      <i class="fab fa-gg-circle"></i>View Income Category Information
                  </div>  
                  <div class="col-md-4 card_button_part">
                      <a href="{{url('dashboard/income/category')}}" class="btn btn-sm btn-dark"><i class="fas fa-th"></i>All Category</a>
                  </div>  
              </div>
            </div>
            <div class="card-body">
              <div class="row">
                  <div class="col-md-2"></div>
                  <div class="col-md-8">
                      <table class="table table-bordered table-striped table-hover custom_view_table">
                        <tr>
                          <td>Income Category</td>  
                          <td>:</td>  
                          <td>{{$data->incate_name}}</td>  
                        </tr>
                        <tr>
                          <td>Remarks</td>  
                          <td>:</td>  
                          <td>{{$data->incate_remarks}}</td>  
                        </tr>                      
                        <tr>
                          <td>Creator</td>  
                          <td>:</td>  
                          <td>{{$data->creatorInfo->name}}</td>  
                        </tr>                      
                        <tr>
                          <td>Created Time</td>  
                          <td>:</td>  
                          @php
                          $formattedDate = $data->created_at->format('d-m-Y | h:i:s A |');
                          $timeDifference = $data->created_at->diffForHumans();
                          @endphp
                          <td>{{ $formattedDate }}{{ $timeDifference }}</td>
                          {{-- <td>{{$data->created_at->format('d-m-Y | h:i:s A |')}}{{$data->created_at->diffForHumans()}}</td>   --}}
                        </tr>                      
                      </table>
                  </div>
                  <div class="col-md-2"></div>
              </div>
            </div>
            <div class="card-footer">
              <div class="btn-group" role="group" aria-label="Button group">
                <button type="button" class="btn btn-sm btn-dark">Print</button>
                <button type="button" class="btn btn-sm btn-secondary">PDF</button>
                <button type="button" class="btn btn-sm btn-dark">Excel</button>
              </div>
            </div>  
          </div>
      </div>
  </div>
@endsection