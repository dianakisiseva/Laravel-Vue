<template>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Update task</h4>
                </div>
                <div class="card-body">
                    <form @submit.prevent="update">
                        <div class="row">
                            <div class="col-12 mb-2">
                                <div class="form-group">
                                    <label>Title</label>
                                    <input type="text" class="form-control" v-model="task.title">
                                </div>
                                <h6 class="text-danger" v-for="error in errors">{{error.title ? error.title[0] : '' }}</h6>

                            </div>
                            <div class="col-12 mb-2">
                                <div class="form-group">
                                    <label>Expiration date</label>
                                    <input type="text" class="form-control" v-model="task.expiration_date">
                                </div>
                                <h6 class="text-danger" v-for="error in errors">{{error.expiration_date ? error.expiration_date[0] : '' }}</h6>

                            </div>
                            <div class="col-12 mb-2">
                                <div class="form-group">
                                    <label>Description</label>
                                    <input type="text" class="form-control" v-model="task.description">
                                </div>
                            </div>
                            <div class="col-12 mb-2">
                                <button type="submit" class="btn btn-primary">Update</button>
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
    name:"update-task",
    data(){
        return{
            task:{
                title:"",
                expiration_date: "",
                description:"",
                _method:"patch"
            },
            errors: []

        }
    },
    mounted(){
        this.showTask()
    },
    methods:{
        async showTask(){
            await this.axios.get('/api/task/'+this.$route.params.id).then(response=>{
                const { title, description, expiration_date} = response.data
                this.task.title = title
                this.task.expiration_date = expiration_date
                this.task.description = description
            })
        },
        async update(){
            this.errors = [];

            await this.axios.post('/api/task/'+this.$route.params.id, this.task).then(response=>{
                this.$router.push({name:"taskList"})
            }).catch(error=>{
                this.errors.push(error.response.data.errors)
            })
        }
    }
}
</script>
