<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css">
    <script
      src="https://code.jquery.com/jquery-3.6.4.slim.js"
      integrity="sha256-dWvV84T6BhzO4vG6gWhsWVKVoa4lVmLnpBOZh/CAHU4="
      crossorigin="anonymous">
    </script>
  </head>
  <body>

  @yield('content')

  <script type="text/javascript">
    $(document).ready(function() {
        $('body').on("click", ".btn-del", function() {
            var link = $(this).attr('id');
            $('#delete').modal('show');
            $('.btn-delete-oke').click(function() {
                location.replace(link);
            });
        });
    });
    </script>

  <div class="modal modal-delete" id="delete"  data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
      <div class="modal-content shadow rounded ">
        <div class="modal-body p-4 text-center border-top border-start border-end border-2 border-dark">
          <h5 class="mb-2">Alert !!</h5>
          <p class="mb-0">Are you sure you want to delete this notes ?</p>
        </div>
        <div class="modal-footer flex-nowrap p-0">
          <button type="button" class="btn-delete-oke btn btn-lg btn-secondary bg-transparent text-dark fs-6 text-decoration-none col-6 m-0 rounded-0 border-end" ><strong>Delete</strong></button>
          <button type="button" class="btn btn-lg btn-secondary bg-transparent text-dark fs-6 text-decoration-none col-6 m-0 rounded-0" data-bs-dismiss="modal">Cancel</button>
        </div>
      </div>
    </div>
  </div>

  <script src="js/bootstrap.bundle.min.js" ></script>
  </body>
</html>