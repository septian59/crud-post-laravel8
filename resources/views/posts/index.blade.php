@extends('layouts.app')

@section('content')
<div class="container">
    @include('alert')
    <div class="">
        <div>
            @isset($category)
            <h4>Category: {{$category->name}}</h4>   
            @endisset


            @isset($tag)
            <h4>Tag: {{$tag->name}}</h4>   
            @endisset

            @if (!isset($category) && !isset($tag))
                <h4>All Post</h4>
            @endif
            
            <hr>

        </div>

       
    </div>

    <div class="row">
    <div class="col-md-7">
        @forelse ($posts as $post)
            <div class="card my-4">
                

                @if ($post->thumbnail)
                <a href="{{route('posts.show', $post->slug)}}">
                <img style="height: 400px; object-fit:cover; object-position:center;" class="card-img-top" src="{{asset($post->takeImage())}}">
                </a>
                @endif

                <div class="card-body">

                    <div>
                        <a href="{{route('categories.show', $post->category->slug)}}" class="text-secondary">
                            <small>{{$post->category->name}} - </small>
                            </a>

                            @foreach ($post->tags as $tag)
                            <a href="{{route('tags.show', $tag->slug)}}" class="text-secondary">
                                <small>{{$tag->name}}</small>
                                </a>    
                            @endforeach
                    </div>
                    <h5>
                        <a href="{{route('posts.show', $post->slug)}}" class="card-title text-dark">
                            {{$post->title}}
                        </a>
                    </h5>

                    <div class="text-secondary my-3">
                        {{Str::limit($post->body, 120)}}
                    </div>

                    <div class="d-flex justify-content-between align-items-center mt-2">
                        
                        <div class="media align-items-center">
                            <img width="40" class="rounded-circle mr-3" src="{{$post->author->gravatar()}}" alt="">
                            <div class="media-body">
                                <div>
                                    {{$post->author->name}}
                                </div>
                                
                            </div>
                        </div>
                        
                        <div class="text-secondary">
                            <small>
                                Published on {{$post->created_at->diffForHumans()}}
                            </small>
                        </div>
                    </div>

                    
                </div>
                
            </div>
            @empty
            <div class="col-md-6">
            <div class="alert alert-info">
                Tidak ada post!!
            </div>
        </div>
            @endforelse
    </div>    
    </div>       
            

        <div class="d-flex justify-content-center">
            <div>

                {{$posts->links()}}
            </div>
        </div>

    
</div>
@endsection