<!doctype html>
    <html lang="en">
      <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ Session::token() }}">
        <link rel="icon" href="/img/lkb.ico">
        <title>{{ $title }} | KAK System</title>
    
        <!-- Bootstrap core CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        
        <!-- Custom styles for this template -->
        <link href="/css/style.css" rel="stylesheet">
        <link href="/css/font-awesome-all.css" rel="stylesheet">
        <script src="/js/jquery.min.js"></script>
        <script src="/js/jquery-3.6.0.js"></script>
        <style>
            .body-bg {
                background-image: url("/img/newjamgadang.jpg");
                height: 100vh;
                background-position: center;
                background-repeat: no-repeat;
                background-size: cover;
                overflow: hidden;
            }
        </style>
      </head>
      <body class="login body-bg">
    
        <div class="container-fluid">
            <div class="row justify-content-center mt-5">
                <div class="col-md-4 p-5 border border-dark border-3 rounded-3 bg-gray-500 bg-opacity-50">
            
                @if (session()->has('loginError'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ session('loginError') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <div class="row">
                    <div class="col">

                    </div>
                </div>
            
                <main class="form-signin text-center">
                    <form action="/login" method="post">
                    @csrf
                        <img src="/img/lkb.png" alt="" style="width: 100px;">
                        <h1 class="h3 mb-3 fw-normal text-dark text-opacity-50">SIKAK <strong style="color: darkorange;">Bukittinggi</strong></h1>
                    
                        <div class="mb-3">
                            <input type="text" class="form-control" name="username" id="addusername" placeholder="Username" value="{{ old('username') }}" autofocus required>
                        </div>
                        <div class="">
                            <div class="input-group">
                                <input type="password" class="form-control" name="password" id="addpassword" placeholder="Password" required>
                                <span class="input-group-text bg-info w-10" id="eyebutton" eye="0"><i id="elogo" class="fa fa-eye"></i><i id="elogoc" style="display: none;" class="fa fa-eye"></i></span>
                            </div>
                        </div>
                  
                      <button class="w-100 btn btn-lg btn-primary mt-3" type="submit">Login</button>
                    </form>
                  </main>

                </div>
            </div>
        </div>
        
        <script src="/js/dashboard.js"></script>
        <script src="/js/bootstrap.bundle.min.js"></script>
        <script src="/js/bootstrap.bundle.js"></script>
        <script src="/js/font-awesome-all.js"></script>
        <script>
            $(document).ready(function () {

                
                $("#eyebutton").click(function (e) { 
                    e.preventDefault();
                    
                    if($(this).attr("eye") == 0){
                        $("#addpassword").attr("type", "text");
                        $("#elogo").css("display", "none");
                        $("#elogoc").css("display", "block");
                        $(this).attr("eye", 1);
                    }else if($(this).attr("eye") == 1){
                        $("#addpassword").attr("type", "password");
                        $("#elogo").css("display", "block");
                        $("#elogoc").css("display", "none");
                        $(this).attr("eye", 0);
                    }
                });


            });
        </script>
    </body>
</html>