<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <!-- Latest compiled and minified CSS & JS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.css">

    <meta name="csrf-token" content="{{ csrf_token() }}">
    ​
</head>
<body>
<div class="container">
    <a href="#" class="btn btn-success btn-add" id="addst" data-target="#modal-add" data-toggle="modal">Add</a>
    <div class="table-responsive">
        <table class="table table-hover">
            <thead>
            <tr>
                <th>ID</th>
                <th>Họ tên</th>
                <th>Email</th>
                <th>Ngày sinh</th>
                <th>Giới tính</th>
                <th>Số điện thoại</th>
                <th>Avatar</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>

            @foreach ($db as $student)
                <tr>
                    <td id="{{$student->id}}">{{$student->id}}</td>
                    <td id="hoten-{{$student->id}}">{{$student->full_name}}</td>
                    <td id="email-{{$student->id}}">{{$student->email}}</td>
                    <td id="ngaysinh-{{$student->id}}">{{$student->birth}}</td>
                    <td id="gioitinh-{{$student->id}}">
                        <?php
                        if ($student->gender==1)
                            {
                                echo 'Nam';
                            }
                        else
                            {
                                echo 'Nữ';
                            }
                        ?>
                    </td>
                    <td id="sdt-{{$student->id}}">{{$student->phonenumber}}</td>
                    <td id="image-{{$student->id}}">{{$student->image}}</td>
                    <td>
                        <button type="button" data-target="#show" data-toggle="modal" class="btn btn-info btn-show">Detail</button>
                        <button type="button" data-target="#edit" data-toggle="modal" class="btn btn-warning btn-edit">Edit</button>
                        <button type="button" data-target="#delete" data-toggle="modal" class="btn btn-danger btn-delete">Delete</button>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    {{-- {{$students->links()}} --}}
</div>

@include('add')
{{--@include('edit')--}}

<script
    src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"
></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js" type="text/javascript"
        charset="utf-8" async defer></script>
<script type="text/javascript" charset="utf-8">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>
<script type="text/javascript">
    $(document).ready(function () {
        $('#form-add').submit(function (e) {
            e.preventDefault();
            var url = $(this).attr('data-url');
            $.ajax({
                type: 'post',
                url: url,
                data: {
                    hoten: $('#hoten-add').val(),
                    email: $('#email-add').val(),
                    ngaysinh: $('#ngaysinh-add').val(),
                    gioitinh: $('#gioitinh-add').val(),
                    sdt: $('#sdt-add').val(),
                    avatar: $('#avatar-add').val(),
                },
                success: function (response) {
                    toastr.success(response.message)
                    $('#modal-add').modal('hide');
                    console.log(response.data)
                    $('tbody').prepend('<tr><td id="' + response.data.id + '">' + response.data.id + '</td><td id="hoten-' + response.data.id + '">' + response.data.hoten + '</td><td id="email-' + response.data.id + '">' + response.data.email + '</td><td id="ngaysinh-' + response.data.id + '">' + response.data.ngaysinh + '</td><td id="gioitinh-' + response.data.id + '">' + response.data.gioitinh + '</td><td id="sdt-' + response.data.id + '">' + response.data.sdt + '</td><td id="diachi-' + response.data.id + '">' + response.data.diachi + '</td><td><button data-url="{{asset('')}}studentajax/' + response.data.id + '"​ type="button" data-target="#show" data-toggle="modal" class="btn btn-info btn-show">Detail</button><button style="margin-left: 5px;" data-url="{{asset('')}}studentajax/' + response.data.id + '"​ type="button" data-target="#edit" data-toggle="modal" class="btn btn-warning btn-edit">Edit</button><button style="margin-left: 5px;" data-url="{{asset('')}}studentajax/' + response.data.id + '"​ type="button" data-target="#delete" data-toggle="modal" class="btn btn-danger btn-delete">Delete</button></td></tr>');

                },
                error: function (jqXHR, textStatus, errorThrown) {

                }
            })
        })

    })
</script>
</body>
</html>
