<div class="modal fade" id="showModalError" tabindex="-1" role="dialog" aria-labelledby="showModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="showModalLabel">Konfirmasi Batal Adopsi?</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{ route('validation.error', $validation->id) }}" method="POST">
            @csrf
            <div class="modal-body">
                <label for="message-text" class="col-form-label">Message:</label>
                <textarea class="form-control @error('message') is-invalid @enderror" id="message" name="message"></textarea>
                @error('message')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-success btn-sm">Submit</button>
            </div>
        </form>
      </div>
    </div>
  </div>
