@if(session('success'))
  <script>
    setTimeout(function(){
      toastr.success("{{ session('success') }}", "Hola {{ Auth::user()->name }},");
    }, 100);
  </script>
@endif

@if(session('danger'))
  <script>
    setTimeout(function(){
      toastr.error("{{ session('danger') }}", "Hola {{ Auth::user()->name }},");
    }, 100);
  </script>
@endif

@if(session('info'))
  <script>
    setTimeout(function(){
      toastr.info("{{ session('info') }}", "Hola {{ Auth::user()->name }},");
    }, 100);
  </script>
@endif

@if(session('warning'))
  <script>
    setTimeout(function(){
      toastr.warning("{{ session('warning') }}", "Hola {{ Auth::user()->name }},");
    }, 100);
  </script>
@endif