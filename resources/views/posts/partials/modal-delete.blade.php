<!-- Button trigger modal -->

{{-- cara ke 2 menggunakan auth @auth --}}

@if (auth()->user()->is($post->author))

<div class="flex mt-3">

<button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#exampleModal">
    Delete
</button>

<a href="/post/{{$post->slug}}/edit" class="btn btn-sm btn-success">Edit</a>
</div>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Apakah anda ingin menghapus ?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <div class="mb-2">
             <div>{{$post->title}}</div> 
             <div class="text-secondary">
              <small>
                  Publised: {{$post->created_at->format('d F, Y')}}
              </small>
              </div>
          </div>
          
          <form action="/post/{{$post->slug}}/delete" method="POST">
              @csrf
              @method('delete')
              <div class="d-flex flex-row-reverse">
                  <button class="btn btn-danger ml-2" type='submit'>Ya</button>
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
              </div>
              
              </form>
      </div>
      
    </div>
  </div>
</div>
@endif

       