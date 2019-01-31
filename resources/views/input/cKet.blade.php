@extends('layouts.dash')

@section('content')


<div class="container">
  <div class="row">
      <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
          <div class="card">
              <h5 class="card-header">Input Keterangan</h5>
              <div class="card-body">
                <div class="panel-bSody">
                    <form class="form-horizontal" role="form" method="POST" action="/admin/ket">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('idDus') ? ' has-error' : '' }}">
                    <label for="idDus" class="col-md-4 control-label">Dusun</label>

                    <div class="col-md-6">
                      <select class="form-control input-sm"name="idDus" value="{{ old('idDus') }}" required>
                        @foreach ($Dus as $u)
                          <option value="{{$u->id}}"->{{$u->Dusun}}</option>
                        @endforeach
                      </select >
                        @if ($errors->has('idDus'))
                            <span class="help-block">
                                <strong>{{ $errors->first('idDes') }}</strong>
                            </span>
                        @endif
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
                                <button type="submit" class="btn btn-primary">
                                  </form>
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
