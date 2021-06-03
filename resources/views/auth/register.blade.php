<x-guest-layout>
  <div class="signin-page account">
    <div class="container">
      <div class="row">
        <div class="col-md-6 col-md-offset-3">
          <div class="block text-center">
            <a class="logo" href="{{ url('/') }}">
              <img src="{{ asset('frontend/images/logo.png') }}" alt="">
            </a>
            <h2 class="text-center">Create an Account</h2>
            <x-jet-validation-errors class="mb-4" />
            <form class="text-left clearfix" method="POST" action="{{ route('register') }}" name="frm-register">
                @csrf
                <div class="form-group">
                  <input class="form-control" type="text" name="name" placeholder="Fullname (First, Last)":value="name" required autofocus autocomplete="name" />
                </div>
                <div class="form-group">
                  <input class="form-control" type="email" name="email" placeholder="Email" :value="email" required />
                </div>
                <div class="form-group">
                  <input class="form-control" type="password" name="password" placeholder="Password" required autocomplete="new-password" />
                </div>
                <div class="form-group">
                  <input class="form-control" type="password" name="password_confirmation" placeholder="Confirm Password" required autocomplete="new-password" />
                </div>
                <div class="text-center">
                  <button type="submit" class="btn btn-main text-center" >{{ __('Sign in') }}</button>
                </div>
            </form>
            <p class="mt-20">Already have an account ?<a href="{{ url('login') }}"> {{ __('Login here') }}</a></p>
          </div>
        </div>
      </div>
    </div>
  </div>
</x-guest-layout>
