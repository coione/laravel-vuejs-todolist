<template>
  <div id="todo-table">
    <h4>List</h4>
    <table class="table">
      <thead>
        <tr>
          <th>#</th>
          <th>Title</th>
          <th>Description</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="task in list">
          <th scope="row">{{ task.id }}</th>
          <td>{{ task.title }}</td>
          <td><button class="btn btn-danger" @click="deleteTask(task.id)">Delete</button></td>
        </tr>
      </tbody>
    </table>
  </div>
</template>

<script>
  export default {
    props: ['list'],
    methods: {
      deleteTask: function(id) {
        this.$http.delete('api/todo/'+id).then(function() {
          sweetAlert("Deleted!", "", "success");
          this.$emit('tasksRefresh');
        }, function() {
          sweetAlert("Error!", "Try again", "error");
        });
      }
    }
  }
</script>
