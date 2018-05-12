<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
        <link href="{{asset('css/app.css')}}" rel="stylesheet" type="text/css">
        <script src="{{asset('js/app.js')}}" ></script>
        <!-- Fonts -->
        {{--<link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">--}}
        {{--<!-- Styles -->--}}

    </head>
    <body>
        <div class="container">
            <!-- Main jumbotron for a primary marketing message or call to action -->
           <div class="row">
               <div class="col-md-12 ">

                   <h1 class="text-center">Photos</h1>

                        <div class="row">
                            <div class="col-md-4">
                                New Photo
                                <form enctype="multipart/form-data" method="POST" action="/photo/store">
                                    @csrf

                                <input type="file" name="photo" class="form-control">
                                <input type="submit"  class="form-control">
                                </form>
                            </div>

                            <div class="col-md-8">
                                Photos List
                                <form enctype="multipart/form-data" method="POST" action="/photos/update">
                                    @csrf
                                    <table class="table table-striped">
                                        <tr>
                                            <th scope="col">
                                                Photo
                                            </th>
                                            <th scope="col">
                                                Name
                                            </th>
                                            <th scope="col">
                                                New Name
                                            </th>
                                            <th scope="col">
                                                Remove
                                            </th>
                                        </tr>

                                        @foreach ($photos as $photo)
                                            <tr>
                                                <td><img class="img-thumbnail" style="width: 5em;" src="/storage/{{$photo}}.jpg"> </td>
                                                <td>{{$photo}}</td>
                                                <td><input class="form-control" type="text" name="{{$photo}}"> </td>
                                                <td><input type="checkbox" name="remove[]" value="{{$photo}}"></td>
                                            </tr>
                                        @endforeach
                                    </table>

                                    <input type="submit"  class="form-control">
                                </form>
                            </div>
                        </div>


                    </form>

               </div>
           </div>
        </div>
    </body>
</html>
