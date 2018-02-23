<div id="app" @click.right.prevent="menu">
    <ol>
        <li is="todo-item"
            v-for="(todo, index) in todos"
            v-bind:key="todo.id"
            v-bind:title="todo.title"
            v-on:remove="todos.splice(index, 1)"
        ></li>
    </ol>
    <input v-model="newTodoText"
           v-on:keyup.enter="addNewTodo"
           placeholder="Add a todo">
</div>