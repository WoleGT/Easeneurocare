<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'My Blog')</title>
    
	</head>
<body>
    <header>
        <section class="hero-wrap hero-wrap-2" style="background-image: url('images/bg_5.jpg');" data-stellar-background-ratio="0.5">
  <div class="overlay"></div>
  <div class="container">
    <div class="row no-gutters slider-text align-items-end">
      <div class="col-md-9 ftco-animate pb-5">
       <p class="breadcrumbs mb-2"><span class="mr-2"><a href="{{ url('/blogmain')}}"> ← Back <i class="ion-ios-arrow-forward"></i></a></span> <span> <i class="ion-ios-arrow-forward"></i></span></p>
       <h1 class="mb-0 bread" href="{{ url('blogmain')}}"></a></h1>
     </div>
   </div>
 </div>
</section>
  
    </header>

    <main class="container">
        @yield('content')
    </main>
   <br>
   <br>
   <br>
    <footer>

        <div class="row mt-5">
				<div class="col-md-12 text-center">
                        <p class="copyright">
						Copyright &copy;<script>document.write(new Date().getFullYear());</script> Ease Neurocare. All rights reserved</p>
					</div>
				</div> 
</footer>
        
        

    
</body>
</html>
