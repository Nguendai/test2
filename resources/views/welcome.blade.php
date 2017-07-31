<!doctype html >
<html lang="{{ config('app.locale') }}" ng-app="test-app3">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
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
    <body ng-controller="MembersControll2">
        
            <div class="content">
                    <form action="">
                        <input type="text" id='name' ng-maxlength="100"  ng-model-options="{allowInvalid: true}" ng-model="membera.name">
                        <span id="helpBlock2" class="help-block" ng-show="member.name.$error.maxlength  ">Name must be less than 100 char</span>
                        <button type="button" class="btn btn-primary"
                        ng-click="save(state)">Save</button>
                    </form>

                <div class="links">
                    <a href="https://laravel.com/docs">Documentation</a>
                    <a href="https://laracasts.com">Laracasts</a>
                    <a href="https://laravel-news.com">News</a>
                    <a href="https://forge.laravel.com">Forge</a>
                    <a href="https://github.com/laravel/laravel">GitHub</a>
                </div>
            </div>
        </div>
    </body>
    <script type="text/javascript" src="<?php echo 'asset/js/jquery.min.js';?>"></script>
    <script type="text/javascript" src="<?php echo 'asset/js/bootstrap.min.js';?>"></script>
    <script type="text/javascript" src="<?php echo 'app/lib/angular.min.js';?>"></script> 
    <script type="text/javascript" src="<?php echo 'asset/sweetalert/dist/sweetalert.min.js';?>"></script> 
    <script type="text/javascript" src="<?php echo 'app/app.js';?>"></script>
    <script type="text/javascript" src="<?php echo 'app/tests.js';?>"></script>
    <script type="text/javascript" src="<?php echo 'app/validator/fileValidate.js';?>"></script>
    
</html>
