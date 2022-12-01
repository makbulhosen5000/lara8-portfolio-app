<!-- jQuery -->
<script src="{{asset('public')}}/backend/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{asset('public')}}/backend/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{asset('public')}}/backend/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="{{asset('public')}}/backend/plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="{{asset('public')}}/backend/plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="{{asset('public')}}/backend/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="{{asset('public')}}/backend/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="{{asset('public')}}/backend/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="{{asset('public')}}/backend/plugins/moment/moment.min.js"></script>
<script src="{{asset('public')}}/backend/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{asset('public')}}/backend/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="{{asset('public')}}/backend/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="{{asset('public')}}/backend/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="{{asset('public')}}/backend/dist/js/adminlte.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{asset('public')}}/backend/dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('public')}}/backend/dist/js/demo.js"></script>
<!-- Select2 -->
<script src="{{asset('public')}}/backend/plugins/select2/js/select2.full.min.js"></script>
<script>
   $(function(){
       //Initialize Select2 Elements
    $('.select2').select2()
      //Initialize Select2 Elements
      $('.select2bs4').select2({
      theme: 'bootstrap4'
    })
   })
</script>
<!-- DataTables -->
<script src="{{asset('public')}}/backend/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="{{asset('public')}}/backend/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="{{asset('public')}}/backend/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="{{asset('public')}}/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script>
    $(function () {
      $("#example1").DataTable({
        "responsive": true,
        "autoWidth": false,
      });
      $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
      });
    });
  </script>
  <!-- for toaster massage -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script>
    @if(Session::has('success'))
    toastr.success("{{Session::get('success')}}");
    @endif
</script>


  <script>
      $(function(){
          $(document).on('click','#delete',function(e){
           e.preventDefault();
           var link =$(this).attr('href');
           const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
                confirmButton: 'btn btn-success',
                cancelButton: 'btn btn-danger'
            },
            buttonsStyling: false
            })

            swalWithBootstrapButtons.fire({
            title: 'Are you sure?',
            text: "You want to delete this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, delete it!',
            cancelButtonText: 'No, cancel!',
            reverseButtons: true
            }).then((result) => {
            if (result.value) {
                window.location.href=link;
                swalWithBootstrapButtons.fire(
                'Deleted!',
                'Your file has been deleted.',
                'success'
                )
            } else if (
                /* Read more about handling dismissals below */
                result.dismiss === Swal.DismissReason.cancel
            ) {
                swalWithBootstrapButtons.fire(
                'Cancelled',
                'Your file is safe :)',
                'error'
                )
            }
            })
                    });
                });
  </script>
  <script type="text/javascript">
    $(document).ready(function(){
        $('#image').change(function(e){
        var reader =new FileReader();
        reader.onload=function(e){
            $('#showImage').attr('src',e.target.result);
        }
        reader.readAsDataURL(e.target.files['0']);
        });
    });
  </script>
  <script>
      //Image Show Before Upload Start
$(document).ready(function(){
    $('input[type="file"]').change(function(e){
        var fileName = e.target.files[0].name;
        if (fileName){
            $('#image').html(fileName);
        }
    });
});

function showImage(data, imgId){
    if(data.files && data.files[0]){
        var obj = new FileReader();

        obj.onload = function(d){
            var image = document.getElementById(imgId);
            image.src = d.target.result;
        }
        obj.readAsDataURL(data.files[0]);
    }
}


//Image Show Before Upload End
  </script>
  {{-- date picker for date --}}
  <script>
    $('#datepicker').datepicker({
        uiLibrary: 'bootstrap4',
        format:'yyyy-mm-dd'
    });
</script>

{{-- CountDown Timer --}}
<script src="{{asset('public/backend/build/js/jquery.countdown.min.js')}}"></script>
<script>
   ;(function($) {
    
    var MERCADO_JS = {
      init: function(){
         this.mercado_countdown();
         
      }, 
    mercado_countdown: function() {
         if($(".mercado-countdown").length > 0){
                $(".mercado-countdown").each( function(index, el){
                  var _this = $(this),
                  _expire = _this.data('expire');
               _this.countdown(_expire, function(event) {
                        $(this).html( event.strftime('<span><b>%D</b> Days</span> <span><b>%-H</b> Hrs</span> <span><b>%M</b> Mins</span> <span><b>%S</b> Secs</span>'));
                    });
                });
         }
      },
   
   }
   
      window.onload = function () {
         MERCADO_JS.init();
      }
   
      })(window.Zepto || window.jQuery, window, document);
</script>
{{-- CKEditor script --}}
<script>
      CKEDITOR.replace('description', {
      height: 400,
      baseFloatZIndex: 10005,
      removeButtons: 'PasteFromWord'
    });
</script>


