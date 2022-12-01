<template>
    <div class="row justify-content-center">
        <div class="col-6 ">

            <div class="card">
                <div class="card-header">
                    <h4>Login</h4>
                </div>
                <div class="card-body">

                    <form @submit.prevent="create">
                        <div class="row">
                            <p v-if="errors.length">
                            <ul class="list-group">
                                <li v-for="error in errors" class="list-group-item list-group-item-danger">{{ error }}</li>
                            </ul>

                            <div class="col-12">
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" class="form-control" v-model="user.email">
                                </div>
                            </div>
                            <div class="col-12 mb-2">
                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="password" class="form-control" v-model="user.password">
                                </div>
                            </div>
                            <div class="col-12 ">
                                <button type="submit" class="btn btn-primary">Login</button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</template>
<script>
export default{
    name:"add-category",
    data(){
        return{
            user:{
                email:"",
                password:""
            },
            errors: []
        }
    },
    methods:{


        async create(){
            this.errors = [];
            if (!this.user.email) {
                this.errors.push('Email required.');
            }
            if (!this.user.password) {
                this.errors.push('Password required.');
            }

            await this.axios.post('/login', this.user).then(response=>{
                if(response.data.errors)
                    this.errors.push(response.data.errors);

                if(response.data.status === 'success')
                    this.$router.push({name:"taskList"})
            });
        }
    }
}
</script>
