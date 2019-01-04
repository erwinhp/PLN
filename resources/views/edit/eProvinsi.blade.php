@extends('layouts.dash')

@section('content')
<div class="container">
  <div class="row">
      <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
          <div class="card">
              <h5 class="card-header">Edit Provinsi</h5>
              <div class="card-body">
                <div class="panel-bSody">
                    <form class="form-horizontal" role="form" method="post" action="/admin/prov/{{$Prov->id}}" >


                        {{ csrf_field() }}



                        <div class="form-group{{ $errors->has('jadwal') ? ' has-error' : '' }}">
                            <label for="provinsi" class="col-md-4 control-label">provinsi</label>

                            <div class="col-md-6">
                                <input id="provinsi" type="text" class="form-control" name="provinsi" value="{{$Prov->provinsi}}" required>

                                @if ($errors->has('provinsi'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('provinsi') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <input type="hidden" name="_method" value="put">
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Edit
                                </button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
