<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.css')
    <style>
        label{
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
                @if(session()->has('message'))
                    <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert">x</button>
                        {{ session()->get('message') }}
                    </div>
                @endif
                <table>
                    <tr style="background-color: black; ">
                        <th style="padding: 10px;">Customer name</th>
                        <th style="padding: 10px;">Email</th>
                        <th style="padding: 10px;">Phone</th>
                        <th style="padding: 10px;">Doctor</th>
                        <th style="padding: 10px;">Date</th>
                        <th style="padding: 10px;">Message</th>
                        <th style="padding: 10px;">Status</th>
                        <th style="padding: 10px;">Approved</th>
                        <th style="padding: 10px;">Cancelled</th>
                        <th style="padding: 10px;">Send Mail</th>
                    </tr>
                    @foreach($appointments as $appointment)
                    <tr align="center" style="background-color: skyblue; border:1px dotted black;">
                        <td style="padding: 10px; border:1px dotted black;">{{ $appointment->name }}</td>
                        <td style="padding: 10px; border:1px dotted black;">{{ $appointment->email }}</td>
                        <td style="padding: 10px; border:1px dotted black;">{{ $appointment->phone }}</td>
                        <td style="padding: 10px; border:1px dotted black;">{{ $appointment->doctor }}</td>
                        <td style="padding: 10px; border:1px dotted black;">{{ $appointment->date }}</td>
                        <td style="padding: 10px; border:1px dotted black;">{{ $appointment->message }}</td>
                        <td style="padding: 10px; border:1px dotted black;">{{ $appointment->status }}</td>
                        <td style="padding: 10px; border:1px dotted black;">
                            <a class="btn btn-success" href="{{ url('approved',$appointment->id) }}">Approved</a>
                        </td>
                        <td style="padding: 10px; border:1px dotted black;">
                            <a class="btn btn-danger" href="{{ url('cancelled',$appointment->id) }}">Cancelled</a>
                        </td>
                        <td style="padding: 10px; border:1px dotted black;">
                            <a class="btn btn-primary" href="{{ url('emailview',$appointment->id) }}">Send MAil</a>
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
