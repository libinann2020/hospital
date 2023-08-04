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
                <form action="{{ url('upload_doctor') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div style="padding:15px">
                        <label>Doctor Name</label>
                        <input required type="text" style="color:black;" name="name" placeholder="write the name"/>
                    </div>
                    <div style="padding:15px">
                        <label>Phone</label>
                        <input required type="number" style="color:black;" name="phone" placeholder="write the number"/>
                    </div>
                    <div style="padding:15px">
                        <label>Speciality</label>
                        <select  required name="speciality" style="color: black; width:200px">
                            <option value="">Select</option>
                            <option value="skin">Skin</option>
                            <option value="heart">Heart</option>
                            <option value="eye">Eye</option>
                            <option value="ent">ENT</option>
                        </select>
                    </div>
                    <div style="padding:15px">
                        <label>Room No</label>
                        <input required type="text" style="color:black;" name="room" placeholder="write the room no."/>
                    </div>
                    <div style="padding:15px">
                        <label>Doctor Image</label>
                        <input required type="file" style="color:black;" name="file" />
                    </div>
                    <div style="padding:15px">
                        <input type="submit" class="btn btn-success" value="Submit"/>
                    </div>
                </form>
            </div>
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    @include('admin.script')
</body>

</html>
