<!DOCTYPE html>
<html lang="en">
@include('theme.donatur.head')
<body class="stretched">
@include('theme.donatur.header')
<div id="wrapper" class="clearfix">
    <section id="content">
        <div class="content-wrap">
            <div class="container clearfix">
                {{$slot}}
            </div>
        </div>
    </section>
    <footer id="footer" class="dark">
        <div id="copyrights">
            <div class="container">
                <div class="row col-mb-30">
                    <div class="col-md-6 text-center text-md-start">
                        Copyrights &copy; {{date('Y')}} All Rights Reserved by {{config('app.name')}} Inc.<br>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</div>
@include('theme.donatur.js')
@yield('custom_js')
</body>
</html>