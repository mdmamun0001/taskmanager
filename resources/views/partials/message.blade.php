@if (Session::has('success'))
  <div class="alert alert-success">
  	   <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <p>{{ Session::get('success') }}</p>
  </div>
@endif