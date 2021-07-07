<template>
    <form class="form-horizontal" role="form" @submit.prevent="submit">
                                                    
                            <div  v-bind:class="{ 'form-group': true, 'has-error' : errors.name }">
                            <label for="title" class="col-md-2 control-label">Title</label>
                                <div class="col-md-8">
                                <!-- {!! Form::text('title', null, ['class' => 'form-control', 'required', 'autofocus']) !!} -->
                                    <input class="form-control" required="required" autofocus="autofocus" name="title" v-model="post1.title" type="text" id="title">
                                    <span class="help-block" v-for= "error in errors.title" v-text="error">
                                        <strong>{{ error }}</strong>
                                    </span>
                                </div>
                            </div>

                            <div  v-bind:class="{ 'form-group': true, 'has-error' : errors.body }">
                                <label for="body" class="col-md-2 control-label">Body</label>  
                                    <div class="col-md-8">
                                <!-- {!! Form::textarea('body', null, ['class' => 'form-control', 'required']) !!} -->
                                        <textarea class="form-control" required="required" name="body" cols="50" v-model="post1.body" rows="10" id="body"></textarea>
                                    <span class="help-block" v-for= "error in errors.body" v-text="error">
                                            <strong>{{ error }}</strong>
                                        </span>
                                    </div>
                            </div>

                            <div  v-bind:class="{ 'form-group': true, 'has-error' : errors.category_id }">
                                <label for="category_id" class="col-md-2 control-label">Categories</label>
                                    <div class="col-md-8">
                                        <!-- {!! Form::select('category_id', $categories, null, ['class' => 'form-control', 'required']) !!} -->
                                        <select class="form-control" required="required" id="category_id" name="category_id" v-model="post1.category_id">
                                            <option v-for="category in categories" v-bind:value="category.id"  v-bind:key="category.id">
                                                {{ category.name }}
                                            </option>
                                        </select>        
                                        
                                    <span class="help-block" v-for= "error in errors.category_id" v-text="error">
                                            <strong>{{ error }}</strong>
                                        </span>
                                    </div>
                            </div>

                        

                            <div  v-bind:class="{ 'form-group': true, 'has-error' : errors.tags }">
                                <label for="tags" class="col-md-2 control-label">Tags</label>
                                    <div class="col-md-8">
                                
                                        <multiselect placeholder="add tag" label="name" track-by="id"
                                            v-model="post1.tags"
                                            :searchable="false"
                                            :options="tags"
                                            :taggable="true"
                                            :multiple="true"
                                            
                                         >
                                        </multiselect>
                                        
                                        <span class="help-block" v-for= "error in errors.tags" v-text="error">
                                                <strong>{{ error }}</strong>
                                        </span>
                                    </div>
                            </div>
                        
                            <div class="form-group">
                                <div class="col-md-8 col-md-offset-2">
                                    <button type="submit" class="btn btn-primary">
                                    Update
                                    </button>
                                </div>
                            </div>
                        </form>
</template>
<script>
import Multiselect from 'vue-multiselect'

export default {
    components: {
        Multiselect
    },
    props: ['post'],
   
    data() {
        return {
             categories:null,
            tags: [],
            post1: {},
            errors: {}
        }
    },
    mounted() {
        axios.get('/api/get_categories').then(response => {
            this.categories = response.data.data;
        })
        axios.get('/api/get_tags').then(response => {
            this.tags = response.data.data;
        })
        this.post1=this.post;
    },
    methods: {
        submit() {
            axios.put(`/admin/posts/${this.post.id}`, this.post1).then(response => {
                this.errors = {};
                this.post1={};
            }).catch(error => {
                if (error.response.status == 422) {
                    this.errors = error.response.data.errors;
                }
                console.log(error);
            });
        },
    }
}
</script>
<style src="vue-multiselect/dist/vue-multiselect.min.css"></style>