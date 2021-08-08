<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.87.0">
    <title>Stocks</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/album/">

    <link href="//db.onlinewebfonts.com/c/1c45e28f8e86cc89876f003b953cc3e9?family=SF+Pro+Text" rel="stylesheet" type="text/css"/>

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('assets/bootstrap-5.1.0-dist/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{ asset('assets/bootstrap-5.1.0-dist/css/bootstrap.min.css')}}" rel="stylesheet">

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
      }
      body{
        background-color: #e0f2ff;
      }
      .navbar{
        background-color:#e0f2ff;
      }
      .list-group{
        padding-left: 76px;
      }
      .bg-gradient{
        background-color: #ecf8e8;
      }
      h4{
        color: red;
      }
    </style>

    
  </head>
  <body>
    
<header>
  <div class="collapse bg-dark" id="navbarHeader">
    <div class="container">
      <div class="row">
        <div class="col-sm-8 col-md-7 py-4">
          <h4 class="text-white">About</h4>
          <p class="text-muted">Add some information about the album below, the author, or any other background context. Make it a few sentences long so folks can pick up some informative tidbits. Then, link them off to some social networking sites or contact information.</p>
        </div>
        <div class="col-sm-4 offset-md-1 py-4">
          <h4 class="text-white">Contact</h4>
          <ul class="list-unstyled">
            <li><a href="#" class="text-white">Follow on Twitter</a></li>
            <li><a href="#" class="text-white">Like on Facebook</a></li>
            <li><a href="#" class="text-white">Email me</a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <div class="navbar shadow-sm">
    <div class="container">
      <a href="#" class="navbar-brand d-flex align-items-center">
        <strong style="color: #000;">Stocks</strong>
      </a>
    </div>
  </div>
</header>

<main>

  <section class="py-5 text-center container">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
          <div class="container">
              <br/>
              <h1 class="display-5 fw-bold">The easiest way to buy and sell stocks</h1>
              <p>Stock analysis and screening tool for investors in india</p>
            <div class="row justify-content-center">
                                  <div class="col-12 col-md-10 col-lg-8">
                                      <form class="card card-sm" autocomplete="off">
                                          <div class="card-body row no-gutters align-items-center">
                                              <div class="col-auto">
                                                  <i class="fas fa-search h4 text-body"></i>
                                              </div>
                                              <!--end of col-->
                                              <div class="col">
                                                  <input id="search" class="form-control form-control-lg form-control-borderless" type="search" placeholder="Search topics or keywords">
                                              </div>
                                              <ul class="list-group" id="result"></ul>
                                              <br>
                                              <div id="item"></div>
                                              <!--end of col-->
                                              {{-- <div class="col-auto">
                                                  <button class="btn btn-lg btn-success" type="submit">Search</button>
                                              </div> --}}
                                              <!--end of col-->
                                          </div>
                                      </form>
                                  </div>
                                  <!--end of col-->
                              </div>
          </div>
  </section>
</main>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script type="text/javascript">
    var base_url = '{{url("/")}}'
</script>

<script>
    $(document).ready(function(){
      
      $(document).on('keyup','#search',function(){
        var search = $(this).val();
        $.ajax({
          url:base_url+'/api/search',
          data:{search:search},
          success:function(data){
            $('#result').html('');
            $('#result').append(data);
          }
        });
      });

      $(document).on('click','.list-group-item',function(){
        var item = $(this).data('id'); console.log(item);
        $.ajax({
          url:base_url+'/api/items',
          data:{item:item},
          success:function(data){
            $('#result').html('');
            $('#item').html('');
            $('#item').append(data);
          }
        });
      });

    });
  </script>
  </body>
</html>
