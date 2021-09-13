<link rel="stylesheet" href="{{asset('backend/plugins/select2/select2.min.css')}}">

<div class="modal-header">
    <h5 class="modal-title" id="exampleModalLabel">Edit Shipping Address</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>

<form class="ps-form--account-setting" id="bk_address" action="{{route('user.address.update',$address->id)}}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="modal-body">
        @php
            $districts = \App\Model\District::all();
        @endphp
        <div class="form-group m-2">
            <label for="district_id" class="">District</label>
            <select name="district_id" id="district_id_2" class="form_height form-control select2" style="width: 100%;" required>
                <option value="">Select District</option>
                @foreach($districts as $district)
                    <option value="{{$district->id}}" {{$address->district_id == $district->id ? 'selected': ''}}>{{$district->name}}</option>
                @endforeach

            </select>
        </div>
        <div class="form-group m-2">
            <label for="area" class="">Area</label>
            <select name="area_id" id="area-2" class="form_height form-control select2" style="width: 100%;" required>
                <option value="">Select Area</option>

            </select>
        </div>
        <div class="form-group m-2">
            <label for="phone" class="">Phone</label>
            <input type="text" class="form-control form_height form-control-sm" name="phone" value="{{$address->phone}}">
        </div>
        <div class="form-group m-2">
            <label for="phone" class="">Address</label>
            <textarea name="address" id="address" rows="3" placeholder="Enter Your Address" class="form-control">{!! $address->address !!}</textarea>
            <small class="text-info"><i class="fa fa-info-circle"></i> e.g. 4th Floor, BBTOA Building,9 No South, Mirpur Rd</small>
        </div>
        <div class="form-group m-2">
            <label for="phone" class="">Address Type</label>
            <select name="type" id="type" class="form_height form-control select2" style="width: 100%;" required>
                <option value="Home" {{$address->type = 'Home' ? 'selected' : ''}}>Home</option>
                <option value="Office" {{$address->type = 'Office' ? 'selected' : ''}}>Office</option>
                <option value="Others" {{$address->type = 'Others' ? 'selected' : ''}}>Others</option>
            </select>
        </div>

    </div>
    <div class="form-group submit text-center">
        <button class="ps-btn">Save</button>
    </div>
</form>
<script src="{{asset('backend/plugins/select2/select2.full.min.js')}}"></script>
<script>
    $('.select2').select2();

    $(document).ready(function () {
        get_areas();
        $('#district_id_2').on('change', function () {
            get_areas();
        });

    function get_areas(){
        var district_id = $('#district_id_2').val();
        console.log(district_id)
        $.post('{{ route('get-areas') }}', {
            _token: '{{ csrf_token() }}',
            district_id: district_id
        }, function (data) {
            $('#area-2').html(null);
            for (var i = 0; i < data.length; i++) {
                $('#area-2').append($('<option>', {
                    value: data[i].id,
                    text: data[i].name
                }));
            }
            $("#area-2 > option").each(function() {
                if(this.value == '{{$address->area_id}}'){
                    $("#area-2").val(this.value).change();
                }
            });

        });
    }

    });
</script>
