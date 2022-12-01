<template>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Show task</h4>
                </div>
                <div class="card-body">
                        <div class="row">
                            <div class="col-12 mb-2">
                                <div class="form-group">
                                    <b>Title</b>
                                    <p type="text" >{{task.title}}</p>
                                </div>
                            </div>
                            <div class="col-12 mb-2">
                                <div class="form-group">
                                    <b>Expiration date</b>
                                    <p type="text" >{{task.expiration_date}}</p>
                                </div>
                            </div>
                            <div class="col-12 mb-2">
                                <div class="form-group">
                                    <b>Description</b>
                                    <p type="text" >{{task.description ?? '/'}}</p>
                                </div>
                            </div>
                        </div>

                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default{
    name:"show-task",
    data(){
        return{
            task:{
                title:"",
                expiration_date: "",
                description:"",
            }
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
        }
    }
}
</script>
