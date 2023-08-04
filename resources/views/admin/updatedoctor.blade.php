<!DOCTYPE html>
<html lang="en">

<head>
    <base href="/public">
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
                <form action="{{ url('editdoctor',$doctor->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div style="padding:15px">
                        <label>Doctor Name</label>
                        <input required type="text" style="color:black;" name="name" placeholder="write the name" value="{{ $doctor->name }}"/>
                    </div>
                    <div style="padding:15px">
                        <label>Phone</label>
                        <input required type="number" style="color:black;" name="phone" placeholder="write the number" value="{{ $doctor->phone }}"/>
                    </div>
                    <div style="padding:15px">
                        <label>Speciality</label>
                        <select required name="speciality" style="color: black; width:200px">
                            <option value="">Select</option>
                            <option @if($doctor->speciality == 'skin') selected @endif value="skin">Skin</option>
                            <option @if($doctor->speciality == 'heart') selected @endif value="heart">Heart</option>
                            <option @if($doctor->speciality == 'eye') selected @endif value="eye">Eye</option>
                            <option @if($doctor->speciality == 'ent') selected @endif value="ent">ENT</option>
                        </select>
                    </div>
                    <div style="padding:15px">
                        <label>Room No</label>
                        <input required type="text" style="color:black;" name="room" placeholder="write the room no." value="{{ $doctor->room }}"/>
                    </div>
                    <div style="padding:15px">
                        <label>Doctor Image</label>
                        <img src="doctor_image/{{ $doctor->image }}"/>
                        <input type="file" style="color:black;" name="file" />
                    </div>
                    <div style="padding:15px">
                        <input type="submit" class="btn btn-primary" value="Submit"/>
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
