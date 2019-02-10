@extends('admin.layouts.app')
@section('title', "Admin")
@section('csscontent')
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
@endsection
@section('navcontent')
    <li>
        <a href="#">HOME</a>
    </li>
    <li>
        <a href="#">LOCATIONS</a>
    </li>
    <li class="active">
        <a href="{{url('admin/menu')}}">MENU</a>
    </li>
    <li>
        <a href="{{url('admin/about')}}">ABOUT</a>
    </li>
@endsection
@section('content')
    @foreach($menu as $category)
        <div class="category">
            <div class="category-title"><b>{{strtoupper($category->title)}}</b></div>
            <div class="category-body">
                <div class="container">
                    <div class="row">
                        @foreach($category->items as $item)

                            <div class="col-md-3">
                                <div class="card">
                                    <img class="card-img-top" src="{{asset('img/'.$item->icon)}}" alt="">
                                    <div class="card-body">
                                        <h5 class="card-title">{{$item->title}}</h5>
                                        <div class="card-text">
                                            @foreach($item->subitems as $subitem)
                                                <div>{{$subitem->title}} {{$subitem->price}}</div>
                                            @endforeach
                                            <form id="subitem-form" method="post" action="{{url('admin/addsubitem')}}">
                                                {{csrf_field()}}
                                                <input type="hidden" name="item_id" value="{{$item->id}}">
                                                <div class="input-group">
                                                    <input type="text" class="form-control" name="title" placeholder="Item" required>
                                                    <div class="input-group-append">
                                                        <button class="btn btn-primary">Add</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        <div class="col-md-3">
                            <form id="item-form" method="post" action="{{url('admin/additem')}}">
                                {{csrf_field()}}
                                <input type="hidden" name="category_id" value="{{$category->id}}">
                                <div class="input-group">
                                    <input type="text" class="form-control" name="title" placeholder="Item" required>
                                    <div class="input-group-append">
                                        <button class="btn btn-primary">Add</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>


                </div>

            </div>
        </div>

    @endforeach
    <form id="item-form" method="post" action="{{url('admin/addcategory')}}">
        {{csrf_field()}}
        <div class="input-group">
            <input type="text" class="form-control" name="title" placeholder="Category" required>
            <div class="input-group-append">
                <button class="btn btn-primary">Add Category</button>
            </div>
        </div>
    </form>
@endsection