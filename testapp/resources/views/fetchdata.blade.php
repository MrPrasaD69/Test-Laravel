<html>
    <head>
        <title>API</title>
    </head>
    <body>
        <div>
            <h2>API DATA HERE</h2>
            <ul>
                @foreach($value as $item)
                    <li><h3>{{ $item['title'] }}</h3><p>{{ $item['body'] }}</p></li>
                @endforeach
            </ul>
        </div>
    </body>
</html>