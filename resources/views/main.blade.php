@extends('include/template')
@section('content')

    <main>
      <div class="container">
        <div class="row">
          <div class="col-12">
            <div class="row justify-content-center">

              @foreach ($data as $row)

              {{-- <div class="col-12 text-center">
                @if (is_null($data))
                  <p>No notes found</p>
                @endif
              </div> --}}
                  
              <section class="col-lg-4 col-md-6 mt-3">
                <div class="card">
                  <div class="card-header">
                    {{ $row->title }}
                  </div>
                  <div class="card-body">
                    <small class="text-muted pb-5">{{  date('d F Y', strtotime($row->created_at))}}</small>
                    <p class="py-3">                    
                      {{ $row->content }}
                    </p>
                    <div class="btn-group w-100" role="group" aria-label="Basic example">
                      <button type="button" data-bs-toggle="modal" data-bs-target="#edit{{ $row->id }}" class="btn btn-light"><i class="bi bi-pencil"></i> Change</button>
                      <button type="button" id="/notes_delete/{{ $row->id }}" class="btn btn-secondary btn-del"><i class="bi bi-trash"></i> Delete</button>
                    </div>
                  </div>
                </div>
              </section>

              <div class="modal fade" id="edit{{ $row->id }}" tabindex="-1" aria-labelledby="edit{{ $row->id }}" aria-hidden="true">
                <div class="modal-dialog  modal-dialog-centered">
                  <div class="modal-content">
                    <div class="modal-body p-4">
                      <form action="/notes_update" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="{{ $row->id }}">
                        <div class="form-floating mb-3">
                          <input type="text" class="form-control" id="floatingInput" name="judul" value="{{ $row->title }}" placeholder="name@example.com" required>
                          <label for="floatingInput">Title</label>
                        </div>
                        <div class="form-floating mb-3">
                          <textarea class="form-control" placeholder="Leave a comment here" name="isi" id="floatingTextarea2" style="height: 200px" required>{{ $row->content }}</textarea>
                          <label for="floatingTextarea2">Content</label>
                        </div>
                        <div class="text-center mt-3">
                          <button type="button" class="btn btn-light w-25" data-bs-dismiss="modal">Close</button>
                          <button type="submit" class="btn btn-dark w-25">Save</button>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>          

              @endforeach

              <div class="col-12 mt-5">
                {{ $data->links() }}
              </div>

            </div>
          </div>
        </div>
      </div>
    </main>

    <button class="btn-add btn btn-dark  rounded-pill" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="bi bi-plus"></i></button>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog  modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-body p-4">
            <form action="/notes_add" method="POST" enctype="multipart/form-data">
              @csrf
              <div class="form-floating mb-3">
                <input type="text" class="form-control" id="floatingInput" name="judul" placeholder="name@example.com" required>
                <label for="floatingInput">Title</label>
              </div>
              <div class="form-floating mb-3">
                <textarea class="form-control" placeholder="Leave a comment here" name="isi" id="floatingTextarea2" style="height: 200px" required></textarea>
                <label for="floatingTextarea2">Content</label>
              </div>
              <div class="text-center mt-3">
                <button type="button" class="btn btn-light w-25" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-dark w-25">Save</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>

@endsection