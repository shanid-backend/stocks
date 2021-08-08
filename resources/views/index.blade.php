<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.87.0">
    <title>Signin Template · Bootstrap v5.1</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/sign-in/">

    

    <!-- Bootstrap core CSS -->
<link href="{{ asset('assets/bootstrap-5.1.0-dist/css/bootstrap.min.css')}}" rel="stylesheet">
<!-- Sign Page Css -->
<link href="{{ asset('assets/signin.css')}}" rel="stylesheet">

<link rel="stylesheet" href="{{asset('assets/ladda/ladda-themeless.min.css')}}">
<link rel="stylesheet" href="{{asset('assets/toastify/toastify.css')}}">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }

        body{
        background-color: #e0f2ff;
      }
      }
    </style>

    
    <!-- Custom styles for this template -->
    <link href="signin.css" rel="stylesheet">
  </head>

  <body class="text-center">
    
    <main class="form-signin">
      <form method="POST" id="loginForm" novalidate="novalidate">
        
        <h1 class="h3 mb-3 fw-normal">Please sign in</h1>

        <div class="form-group">
         
          <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
          
        </div>
        <div class="form-group">
         
          <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
        </div>

        <button class="w-100 btn btn-primary btn-block btn-lg shadow-lg mt-1 ladda-button" type="submit" id="submit">Sign in</button>
      </form>
    </main>

  </body>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>

<script src="{{asset('assets/ladda/spin.min.js')}}"></script>
<script src="{{asset('assets/ladda/ladda.min.js')}}"></script>
<script src="{{asset('assets/toastify/toastify.js')}}"></script>

<script type="text/javascript">
    var base_url = '{{url("/")}}'
</script>
<script type="text/javascript">

  $('#loginForm').validate({
      submitHandler: function(form,event) { 
          event.preventDefault();
          var formData = new FormData(form);
          var l = Ladda.create(document.querySelector('#submit'));
          l.start();
          $.ajax({
              url: base_url+'/api/login',
              headers: {'X-CSRF-TOKEN': '{{csrf_token()}}',"Authorization":localStorage.getItem('token')},
              dataType: 'json',
              data:formData,
              contentType: false,
              cache: false,
              processData: false,
              type: 'POST',
              success: function (resp) {
                  
                  if(resp.errorcode =='0')
                  {
                      Toastify({text: resp.message,backgroundColor: "green"}).showToast();
                      l.stop();
                      location.href = base_url+'/api/stocks';
                  }
                  else if (resp.errorcode == '1')
                  {
                      var html = '';
                      $.each(resp.message, function(i,val){
                          html+= val+'</br>';
                      });
                      Toastify({text: html,backgroundColor: "red"}).showToast();
                      l.stop();
                  }
                  else if (resp.errorcode == '2')
                  {
                      Toastify({text: resp.message,backgroundColor: "red"}).showToast();
                      l.stop();
                  }
              }
          });
          return false; // required to block normal submit since you used ajax
       }
  });

</script>
 
</body>
</html>