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
                <form action="{{ url('sendemail',$data->id) }}" method="POST" >
                    @csrf
                    <div style="padding:15px">
                        <label>Greeting</label>
                        <input required type="text" style="color:black;" name="greeting" placeholder="write the greeting"/>
                    </div>
                    <div style="padding:15px">
                        <label>Body</label>
                        <input required type="text" style="color:black;" name="body" placeholder="write the body"/>
                    </div>
                    <div style="padding:15px">
                        <label>Action Text</label>
                        <input required type="text" style="color:black;" name="action_text" placeholder="write the action text."/>
                    </div>
                    <div style="padding:15px">
                        <label>Action Url</label>
                        <input required type="text" style="color:black;" name="action_url" placeholder="write the action url."/>
                    </div>
                    <div style="padding:15px">
                        <label>End Part</label>
                        <input required type="text" style="color:black;" name="end_part" placeholder="write the end part."/>
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
