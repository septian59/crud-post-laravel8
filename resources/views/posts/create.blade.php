@extends('layouts.app',['title'=> 'Create Post'])

@push('script')
<script>
    $(document).ready(function() {
    $('.select2').select2();
    });
</script>
@endpush


@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6">
           @include('alert')
            <div class="card">
                <div class="card-header">New Post</div>
                <div class="card-body">
                    <form action="/post/store" method="POST" autocomplete="off" enctype="multipart/form-data">
                        @csrf
                        @include('posts.partials.form-control',['submit' => 'Create'])
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection