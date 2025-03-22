<!doctype html>
<html lang="en">
    <head>
        <title>home</title>
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
            body {
                background-color: gray;
            }
            .w-length {
                width: 90%;

            }
            .bg-black {
                background-color: black;
            }
            .btn-white {
                background-color: white;
                color:black;
            }
            #btnsHeader {
                margin-top: 0.2%;
            }
            .btn-blue {
                background-color: blue;
                color: black;
            }
            #NoTask{
                margin-top: 15%;

            }
        </style>
        @php
            use Carbon\Carbon;
        @endphp
    </head>

    <body>
        @include('alert')
        <header>
            <div class="row container-fluid bg-black p-2" >
                <div class="col-3 text-center">
                    <h3 class="text-white" >My Tasks</h3>
                </div>
                <div class="col-6"></div>
                <div class="col-3 text-center " id="btnsHeader" >
                    <a class="btn btn-white " href="{{ route('createTask') }}">NEW TASK</a>
                    <a class="btn btn-white " href="{{ route('getUser') }}">PROFILE</a>
                    <a class="btn btn-white " href="{{ route('logout') }}">LOGOUT</a>

                </div>
            </div>
        </header>
        <main>
            <div class="w-length mx-auto  p-2">
                @forelse ($tasks as $task)
                    <div class="row text-center border border-2 rounded-2 my-3">
                        <div class="col-3">
                            <p>{{ $task['title'] }}</p>
                        </div>
                        <div class="col-4">
                            <p>{{ $task['description'] }}</p>
                        </div>
                        <div class="col-1 mt-3">
                            @if ($task['completed'])
                                <p>done!!</p>
                            @else
                                <p>Not done!!!</p>
                            @endif
                        </div>
                        <div class="col-1 mt-3">
                            <p>{{ Carbon::parse($task['created_at'])->format('d/m/Y') }}</p>
                        </div>
                        <div class="col-3 mt-3">
                            <a class="btn btn-sm btn-danger" href="{{ route('deleteTask', ["id" => $task["id"] ]) }}">DELETE</a>
                            <a class="btn btn-sm btn-warning" href="{{ route('updateTask', ["id" => $task["id"] ]) }}">UPDATE</a>
                            <a class="btn btn-sm btn-blue" href="{{ route('changeStatus', ["id" => $task["id"] ]) }}">change Status</a>
                        </div>
                    </div>
                @empty
                    <div class="border p-5 text-center mx-auto w-25 border-2 rounded-2 " id="NoTask" >
                        <h3>NO TASKS</h3>
                    </div>
                @endforelse

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
