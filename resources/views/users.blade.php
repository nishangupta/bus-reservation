<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
  <link rel="stylesheet" href="{{aasset('css/app.css')}}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.21/css/dataTables.bootstrap.min.css" integrity="sha512-BMbq2It2D3J17/C7aRklzOODG1IQ3+MHw3ifzBHMBwGO/0yUqYmsStgBjI0z5EYlaDEFnvYV7gNYdD3vFLRKsA==" crossorigin="anonymous" />
</head>
<body>
  <table class="table" id="datatable">
    <thead>
      <tr>
        <th>No</th>
        <th>Name</th>
        <th>Email</th>
      </tr>
    </thead>
    <tbody>
    </tbody>
  </table>
  <script src="{{asset('js/app.js')}}"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.21/js/jquery.dataTables.min.js" integrity="sha512-BkpSL20WETFylMrcirBahHfSnY++H2O1W+UnEEO4yNIl+jI2+zowyoGJpbtk6bx97fBXf++WJHSSK2MV4ghPcg==" crossorigin="anonymous"></script>
  <script>
    $(document).ready(function(){
      $('#datatable').DataTable({
        "processing":true,
        "serverside":true,
        "ajax":"route('api.customers.index')",
        "columns":[
          
        ]
      });
    });
  </script>
</body>
</html>