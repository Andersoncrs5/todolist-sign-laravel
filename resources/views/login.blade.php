<!doctype html>
<html lang="en">
    <head>
        <title>login</title>
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
            #form {
                margin-top: 13%;
            }
        </style>

    </head>

    <body>
        <header>
            <!-- place navbar here -->
        </header>
        @include('alert')
        <main>
            <div class="w-50 mx-auto p-3 border border-2 rounded-2" id="form" >
                <form action="{{route('logining')}}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input
                                type="email"
                                class="form-control @error('email') is-invalid @enderror"
                                name="email"
                                placeholder="abc@mail.com"
                                value="{{ old('email') }}"
                            />
                            @error('email')
                                <div class="alert alert-danger p-1 mt-1 text-center">
                                    <small>{{ $message }}</small>
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Password</label>
                            <input
                                type="password"
                                class="form-control @error('password') is-invalid @enderror"
                                name="password"
                            />
                            @error('password')
                            <div class="alert alert-danger p-1 mt-1 text-center">
                                    <small>{{ $message }}</small>
                                </div>
                            @enderror
                        </div>

                        <div class="d-flex justify-content-between">
                            <button type="submit" class="btn btn-success">Submit</button>
                            <a class="btn btn-primary" href="{{ route('home') }}">BACK</a>
                        </div>
                    </div>
                </form>
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
