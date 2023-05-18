้้<!DOCTYPE html>
<html lang="en">
<head>
    
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iship</title>
    <style>
      th{
        background-color:#97e1ff;
      }
      
    /* .table-container{
      background-image: url("/images/pt1.png");
    background-size: cover;
    } */
   .container {
    /* background-image: url("/images/333.jpg");
    background-size: cover; */
    /* สามารถกำหนดคุณสมบัติเพิ่มเติมของพื้นหลังได้ตามต้องการ */
  }
    .myButton {
	box-shadow: 3px 4px 0px 0px #899599;
	background:linear-gradient(to bottom, #27bff2 5%, #bdd7f2 100%);
	background-color:#27bff2;
	border-radius:15px;
	border:1px solid #d6bcd6;
	display:inline-block;
	cursor:pointer;
	color:#000000;
	font-family:Arial;
	font-size:17px;
	padding:7px 25px;
	text-decoration:none;
	text-shadow:0px 1px 0px #e1e2ed;
  margin-right: 120px; /* กำหนดระยะห่างด้านขวาของ element */
    /* กำหนดระยะห่างภายใน element */
}
.myButton:hover {
	background:linear-gradient(to bottom, #bdd7f2 5%, #27bff2 100%);
	background-color:#bdd7f2;
}
.myButton:active {
	position:relative;
	top:1px;
}
.table-container {
        width: 80%; /* กำหนดความกว้างของตารางให้เท่ากับ 80% ของขนาดหน้าจอ */
        margin: 0 auto; /* จัดตารางกึ่งกลางในหน้าจอ */
    }

    .myTable {
        width: 100%; /* กำหนดขนาดตารางให้เต็มขนาดคอนเทนเนอร์ */
    }
  </style>
</head>
<body>

@extends('layouts.app')
@section('title', 'เพิ่มuserพนักงาน')
@section('content')
<div class="container">
<div class="container">
  <img src="/images/erp.png" style="width: 140px; height: 140px; margin-bottom: 20px;">
</div>
 <form id="search-form">
    <div class="row">
      <div class="col-md-6">
        <div class="form-group">
          <label for="column-select" >ค้นหาใน column:</label>
          <select class="form-control" id="column-select" name="column">
            <option value="user_id">รหัสพนักงาน</option>
            <option value="name">ชื่อ</option>
            <option value="email">อีเมล</option>
            <option value="location">ที่เข้างาน</option>
          </select>
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          <label for="search-c">ค้นหา:</label>
          <input type="text" class="form-control" id="search-c" name="search-c" placeholder="ค้นหา..." list="location-options">
<datalist id="location-options">
  <option value="iship1_สาขาสายไหม"name="column"></option>
  <option value="iship2_สาขาประเวศ"name="column"></option>
</datalist>
        </div>
      </div>
    </div>
    <div class="form-group">
    <button type="submit" class="myButton">ค้นหา</button>
    <a href="{{ route('users.create') }}" class="myButton">เพิ่ม User</a>
</div>

  </form>
</div>

    <br>
    <div class="table-container">
    <table class="myTable">
    <table class="table table-hover "border="3" bordercolor="#27bff2" id="check-table">
        <thead class="bg-light">
            
            <h2>ตารางแสดงข้อมูลเข้า-เลิกงานของพนักงาน</h2>
            <tr>
                <th>วันที่</th>
                <th>รหัสพนักงาน</th>
                <th>ตำแหน่ง</th>
                <th>ชื่อ</th>
                <th>อีเมล</th>
                <th>in</th>
                <th>distance_IN</th>
                <th>out</th>
                <th>distance_OUT</th>
                <th>ที่เข้างาน</th>
                <th>ขอบเขตในการเช็ค</th>
            </tr>
        </thead>
        <tbody>
            @foreach($checks as $key => $check)
            <tr>
                <td>{{ date_format(date_create($check->C_DATE), 'd/m/Y') }}</td>
                <!-- <td>{{ $check->C_DATE }}</td> -->
                <td>{{ $check->user_id }}</td>
                <td>{{ $check->position }}</td>
                <td>{{ $check->name }}</td>
                <td>{{ $check->email }}</td>
                <td>{{ $check->CHECK_IN }}</td>
                <td>{{ $check->distance_IN }}</td>
                <td>{{ $check->CHECK_OUT }}</td>
                <td>{{ $check->distance_OUT }}</td>
                <td>{{ $check->LOCATION }}</td>
                <td>{{ $check->d_INOUT }}</td>
            </tr>
            @endforeach
           
        </tbody>
    </table>
</div>
</table>

</div>
<script>
  const searchForm = document.querySelector('#search-form');
const searchBtn = document.querySelector('#search-btn');
const checkTable = document.querySelector('#check-table tbody');
const searchInput = document.querySelector('#search-c');
const locationSelect = document.querySelector('#search-c');
locationSelect.addEventListener('focus', () => {
  if (document.querySelector('#column-select').value === 'location') {
    locationSelect.setAttribute('list', 'location-options');
  } else {
    locationSelect.removeAttribute('list');
  }
});

searchForm.addEventListener('submit', e => {
  e.preventDefault();
  const userId = document.querySelector('#search-c').value;
  const column = document.querySelector('#column-select').value; // เพิ่มการเลือกคอลัมน์
  const searchText = document.querySelector('#search-c').value;

  if (userId === '' || searchText === '') {
    // แสดงข้อความหรือดำเนินการเพิ่มเติมตามที่คุณต้องการเมื่อข้อมูลไม่ถูกต้องหรือไม่ครบถ้วน
    console.log('กรุณาเลือกคอลัมน์และกรอกข้อมูลให้ครบถ้วน');
    return;
  }

  let fetchUrl = '';

if (column === 'user_id') {
  fetchUrl = `/id/${userId}`;
} else if (column === 'name') {
  fetchUrl = `/name/${userId}`;
} else if (column === 'email') {
  fetchUrl = `/email/${userId}`;
} else if (column === 'location') {
  fetchUrl = `/location/${userId}`;
} else {
  console.log('คอลัมน์ที่เลือกไม่ถูกต้อง');
  return;
}

fetch(fetchUrl)
  .then(response => response.json())
  .then(data => {
    checkTable.innerHTML = data;
  })
  .catch(error => console.error(error));
});

</script>

@endsection

</body>
</html>