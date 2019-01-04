@extends('layouts.dash')

@section('content')
<div class="container">
  <div class="row">
      <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
          <div class="card">
              <h5 class="card-header">Input Kecamatan</h5>
              <div class="card-body">
                <div class="panel-bSody">
                    <form class="form-horizontal" role="form" method="POST" action="/admin/kec">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('idKab') ? ' has-error' : '' }}">
                    <label for="idProv" class="col-md-4 control-label">Kabpuaten</label>

                    <div class="col-md-6">
                      <select class="form-control input-sm"name="idKab" value="{{ old('idKab') }}" required>
                        @foreach ($Kab as $u)
                          <option value="{{$u->id}}"->{{$u->kabupaten}}</option>
                        @endforeach
                      </select >
                        @if ($errors->has('idKab'))
                            <span class="help-block">
                                <strong>{{ $errors->first('idKab') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                        <div class="form-group{{ $errors->has('har_bes') ? ' has-error' : '' }}">
                            <label for="har_bes" class="col-md-4 control-label">kecamatan</label>

                            <div class="col-md-6">
                                <input id="kecamatan" type="kecamatan" class="form-control" name="kecamatan" value="{{ old('kecamatan') }}" required>

                                @if ($errors->has('kecamatan'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('kecamatan') }}</strong>
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
