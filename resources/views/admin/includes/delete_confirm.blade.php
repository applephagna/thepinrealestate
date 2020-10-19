{{-- <script src="{{ asset('assets/js/bootbox.js') }}"></script> --}}
<script>
  function deleteObject(id){
    Swal.fire({
      title: 'Are you sure?',
      text: "You won't be able to revert this!",
      type: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
      if (result.value) {
        document.getElementById('deleteObject-'+id).submit();
      }
    })
  }  
  // jQuery(function($id) {
    // $(".bootbox-confirm").on('click', function() {
    //     var id = $(this).data('id');
    //     bootbox.confirm({
    //         title: "<div class='widget-header'><h4 class='smaller'><i class='ace-icon fa fa-exclamation-triangle red'></i> Delete Confirmation</h4></div>",
    //         message: "<div class='ui-dialog-content ui-widget-content' style='width: auto; min-height: 30px; max-height: none; height: auto;'><div class='alert alert-info bigger-110'>These items will be permanently deleted and cannot be recovered.</div>" +
    //         "<p class='bigger-110 bolder center grey'><i class='ace-icon fa fa-hand-o-right blue bigger-120'></i>Are you sure?</p>",
    //         size: 'small',
    //             buttons: {
    //                 confirm: {
    //                     label : "<i class='ace-icon fa fa-trash'></i> Yes, Delete Now!",
    //                     className: "btn-danger btn-sm",
    //                 },
    //                 cancel: {
    //                     label: "<i class='ace-icon fa fa-remove'></i> Cancel",
    //                     className: "btn-primary btn-sm",
    //                 }
    //             },
    //             callback: function(result) {
    //                 if(result) {
    //                     // location.href = $this.attr('href');
    //                   document.getElementById('frm-delete_topic-'+id).submit();
    //                 }
    //             }
    //         }
    //     );
    //     return false;
    // });
  // });
</script>
