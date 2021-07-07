<template>
    <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h2>
                            {{ $trans('view.Posts') }}

                            <a @click="CreatePost()" class="btn btn-default pull-right">{{ $trans('view.Create') }}</a>
                        </h2>
                    </div>

                    <div class="panel-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>{{ $trans('view.Title') }}</th>
                                    <th>{{ $trans('view.Body') }}</th>
                                    <th>{{ $trans('view.Author') }}</th>
                                    <th>{{ $trans('view.Categories') }}</th>
                                    <th>{{ $trans('view.Tags') }}</th>
                                    <th>{{ $trans('view.Published') }}</th>
                                    <th>{{ $trans('view.Action') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                    <tr v-for ="(post, key) in listposts.data" :key="key">
                                        <td>{{ post.title }}</td>
                                        <td>{{  post.body && post.body.length < 60 ? post.body : post.body.substring(0, 60) + ".." }}</td> 
                                        <td>{{ post.user.name }}</td>
                                        <td>{{ post.category.name }}</td>
                                        <td ><span v-for="(tags, key) in post.tags" :key="key">{{ tags.name }} </br> </span></td>
                                        <td>{{ post.is_published?'Yes':'No' }}</td>
                                        <td>
                                           <button v-if="authUser.is_admin && post.is_published" class="btn btn-xs btn-warning" @click="Published(post)">{{$trans('view.Published')}}</button>
                                            <button v-else-if="authUser.is_admin" class="btn btn-xs btn-warning" @click="Published(post)">{{$trans('view.Draft')}}</button>
                                            <button class="btn btn-xs btn-success" @click="showPost(post)">{{$trans('view.Show')}}</button>
                                            <button class="btn btn-primary" @click="editPost(post)">{{$trans('view.Edit')}}</button>
                                            <button class="btn btn-xs btn-danger" @click="deletePost(post)" > {{$trans('view.Delete')}} </button>
                                            

                                        </td>
                                    </tr>
                                    
                            </tbody>
                        </table>
                        <pagination :data="listposts" @pagination-change-page="getPost" >
                            <span slot="prev-nav">&lt; {{$trans('view.Previous')}}</span>
                            <span slot="next-nav">{{$trans('view.Next')}} &gt;</span>
                        </pagination>
               
                    </div>
                </div>
            </div>
            
        
    </div>
</template>

<script>
    import axios from 'axios' 
    export default {
        data() { 
            return{
                listposts: {},   
                authUser: window.authUser,
            }
        },
        
        mounted() {
                this.getPost();              
        },
        methods: {
            Published(post ){
                

                if (!window.confirm(`Are you sure you want to  Post: ${post.title}`)) {
                    return ;
                }
                axios.put(`posts/${post.id}/publish`)
                .then(()=>{
                window.location.href = 'posts';                    
                }).catch(({ response })=>{
                    console.error(response)
                })
            },
            CreatePost(){
                window.location.href = 'posts/create';

            },
            showPost:function(post){ 
                window.location.href = `posts/${post.id}`;
                
            },
            editPost:function(post){
                window.location.href = `posts/${post.id}/edit`;

            },

            
            // async getPost(page = 1){
            //     await axios.get(`post/get-post?page=`+page)
            //     .then(({data})=>{
            //         this.listposts = data
            //     }).catch(({ response })=>{
            //         console.error(response)
            //     })
            // },
            getPost(page = 1) {
                axios.get('/api/get_posts?page=' + page)
                    .then((response) => {
                        this.listposts = response.data;
                    })
                    .catch(function (error) {
                        console.log(error);
                    });
            },
          
            deletePost(post) { 
                if (!window.confirm(`Are you sure you want to delete Post: ${post.title}`)) {
                    return ;
                }
                axios.delete(`posts/${post.id}`)
                    .then(function(){
                        let index = this.customers.indexOf(post);
                        this.posts.splice(index,1);
                    }).catch(err => {
                         console.log(err)
                    })
                    
            }
            
            
            
       
        }
    }
</script>
