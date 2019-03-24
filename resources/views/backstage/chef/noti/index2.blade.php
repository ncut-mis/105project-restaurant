<div class="form-group">
    <div class="form-cgroup">
        <label for="">Blog Title</label>
        <input class="form-control" type="text" id="username">
    </div>
    <div class="form-cgroup">
        <label for="">Blog Description</label>
        <input class="form-control" type="text" id="message">
    </div>
    <input class="btn btn-info" type="button" id="btnGetMessage" value="Get Message">
    <ul class="list-group" id="comment"></ul>
</div>
<!DOCTYPE html>
<html lang="en-US">
<head>
    <title>Hello World!</title>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://www.gstatic.com/firebasejs/5.9.1/firebase.js"></script>
    <script>
        var dnperm = document.getElementById('dnperm');
        dnperm.addEventListener('click',function (e) {
            e.preventDefault();
            if(!window.Notification)
            {
                alert('Not Supported');
            }
            else
            {
                Notification.requestPermission().then(function (p) {
                    if(p ==='denied')
                    {
                        alert('You denied to show Notification');
                    }
                    else if(p === 'granted')
                    {
                        alert('You allowed to show Notification');
                    }
                })
            }
        });

        function writeUserData(name,message)
        {
            database.push().set(
            {
                username:name,
                message: message
            });
        }
        function removeUserData(userId)
        {
            firebase.database().ref('/users'+userId).remove();
        }
        function rendrUI(obj)
        {
            var i = 0;
            var html='';
            var keys = Object.keys(obj);
            for(i=0;i<keys.length; i++)
            {
                html+="<li><b><i>"+obj[keys[i]].username+"</li></b> says:"<obj[keys[i]].message+"<li>";
            }
            $('#comment').html(html);
        }
        $('#btnGetMessage').click(function()
        {
            writeUserData($('#username').val() , $('#message').val());
            $('#username').val('');
            $('#message').val('');
        });

        $(document).ready(function ()
        {
            $('body').on('click','#btnRemove',function ()
            {
                removeUserData($(this).data('id'));
            })
        });

        // Initialize Firebase
        var config = {
            apiKey: "AIzaSyCTnmGUSXbyvJKbrmIcXtXMze3mecGKF-A",
            authDomain: "project-restaurants-ncut.firebaseapp.com",
            databaseURL: "https://project-restaurants-ncut.firebaseio.com",
            projectId: "project-restaurants-ncut",
            storageBucket: "project-restaurants-ncut.appspot.com",
            messagingSenderId: "390650303893"
        };
        firebase.initializeApp(config);

        var database = firebase.database().ref().child("/users/");

        database.on('value',function (snapshot)
        {
            rendrUI(snapshot.val());
        });

        database.on('child_added',function (data)
        {
            if(Notification.Permission!=='default')
            {
                var notify;
                notify = new Notification('CodeWife - '+data.val().username,{
                    'body':data.val().message,
                    'icon':'bell.png',
                    'tag':data.getKey()
                    });
                notify.onclick=function () {
                    alert(this.tag);
                }
            }
            else
            {
                alert('please allow the notification first');
            }
        });

    </script>
</head>
