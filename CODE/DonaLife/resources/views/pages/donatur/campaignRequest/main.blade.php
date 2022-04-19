<x-donatur-layout title="Request Campaign">
    <div id="content_list">
        <section id="page-title">
            <div class="container clearfix">
                <h1>Request Campaign ?</h1>
            </div>
    
        </section>
        
        <section id="content">
            <div class="content-wrap">
                @auth
                @if(Auth::user()->nik == null )
                    <a class="btn btn-primary" href="{{route('campaign-request.create')}}">Request Campaign </a>
                @else
                    <button class="btn btn-primary" onclick="load_input('{{route('campaign-request.create')}}')">Request Campaign </button>
                @endif
                <div id="list_result"></div>
                @endauth
                @guest
                <button class="btn btn-primary" onclick="load_input('{{route('auth.index')}}')">Request Campaign </button>
                @endguest
            </div>
        </section>
    </div>
    <div id="content_input"></div>
    @section('custom_js')
        <script>
            load_list(1);
        </script>
    @endsection
</x-donatur-layout>