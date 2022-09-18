@extends('layouts.master')

@section('body')
<div class="row">
    <div class="col-4">
    </div>
    <div class="col-4">
        <br><br>
        <table class="table table-striped" id="myTable" border="5">
            <tbody>
            </tbody>
        </table>
        <div class="form-group">
            <label for="">User ID</label>
            <input type="text" class="form-control" name="id" id="id" aria-describedby="emailHelpId" placeholder="1">
            <label for="exampleFormControlSelect1">Select License For(Month)</label>
            <select class="form-control" id="time">
                <option>3</option>
                <option>6</option>
                <option>12</option>
            </select>


            <label for="">License Key</label>
            <input type="text" class="form-control" name="key" id="key" aria-describedby="emailHelpId" disabled>
            <br>
            <button onclick="keyGen()" class="btn btn-success">Generate key</button>


        </div>
    </div>
    <div class="col-4">

    </div>
</div>

<script>
    $('#id').keypress(function (event) {
        var keycode = (event.keyCode ? event.keyCode : event.which);
        if (keycode == '13') {
            var user_id = $('#id').val();
            $.ajax({
                type: 'GET',
                url: '/getinfo/' + user_id,
                //    data:'_token = <?php echo csrf_token() ?>',
                success: function (data) {
                    //   $("#msg").html(data.msg);
                    $("#myTable tr").remove();
                    $('#myTable').append('<tr><td>First Name : </td><td>' + data.first_name +
                        '</td></tr>');
                    $('#myTable').append('<tr><td>Last Name : </td><td>' + data.last_name +
                        '</td></tr>');
                    $('#myTable').append('<tr><td>Organization : </td><td>' + data.org +
                        '</td></tr>');
                    $('#myTable').append('<tr><td>Street : </td><td>' + data.street + '</td></tr>');
                    $('#myTable').append('<tr><td>City : </td><td>' + data.city + '</td></tr>');
                    $('#myTable').append('<tr><td>Mobile Number: </td><td>' + data.mobile_number +
                        '</td></tr>');
                    $('#myTable').append('<tr><td>Email : </td><td>' + data.email + '</td></tr>');
                    $('#myTable').append('<tr><td>License Key : </td><td>' + data.license_key +
                        '</td></tr>');

                },
                error: function (XMLHttpRequest, textStatus, errorThrown) {
                    alert("User: " + errorThrown);
                }
            });

        }
    });

    function keyGen(){
        var user_id = $('#id').val();
        var duration = $('#time').val();
        $.ajax({
            type: 'GET',
            url: '/generate_key/'+user_id+'/'+duration,
            success: function(data){
                $('#key').val(data);
            },
            error: function (XMLHttpRequest, textStatus, errorThrown) {
                    alert("User: " + errorThrown);
                }

        });
    }

</script>
@endsection
