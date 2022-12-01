<template>
    <div class="row">
        <div class="col-12 mb-2 text-end">
            <router-link :to='{name:"taskAdd"}' class="btn btn-primary">Create</router-link>
        </div>
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Tasks</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th>Title</th>
                                <th>Expiration date</th>
                                <th>Description</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody v-if="tasks.length > 0">
                            <tr v-for="(task,key) in tasks" :key="key">
                                <td>{{ task.title }}</td>
                                <td>{{ task.expiration_date }}</td>
                                <td>{{ task.description ?? '/' }}</td>
                                <td>
                                    <router-link :to='{ name:"taskEdit" , params:{ id:task.id } }' class="btn btn-success">Edit</router-link>
                                    <router-link :to='{ name:"taskShow" , params:{ id:task.id } }' class="btn btn-primary">Show</router-link>
                                    <button type="button" @click="deleteTask(task.id)" class="btn btn-danger">Delete</button>
                                </td>
                            </tr>
                            </tbody>
                            <tbody v-else>
                            <tr>
                                <td colspan="4" align="center">No tasks Found.</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    name:"tasks",
    data(){
        return{
            tasks:[]
        }
    },
    mounted(){
        this.getTasks()
    },
    methods:{

        async getTasks(){
            this.tasks = []

            await this.axios.get('/api/task').then(response=>{
                this.tasks = response.data
            })
        },
        deleteTask(id){
            if(confirm("Are you sure to delete this task ?")){
                this.axios.delete('/api/task/'+id).then(response=>{
                    this.getTasks()
                })
            }
        }
    }
}
</script>
