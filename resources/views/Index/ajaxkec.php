<!DOCTYPE html>
<html>
<head>
  <title></title>
</head>
<body>
<?php
public function show($id)
  {
    if(!Gate::allows('isAdmin'))
    {
       return response("404", 404);
    }
  $kec=kec::find($id);

  }
?>
<?php
  $pr2='';
 ?>
 <?php
      if (isset($_GET['var2'])) {$pr2=$_GET['var2'];}
      $kabt = DB::select('SELECT id,kecamatan,idKab FROM kec WHERE (idKab)=:j', ['j' => $pr2]);
?>
 <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example4" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>KECAMATAN</th>
                                <th>EDIT</th>
                                <th>DELETE</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php $num=0;?>
                            @foreach ($kabt as $ke)
                            <th>
                              <?php $num=$num+1;
                              echo $num;
                              ?>
                            </th>

                        <th>{{$ke->kecamatan}}</th>
                        <th><form class="" action="/admin/kec/{{$ke->id}}" method="post">
                      <div class="container">
                        <a href="/admin/kec/{{$ke->id}}/edit" class="btn btn-xs btn-primary">EDIT</a>
                      </div>
                        </form></th>
                      <th>
                        <form class="" action="/admin/kec/{{$ke->id}}" method="post">
                          <input type="hidden" name="_method" value="delete">
                          <input type="hidden" name="_token" value="{{csrf_token()}}">
                          <input onclick="return confirm('Menghapus ini akan menghapus data lainnya, Lanjutkan?')" type="submit" class="btn btn-xs btn-primary" value="DELETE">
                        </form>
                      </th>
                          </tbody>
                            @endforeach
                        </table>
                    </div>
                  </div>
                </div>
</body>
</html>