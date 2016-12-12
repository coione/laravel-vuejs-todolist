<template>
  <div id="todo-form">
    <h4>To do Form</h4>
    <div class="form-group">
      <label for="todoTitle">Title</label>
      <input v-model="task.title" type="text" class="form-control" id="todoTitle" placeholder="Title">
    </div>
    <div class="form-group">
      <label for="todoDescription">Description</label>
      <textarea v-model="task.description" class="form-control" id="todoDescription" placeholder="Description"></textarea>
    </div>
    <button class="btn btn-default" @click="save">Save</button>
  </div>
</template>

<script>
  export default {
    data: function() {
      return {
        task: {
          id: '',
          title: '',
          description: ''
        }
      };
    },
    methods: {
      save: function() {
        this.$http.post('api/todo', {'title': this.task.title, 'description': this.task.description}).then(function() {
          this.task.title = '';
          this.task.description = '';
          sweetAlert("Saved!", "", "success");
          this.$emit('tasksRefresh');
        }, function() {
          sweetAlert("Error!", "Try again", "error");
        });
      }
    }
  }
</script>
