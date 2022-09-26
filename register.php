<?php 
    session_start();
    require("connexion.php");

    if (isset($_POST['submit']) && isset($_POST['name']) && isset($_POST['prename']) && isset($_POST['username']) && isset($_POST['email']) &&
    isset($_POST['password']) && isset($_POST['re_password'])) 
    {
        $input_name=trim($_POST['name']);
        $input_prename=trim($_POST['prename']);
        $input_username=trim($_POST['username']);
        $input_email=trim($_POST['email']);
        $input_password=hash('sha256',trim($_POST['password']));
        $input_repassword=hash('sha256',trim($_POST['re_password']));
        $input_tel=trim($_POST['tel']);
        $date=date('Y-m-d H:i:s');
        // if (!filter_var($input_name,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>"/^[a-zA-Z'\s]*$/")))) 
        // {
        //     var_dump($input_name);
        // }
        // else {
        //     echo 'Tout va bien';
        // }
        $sqlInsert="INSERT INTO users (nomPersonne,prenomPersonne,login,password,ancienMotDePasse,EmailUtil,Telephone,EstActif,dateCreation,dateModification,supprimer,roles)VALUES(:nomPersonne,:prenomPersonne,:login,:password,:ancienMotDePasse,:EmailUtil,:Telephone,:EstActif,:dateCreation,:dateModification,:supprimer,:roles)";
        $statement=$pdo->prepare($sqlInsert);
        
        $result=$statement->execute(array(
            ":nomPersonne"=>$input_name,
            ":prenomPersonne"=>$input_prename,
            ":login"=>$input_username,
            ":password"=>$input_password,
            ":ancienMotDePasse"=>'',
            ":EmailUtil"=>$input_email,
            ":Telephone"=>$input_tel,
            ":EstActif"=>1,
            ":dateCreation"=>$date,
            ":dateModification"=>$date,
            ":supprimer"=>0,
            "roles"=>'ADMIN'));

        if($result)
        {
            header("location: dashboard.php");
            
            // echo "<div class='success'><h3>Vous êtes inscrit avec succès.</h3></div>";
            //exit();
        }
        else
        {
            echo "Oops! Something went wrong. Please try again later.";
        }
    }
?>
<html>
    <head>
        <title>S'inscrire</title>
        <meta name="title" content="example" />
        <!-- <link rel="stylesheet" href="www.example.com/css/css.css" type="text/css" /> -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.css" />
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css">

        <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> -->
        <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"> -->
        <link rel="stylesheet" href="css/style.css">
        <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script> -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    </head>
    <body>
        <div class="main">
            <section class="signup">
                <!-- <img src="images/signup-bg.jpg" alt=""> -->
                <div class="container">
                    <div class="signup-content">
                        <form id="signup-form" action="" method="post">
                            <h2 class="form-title">Create account</h2>
                            <div class="row">
                                <div class="col-md-6">
                                <div class="form-group">
                                <input type="text" class="form-input" name="name" id="name" placeholder="Nom" required/>
                            </div>
                                </div>
                                <div class="col-md-6">
                                <div class="form-group">
                                <input type="text" class="form-input" name="prename" id="prename" placeholder="Prénom" required/>
                            </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-input" name="username" id="username" placeholder="Username" required/>
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-input" name="email" id="email" placeholder="Email" required/>
                            </div>
                            <div class="form-group">
                                <input type="tel" class="form-input" name="tel" id="tel" placeholder="Tel" required/>
                                <div class="alert alert-danger" style="display: none;"></div>
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-input" name="password" id="password" placeholder="Mot de passe" required/>
                                <!-- <i class="fa fa-eye-slash field-icon toggle-password" style="font-size:16px;cursor:pointer"></i> -->
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-input" name="re_password" id="re_password" placeholder="Confirmez mot de passe"/>
                                <!-- <i class="fa fa-eye-slash field-icon-confirm toggle-password" style="font-size:16px;cursor:pointer"></i> -->
                            </div>
                            <!-- <div class="form-group">
                                <input type="checkbox" name="agree-term" id="agree-term" class="agree-term" />
                                <label for="agree-term" class="label-agree-term"><span><span></span></span>I agree all statements in  <a href="#" class="term-service">Terms of service</a></label>
                            </div> -->
                            <div class="form-group">
                                <input type="submit" name="submit" id="submit" class="form-submit" value="S'inscrire"/>
                            </div>
                        </form>
                        <p class="text-center">
                            Vous avez déjà un compte ? <a href="login.php" class="">Se connecter</a>
                        </p>
                    </div>
                </div>
            </section>
        </div>
    </body>
    <script>
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
    </script>
</html>

