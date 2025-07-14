<!-- Modal -->
@foreach ($configs as $config)
  <div class="modal fade modal-lg" id="modalEdit{{ $config->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="staticBackdropLabel">Update config</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
              <form action="{{ route('configs.update', $config->id) }}" method="POST" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                  
                    <div class="mb-3">
                        <label for="name">Name</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name"  value="{{ $config->name ?? old('name') }}" readonly>
                        @error('name')
                            <div class="text-danger mt-2">{{ $message }}</div>
                        @enderror
                    </div>

                    @if($config->type === 'image')
                        <div class="mb-3">
                            <input type="hidden" name="oldImg" value="{{ $config->value }}">
                            <input type="file" accept="image/*" class="form-control @error('value') is-invalid @enderror" name="value" id="value"  value="{{ $config->value ?? old('value') }}">

                            @error('value')
                                <div class="text-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                    @else
                        <div class="mb-3">
                            <label for="value">value</label>
                            <input type="text" class="form-control @error('value') is-invalid @enderror" name="value" id="value"  value="{{ $config->value ?? old('value') }}">
                            
                            @error('value')
                                <div class="text-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                    @endif

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