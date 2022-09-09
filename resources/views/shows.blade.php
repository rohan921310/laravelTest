@extends('common.header') 
@section('title', 'Show')
@section('content')
    <div class="container mt-3">
        <form action="{{ url('shows') }}" method="POST">
            <div class="input-group">
                @csrf
                <input type="search" id="searchShow" value="{{ ($search != '') ? $search : '' }}" name="search" class="form-control rounded" placeholder="Search" aria-label="Search" aria-describedby="search-addon" />
                <button type="submit" class="btn btn-outline-primary">search Shows</button>
            </div>
        </form>

        <div class="row searchResult">

            @foreach ($data as $tv)
            <div class="col-4 mt-4">
                <a href="{{$tv->show->url}}" target="_blank">
                    <div class="card">
                        <div style="height: 36vh;">
                            <img src="{{$tv->show->image->original}}" style="height: 100%;" class="card-img-top" alt="Fissure in Sandstone" />
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">{{$tv->show->name}}</h5>
                            <div style="min-height:10vh;height: 14vh;overflow: scroll;">

                                <?php
                                $str = $tv->show->summary;
                                echo preg_replace("#<h1.*?>.*?</h1>#", "", $str);
                                ?>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-6">
                                    <a href="{{$tv->show->url}}" target="_blank" class="btn btn-primary">Watch Now!</a>
                                </div>
                                <div class="col-6" style="text-align: right;">
                                    Rating: {{$tv->show->rating->average}}

                                </div>
                            </div>

                        </div>
                    </div>
                </a>
            </div>
            @endforeach


        </div>

    </div>


    @endsection

