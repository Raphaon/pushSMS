@extends('Layout/master')
@section('content')
    <div class="block-header">
        <h2>
        New Project <a href=" {{ route('projects')}}"  class="btn btn-default waves-effect" >Retour</a>
        </h2>
    </div>

<div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>ADD A PROJECT </h2>
                        </div>
                        <div class="body">
                            
                            <form id="form_advanced_validation" action="{{ route('saveProject') }}"  method="POST">
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
                                        <input type="text" class="form-control"  name="name" required>
                                        <label class="form-label">Name : *</label>
                                    </div>
                                    <div class="help-info">Min. 1</div>
                                </div>
                               
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control"  name="label" maxlength ="11">
                                        <label class="form-label">Project Label: </label>
                                    </div>
                                    <div class="help-info">Max. 11</div>
                                    
                                </div>
                               

                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <textarea class="form-control no-resize" name="comment" cols="30" rows="5" maxlength="160"></textarea>
                                        <label class="form-label">Comment</label>
                                    </div>
                                    <div class="help-info">Max. 160 characters</div>
                                </div>

                                <button class="btn btn-primary waves-effect" type="submit">SAVE</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
         <script src="../../js/pages/forms/form-validation.js"></script>
@endsection
