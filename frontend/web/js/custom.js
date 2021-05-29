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


	const hintBlock = document.getElementById('review_form_hint');

	const alertt = `<div class="alert alert-primary" role="alert">
  Необходимо заполнить все поля
</div>`;


	const review_form = document.getElementById('form-review');

	if (review_form) {
		review_form.addEventListener('submit', event => {
			event.preventDefault();

			let target = event.target;

			let errors = false;

			target.querySelectorAll('input').forEach(input => {
				if (!input.value){
					hintBlock.innerHTML = alertt;
					errors = true;
				}
			});
			if (!errors){
				$.ajax({
					url: '/common/create-review',
					type: 'post',
					data: $(target).serialize(),
					dataType: 'json',
					success: function(json) {
						if (json.success === true){

							target.innerText = "Отзыв создан";
						}
					}
				});
			}
		});
	}





	/*city block*/
	const cityBlock = document.querySelector('.prmn-cmngr');

	cityBlock.addEventListener('click', event => {
		$( "#dialog" ).dialog();
	})

	const cityModal = document.querySelector('#dialog');

	if (cityModal){
		cityModal.addEventListener('click', evt => {
			evt.preventDefault();
			console.log(evt)
		})
	}









	/*city block end*/












});


