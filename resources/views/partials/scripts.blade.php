
    <!-- latest jquery-->
    <script src="{{ asset('/js/jquery-3.3.1.min.js') }}"></script>

    <!-- fly cart ui jquery-->
    <script src="{{ asset('/js/jquery-ui.min.js') }}"></script>

    <!-- exitintent jquery-->
    <script src="{{ asset('/js/jquery.exitintent.js') }}"></script>
    <script src="{{ asset('/js/exit.js') }}"></script>

    <!-- popper js-->
    <script src="{{ asset('/js/popper.min.js') }}"></script>

    <!-- slick js-->
    <script src="{{ asset('/js/slick.js') }}"></script>

    <!-- rSlider -->
    <script src="{{ asset('/js/rSlider.min.js') }}"></script>

    <!-- menu js-->
    <script src="{{ asset('/js/menu.js') }}"></script>

    <!-- lazyload js-->
    <script src="{{ asset('/js/lazysizes.min.js') }}"></script>

     <!-- Bootstrap js-->
    <script src="{{ asset('/js/bootstrap.js') }}"></script>

    <!-- Bootstrap Notification js-->
    <script src="{{ asset('/js/bootstrap-notify.min.js') }}"></script>

    <!-- Fly cart js-->
    <script src="{{ asset('/js/fly-cart.js') }}"></script>

    <!-- Theme js-->
    <script src="{{ asset('/js/script.js') }}"></script>

    @livewireScripts

    <script>
        $(window).on('load', function () {
            // setTimeout(function () {
            //     $('#exampleModal').modal('show');
            // }, 2500);

            var add2Cart = $('.addtocart');
            var removeFromCart = $('.removeFromCart');

            add2Cart.on('click', function () {
                var product = $(this).data('product');
                axios.post('/shop/add-to-cart-api', {
                    product_id: product.id,
                }).then((response) => {
                    showSuccessToast("Item successfully added to your cart");
                    Livewire.emit('updateCart');
                }, (error) => {
                    console.log(error);
                    showErrorToast(error);
                });
            });

            removeFromCart.on('click', function () {
                var rowId = $(this).data('row-id');
                axios.post('/shop/remove-from-cart-api', {
                    row_id: rowId,
                }).then((response) => {
                    showSuccessToast("Item successfully removed from your cart");
                    Livewire.emit('updateCart');
                }, (error) => {
                    console.log(error);
                    showErrorToast(error);
                });
            });
        });

        function showSuccessToast(msg){
            $.notify({
            icon: 'fa fa-check',
            title: 'Success!',
            message: msg
            },{
                element: 'body',
                position: null,
                type: "success",
                allow_dismiss: true,
                newest_on_top: false,
                showProgressbar: true,
                placement: {
                    from: "top",
                    align: "right"
                },
                offset: 20,
                spacing: 10,
                z_index: 1031,
                delay: 5000,
                animate: {
                    enter: 'animated fadeInDown',
                    exit: 'animated fadeOutUp'
                },
                icon_type: 'class',
                template: '<div data-notify="container" class="col-xs-11 col-sm-3 alert alert-{0}" role="alert">' +
                '<button type="button" aria-hidden="true" class="close" data-notify="dismiss">×</button>' +
                '<span data-notify="icon"></span> ' +
                '<span data-notify="title">{1}</span> ' +
                '<span data-notify="message">{2}</span>' +
                '<div class="progress" data-notify="progressbar">' +
                '<div class="progress-bar progress-bar-{0}" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div>' +
                '</div>' +
                '<a href="{3}" target="{4}" data-notify="url"></a>' +
                '</div>'
            });
        }
        function showErrorToast(msg){
            $.notify({
            icon: 'fa fa-cancel',
            title: 'Error!',
            message: msg
            },{
                element: 'body',
                position: null,
                type: "error",
                allow_dismiss: true,
                newest_on_top: false,
                showProgressbar: true,
                placement: {
                    from: "top",
                    align: "right"
                },
                offset: 20,
                spacing: 10,
                z_index: 1031,
                delay: 5000,
                animate: {
                    enter: 'animated fadeInDown',
                    exit: 'animated fadeOutUp'
                },
                icon_type: 'class',
                template: '<div data-notify="container" class="col-xs-11 col-sm-3 alert alert-{0}" role="alert">' +
                '<button type="button" aria-hidden="true" class="close" data-notify="dismiss">×</button>' +
                '<span data-notify="icon"></span> ' +
                '<span data-notify="title">{1}</span> ' +
                '<span data-notify="message">{2}</span>' +
                '<div class="progress" data-notify="progressbar">' +
                '<div class="progress-bar progress-bar-{0}" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div>' +
                '</div>' +
                '<a href="{3}" target="{4}" data-notify="url"></a>' +
                '</div>'
            });
        }

        function openSearch() {
            document.getElementById("search-overlay").style.display = "block";
        }

        function closeSearch() {
            document.getElementById("search-overlay").style.display = "none";
        }
    </script>

    @stack('custom-scripts')
