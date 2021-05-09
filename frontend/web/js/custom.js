document.addEventListener('DOMContentLoaded', () => {

	function search() {
		const searchInputs = document.querySelectorAll('input[name=\"search\"]');
		const searchButton = document.getElementById('button-search');

		searchInputs.forEach(el => {
			el.addEventListener('keydown', event => {
				if (event.keyCode == 13) {

				}
			})
		})

	}

	function liveSearch()
	{
		let searchInput = document.querySelector('input[name="search"]');
		let results = document.getElementById('live-search');
		let resultsUl = results.querySelector('ul');

		searchInput.addEventListener('keyup', event => {

			if (event.target.value.length < 3) return false;

			$.ajax({
				url: '/common/good-autocomplete',
				type: 'get',
				data: {
					name : event.target.value
				},
				dataType: 'json',
				success: function(json) {

					results.style.display='block';

					resultsUl.innerHTML="";

					if (json.length == 0){
						resultsUl.innerHTML = "нет таких товаров";
					}

					for (let item of json){
						console.log(item);

						let div = document.createElement('div');
							div.setAttribute('class', 'product-name');
							div.innerHTML = item.name;

							let url = '/good';
								url+= "/" + item.provider_slug;
								url+= "/" + item.slug;

						let li = document.createElement('li');
							li.setAttribute('onclick', "location='" + url + "'");
							li.append(div);

						resultsUl.append(li);



					}





				}
			});
		});





	}

	liveSearch();
});


