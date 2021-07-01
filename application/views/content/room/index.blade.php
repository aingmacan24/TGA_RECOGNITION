@extends('master')

@section('content')
        <!-- <div class="container-fluid"> -->
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-6">
              <!-- small box -->
              <div class="small-box bg-info">
                <div class="inner">
                  <h3>{{ $CI->Room_model->count_room() }}</h3>
  
                  <p>Room</p>
                </div>
                <div class="icon">
                  <i class="fas fa-landmark"></i>
                </div>
              </div>
            </div>
            <!-- ./col -->
            <div class=" col-6">
              <!-- small box -->
              <div class="small-box bg-success">
                <div class="inner">
                  <h3>{{ $CI->Room_model->connection_person() }}<sup style="font-size: 20px"></sup></h3>
  
                  <p>connected person</p>
                </div>
                <div class="icon">
                  <i class="ion ion-person"></i>
                </div>
              </div>
            </div>
          </div>
          <!-- /.row -->
          <!-- Main row -->
          <div class="row">
            <div class="col-6">
              <a href="{{ base_url("/room/add") }}" class="btn btn-secondary"><i class="fa fa-plus"></i> Add Room</a>
            </div>
          </div>
          <div class="row mt-2">
            @foreach($room as $key=>$row) 
            <div class="col-lg-3 col-12">
              <div class="small-box bg-primary room-list">
                <div class="card-tool text-right">
                  <div class="btn-group ">
                    <button type="button" class="btn btn-tool text-white " data-toggle="dropdown" aria-expanded="false">
                      <i class="fas fa-ellipsis-v"></i>
                    </button>
                    <div class="dropdown-menu   dropdown-menu-right" style="z-index: 999" role="menu">
                      <a href="{{ base_url('sistem/room/'.$row->code_room) }}" class="dropdown-item text-danger"><i class="fas fa-trash"></i> delete</a>
                      <a href="{{ base_url('room/edit/').$row->code_room }}" class="dropdown-item text-success"><i class="fas fa-edit"></i> Edit</a>
                      <a href="#" class="dropdown-item " onclick="copyToClipboard(this)" data-code="{{ $row->code_room }}" data-time="{{ $row->schedule_room }}"><i class="fas fa-copy"></i> Copy Code</a>
                      <a href="#" class="dropdown-item " onclick="copyToClipboard(this)" data-code="{{ base_url("join/".$row->code_room) }}" data-time="{{ $row->schedule_room }}"><i class="fas fa-link"></i> Copy Link</a>         
                    </div>
                  </div>
                </div>
                <div class="inner room-join" data-href="{{ base_url('room/detail/'.$row->code_room) }}" onclick="data_url(this)">
                  <h4>{{ $row->name_room }}</h4>
  
                  <p>{{ $row->description_room }}</p>
                </div>
                <div class="icon ">
                  <i class="fas fa-user-check"></i>
                </div>
                
              </div>
          </div>
          @endforeach
@endsection