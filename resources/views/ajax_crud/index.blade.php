@extends('layouts.app')

@section('content')
@include('ajax_crud.create')
@include('ajax_crud.edit')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                <button class="btn btn-primary btn-sm float-left" id="add-new">Add New</button>
                <button class="btn btn-primary btn-sm float-right" id="read-data">Load Data</button>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table-hover table-striped table-condensed">
                      <thead>
                        <tr>
                          <th>No</th>
                          <th>Name</th>
                          <th>Username</th>
                          <th>Email</th>
                          <th>Created At</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody id="admin_list">

                      </tbody>
                    </table>
                  </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('js')
  <script>
    $(document).ready(function(){
      $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });

      loadData()

      // reading data from database
      $('#read-data').on('click',function(e){
        e.preventDefault();
        $.get("{{ url('ajax-read') }}",function(data){
          $('#admin_list').empty().html(data);
          // $.each(data,function(i,data){
          //   var tr = $("<tr/>");
          //       tr.append($("<td/>",{
          //         text : value.id
          //       })).append($("<td/>",{
          //         text : value.firstname
          //       })).append($("<td/>",{
          //         text : value.lastname
          //       })).append($("<td/>",{
          //         text : value.username
          //       })).append($("<td/>",{
          //         text : value.created_at
          //       })).append($("<td/>",{
          //         html :"<a href=''>View</a> | <a href=''>Edit</a> | <a href=''>Delete</a>"
          //       }))
          //   $('#admin_list').append(tr);
          // })
        });
      });

      $('#add-new').on('click',function(e){
        $('#myModalAdd').modal('show');
      });

      // inserting data to database
      $('#frm-insert').on('submit',function(e){
        e.preventDefault();
        var data = $(this).serialize();
        var url = $(this).attr('action');
        var post = $(this).attr('method');
        $.ajax({
          url:url,
          type:post,
          data:data,
          dataTy: 'json',
          success:function(data){
            $('#frm-update').trigger('reset')
            var tr = $("<tr/>",{
                id:data.id
              });
                tr.append($("<td/>",{
                  text : data.id
                })).append($("<td/>",{
                  text : data.firstname
                })).append($("<td/>",{
                  text : data.username
                })).append($("<td/>",{
                  text : data.email
                })).append($("<td/>",{
                  text : data.created_at
                })).append($("<td/>",{
                  html :'<a href="#" class="btn btn-info btn-sm btn-view" id="view" data-id="'+data.id+'">View</a>|<a href="#" class="btn btn-success btn-sm btn-edit" id="edit" data-id="'+data.id+'">Edit</a>|<a href="#" class="btn btn-danger btn-sm btn-del" id="del" data-id="'+data.id+'">Delete</a>'
                }))
            $('#admin_list').append(tr);
          }
        })
      });

      // delete data from database
      $('body').delegate('#del', 'click', function(event) {
        event.preventDefault();
        var id = $(this).data('id');
        $.post('{{ route("ajax.destroy") }}',{id:id},function(data){
          console.log(data);
          $('#admin_list #'+id).remove();
        })
      });

      // update student modal form
      $('body').delegate('#edit', 'click', function(event) {
        var id = $(this).data('id');
        $.get("{{ route('ajax.edit') }}",{id:id},function(data){
          $('#frm-update').find('#firstname').val(data.firstname)
          $('#frm-update').find('#lastname').val(data.lastname)
          $('#frm-update').find('#username').val(data.username)
          $('#frm-update').find('#email').val(data.email)
          $('#frm-update').find('#id').val(data.id)
          $('#myModalEdit').modal('show');
        });
      });

      // update data to database
      $('#frm-update').on('submit',function(e){
        e.preventDefault();
        var data = $(this).serialize();
        var url = $(this).attr('action');
        $.post(url,data,function(data){
          $('#frm-update').trigger('reset')
          var tr = $("<tr/>",{
                id:data.id
              });
                tr.append($("<td/>",{
                  text : data.id
                })).append($("<td/>",{
                  text : data.firstname
                })).append($("<td/>",{
                  text : data.username
                })).append($("<td/>",{
                  text : data.email
                })).append($("<td/>",{
                  text : data.created_at
                })).append($("<td/>",{
                  html :'<a href="#" class="btn btn-info btn-sm btn-view" id="view" data-id="'+data.id+'">View</a>|<a href="#" class="btn btn-success btn-sm btn-edit" id="edit" data-id="'+data.id+'">Edit</a>|<a href="#" class="btn btn-danger btn-sm btn-del" id="del" data-id="'+data.id+'">Delete</a>'
                }))
            $('#admin_list tr#'+data.id).replaceWith(tr);          
        })
         $('#myModalEdit').modal('hide');
      });


      function loadData() {
        $.get("{{ url('ajax-read') }}",function(data){
          $('#admin_list').empty().html(data);
        });
      }



    });    

  </script>
@endpush

