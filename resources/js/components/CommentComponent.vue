<!-- CommentComponent.vue -->

<template>












    <div class="card mt-3">
        <div class="card-body">
            <div v-if="editing">
                <!-- Editovací režim -->
                <textarea v-model="editedComment" class="form-control" rows="3"></textarea>
                <button @click="updateComment" class="btn btn-sm btn-success">Uložiť</button>
                <button @click="cancelEdit" class="btn btn-sm btn-outline-secondary">Zrušiť</button>
            </div>
            <div v-else>
                <!-- Zobrazený režim -->
                {{ comment.body }}
                <button @click="editComment" class="btn btn-sm btn-outline-info">Editovať</button>
                <button @click="deleteComment" class="btn btn-sm btn-outline-danger">Zmaž</button>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    props: ['comment'],
    data() {
        return {
            editing: false,
            editedComment: this.comment.body,
        };
    },
    methods: {
        editComment() {
            this.editing = true;
        },
        cancelEdit() {
            this.editing = false;
            this.editedComment = this.comment.body;
        },
        updateComment() {
            // Implementujte logiku pre aktualizáciu komentára na serveri pomocou AJAX
            axios.put(`/comments/${this.comment.id}`, { body: this.editedComment })
                .then(response => {
                    this.comment.body = this.editedComment;
                    this.editing = false;
                })
                .catch(error => {
                    console.error('Chyba pri aktualizácii komentára:', error);
                });
        },
        deleteComment() {
            // Implementujte logiku pre mazanie komentára na serveri pomocou AJAX
            axios.delete(`/comments/${this.comment.id}`)
                .then(response => {
                    // Handle success, emit event to update the comment list in the parent component
                    this.$emit('comment-deleted', this.comment.id);
                })
                .catch(error => {
                    console.error('Chyba pri mazaní komentára:', error);
                });
        }
    }
}
</script>
