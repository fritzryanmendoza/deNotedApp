<template>
    <div class="w-25 text-white noteappsvgcursorchanger">
        <form @submit.prevent="saveData">
            <!-- Button trigger modal -->
            <div class="container">
            <div class="row">
                <div class="col text-center">
                <button type="button" class="btn btn-success bg-transparent font-weight-bolder mb-2" data-toggle="modal" data-target="#modalLabel1">
                CREATE A TASK
                </button>
                </div>
            </div>
            </div>
            
            <!-- Modal -->
            <div class="modal fade" id="modalLabel1" tabindex="-1" role="dialog" aria-labelledby="modalLabel1" aria-hidden="true">
            <div class="bg-primary modal-dialog rounded-circle" role="document">
                <div class="modal-content" style="border: none;">
                <div class="modal-header">
                    <h5 class="modal-title text-white w-100" id="modalLabel1">CREATE TASK</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-square-x" width="32" height="32" viewBox="0 0 24 24" stroke-width="2" stroke="#F44336" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                        <rect x="4" y="4" width="16" height="16" rx="2" />
                        <path d="M10 10l4 4m0 -4l-4 4" />
                        </svg>
                    </span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="input-group w-100">
                        <input v-model="form.title" :class="{'is-invalid' : form.errors.has('title')}" type="text" class="border-0 form-control form-control-lg rounded text-white bg-transparent"
                        @keydown="form.errors.clear('title')" placeholder="Title" aria-label="Title" aria-describedby="basic-addon2">
                    <div class="form-group input-group pt-2 w-100">
                        <textarea v-model="form.body" :class="{'is-invalid' : form.errors.has('body')}" type="text" class="border-0 form-control form-control-lg rounded text-white bg-transparent" 
                        @keydown="form.errors.clear('title')" placeholder="Body" aria-label="Body" aria-describedby="basic-addon2">
                        </textarea>
                    </div>
                    </div>
                </div>
                <div class="modal-footer" style='border: none;'>
                    <button type="button" class="btn btn-outline-danger btn-lg bg-transparent text-white" data-dismiss="modal">Close</button>
                    <button class="btn btn-outline-success btn-lg rounded bg-transparent text-white" type="submit">Add Task</button>
                </div>
                </div>
            </div>
            </div>
        </form>
        <div class="w-100 note">
            <div v-for="note in notes" :key="note.id" class="section w-100 d-flex align-items-center p-3 border mt-2">
                <span class="mr-2">
                    <svg v-on:click="toggleNotes(note)" v-if="note.completed == false" xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-square" width="32" height="32" viewBox="0 0 24 24" stroke-width="2" stroke="#2196F3" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                    <rect x="4" y="4" width="16" height="16" rx="2" />
                    </svg>
                                        
                    <svg v-if="note.completed == true" v-on:click="toggleNotes(note)" xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-square-check" width="32" height="32" viewBox="0 0 24 24" stroke-width="2" stroke="#4CAF50" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                    <rect x="4" y="4" width="16" height="16" rx="2" />
                    <path d="M9 12l2 2l4 -4" />
                    </svg>
                </span>
                <div class="text-white">
                    <span v-if="editmode == false || editmode != note.id" class="">
                        <span class="font-weight-bolder" style="color:#ff9642">Title: </span>
                        <span class="font-weight-light">{{note.title}}</span>
                        <br>
                        <span class="font-weight-bolder" style="color:#ff9642">Body: </span>
                        <span class="font-weight-light">{{note.body}}</span>
                    </span>
                    <input v-if="editmode == note.id" v-model="note.title" type="text" class="text-white bg-transparent border border-white rounded" placeholder="Title">
                    <br>
                    <input v-if="editmode == note.id" v-model="note.body" type="text" class="mt-2 text-white bg-transparent border border-white rounded" placeholder="Body">
                </div>

                <div class="ml-auto mr-2 d-flex align-items-center">
                    <span>
                        <svg v-on:click="editmode = note.id" v-if="editmode != note.id" xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-settings" width="32" height="32" viewBox="0 0 24 24" stroke-width="2" stroke="#FFC107" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                        <path d="M10.325 4.317c.426 -1.756 2.924 -1.756 3.35 0a1.724 1.724 0 0 0 2.573 1.066c1.543 -.94 3.31 .826 2.37 2.37a1.724 1.724 0 0 0 1.065 2.572c1.756 .426 1.756 2.924 0 3.35a1.724 1.724 0 0 0 -1.066 2.573c.94 1.543 -.826 3.31 -2.37 2.37a1.724 1.724 0 0 0 -2.572 1.065c-.426 1.756 -2.924 1.756 -3.35 0a1.724 1.724 0 0 0 -2.573 -1.066c-1.543 .94 -3.31 -.826 -2.37 -2.37a1.724 1.724 0 0 0 -1.065 -2.572c-1.756 -.426 -1.756 -2.924 0 -3.35a1.724 1.724 0 0 0 1.066 -2.573c-.94 -1.543 .826 -3.31 2.37 -2.37c1 .608 2.296 .07 2.572 -1.065z" />
                        <circle cx="12" cy="12" r="3" />
                        </svg>

                        <svg v-if="editmode == note.id" v-on:click="updateNotes(note)" xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-edit" width="32" height="32" viewBox="0 0 24 24" stroke-width="2" stroke="#4CAF50" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                        <path d="M9 7h-3a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-3" />
                        <path d="M9 15h3l8.5 -8.5a1.5 1.5 0 0 0 -3 -3l-8.5 8.5v3" />
                        <line x1="16" y1="5" x2="19" y2="8" />
                        </svg>
                    </span>
                    <span>
                        <svg v-on:click="deleteNotes(note)" xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-trash" width="32" height="32" viewBox="0 0 24 24" stroke-width="2" stroke="#F44336" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                        <line x1="4" y1="7" x2="20" y2="7" />
                        <line x1="10" y1="11" x2="10" y2="17" />
                        <line x1="14" y1="11" x2="14" y2="17" />
                        <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" />
                        <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" />
                        </svg>
                        </span>
                </div>
            </div>
            
        </div>
    </div> 
