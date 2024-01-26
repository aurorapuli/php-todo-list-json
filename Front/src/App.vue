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

          console.log(this.todoList);


        }).catch(err => console.log(err));
    },
    changeValue(index) {

      this.todoList[index].completed = !this.todoList[index].completed;
      const params = {
        params: {

          index: index,
          value: this.todoList[index].completed,
        }
      }

      axios.get('http://localhost/php-todo-list-json/Back/changeValue.php', params)
        .then(res => {
          this.todoList = res.data;

          console.log(this.todoList);


        }).catch(err => console.log(err));

    },
    deleteElement(index) {

      const params = {
        params: {

          index: index,

        }
      }

      axios.get('http://localhost/php-todo-list-json/Back/delete.php', params)
        .then(res => {
          this.todoList = res.data;

          console.log(this.todoList);


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
    <li v-for="(list, index) in todoList" :key="index" @click="changeValue(index)"
      :class="{ 'line-trought': list.completed === false }">
      {{ list.task }}

      <button @click="deleteElement(index)">X</button>
    </li>
  </ul>
</template>

<style scoped>
li {
  text-align: start;
  cursor: pointer;
}

.line-trought {
  text-decoration: line-through;
}
</style>
