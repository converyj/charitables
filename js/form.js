var vm = new Vue({
	el: "#app",
	data: {
		categoryId: "",
		categoryType: "",
		items: [],
		category: "",
		type: "",
		name: "",
		quantity: "",
		seen: false,
		msg: "",
		confirmation: false
	},

	methods: {
		addItem() {
			this.seen = true;
			this.items.push({
				category: this.categoryId,
				type: this.categoryType,
				name: this.name,
				quantity: this.quantity
			});

			this.name = null;
			this.quantity = null;
		},

		remove(index) {
			this.$delete(this.items, index);
		},

		parse(event) {
			event.preventDefault();
			var myObjStr = JSON.stringify(this.items);
			// $(".alert").hide();
			this.confirmation = true;

			works = false;

			$.ajax({
				url: "form-processing.php",
				type: "POST",
				data: { items: myObjStr },
				success: function(response) {
					works = true;
					console.log(response);
					$(".modal-body").html("Items were successfully added");
					$.get("notification.js");
				},
				error: function(response) {
					works = false;
					$(".modal-body").html("Sorry, try again. Items were not successfully added");
				}
			});
		},

		redirect() {
			if (works) {
				location.href = "dashboard.php";
			}
		}
	}
});
