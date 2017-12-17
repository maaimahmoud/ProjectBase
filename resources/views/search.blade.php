@extends('include.navbar')

@section('title')
    Search
@endsection

<?php 
    $cssfile = array("css/search.css");
    $jsfile = array("js/search.js");
?>

@section('content')
    <section>
        <div class="container-fluid search-result">
            <div class="row">
                <form action="/search" method="POST" class="form2 form-inline" id="search_form">
                {{ csrf_field() }}
                    <input class="form-control mr-sm-2" name="search_value" id="search_value" type="search" minlength="2" maxlength="255" placeholder="Search" aria-label="Search">
                    <select class="custom-select form-control" id="search_combo" name="search_combo">
                        <option value="">Select your search method</option>
                        <option value="proname">Project Name</option>
                        <option value="tname">Team Name</option>
                        <option value="year">Year</option>
                        <option value="cname">Course Name</option>
                        <option value="ccode">Course Code</option>
                        <option value="dname">Department Name</option>
                        <option value="dcode">Department Code</option>
                    </select>
                    <button class="btn search_btn my-2 my-sm-0" id="search_search_btn" type="submit">Search</button>
                </form>
            </div>
            @if(isset($searchResult))
                @for ($i = 0; $i < ceil(count($searchResult) / 3); $i++)
                    @if($i == (ceil(count($searchResult) / 3) - 1))
                        <?php $max_j = 3*$i + (count($searchResult) - 3*$i); ?>
                    @else
                        <?php $max_j = 3*$i + 3; ?>
                    @endif
                    <div class="row ">
                        @for ($j = 3*$i; $j < $max_j; $j++)
                            <div class="col-md-3 col-sm-6 card">
                                <img width="100px" height="100px" class="project-logo" src="images/t.png">
                                <h4>{{$searchResult[$j]['Name']}}</h4>
                                <div class="project-description">
                                    <p>{{$searchResult[$j]['Document']}}</p>
                                </div>
                            </div>
                        @endfor
                    </div>
                @endfor
            @else
                <div style="height: 405px; text-align: center;"><h1 style="margin: 50px auto; color: #999;">Sorry No Result Found For this Query</h1></div>
            @endif
        </div>
    </section>
@endsection