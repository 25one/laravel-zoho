<template>
   <div>
        <div class="form-group row">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <h5>Deal Name</h5>
                <input type="text" class="form-control" name="deal_name" value="" autofocus v-model="dealName">
            </div>
        </div> 
        <div class="form-group row">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <h5>Deal Stage</h5>
                <select class="form-control" v-model="stage">
                   <option value="Qualification">Qualification</option>
                   <option value="Needs Analysis">Needs Analysis</option>
                   <option value="Value Proposition">Value Propositionn</option>
                   <option value="Identify Decision Makers">Identify Decision Makers</option>   
                   <option value="Proposal/Price Quote">Proposal/Price Quote</option>
                   <option value="Negotiation/Review">Negotiation/Review</option>
                   <option value="Closed Won">Closed Won</option>
                   <option value="Closed Lost">Closed Lost</option>
                   <option value="Closed Lost to Competition">Closed Lost to Competition</option>                                                        
                </select>
            </div>
        </div>         
        <div class="form-group row">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <h5>Account Name</h5>
                <input type="text" class="form-control" name="account_name" value="" v-model="accountName">
            </div>
        </div>  
        <div class="form-group row">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <h5>Account Website<span class="text-danger">(http://site.com)</span></h5>
                <input type="text" class="form-control" name="account_website" value="" v-model="website">
            </div>
        </div>  
        <div class="form-group row">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <h5>Account Phone<span class="text-danger">(111-11-11)</span></h5>
                <input type="text" class="form-control" name="account_phone" value="" v-model="phone">
            </div>
        </div>
        <div class="form-group row">
            <div class="col-md-4"></div>
            <div class="col-md-4">
               <button class="btn btn-primary form-control" @click="add">Save</button>
            </div>
        </div>    
   </div>   
</template>

<script>
    import axios from 'axios';
    import Swal from 'sweetalert2'

    export default {
        data: function() {
           return {
              access_token: window.access_token,
              dealName: '',
              stage: 'Qualification',
              accountName: '',
              website: '',
              phone: '',
           }
        },
        mounted() {
           console.log(window.access_token);
        },
        methods: {
           add() {
             event.preventDefault();

             let dataRequest = {
                access_token: this.access_token,
                dealName: this.dealName,
                stage: this.stage,
                accountName: this.accountName,
                website: this.website,
                phone: this.phone,
             }

             let self = this;
             axios
              .post('/add', dataRequest)
                .then(function (resp) {
                    console.log(resp.data);

                    self.dealName = '';
                    self.stage = 'Qualification';
                    self.accountName = '';
                    self.website = '';
                    self.phone = '';

                    Swal.fire({
                       icon: 'success',
                       text: 'Account and Deal were created!',
                    });
                })
                .catch(function (resp) {
                     console.log(resp.response);

                     let errors = resp.response.data.errors;
                     let titleErrors = '';
                     for (let i in errors) {
                        titleErrors += errors[i];
                     }
  
                     Swal.fire({
                        icon: 'error',
                        text: titleErrors,
                     });                     
                });            
           },    
        },
    }
</script>
