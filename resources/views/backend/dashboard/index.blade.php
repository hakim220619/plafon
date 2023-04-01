@extends('backend.layout.base', ['title' => 'Dashboard - Administrator - Laravel 9'])

@section('content')
    <div class="container">
        <div class="row">
            @foreach ($barang as $br)
                <div class="col-md-3" style="padding: 10px;">
                    <div class="card">
                        <img class="card-img-top" src="{{ asset('storage/images/barang/' . $br->image . '') }}"
                            style="height: 150px" alt="Card image cap" />
                        <div class="card-body">
                            <h4 class="card-title">{{ $br->nama_barang }}</h4>
                            <hr />
                            <p class="card-text">
                                {!! html_entity_decode($br->deskripsi) !!}
                            </p>
                            <hr />
                        </div>
                        <div class="card-footer" style="margin-top: -40px;">
                            @php
                                $begin = new DateTime('now');
                                $end = new DateTime($br->created_at);
                                $date_post = $begin->diff($end);
                            @endphp
                            @if ($date_post->format('%h') <= 1)
                                <small class="text-muted">Posted on {{ $date_post->format('%i menit') }}</small>
                            @elseif ($date_post->format('%d') <= 1)
                                <small class="text-muted">Posted on {{ $date_post->format('%h jam %i menit') }}</small>
                            @else
                                <small class="text-muted">Posted on {{ $date_post->format('%d hari %h jam') }}</small>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
