@extends('kk.app')

@section('content')

    <div content="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Article</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead class="text-primary">
                            <tr>
                                <th>Id</th>

                                <th>Title</th>

                                <th>Category</th>

                                <th>Public</th>

                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($paginate as $item)
                                <tr>

                                    <?php /** @var \App\Models\Kk\Article $item */ ?>

                                    <td>{{$item->id}}</td>

                                    <td>{{$item->title}}</td>

                                    <td>{{$item->category->title}}</td>

                                    <td>{{$item->publicStatus}}</td>

                                    <td>
                                        <a href="{{route('kk.article.edit', $item->id)}}">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
