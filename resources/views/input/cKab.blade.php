@extends('layouts.dash')

@section('content')
<div class="container">
  <div class="row">
      <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
          <div class="card">
              <h5 class="card-header">Input Kabupaten</h5>
              <div class="card-body">
                <div class="panel-bSody">
                    <form class="form-horizontal" role="form" method="POST" action="/admin/kab">
                        {{ csrf_field() }}


                        <div class="form-group{{ $errors->has('idProv') ? ' has-error' : '' }}">
                    <label for="idProv" class="col-md-4 control-label">Provinsi</label>

                    <div class="col-md-6">
                      <select class="form-control input-sm"name="idProv" value="{{ old('idProv') }}" required>
                        @foreach ($Prov as $u)
                          <option value="{{$u->id}}"->{{$u->provinsi}}</option>
                        @endforeach
                      </select >
                        @if ($errors->has('idProv'))
                            <span class="help-block">
                                <strong>{{ $errors->first('idProv') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                        <div class="form-group{{ $errors->has('har_bes') ? ' has-error' : '' }}">
                            <label for="har_bes" class="col-md-4 control-label">kabupaten</label>

                            <div class="col-md-6">
                                <input id="kabupaten" type="kabupaten" class="form-control" name="kabupaten" value="{{ old('kabupaten') }}" required>

                                @if ($errors->has('kabupaten'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('kabupaten') }}</strong>
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
</div>

@endsection
