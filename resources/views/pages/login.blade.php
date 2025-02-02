@extends('layout')
@section('content')
<section id="form"><!--form-->
  <div class="container">
    <div class="row">
      <div class="col-sm-4 col-sm-offset-1">
        <div class="login-form"><!--login form-->
          <p class="alert-success">
          <?php
          $message = Session::get('message');
          if ($message) {
            echo($message);
            Session::put('message',null);

          }
           ?>
           </p>
          <h2>Login to your account</h2>
          <form action="{{url('/customer_login')}}" method="post">
            {{ csrf_field()}}
            <input type="email" placeholder="Email" name="customer_email" required="" />
            <input type="password" placeholder="Password" name="customer_password" required="" />
            <button type="submit" class="btn btn-default">Login</button>
          </form>
        </div><!--/login form-->
      </div>
      <div class="col-sm-1">
        <h2 class="or">OR</h2>
      </div>
      <div class="col-sm-4">
        <div class="signup-form"><!--sign up form-->
          <h2>New User Signup!</h2>
          <form action="{{url('/customer_registration')}}" method="post">
            {{ csrf_field()}}
            <input type="text" placeholder="Name" name="customer_name" required=""/>
            <input type="email" placeholder="Email Address" name="customer_email" required=""/>
            <input type="password" placeholder="Password" name="customer_password" required=""/>
            <input type="text" placeholder="Mobile Number" name="customer_mobile" required=""/>
            <button type="submit" class="btn btn-default">Signup</button>
          </form>
        </div><!--/sign up form-->
      </div>
    </div>
  </div>
</section><!--/form-->
@endsection
