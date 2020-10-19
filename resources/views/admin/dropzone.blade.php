<!DOCTYPE html>
<html lang="en">
<head>
    <title>Laravel Multiple Image Upload Using DropzoneJS</title>
    <meta name="_token" content="{{csrf_token()}}"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.0/min/dropzone.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.0/dropzone.js"></script>
</head>
<body>
  <div class="container">
    {{-- <form method="post" action="{{url('admin/upload/store')}}" enctype="multipart/form-data"
          class="dropzone multiple" id="dropzone">
      @csrf
    </form> --}}
    <div class="row">
      <div class="col-md-12">
        <form method="POST" action="{{ route('admin.dropzone.store') }}" accept-charset="UTF-8" enctype="multipart/form-data" class="dropzone dz-clickable" id="dropzone">
          {{ csrf_field() }}
          <div class="dz-default dz-message">
            <span>Drop files here to upload</span>
          </div>
        </form>
      </div>
    </div>

    <script type="text/javascript">
      Dropzone.options.dropzone =
        {
          maxFilesize: 12,
          renameFile: function (file) {
              var dt = new Date();
              var time = dt.getTime();
              var newname = time + file.name;
              return newname;
          },
          acceptedFiles: ".jpeg,.jpg,.png,.gif",
          addRemoveLinks: true,
          timeout: 50000,
          removedfile: function (file) {
            var name = file.upload.filename;
            // var name = file.upload.filename;
            alert (name);
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                },
                type: 'POST',
                url: '{{ route("admin.dropzone.delete") }}',
                data: {filename: name},
                success: function (data) {
                    console.log("File has been successfully removed!!");
                },
                error: function (e) {
                    console.log(e);
                }
            });
            var fileRef;
            return (fileRef = file.previewElement) != null ?
            fileRef.parentNode.removeChild(file.previewElement) : void 0;
          },
          success: function (file, response) {
            console.log(response);
          },
          error: function (file, response) {
            return false;
          }
        };
    </script>
  </div>
</body>
</html>