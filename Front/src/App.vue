<script>
import axios from 'axios';

export default {
  name: 'TestComp',
  data() {
    return {
      todoList: [],
      newTask: "",
    }
  },
  methods: {
    addTask() {


    }
  },
  mounted() {


    axios.get('http://localhost/php-todo-list-json/Back/list.php')
      .then(res => {
        this.todoList = res.data;

      }).catch(err => console.error(err));
  }
}

</script>

<template>
  <form @submit.prevent="addTask">

    <input type="text" name="text" v-model="newTask">
    <input type="submit" value="SUBMIT">
  </form>

  <ul>
    <li v-for="(list, index) in todoList" :key="index">
      {{ list.task }}
    </li>
  </ul>
</template>

<style scoped>
li {
  text-align: start;
}
</style>
