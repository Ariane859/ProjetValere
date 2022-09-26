 <?php 
    session_start();
    require("connexion.php");
    $message="";
    if (isset($_POST['submit']) && isset($_POST['username'])&&isset($_POST['password'])) 
    {
        $input_username=trim($_POST['username']);
        $input_password=hash('sha256',trim($_POST['password']));
        $date=date('Y-m-d H:i:s');
        $sqlSelect="SELECT distinct * From users where login='$input_username' and password='$input_password'";
        $statement=$pdo->prepare($sqlSelect);
        $statement->execute(array(
            ":login"=>$input_username,
            ":password"=>$input_password,
        ));
        $data = $statement->fetchAll();
        if (count($data)==null) {
            $message = "Invalid Username or Password!";
            header("location: login.php");
        }
        else {
            $idUtil=$data['0']['idPersonne'];
            $username=$data['0']['login'];
            $role=$data['0']['roles'];
        
            $_SESSION['idUtil']=$idUtil;
            $_SESSION['username']=$username;
            $_SESSION['role']=$role;

            header("location: dashboard.php");
        }

        // if($result)
        // {
        //     header("location: dashboard.php");
        // }
        // else
        // {
        //     echo "Oops! Something went wrong. Please try again later.";
        // }
    }
?>
<html>
    <head>
        <title>Se connecter</title>
        <meta name="title" content="example" />
        <!-- <link rel="stylesheet" href="www.example.com/css/css.css" type="text/css" /> -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.css" />
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css">

        <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> -->
        <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"> -->
        <link rel="stylesheet" href="css/login.css">
        <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script> -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    </head>
    <body>
        <div class="main">
            <section class="signup">
                <div class="container">
                    <div class="signup-content">
                        <form id="signup-form" action="" method="post">
                            <h2 class="form-title">CONNEXION</h2>
                            <div class="form-group">
                                <input type="text" class="form-input" name="username" id="username" placeholder="Username" required/>
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-input" name="password" id="password" placeholder="Mot de passe" required/>
                                <!-- <i class="fa fa-eye-slash field-icon toggle-password" style="font-size:16px;cursor:pointer"></i> -->
                            </div>
                            <!-- <div class="form-group">
                                <input type="checkbox" name="agree-term" id="agree-term" class="agree-term" />
                                <label for="agree-term" class="label-agree-term"><span><span></span></span>I agree all statements in  <a href="#" class="term-service">Terms of service</a></label>
                            </div> -->
                            <div class="form-group">
                                <input type="submit" name="submit" id="submit" class="form-submit" value="Se connecter"/>
                            </div>
                        </form>
                        <p class="text-center">
                            Vous n'avez pas de compte ? <a href="register.php" class="">S'inscrire</a>
                        </p>
                    </div>
                </div>
            </section>
        </div>
    </body>
    <!-- <script>
        function getIp(callback) {
        fetch('https://ipinfo.io/json?token=e6774aceb271af', { headers: { 'Accept': 'application/json' }})
        .then((resp) => resp.json())
        .catch(() => {
            return {
            country: 'us',
            };
        })
        .then((resp) => callback(resp.country));
        }
        const phoneInputField = document.querySelector("#tel");
        const phoneInput = window.intlTelInput(phoneInputField, {
        allowDropdown: true,
        preferredCountries: ["bj"],
        separateDialCode: true,
        initialCountry: "auto",
        geoIpLookup: getIp,
        utilsScript:
        "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js",
        });
        const info = document.querySelector(".alert-info");

        function process(e) {
        e.preventDefault();
        const phoneNumber = phoneInput.getNumber();

        info.style.display = "";
        info.innerHTML = `Phone number in E.164 format: <strong>${phoneNumber}</strong>`;
        }
        // $(".toggle-password").click(function() {
        //     $(this).toggleClass("fa fa-eye");
        //     var input = $($(this).attr("toggle"));
        //     if (input.attr("type") == "password") {
        //     input.attr("type", "text");
        //     } else {
        //     input.attr("type", "password");
        //     }
        // });
    </script> -->
</html>

