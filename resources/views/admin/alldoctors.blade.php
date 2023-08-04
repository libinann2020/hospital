<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.css')
    <style>
        label {
            display: inline-block;
            width: 200px;
        }
    </style>
</head>

<body>
    <div class="container-scroller">
        <!-- partial:partials/_sidebar.html -->
        @include('admin.sidebar')
        <!-- partial -->
        @include('admin.navbar')
        <div class="container-fluid page-body-wrapper">
            <div class="container" align="center" style="padding-top:100px;">
                <table>
                    <tr style="background-color: black; ">
                        <th style="padding: 10px;">Doctor name</th>
                        <th style="padding: 10px;">Phone</th>
                        <th style="padding: 10px;">Speciality</th>
                        <th style="padding: 10px;">Room No</th>
                        <th style="padding: 10px;">Image</th>
                        <th style="padding: 10px;">Delete</th>
                        <th style="padding: 10px;">Update</th>
                    </tr>
                    @foreach($doctors as $doctor)
                    <tr align="center" style="background-color: skyblue; border:1px dotted black;">
                        <td style="padding: 10px; border:1px dotted black;">{{ $doctor->name }}</td>
                        <td style="padding: 10px; border:1px dotted black;">{{ $doctor->phone }}</td>
                        <td style="padding: 10px; border:1px dotted black;">{{ $doctor->speciality }}</td>
                        <td style="padding: 10px; border:1px dotted black;">{{ $doctor->room }}</td>
                        <td style="padding: 10px; border:1px dotted black;"><img src="doctor_image/{{ $doctor->image }}"
                                alt=""></td>
                        <td style="padding: 10px; border:1px dotted black;">
                            <a onclick="return confirm('Are you sure to delete this!!!')"
                                href="{{ url('delete_doctor',$doctor->id) }}" class="btn btn-danger">Delete</a>
                        </td>
                        <td style="padding: 10px; border:1px dotted black;">
                            <a href="{{ url('update_doctor',$doctor->id) }}" class="btn btn-warning">Update</a>
                        </td>
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    @include('admin.script')
</body>

</html>
