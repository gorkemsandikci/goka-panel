@extends('panel.layout.app')

@section('content')

    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">World News</h4>
                    <p class="card-description">
                        <a href="{{ route('panel.world-news.create')  }}" class="btn btn-primary">Yeni Ekle</a>
                    </p>
                    @if (session()->get('success'))
                        <div class="alert alert-success">
                            {{ session()->get('success') }}
                        </div>
                    @endif
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>Görsel</th>
                                <th>Başlık</th>
                                <th>Kısa Açıklama</th>
                                <th>Düzenle</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(!empty($articles) && count($articles) > 0)
                                @foreach($articles as $item)
                                    <tr class="item" item-id="{{ $item->id }}">
                                        <td class="py-1">
                                            <img src="{{ asset($item->image) }}" alt="image"/>
                                        </td>
                                        <td>{{ $item->title }}</td>

                                        <td>{{ $item->sub_title ?? '' }}</td>

                                        <td class="d-flex">
                                            <a class="btn btn-primary mr-2"
                                               href="{{ route('panel.world-news.edit', $item->id) }}">Düzenle</a>
                                            <button type=button class="sil-btn btn btn-danger">Sil</button>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                            </tbody>
                        </table>
                    </div>

                    <div class="row">
                        <div class="col-lg-12">
                            {{--                            {{ $articles->links('pagination::custom') }}--}}
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection

@section('customjs')
    <script>
        $(document).on('click', '.sil-btn', function (e) {
            e.preventDefault();
            var item = $(this).closest('.item');
            id = item.attr('item-id');
            alertify.confirm("Silmek istediğinizden emin misiniz?", "Silinen makaleye bir daha erişilemez.",
                function () {
                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                        },
                        type: "DELETE",
                        url: "{{route('panel.world-news.destroy')}}",
                        data: {
                            id: id
                        },
                        success: function (response) {
                            if (response.error == false) {
                                item.remove();
                                alertify.success(response.message);
                            } else {
                                alertify.error("Hata oluştu!");
                            }
                        }
                    });
                },
                function () {
                    alertify.error('İşlem iptal edildi!');
                });
        });

    </script>
@endsection
