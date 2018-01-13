<div id="app">
    <ol>
        <todo-item v-for="item in groceryList"
                   v-bind:todo="item"
                   v-bind:key="item.id"
                   v-bind:title="item.text">
        </todo-item>
    </ol>
    <input type="text" v-model="new_item">
    <button v-on:click="addItem">增加</button>
    <p>{{new_item}}</p>
</div>