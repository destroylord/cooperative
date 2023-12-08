<x-guest-layout>
    <form method="POST" id="formAuthentication" autocomplete="off" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
         
        <x-form.input id="username" label="Username"  type="text" name="username" :value="old('username')" required autofocus autocomplete="username" />

              <div class="mb-3 form-password-toggle">
                  <div class="d-flex justify-content-between">
                    <label class="form-label" for="password">Password</label>
                    <a href="auth-forgot-password-basic.html">
                      <small>Forgot Password?</small>
                    </a>
                  </div>
                  <div class="input-group input-group-merge">
                    <input
                      type="password"
                      id="password"
                      class="form-control"
                      name="password"
                      placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                      aria-describedby="password" />
                    <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                  </div>
                </div>

        <div class="mb-3">
            <div class="form-check">
            <input class="form-check-input" type="checkbox" name="remember" id="remember_me" />
            <label class="form-check-label" for="remember-me"> Remember Me </label>
            </div>
        </div>
    

        <div class="mb-3">
            <x-primary-button class=" d-grid w-100 d-grid w-100">
                {{ __('Log in') }}
            </x-primary-button>
        </div>

            
            <p class="text-center">
            <span>New on our platform?</span>
            <a href="{{ route('register') }}">
                <span>Create an account</span>
            </a>
            </p>
        </div>
    </form>
</x-guest-layout>
