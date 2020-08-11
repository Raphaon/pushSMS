@extends('Layout/master')
@section('content')

      <div class="row clearfix">
        @if ($repertoires->count()>0)
            @foreach ($repertoires as $repertoire)
      <a href="{{ route('showRepertoireContact', ['id'=>$repertoire->Repert_id]) }}">
                    <div class="col-lg-3 col-md-3 col-sm-5 col-xs-12">
                         <div class="card">
                            <div class="header">
                                <h2>{{ $repertoire->Repert_name }} <small> Create on : {{ $repertoire->created_at }}</small> </h2>
                            </div>
                            <div class="body">
                                {{ $repertoire->Repert_description }} <br><br>
                            </div>
                    </div>
                </div>
                </a>

                
            @endforeach
        @else
            <div class="alert alert-info">Auccun Projects </div> 
        @endif
           
            <a href="{{ route('newRepertoire') }}">
                <div class="col-lg-3 col-md-3 col-sm-5 col-xs-12">
                    <div class="card">
                         <div class="header">
                                <h2>Add New Repertoire</small> </h2>
                        </div>
                        <div class="icon" style="font-size:2em; text-align:center">
                            <i class="material-icons" style="font-size:3em;">add</i>
                        </div>
                    </div>
                </div>
         </a>
</div>
</div>

@endsection