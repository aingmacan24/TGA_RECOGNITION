@extends('master')
@section('title','Absensi')
@section('content')
<div class="row">
    <div class="col-md-6 mx-auto">
      <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">Information About Room #{{$code->code_room}}</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
              <i class="fas fa-minus"></i>
            </button>
          </div>
        </div>
        <div class="card-body">
          <ul class="list-unstyled">
            <li>
              <a href="" class="btn-link text-secondary"><i class="fas fa-person-booth"></i> {{ $code->name_room }}</a>
            </li>
            <li>
              <a href="" class="btn-link text-secondary"><i class="fas fa-info-circle"></i> {{ $code->description_room }}</a>
            </li>
            <li>
              <a href="" class="btn-link text-secondary"><i class="fa fa-link "></i> {{ $code->share_room }}</a>
            </li>
            <li>
              <a href="" class="btn-link text-secondary"><i class="fas fa-user-clock"></i> {{ $code->schedule_room }}</a>
            </li>
          </ul>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
    <div class="col-md-12">
      <div class="card">
        <div class="card-body">
          <div class="table-responsive">
            <table id="example1" class="table table-bordered table-striped" >
                <thead>
                  <tr>
                    <td>No</td>
                    <td>{{ get_msg('identity_user') }} </td>
                    <td>{{ get_msg('name_user') }} </td>
                    <td>{{ get_msg('gender_user') }} </td>
                    <td>{{ get_msg('dateinsert_schedule') }}</td>
                    <td>{{ get_msg('description_scheduler') }}</td>
                    <td>{{ get_msg('present_user') }}</td>
                  </tr>
                </thead>
                <tbody>
                  @php
                   $no=1;   
                  @endphp
                  @foreach ($schedule as $key=>$item)
                      <tr>
                          <td>{{ $no++ }}</td>
                          <td>{{ $item->identity_user }}</td>
                          <td>{{ $item->name_user}}</td>
                          <td>{{ $item->gender_user}}</td>
                          <td>{{ $item->dateinsert_schedule }}</td>
                          <td>{{ $item->description_scheduler }}</td>
                          <td>{{ $item->present_user }}</td>
                      </tr>
                  @endforeach
                </tbody>
    
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection