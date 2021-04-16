
<!DOCTYPE html>
<html>
    
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PWLife Login system</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
    <link rel="stylesheet" href="css/bulma.min.css" />
    <link rel="stylesheet" type="text/css" href="css/login.css">
    <!-- <link rel="stylesheet" type="text/css" href="css/style.css"> -->
</head>

<body>
    <section class="hero is-success is-fullheight">
        <div class="hero-body">
            <div class="container has-text-centered">
                <div class="column is-4 is-offset-4">
                    <h3 class="title has-text-grey">Admin Login System</h3>
                    <h3 class="title has-text-grey"><a href="https://pwlife.000webhostapp.com/" target="_blank">PWLife official channel</a></h3>
                    <!-- Input field for user -->
                    <div class="box">
                        <form action="authentication.php" method="POST" autocomplete="off" autocomplete="new-password">
                            <div class="field">
                                <div class="control">
                                    <input name="username" type="text" class="input is-large" placeholder="Admin Name here" autofocus="" autocomplete="new-password" autocomplete="off">
                                </div>
                            </div>
                      <!-- Input field for password -->
                            <div class="field">
                                <div class="control">
                                    <input name="password" class="input is-large" type="password" placeholder="Your Admin password"  autocomplete="new-password" autocomplete="off">
                                </div>
                            </div>
                            <button type="submit" class="button is-block is-link is-large is-fullwidth" name="acao">Login</button>
                        </form>
                    </div>
                </div>
            </div><hr>
        </div>
    
     <footer id="footer" class="footer">
          <span>Developed By <a href="https://www.linkedin.com/in/bruno-mendanha/" target="_blank"><strong>Bruno Mendanha</strong></a><span class="far fa-copyright"></span> 2021 All rights reserved.</span></br>
      </footer>
    </section>
</body>
</html>