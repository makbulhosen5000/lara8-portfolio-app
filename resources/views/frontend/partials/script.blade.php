<!-- core  -->
<script src="{{ asset('public/frontend') }}/assets/vendors/jquery/jquery-3.4.1.js"></script>
<script src="{{ asset('public/frontend') }}/assets/vendors/bootstrap/bootstrap.bundle.js"></script>

<!-- bootstrap 3 affix -->
<script src="{{ asset('public/frontend') }}/assets/vendors/bootstrap/bootstrap.affix.js"></script>

<!-- Isotope  -->
<script src="{{ asset('public/frontend') }}/assets/vendors/isotope/isotope.pkgd.js"></script>

<!-- Google mpas -->
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCtme10pzgKSPeJVJrG1O3tjR6lk98o4w8&callback=initMap"></script>

<!-- JohnDoe js -->
<script src="{{ asset('public/frontend') }}/assets/js/johndoe.js"></script>
<!-- Toastr js -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

<script>
    @if(Session::has('success'))
    toastr.success("{{Session::get('success')}}");
    @endif
</script>

<!-- ajax request for chat application -->
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>

{{-- js for chat application start --}}
<script>
  function openForm() {
    document.getElementById("myForm").style.display = "block";
  }
  
  function closeForm() {
    document.getElementById("myForm").style.display = "none";
  }
</script>
{{-- js for chat application end --}}

<script>

