<template>
  <div class="row">
    <div class="col-md-2"></div>
    <div class="col-md-8">
      <form-todo @tasksRefresh="fetchTaskList"></form-todo>
      <list-todo :list="list" @tasksRefresh="fetchTaskList"></list-todo>
    </div>
    <div class="col-md-2"></div>
  </div>
</template>

<script>
    import FormTodo from './FormTodo.vue';
    import ListTodo from './ListTodo.vue';

    export default {
      components: {
        'form-todo': FormTodo,
        'list-todo': ListTodo
      },
      data: function() {
        return {
          list: []
        };
      },
      mounted() {
        this.fetchTaskList();
      },
      methods: {
        fetchTaskList: function() {
          this.$http.get('api/todos').then(function (response) {
            this.list = response.data;
          });
        }
      }
    }
</script>
