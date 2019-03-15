var vm = new Vue({
    el: '#app',
    data: {
        // value: 'off',
        items: [],
        name: '',
        quantity: '',
        id: '',
        value: ''
        
    },
    Vue.component('button-value', {
        props: ['value'], 
        template: '<h3>{{ value }}</h3>'
    }
    )
   

    methods: {
        getId(value) {
            console.log(this.value)
            // console.log(id)
            // console.log((this.$refs.attr().value));
            // console.log(e.target)
            // console.log(e.target.value)
            // console.log(this.value)
            // console.log(this.$refs)
            // console.log(this.$refs[id + '-test'].innerText)
            // var buttonValue = this.$refs.value;
            // return buttonValue;
        },
        addItem() {
            console.log("in addItem")
            // buttonValue = this.categoryId();
            this.items.push({
                id: this.id,
                name: this.name,
                quantity: this.quantity
            });

            this.name = null; 
            this.quantity = null;
        },

        remove(index) {
            this.$delete(this.items, index);
        },

        parse() {
            var myObjStr = JSON.stringify(this.items);

            console.log(myObjStr)
        }
        
    }
    
})