</template>

<script>

    export default {
        data(){
            return{
                editmode: false,
                notes: '',
                form: new Form({
                    title: '',
                    body: '',
                    created_at: '',
                    updated_at: '',
                })

            }
        },
        methods:{
            deleteNotes(db){
                let data = new FormData();
                data.append('_method', 'DELETE')
                axios.post('/api/noteapp/' + db.id, data).then((res)=>{
                    this.notes = res.data
                }).catch((error) =>{
                    this.form.errors.record(error.response.data.errors)
                })
            },
            updateNotes(db){
                this.editmode = false
                let data = new FormData();
                data.append('_method', 'PATCH')
                data.append('title', db.title)
                data.append('body', db.body)
                axios.post('/api/noteapp/' + db.id, data).then(()=>{
                }).catch((error) =>{
                    this.form.errors.record(error.response.data.errors)
                })
                
            },
            toggleNotes(db){
                db.completed = !db.completed
                let data = new FormData();
                data.append('_method', 'PATCH')
                if(db.completed == true){
                    data.append('completed', 1);
                }
                if(db.completed == false){
                    data.append('completed', 0);
                }
                axios.post('/api/noteapp/' + db.id, data)
            },
            getNotes(){
                axios.get('/api/noteapp').then((res) =>{
                    this.notes = res.data
                }).catch((error) =>{
                    console.log(error)
                })
            },
            saveData(){
                let data = new FormData();
                data.append('title', this.form.title)
                data.append('body', this.form.body)
                axios.post('/api/noteapp', data).then((res) =>{
                    this.form.reset()
                    this.getNotes()
                }).catch((error) =>{
                    this.form.errors.record(error.response.data.errors)
                })
            }
        },

        mounted() {
            this.getNotes()
        }
    }
</script>
