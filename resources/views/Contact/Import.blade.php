@extends('Layout/master')
    <!-- Dropzone Css -->
    <link href="../../plugins/dropzone/dropzone.css" rel="stylesheet">
    <!-- Bootstrap Select Css -->
    <link href="../../plugins/bootstrap-select/css/bootstrap-select.css" rel="stylesheet" />

    @section('content')
        
        
  
        <div class="container-fluid">
            <div class="block-header">
                <h2>IMPORTS CONTACTS</h2>
            </div>
            <!-- Color Pickers -->
            
            <!-- #END# Color Pickers -->
            <!-- File Upload | Drag & Drop OR With Click & Choose -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                <div class="col-md-6">
                                    <p>
                                        <b>Select your repertoire</b>
                                        <a href="{{ url('/Samples/SampleContacts.xlsx') }}">Download Sample Excel File </a>
                                    </p>
                                        @foreach ($errors->all() as $error)
                                            <div class="alert alert-danger">
                                                    <strong>ERREUR  :</strong> {{ $error }}.
                                            </div>   
                                        @endforeach
                                         @if(session('status'))
                                            <div class="alert alert-success">
                                                 {{ session('status') }}.
                                            </div>   
                                        @endif
                                </div>
                            </h2>
                           
                        </div>
                        <div class="body">
                        <form action="{{ route('importContactTraitment') }}" id="frmFileUpload"  method="post" enctype="multipart/form-data">
                              
                            {{ csrf_field() }}
                        
                            <br>
                            <select name="repertoire" required  class="form-control">
                                <option value="" >Select the booklet you want to import</option>
                                
                                @foreach ($repertoires as $item)
                                    <option value="{{ $item->Repert_id }}"> {{ $item->Repert_name }}</option>
                                @endforeach
                            </select>
                            <br><br>

                            <div class="form-control dpropzone">
                                <input type="file" name="fileContacts" required>
                            </div>
                            <br><br>
                                <div class="row">
                                     <input type="submit" class="btn btn-primary"  value="Importer">
                                    <input type="reset" value="Cancel"  class="btn btn-dark">
                                </div>
                               
                        </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# File Upload | Drag & Drop OR With Click & Choose -->
            

           
    </div>
   

    <!-- Select Plugin Js -->
    <script src="../../plugins/bootstrap-select/js/bootstrap-select.js"></script>


    <!-- Dropzone Plugin Js -->
    <script src="../../plugins/dropzone/dropzone.js"></script>

    <!-- Multi Select Plugin Js -->
    <script src="../../plugins/multi-select/js/jquery.multi-select.js"></script>


    <!-- Custom Js -->
    <script src="../../js/admin.js"></script>
    <script src="../../js/pages/forms/advanced-form-elements.js"></script>



</html>


    @endsection
    