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
      this.todoList.push({ task: this.newTask, completed: true })

      console.log(this.todoList);

      this.newTask = ""
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
  <input type="text" name="text" v-model="newTask">
  <button @click="addTask">SUBMIT</button>
  <ul>
    <li v-for="list in todoList">{{ list.task }}</li>
  </ul>
</template>

<style scoped>
li {
  text-align: start;
}
</style>
