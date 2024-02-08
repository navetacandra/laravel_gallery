@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-center">
        <div class="w-50 my-3 p-1 rounded shadow-lg">
            <div class="ms-3 mt-3 mb-4 d-flex justify-content-start align-items-center mb-2">
                <img src="https://dummyimage.com/640x1:1/" alt="profile-picture" class="img-fluid rounded-circle"
                    width="50">
                <span class="ms-2 fs-5">{{ $data->user->nama }}</span>
            </div>
            <img class="img-fluid mx-auto d-block" src="{{ asset('storage/' . $data->lokasi_file) }}"
                alt="{{ $data->judul_foto }}">
            <div class="p-3 d-flex justify-content-start align-items-center">
                @if ($data->liked_by_user_exists)
                    <svg xmlns="http://www.w3.org/2000/svg" width="2rem" height="2rem" role="button" fill="currentColor"
                        class="bi bi-heart-fill text-danger" viewBox="0 0 16 16">
                        <path fill-rule="evenodd"
                            d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314" />
                    </svg>
                @else
                    <svg xmlns="http://www.w3.org/2000/svg" width="2rem" height="2rem" role="button" fill="currentColor"
                        class="bi bi-heart" viewBox="0 0 16 16">
                        <path
                            d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143q.09.083.176.171a3 3 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15" />
                    </svg>
                @endif
                <span class="fs-4 ms-2">{{ $data->likes_count }}</span>
            </div>
            <div id="post-detail" class="my-2 ms-3">
                <span class="fw-bold fs-5 d-block">{{ $data->judul_foto }}</span>
                <span class="text-muted fs-6">{{ $data->deskripsi_foto }}</span>
            </div>
        </div>
    </div>
    <div class="d-flex justify-content-center">
        <div class="w-50 my-1 p-1 rounded shadow-lg">
            <ul class="list-group">
                <li class="list-group-item border-start-0 border-end-0 d-flex flex-column">
                    <p class="fs-5 fw-semibold">Komentar</p>
                    <form action="" method="POST">
                        <div class="input-group">
                            <textarea class="form-control" aria-label="Comment content"></textarea>
                            <button class="input-group-text">Send</button>
                        </div>
                    </form>
                </li>
                <li class="list-group-item border-start-0 border-end-0 d-flex flex-column">
                    <div class="d-flex justify-content-start align-items-center mb-2">
                        <img src="https://dummyimage.com/640x1:1/" alt="profile-picture" class="img-fluid rounded-circle"
                            width="50">
                        <span class="ms-2 fs-5">Anon</span>
                    </div>
                    <span class="text-muted fs-6">
                        Lorem ipsum dolor sit amet consectetur, adipisicing elit. Neque amet at possimus veniam tempora!
                        Corrupti ratione inventore vitae neque, at expedita aliquid maxime perferendis sed consectetur
                        voluptate in, nam voluptatibus?
                    </span>
                </li>
            </ul>
        </div>
    </div>
@endsection
