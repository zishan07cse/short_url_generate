@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <h1 style="text-align:center;margin-top:50px;">Generate Short Link</h1>
        <div class="card" style="margin-top:30px;">
      <div class="card-header" >
        <form method="POST" action="{{ route('generate.shorten.link.post') }}">
            @csrf
            <div class="input-group mb-3">
              <input type="text" name="link" class="form-control" placeholder="Enter URL" aria-label="Recipient's username" aria-describedby="basic-addon2">
              <div class="input-group-append">
                <button class="btn btn-success" type="submit">Generate Shorten Link</button>
              </div>
            </div>
        </form>
      </div>
      <div class="card-body">
            @if (count($errors) > 0)
                <div class = "alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            @if (Session::has('success'))
                <div class="alert alert-success">
                    <p>{{ Session::get('success') }}</p>
                </div>
            @endif
   
            <table class="table table-bordered table-sm">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Short Link</th>
                        <th> Original Link</th>
                        <th>Total Clicked</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($shortlinkslist as $row)
                        <tr>
                            <td>{{ $row->id }}</td>
                            <td><a href="javascript:void(0);" onclick="shortlink_url('{{$row->link}}','{{$row->id}}')">{{url('/').$row->code }}</a></td>
                            <td>{{ $row->link }}</td>
                            <td>
                            <form action="" >
                                <a href="javascript:void(0);" class="btn btn-primary" onclick="total_clicked({{$row->total_count}});">Total Count</a>
                              </form>
                        </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
      </div>
    </div>
  
    </div>    
</div>
@endsection
<script>
    function shortlink_url(url,id){
        console.log(id);
        $.ajax({
	    	url: "{{ route('total-count.post') }}",
	        type: "POST",
	        data: {
                 id: id, 
                _token: '{!! csrf_token() !!}'
			},
	         beforeSend: function(){
			},
			complete: function(){
			},
			success: function(data){
                location.reload();
			},
			error: function() {

			}
	    });
        console.log(url);   
        window.open(url, '_blank');
    }
    function total_clicked(clicked_number){
        var msg = "Total clicked is "+clicked_number;
        Swal.fire(msg);
        console.log(clicked_number);
    }
</script>