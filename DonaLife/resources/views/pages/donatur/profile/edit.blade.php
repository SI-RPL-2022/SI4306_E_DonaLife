<form id="form_profile">
    <div class="row col-mb-50 gutter-50">
        <div class="col-lg-6">
            <h3>Akun</h3>
            <div class="row mb-0">
                <div class="col-md-6 form-group">
                    <label for="billing-form-name">Name:</label>
                    <input type="text" name="name" value="{{Auth::user()->nama}}" class="sm-form-control" />
                </div>
                <div class="col-md-6 form-group">
                    <label for="billing-form-email">Email Address:</label>
                    <input type="email" name="email" value="{{Auth::user()->email}}" class="sm-form-control" />
                </div>
                <div class="w-100"></div>

                <div class="col-md-6 form-group">
                    <label for="billing-form-phone">Phone:</label>
                    <input type="text" name="phone" value="{{Auth::user()->telepon}}" class="sm-form-control" />
                </div>
                <div class="col-md-6 form-group">
                    <label for="billing-form-password">Password:</label>
                    <input type="password" name="password" class="sm-form-control" />
                </div>
            </div>
        </div>

        <div class="col-lg-6">
            <h3>Alamat</h3>
            <div class="row mb-0">
                <div class="col-12 form-group">
                    <label for="address">Address:</label>
                    <input type="text" name="address" value="{{Auth::user()->alamat}}" class="sm-form-control" />
                </div>

                <div class="col-6 form-group">
                    <label for="province">Province</label>
                    <select class="form-control" name="province" id="province" class="form-control" required>
                        <option value="">Pilih Provinsi</option>
                        @foreach ($provinsi as $item)
                        <option value="{{$item->id}}" {{$item->id==$user->province_id?'selected':''}}>{{$item->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-6 form-group">
                    <label for="city">City / Town</label>
                    <select class="form-control" name="city" id="city" class="form-control" required>
                        <option value="">Pilih Provinsi Terlebih Dahulu</option>
                    </select>
                </div>
                <div class="col-6 form-group">
                    <label for="subdistrict">Subdistrict</label>
                    <select class="form-control" name="subdistrict" id="subdistrict" class="form-control" required>
                        <option value="">Pilih Kota Terlebih Dahulu</option>
                    </select>
                </div>
                <div class="col-6 form-group">
                    <label for="postcode">Postcode</label>
                    <input type="text" name="postcode" value="{{Auth::user()->postcode}}" class="sm-form-control" />
                </div>

            </div>
        </div>

        @if(!Auth::user()->nik)
        <div class="col-lg-6">
            <h3>Informasi Personal</h3>
            <div class="row mb-0">

                <div class="col-12 form-group">
                    <label for="ktp_photo">Ktp Photo <small>*</small></label>
                    <input type="file" class="form-control" accept="image/*" name="ktp_photo" value="{{Auth::user()->ktp_ktp_photo}}">
                </div>
                <div class="col-12 form-group">
                    <label for="selfie_photo">Selfie dengan Ktp <small>*</small></label>
                    <input type="file" class="form-control" accept="image/*" name="selfie_photo" value="{{Auth::user()->selfie_photo}}">
                </div>

                <div class="col-12 form-group">
                    <label for="nik">Nik:</label>
                    <input type="text" name="nik" value="{{Auth::user()->nik}}" class="sm-form-control" />
                </div>

                <div class="col-6 form-group">
                    <label for="rekening">Rekening</label>
                    <input type="tel" name="rekening" value="{{Auth::user()->rekening}}" class="sm-form-control" />
                </div>

                <div class="col-6 form-group">
                    <label for="nama_bank">Nama Bank</label>
                    <select class="form-control" name="nama_bank" id="nama_bank" class="form-control">
                        <option value="">Pilih Bank</option>
                        <option value="bca" {{ Auth::user()->nama_bank == 'bca' ? 'selected' : ''}}>BCA</option>
                        <option value="bni" {{ Auth::user()->nama_bank == 'bni' ? 'selected' : ''}}>BNI</option>
                        <option value="mandiri" {{ Auth::user()->nama_bank == 'mandiri' ? 'selected' : ''}}>Mandiri</option>
                        <option value="bri" {{ Auth::user()->nama_bank == 'bri' ? 'selected' : ''}}>BRI</option>
                    </select>
                </div>

            </div>
            <div class="col-lg-12">
                <button id="tombol_simpan" onclick="handle_upload('#tombol_simpan','#form_profile','{{route('profile.update',$user->id)}}','POST','Update')" class="button button-3d float-end">Update</button>
            </div>
        </div>

        @else

        <div class="col-lg-6">
            <h3>Informasi Personal</h3>
            <div class="row mb-0">
                <div class="col-12 form-group">
                    <label for="nik">Nik:</label>
                    <input type="text" disabled value="{{Auth::user()->nik}}" class="sm-form-control" />
                </div>

                <div class="col-6 form-group">
                    <label for="rekening">Rekening</label>
                    <input type="tel" disabled value="{{Auth::user()->rekening}}" class="sm-form-control" />
                </div>

                <div class="col-6 form-group">
                    <label for="nama_bank">Nama Bank</label>
                    <select class="form-control" disabled class="form-control">
                        <option value="">Pilih Bank</option>
                        <option value="bca" {{ Auth::user()->nama_bank == 'bca' ? 'selected' : ''}}>BCA</option>
                        <option value="bni" {{ Auth::user()->nama_bank == 'bni' ? 'selected' : ''}}>BNI</option>
                        <option value="mandiri" {{ Auth::user()->nama_bank == 'mandiri' ? 'selected' : ''}}>Mandiri</option>
                        <option value="bri" {{ Auth::user()->nama_bank == 'bri' ? 'selected' : ''}}>BRI</option>
                    </select>
                </div>

            </div>
        </div>

        @endif
        <button class="btn btn-primary" onclick="load_list(1);">Kembali</button>
    </div>
</form>

<script>
    @if($user -> province_id)
    $('#province').val('{{$user->province_id}}');
    setTimeout(function() {
        $('#province').trigger('change');
        setTimeout(function() {
            $('#city').val('{{$user->city_id}}');
            $('#city').trigger('change');
            setTimeout(function() {
                $('#subdistrict').val('{{$user->subdistrict_id}}');
            }, 2000);
        }, 2000);
    }, 1000);
    @endif
    $("#province").change(function() {
        $.ajax({
            type: "POST",
            url: "{{route('city.get_list')}}",
            data: {
                id_province: $("#province").val()
            },
            success: function(response) {
                $("#city").html(response);
            }
        });
    });
    $("#city").change(function() {
        $.ajax({
            type: "POST",
            url: "{{route('subdistrict.get_list')}}",
            data: {
                id_city: $("#city").val()
            },
            success: function(response) {
                $("#subdistrict").html(response);
            }
        });
    });
    number_only('rekening');
</script>