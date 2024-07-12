@extends('layouts.main')

@section('content')

<section class="content">
  <div class="container-fluid">
    <div class="card card-default">
      <div class="card-header">
        <h3 class="card-title">Edit Berita</h3>
        <div class="card-tools">
          <button type="button" class="btn btn-tool" data-card-widget="collapse">
            <i class="fas fa-minus"></i>
          </button>
          <button type="button" class="btn btn-tool" data-card-widget="remove">
            <i class="fas fa-times"></i>
          </button>
        </div>
      </div>

      <div class="card-body">
        @if(session('success'))
          <script>
            Swal.fire({
              icon: 'success',
              title: 'Success!',
              text: '{{ session('success') }}',
            });
          </script>
        @endif

        <form class="card" action="{{ route('slider.update', $slider->id) }}" method="POST" enctype="multipart/form-data">
          @csrf
          @method('PUT')

          <!-- Slider 1 -->
          <div class="row">
            <div class="col-md-6">
              <label for="slider1">Gambar Slider 1</label>
              <div class="form-group">
                @error('slider1')
                  <span class="invalid-feedback">{{ $message }}</span>
                @enderror
                @if($slider->slider1)
                  <div class="mt-2">
                    <img src="{{ asset('images/' . $slider->slider1) }}" alt="Gambar Slider 1" width="200" height="250" id="preview_slider1">
                  </div>
                @endif
                <br>
                <p>Masukkan Gambar</p>
                <input type="file" name="slider1" class="form-control @error('slider1') is-invalid @enderror" id="slider1" onchange="previewImage('slider1', 'preview_slider1')">
              </div>
            </div>

            <!-- Slider 2 -->
            <div class="col-md-6">
              <label for="slider2">Gambar Slider 2</label>
              <div class="form-group">
                @error('slider2')
                  <span class="invalid-feedback">{{ $message }}</span>
                @enderror
                @if($slider->slider2)
                  <div class="mt-2">
                    <img src="{{ asset('images/' . $slider->slider2) }}" alt="Gambar Slider 2" width="200" height="250" id="preview_slider2">
                  </div>
                @endif
                <br>
                <p>Masukkan Gambar</p>
                <input type="file" name="slider2" class="form-control @error('slider2') is-invalid @enderror" id="slider2" onchange="previewImage('slider2', 'preview_slider2')">
              </div>
            </div>
          </div>

          <!-- Slider 3 -->
          <div class="row">
            <div class="col-md-6">
              <label for="slider3">Gambar Slider 3</label>
              <div class="form-group">
                @error('slider3')
                  <span class="invalid-feedback">{{ $message }}</span>
                @enderror
                @if($slider->slider3)
                  <div class="mt-2">
                    <img src="{{ asset('images/' . $slider->slider3) }}" alt="Gambar Slider 3" width="200" height="250" id="preview_slider3">
                  </div>
                @endif
                <br>
                <p>Masukkan Gambar</p>
                <input type="file" name="slider3" class="form-control @error('slider3') is-invalid @enderror" id="slider3" onchange="previewImage('slider3', 'preview_slider3')">
              </div>
            </div>

            <!-- Slider 4 -->
            <div class="col-md-6">
              <label for="slider4">Gambar Slider 4</label>
              <div class="form-group">
                @error('slider4')
                  <span class="invalid-feedback">{{ $message }}</span>
                @enderror
                @if($slider->slider4)
                  <div class="mt-2">
                    <img src="{{ asset('images/' . $slider->slider4) }}" alt="Gambar Slider 4" width="200" height="250" id="preview_slider4">
                  </div>
                @endif
                <br>
                <p>Masukkan Gambar</p>
                <input type="file" name="slider4" class="form-control @error('slider4') is-invalid @enderror" id="slider4" onchange="previewImage('slider4', 'preview_slider4')">
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-12 text-right">
              <button type="submit" class="btn btn-primary mr-5 mb-4">Update</button>
            </div>
          </div>
        </form>
      </div>

      <div class="card-footer">
        Edit Berita
      </div>
    </div>
  </div>
</section>

<script>
  function previewImage(inputId, imageId) {
    const input = document.getElementById(inputId);
    if (input.files && input.files[0]) {
      const reader = new FileReader();
      reader.onload = function(e) {
        document.getElementById(imageId).src = e.target.result;
      }
      reader.readAsDataURL(input.files[0]);
    }
  }
</script>

@endsection
