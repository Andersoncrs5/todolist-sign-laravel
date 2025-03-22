<!doctype html>
<html lang="en">
    <head>
        <title>UPDATE TASK</title>
        <!-- Required meta tags -->
        <meta charset="utf-8" />
        <meta
            name="viewport"
            content="width=device-width, initial-scale=1, shrink-to-fit=no"
        />

        <!-- Bootstrap CSS v5.2.1 -->
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
            crossorigin="anonymous"
        />

        <style>
            .text-red {
                color:red;
            }
            body {
                background-color: gray;
            }
            #data {
                margin-top: 12%;
            }
            .btn-white {
                background-color: white;
                color:black;
            }
            header {
                background-color: black;

            }
        </style>

    </head>

    <body>
        @include('alert')
        <header class="container-fluid" >
            <div class="row p-3 ">
                <div class="col-3">
                    <h3 class="text-white" >Your profile</h3>
                </div>
                <div class="col-6"></div>
                <div class="col-3 text-center ">
                    <a href="{{ route('home') }}" class="btn btn-white" >BACK</a>
                </div>
            </div>
        </header>
        <main>
            <div class="w-50 mx-auto p-3 border border-2 rounded-2" id="data" >
                <h1>{{ $user->name }}</h1>
                <p>{{ $user->email }}</p>
                <div class="d-flex justify-content-between">
                    <a class="btn btn-warning" href="{{ route('updateUser') }}">Update</a>
                    <a class="btn btn-danger" href="{{ route('deleteUser') }}">Delete</a>
                </div>
            </div>
        </main>
        <footer>
            <!-- place footer here -->
        </footer>
        <!-- Bootstrap JavaScript Libraries -->
        <script
            src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
            integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
            crossorigin="anonymous"
        ></script>

        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
            integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
            crossorigin="anonymous"
        ></script>
    </body>
</html>
