@extends('layouts.dash')

@section('content')
<div class="container">
  <div class="row">
      <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
          <div class="card">
              <h5 class="card-header">Input Desa</h5>
              <div class="card-body">
                <div class="panel-bSody">
                    <form class="form-horizontal" role="form" method="POST" action="/admin/des">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('idProv') ? ' has-error' : '' }}">
                    <label for="idProv" class="col-md-4 control-label">Kecamatan</label>

                    <div class="col-md-6">
                      <select class="form-control input-sm"name="idKec" value="{{ old('idKec') }}" required>
                        @foreach ($Kec as $u)
                          <option value="{{$u->id}}"->{{$u->kecamatan}}</option>
                        @endforeach
                      </select >
                        @if ($errors->has('idKec'))
                            <span class="help-block">
                                <strong>{{ $errors->first('idKec') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                        <div class="form-group{{ $errors->has('har_bes') ? ' has-error' : '' }}">
                            <label for="Desa" class="col-md-4 control-label">Desa</label>

                            <div class="col-md-6">
                                <input id="Des" type="Des" class="form-control" name="Des" value="{{ old('Des') }}" required>

                                @if ($errors->has('Des'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('Des') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>



                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Submit
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
