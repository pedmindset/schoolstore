<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="multikart">
    <meta name="keywords" content="multikart">
    <meta name="author" content="multikart">
    <link rel="icon" href="../images/favicon/1.png" type="image/x-icon" />
    <link rel="shortcut icon" href="../images/favicon/1.png" type="image/x-icon" />
    <title>SchoolStore</title>

    <!--Google font-->
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900" rel="stylesheet">

    <!-- Icons -->
    <link rel="stylesheet" type="text/css" href="../css/fontawesome.css">
    <link rel="stylesheet" type="text/css" href="../css/app.css">

    <!--Slick slider css-->
    <link rel="stylesheet" type="text/css" href="../css/slick.css">
    <link rel="stylesheet" type="text/css" href="../css/slick-theme.css">

    <!-- Animate icon -->
    <link rel="stylesheet" type="text/css" href="../css/animate.css">

    <!-- Themify icon -->
    <link rel="stylesheet" type="text/css" href="../css/themify-icons.css">

    <!-- Bootstrap css -->
    <link rel="stylesheet" type="text/css" href="../css/bootstrapcss.css">

    <!-- Theme css -->
    <link rel="stylesheet" type="text/css" href="../css/color1.css" media="screen" id="color">

    <script src="{{ asset('js/app.js') }}"></script>

<style>
    .image-box__overlay {
        background: rgba(0, 0, 0, 0.8);
        z-index: 2;
        }

</style>

</head>

<body>
    <div id="app" class="template-password ">
        <div class="image-box__overlay">
        <div class="container ">
            <div id="container" class="text-center">
                <div>
                    <div id="login">
                        <div>
                            <div class="logo mb-4">
                                <a href="../" class="text-5xl text-white">
                                    SchoolShop
                                </a>
                            </div>
                            <h2 class="mb-3">
                                Will be Opening Soon!
                            </h2>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <form action="#" class="theme-form">
                                    <div class="col-md-12 mt-2">
                                        <h3>Enter Your Email: </h3>
                                    </div>
                                    <div class="form-row">
                                        <div class="col-md-12">
                                            <input v-model="email" required type="email" name="email" id="email" class="form-control"
                                                autofocus="">
                                        </div>
                                        <div class="col-md-12">
                                            <div class="actions">
                                                <button v-on:click.prevent="submitContact" type="submit" class="btn btn-solid focus:text-gray-700">notify me</button>
                                            </div>
                                        </div>
                                    </div>

                                </form>
                            </div>
                        </div>
                        <div id="footer" class="mt-4 text-white">
                            <div id="owner">
                                Are you the Admin? <a href="../nova">Log in here</a> 
                            </div>
                        </div>
                    </div>
                    <div id="powered">
                        <p>© 2020, Powered by SchoolStore.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

    <!-- latest jquery-->
    <script src="../js/jquery-3.3.1.min.js"></script>

    <!-- menu js-->
    <script src="../js/menu.js"></script>

    <!-- lazyload js-->
    <script src="../js/lazysizes.min.js"></script>

    <!-- popper js-->
    <script src="../js/popper.min.js"></script>

    <!-- slick js-->
    <script src="../js/slick.js"></script>

    <!-- Bootstrap js-->
    <script src="../js/bootstrap.js"></script>

    <!-- Bootstrap Notification js-->
    <script src="../js/bootstrap-notify.min.js"></script>

    <!-- Theme js-->
    <script src="../js/script.js"></script>

    <script>
        function openSearch() {
            document.getElementById("search-overlay").style.display = "block";
        }

        function closeSearch() {
            document.getElementById("search-overlay").style.display = "none";
        }
    </script>

    <script>
        const app = new Vue({
        el: '#app',
        data: function(){
            return {
                email: '',
            }
        },

        methods: {
            submitContact: function(){
            var self = this;
            const checkEmail = validateEmail.validate(this.email);              
            if(checkEmail === false){
                return Vue.swal.fire({
                icon: 'error', 
                title: 'Validation',
                text: 'Enter a valid email',
                toast: true,
                timer: 5000,
                position: 'top-end',
                timerProgressBar: true,
                })
            }

            axios.post('../newsletters/signup', {
                email: this.email
            }).then(function(response){
                self.email = '';
                return Vue.swal.fire({
                    icon: 'success', 
                    title: 'Received',
                    text: 'Contact Received',
                    toast: true,
                    timer: 10000,
                    position: 'top-end',
                    timerProgressBar: true,
                })
            }).catch(function(error){
                console.log(error.response);
                
                return Vue.swal.fire({
                    icon: error.response.data.status, 
                    title: 'Try Again',
                    text: error.response.data.message,
                    toast: true,
                    timer: 10000,
                    position: 'top-end',
                    timerProgressBar: true,
                })
            })
            },
        }
    })
    </script>
</body>

</html>