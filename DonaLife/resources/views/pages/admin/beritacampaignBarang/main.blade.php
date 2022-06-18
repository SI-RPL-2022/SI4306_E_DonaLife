<x-admin-layout title="Berita">
    <div id="content_list">
        <div class="post d-flex flex-column-fluid" id="kt_post">
            <div id="kt_content_container" class="container-xxl">
                <div class="card">
                    <form id="content_filter">
                        <div class="card-header border-0 pt-6">
                            <div class="card-title">
                                <div class="d-flex align-items-center position-relative my-1">
                                    <span class="svg-icon svg-icon-1 position-absolute ms-6">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                            <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2" rx="1" transform="rotate(45 17.0365 15.1223)" fill="black" />
                                            <path d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z" fill="black" />
                                        </svg>
                                    </span>
                                    <input type="text" name="keywords" onkeyup="load_list(1);" class="form-control form-control-solid w-250px ps-15" placeholder="Cari data..." />
                                </div>
                            </div>
                            <div class="card-toolbar">
                                <ul class="nav nav-tabs nav-line-tabs nav-stretch fs-6 border-0 me-10">
                                    <li class="nav-item">
                                        <a class="nav-link {{request()->is('admin/berita-campaignBarang') ? 'active' : ''}}" href="{{route('admin.berita-campaignBarang.index')}}">Berita Campaign Barang</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link {{request()->is('admin/berita-campaignUang') ? 'active' : ''}}" href="{{route('admin.berita-campaignUang.index')}}">Berita Campaign Uang</a>
                                    </li>
                                </ul>
                                <div class="d-flex justify-content-end">
                                    <button type="button" onclick="load_input('{{route('admin.berita-campaignBarang.create')}}');" class="btn btn-sm btn-primary">Tambah Data</button>
                                </div>
                            </div>
                        </div>
                    </form>
                    <div class="card-body pt-0">
                        <div class="table-responsive">
                            <div id="list_result"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="content_input"></div>
    @section('custom_js')
        <script>
            load_list(1);
        </script>
    @endsection
</x-admin-layout>