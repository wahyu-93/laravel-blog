<!-- Modal -->
@foreach ($categories as $category)
  <div class="modal fade modal-lg" id="modalEdit{{ $category->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="staticBackdropLabel">Update Category</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
              <form action="{{ route('categories.update', $category->id) }}" method="POST">
                  @method('PUT')
                  @csrf
                  
                  <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name"  value="{{ $category->name ?? old('name') }}" autofocus>
                  @error('name')
                      <div class="text-danger mt-2">{{ $message }}</div>
                  @enderror

                  <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                      <button type="submit" class="btn btn-primary">Update</button>
                  </div>
              </form>
          </div>
        </div>
      </div>
  </div>
@endforeach