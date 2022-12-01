<template>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Add task</h4>
                </div>
                <div class="card-body">
                    <form @submit.prevent="create">
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
                                    <label>Description</label>
                                    <input type="text" class="form-control" v-model="task.description">
                                </div>
                            </div>
                            <div class="col-12 mb-2">
                                <button type="submit" class="btn btn-primary">Save</button>
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
    name:"add-task",
    data(){
        return{
            task:{
                title:"",
                description:"",
                expiration_date:""
            },
            errors: []
        }
    },
    methods:{
        async create(){
            this.errors = [];

            await this.axios.post('/api/task', this.task).then(response=>{
                this.$router.push({name:"taskList"})
            }).catch(error=>{
                this.errors.push(error.response.data.errors)
            })
        }
    }
}
</script>
