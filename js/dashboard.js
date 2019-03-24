var vm = new Vue({
    el: '#app',
    data: {
        isHidden: true,
        isShown: false,
        text: "View More"
    },


    methods: {
        hideShow() {
            console.log("in")
            // $("#Mybutton1").on("click", function() {
            // var $this = $(this); 
            // var $content = $this.parent().prev("div.content");
            this.text = this.text.toUpperCase();

            if (this.text === "VIEW MORE") {
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

