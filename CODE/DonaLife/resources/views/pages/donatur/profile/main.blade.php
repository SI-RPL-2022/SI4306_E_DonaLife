<x-donatur-layout title="{{Auth::user()->nama}}">
    <section id="content">
        <div class="content-wrap">
            <div class="container clearfix">
                <div id="content_list">
                    <div class="row clearfix">
                        <div class="col-md-12">
                            @if(isset($errorMessage))
                            <div class="alert alert-danger">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                {{ $errorMessage }}
                            </div>
                            @endif
                            <img src="{{asset('img/avatars/admin.png')}}" class="alignleft img-circle img-thumbnail my-0" alt="Avatar" style="max-width: 84px;">
                            <div class="heading-block border-0">
                                <h3>{{Auth::user()->nama}}</h3>
                                <a href="javascript:;" onclick="load_input('{{route('profile.edit',Auth::user()->id)}}');" style="float:right;" class="button button-3d button-rounded button-white button-light">
                                    Edit Profile
                                </a>
                                <span>Your Profile Bio</span>
                            </div>

                            <div id="list_result"></div>
                            <div class="clear"></div>
                        </div>
                    </div>
                </div>
                <div id="content_input"></div>
            </div>
        </div>
    </section>
    @section('custom_js')
    <script type="text/javascript">
        load_list(1);
    </script>
    @endsection
</x-donatur-layout>