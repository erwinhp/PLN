@extends('layouts.Dash2')
@section('content')
<!--JQUERY -->
<script src="{{URL::to('/')}}/assets/vendor/jquery/jquery-3.3.1.min.js"></script>



                <div class="table-responsive">
                    <table id="example4" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>USER</th>
                                <th>EDIT</th>
                                <th>DELETE</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php $num=0;?>
                            @foreach ($User as $k)
                            <th>
                              <?php $num=$num+1;
                              echo $num;
                              ?>
                            </th>

                        <th>{{$k->name}}</th>
                        <th><form class="" action="/admin/user/{{$k->id}}" method="post">
                        <a href="/admin/user/{{$k->id}}/edit" class="btn btn-xs btn-primary">EDIT</a>
                        </form>
                      <th>
                        <form class="" action="/admin/user/{{$k->id}}" method="post">
                          <input type="hidden" name="_method" value="delete">
                          <input type="hidden" name="_token" value="{{csrf_token()}}">
                          <input onclick="return confirm('Apakah anda yakin untuk menghapus? Lanjutkan')" type="submit" class="btn btn-xs btn-primary" value="DELETE">
                        </form>
                      </th>
                          </tbody>
                            @endforeach
                      </table>
                    </div>
                  </ul>
                  </div>
                </div>

@endsection
