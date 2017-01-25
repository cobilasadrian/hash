@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="panel panel-default">
                    <div class="panel-heading">Create hashes</div>
                    <div class="panel-body">
                        <form id="create-hashes-form" role="form" method="POST" action="{{ url('/hashes') }}">
                            {{ csrf_field() }}
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary">
                                    Create
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{--<script>
        $("#create-hashes-form").submit(function( e ) {
            var submitBtn = $(this).find("button[type='submit']");
            submitBtn.prop('disabled', true);
            $(".panel-body").prepend("<div id='preloader' class='text-center'><img src='/images/preloader.gif' vspace='15'></div>");
            $.ajax({
                url: "/hashes",
                headers:{
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr('content')
                },
                type: "POST",
                /*data: data,*/
                success: function(response) {
                    $(".panel-body").find("#preloader").remove();
                    submitBtn.prop('disabled', false);
                }
            });
            e.preventDefault();
        });
    </script>--}}
@endsection
