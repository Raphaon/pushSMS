@extends('Layout/master')
@section('content')

      <div class="row clearfix">
        @if ($projects->count()>0)
            @foreach ($projects as $project)
                 <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                <div class="card">
                        <div class="header">
                            <h2>
                                {{ $project->project_name }} <!--small>Description text here...</small--> </h2>
                           
                        </div>
                        <div class="body">
                           LABEL : {{ $project->project_label }} <br><br>
                           Comment :  {{ $project->Commentaire }} <br><br>
                           Create on : {{ $project->created_at }}
                        </div>
                    </div>
                </div>
            @endforeach
        @else
            <div class="alert alert-info">Auccun Projects </div> 
        @endif
           
</div>
</div>

@endsection