<x-guest-layout>
  <div class="signin-page account">
    <div class="container">
      <div class="row">
        <div class="col-md-6 col-md-offset-3">
          <div class="block text-center">
            <a class="logo" href="{{ url('/') }}">
              <img src="{{ asset('frontend/images/logo.png') }}" alt="">
            </a>
            <h2 class="text-center">Welcome Back</h2>
            <x-jet-validation-errors class="mb-4" />
            <form class="text-left clearfix" method="post" action="{{ route('login') }}" name="frm-login">
              @csrf
              <div class="form-group">
                <input class="form-control" type="email" name="email" placeholder="Email":value="old('email')" required autofocus />
              </div>
              <div class="form-group">
                <input class="form-control" type="password" name="password" placeholder="Password" required autocomplete="current-password" />
              </div>
              <div class="text-right">
                <label for="remember_me" class="flex items-center">
                    <input type="checkbox" id="remember_me" name="remember" />
                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
              </div>
              <div class="text-center">
                <button type="submit" class="btn btn-main text-center" >{{ __('Log in') }}</button>
              </div>
            </form>
            <p class="mt-20">Create an account. <a href="{{ url('register') }}"> Register Here</a></p>
            <p><a href="{{ url('reset-password') }}"> Forgot your password?</a></p>
          </div>
        </div>
      </div>
    </div>
  </div>
</x-guest-layout>
