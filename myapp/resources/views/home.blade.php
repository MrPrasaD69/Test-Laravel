<html>
    <head>
        <title>Home Page</title>
    </head>
    <body>

        @auth
            <h2>Welcome you're logged in.</h2>
            <form action="/logout" method="post">
                @csrf
                <button>LOG OUT</button>
            </form>

            <div class="post" style="border : 3px solid black;">
                <h2>Create New Posts</h2>
                <form action="create-post" method="post">
                    @csrf
                    <input type="text" name="title" placeholder="Your Title"/>
                    <textarea name="body" placeholder="Write Here..." cols="50"></textarea>
                    <button>SAVE POST</button>
                </form>
            </div>

            <div class="post" style="border : 3px solid black;">
                <h2>All Posts</h2>
                @foreach($posts as $post)
                <div style="background-color:grey">
                    <h3>{{$post['title']}}</h3>
                    {{$post['body']}}
                </div>
                @endforeach
            </div>

        @else
        <h2>Registration Page</h2>
        <div class="regbox" style="border : 3px solid black;">
            <form action="/register" method="post">
                @csrf
                <input type="text" placeholder="Name" name="name"/>
                <input type="text" placeholder="Email" name="email"/>
                <input type="password" placeholder="Password" name="password"/>
                <button>Register</button>
            </form>
        </div>

        <h2>Log IN Page</h2>
        <div class="logbox" style="border : 3px solid black;">
            <form action="/login" method="post">
                @csrf
                <input type="text" placeholder="Name" name="loginname"/>
                <input type="password" placeholder="Password" name="loginpassword"/>
                <button>LOG IN</button>
            </form>
        </div>
        @endauth
        
    </body>
</html>



<style>
.regbox{
    background-color: lightcyan;
    display: flex;
    justify-content: center;
    align-items: center;
    position: relative;
    height: 10vh;
}

.logbox{
    background-color: lightsalmon;
    display: flex;
    justify-content: center;
    align-items: center;
    position: relative;
    height: 10vh;
}
</style>