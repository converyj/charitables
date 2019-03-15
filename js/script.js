
var vm = new Vue({
    el: '#app',
    data: {
        type: 'password',
        show: 'far fa-eye-slash'
    },
    methods: {
        showPassword() {
            if (this.type === 'password') {
                this.type = 'text'
                this.show = 'far fa-eye'
            } else {
                this.type = 'password'
                this.show = 'far fa-eye-slash'
            }
        }
    }
})