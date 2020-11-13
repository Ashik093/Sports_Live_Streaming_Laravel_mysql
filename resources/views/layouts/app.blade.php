<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- CSS only -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/fontawesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/responsive.css') }}">
    <title>NFL STREAMS</title>
</head>
<body>
        

    <header>
        <div class="header">
            <div class="header-left">
                <span class="header-big-text">NFLSTREAMS</span><span class="header-small-text"> -    by the founders of /r/NFLStreams</span>
            </div>
            <div class="header-right">
                <div class="header-logo">
                    <img src="{{ URL::to('assets/img/1.png') }}" alt="">
                </div>

            </div>
        </div>

    </header>

    <section>
        <div class="nav-logos">
            <div class="nav-logos-img">
                <img src="{{ URL::to('assets/img/2.png') }}" alt="">
            </div>
            <div class="nav-logos-img">
                <img src="{{ URL::to('assets/img/3.png') }}" alt="">
            </div>
            <div class="nav-logos-img">
                <img src="{{ URL::to('assets/img/4.png') }}" alt="">
            </div>
            <div class="nav-logos-img">
                <img src="{{ URL::to('assets/img/5.png') }}" alt="">
            </div>
            <div class="nav-logos-img">
                <img src="{{ URL::to('assets/img/6.png') }}" alt="">
            </div>
            <div class="nav-logos-img">
                <img src="{{ URL::to('assets/img/7.png') }}" alt="">
            </div>
            <div class="nav-logos-img">
                <img src="{{ URL::to('assets/img/8.png') }}" alt="">
            </div>
            <div class="nav-logos-img">
                <img src="{{ URL::to('assets/img/9.png') }}" alt="">
            </div>
            <div class="nav-logos-img">
                <img src="{{ URL::to('assets/img/10.png') }}" alt="">
            </div>
            <div class="nav-logos-img">
                <img src="{{ URL::to('assets/img/11.png') }}" alt="">
            </div>
            <div class="nav-logos-img">
                <img src="{{ URL::to('assets/img/12.png') }}" alt="">
            </div>
            <div class="nav-logos-img">
                <img src="{{ URL::to('assets/img/13.png') }}" alt="">
            </div>
            <div class="nav-logos-img">
                <img src="{{ URL::to('assets/img/14.png') }}" alt="">
            </div>
            <div class="nav-logos-img">
                <img src="{{ URL::to('assets/img/15.png') }}" alt="">
            </div>
            <div class="nav-logos-img">
                <img src="{{ URL::to('assets/img/16.png') }}" alt="">
            </div>
            <div class="nav-logos-img">
                <img src="{{ URL::to('assets/img/17.png') }}" alt="">
            </div>
            <div class="nav-logos-img">
                <img src="{{ URL::to('assets/img/18.png') }}" alt="">
            </div>
            <div class="nav-logos-img">
                <img src="{{ URL::to('assets/img/19.png') }}" alt="">
            </div>
            <div class="nav-logos-img">
                <img src="{{ URL::to('assets/img/20.png') }}" alt="">
            </div>
            <div class="nav-logos-img">
                <img src="{{ URL::to('assets/img/21.png') }}" alt="">
            </div>
            <div class="nav-logos-img">
                <img src="{{ URL::to('assets/img/22.png') }}" alt="">
            </div>
            <div class="nav-logos-img">
                <img src="{{ URL::to('assets/img/23.png') }}" alt="">
            </div>
            <div class="nav-logos-img">
                <img src="{{ URL::to('assets/img/24.png') }}" alt="">
            </div>
            <div class="nav-logos-img">
                <img src="{{ URL::to('assets/img/25.png') }}" alt="">
            </div>
            <div class="nav-logos-img">
                <img src="{{ URL::to('assets/img/26.png') }}" alt="">
            </div>
        </div>
    </section>
    <section class="auth">
        <div class="auth-content">
            <a href="{{ url('/') }}">Home</a>
            @if (Route::has('login'))
                
                    @auth
                        <a href="{{ route('profile') }}">Profile</a>
                        <a href="{{ url('/logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">Logout</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">@csrf</form>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
      
            @endif
        </div>
    </section>


    

    @yield('content')
    





      <!-- Footer -->
    <footer class="page-footer font-color pt-4">
      <div class="container-fluid text-center text-md-left">
            <div class="footer-content">
                <img src="{{ URL::to('assets/img/footer.png') }}" alt="">
                <p>Copyrights © 2020 nflstreams.to. All rights reserved.</p>
            </div>
      </div>

    </footer>


    <!-- JavaScript and dependencies -->
    <script type="text/javascript" src="{{ asset('assets/js/jquery.min.js') }}" ></script>
    <script type="text/javascript" src="{{ asset('assets/js/popper.min.js') }}" ></script>
    <script type="text/javascript" src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    
    <script type="text/javascript" src="{{ asset('assets/js/main.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/custom.js') }}"></script>

    <script>
  $(function() {
    $('form.require-validation').bind('submit', function(e) {
      var $form         = $(e.target).closest('form'),
          inputSelector = ['input[type=email]', 'input[type=password]',
                           'input[type=text]', 'input[type=file]',
                           'textarea'].join(', '),
          $inputs       = $form.find('.required').find(inputSelector),
          $errorMessage = $form.find('div.error'),
          valid         = true;

      $errorMessage.addClass('d-none');
      $('.is-invalid').removeClass('is-invalid');
      $inputs.each(function(i, el) {
        var $input = $(el);
        if ($input.val() === '') {
          $input.parent().addClass('is-invalid');
          $errorMessage.removeClass('d-none');
          e.preventDefault(); // cancel on first error
        }
      });
    });
  });

  $(function() {
    var $form = $("#payment-form");

    $form.on('submit', function(e) {
      if (!$form.data('cc-on-file')) {
        e.preventDefault();
        Stripe.setPublishableKey($form.data('stripe-publishable-key'));
        Stripe.createToken({
          number: $('.card-number').val(),
          cvc: $('.card-cvc').val(),
          exp_month: $('.card-expiry-month').val(),
          exp_year: $('.card-expiry-year').val()
        }, stripeResponseHandler);
      }
    });

    function stripeResponseHandler(status, response) {
      if (response.error) {
        $('.error')
          .removeClass('d-none')
          .find('.alert')
          .text(response.error.message);
      } else {
        // token contains id, last4, and card type
        var token = response['id'];
        // insert the token into the form so it gets submitted to the server
        $form.find('input[type=text]').empty();
        $form.append("<input type='hidden' name='stripeToken' value='" + token + "'/>");
        $form.get(0).submit();
      }
    }
  })
</script>
  
</body>
</html>
    
    
    
    
    