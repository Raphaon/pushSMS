@extends('Layout/master')
@section('content')
    <div class="block-header">
        <h2>
            New SMS 
        </h2>
    </div>

<div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>COMPOSE NEW SMS</h2>
                        </div>
                        <div class="body">
                            
                            <form id="form_advanced_validation" action="{{ route('sendingMessage') }}"  method="POST">
                                @if (session()->has('msg'))
                                    <div class="alert alert-info">{{ session('msg') }}</div>
                                @endif

                                @foreach ($errors->all() as $error)
                                    <div class="alert alert-danger">
                                            <strong>ERREUR  :</strong> {{ $error }}.
                                    </div>   
                                @endforeach
                                
                                {{ csrf_field() }}
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control"  name="sender" maxlength="11" required>
                                        <label class="form-label">Sender *</label>
                                    </div>
                                    <div class="help-info">Min. 1, Max. 11 characters</div>
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="receiver" required>
                                        <label class="form-label">Receiver(s) * Example  : 677889900, 67688990, ...</label>
                                    </div>
                                    <div class="help-info">Min one number.</div>
                                </div>
   
                                
                                
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <textarea class="form-control no-resize" name="message" cols="30" rows="5" required maxlength="160"></textarea>
                                        <label class="form-label">Message</label>
                                    </div>
                                    <div class="help-info">Min. 1, Max. 160 characters</div>
                                </div>

    
                                <button class="btn btn-primary waves-effect" type="submit">SEND</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
         <script src="../../js/pages/forms/form-validation.js"></script>
@endsection
