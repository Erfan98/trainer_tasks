@extends('layouts.master')

@section('body')
<div class="row">
    <div class="col-4">
    </div>
    <div class="col-4">
        <div class="form-group">
            <h3>Enter License Key</h3>
            <label for="">License Key</label>
            <input type="text" class="form-control" name="key" id="key">
            <br>
            <button onclick="save()" class="btn btn-success">Activate Key</button>


        </div>
    </div>
    <div class="col-4">

    </div>
</div>

<script>
    function save(){
        var key = $('#key').val();
        $.ajax({
            type: 'GET',
            url: '/active/'+key,
            success: function(data){
                alert("Congratulations!! Your License Has Been Activated. It will work till "+data)
            },
            error: function (XMLHttpRequest, textStatus, errorThrown) {
                    alert("Invalid License Key");
                }

        });
    }

</script>
@endsection
