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

      const params = {
        params: {

          text: this.newTask

        }
      }

      axios.get('http://localhost/php-todo-list-json/Back/addTask.php', params)
        .then(res => {
          this.todoList = res.data;
          this.newTask = "";


        }).catch(err => console.log(err));
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
