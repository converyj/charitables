var vm = new Vue({
    el: '#app',
    data: {
        isHidden: true,
        isShown: false,
        text: "View More",
    },


    methods: {
        hideShow() {
            if (this.text === "View More") {
                this.text = "View Less";
                this.isHidden = false;
                this.isShown = true;
            } else {
                this.text = "View More";
                this.isHidden = true;
                this.isShown = false;
            };
        }
    }

});

