<div class="light-layout">
    <div class="container">
        <section class="small-section border-section border-top-0">
            <div class="row">
                <div class="col-lg-6">
                    <div class="subscribe">
                        <div>
                            <h4>KNOW IT ALL FIRST!</h4>
                            <p>Never Miss Anything From Multikart By Signing Up To Our Newsletter.</p>
                        </div>
                    </div>
                </div>
                <div id="footerapp" class="col-lg-6">
                    <form
                        action="#"
                        class="form-inline subscribe-form auth-form needs-validation" method="post"
                        id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" target="_blank">
                        <div class="form-group mx-sm-3">
                            <input type="text" v-model="email" class="form-control" name="email" id="email"
                                placeholder="Enter your email" required="required">
                        </div>
                        <button v-on:click.prevent="submitContact()" type="submit" class="btn btn-solid" id="mc-submit">subscribe</button>
                    </form>
                </div>
            </div>
        </section>
    </div>
</div>

<script>
    const app = new Vue({
       el: '#footerapp',
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
             return Swal.fire({
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
               return Swal.fire({
                 icon: 'success',
                 title: 'Recieved',
                 text: 'Contact Received',
                 toast: true,
                 timer: 10000,
                 position: 'top-end',
                 timerProgressBar: true,
               })
           }).catch(function(error){
             console.log(error.response);

               return Swal.fire({
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
