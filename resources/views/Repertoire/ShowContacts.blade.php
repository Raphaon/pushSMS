@extends('./Layout/master')
@section('content')
 
        <div class="container-fluid">
            <div class="block-header">
                <h2>
                    {{ $reper->Repert_name }} / Contacts
                </h2>
            </div>
            <!-- Basic Examples -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                    <a href="{{ route('importContact') }}" class="btn bg-red btn-circle-lg waves-effect waves-circle waves-float" >
                        <i class="material-icons">add</i>
                    </a>
        
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                        <tr>
                                            <th>Create_on</th>
                                            <th>Name(s)</th>
                                            <th>Surname (s)</th>
                                            <th>Phone 1</th>
                                            <th>Phone 2</th>
                                            <th>Email</th>
                                            <th>Adress</th>
                                            
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Create_on</th>
                                            <th>Name(s)</th>
                                            <th>Surname (s)</th>
                                            <th>Phone 1</th>
                                            <th>Phone 2</th>
                                            <th>Email</th>
                                            <th>Adress</th>
                                            
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                       
                                       @foreach ($reper->getContacts(); as $contact)
                                           
                                            <tr>
                                            <td>{{ $contact->created_at }}</td>
                                            <td>{{ $contact->Contact_name }}</td>
                                            <td>{{ $contact->Contact_surname }}</td>
                                                <td>{{ $contact->Contact_phone1 }}</td>
                                                <td>{{ $contact->Contact_phone2 }}</td>
                                                <td>{{ $contact->Contact_email }}</td>
                                                <td>{{ $contact->Contact_adress }}</td>
                                            </tr>

                                       @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Basic Examples -->
            <!-- #END# Exportable Table -->
        </div>
    </section>

    
    
    <!-- Jquery DataTable Plugin Js -->
    <script src="../../plugins/jquery-datatable/jquery.dataTables.js"></script>
    <script src="../../plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js"></script>
    <script src="../../plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js"></script>
    <script src="../../plugins/jquery-datatable/extensions/export/buttons.flash.min.js"></script>
    <script src="../../plugins/jquery-datatable/extensions/export/jszip.min.js"></script>
    <script src="../../plugins/jquery-datatable/extensions/export/pdfmake.min.js"></script>
    <script src="../../plugins/jquery-datatable/extensions/export/vfs_fonts.js"></script>
    <script src="../../plugins/jquery-datatable/extensions/export/buttons.html5.min.js"></script>
    <script src="../../plugins/jquery-datatable/extensions/export/buttons.print.min.js"></script>

    <!-- Custom Js -->
    <script src="../../js/admin.js"></script>
    <script src="../../js/pages/tables/jquery-datatable.js"></script>

    <!-- Demo Js -->
    <script src="../../js/demo.js"></script>
    
@endsection
   