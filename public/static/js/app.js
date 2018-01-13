'use strict';

Vue.component('todo-item', {
    props: ['todo'],
    template: '<li>{{ todo.text }}</li>'
});

var app = new Vue({
    el: '#app',
    data: {
        groceryList: [
            {id: 0, text: '蔬菜'},
            {id: 1, text: '奶酪'},
            {id: 2, text: '随便其它什么人吃的东西'}
        ],
        id: 3,
        new_item: ""
    },
    methods: {
        addItem: function () {
            this.groceryList.push({
                id: this.id++,
                text: this.new_item
            });
        }
    }
});