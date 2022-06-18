<x-auth-admin-layout title="Masuk">
    <div id="page_login">
        <div class="w-lg-500px p-10 p-lg-15 mx-auto">
            <form class="form w-100" novalidate="novalidate" id="form_login">
                <div class="text-center mb-10">
                    <h1 class="text-dark mb-3">Masuk ke {{config('app.name')}}</h1>
                </div>
                <div class="fv-row mb-10">
                    <label class="form-label fs-6 fw-bolder text-dark">Email</label>
                    <input class="form-control form-control-lg form-control-solid" type="text" id="email" name="email" autocomplete="off" data-login="1" />
                </div>
                <div class="fv-row mb-10">
                    <div class="d-flex flex-stack mb-2">
                        <label class="form-label fw-bolder text-dark fs-6 mb-0">Kata Sandi</label>
                        <a href="javascript:;" onclick="auth_content('page_forgot');" class="link-primary fs-6 fw-bolder">Tidak ingat kata sandi ?</a>
                    </div>
                    <input class="form-control form-control-lg form-control-solid" type="password" id="password" name="password" autocomplete="off" data-login="2" />
                </div>
                <div class="text-center">
                    <button id="tombol_login" onclick="handle_post('#tombol_login','#form_login','{{route('admin.auth.login')}}');" data-login="3" class="btn btn-lg btn-primary w-100 mb-5">
                        <span class="indicator-label">Masuk</span>
                        <span class="indicator-progress">Harap tunggu...
                        <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                    </button>
                </div>
            </form>
        </div>
    </div>
    <div id="page_forgot">
        <div class="w-lg-500px p-10 p-lg-15 mx-auto">
            <form class="form w-100" novalidate="novalidate" id="form_forgot">
                <div class="text-center mb-10">
                    <h1 class="text-dark mb-3">Tidak ingat kata sandi ?</h1>
                    <div class="text-gray-400 fw-bold fs-4">Masukkan email Anda untuk mengatur ulang kata sandi Anda.</div>
                </div>
                <div class="fv-row mb-10">
                    <label class="form-label fs-6 fw-bolder text-dark">Email</label>
                    <input class="form-control form-control-lg form-control-solid" type="text" name="email" autocomplete="off" />
                </div>
                <div class="text-center">
                    <button type="submit" id="kt_sign_in_submit" class="btn btn-lg btn-primary fw-bolder me-4">
                        <span class="indicator-label">Lanjutkan</span>
                        <span class="indicator-progress">Harap tunggu...
                        <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                    </button>
                    <a href="javascript:;" onclick="auth_content('page_login');" class="btn btn-lg btn-light-primary fw-bolder">Batalkan</a>
                </div>
            </form>
        </div>
    </div>
    @section('custom_js')
        <script>
            auth_content('page_login');
        </script>
    @endsection
</x-auth-admin-layout>