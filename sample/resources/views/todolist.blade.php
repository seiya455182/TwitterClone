@extends('layouts.app')
@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">ToDo</div>

        <div class="card-body">
          <form method="POST" action="{{ route('todolist.store') }}">
            @csrf

            <div class="form-group row mb-0">
              <div class="col-md-12">
                <textarea class="form-control @error('text') is-invalid @enderror" name="text" required autocomplete="text" rows="1">{{ old('text') }}</textarea>

                @error('text')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
            </div>

            <div class="form-group row mb-0">
              <div class="col-md-12 text-right">
                <p class="mb-4 text-danger">50文字以内</p>
                <button type="submit" class="btn btn-primary">
                  投稿する
                </button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

<!---未定義中--->

@foreach ($todolists as $todolist)
    <div class="col-md-8 mb-3">
        <div class="card">
            <div class="card-haeder p-3 w-100 d-flex">
                <div class="d-flex justify-content-end flex-grow-1">
                    <p class="mb-0 text-secondary">{{ $todolist->created_at->format('Y-m-d H:i') }}</p>
                </div>
            </div>
            <div class="card-body">
                {!! nl2br(e($todolist->text)) !!}
            </div>
            <div class="card-footer py-1 d-flex justify-content-end bg-white">
                @if ($todolist->user->id === Auth::user()->id)
                    <div class="dropdown mr-3 d-flex align-items-center">
                        <a href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-ellipsis-v fa-fw"></i>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                            <form method="POST" action="{{ url('todolist/' .$todolist->id) }}" class="mb-0">
                                @csrf
                                @method('DELETE')

                                <button type="submit" class="dropdown-item del-btn">削除</button>
                            </form>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endforeach
@endsection
