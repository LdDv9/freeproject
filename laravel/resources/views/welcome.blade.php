<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="{{asset('asset/bootstrap/css/bootstrap.min.css')}}">
        <script src="{{asset('asset/jq/jquery-3.3.1.min.js')}}"></script>
        <script src="{{asset('asset/bootstrap/js/bootstrap.min.js')}}"></script>
        <script src="{{asset('asset/plugin/swal/sweetalert2.all.js')}}"></script>
        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                /*font-family: 'Raleway', sans-serif;*/
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
                font-weight: lighter;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
    <div class="flex-center position-ref full-height">
        <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
            <a class="navbar-brand" href="{{site_url()}}">Home Fox</a>
            @if (is_user_logged_in())
                <div class="top-right links">
                    <p class="links">Hello : {{wp_get_current_user()->data->display_name}} |
                        @if(in_array('administrator',wp_get_current_user()->roles))
                            <a href="{{admin_url()}}">Admin board</a>
                        @endif
                    </p>

                </div>
            @else
                <div class="top-right links">
                    <p>Not logged in</p>
                </div>
            @endif
        </nav>

            <div class="content">
                <div class="title m-b-md">
                    <p>Laravel</p>
                </div>
                <div class="links">
                    <a href="https://laravel.com/docs">Documentation</a>
                    <a href="https://laracasts.com">Laracasts</a>
                    <a href="https://laravel-news.com">News</a>
                    <a href="https://forge.laravel.com">Forge</a>
                    <a href="https://github.com/laravel/laravel">GitHub</a>
                </div>
                <button id="testAjax" class="btn btn-primary">Click</button>
                <button id="getPost" class="btn btn-primary">Get data post</button>

                <h2>Modal Example</h2>
                <!-- Trigger the modal with a button -->
                <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Login</button>
                <button type="button" class="btn btn-lg btn-danger" onclick="logOut()">Logout</button>
                <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#register">Register</button>
                <!-- Modal login-->
                <div class="modal fade" id="myModal" role="dialog">
                    <div class="modal-dialog">
                        <!-- Modal content-->
                        <div class="modal-content col-md-12" >
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">Please type your info</h4>
                            </div>
                            <form action="" id="formSignIn">
                                <div class="form-group">
                                    <input class="form-control" type="text" name="user_login" placeholder="Your Email">
                                </div>
                                <div class="form-group">
                                    <input class="form-control" type="password" name="user_password" placeholder="Your Password">
                                </div>
                            </form>
                            <div class="modal-body">
                                <button id="singIn" class="btn btn-primary">SignIn</button>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            </div>
                        </div>

                    </div>
                </div>
                <!--Modal register -->
                <div class="modal fade" id="register" role="dialog">
                    <div class="modal-dialog">
                        <!-- Modal content-->
                        <div class="modal-content col-md-12" >
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">Please type your info to register</h4>
                            </div>
                            <form action="" id="formRegister">
                                <div class="form-group">
                                    <input class="form-control" type="text" name="user_login" placeholder="Your name account">
                                </div>
                                <div class="form-group">
                                    <input class="form-control" type="password" name="user_password" placeholder="Your Password">
                                </div>
                                <div class="form-group">
                                    <input class="form-control" type="text" name="user_email" placeholder="Your Email address">
                                </div>
                                <div>
                                    <input type="hidden" name="action" value="handler_laravel">
                                    <input type="hidden" name="method" value="RegisterUser">
                                    <input class="btn btn-info" type="submit" name="register" id="submitRegisterUser" value="Register">
                                </div>
                            </form>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
    </div>
    </body>
    <script >
        function logOut() {
            $.ajax({
                url:"<?php echo admin_url('admin-ajax.php')?>",
                method: 'POST',
                data: {
                    action : 'handler_laravel',
                    method :'LogOut'
                },
                dataType : 'json',
                beforeSend : function () {
                    swal({
                        title :  'LogOut'
                    });
                    swal.showLoading();
                },
                success : function (data) {
                    if (data.success) {
                        swal({
                            title :  'success',
                            type:'success'
                        }).then(function () {
                            window.location.reload();
                        });
                    } else {
                        swal({
                            title :  'error',
                            type:'warning',
                            html: data.mess,
                        });
                    }
                }
            });
        }
        $('#testAjax').click(function () {
            $.ajax({
                url:"<?php echo admin_url('admin-ajax.php')?>",
                method: 'POST',
                data:{
                    action : "handler_laravel",
                    name : "test",
                    method :'GetUser',
                },
                dataType : 'json',
                success : function (data) {
                    console.log(data);
                    $.each(data, function(i,item) {
                        console.log(item);
                    });
                }
            });
        });
        $('#getPost').click(function () {
            $.ajax({
                url:"<?php echo admin_url('admin-ajax.php')?>",
                method: 'POST',
                data:{
                    action : "handler_laravel",
                    name : "test",
                    method :'GetPost',
                },
                dataType : 'json',
                success : function (data) {
                    console.log(data);
                    $.each(data, function(i,item) {
                        console.log(item);
                    });
                }
            });
        });
        $('#singIn').click(function () {
            $.ajax({
                        url:"<?php echo admin_url('admin-ajax.php')?>",
                        method: 'POST',
                        data:{
                            action : "handler_laravel",
                            name : "test",
                            method :'SignIn',
                            user_login : $("input[name='user_login']").val(),
                            user_password : $("input[name='user_password']").val()
                        },
                        dataType : 'json',
                        beforeSend : function () {
                            swal({
                                title :  'Login'
                            });
                            swal.showLoading();
                        },
                        success : function (data) {
                            if (data.errors) {
                                swal({
                                    title : 'Error',
                                    type:'warning',
                                    html : data.mess
                                });
                            } else{
                                swal({
                                    title : 'Success',
                                    type:'success',
                                    html : data.mess
                                }).then( function () {
                                        location.reload()
                                    }
                                );
                            }
                        }
                    });
        });
        $('#submitRegisterUser').click(function () {
            $.ajax({
                url:"<?php echo admin_url('admin-ajax.php')?>",
                method: 'POST',
                data: $('#formRegister').serialize(),
                dataType : "json",
                beforeSend: function () {
                    swal({
                        title :  'Register'
                    });
                    swal.showLoading();
                },
                success : function (data) {
                    if (data.errors) {
                        swal({
                            title:"Warning",
                            html : data.mess,
                            type:"warning"
                        });
                    } else {
                        swal({
                            title:"Success",
                            html : 'Register success',
                            type:"success"
                        }).then(function () {
                            window.location.reload();
                        });

                    }
                }

            });
            return false;
        });
    </script>
</html>
