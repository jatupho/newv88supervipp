@extends('layouts.app')
@section('styles')
@endsection
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
          <div class="card  mb-2">
            <div class="card-header">ค้นหา</div>
            <div class="card-body">
              <form action="" method="get">

                
                <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <div class="input-group">
                          <input type="date" name="date" class="form-control">
                          @if(auth()->user()->role === 'user')
                          <button class="btn btn-primary">ค้นหา</button>
                          @endif
                        </div>
                      </div>
                    </div>
                    @if(auth()->user()->role === 'admin')
                    <div class="col-lg-6">
                      <div class="form-group">
                        <div class="input-group">
                          <input type="text" name="user_id" placeholder="ค้นหารหัสพนักงาน" class="form-control">
                          <button class="btn btn-primary">ค้นหา</button>
                        </div>
                      </div>
                    </div>
                    @endif
                    
                </div>

              </form>
            </div>
          </div>
            <div class="card">
                <div class="card-header">ประวัติการเข้างาน</div>
                <div class="card-body">
                  
                  <table class="table table-striped">
                    <thead>
                      <tr>
                          <th>วันที่</th>
                          <th>รหัสพนักงาน</th>
                          <th>ชื่อพนักงาน</th>
                          <th>ตำแหน่ง</th>
                          <th>ประเภท</th>
                          <th>เวลา</th>
                          <th>สถานที่</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($timetables as $timetable)
                      <tr>
                        <td>{{ date('d/m/Y',strtotime($timetable->created_at)) }}</td>
                        <td>{{ $timetable->user_id }}</td>
                        <td>{{ $timetable->user_name }}</td>
                        <td>{{ $timetable->position }}</td>
                        <td>
                          @if($timetable->type == 'check_in')
                            <span class="badge bg-success">เข้างาน</span>                          
                            @else
                            <span class="badge bg-danger">เลิกงาน</span>                          
                          @endif
                          
                        
                        </td>
                        <td>{{ date('H:i:s',strtotime($timetable->created_at)) }}</td>
                        <td>{{ $timetable->location_detail }}</td>
                      </tr>
                      @endforeach
                  </table>

                  <div class="row">
                    <div class="col-md-12">
                      <div class="float-right">
                        {{ $timetables->links() }}
                      </div>
                    </div>
                </div>
              </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')


@endsection