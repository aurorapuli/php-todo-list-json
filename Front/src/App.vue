<script>
import axios from 'axios';

export default {
  name: 'TestComp',
  data() {
    return {
      todoList: []
    }
  },
  mounted() {


    axios.get('http://localhost/php-todo-list-json/Back/list.php')
      .then(res => {
        this.todoList = res.data;

        console.log(this.todoList);
      }).catch(err => console.error(err));
  }
}

</script>

<template>
  <ul>
    <li v-for="list in todoList">{{ list.task }}</li>
  </ul>
</template>

<style scoped>
li {
  text-align: start;
}
</style>
