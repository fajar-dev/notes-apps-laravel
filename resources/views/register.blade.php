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
                <form action="/register_action" method="POST" enctype="multipart/form-data">
                  @csrf
                  <h3 class="fw-bold mb-0 fs-2 mb-2">Sign Up</h3>
                  <p class="mb-4">Sign up for member access</p>
                  <div class="form-floating mb-3">
                    <input type="text" class="form-control rounded-3" id="floatingname" name="name" placeholder="name">
                    <label for="floatingname">Name</label>
                  </div>
                  <div class="form-floating mb-3">
                    <input type="email" class="form-control rounded-3" id="floatingInput" name="email" placeholder="name@example.com">
                    <label for="floatingInput">Email address</label>
                  </div>
                  <div class="form-floating mb-3">
                    <input type="password" class="form-control rounded-3" id="floatingPassword" name="password" placeholder="Password">
                    <label for="floatingPassword">Password</label>
                  </div>
                  <button class="w-100 mb-2 btn btn-lg rounded-3 btn-dark" type="submit" >Sign Up</button>
                  <div class="text-center">
                    <small class="text-muted text-center">have an account? <a href="/login">Sign In</a></small>
                  </div>
                  <hr class="my-4">
                  <h2 class="fs-5 fw-bold mb-3">Or use a third-party</h2>
                  <button class="w-100 py-2 mb-2 btn btn-outline-dark rounded-3" type="submit">
                    <i class="bi bi-google"></i>
                    Sign up with Google
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