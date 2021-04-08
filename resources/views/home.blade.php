<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <div class="col-md-12 mt-5">
            <div class="card">
                <div class="card-header">
                    <h3>Dashboard</h3>
					
                </div>
                <div class="card-body">
					<div class="row">
					</div>
					<a href="{{ route('logout') }}" style="float: right;" class="btn btn-danger">Logout</a>
                    <h5>Selamat datang di halaman dashboard, <strong>{{ Auth::user()->name }}</strong></h5>
                    
					<div class="row">
						<div class="col s12 m12">
							<h4>List Table</h4><hr>

							  <table class="table table-striped">
								<thead>
									<tr>
									  <th>user_id</th>
									  <th>Status</th>                                 
									  <th>Posisi</th>     
								  </tr>
								</thead>
								<tbody>                        
								  <?php foreach($crud as $value): ?>
									<tr>
									  <td>{{$value->user_id}}</td>
									  <td>{{$value->status}}</td>                                 
									  <td>{{$value->posisi}}</td>
									  <td>       
									  </td>                                
									  </td>
									</tr>
								  <?php endforeach?>
								</tbody>
							</table>

						</div>
					</div>        
                </div>
            </div>
        </div>
    </div>
</body>
</html>
