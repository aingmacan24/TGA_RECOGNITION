@extends('master')

@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Room {{ ($room) ? '#'.$room->code_room :'' }}</h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>
                <form action="{{ base_url('sistem/room') }}" method="post">
                    <div class="card-body ">
                        <div class="form-group">
                            <label for="inputName">{{ get_msg('name_room') }}</label>
                            <input type="text" id="inputName" name="name_room"
                                class="form-control {{ form_e('name_room') ? 'is-invalid' : '' }}" value="{{ ($room) ? $room->name_room :'' }}">
                            <div class="invalid-feedback">
                                {{ form_e('name_room') }}
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputDescription">{{ get_msg('description_room') }}</label>
                            <input type="text" id="inputName" name="description_room" class="form-control {{ form_e('description_room') ? 'is-invalid' : '' }}" value="{{ ($room) ? $room->description_room :'' }}">
                            <div class="invalid-feedback">
                              {{ form_e('description_room') }}
                          </div>
                        </div>
                        <div class="form-group">
                            <label for="inputStatus">{{ get_msg('category_share') }}</label>
                            <select id="inputStatus" name="category_share" class="form-control custom-select  {{ form_e('category_share') ? 'is-invalid' : '' }}" value="{{ ($room) ? $room->category_share :'' }}">
                                <option value="link">Link</option>
                                <option value="text">Text</option>
                            </select>
                            <div class="invalid-feedback">
                              {{ form_e('category_share') }}
                          </div>
                        </div>
                        <div class="form-group">
                            <label for="inputClientCompany">{{ get_msg('share_room') }}</label>
                            <input type="text" id="inputClientCompany" name="share_room" class="form-control  {{ form_e('share_room') ? 'is-invalid' : '' }}" value="{{ ($room) ? $room->share_room :'' }}">
                            <div class="invalid-feedback">
                              {{ form_e('share_room') }}
                          </div>
                          </div>

                        <div class="form-group">
                            <label>{{ get_msg('schedule_room') }}</label>
                            <div class="input-group date  {{ form_e('schedule_room') ? 'is-invalid' : '' }}" id="reservationdatetime" data-target-input="nearest">
                                <input type="text" name="schedule_room" class="form-control datetimepicker-input  {{ form_e('schedule_room') ? 'is-invalid' : '' }}" value="{{ ($room) ? $room->schedule_room :'' }}"
                                    data-target="#reservationdatetime">
                                <div class="input-group-append" data-target="#reservationdatetime"
                                    data-toggle="datetimepicker">
                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                </div>
                            </div>
                            <div class="invalid-feedback">
                              {{ form_e('schedule_room') }}
                          </div>
                        </div>
                        <div class="form-group">
                            <label class="ckbox">
                                @if($room)
                                <input type="hidden" name="id" value="{{ $room->code_room }}">
                                @endif
                                <input type="checkbox" name="redirect"><span class="small"> Tetap Di halaman ini</span>
                            </label>
                        </div>
                        <button type="submit" class="btn btn-success"><i class="far fa-save"></i> Save</button>
                    </div>
                </form>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
       <!-- <div class="col-md-6">
            <div class="card card-secondary">
                <div class="card-header">
                    <h3 class="card-title">Information</h3>
                </div>
                <div class="card-body">

                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div> -->
    </div>
@endsection
