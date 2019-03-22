var vm = new Vue({
    el: '#app',
    data: {
        isHidden: true
    },


    methods: {
        hideShow() {
            $("#Mybutton1").on("click", function() {
                var $this = $(this); 
                // var $content = $this.parent().prev("div.content");
                var linkText = $this.text().toUpperCase();    
                
                if(linkText === "VIEW MORE"){
                    linkText = "View less";
                    $(".content").addClass("showContent");
                } else {
                    linkText = "View more";
                    $("content").removeClass("showContent");
                };
            
                $this.text(linkText);
            });

        // remove(index) {
        //     this.$delete(this.items, index);
        // },

        // parse() {
        //     var myObjStr = JSON.stringify(this.items);

        //     console.log(myObjStr)

        //     $.ajax({  
        //         type: 'POST',  
        //         url: 'form-processing.php', 
        //         data: myObjStr,
        //         success: function(response) {
        //             console.log(response);
        //         }
        //     });
        // }

    }
}

});

