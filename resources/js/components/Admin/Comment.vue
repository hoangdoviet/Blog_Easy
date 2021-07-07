<template>
<div class="panel panel-default">
    <div class="panel-heading">Write your comment</div>

    <div class="panel-body">
        <!-- {!! Form::open(['url' => "posts/{$post->id}/comment"]) !!} -->
        <form  @submit.prevent="submit">

            <div class="form-group">
                <!-- {!! Form::textarea('body', null, ['class' => 'form-control', 'rows' => 3, 'required']) !!} -->
                <textarea class="form-control" required="required" name="body" v-model="comment.body" rows="3" id="body"></textarea>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">
                    Reply
                </button>
            </div>
        </form>
    </div>
</div>

</template>
<script>

export default {
    props: ['post'],
    data() {
        return {
            
            comment: {},
            errors: {}
        }
    },
    mounted() { 
        console.log(this.post.id);
    },
    methods: {
        submit() {
            axios.post(`/posts/${this.post.id}/comment`, this.comment).then(response => {
                this.comment ={};
                this.errors = {};
                window.location.href = `/posts/${this.post.id}`;

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

