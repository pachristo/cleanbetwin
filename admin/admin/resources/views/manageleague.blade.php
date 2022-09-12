@extends('layouts.master')

@section('title')
    CLEANODDS | Load Leagues
@endsection
@section('page')
    Leagues
@endsection
@section('content')
    <div class="col" style="min-height: 323px;;">
        <br>
        <?php
        $date = new dateTime();
        $d = $date->format('j F, Y');
        ?>

        <div class="row">
            <div class="col-xs-12" id="existingleagues">
                <table class="table table-striped" id="datatable">
                    <thead>
                    <tr>
                        <th>S/N</th>
                        <th>LEAGUE</th>
                        <th>SHORT CODE</th>
                        <th>DELETE</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($allleagues->all() as $league)
                        <tr id="{{$league->id}}">
                            <td>{{$league->id}}</td>
                            <td>{{$league->league}}</td>
                            <td>{{$league->code}}</td>
                            <td><a href="{{$league->id}}" class="trashleague">Delete</a> </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>


@endsection
