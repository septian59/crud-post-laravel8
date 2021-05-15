@extends('layouts.app')


@section('content')
    <div class="container">

        <div class="row">
            <div class="col-md-8">
                @if ($post->thumbnail)
                <img style="height: 450px; object-fit:cover; object-position:center;" class="rounded w-100" src="{{asset($post->takeImage())}}">
                @endif
        
                <h1>{{$post->title}}</h1>
                <div class="text-secondary mb-3">
                    <a href="/categories/{{$post->category->slug}}">{{$post->category->name}}</a> &middot; {{$post->created_at->format('d F, Y')}}
                    &middot;
                    @foreach ($post->tags as $tag)
                        <a href="/tags/{{$tag->slug}}">{{$tag->name}}</a>
                    @endforeach
        
                    <div class="media my-3">
                        <img width="60" class="rounded-circle mr-3" src="{{$post->author->gravatar()}}" alt="">
                        <div class="media-body">
                            <div>
                                {{$post->author->name}}
                            </div>
                            {{'@' . $post->author->username}}
                            
                        </div>
                    </div>
                </div>
                
                <p>{!! nl2br($post->body) !!}</p>
                <div>
                    
        
                @include('posts.partials.modal-delete')
            </div>
            </div>

            <div class="col-md-4">
                @foreach ($posts as $post)
                    <div>
                        <div class="card my-4">
                
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
                                    
                                </div>
            
                                
                            </div>
                            
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        
       
    </div>
@endsection
    
