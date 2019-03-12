var vm = new Vue({
    el: '#app',
    data: {
        // value: 'off',
        items: [],
        name: '',
        quantity: '',
        id: ''
    },

    methods: {
        getId(id) {
            console.log(id)
            // console.log(e.target)
            // console.log(e.target.value)
            // console.log(this.value)
            console.log(this.$refs)
            console.log(this.$refs[id + '-test'].innerText)
            // var buttonValue = this.$refs.value;
            // return buttonValue;
        },
        addItem(name, quantity) {
            console.log("in addItem")
            // buttonValue = this.categoryId();
            this.items.push({
                id: this.id,
                name: this.name,
                quantity: this.quantity
            });
        },

        remove(index) {
            this.$delete(this.items, index);
        }
    }
})