@extends('include/template')
@section('content')

<main>
  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="row justify-content-center">

          <section class="col-md-4">
            <div class="card">
              <div class="card-body py-4 px-4">
                <form action="/login_action" method="POST" enctype="multipart/form-data">
                  @csrf
                  <h3 class="fw-bold mb-0 fs-2 mb-2">Sign In</h3>
                  <p class="mb-4">Sign in to member access</p>
                  <div class="form-floating mb-3">
                    <input type="email" class="form-control rounded-3" id="floatingInput" name="email" placeholder="name@example.com" required>
                    <label for="floatingInput">Email address</label>
                  </div>
                  <div class="form-floating mb-3">
                    <input type="password" class="form-control rounded-3" id="floatingPassword" name="password" placeholder="Password" required>
                    <label for="floatingPassword">Password</label>
                  </div>
                  <div  class="d-flex justify-content-between my-2">
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" name="accountActivation" id="accountActivation">
                      <label class="form-check-label" for="accountActivation"><small>Remember Me</small> </label>
                    </div>
                    <a href="/forgot"><small>Forgot Password ?</small></a>
                  </div>
                  <button class="w-100 mb-2 btn btn-lg rounded-3 btn-dark" type="submit" >Sign In</button>
                  <div class="text-center">
                    <small class="text-muted text-center">don't have an account? <a href="/register">Sign Up</a></small>
                  </div>
                  <hr class="my-4">
                  <h2 class="fs-5 fw-bold mb-3">Or use a third-party</h2>
                  <button class="w-100 py-2 mb-2 btn btn-outline-dark rounded-3" type="submit">
                    <i class="bi bi-google"></i>
                    Sign in with Google
                  </button>

                </form>
              </div>
            </div>
          </section>

        </div>
      </div>
    </div>
  </div>
</main>

@endsection