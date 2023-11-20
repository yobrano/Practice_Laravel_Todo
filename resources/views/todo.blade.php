<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todo</title>
    <style>
        body {
            margin: 0 2rem;
            font-family: "arial";
        }

        .header {
            border: 3px solid black;
        }

        .page-header {
            margin: 1em 0em 0.5em 0em;
            padding: 0;
        }

        main {
            border: 3px solid black;
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;            
        }

        .main-content {
            border: 3px solid black;
            height: 100%;
            flex-grow: 8;
        }

        .form-wrapper {
            border: 3px solid black;
        }

        .todo-form {
            width: 60%;
            display: flex;
            flex-direction: column;
        }

        .todo-list {
            border: 3px solid black;
        }

        .right-side-content {
            border: 3px solid black;
            flex-grow: 4;
        }

        footer {
            border: 3px solid black;
            padding: 2em;
            display: flex;
            flex-direction: column;
            text-align: center;
        }
    </style>
</head>

<body>
    <section class="header">

        <nav>
            <\Logo & nav\>
        </nav>
        <h2 class="page-header"> Todo </h2>
        Hello from todo.
    </section>

    <main>
        <article class="main-content">
            <div class="form-wrapper">
                <h4 class="content-title"> Todo Form </h4>
                <form action="/todo-create" method="POST" class="todo-form">
                    @csrf
                    <input type="text" placeholder="label" name="label">
                    <label> start time </label>
                    <span>
                        <input type="date" name="start_date">
                        <input type="time" name="start_time">
                    </span>
                    <label> end time </label>
                    <span>
                        <input type="date" name="end_date">
                        <input type="time" name="end_time">
                    </span>
                    <input type="text" placeholder="tag1; tag2; tag3" name="tags">
                    <textarea  name="description" placeholder="description" id="description"></textarea>

                    <button type="submit"> sub Meat </button>
                </form>
            </div>

            <div class="todo-list">
                <h4 class="content-title"> Todo Items </h4>
                <ul>
                    @foreach ($todos as $todo)
                        <li> {{ $todo }}</li>
                    @endforeach
                </ul>
            </div>
            
        </article>

        <aside class="right-side-content">
            <ul>
                @foreach ($todos as $todo)
                    <li> {{ $todo }}</li>
                @endforeach
            </ul>
        </aside>

    </main>

    <footer>
        &copy; 2021-{{ date('y') }}
    </footer>
</body>

</html>
