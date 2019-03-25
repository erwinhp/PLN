@extends('layouts.dash')

@section('content')
<div class="container">
  <div class="row">
      <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
          <div class="card">
            <script src="{{URL::to('/')}}/assets/vendor/jquery/jquery-3.3.1.min.js"></script>
            <script src="{{ asset('js/DD.js') }}"></script>
              <h5 class="card-header">Input Dusun</h5>
              <div class="card-body">
                <div class="panel-bSody">
                    <form class="form-horizontal" role="form" method="POST" action="/admin/dusun">
                        {{ csrf_field() }}



                                            <div class="form-group{{ $errors->has('idKab') ? ' has-error' : '' }}">
                                            <label for="idKab" class="col-md-4 control-label">Kabupaten</label>

                                            <div class="col-md-6">
                                              <select class="form-control input-sm" id="dropkab2" name="idKab" value="{{ old('idKab') }}" required>
                                                @foreach ($Kab as $u)
                                                <option value="0" style="display:none;font-size:20px;">Kabupaten</option>
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


                                        <div class="form-group{{ $errors->has('idKec') ? ' has-error' : '' }}">
                                        <label for="idKec" class="col-md-4 control-label">Kecamatan</label>

                                        <div class="col-md-6" id="ddKec">
                                        <select class="form-control input-sm"name="idKec" value="{{ old('idKec') }}" required>
                                        </select>
                                        </div>
                                    </div>


                        <div class="form-group{{ $errors->has('idKab') ? ' has-error' : '' }}">
                    <label for="idDes" class="col-md-4 control-label">Desa</label>

                    <div class="col-md-6" id="dddes">
                      <select class="form-control input-sm"name="idDes" value="{{ old('idDes') }}" required>

                      </select >
                    </div>
                </div>



                        <div class="form-group{{ $errors->has('har_bes') ? ' has-error' : '' }}">
                            <label for="Dusun" class="col-md-4 control-label">Dusun</label>

                            <div class="col-md-6">
                                <input id="Dusun" type="Dusun" class="form-control" name="Dusun" value="{{ old('Dusun') }}" required>

                                @if ($errors->has('Dusun'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('Dusun') }}</strong>
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
