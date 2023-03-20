@extends('include/template')
@section('content')

<main>
  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="row justify-content-center">

          <section class="col-lg-4 col-md-6  align-content-center mt-5">
            <a href="/" class="mb-3 btn rounded-3 btn-light bg-transparent border-0 fw-semibold fs-5"><i class="bi bi-arrow-left fw-bold"></i> Back</a>

                <form method="POST" enctype="multipart/form-data" action="/profile_update">
                  @csrf
                  <div class="text-center d-flex justify-content-center">
                    <img src="{{Storage::url(Auth::user()->photo)}}" width="150" id="preview" class="border border-3 border-dark rounded-pill mb-4 text-center" height="150" alt="avatar">
                  </div>
                  <h2 class="fs-5 fw-bold mb-3">Account Profile</h2>
                  <div class=" mb-3">
                    <label for="formFile" class="form-label">Change Image</label>
                    <input class="form-control form-control-lg" type="file" id="formFile" accept="image/*" onchange="showPreview(event);" name="image">
                  </div>
                  <div class="form-floating mb-3">
                    <input type="text" class="form-control rounded-3" value="{{Auth::user()->name}}" id="floatingInput" name="name" required>
                    <label for="floatingInput">Name</label>
                  </div>
                  <div class="form-floating mb-3">
                    <input type="email" class="form-control rounded-3" value="{{Auth::user()->email}}" name="email" id="floatingEmail" required>
                    <label for="floatingEmail">Email</label>
                  </div>
                  <button class="mb-2 btn rounded-3 btn-dark" type="submit" >Save</button>
                </form>
                  <hr class="my-3">
                <form action="/password_change" method="POST" enctype="multipart/form-data">
                  @csrf
                  <h2 class="fs-5 fw-bold mb-3">change Password</h2>
                  <div class="form-floating mb-3">
                    <input type="password" class="form-control rounded-3" name="password_old" id="floatingPassword" placeholder="Password" required>
                    <label for="floatingPassword">Password</label>
                  </div>
                  <div class="form-floating mb-3">
                    <input type="password" class="form-control rounded-3" name="password_new" id="floatingPassword" placeholder="Password" required>
                    <label for="floatingPassword">New Password</label>
                  </div>
                  <div class="form-floating mb-3">
                    <input type="password" class="form-control rounded-3"  id="floatingPassword" placeholder="Password">
                    <label for="floatingPassword">Repeat Password</label>
                  </div>
                  <button class="mb-2 btn rounded-3 btn-dark" type="submit" >Save</button>
                </form>
                <hr class="my-3">
                <div class="card my-3">
                  <div class="card-body">
                    <h5>Delete Account</h5>
                    <div class="mb-3 col-12 mb-0">
                      <div class="alert alert-warning">
                        <h6 class="alert-heading fw-bold mb-1">Are you sure you want to delete your account?</h6>
                        <p class="mb-0">Once you delete your account, there is no going back. Please be certain.</p>
                      </div>
                    </div>
                    <form id="formAccountDeactivation" method="POST" action="/profile_delete" enctype="multipart/form-data">
                      @csrf
                      <div class="form-check mb-3">
                        <input class="form-check-input" type="checkbox" name="accountActivation" id="accountActivation" required>
                        <label class="form-check-label" for="accountActivation">I confirm my account deactivation</label>
                      </div>
                      <button type="submit" class="btn btn-danger deactivate-account">Deactivate Account</button>
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