<!doctype html>
<html lang="en">

<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-2">

            </div>
            <div class="col-md-8">
                <h2 class="my-5 text-center">Ajax CRUD</h2>
                <a href="" class="btn btn-success my-3" data-bs-toggle="modal" data-bs-target="#addModal">Add user</a>
                <div class="table-data">
                    <table class="table table-bordered" id="user-table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Age</th>
                                <th scope="col" class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                            <tr>
                                <th scope="row">{{$loop->index + 1}}</th>
                                <td>{{$user->name}}</td>
                                <td>{{$user->age}}</td>
                                <td class="text-center">
                                    <a class="btn btn-success update_user_form" data-id="{{$user->id}}"
                                        data-name="{{$user->name}}" data-age="{{$user->age}}" data-bs-toggle="modal"
                                        data-bs-target="#updateModal">Edit</a>
                                    <a class="btn btn-danger delete_user" id="delete-btn-{{$user->id}}"
                                        data-id="{{$user->id}}">Delete</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <button class="btn btn-primary d-block my-2" id="return_top" href='#top'>Go to the top page</button>

                    <button class="btn btn-primary d-block my-2" id="printPage" href="#">Print page</button>

                    <div>
                        <div class="mb-3">
                            <label for="" class="form-label">Maximum 10 characters</label>
                            <input class="col-md-2" type="text" name="" id="max_input" maxlength="10"
                                class="form-control">
                            <span id="rchars">10</span> characters remaining
                        </div>
                    </div>

                    <button class="btn btn-primary" id="create_div">Create a div</button>
                    <button class="btn btn-primary" id="empty_div">Remove all inside a div</button>
                    <button class="btn btn-primary" id="css_div">Change css</button>

                    <h4>Div Area</h4>
                    <div class="new_area">
                    </div>



                    <p id="toggle-text">Click to hide/show text</p>
                    <button type="button" class="btn btn-primary my-2" id="toggle-button">Hide/Show text</button>

                    <p>Age: <input type="text" id="value-test" value="26"></p>
                    <button class="btn btn-primary" id="get-value-button">Get value</button>
                    <button class="btn btn-primary" id="change-value-button">Change value</button>


                    <p id="text">Append and Prepend</p>
                    <button class="btn btn-primary" id="append-button">Append</button>
                    <button class="btn btn-primary" id="prepend-button">Prepend</button>



                    <button class="btn btn-primary d-block my-2" id="slide-button">Slide</button>
                    <button class="btn btn-primary d-block my-2" id="clone-button">Clone</button>

                    <div id="slide-text">
                        <div class="table-responsive">
                        <table class="table table-primary clone-table">
                            <thead>
                                <tr>
                                    <th scope="col">Column 1</th>
                                    <th scope="col">Column 2</th>
                                    <th scope="col">Column 3</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="">
                                    <td scope="row">R1C1</td>
                                    <td>R1C2</td>
                                    <td>R1C3</td>
                                </tr>
                                <tr class="">
                                    <td scope="row">Item</td>
                                    <td>Item</td>
                                    <td>Item</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    </div>

                </div>
            </div>
        </div>
    </div>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
        integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
    </script>
    <script src="{{ url('assets/jquery-3.6.4.js') }}"></script>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

    </script>
    <script src="{{ url('assets/main.js') }}"></script>
    @include('modal');
</body>

</html>
