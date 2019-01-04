@extends('layouts.dash')

@section('content')
<div class="container">
  <div class="row">
      <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
          <div class="card">
              <h5 class="card-header">Input Provinsi</h5>
              <div class="card-body">
                <div class="panel-bSody">
                    <form class="form-horizontal" role="form" method="POST" action="/admin/prov">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('har_bes') ? ' has-error' : '' }}">
                            <label for="har_bes" class="col-md-4 control-label">Provinsi</label>

                            <div class="col-md-6">
                                <input id="provinsi" type="provinsi" class="form-control" name="provinsi" value="{{ old('provinsi') }}" required>

                                @if ($errors->has('provinsi'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('provinsi') }}</strong>
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
