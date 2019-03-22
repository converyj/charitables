var vm = new Vue({
    el: '#app',
    data: {
        items: [],
        name: '',
        quantity: '',
        categoryId: '',
        category: '',
        id: '',
        image: ''
    },


    methods: {
        addItem() {
            this.items.push({
                category: this.categoryId,
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

            $.ajax({  
                type: 'POST',  
                url: 'form-processing.php', 
                data: myObjStr,
                success: function(response) {
                    console.log(response);
                }
            });
        }

    }

});

