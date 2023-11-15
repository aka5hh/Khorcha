@extends('layouts.admin')
@section('content')
@php
  $all = App\Models\User::where('status', 0)->orderby('id', 'DESC')->get()
@endphp
  <div class="row">
      <div class="col-md-12">
          <div class="card mb-3">
            <div class="card-header">
              <div class="row">
                  <div class="col-md-8 card_title_part">
                      <i class="fab fa-gg-circle"></i>All User Information
                  </div>  
              </div>
            </div>
            <div class="card-body">
              <table class="table table-bordered table-striped table-hover custom_table">
                <thead class="table-dark">
                  <tr>
                    <th>Name</th>
                    <th>Phone</th>
                    <th>Email</th>
                    <th>Username</th>
                    <th>Role</th>
                    <th>Photo</th>
                    <th>Manage</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($all as $data )                                     
                  <tr>
                    <td>{{$data->name}}</td>
                    <td>{{$data->phone}}</td>
                    <td>{{$data->email}}</td>
                    <td>{{$data->username}}</td>
                    <td>{{$data->roleInfo->role_name}}</td>
                    <td>
                      @if ($data->photo!='')
                      <img height="30" src="{{ asset('uploads/users/' .$data->photo) }}" alt="User Photo"/>
                      @else
                      <img height="30" src="{{asset('contents/admin')}}/images/avatar.png" alt="User Photo"/>
                      @endif
                    </td>
                    <td>
                      <a  href="#" id="restore" data-bs-toggle= "modal" data-bs-target="#restoreModal" data-id="{{ $data->id }}"><i class="fas fa-recycle fs-5 text-success fw-bold mx-3"></i></a> 
                      <a  href="#" id="delete" data-bs-toggle= "modal" data-bs-target="#deleteModal" data-id="{{ $data->id }}"><i class="fas fa-trash fs-5 text-danger fw-bold"></i></a> 
                  </td>  
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>  
          </div>
      </div>
  </div>
  <!-- retore modal code -->
  <div class="modal fade" id="restoreModal" tabindex="-1" aria-labelledby="restoreModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <form method="post" action="{{ url('dashboard/user/restore') }}">
            @csrf
            <div class="modal-content modal_content">
                <div class="modal-header modal_header">
                    <h1 class="modal-title modal_title" id="restoreModalLabel"><i
                            class="fab fa-gg-circle"></i>Confirm Message</h1>
                </div>
                <div class="modal-body modal_body">
                    Do you want to delete this user?
                    <input type="hidden" name="modal_id" id="modal_id" />
                </div>
                <div class="modal-footer modal_footer">
                    <button type="submit" class="btn btn-sm btn-success">Confirm</button>
                    <button type="button" class="btn btn-sm btn-danger" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </form>
    </div>
</div>
<!-- permanent delete modal code -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <form method="post" action="{{ url('dashboard/user/delete') }}">
            @csrf
            <div class="modal-content modal_content">
                <div class="modal-header modal_header">
                    <h1 class="modal-title modal_title" id="deleteModalLabel"><i
                            class="fab fa-gg-circle"></i>Confirm Message</h1>
                </div>
                <div class="modal-body modal_body">
                    Do you want to permanently delete this user ?
                    <input type="hidden" name="modal_id" id="modal_id" />
                </div>
                <div class="modal-footer modal_footer">
                    <button type="submit" class="btn btn-sm btn-success">Confirm</button>
                    <button type="button" class="btn btn-sm btn-danger" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection