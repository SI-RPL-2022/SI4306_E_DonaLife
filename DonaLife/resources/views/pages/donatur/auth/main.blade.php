<x-auth-donatur-layout title="Masuk">
    <section id="content">
        <div class="content-wrap">
            <div class="container clearfix">

                <div class="tabs mx-auto mb-0 clearfix" id="tab-login-register" style="max-width: 500px;">

                    <ul class="tab-nav tab-nav2 center clearfix">
                        <li class="inline-block"><a href="#tab-login">Login</a></li>
                        <li class="inline-block"><a href="#tab-register">Register</a></li>
                    </ul>

                    <div class="tab-container">

                        <div class="tab-content" id="tab-login">
                            <div class="card mb-0">
                                <div class="card-body" style="padding: 40px;">
                                    <form id="form_login" name="login-form" class="mb-0" >

                                        <h3>Login to your Account</h3>

                                        <div class="row">
                                            <div class="col-12 form-group">
                                                <label for="email">Email:</label>
                                                <input type="text" id="email" name="email" class="form-control" />
                                            </div>

                                            <div class="col-12 form-group">
                                                <label for="password">Password:</label>
                                                <input type="password" id="password" name="password" class="form-control" />
                                            </div>

                                            <div class="col-12 form-group">
                                                <button type="button" onclick="auth_user('#tombol_login','#form_login','{{route('auth.login')}}');" class="button button-3d button-black m-0" id="tombol_login" value="login">Login</button>
                                            </div>
                                        </div>

                                    </form>
                                </div>
                            </div>
                        </div>

                        <div class="tab-content" id="tab-register">
                            <div class="card mb-0">
                                <div class="card-body" style="padding: 40px;">
                                    <h3>Register for an Account</h3>

                                    <form id="form_register" class="row mb-0">

                                        <div class="col-12 form-group">
                                            <label for="nama">Name:</label>
                                            <input type="text" id="nama" name="nama" class="form-control" />
                                        </div>

                                        <div class="col-12 form-group">
                                            <label for="email">Email Address:</label>
                                            <input type="text" id="email" name="email" class="form-control" />
                                        </div>

                                        <div class="col-12 form-group">
                                            <label for="telepon">Phone:</label>
                                            <input type="text" id="telepon" name="telepon" class="form-control" />
                                        </div>

                                        <div class="col-12 form-group">
                                            <label for="password">Choose Password:</label>
                                            <input type="password" id="password" name="password" class="form-control" />
                                        </div>

                                        <div class="col-12 form-group">
                                            <label for="rpassword">Re-enter Password:</label>
                                            <input type="password" id="rpassword" name="rpassword" class="form-control" />
                                        </div>

                                        <div class="col-12 form-group">
                                            <button type="button" class="button button-3d button-black m-0" id="tombol_register" onclick="auth_user('#tombol_register','#form_register','{{route('auth.register')}}');">Register Now</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>

            </div>
        </div>
    </section>
</x-auth-donatur-layout>