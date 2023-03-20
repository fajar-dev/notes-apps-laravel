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
                <form action="/forgot_action" method="POST" enctype="multipart/form-data">
                  @csrf
                  <h3 class="fw-bold mb-0 fs-2 mb-2">Forgot Password</h3>
                  <p class="mb-4">Enter your email address to reset the password</p>
                  <div class="form-floating mb-3">
                    <input type="email" class="form-control rounded-3" id="floatingInput" name="email" placeholder="name@example.com" required>
                    <label for="floatingInput">Email address</label>
                  </div>
                  <button class="w-100 mb-2 btn btn-lg rounded-3 btn-dark" type="submit" >Reset Password</button>
                  <div class="text-center">
                    <small class="text-muted text-center"><a href="/login">Back to Sign In</a></small>
                  </div>
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