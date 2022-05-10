<!DOCTYPE html>
<html lang="en">
@include('theme.admin.head')
<body>
    <div class="d-flex flex-column flex-root">
        <div class="page d-flex flex-row flex-column-fluid">
            @include('theme.admin.aside')
            <div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">
                @include('theme.admin.header')
                <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
                    {{$slot}}
                </div>
                @include('theme.admin.footer')
            </div>
        </div>
    </div>
@include('theme.admin.js')
@yield('custom_js')
</body>
</html>