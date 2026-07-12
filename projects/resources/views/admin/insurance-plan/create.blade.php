@extends('admin.layouts')
@section('title', 'Admin')
@php
    $name="Insurance Plan";$route="insurance-plan";
@endphp
@section('content_header')
    <h1 class="m-0 text-dark">{{$name}} Management</h1>
@stop

@section('content')
    @parent
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12">
          @php
            $addbar=["name"=>$name,"add-data"=>false,"add-name"=>"Add ". Str::singular($name),"add-anchor"=>route($route.'.create'),"back-anchor"=>route($route.'.index')];
          @endphp
          @include("admin.common.add-bar")
          </div>

        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="row">
        <div class="col-12">

          <div class="card  ">
            <div class="card-header">
              <h3 class="card-title">Create {{ Str::singular($name) }}</h3>
               <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="maximize"><i class="fas fa-expand"></i>
                  </button>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
               {!! Form::open(['route' => $route.'.store',"files"=>"true"]) !!}

                    @include("admin.".$route.".form")

                    <button class="btn btn-success"><span class="fa fa-save"></span> Save</button>

                {!! Form::close() !!}
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
@stop
@section("js")
@parent
<script>
  [
      'shortDescription',
      'detail_hero_subtitle',
      'detail_feature_intro',
      'detail_recommended_plan_title',
      'detail_recommended_plan_description',
      'detail_overview_content',
      'detail_policy_types_intro',
      'detail_insurer_intro',
      'detail_how_it_works_description',
      'detail_benefits_description',
      'detail_buying_guide_description',
      'detail_claims_description',
      'detail_testimonial_description',
      'detail_final_content'
  ].forEach(function (field) {
      if (document.getElementById(field)) {
          CKEDITOR.replace(field, {
              allowedContent: true,
              filebrowserUploadUrl: "{{route('ckeditor.upload', ['_token' => csrf_token() ])}}",
              filebrowserUploadMethod: 'form'
          });
      }
  });
</script>
@stop
