@extends('layouts.dash')

@section('content')
<div class="container">
  <div class="row">
      <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
          <div class="card">
              <h5 class="card-header">Input Keterangan</h5>
              <div class="card-body">
                <div class="panel-bSody">
                    <form class="form-horizontal" role="form" method="POST" action="/admin/ket/">
                        {{ csrf_field() }}
                        <script src="{{URL::to('/')}}/assets/vendor/jquery/jquery-3.3.1.min.js"></script>
                        <script src="{{ asset('js/DD.js') }}"></script>


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


                        <div class="form-group{{ $errors->has('idDus') ? ' has-error' : '' }}">
                    <label for="idDus" class="col-md-4 control-label">Dusun</label>

                    <div class="col-md-6" id="dddus">
                      <select class="form-control input-sm" name="idDus" value="{{ old('idDus') }}" required>

                      </select >
                    </div>
                </div>


                        <div class="form-group{{ $errors->has('RtRw') ? ' has-error' : '' }}">
                            <label for="RtRw" class="col-md-4 control-label">RtRw</label>

                            <div class="col-md-6">
                                <input id="RtRw" type="RtRw" class="form-control" name="RtRw" value="{{ old('RtRw') }}" required>

                                @if ($errors->has('RtRw'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('RtRw') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group{{ $errors->has('har_bes') ? ' has-error' : '' }}">
                            <label for="RtRw" class="col-md-4 control-label">Potensi Pelanggan</label>

                            <div class="col-md-6">
                                <input id="PotPel" type="PotPel" class="form-control" name="PotPel" value="{{ old('PotPel') }}" required>

                                @if ($errors->has('PotPel'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('PotPel') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group{{ $errors->has('shift') ? ' has-error' : '' }}">
                                <label for="shift" class="col-md-4 control-label">Keterangan</label>

                                <div class="col-md-6">
                                  <select class="form-control input-sm"name="Keterangan" value="{{ old('Keterangan') }}" required>

                                      <option>PLN</option>
                                      <option>NON PLN</option>
                                      <option>BELUM</option>

                                  </select >
                                    @if ($errors->has('shift'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('shift') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">

                                <button type="submit" class="btn btn-primary" name="submit">
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
